<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiplierEligibility extends Model
{
    use HasFactory;
    protected $table="multiplier_eligibilities";
    protected $fillable=[
        "el_to_enquiery",
        "el_of_cus",
        "el_Bank_name",
        "el_employee_category",
        "el_multiplier",
        "el_foir",
        "el_mutiplier_eligibility",
        "el_roi",
        "el_emi_per_lak",
        "el_foir_eligibility",
    ];
}
