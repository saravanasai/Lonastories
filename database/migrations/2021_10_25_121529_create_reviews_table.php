<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('review_of_cus')->unsigned();
            $table->foreign('review_of_cus')->references('id')->on('table_customer');
            $table->bigInteger('review_for_product')->unsigned();
            $table->foreign('review_for_product')->references('id')->on('products');
            $table->string('comment');
            $table->integer('rating');
            $table->tinyInteger('aproval_status')->default(0)->comment('0 means waiting for aproval 1 means aproved 2 means not aporoved');
            $table->tinyInteger('delete_status')->default(0)->comment('0 means not deleted 1 means deleted');
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
        Schema::dropIfExists('reviews');
    }
}
