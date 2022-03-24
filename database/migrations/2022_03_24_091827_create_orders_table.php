<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('userID');
            $table->integer('productID');
            $table->integer('medicineID');
            $table->integer('groomingID');
            $table->integer('petCareID');
            $table->string("orderType");
            $table->string("orderAmount");
            $table->longText("orderDetail");
            $table->string('orderStatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
