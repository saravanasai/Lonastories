<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExstingLoanInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exsting_loan_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ex_ln_info_of_user')->unsigned();
            $table->foreign('ex_ln_info_of_user')->references('id')->on('table_customer');
            $table->string('ex_info_bank_name')->nullable();
            $table->string('ex_info_ln_type')->nullable();
            $table->string('ex_info_ln_amount')->nullable();
            $table->string('ex_info_ln_roi')->nullable();
            $table->string('ex_info_ln_tennure')->nullable();
            $table->string('ex_info_ln_emi')->nullable();
            $table->string('ex_info_shedule_file')->nullable();
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
        Schema::dropIfExists('exsting_loan_infos');
    }
}
