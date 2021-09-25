<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wallet_of_user')->unsigned();
            $table->foreign('wallet_of_user')->references('id')->on('table_customer');
            $table->bigInteger('start_coins');
            $table->bigInteger('value_coins');
            $table->bigInteger('heart_coins');
            $table->bigInteger('super_reward_point');
            $table->tinyInteger('enable_redeem')->default(0)->comment("0 means disabled 1 means enabled");
            $table->tinyInteger('redeem_request')->default(0)->comment("0 means No request 1 means requested");
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
        Schema::dropIfExists('wallets');
    }
}
