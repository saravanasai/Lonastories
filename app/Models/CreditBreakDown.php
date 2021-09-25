<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditBreakDown extends Model
{
    use HasFactory;
    protected $table="credit_break_downs";
    protected $fillable=[
        "cr_to_enquiery",
        "cr_of_cus",
        "cr_Bank_name",
        "cr_card_limit",
        "cr_card_outstanding",
        "cr_emi",
        "cr_bt",
    ];
}
