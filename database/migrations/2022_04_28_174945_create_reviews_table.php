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
            $table->integer('userID');
            $table->integer('productID')->default('0');
            $table->integer('medicineID')->default('0');
            $table->integer('serviceID')->default('0');
            $table->integer('groomingID')->default('0');
            $table->integer('petCareID')->default('0');
            $table->integer('vaccineID')->default('0');
            $table->integer('rate');
            $table->string('description');
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
