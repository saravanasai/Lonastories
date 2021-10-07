<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiplierEligibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiplier_eligibilities', function (Blueprint $table) {
            $table->id();
            $table->string('el_to_enquiery')->comment("to check for which enquiery is this breakdown for");
            $table->string('el_of_cus');
            $table->string('el_Bank_name');
            $table->string('el_employee_category');
            $table->string('el_multiplier');
            $table->string('el_foir');
            $table->string('el_mutiplier_eligibility_nth');
            $table->string('el_mutiplier_eligibility_sao');
            $table->string('el_roi');
            $table->string('el_emi_per_lak');
            $table->string('el_foir_eligibility');
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
        Schema::dropIfExists('multiplier_eligibilities');
    }
}
