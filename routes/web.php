<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

// ! USER !
// home
Route::get('/', function () {
    return view('/user/dashboard', ['title' => 'Home']);
});
// kamera
Route::get('/kamera', function () {
    return view('/user/kamera', ['title' => 'Kamera', 'posts' => Post::all()]);
});
// detail kamera
Route::get('/detailkamera/{post:slug}', function(Post $post){
        return view('/user/detailkamera', ['title'=> 'Detail Kamera', 'post' => $post]);
});
// kategori
Route::get('/kategori', function () {
    return view('/user/kategori', ['title' => 'Kategori']);
});
// login
Route::get('/login', function () {
    return view('/auth/login', ['title' => 'Login Page']);
});
// register
Route::get('/register', function () {
    return view('/auth/register', ['title' => 'Register Page']);
});
// profile
Route::get('/profile', function () {
    return view('/user/profile', ['title' => 'Profile Page']);
});
// cart
Route::get('/cart', function () {
    return view('/user/cart', ['title' => 'Cart']);
});








//  ! ADMIN !
//dashboard admin
Route::get('/dashboard_admin', function () {
    return view('/admin/Dashboard_admin', ['title' => 'List Kamera']);
});

// // login
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// // register
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');