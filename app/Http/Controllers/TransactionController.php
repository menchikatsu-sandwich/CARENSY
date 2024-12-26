<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\HistoryItem;
use App\Models\historyTransaksi;
use App\Models\Transaction;
use App\Models\HistoriTransaksi;
use App\Models\HistoriItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            'email' => $request->email,
            'alamat_now' => $request->alamat_now,
            'alamat_ktp' => $request->alamat_ktp,
            'media_sosial' => $request->media_sosial,
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

    public function confirm(Transaction $transaction)
    {
        DB::transaction(function() use ($transaction) {
            // Pindahkan data transaksi ke historiTransaksi
            $historiTransaksi = historyTransaksi::create([
                'user_id' => $transaction->user_id,
                'tanggal_pinjam' => $transaction->tanggal_pinjam,
                'tanggal_kembali' => $transaction->tanggal_kembali,
                'kode_transaksi' => $transaction->kode_transaksi,
                'alamat_now' => $transaction->alamat_now,
                'alamat_ktp' => $transaction->alamat_ktp,
                'email' => $transaction->email,
            ]);

            // Pindahkan data item ke historiItems dan update stok produk
            foreach ($transaction->cartItems as $cartItem) {
                HistoryItem::create([
                    'histori_transaksi_id' => $historiTransaksi->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                ]);

                // Update stok produk
                $product = Product::find($cartItem->product_id);
                $product->stock += $cartItem->quantity;
                $product->save();
            }

            // Hapus data dari cartItems dan transaksi
            $transaction->cartItems()->delete();
            $transaction->delete();
        });

        return redirect()->route('transactions.history')->with('status', 'Transaksi berhasil dikonfirmasi dan dipindahkan ke histori.');
    }
}
