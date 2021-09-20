<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditBreakDownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_break_downs', function (Blueprint $table) {
            $table->id();
            $table->string('cr_to_enquiery')->nullable()->comment("to check for which enquiery is this breakdown for");
            $table->string('cr_of_cus')->nullable();
            $table->string('cr_Bank_name')->nullable();
            $table->string('cr_card_limit')->nullable();
            $table->string('cr_card_outstanding')->nullable();
            $table->string('cr_emi')->nullable();
            $table->string('cr_bt')->nullable()->comment("0 for NO & 1 for yes");
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
        Schema::dropIfExists('credit_break_downs');
    }
}
