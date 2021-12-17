<?php
namespace App\Service;

use App\Models\Cutomer\SuperRewardPointsGiven;
use App\Models\Cutomer\SuperRewardPointsRedeemed;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletbyAdminService
{
     //handles the wallets of user
    public function handle(Request $request)
    {

        $table=$request->table;
        if($table==1)
        {
            //this section adds the value coins for user
           $user_wallet=Wallet::where('id',$request->wallet_id)->first();
           $user_wallet->value_coins=($user_wallet->value_coins+$request->chips_value);

           return ($user_wallet->save())?1:0;

        }
        elseif($table==3)
        {
            //this section actualy resets the value after giving cash to user
            $user_wallet=Wallet::where('id',$request->wallet_id)->first();

             //this section is to updating the points redeemed by user to "super_reward_points_redeemeds" table
             $redeemed_table=new  SuperRewardPointsRedeemed();
             $redeemed_table->spr_redem_of_user=$user_wallet->wallet_of_user;
             $redeemed_table->points_redeemed=$user_wallet->super_reward_point;
             //end for inserting data to SPR Redeems table
            $user_wallet->redeem_request=0;
            $user_wallet->enable_redeem=0;
            $user_wallet->super_reward_point=0;
            return ($user_wallet->save()&& $redeemed_table->save())?1:0;
        }
        else
        {
            $user_wallet=Wallet::where('id',$request->wallet_id)->first();
            $user_wallet->start_coins=$request->balance_stars;
            $user_wallet->value_coins=$request->balance_chips;
            $user_wallet->enable_redeem_srp=1;
             //this section add a records on "super_reward_points_givens" table in database
             $spr_given=new SuperRewardPointsGiven();
             $spr_given->spr_to_user=$user_wallet->wallet_of_user;
             $spr_given->points_given=$request->super_reward_points;
             $spr_given->remark_of_super_reward_point=$request->redem_text;
            return ($user_wallet->save() && $spr_given->save())?1:0;
        }
    }

}


?>
