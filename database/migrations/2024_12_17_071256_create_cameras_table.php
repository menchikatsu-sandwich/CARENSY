<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('merk');
            $table->decimal('harga',8, 2);
            $table->integer('stock');
            $table->text('detail_barang');
            $table->year('tahun_rilis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cameras');
    }
};
