<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = ['transaction_code', 'customer_name', 'total_price'];

    public function invoice()
    {
        return $this->hasOne(cart::class);
    }
}
