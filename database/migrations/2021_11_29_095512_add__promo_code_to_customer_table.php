<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPromoCodeToCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_customer', function (Blueprint $table) {
             $table->tinyText("PromoCode")->after("refered_by")->default("DIRECT");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_customer', function (Blueprint $table) {
            //
            $table->dropColumn('PromoCode');
        });
    }
}
