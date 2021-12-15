<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeartsRedemedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hearts_redemed', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('heart_redem_of_user')->unsigned();
            $table->foreign('heart_redem_of_user')->references('id')->on('table_customer');
            $table->bigInteger('hearts_redeemed');
            $table->string('redem_through');
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
        Schema::dropIfExists('hearts_redemed');
    }
}
