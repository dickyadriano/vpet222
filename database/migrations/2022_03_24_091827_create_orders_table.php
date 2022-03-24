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
            $table->integer('petShopID')->nullable();
            $table->integer('customerID')->nullable();
            $table->integer('productID')->nullable();
            $table->integer('medicineID')->nullable();
            $table->integer('groomingID')->nullable();
            $table->integer('petCareID')->nullable();
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
