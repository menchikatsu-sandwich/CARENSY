<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Pemesanan';
        $search = $request->input('search');
        $transactions = Transaction::with('user.profile')
            ->when($search, function ($query, $search) {
                return $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->get()
            ->sortByDesc('created_at')
            ->groupBy(function ($transaction) {
                return (new \DateTime($transaction->created_at))->format('F Y'); // Group by month and year
            });

        return view('admin.pemesanan', compact('title','transactions', 'search'));
    }
}