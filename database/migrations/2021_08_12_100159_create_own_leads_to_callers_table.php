<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnLeadsToCallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('own_leads_to_callers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cus_m_tb_cus_id')->nullable()->unsigned();
            $table->foreign('cus_m_tb_cus_id')->references('id')->on('table_customer');
            $table->bigInteger('assigned_to_leader')->nullable()->unsigned();
            $table->foreign('assigned_to_leader')->references('id')->on('telecaller');
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
        Schema::dropIfExists('own_leads_to_callers');
    }
}
