<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->date('tanggal_order');
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_barang');

            $table->foreign('id_customer')->references('id_customer')->on('Customer');
            $table->foreign('id_barang')->references('id_barang')->on('Product');

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
