<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_no',
        'tgl_pinjam',
        'tgl_kembali',
        'transaction_id',
        'jaminan'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}