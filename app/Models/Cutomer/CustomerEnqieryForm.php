<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEnqieryForm extends Model
{
    use HasFactory;
    protected $table="customer_enqiery_forms";
    protected $fillable=[
        "eqy_of_cus_enq_tb",
        "initial_assign_to",
        "Product_intrested",
        "Loan_Amount",
        "Preferred_Bank_Name",
        "City_Name",
        "how_soon",
        "enq_date",
        "enq_time",
        "mode_to_connect",
        "cs_enq_status_enq_tb",
        "cs_enq_fn_status_enq_tb"
    ];

}
