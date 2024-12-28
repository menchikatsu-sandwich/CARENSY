<?php

use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;


// ! USER !
// home
Route::get('/', function () {
    return view('/user/dashboard', ['title' => 'Home','products'=> Product::all()]);
})->name('home')->middleware('auth');
// kamera
Route::get('/kamera', function () {
    return view('/user/kamera', ['title' => 'Kamera', 'products' => Product::all()]);
});
// detail kamera
Route::get('/link_produk/{product:id}', function (Product $product) {
    return view('/user/detailkamera', ['title' => 'Detail Produk', 'product' => $product]);
});
// kategori
Route::get('/kategori', function () {
    return view('/user/kategori', ['title' => 'Kategori','products' => Product::all() ]);
});
// login
Route::get('/login', function () {
    return view('/auth/login', ['title' => 'showLoginForm']);
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
// register
Route::get('/register', function () {
    return view('/auth/register', ['title' => 'Register Page']);
});
Route::post('/register', [RegisterController::class, 'register']);

// profile
Route::get('/profile', function () {
    return view('/user/profile', ['title' => 'Profile Page']);
});
// search produk
Route::get('/search/search_result', [ProductController::class, 'search'])->name('search');
// cart
//route ini belum bisa menambahkan produk ke cart
Route::get('/cart', function () {
    return view('/user/cart', ['title' => 'Cart']);
});
// profile
Route::get('/profile', function () {
    return view('/user/profile', ['title' => 'Edit Profile']);
});



//  ! ADMIN !
//dashboard admin
Route::get('/dashboard_admin', function () {
    $products = Product::all();
    $title = 'List Produk';
    return view('admin/Dashboard_admin', compact('products', 'title'));
})->name('product.index')->middleware('auth');
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
Route::get('/detail_kamera/{product:id}', function (Product $product) {
    return view('/admin/Detail_kamera_admin', ['title' => 'Detail Produk', 'product' => $product]);
});

//edit
// Route::get('/edit_produk/{product:id}', function (Product $product) {
//     return view('/admin/edit', ['title' => 'Edit Produk', 'product'=>$product]);
// });
Route::get('/edit_produk/{product:id}', function (Product $product) {
    return view('admin.edit', ['title' => 'Edit Produk', 'product' => $product]);
})->name('product.edit');


//detail pemesanan
Route::get('/detail_pemesanan', function () {
    return view('/admin/DetailPemesanan', ['title' => 'Detail Pemesanan']);
});



//route controller push product

Route::get('/dashboard_admin', [ProductController::class, 'index'])->name('product.index');
Route::post('/submit', [ProductController::class, 'store'])->name('product.store');

// edit
Route::get('/detail_produk/{product:id}', function (Product $product) {
    return view('admin.Detail_kamera_admin', ['title' => 'Detail Produk', 'product' => $product]);
})->name('product.show');
Route::post('/update_produk/{product:id}', [ProductController::class, 'update'])->name('product.update');

//delete
Route::delete('/delete_produk/{product:id}', [ProductController::class, 'destroy'])->name('product.destroy');

// // login
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// // register
// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// routes/web.php


//dashboard controller(penentu role)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
