<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEmiShedule extends Model
{
    use HasFactory;

    protected $table="customer_emi_shedules";
    protected $fillable=[
        "emi_shedule_of_user",
        "emi_sh_name_of_bank",
        "emi_sh_type_of_loan",
        "emi_sh_loan_amount",
        "emi_sh_roi",
        "emi_sh_tenure",
        "emi_sh_emi",
        "emi_sh_file"
    ];
}
