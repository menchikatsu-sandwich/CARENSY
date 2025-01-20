<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryTransaksi;

class HistoryController extends Controller
{

    public function search(Request $request)
    {
        $title = 'History Pemesanan';
        $searchName = $request->input('search_name');
        $searchDate = $request->input('search_date');
        
        $historyTransaksi = HistoryTransaksi::with('user.profile')
            ->when($searchName, function ($query, $searchName) {
                return $query->whereHas('user', function ($query) use ($searchName) {
                    $query->where('name', 'like', "%{$searchName}%");
                });
            })
            ->when($searchDate, function ($query, $searchDate) {
                return $query->where(function ($query) use ($searchDate) {
                    $query->whereDate('tanggal_pinjam', $searchDate)
                        ->orWhereDate('tanggal_kembali', $searchDate);
                    });
                })
            ->get();

        return view('admin.history', compact('title', 'historyTransaksi', 'searchName', 'searchDate'));
    }

}