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
            $table->integer('productID')->default('0');
            $table->integer('medicineID')->default('0');
            $table->integer('serviceID')->default('0');
            $table->integer('groomingID')->default('0');
            $table->integer('petCareID')->default('0');
            $table->integer('vaccineID')->default('0');
            $table->string("orderType");
            $table->string("orderAmount");
            $table->integer("totalPrice");
            $table->longText("orderDetail");
            $table->string('orderStatus');
            $table->string('receiptImage');
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
