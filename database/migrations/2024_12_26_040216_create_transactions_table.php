<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('email');
            $table->string('alamat_now');
            $table->string('alamat_ktp');
            $table->string('media_sosial');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->String('jaminan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
