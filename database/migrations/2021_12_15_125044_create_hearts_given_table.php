<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeartsGivenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hearts_given', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hearts_to_user')->unsigned();
            $table->foreign('hearts_to_user')->references('id')->on('table_customer');
            $table->bigInteger('hearts_given');
            $table->string('redem_through');
            $table->tinyInteger('request_status')->default(1)->comment('1 means active for redem 0 means redemed');
            $table->tinyInteger('active_status')->default(1)->comment('1 means active for redem 0 means in active');
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
        Schema::dropIfExists('hearts_given');
    }
}
