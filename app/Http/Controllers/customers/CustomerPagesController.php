<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEmiShedule;
use App\Models\Cutomer\SuperRewardPointsGiven;
use App\Models\Cutomer\SuperRewardPointsRedeemed;
use App\Models\Products;
use App\Models\Reviews\Reviews;
use App\Models\Wallet;
use Illuminate\Http\Request;

class CustomerPagesController extends Controller
{
    public function privacy_policy()
    {
        return view('frontend.pages.privacy_policy');
    }
    public function reviews()
    {
        $reviews=Reviews::where('aproval_status',1)->where('delete_status',0)->get();
        // dd($reviews);
        return view('frontend.pages.reviews',["products"=>Products::all(),"reviews"=>$reviews]);
    }
    public function connect()
    {
        return view('frontend.pages.connect');
    }
    public function About()
    {
        return view('frontend.pages.About');
    }
    public function PersonalLoan()
    {
        return view('frontend.pages.PersonalLoan');
    }
    public function HomeLoan()
    {
        return view('frontend.pages.HomeLoan');
    }
    public function Mortages()
    {
        return view('frontend.pages.Mortages');
    }
    public function BusinessLoan()
    {
        return view('frontend.pages.BusinessLoan');
    }
    public function EducationLoan()
    {
        return view('frontend.pages.EducationLoan');
    }
    public function FAQ()
    {
        return view('frontend.pages.FAQ');
    }
    public function Documents()
    {
        return view('frontend.pages.Documents');
    }

    public function profile() //This to be rename Profile
    {
        $profile_info=Wallet::where('wallet_of_user',session('customer')->id)->first();
        $user_info=CustomerSignup::where('id',session('customer')->id)->first();
        $points_given=SuperRewardPointsGiven::where('spr_to_user',session('customer')->id)->sum('points_given');
        $points_Redemed=SuperRewardPointsRedeemed::where('spr_redem_of_user',session('customer')->id)->sum('points_redeemed');
        return view('frontend.pages.profile',["wallet_info"=>$profile_info,"points_Redemed"=>$points_Redemed,"points_given"=>$points_given,"user_info"=>$user_info]);
    }

    public function myWallet()
    {
        $wallet_info=Wallet::where('wallet_of_user',session('customer')->id)->first();
        $points_given=SuperRewardPointsGiven::where('spr_to_user',session('customer')->id)->sum('points_given');
        $points_Redemed=SuperRewardPointsRedeemed::where('spr_redem_of_user',session('customer')->id)->sum('points_redeemed');

        return view('frontend.pages.myWallet',["wallet_info"=>$wallet_info,"points_Redemed"=>$points_Redemed,"points_given"=>$points_given]);
    }

    public function OneView()
    {
        $emi_shedule=CustomerEmiShedule::where('emi_shedule_of_user',session('customer')->id)->get();
        return view('frontend.pages.OneView',["emi_shedules"=>$emi_shedule]);
    }

    public function Meter()
    {
        return view('frontend.pages.EmiMeter');
    }

    public function personalInfoFill()
    {
        return view('frontend.pages.personalInfoFill');
    }
    public function personalLoanEmiCalc()
    {
        return view('frontend.pages.personalLoanEmiCalc');
    }
    public function homeLoanEmiCalc()
    {
        return view('frontend.pages.homeLoanEmiCalc');
    }
    public function partPayCalc()
    {
        return view('frontend.pages.partPayCalc');
    }
    public function personalEligibilityCalc()
    {
        return view('frontend.pages.personalEligibilityCalc');
    }
    public function homeEligibilityCalc()
    {
        return view('frontend.pages.homeEligibilityCalc');
    }
}
