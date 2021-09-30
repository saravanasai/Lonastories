<?php

namespace App\Http\Controllers;

use App\Mail\sendOtp;
use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\Cutomer\DirectReferal;
use App\Models\TeleCallerEnquiery;
use App\Models\Wallet;
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
    public function store(Request $request)
    {
        $ref_id=session('refer_id');
        $direct_ref=session('direct_ref');


         $this->validate($request,[
             "phonenumber"=>"required|min:10|max:10",
             "email"=>"email",
             "name"=>"required",
             "date"=>"required"
         ]);

        //  $check_if_exist=new CustomerSignup();

         $customer_exist=CustomerSignup::where('cus_phonenumber','=',$request->phonenumber)->first();

           if($customer_exist==null)
           {

                            //section handling the opt generation
                            $otp=rand(1000,9999);
                            $otp_status=true;
                            //section to overcome otp !important shoen dont delete it
                            // $otp_status= Nexmo::message()->send([
                            //     'to'   => '+91'.$request->phonenumber,
                            //     'from' => 'LN-STORIES',
                            //     'text' => 'Your one time password for LN- '.$otp.' valid till 5min'
                            // ]);
                             // end section to overcome otp !important shoen dont delete it
                            //  Mail::to($request->email)->send(new sendOtp($otp));
                                 if($otp_status)
                                  {
                                        $activation_status=1;
                                            if($ref_id==null)
                                            {
                                                $ref_id=0;
                                            }
                                        $signup=new CustomerSignup();
                                        $signup->name=$request->name;
                                        $signup->email=$request->email;
                                        $signup->cus_phonenumber=$request->phonenumber;
                                        $signup->dob=$request->date;
                                        $signup->refered_by=$ref_id;
                                        $signup->status=$activation_status;
                                        $signup->otp=$otp;


                                        if($signup->save())
                                        {
                                            //removing the session value if its from referal link
                                            session()->pull('refer_id');
                                            session()->pull('direct_ref');

                                            $dob=$request->date;
                                            $user_info=CustomerSignup::where('cus_phonenumber',$request->phonenumber)->first();
                                            Session::put("customer",$user_info);
                                            $tele_caller=TeleCallerEnquiery::where('cus_Phone_number',$request->phonenumber)->first();
                                               //section to validate if the its a tellecaller referal
                                               if($tele_caller!=null)
                                               {
                                                $user_info->refered_by=$tele_caller->telecaller_id;
                                                $tele_caller->cus_id=$user_info->id;
                                                $tele_caller->save();
                                               }
                                               //end section to validate if the its a tellecaller referal

                                            // dd($user_info->refered_by!="0");
                                                       //section to check weather the user is refferd by Customer
                                            if($user_info->refered_by!="0")
                                            {

                                                $refered_customer=CustomerSignup::where('cus_referal_code','=',$user_info->refered_by)->where('ref_check','=',0)->first();

                                                  if($refered_customer!=null)
                                                  {

                                                      //adding coins to reffered customer
                                                      $refered_customer_wallet=Wallet::where('wallet_of_user','=',$refered_customer->id)->first();
                                                      $new_cutomer_dob_year=Carbon::parse($dob)->year;
                                                        // dd($refered_customer_wallet);
                                                    //it works if the direct referal is on there
                                                            if($direct_ref!=null)
                                                            {
                                                                $direct_ref_table=DirectReferal::where('refered_cus_phonenumber',$user_info->cus_phonenumber)
                                                                ->where('refered_verification',0)->first();
                                                                if($direct_ref_table!=null)
                                                                {
                                                                    $direct_ref_table->refered_verification=1;
                                                                    $direct_ref_table->refered_cus_name=$user_info->name;
                                                                    $direct_ref_table->refered_cus_email=$user_info->email;
                                                                    $direct_ref_table->save();
                                                                    $refered_customer_wallet->heart_coins=$refered_customer_wallet->heart_coins+($new_cutomer_dob_year*2);
                                                                }

                                                            }
                                                            else
                                                            {
                                                                $refered_customer_wallet->heart_coins=$refered_customer_wallet->heart_coins+$new_cutomer_dob_year;
                                                            }

                                                      $refered_customer_wallet->save();
                                                      $user_ref_check=CustomerSignup::where('cus_phonenumber',$request->phonenumber)->first();
                                                      $user_ref_check->ref_check=0;
                                                      $user_ref_check->save();

                                                  }
                                                //section end to check weather the user is refferd by Customer

                                            }
                                            //end section if the customer is refered
                                            $link_to_more_details=ClEnquiery::where('enquiery_cus_ph',$request->phonenumber)->first();
                                            $assign_to_caller_enquiery=TeleCallerEnquiery::where('cus_Phone_number',$request->phonenumber)->first();

                                            if($link_to_more_details!=null && $assign_to_caller_enquiery!=null)
                                            {
                                                //updating the enquiery for matching the user_id to _enquiery
                                                $link_to_more_details->enquiery_of_ucs=$user_info->id;
                                                $assign_to_caller_enquiery->cus_id=$user_info->id;
                                                $assign_to_caller_enquiery->cus_first_name=$user_info->name;
                                                $user_info->cus_referal_code="LN".$user_info->id."CS";
                                                $user_info->status=0;
                                                $link_to_more_details->save();
                                                $assign_to_caller_enquiery->save();
                                                $user_info->save();
                                            }
                                            else
                                            {
                                                $user_info->cus_referal_code="LN".$user_info->id."CS";
                                                $user_info->save();
                                            }
                                            //section to insert into a wallet of customer
                                            $year=Carbon::parse($user_info->dob)->year;
                                            $total_start_coins=$year;
                                            // dd($total_start_coins);
                                            $walet_info=$user_info->wallet()->create([
                                                "start_coins"=>$total_start_coins,
                                                "value_coins"=>0,
                                                "heart_coins"=>0,
                                            ]);
                                            $user_info->wallet()->save($walet_info);

                                            return redirect()->route('signup.show',session('customer')->id);
                                        }

                                }
                                else
                                {
                                    return redirect()->back()->with('error',"somthing went worng");
                                }



           }
           else
           {
               return redirect()->route('userlogin');
               //nned to implement the user redirect to login page
           }

        }


    public function show($id)
    {
         $user_info=CustomerSignup::where('id',$id)->first();
         return view('customer.verify',["user_info"=>$user_info]);
    }




    public function userSingup($referal_id=null,$direct_ref=null)
    {
        Session::put('refer_id',$referal_id);
        Session::put('direct_ref',$direct_ref);
        return view('customer.Signup');
    }


    public function checkOtp(Request $request)
    {
            //check the user otp is matching or not

        $this->validate($request,[
            "otp"=>"required|min:4"
        ]);
        $id=$request->id;
        $user_info=CustomerSignup::where('id',$id)->first();
         Session::put("customer",$user_info);
          if($user_info->otp==$request->otp)
          {
               $user_info->otp=0;
               if($user_info->save())
               {
                  return redirect()->route('user.wallet');
               }
          }
          else
          {
              return redirect()->back()->with('error_status',"NOT A VALID OTP");
          }
    }

    public function MasterCustomerList()
    {

        $new_user=CustomerSignup::get();

       return  view('adminviews.mastercustomerlist',compact('new_user'));
    }



    public function CustomerDiable(Request $request)
    {
          $id=$request->id;
          $user=CustomerSignup::where('id',$id)->first();
          if($user->active_status==1)
          {
              $user->active_status=0;
              $user->save();
              return 1;
          }
          else
          {
              $user->active_status=1;
              $user->save();
              return 1;
          }
    }
}
