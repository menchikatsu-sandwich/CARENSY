<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\HistoryItem;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HistoryTransaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'nullable|email',
            'alamat_now' => 'required|string',
            'alamat_ktp' => 'nullable|string',
            'media_sosial' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        $cart = Cart::where('user_id', Auth::id())->with('cartItems.product')->first();
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        $kode_transaksi = Str::uuid();

        $transaction = Transaction::create([
            'kode_transaksi' => $kode_transaksi,
            'user_id' => Auth::id(),
            'email' => $request->email ?? '',
            'alamat_now' => $request->alamat_now,
            'alamat_ktp' => $request->alamat_ktp ?? '',
            'media_sosial' => $request->media_sosial,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        foreach ($cart->cartItems as $item) {
            $item->update(['cart_id' => null, 'transaction_id' => $transaction->id]);
        }

        $cart->cartItems()->delete();
        $cart->delete();

        $receipt = Receipt::create([
            'receipt_no' => strtoupper(Str::random(4)),
            'tgl_pinjam' => $transaction->tanggal_pinjam,
            'tgl_kembali' => $transaction->tanggal_kembali,
            'transaction_id' => $transaction->id,
        ]);

        return redirect()->route('receipts.show', $receipt->id)->with('success', 'Checkout berhasil. Terima kasih telah berbelanja!');
    }

    public function confirmTransaction($id)
    {
        DB::transaction(function () use ($id) {
            $transaction = Transaction::with('cartItems')->findOrFail($id);

            // Pindahkan data transaksi ke tabel history_transaksi
            $historyTransaksi = HistoryTransaksi::create([
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
                    'histori_transaksi_id' => $historyTransaksi->id, // Pastikan histori_transaksi_id disertakan
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

    public function index()
    {
        $transactions = Transaction::with('cartItems.product')->where('user_id', Auth::id())->get();
        $historyTransaksi = HistoryTransaksi::with('historiItems.product')->where('user_id', Auth::id())->get();

        return view('user.history', compact('transactions', 'historyTransaksi'));
    }
    public function pending()
    {
        $transactions = Transaction::with('cartItems.product')->where('user_id', Auth::id())->get();
        $historyTransaksi = HistoryTransaksi::with('historiItems.product')->where('user_id', Auth::id())->get();

        return view('user.berlangsung', compact('transactions', 'historyTransaksi'));
    }

    public function showReceipt($id)
    {
        // Pastikan transaksi milik user yang sedang login
        $transaction = Transaction::with('cartItems.product')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
        // Ambil receipt berdasarkan transaction_id
        $receipt = Receipt::where('transaction_id', $transaction->id)->firstOrFail();
        
        return view('receipts.show', compact('receipt', 'transaction'));
    }
    //ini maunya untuk history download recipe tapi karena yang berlangsung gakjadi nampilin recipe bisa hapus ini atau hapus yang di atas nya
    // public function showReceiptHistory($id)
    // {
    //     // Pastikan transaksi milik user yang sedang login
    //     $transaction = HistoryTransaksi::with('historyItems.product')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
    //     // Ambil receipt berdasarkan transaction_id
    //     $receipt = Receipt::where('transaction_id', $transaction->id)->firstOrFail();
        
    //     return view('receipts.show', compact('receipt', 'transaction'));
    // }
}
