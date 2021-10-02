<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHlProfileAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hl_profile_additionals', function (Blueprint $table) {
            $table->id();
            $table->string('hl_to_enquiery')->comment("to check for which enquiery is this breakdown for");
            $table->string('hl_of_cus')->nullable();
            $table->string('hl_age')->nullable();
            $table->string('hl_property_type')->nullable();
            $table->string('hl_builder_name')->nullable();
            $table->string('hl_property_value')->nullable();
            $table->string('hl_property_area')->nullable();
            $table->string('hl_property_city')->nullable();
            $table->string('hl_gross_salary')->nullable();
            $table->string('hl_net_salary')->nullable();
            $table->string('hl_co_joint')->nullable();
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
        Schema::dropIfExists('hl_profile_additionals');
    }
}
