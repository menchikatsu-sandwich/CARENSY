<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\SearchController;



// ! USER !
// search
Route::get('/search', [SearchController::class, 'index'])->name('search');
// home
Route::get('/', function () {
    return view('/user/dashboard', ['title' => 'Home']);
});
// kamera
Route::get('/kamera', function () {
    return view('/user/kamera', ['title' => 'Kamera']);
});
// detail kamera
// Route::get('/detailkamera/{post:slug}', function(Post $post){
//         return view('/user/detailkamera', ['title'=> 'Detail Kamera', 'post' => $post]);
// });
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
//form
Route::get('/form_input', function () {
    return view('/admin/Form_input', ['title' => 'Form Input']);
});
//pemesanan
Route::get('/pemesanan', function () {
    return view('/admin/Pemesanan', ['title' => 'Pemesanan']);
});
//history
Route::get('/history', function () {
    return view('/admin/History', ['title' => 'History Pemesanan']);
});
//detai produk admin
Route::get('/detail_produk', function () {
    return view('/admin/Detail_kamera_admin', ['title' => 'Detail Produk']);
});

//edit
Route::get('/edit_produk', function () {
    return view('/admin/edit', ['title' => 'Edit Produk']);
});

// // login
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// // register
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');