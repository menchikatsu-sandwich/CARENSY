<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartItems.product')
            ->first();

        return view('cart.index', [
            'cart' => $cart,
            'title' => 'Keranjang Belanja'
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Validasi stok
        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk menambahkan item ini ke keranjang.');
        }

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // Tambah atau perbarui item keranjang
        CartItem::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $product->id,
            ],
            [
                'quantity' => $request->quantity,
                'price' => $product->harga_sewa,
            ]
        );

        // Kurangi stok
        $product->decrement('stock', $request->quantity);

        // Perbarui total keranjang
        $this->updateCartTotal($cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function updateCartItem(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = $cartItem->product;
        $newQuantity = $request->quantity;

        // Validasi stok
        if ($newQuantity > $product->stock + $cartItem->quantity) {
            return redirect()->route('cart.index')->with('error', 'Stok tidak mencukupi untuk memperbarui jumlah item ini.');
        }

        // Update stok produk
        if ($newQuantity > $cartItem->quantity) {
            $product->decrement('stock', $newQuantity - $cartItem->quantity);
        } else {
            $product->increment('stock', $cartItem->quantity - $newQuantity);
        }

        // Update jumlah item di keranjang
        $cartItem->update(['quantity' => $newQuantity]);

        // Perbarui total keranjang
        $this->updateCartTotal($cartItem->cart);

        return redirect()->route('cart.index')->with('success', 'Jumlah produk berhasil diperbarui!');
    }

    private function updateCartTotal($cart)
    {
        $total = $cart->cartItems()
            ->selectRaw('SUM(quantity * price) as total')
            ->value('total');

        $cart->update(['total_amount' => $total]);
    }

    public function removeFromCart(CartItem $cartItem)
    {
        $product = $cartItem->product;
        $cart = $cartItem->cart;

        // Restore produk stock
        $product->increment('stock', $cartItem->quantity);

        // Delete cart item
        $cartItem->delete();

        if ($cart->cartItems()->count() === 0) {
            $cart->update(['total_amount' => 0]);
        } else {
            $this->updateCartTotal($cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang!');
    }

    public function showCheckoutForm()
    {
        $cart = Cart::where('user_id', Auth::id())->with('cartItems.product')->first();
        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }
    
        $user = Auth::user();
        $profileIncomplete = false;
    
        // Pastikan objek profile ada sebelum memeriksa propertinya
        if (!$cart->user->profile || is_null($cart->user->profile->email) || is_null($cart->user->profile->alamat_ktp) || is_null($cart->user->profile->no_telp)) {
            $profileIncomplete = true;
        }
    
        if ($profileIncomplete) {
            return redirect()->route('cart.index')->with('profileIncomplete', 'Profil Anda belum lengkap. Silakan lengkapi profil Anda terlebih dahulu.');
        }
    
        return view('cart.checkout', ['title' => 'Checkout', 'cart' => $cart]);
    }
    
    
}
