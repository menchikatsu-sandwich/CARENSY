<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['kode_transaksi', 'user_id', 'email', 'alamat_now', 'alamat_ktp', 'media_sosial', 'tanggal_pinjam', 'tanggal_kembali'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }
}
