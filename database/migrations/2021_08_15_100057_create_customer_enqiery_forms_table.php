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
            $table->string('time_to_call')->nullable();
            $table->string('mode_of_contact')->nullable();
            $table->bigInteger('product_type')->unsigned();
            $table->foreign('product_type')->references('id')->on('products');
            $table->bigInteger('sub_product_type_eq_tb')->unsigned();
            $table->foreign('sub_product_type_eq_tb')->references('id')->on('subproducts');
            $table->string('priority_for_personal_loan')->nullable();
            $table->string('priority_for_home_loan')->nullable();
            $table->string('emp_type')->nullable();
            $table->string('working_from_home')->nullable();
            $table->string('current_office_location')->nullable();
            $table->string('current_residance_location')->nullable();
            $table->string('loan_expected')->nullable();
            $table->string('cibil_score')->nullable();
            $table->string('cs_enq_status_enq_tb')->default('1');
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
