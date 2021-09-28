<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperRewardPointsGivensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_reward_points_givens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('spr_to_user')->unsigned();
            $table->foreign('spr_to_user')->references('id')->on('table_customer');
            $table->bigInteger('points_given');
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
        Schema::dropIfExists('super_reward_points_givens');
    }
}
