<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEnqieryForm extends Model
{
    use HasFactory;
    protected $table="customer_enqiery_forms";
    protected $fillable=[

        "time_to_call",
        "mode_of_contact",
        "product_type",
        "sub_product_type_eq_tb",
        "priority_for_personal_loan",
        "priority_for_home_loan",
        "emp_type",
        "working_from_home",
        "current_office_location",
        "current_residance_location",
        "current_residance_location",
        "loan_expected",
        "cibil_score",
        "cs_enq_status_enq_tb",
        "cs_enq_fn_status_enq_tb"
    ];

}
