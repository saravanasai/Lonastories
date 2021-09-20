<?php

namespace App\Models\AdminBreakDownModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hl_profile_loan_comparison extends Model
{
    use HasFactory;
    protected $table="hl_profile_loan_comparisons";
    protected $fillable=[
        "ln_com_to_enquiery",
        "ln_com_of_cus",
        "ex_ln_loan_amount",
        "ex_ln_tennure",
        "ex_ln_roi",
        "ex_ln_emi",
        "ex_ln_pos",
        "ex_ln_no_of_emi_paid",
        "ex_ln_balance_emi",
        "ex_ln_exsting_out_flow",
        "ln_com_new_loan_amount",
        "ln_com_new_roi",
        "ln_com_new_tennure",
        "ln_com_new_emi",
        "ln_com_new_proposed_outflow",
        "ln_com_new_gross_sav",
        "ln_com_motd",
        "ln_com_pro_fee",
        "ln_com_ot_charges",
        "ln_com_total_cost",
        "ln_com_net_sav",
    ];
}
