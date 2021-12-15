<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeartsRedeemed extends Model
{
    use HasFactory;
    protected $table="hearts_redemed";

    protected $fillable=[
        "heart_redem_of_user",
        "hearts_redeemed",
        "redem_thorugh"
    ];
}
