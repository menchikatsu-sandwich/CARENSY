<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Menampilkan isi cart
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Menambahkan item ke cart
    public function add(Request $request)
    {
        $cart = Session::get('cart', []);
        $item = [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];

        $cart[$item['id']] = $item;
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Barang berhasil ditambahkan ke keranjang.');
    }

    // Menghapus item dari cart
    public function remove(Request $request)
    {
        $cart = Session::get('cart', []);
        unset($cart[$request->id]);
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Barang berhasil dihapus dari keranjang.');
    }

    // Proses checkout (opsional)
    public function checkout()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')->with('success', 'Checkout berhasil.');
    }
}
