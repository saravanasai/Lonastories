<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{

    public function RedeemSettingIndex()
    {
        return view('adminsettings.Redeemsetting');
    }
    public function enableRedeem(Request $request)
    {
         $enable_status=Wallet::query()->update(['enable_redeem'=>$request->enable]);
         if($enable_status)
         {
            return back()->with('success',"ENABLED REDEEM OPTION FOR ALL USERS");
         }
    }
}
