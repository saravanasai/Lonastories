<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_customer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cus_phonenumber');
            $table->string('email');
            $table->date('dob');
            $table->string('otp');
            $table->string('refered_by')->default(0);
            $table->integer('status');
            $table->integer('active_status')->default(0);
            $table->string('cus_referal_code')->default(0);
            $table->string('ref_check')->default(0);
            $table->string('enquiery_form_status')->default('0');
            $table->string('mandatory_doc')->default('0')->comment("0 means not collected 1 means collected");
            $table->string('pr_form_status')->default('0')->comment("0 means not filled 1 means filled");
            $table->string('customer_one_view_status')->default('0')->comment("0 means not filled 1 means filled");
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
        Schema::dropIfExists('table_customer');
    }
}
