<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\sendOtp;
use App\Models\CustomerSignup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{



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

          $this->validate($request,[
              "userphonenumber"=>"required|min:10",
          ]);

          $check_user_exist=CustomerSignup::where('cus_phonenumber',$request->userphonenumber)->first();

          //if the user exist
          if($check_user_exist!=null)
          {
                $this->cus_id=$check_user_exist->id;
                //section handling the opt generation
                $otp=rand(1000,9999);
                $check_user_exist->otp=$otp;
                // Mail::to($check_user_exist->email)->send(new sendOtp($otp));
                Session::put('customer',$check_user_exist);
                $check_user_exist->save();
                return redirect()->route('signup.show',session('customer')->id);

          }
          else
          {
              return redirect()->route('user.index');
          }
     }

     public function checkuserotp(Request $request)
     {
        $this->validate($request,[
            "otp"=>"required||min:4||max:4"
        ]);

        $check_opt=CustomerSignup::where('id',$request->cus_id)->first();

           if($check_opt->otp!=$request->otp)
           {
                return back()->with('no_valid_otp','OTP NOT VALID');
           }
           //if otp matchs
           session()->pull('otp');
           Session::put("customer",$check_opt);
           $check_opt->otp=0;
           $check_opt->save();
           return redirect('/home');

     }

     public function logout()
     {
            session()->pull('customer');
            return redirect('/home');
     }
}
