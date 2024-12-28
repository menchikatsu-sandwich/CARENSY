<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return view('product.index'); // Tampilkan halaman admin
        }
    
        return view('dashboard_user'); // Tampilkan halaman user biasa
    }
    
}
