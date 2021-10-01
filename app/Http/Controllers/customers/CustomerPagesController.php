<?php

namespace App\Http\Controllers\customers;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\CustomerEmiShedule;
use App\Models\Wallet;
use Illuminate\Http\Request;

class CustomerPagesController extends Controller
{
    public function privacy_policy()
    {
        return view('frontend.pages.privacy_policy');
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
    public function Documents()
    {
        return view('frontend.pages.Documents');
    }

    public function OneView()
    {
        // $emi_shedule=CustomerEmiShedule::where('id',session('customer')->id)->get();

        // return view('frontend.pages.OneView',["emi_shedules"=>$emi_shedule]);
        return view('frontend.pages.OneView');
    }

    public function wallet()
    {
        // $wallet_info=Wallet::where('wallet_of_user',session('customer')->id)->first();
        // return view('frontend.pages.wallet',["wallet_info"=>$wallet_info]);
        return view('frontend.pages.wallet');
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
    public function Meter()
    {
        return view('frontend.pages.EmiMeter');
    }
}