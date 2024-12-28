<?php

// app/Models/HistoriTransaksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class historyTransaksi extends Model
{
    protected $fillable = [
        'user_id', 
        'tanggal_pinjam', 
        'tanggal_kembali', 
        'kode_transaksi', 
        'alamat_now', 
        'alamat_ktp', 
        'email'
    ];

    public function historiItems()
    {
        return $this->hasMany(historyItem::class, 'histori_transaksi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'histori_transaksis';
}

