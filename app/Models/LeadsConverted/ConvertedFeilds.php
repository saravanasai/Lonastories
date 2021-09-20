<?php

namespace App\Models\LeadsConverted;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConvertedFeilds extends Model
{
    use HasFactory;
    protected $table="converted_feilds";

    protected $fillable=[
        "con_lead_of_enquiery",
        "con_lead_of_cus",
        "con_lead_bussiness_name",
        "con_lead_lg_name",
        "con_lead_lc_name",
        "con_lead_source_team",
        "con_lead_channel",
        "con_lead_bank_name",
        "con_lead_vendor_name",
        "con_lead_loan_amount_applied",
        "con_lead_product_name",
        "con_lead_sub_product_name",
        "con_lead_status",
        "con_lead_remarks",
        "con_lead_login_ref_no",
        "con_lead_loan_amount_aproved",
        "con_lead_roi",
        "con_lead_tennure",
        "con_lead_emi",
        "con_lead_insurance_status",
        "con_lead_pf_gst",
        "con_lead_stamp_duty",
        "con_lead_gap_inter_emi",
        "con_lead_insurance_premium",
        "con_lead_other_charges"
    ];
}
