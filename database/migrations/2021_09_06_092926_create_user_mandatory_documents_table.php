<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMandatoryDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mandatory_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('doc_of_user')->unsigned();
            $table->foreign('doc_of_user')->references('id')->on('table_customer');
            $table->string('Pan_card');
            $table->string('Adhar_card');
            $table->string('mandatory_doc_status')->default(0)->comment("0 means not docs submited 1 means submited");
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
        Schema::dropIfExists('user_mandatory_documents');
    }
}
