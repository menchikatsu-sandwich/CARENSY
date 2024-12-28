<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login', ['title' => 'Halaman Login']);
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba autentikasi
        if (Auth::attempt($request->only('username', 'password'))) {
            // Jika berhasil login
            $user=Auth::user();
             if($user->is_admin){
                return redirect()->route('product.index');
             }
             return redirect()->route('home');
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    // Menangani logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
