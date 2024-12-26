<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('histori_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('histori_transaksi_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('price', 13, 2);
            $table->timestamps();
            $table->foreign('histori_transaksi_id')->references('id')->on('histori_transaksis')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('histori_items');
    }
};
