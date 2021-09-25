<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectReferalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_referals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('direct_ref_of_user')->unsigned();
            $table->foreign('direct_ref_of_user')->references('id')->on('table_customer');
            $table->string('refered_cus_name')->nullable();
            $table->string('refered_cus_phonenumber')->nullable();
            $table->string('refered_cus_email')->nullable();
            $table->string('refered_cus_relationship')->nullable();
            $table->string('refered_url')->nullable();
            $table->string('refered_verification')->default(0)->comment('0 means not verified 1 means verified');
            $table->string('s_del_dir_ref')->default(0)->comment('0 means not deleted 1 means deleted');
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
        Schema::dropIfExists('direct_referals');
    }
}
