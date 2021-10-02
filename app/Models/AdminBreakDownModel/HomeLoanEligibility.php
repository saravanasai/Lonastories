<?php

namespace App\Models\AdminBreakDownModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLoanEligibility extends Model
{
    use HasFactory;

     protected $table="home_loan_eligibilities";

     protected $fillable=[
         "hl_el_to_enquiery",
         "hl_el_of_cus",
         "hl_bank_name",
         "hl_ltv",
         "hl_ltv_eligibility",
         "hl_foir",
         "hl_roi",
         "hl_tenure",
         "hl_emi_per_lak",
         "hl_emi_foir_eligibility",
       ];
}
