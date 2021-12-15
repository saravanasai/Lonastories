<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRedemOptionToSuperRewardPointsGivens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('super_reward_points_givens', function (Blueprint $table) {
            $table->string('redem_option');
            $table->tinyInteger('redem_status')->default(1)->comment("1 means active 0  means inactive");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('super_reward_points_givens', function (Blueprint $table) {
            $table->dropColumn('redem_option');
            $table->dropColumn('redem_status');
        });
    }
}
