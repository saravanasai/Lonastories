<?php

namespace App\Http\Controllers\AdminControlls;
use App\Http\Controllers\Controller;
use App\Models\CustomerSignup;
use App\Models\Cutomer\HeartsGive;
use App\Models\Cutomer\HeartsRedeemed;
use App\Models\Cutomer\SuperRewardPointsGiven;
use App\Models\Cutomer\SuperRewardPointsRedeemed;
use App\Models\Wallet;
use App\Service\TestService;
use App\Service\WalletbyAdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WalletControllerForAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_wallet=SuperRewardPointsGiven::where('redemed_payment_status',1)->paginate(10);

         return view('adminviews.RedeemRequestAdminSide',["user_wallet"=>$user_wallet]);



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
        $point_given_info=SuperRewardPointsGiven::where('spr_to_user',$id)->get();
        $points_redemed_info=SuperRewardPointsRedeemed::where('spr_redem_of_user',$id)->get();
        // dd($point_given_info->count()>0);
        if($point_given_info->count()>0)
        {
            return view('adminviews.HistoryOfWalletSingleUseradmin',["point_given_info"=>$point_given_info,"points_redemed_info"=>$points_redemed_info]);
        }
        else
        {
            Session::flash('nohistory',"NO TRNSACTION HISTORY AVAIABLE");
            return back();
        }

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
         //inserting into the SRP redeemed  table to show user transaction on rewards
         $points_redeem= new SuperRewardPointsRedeemed();
         $points_redeem->spr_redem_of_user= $id;
         $points_redeem->points_redeemed=$request->srp_points_given;

         //updating the SRP given table to notify that request have been payed
         $srp_given=SuperRewardPointsGiven::where('spr_to_user',$id)->where('redemed_payment_status',1)->first();
         $srp_given->redemed_payment_status=0;
         return  ($srp_given->save()&& $points_redeem->save())?1:0;

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


    public function pay($id)
    {
        $super_reward_point_given=SuperRewardPointsGiven::where('redemed_payment_status',1)->where('spr_to_user',$id)->first();

        return view('adminviews.PayToUserSuperRewardPoint',["srp_data"=>$super_reward_point_given]);
    }


    public function activeHeartsRedemRequest()
    {
        $user_wallet=HeartsGive::where('request_status',1)->paginate(10);
         return view('adminviews.activeHeartsRequestForAdmin',["user_wallet"=>$user_wallet]);
    }

    public function activeHeartsPayRequest(Request $request)
    {
         $hearts_given=HeartsGive::where('hearts_to_user',$request->id)
                        ->where('request_status',1)
                        ->where('active_status',1)
                        ->first();


        $hearts_given->request_status=0;
        $hearts_given->active_status=0;

          $heart_redeem=new HeartsRedeemed();
          $heart_redeem->heart_redem_of_user=$hearts_given->hearts_to_user;
          $heart_redeem->hearts_redeemed=$hearts_given->hearts_given;
          $heart_redeem->redem_through=$hearts_given->redem_through;

          return ($hearts_given->save() && $heart_redeem->save())?1:0;

    }
}
