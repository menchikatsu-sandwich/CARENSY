<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'foto_profile',
        'gender',
        'no_telp',
        'alamat_now',
        'alamat_ktp',
        'media_sosial',
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}