<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Receipt</title>
    <style>
        
        .w-full { width: 100%; }
        .w-half { width: 50%; }
        .margin-top { margin-top: 1.5rem; }

        h1 { font-size: 1.5rem; }
        h2 { font-size: 1.25rem; }
        h3 { font-size: 1.125rem; }

        table.products {
            width: 100%;
            font-size: 0.875rem;
            border-collapse: collapse;
        }

        table.products thead tr {
            background-color: rgb(96, 165, 250);
        }

        table.products th {
            color: #ffffff;
            padding: 0.5rem;
            text-align: left;
        }

        table.products tbody tr.items {
            background-color: rgb(241, 245, 249);
        }

        table.products tbody tr.items td {
            padding: 0.5rem;
        }

        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }

        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            font-style: italic;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.5rem;
            border: 1px solid #ddd;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .logo {
            height: 5rem; 
            float: right;
        }
    </style>
</head>
<body>
    <div class="w-full margin-top">
        <div class="header-container">
            <h1>Rent Receipt</h1>
            <img src="{{ public_path('img/CARENSY.png') }}" alt="Logo Carensy" class="logo">
        </div>
        <div class="w-full margin-top">
            <h2>Informasi Peminjam</h2>
            <p><strong>Nama Lengkap:</strong> {{ $receipt->transaction->user->name }}</p>
            <p><strong>No. Telp:</strong> {{ $receipt->transaction->user->profile->no_telp }}</p>
            <p><strong>Email:</strong> {{ $receipt->transaction->email }}</p>
            <p><strong>Media Sosial:</strong> {{ $receipt->transaction->media_sosial }}</p>
            <p><strong>Jaminan:</strong> {{ $receipt->transaction->jaminan }}</p>
        </div>
        <table class="w-full margin-top">
            <thead>
                <tr>
                    <th>Receipt No</th>
                    <th>Tgl. Ambil</th>
                    <th>Tgl. Kembali</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $receipt->receipt_no }}</td>
                    <td>{{ $receipt->tgl_pinjam }}</td>
                    <td>{{ $receipt->tgl_kembali }}</td>
                </tr>
            </tbody>
        </table>
        <div class="margin-top">
            <h3>Detail Produk</h3>
            <table class="products">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Subtotal</th>
                        <th>Jumlah Hari Pinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $tglPinjam = new DateTime($receipt->tgl_pinjam);
                        $tglKembali = new DateTime($receipt->tgl_kembali);
                        $jumlahHariPinjam = $tglPinjam->diff($tglKembali)->days + 1;
                    @endphp
                    @foreach ($receipt->transaction->cartItems as $item)
                        <tr class="items">
                            <td>{{ $item->product->nama_product }}</td>
                            <td>Rp.{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ $jumlahHariPinjam }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-semibold">
                        <td class="total">Total Keseluruhan</td>
                        <td class="total" colspan="2">
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
        <p class="footer">
            Note: Harga di atas sudah dikalkulasi berdasarkan berapa lama anda meminjam. 
        </p>
    </div>
</body>
</html>