<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'password',
        'is_admin',
    ];

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function profile()  
    {
        return $this->hasOne(Profile::class);
    }
}
