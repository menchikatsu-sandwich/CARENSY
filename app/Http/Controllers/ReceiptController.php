<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;

class ReceiptController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'receipt_no' => 'required|string|size:4|unique:receipts',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
        ]);

        Receipt::create($request->all());

        return redirect()->route('receipts.index')->with('success', 'Receipt created successfully.');
    }

    public function show($id)
    {
        $receipt = Receipt::with(['transaction.user', 'transaction.cartItems.product'])->findOrFail($id);
        return view('receipts.show', compact('receipt'));
    }


    public function download($id)
    {
        $receipt = Receipt::with(['transaction.user', 'transaction.cartItems.product'])
            ->findOrFail($id);

        // Generate PDF
        $pdf = PDF::loadView('receipts.pdf', [
            'receipt' => $receipt,
        ]);

        // Return downloadable PDF
        return $pdf->download('receipt-' . $receipt->receipt_no . '.pdf');
    }
}
