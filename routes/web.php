<?php

use App\Models\historyTransaksi;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\CartItem;
use App\Models\historyItem;

// ! USER !
// home
Route::get('/', function () {
    return view('/user/dashboard', ['title' => 'Home', 'products' => Product::all()]);
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
    return view('/user/kategori', ['title' => 'Kategori', 'products' => Product::all()]);
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
// Profile & Cart
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('edit-profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('update-profile');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/update/{cartItem}', [CartController::class, 'updateCartItem'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/checkout', [CartController::class, 'showCheckoutForm'])->name('cart.checkout');
    Route::get('/checkout', [TransactionController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout', [TransactionController::class, 'processCheckout'])->name('checkout.process');
});
// search produk
Route::get('/search/search_result', [ProductController::class, 'search'])->name('search');



//  ! ADMIN !
//dashboard admin
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
    return view('/admin/Pemesanan', ['title' => 'Pemesanan', 'transactions' => Transaction::all()]);
});
//history
Route::get('/history', function () {
    return view('admin.History', ['title' => 'History Pemesanan', 'historyTransaksi' => historyTransaksi::all()]);
})->name('transactions.history');

//detai produk admin
Route::get('/detail_kamera/{product:id}', function (Product $product) {
    return view('/admin/Detail_kamera_admin', ['title' => 'Detail Produk', 'product' => $product]);
});

//edit
Route::get('/edit_produk/{product:id}', function (Product $product) {
    return view('admin.edit', ['title' => 'Edit Produk', 'product' => $product]);
})->name('product.edit');


//detail pemesanan
Route::get('/detail_pemesanan/{transaction:id}', function (Transaction $transaction) {
    // Mengambil item keranjang yang terkait dengan transaksi spesifik 
    $cartItems = CartItem::where('transaction_id', $transaction->id)->get();
    return view('admin.DetailPemesanan', ['title' => 'Detail Pemesanan', 'cartItems' => $cartItems, 'transaction' => $transaction]);
});
//detail histori
Route::get('/detail_history/{historyTransaksi:id}', function (historyTransaksi $historyTransaksi) {
    $historyItems = historyItem::where('histori_transaksi_id', $historyTransaksi->id)->get();
    return view('admin.DetailHistory', ['title' => 'Detail History', 'historyItems' => $historyItems, 'historyTransaksi' => $historyTransaksi]);
})->name('history.detail');


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
//confirmasi pesanan
Route::post('/transaksi/{transaction}/confirm', [TransactionController::class, 'confirm'])->name('transactions.confirm');
