<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperRewardPointsGiven extends Model
{
    use HasFactory;

    protected $table="super_reward_points_givens";

    protected $fillable=[
        "spr_to_user",
        "points_given"
    ];
}
