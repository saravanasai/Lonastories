<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExstingLoanInfo extends Model
{
    use HasFactory;
    protected $table="exsting_loan_infos";
    protected $fillable=[
        "ex_ln_info_of_user",
        "ex_info_bank_name",
        "ex_info_ln_type",
        "ex_info_ln_amount",
        "ex_info_ln_roi",
        "ex_info_ln_tennure",
        "ex_info_ln_emi",
        "ex_info_shedule_file"
    ];
}
