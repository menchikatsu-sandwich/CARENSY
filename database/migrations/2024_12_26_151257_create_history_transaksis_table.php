<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('histori_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('kode_transaksi')->unique();
            $table->string('alamat_now');
            $table->string('alamat_ktp');
            $table->string('email');
            $table->string('jaminan');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('histori_transaksis');
    }
};
