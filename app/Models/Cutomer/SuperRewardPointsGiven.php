<?php

namespace App\Models\Cutomer;

use App\Models\CustomerSignup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperRewardPointsGiven extends Model
{
    use HasFactory;

    protected $table="super_reward_points_givens";

    protected $fillable=[
        "spr_to_user",
        "points_given",
        "remark_of_super_reward_point",
        "super_reward_point_redem_status",
    ];



    public function  userInfo()
    {
        return $this->belongsTo(CustomerSignup::class,'spr_to_user','id');
    }
}
