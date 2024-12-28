<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        {{-- back --}}
        <a href="/user/pending" class="text-gray-600">
            <i class="fa-solid fa-angle-left"></i>
        </a>
    </div>
    <div class="flex items-center justify-center space-x-4">
        <div>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">Kode Produk</th>
                        <th class="py-2 px-4 border">Nama Produk</th>
                        <th class="py-2 px-4 border">Quantity</th>
                        <th class="py-2 px-4 border">Harga</th>
                        <th class="py-2 px-4 border">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historyItems as $item)
                        <tr>
                            <td class="py-2 px-4 border">{{ $item->product->kode_product }}</td>
                            <td class="py-2 px-4 border">{{ $item->product->nama_product }}</td>
                            <td class="py-2 px-4 border text-center">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border">{{ number_format($item->price, 2) }}</td>
                            <td class="py-2 px-4 border">{{ number_format($item->quantity * $item->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right py-2 px-4 border"><strong>Total Harga:</strong></td>
                        <td class="py-2 px-4 border"><strong id="totalHarga">0.00</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Description -->
<div class="mt-6">
    <h3 class="font-semibold text-gray-800 mb-2">Detail Pemesan:</h3>
    <div class="flex flex-col">
        <span class="text-gray-600 text-sm leading-relaxed">
            Nama: {{ $historyTransaksi->user->name }}
        </span>
        <span class="text-gray-600 text-sm leading-relaxed">
            Alamat Pemesan: {{ $historyTransaksi->alamat_now }}
        </span>
        <span class="text-gray-600 text-sm leading-relaxed">
            Alamat KTP: {{ $historyTransaksi->alamat_ktp }}
        </span>
        <span class="text-gray-600 text-sm leading-relaxed">
            Nomor Handphone: {{ $historyTransaksi->user->profile->no_telp }}
        </span>
        <span class="text-gray-600 text-sm leading-relaxed">
            Email: {{ $historyTransaksi->email }}
        </span>
        <span class="text-gray-600 text-sm leading-relaxed">
            Tanggal Pinjam: {{ $historyTransaksi->tanggal_pinjam }}
        </span>
        <span class="text-gray-600 text-sm leading-relaxed">
            Tanggal Kembali: {{ $historyTransaksi->tanggal_kembali }}
        </span>
        <span class="text-gray-600 text-sm leading-relaxed">
            Total Hari Meminjam: <span id="totalHari">0</span> hari
        </span>
    </div>
</div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalPinjam = new Date('{{ $historyTransaksi->tanggal_pinjam }}');
            const tanggalKembali = new Date('{{ $historyTransaksi->tanggal_kembali }}');
            const totalHargaElement = document.getElementById('totalHarga');
            const totalHariElement = document.getElementById('totalHari');
            const calculateTotal = () => {
                const oneDay = 24 * 60 * 60 *
                    1000; // Milliseconds in one day 
                const jumlahHari = Math.round((tanggalKembali - tanggalPinjam) / oneDay) + 1;
                let totalHarga = 0;
                @foreach ($historyItems as $item)
                    totalHarga += {{ $item->quantity }} * {{ $item->price }} *
                    jumlahHari;
                @endforeach
                totalHargaElement.textContent = totalHarga.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
                totalHariElement.textContent = jumlahHari;
            };

            calculateTotal();
        });
    </script>
</x-layout>
