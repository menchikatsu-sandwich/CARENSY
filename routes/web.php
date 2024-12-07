<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

// home
Route::get('/', function () {
    return view('/user/dashboard', ['title' => 'Dashboard']);
});
// about
Route::get('/profil', function () {
    return view('/user/profil', ['nama' => 'SANTO EVORIUS'], ['title' => 'Profile']);
});
// post
Route::get('/kamera', function () {
    return view('/user/kamera', ['title' => 'Kamera', 'posts' => Post::all()]);
});
// single post
Route::get('/detailkamera/{post:slug}', function(Post $post){
        // $post = Post::find($slug);

        return view('/user/detailkamera', ['title'=> 'Detail Kamera', 'post' => $post]);
});
// contact
Route::get('/kategori', function () {
    return view('/user/kategori', ['title' => 'CONTACT PAGE']);
});
// login
Route::get('/login', function () {
    return view('/auth/login', ['title' => 'Login Page']);
});
// register
Route::get('/register', function () {
    return view('/auth/register', ['title' => 'Register Page']);
});

// // login
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// // register
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');