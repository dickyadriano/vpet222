<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->integer('productID')->default('0');
            $table->integer('medicineID')->default('0');
            $table->integer('serviceID')->default('0');
            $table->integer('groomingID')->default('0');
            $table->integer('petCareID')->default('0');
            $table->string("orderType");
            $table->string("orderAmount");
            $table->longText("orderDetail");
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
        Schema::dropIfExists('carts');
    }
}
