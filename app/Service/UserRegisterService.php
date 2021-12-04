<?php

namespace App\Service;

use App\Models\ClEnquiery;
use App\Models\CustomerSignup;
use App\Models\Cutomer\DirectReferal;
use App\Models\TeleCallerEnquiery;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class UserRegisterService
{
    public function RegisterUser()
    {
        $ref_id = session('refer_id');

        if ($ref_id == null) {
            $ref_id = 0;
        }
        $signup = new CustomerSignup();
        $signup->name = session('signUpInfo')['name'];
        $signup->email = session('signUpInfo')['email'];
        $signup->cus_phonenumber = session('signUpInfo')['phonenumber'];
        $signup->dob = session('signUpInfo')['date'];
        $signup->refered_by = $ref_id;
        $signup->status = 1;
        $signup->otp = 0;
        $signup->cus_referal_code = "LN" . floor(time() - 999999999) . "CS";
        $signup->PromoCode = session('signUpInfo')['PromoCode'];
        Session::pull('signUpInfo');
        Session::pull('userOtp');
        Session::pull('refer_id');
        return ($signup->save()) ? true : false;
    }

    public function BonusForReferedUser()
    {
        $direct_ref = session('direct_ref');
        $refered_customer = CustomerSignup::where('cus_referal_code', '=', session('customer')->refered_by)->where('ref_check', '=', 0)->first();
        if ($refered_customer != null) {
            //adding coins to reffered customer
            $refered_customer_wallet = Wallet::where('wallet_of_user', '=', $refered_customer->id)->first();
            $new_cutomer_dob_year = Carbon::parse(session('customer')->dob)->year;
            // dd($refered_customer_wallet);
            //it works if the direct referal is on there
            if ($direct_ref != null || true) {
                $direct_ref_table = DirectReferal::where('refered_cus_phonenumber', session('customer')->cus_phonenumber)
                    ->where('refered_verification', 0)->first();
                if ($direct_ref_table != null) {
                    $direct_ref_table->refered_verification = 1;
                    $direct_ref_table->refered_cus_name = session('customer')->name;
                    $direct_ref_table->refered_cus_email = session('customer')->email;
                    $direct_ref_table->save();
                    $refered_customer_wallet->heart_coins = $refered_customer_wallet->heart_coins + ($new_cutomer_dob_year * 2);
                } else {
                    $refered_customer_wallet->heart_coins = $refered_customer_wallet->heart_coins + $new_cutomer_dob_year;
                }
            } else {
                $refered_customer_wallet->heart_coins = $refered_customer_wallet->heart_coins + $new_cutomer_dob_year;
            }
            $direct_ref_table = DirectReferal::where('refered_cus_phonenumber', session('customer')->cus_phonenumber)
                ->where('refered_verification', 0)->first();
            if ($direct_ref_table != null) {
                $direct_ref_table->refered_verification = 1;
                $direct_ref_table->refered_cus_name = session('customer')->name;
                $direct_ref_table->refered_cus_email = session('customer')->email;
                $direct_ref_table->save();
                $refered_customer_wallet->heart_coins = $refered_customer_wallet->heart_coins + ($new_cutomer_dob_year * 2);
            } else {
                $refered_customer_wallet->heart_coins = $refered_customer_wallet->heart_coins + $new_cutomer_dob_year;
            }

            $refered_customer_wallet->save();
            $user_ref_check = CustomerSignup::where('cus_phonenumber', session('customer')->cus_phonenumber)->first();
            $user_ref_check->ref_check = 0;
            $user_ref_check->save();
        }
        //section end to check weather the user is refferd by Customer
    }


    public function MatchTelecallerEnquiery()
    {

        $tele_caller = TeleCallerEnquiery::where('cus_Phone_number',  session('customer')->phonenumber)->first();
        $user_info = CustomerSignup::find(session('customer')->id);
        $link_to_more_details = ClEnquiery::where('enquiery_cus_ph', session('customer')->phonenumber)->first();
        //section to validate if the its a tellecaller referal
        if ($tele_caller != null) {
            $link_to_more_details->enquiery_of_ucs = $user_info->id;
            $user_info->refered_by = $tele_caller->telecaller_id;
            $tele_caller->cus_id = $user_info->id;
            return ($tele_caller->save() && $link_to_more_details->save()) ? true : false;
        }
        //end section to validate if the its a tellecaller referal
    }



    public function UserWalletGeneration()
    {
        $user_info = CustomerSignup::find(session('customer')->id);
        $year = Carbon::parse(session('customer')->dob)->year;
        $total_start_coins = $year;
        $walet_info = $user_info->wallet()->create([
            "start_coins" => $total_start_coins,
            "value_coins" => 0,
            "heart_coins" => 0,
        ]);
        return  $user_info->wallet()->save($walet_info) ? true : false;
    }
}
