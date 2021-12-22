<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuddyFormInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddy_form_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_of_user');
            $table->foreign('form_of_user')->references('id')->on('table_customer');
            $table->unsignedBigInteger('for_form');
            $table->foreign('for_form')->references('id')->on('buddy_forms');
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
        Schema::dropIfExists('buddy_form_infos');
    }
}
