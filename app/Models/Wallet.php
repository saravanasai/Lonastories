<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable=[
        "start_coins",
        "value_coins",
        "heart_coins",
        "super_reward_point",
        "enable_redeem",
        "redeem_request",
    ];


    protected $table="wallets";
}
