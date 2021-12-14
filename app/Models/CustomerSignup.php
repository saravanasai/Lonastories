<?php

namespace App\Models;

use App\Models\Cutomer\CustomerEnqieryForm;
use App\Models\Reviews\Reviews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class CustomerSignup extends Model
{
    use HasFactory,HasApiTokens;

    protected $table="table_customer";

    protected $fillable=["name","cus_phonenumber","email","dob","opt","refered_by","status","cus_tb_assigned_to","active_status","cus_referal_code","ref_check","Final_assign_after_more_info_m_cus_tb","enquiery_form_status","user_profile_img","mandatory_doc","pr_form_status","customer_one_view_status","PromoCode","created_at","updated_at"];


    public function bytelecaller()
    {
        return $this->belongsTo(caller::class,'refered_by','id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class,'wallet_of_user','id');
    }

    public function EnquieryFormOf()
    {
        return $this->hasMany(CustomerEnqieryForm::class,'eqy_of_cus_enq_tb','id');
    }
    public function Clenquiery()
    {
        return $this->hasMany(ClEnquiery::class,'enquiery_of_ucs','id');
    }
    public function breakdown()
    {
        return $this->hasMany(ObligationBreakDown::class,'ob_of_cus','id');
    }
    public function Cardbreakdown()
    {
        return $this->hasMany(CreditBreakDown::class,'cr_of_cus','id');
    }
    public function Mleligibility()
    {
        return $this->hasMany(MultiplierEligibility::class,'el_of_cus','id');
    }
    public function Finalbreakdown()
    {
        return $this->hasMany(FinalBreakDown::class,'fn_of_cus','id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class,'review_of_cus','id');
    }
}
