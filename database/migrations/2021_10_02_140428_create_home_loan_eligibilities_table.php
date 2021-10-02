<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeLoanEligibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_loan_eligibilities', function (Blueprint $table) {
            $table->id();
            $table->string('hl_el_to_enquiery')->comment("to check for which enquiery is this breakdown for");
            $table->string('hl_el_of_cus');
            $table->string('hl_bank_name');
            $table->string('hl_ltv');
            $table->string('hl_ltv_eligibility');
            $table->string('hl_foir');
            $table->string('hl_roi');
            $table->string('hl_tenure');
            $table->string('hl_emi_per_lak');
            $table->string('hl_emi_foir_eligibility');
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
        Schema::dropIfExists('home_loan_eligibilities');
    }
}
