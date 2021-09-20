<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeleCallerEnquieriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tele_caller_enquieries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('telecaller_id');
            $table->string('cus_id')->nullable()->default('0');
            $table->string('cus_first_name');
            $table->string('cus_last_name')->nullable();
            $table->string('cus_Phone_number')->unique();
            $table->string('cus_email')->unique()->nullable();
            $table->string('tl_table_assign_to')->nullable();
            $table->string('Final_assign_after_more_info_telecaller_table')->default('0');
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
        Schema::dropIfExists('tele_caller_enquieries');
    }
}
