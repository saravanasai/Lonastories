<?php

namespace App\Models;

use App\Models\Cutomer\CustomerEnqieryForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSignup extends Model
{
    use HasFactory;

    protected $table="table_customer";

    protected $fillable=["name","cus_phonenumber","email","dob","opt","refered_by","status","cus_tb_assigned_to","active_status","cus_referal_code","ref_check","Final_assign_after_more_info_m_cus_tb","enquiery_form_status","mandatory_doc","pr_form_status","created_at","updated_at"];


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

}
