<?php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $title = 'List Produk';
        return view('admin.Dashboard_admin', compact('products', 'title'));
    }
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'kode_product' => 'required|string|max:255',
            'nama_product' => 'required|string|max:255',
            'merek_product' => 'required|string|max:255',
            'kategori_product' => 'required|string|max:255',
            'detail_product' => 'required|string|max:255',
            'tahun_rilis' => 'required|date',
            'stock' => 'required|integer',
            'harga_sewa' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Simpan gambar ke direktori 'public/img/produk'
        // $imagePath = $request->file('image')->store('img/produk', 'public');
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('img/produk'), $imageName);
        // Simpan data ke database
        Product::create([
            'kode_product' => $request->kode_product,
            'nama_product' => $request->nama_product,
            'merek_product' => $request->merek_product,
            'kategori_product' => $request->kategori_product,
            'detail_product' => $request->detail_product,
            'tahun_rilis' => $request->tahun_rilis,
            'stock' => $request->stock,
            'harga_sewa' => $request->harga_sewa,
            'image' => 'img/produk/' . $imageName,
        ]);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Product successfully added');
    }

    public function update(Request $request, Product $product)
    { // Validasi data input 
        $request->validate([
            'kode_product' => 'required|string|max:255',
            'nama_product' => 'required|string|max:255',
            'merek_product' => 'required|string|max:255',
            'kategori_product' => 'required|string|max:255',
            'detail_product' => 'required|string|max:255',
            'tahun_rilis' => 'required|date',
            'stock' => 'required|integer',
            'harga_sewa' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // Update gambar jika ada gambar baru diunggah 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            // Menyimpan dengan nama file asli 
            $image->move(public_path('img/produk'), $imageName);
            $product->image = 'img/produk/' . $imageName;
        }
        // Update data ke database 
        $product->update([
            'kode_product' => $request->kode_product,
            'nama_product' => $request->nama_product,
            'merek_product' => $request->merek_product,
            'kategori_product' => $request->kategori_product,
            'detail_product' => $request->detail_product,
            'tahun_rilis' => $request->tahun_rilis,
            'stock' => $request->stock,
            'harga_sewa' => $request->harga_sewa,
        ]);
        // Redirect ke halaman lain dengan pesan sukses 
        return redirect()->route('product.show', $product->id)->with('success', 'Product successfully edited');
    }

    //delete
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product successfully deleted');
    }
}
