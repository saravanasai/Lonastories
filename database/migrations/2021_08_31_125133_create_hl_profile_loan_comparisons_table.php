<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHlProfileLoanComparisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hl_profile_loan_comparisons', function (Blueprint $table) {
            $table->id();
            $table->string('ln_com_to_enquiery')->comment("to check for which enquiery is this breakdown for");
            $table->string('ln_com_of_cus')->nullable();
            $table->string('ex_ln_loan_amount')->nullable();
            $table->string('ex_ln_tennure')->nullable();
            $table->string('ex_ln_roi')->nullable();
            $table->string('ex_ln_emi')->nullable();
            $table->string('ex_ln_pos')->nullable();
            $table->string('ex_ln_no_of_emi_paid')->nullable();
            $table->string('ex_ln_balance_emi')->nullable();
            $table->string('ex_ln_exsting_out_flow')->nullable();
            $table->string('ln_com_new_loan_amount')->nullable();
            $table->string('ln_com_new_roi')->nullable();
            $table->string('ln_com_new_tennure')->nullable();
            $table->string('ln_com_new_emi')->nullable();
            $table->string('ln_com_new_proposed_outflow')->nullable();
            $table->string('ln_com_new_gross_sav')->nullable();
            $table->string('ln_com_motd')->nullable();
            $table->string('ln_com_pro_fee')->nullable();
            $table->string('ln_com_ot_charges')->nullable();
            $table->string('ln_com_total_cost')->nullable();
            $table->string('ln_com_net_sav')->nullable();
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
        Schema::dropIfExists('hl_profile_loan_comparisons');
    }
}
