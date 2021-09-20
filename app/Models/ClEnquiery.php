<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClEnquiery extends Model
{
    use HasFactory;

    protected $table="cl_enquieries";
    protected $fillable=
    [
        "enquiery_cus_ph",
        "enquiery_of_ucs",
        "companyname",
        "take_home_salary",
        "total_obligation",
        "no_of_credit_card",
        "no_of_credit_card_outstanding",
        "credit_card_obligation",
        "sa_ac_bank_id",
        "exiting_loan_product_id",
        "loan_product_sub_id",
        "final_obligation",
        "existing_foir",
        "loan_amount_required",
        "current_loation",
        "additional_details",
        "assign_to",
        "eq_status",
        "Final_assign_after_more_info_cl_tb",
        "ready_to_break_down",
        "overall_status_of_customer",
        "profile_gen_status",
        "profile_accepted_status",
        "enq_doc_name",
        "documents_collected_status",
        "con_lead_before_info",
        "created_at",
        "updated_at"
    ];

    public function breakdown()
    {
        return $this->hasMany(ObligationBreakDown::class,'ob_of_cus','id');
    }
}
