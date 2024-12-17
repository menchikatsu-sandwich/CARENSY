<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $fillable = ['transaction_id', 'invoice_number', 'issued_date', 'status'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
