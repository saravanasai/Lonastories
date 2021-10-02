<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalBreakDownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_break_downs', function (Blueprint $table) {
            $table->id();
            $table->string('fn_to_enquiery')->comment("to check for which enquiery is this breakdown for");
            $table->string('fn_of_cus');
            $table->string('final_loan_amount');
            $table->string('final_rate_of_interest');
            $table->string('final_tennure');
            $table->string('final_emi');
            $table->string('final_proposed_total_emi');
            $table->string('final_current_foir');
            $table->string('final_proposed_foir');
            $table->string('Final_page_remarks');
            $table->string('final_mon_1_salary');
            $table->string('final_mon_2_salary');
            $table->string('final_mon_3_salary');
            $table->string('final_salary_considered');
            $table->string('final_obligation_considered');
            $table->string('final_ob_pos_sum_of_bt_yes');
            $table->string('final_ob_pos_sum_of_bt_no');
            $table->string('final_ob_emi_sum_of_bt_yes');
            $table->string('final_ob_emi_sum_of_bt_no');
            $table->string('final_cr_emi_sum_of_bt_yes');
            $table->string('final_cr_emi_sum_of_bt_no');
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
        Schema::dropIfExists('final_break_downs');
    }
}
