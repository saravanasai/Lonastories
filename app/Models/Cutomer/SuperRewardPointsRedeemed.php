<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperRewardPointsRedeemed extends Model
{
    use HasFactory;

    protected $table="super_reward_points_redeemeds";

    protected $fillable=[
        "spr_redem_of_user",
        "points_redeemed",
        "redem_option"
    ];
}
