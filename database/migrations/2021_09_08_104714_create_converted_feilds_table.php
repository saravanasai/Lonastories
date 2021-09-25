<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvertedFeildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('converted_feilds', function (Blueprint $table) {
            $table->id();
            $table->string('con_lead_of_enquiery')->comment("to check for which enquiery is this Converted Feilds for");
            $table->string('con_lead_of_cus')->nullable();
            $table->string('con_lead_bussiness_name')->nullable();
            $table->string('con_lead_lg_name')->nullable();
            $table->string('con_lead_lc_name')->nullable();
            $table->string('con_lead_source_team')->nullable();
            $table->string('con_lead_channel')->nullable();
            $table->string('con_lead_bank_name')->nullable();
            $table->string('con_lead_vendor_name')->nullable();
            $table->string('con_lead_loan_amount_applied')->nullable();
            $table->string('con_lead_product_name')->nullable();
            $table->string('con_lead_sub_product_name')->nullable();
            $table->string('con_lead_status')->nullable();
            $table->string('con_lead_remarks')->nullable();
            $table->string('con_lead_login_ref_no')->nullable();
            $table->string('con_lead_loan_amount_aproved')->nullable();
            $table->string('con_lead_roi')->nullable();
            $table->string('con_lead_tennure')->nullable();
            $table->string('con_lead_emi')->nullable();
            $table->string('con_lead_insurance_status')->nullable();
            $table->string('con_lead_pf_gst')->nullable();
            $table->string('con_lead_stamp_duty')->nullable();
            $table->string('con_lead_gap_inter_emi')->nullable();
            $table->string('con_lead_insurance_premium')->nullable();
            $table->string('con_lead_other_charges')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('converted_feilds');
    }
}
