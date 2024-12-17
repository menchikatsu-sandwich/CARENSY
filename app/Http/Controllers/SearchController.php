<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camera;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data dari input search
        $query = $request->input('q');

        // Cek jika ada input pencarian
        if ($query) {
            // Lakukan pencarian ke database
            $results = Camera::where('name', 'LIKE', '%' . $query . '%') // Sesuaikan kolom
                        ->orWhere('description', 'LIKE', '%' . $query . '%') // Optional: Tambah kondisi lain
                        ->get();
        } else {
            $results = [];
        }

        // Return view dengan hasil pencarian
        return view('search.index', compact('results', 'query'));
    }
}
