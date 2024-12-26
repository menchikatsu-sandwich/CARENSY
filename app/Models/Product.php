<?php

// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_product',
        'nama_product',
        'merek_product',
        'kategori_product',
        'detail_product',
        'tahun_rilis',
        'stock',
        'harga_sewa',
        'image',
    ];

    // Relasi dengan CartItem
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
