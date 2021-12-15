<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRedemOptionToTablSuperRewardPointsRedeemedssuperRewardPointsRedeemeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('super_reward_points_redeemeds', function (Blueprint $table) {
            $table->string('redem_option')->after('points_redeemed')->comment("it store the option choosed by the user to redem");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('super_reward_points_redeemeds', function (Blueprint $table) {
            $table->dropColumn('redem_option');
        });
    }
}
