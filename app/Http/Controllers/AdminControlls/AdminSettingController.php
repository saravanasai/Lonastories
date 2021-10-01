<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

    public function PasswordresetIndex()
    {
        return view('adminsettings.passwordresetindex');
    }

    public function PasswordChange(Request $request)
    {
           $admin_info=admin::where('id',1)->first();
           $admin_info->ADMIN_PASSWORD=Hash::make($request->new_password);
            if($admin_info->save())
            {
                Session::pull('admin');
                Session::flash('passwordChanged','Password Updated');
                return redirect()->back();
            }
    }
}
