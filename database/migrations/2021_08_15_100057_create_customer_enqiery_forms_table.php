<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerEnqieryFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_enqiery_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('eqy_of_cus_enq_tb')->unsigned();
            $table->foreign('eqy_of_cus_enq_tb')->references('id')->on('table_customer');
            $table->string('initial_assign_to')->nullable();
            $table->bigInteger('Product_intrested')->unsigned();
            $table->foreign('Product_intrested')->references('id')->on('products');
            $table->string('Loan_Amount')->nullable();
            $table->string('Preferred_Bank_Name')->nullable();
            $table->string('City_Name')->nullable();
            $table->string('how_soon')->nullable();
            $table->date('enq_date')->nullable();
            $table->time('enq_time',$precision=0)->nullable();
            $table->string('mode_to_connect')->nullable();
            $table->string('cs_enq_status_enq_tb')->default('1');
            $table->string('cs_enq_fn_status_enq_tb')->default('0')->comment('0 means active 1 means closed');
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
        Schema::dropIfExists('customer_enqiery_forms');
    }
}
