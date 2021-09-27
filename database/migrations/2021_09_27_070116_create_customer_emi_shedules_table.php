<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerEmiShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_emi_shedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('emi_shedule_of_user')->unsigned();
            $table->foreign('emi_shedule_of_user')->references('id')->on('table_customer');
            $table->string('emi_sh_name_of_bank');
            $table->string('emi_sh_type_of_loan');
            $table->string('emi_sh_loan_amount');
            $table->string('emi_sh_roi');
            $table->string('emi_sh_tenure');
            $table->string('emi_sh_emi');
            $table->string('emi_sh_file');
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
        Schema::dropIfExists('customer_emi_shedules');
    }
}
