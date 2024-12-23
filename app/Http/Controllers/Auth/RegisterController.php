<?php
// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        

        
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password), // Tidak di-hash untuk pengujian
            ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

}
