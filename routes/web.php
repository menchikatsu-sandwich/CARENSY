<?php

use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;


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
// Route::get('/dashboard_admin', function () {
//     return view('/admin/Dashboard_admin', ['title' => 'List Produk']);
// });

Route::get('/dashboard_admin', function () {
    $products = Product::all();
    $title = 'List Produk';
    return view('admin/Dashboard_admin', compact('products', 'title'));
})->name('product.index');
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
