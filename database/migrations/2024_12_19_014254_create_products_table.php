<?php

// database/migrations/xxxx_xx_xx_create_products_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_product');
            $table->string('nama_product');
            $table->string('merek_product');
            $table->string('kategori_product');
            $table->text('detail_product');
            $table->date('tahun_rilis');
            $table->integer('stock');
            $table->decimal('harga_sewa', 8, 2);
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
