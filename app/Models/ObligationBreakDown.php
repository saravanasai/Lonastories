<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObligationBreakDown extends Model
{
    use HasFactory;
    protected $table="obligation_break_downs";
    protected $fillable=
    ["ob_to_enquiery",
    "ob_of_cus",
    "ob_Loan_type",
    "ob_Bank_name",
    "ob_Loan_amount",
    "ob_roi",
    "ob_tennure",
    "ob_emi",
    "ob_pos",
    "ob_bt"

    ];
}
