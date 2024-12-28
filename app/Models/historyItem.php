<?php

// app/Models/HistoriItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historyItem extends Model
{
    protected $fillable = [
        'histori_transaksi_id', 
        'product_id', 
        'quantity', 
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function historyTransaksi()
    {
        return $this->belongsTo(historyTransaksi::class, 'histori_transaksi_id');
    }

    protected $table = 'histori_items';
}


