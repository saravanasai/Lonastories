<?php

namespace App\Http\Controllers\AdminControlls;

use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletControllerForAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table=$request->table;
        if($table==1)
        {
           $user_wallet=Wallet::where('id',$request->wallet_id)->first();
           $user_wallet->value_coins=($user_wallet->value_coins+$request->chips_value);

           return ($user_wallet->save())?1:0;

        }
        elseif($table==3)
        {
            $user_wallet=Wallet::where('id',$request->wallet_id)->first();
            $user_wallet->redeem_request=0;
            $user_wallet->enable_redeem=0;
            $user_wallet->super_reward_point=0;
            return ($user_wallet->save())?1:0;
        }
        else
        {
            $user_wallet=Wallet::where('id',$request->wallet_id)->first();
            $user_wallet->start_coins=$request->balance_stars;
            $user_wallet->value_coins=$request->balance_chips;
            $user_wallet->heart_coins=$request->balance_hearts;
            $user_wallet->super_reward_point=($user_wallet->super_reward_point+$request->super_reward_points);
            return ($user_wallet->save())?1:0;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user_wallet=CustomerSignup::join('wallets','table_customer.id','=','wallets.wallet_of_user')
         ->select('table_customer.*','wallets.*','wallets.id as wallet_id')->where('table_customer.id',$id)->first();
        // dd($user_wallet);
         return view('adminviews.WalletOfSingleUser',["user_wallet"=>$user_wallet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
