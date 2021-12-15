<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemarkTextToTableSuperRewardPointsGivens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('super_reward_points_givens', function (Blueprint $table) {
            $table->longText('remark_of_super_reward_point')->default(null);
            $table->tinyInteger('super_reward_point_redem_status')->default(1)->comment("1 means Active remark_of_super_reward_point means inactive");
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
            $table->dropColumn('remark_of_super_reward_point');
            $table->dropColumn('super_reward_point_redem_status');
        });
    }
}
