<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObligationBreakDownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obligation_break_downs', function (Blueprint $table) {
            $table->id();
            $table->string('ob_to_enquiery')->nullable()->comment("to check for which enquiery is this breakdown for");
            $table->string('ob_of_cus')->nullable();
            $table->string('ob_Loan_type')->nullable();
            $table->string('ob_Bank_name')->nullable();
            $table->string('ob_Loan_amount')->nullable();
            $table->string('ob_roi')->nullable();
            $table->string('ob_tennure')->nullable();
            $table->string('ob_emi')->nullable();
            $table->string('ob_comp_emi')->nullable();
            $table->string('ob_pos')->nullable();
            $table->string('ob_bt')->comment("0 for NO & 1 for yes");
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
        Schema::dropIfExists('obligation_break_downs');
    }
}
