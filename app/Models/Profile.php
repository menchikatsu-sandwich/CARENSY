<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    protected $fillable = [
        'fullname',
        'gender',
        'phone',
        'password',
        'profile_photo_path',
    ];
}
