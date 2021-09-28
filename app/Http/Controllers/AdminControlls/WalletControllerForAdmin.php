<?php

namespace App\Http\Controllers\AdminControlls;
use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\SuperRewardPointsGiven;
use App\Models\Cutomer\SuperRewardPointsRedeemed;
use App\Models\Wallet;
use App\Service\TestService;
use App\Service\WalletbyAdminService;
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
    public function store(Request $request,WalletbyAdminService $service)
    {

        $response=$service->handle($request);
        return $response;

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
