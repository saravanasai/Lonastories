<?php

namespace App\Http\Controllers;

use App\Mail\sendOtp;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\Cutomer\DirectReferal;
use App\Models\TeleCallerEnquiery;
use App\Models\Wallet;
use App\Service\CheckUSerExistService;
use App\Service\UserRegisterService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use Nexmo\Laravel\Facade\Nexmo;

class CustomerController extends Controller
{

    public function index()
    {
        return view('customer.Signup');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CheckUSerExistService $service, UserRegisterService $userRegister)
    {

        $this->validate($request, [
            "PromoCode" => "required",
            "phonenumber" => "required|min:10|max:10",
            "email" => "email",
            "name" => "required",
            "date" => "required"
        ]);

        if ($service->check_if_user_exist($request)) {

            //section handling the otp generation
            $otp = rand(1000, 9999);
            Session::put('signUpInfo', $request->all());
            Session::put('userOtp', $otp);
            Mail::to($request->email)->send(new sendOtp($otp));
            return redirect()->route('signup.show', 1);
        } else {
            //redirected back to login page if the user is already exists
            return redirect()->route('userlogin');
        }
    }


    public function show($id)
    {
        return view('customer.verify');
    }




    public function userSingup($referal_id = null, $direct_ref = null)
    {
        Session::put('refer_id', $referal_id);
        Session::put('direct_ref', $direct_ref);
        return view('customer.Signup');
    }


    public function checkOtp(Request $request, UserRegisterService $service)
    {
        //check the user otp is matching or not
        //and Save the user to database after entering the vaid otp
        $this->validate($request, [
            "otp" => "required|min:4"
        ]); 
        if (session('userOtp') == $request->otp) {
            //RegisterUser Methode Handles the inserting of customer data
            if ($service->RegisterUser()) {
                $user_info = CustomerSignup::latest()->first();
                Session::pull('refer_id');
                Session::put("customer", $user_info);

                //section to  check if customer is refered by another customer
                if ($user_info->refered_by == '0' || true) {
                    //NOTE : 2x For direct Referal is also handled inside this block
                    $service->BonusForReferedUser();
                }
                //end section to  check if customer is refered by another customer

                //section to  check if customer is Availabe in our telecaller table
                if ($user_info->refered_by != '0' && $user_info->refered_by > 0) {
                    //NOTE : this Block is to auto matching the customer enquiery done by telecaller
                    $service->MatchTelecallerEnquiery();
                }
                //end section to  check if customer is Availabe in our telecaller table

                //section to insert into a wallet of customer
                if ($service->UserWalletGeneration()) {
                    Session::pull('direct_ref');
                    return redirect()->route('user.profile');
                }
                //end section to insert into a wallet of customer


            }
        } else {
            Session::pull('customer');
            return redirect()->route('signup.show', 1)->with('OtpNotValid', 'Please Check The OTP');
        }
    }

    public function MasterCustomerList()
    {

        $new_user = CustomerSignup::get();

        return  view('adminviews.mastercustomerlist', compact('new_user'));
    }



    public function CustomerDiable(Request $request)
    {
        $id = $request->id;
        $user = CustomerSignup::where('id', $id)->first();
        if ($user->active_status == 1) {
            $user->active_status = 0;
            $user->save();
            return 1;
        } else {
            $user->active_status = 1;
            $user->save();
            return 1;
        }
    }

    public function loginVerify()
    {
        return view('customer.verifyLogin');
    }
}
