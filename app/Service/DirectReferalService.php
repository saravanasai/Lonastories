<?php
namespace App\Service;

use App\Models\CustomerSignup;
use App\Models\Cutomer\DirectReferal;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DirectReferalService{

   public function checkReferalExits($phonenumber)
   {
       $exist=DirectReferal::where('refered_cus_phonenumber',$phonenumber)->first();
       $cus_exist=CustomerSignup::where('cus_phonenumber',$phonenumber)->first();
       return  ($exist==null&&$cus_exist==null)?true:false;
   }

   public function AddDirectReferal($request)
   {
         //validation have been skipped due to froentend Validation
         $get_user_referal_id=CustomerSignup::where('id','=',session('customer')->id)->first();
         $url=url('/')."/user/signup/".$get_user_referal_id->cus_referal_code."/referal/2x";
         $direct_referal= new DirectReferal();
         $direct_referal->direct_ref_of_user=$get_user_referal_id->id;
         $direct_referal->refered_cus_name=$request->refer_to_cus_name;
         $direct_referal->refered_cus_phonenumber=$request->refer_to_cus_phonenumber;
         $direct_referal->refered_cus_relationship=$request->refer_to_relationship;
         $direct_referal->refered_url=$url;
         if($direct_referal->save())
         {
             Log::channel('telecallerlink')->info($url);
             //message intergration is needed to be done here
             // Mail::to($request->refer_to_cus_email)->send(new DirectReferalLink($url));
             return true;
         }
   }

   public function points_to_refered_cus($id,$request)
   {
       $customer_wallet=Wallet::where('wallet_of_user',$id)->first();
       $new_cutomer_dob_year=Carbon::parse($request->dob)->year;
       $customer_wallet->heart_coins=$customer_wallet->heart_coins+($new_cutomer_dob_year*2);
       if($customer_wallet->save())
       {
           return true;
       }
   }

   public function update_to_direct_ref($phonenumber)
   {
    //    dd($phonenumber);
        $direct_ref=DirectReferal::where('refered_cus_phonenumber',$phonenumber)->first();
        $direct_ref->refered_verification=1;
        if($direct_ref->save())
        {
            return true;
        }
   }

   public function register_customer($request)
   {
        $new_customer=new CustomerSignup();
        $new_customer->name=$request->username;
        $new_customer->email=$request->email;
        $new_customer->cus_phonenumber=$request->phonenumber;
        $new_customer->dob=$request->dob;
        $new_customer->refered_by=$request->ref_by_cus;
        $new_customer->status=1;
        $new_customer->enquiery_form_status=0;
        $new_customer->otp=0;
          if($new_customer->save())
          {
             $customer=CustomerSignup::where('cus_phonenumber',$request->phonenumber)->first();
             $customer->cus_referal_code="LN".$customer->id."CS";
             $year=Carbon::parse($customer->dob)->year;
             $total_start_coins=$year;
             // dd($total_start_coins);
             $walet_info=$customer->wallet()->create([
                 "start_coins"=>$total_start_coins,
                 "value_coins"=>0,
                 "heart_coins"=>0,
             ]);
             $cus_info=$customer;
             if($customer->wallet()->save($walet_info) && $customer->save())
             {
                 return $cus_info;
             }
          }
   }



}

?>
