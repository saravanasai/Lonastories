<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\sendOtp;
use App\Models\CustomerSignup;
use App\Models\Reviews\Reviews;
use App\View\Components\customerdirectReftable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    protected $cus_id;

    public function index()
    {
        return view('frontend.home');
    }

    public function login()
    {
        return view('frontend.login');
    }
    public function checkuser(Request $request)
    {

        $this->validate($request, [
            "userphonenumber" => "required|min:10",
        ]);

        $check_user_exist = CustomerSignup::where('cus_phonenumber', $request->userphonenumber)->first();

        //if the user exist
        if ($check_user_exist != null) {
            $this->cus_id = $check_user_exist->id;
            //section handling the opt generation
            $otp = rand(1000, 9999);
            Mail::to($check_user_exist->email)->send(new sendOtp($otp));
            Session::put('userOtp', $otp);
            Session::put('loginUserInfo', $check_user_exist);
            // Session::put('customer',$check_user_exist);
            return redirect()->route('userLoginVerify');
        } else {
            return redirect()->route('home');
        }
    }

    public function checkuserotp(Request $request)
    {
        $this->validate($request, [
            "otp" => "required||min:4"
        ]);
        if (session('userOtp') != $request->otp) {
            return back()->with('no_valid_otp', 'OTP NOT VALID');
        } else {
            //if otp matchs
            session()->pull('otp');
            $user_info = CustomerSignup::where('id', session('loginUserInfo')->id)->first();
            Session::put("customer", $user_info);
            Session::pull('loginUserInfo');
            Session::pull('userOtp');
            return redirect()->route('home');
        }
    }

    public function logout()
    {
        session()->pull('customer');
        return redirect()->route('home');
    }

    public function review(Request $request)
    {

        $reviews = new Reviews();
        $reviews->review_of_cus = session('customer')->id;
        $reviews->review_for_product = $request->product;
        $reviews->comment = $request->comment;
        $reviews->rating = $request->ratings;
        if ($reviews->save()) {
            return redirect()->back()->with('review_posted', "ADDED");
        }
    }
}
