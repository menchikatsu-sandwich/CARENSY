<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function showCheckoutForm()
    {
        $cart = Cart::where('user_id', Auth::id())->with('cartItems.product')->first();
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        return view('cart.checkout', ['title' => 'Checkout', 'cart' => $cart]);
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'alamat_now' => 'required|string',
            'alamat_ktp' => 'required|string',
            'media_sosial' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        $cart = Cart::where('user_id', Auth::id())->with('cartItems.product')->first();
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Create a unique transaction code
        $kode_transaksi = Str::uuid();

        // Create a new transaction
        $transaction = Transaction::create([
            'kode_transaksi' => $kode_transaksi,
            'user_id' => Auth::id(),
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        // Associate cart items with the transaction
        foreach ($cart->cartItems as $item) {
            $item->update(['cart_id' => null, 'transaction_id' => $transaction->id]);
        }

        // Clear the cart
        $cart->cartItems()->delete();
        $cart->delete();

        return redirect()->route('home')->with('success', 'Checkout berhasil. Terima kasih telah berbelanja!');
    }
}
