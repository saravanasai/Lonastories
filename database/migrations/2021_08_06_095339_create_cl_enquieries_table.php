<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClEnquieriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cl_enquieries', function (Blueprint $table) {
            $table->id();
            $table->string('enquiery_cus_ph');
            $table->bigInteger('enquiery_of_ucs')->nullable();
            $table->string('initial_assign_to')->nullable();
            $table->string('companyname')->nullable();
            $table->string('take_home_salary')->nullable();
            $table->string('total_obligation')->nullable();
            $table->string('no_of_credit_card')->nullable();
            $table->string('no_of_credit_card_outstanding')->nullable();
            $table->string('credit_card_obligation')->nullable();
            $table->string('sa_ac_bank_id')->nullable();
            $table->bigInteger('loan_product_id')->unsigned();
            $table->foreign('loan_product_id')->references('id')->on('products');
            $table->bigInteger('loan_product_sub_id')->unsigned();
            $table->foreign('loan_product_sub_id')->references('id')->on('subproducts');
            $table->string('final_obligation')->nullable();
            $table->string('existing_foir')->nullable();
            $table->string('loan_amount_required')->nullable();
            $table->string('current_loation')->nullable();
            $table->string('additional_details')->nullable();
            $table->string('eq_status')->default('1');
            $table->string('Final_assign_after_more_info_cl_tb')->default('0');
            $table->string('ready_to_break_down')->default('0')->comment('0 means not breakDown finished 1 means breakdown Done');
            $table->string('overall_status_of_customer')->default('1');
            $table->string('profile_gen_status')->default('0')->comment('0 means profile not generated 1 means profile generated');
            $table->string('profile_accepted_status')->default('0')->comment('0 means waiting 1 means accepted 2 means rejected');
            $table->string('enq_doc_name')->comment('Name of a Document in File Storage');
            $table->string('documents_collected_status')->default('0')->comment('0 means pending 1 means Document Collected');
            $table->string('con_lead_before_info')->default('0')->comment('0 means Not Filled 1 means Filled');
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
        Schema::dropIfExists('cl_enquieries');
    }
}
