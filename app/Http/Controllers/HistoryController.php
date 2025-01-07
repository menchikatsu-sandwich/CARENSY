<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryTransaksi;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $title = 'History Pemesanan';
        $sortMethod = $request->get('sort', 'tanggal_pinjam_desc');
        $historyTransaksi = HistoryTransaksi::with('user.profile')->get();

        switch ($sortMethod) {
            case 'tanggal_pinjam_asc':
                $historyTransaksi = $historyTransaksi->sortBy('tanggal_pinjam');
                break;
            case 'tanggal_pinjam_desc':
                $historyTransaksi = $historyTransaksi->sortByDesc('tanggal_pinjam');
                break;
            case 'tanggal_kembali_asc':
                $historyTransaksi = $historyTransaksi->sortBy('tanggal_kembali');
                break;
            case 'tanggal_kembali_desc':
                $historyTransaksi = $historyTransaksi->sortByDesc('tanggal_kembali');
                break;
            case 'name_asc':
                $historyTransaksi = $historyTransaksi->sortBy(function($history) {
                    return $history->user->name;
                });
                break;
            case 'name_desc':
                $historyTransaksi = $historyTransaksi->sortByDesc(function($history) {
                    return $history->user->name;
                });
                break;
        }

        return view('admin.history', compact('title', 'historyTransaksi', 'sortMethod'));
    }
}