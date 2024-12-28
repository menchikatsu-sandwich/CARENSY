<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Receipt</title>
    @if(isset($css))
        <link href="{{ $css }}" rel="stylesheet">
    @else
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @endif
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Rent Receipt</h1>
            <img src="{{ asset('img/CARENSY.png') }}" alt="Logo Carensy" class="h-12 w-auto">
        </div>
        <div class="border border-gray-300 p-4 rounded mb-6">
            <h2 class="text-lg font-semibold mb-4">Informasi Peminjam</h2>
            <p class="mb-1"><strong>Nama Lengkap:</strong> {{ $receipt->transaction->user->name }}</p>
            <p class="mb-1"><strong>No. Telp:</strong> {{ $receipt->transaction->user->profile->no_telp }}</p>
            <p class="mb-1"><strong>Email:</strong> {{ $receipt->transaction->email }}</p>
            <p><strong>Media Sosial:</strong> {{ $receipt->transaction->media_sosial }}</p>
        </div>
        <table class="table-auto w-full mb-6 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Receipt No</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tgl. Ambil</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Tgl. Kembali</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $receipt->receipt_no }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $receipt->tgl_pinjam }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $receipt->tgl_kembali }}</td>
                </tr>
            </tbody>
        </table>
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Detail Produk</h3>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">Nama Produk</th>
                        <th class="border border-gray-300 px-4 py-2 text-right">Subtotal</th>
                        <th class="border border-gray-300 px-4 py-2 text-right">Jumlah Hari Pinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receipt->transaction->cartItems as $item)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $item->product->nama_product }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-right">Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-right">
                                @php
                                    $tglPinjam = new DateTime($receipt->tgl_pinjam);
                                    $tglKembali = new DateTime($receipt->tgl_kembali);
                                    $jumlahHariPinjam = $tglPinjam->diff($tglKembali)->days + 1;
                                @endphp
                                {{ $jumlahHariPinjam }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-semibold">
                        <td class="border border-gray-300 px-4 py-2 text-right">Total Keseluruhan</td>
                        <td class="border border-gray-300 px-4 py-2 text-right" colspan="2">
                            @php
                                $totalKeseluruhan = $receipt->transaction->cartItems->sum(function($item) use ($jumlahHariPinjam) {
                                    return $item->price * $item->quantity * $jumlahHariPinjam;
                                });
                            @endphp
                            Rp.{{ number_format($totalKeseluruhan, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <p class="text-sm text-gray-600 mb-6">
            Note: Harga di atas sudah dikalkulasi berdasarkan berapa lama anda meminjam. 
        </p>
        <a href="{{ route('receipts.download', $receipt->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Download PDF</a>
        <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 float-right">Kembali</a>
    </div>
</body>
</html>
