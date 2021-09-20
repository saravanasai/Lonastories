<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalBreakDown extends Model
{
    use HasFactory;

    protected $table="final_break_downs";
    protected $fillable=[

        "fn_to_enquiery",
        "fn_of_cus",
        "final_loan_amount",
        "final_rate_of_interest",
        "final_tennure",
        "final_emi",
        "final_proposed_total_emi",
        "final_current_foir",
        "final_proposed_foir",
        "final_salary_considered",
        "final_obligation_considered",
        "final_ob_pos_sum_of_bt_yes",
        "final_ob_pos_sum_of_bt_no",
        "final_ob_emi_sum_of_bt_yes",
        "final_ob_emi_sum_of_bt_no",
        "final_cr_emi_sum_of_bt_yes",
        "final_cr_emi_sum_of_bt_no",
    ];
}
