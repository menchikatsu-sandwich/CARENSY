<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <a href="javascript:window.history.back();" class="text-gray-600 hover:text-gray-800">
            <i class="fa-solid fa-angle-left text-xl"></i>
        </a>
    </div>

    <!-- Content -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
        <div class="flex flex-col items-center">
            <div class="w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-100 mb-2">Detail Pemesan:</h3>
                        <div class="flex flex-col space-y-2">
                            <span class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <strong>Nama:</strong> {{ $historyTransaksi->user->name }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <strong>Alamat Pemesan:</strong> {{ $historyTransaksi->alamat_now }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <strong>Alamat KTP:</strong> {{ $historyTransaksi->alamat_ktp }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <strong>Nomor Handphone:</strong> {{ $historyTransaksi->user->profile->no_telp }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <strong>Email:</strong> {{ $historyTransaksi->email }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <strong>Tanggal Pinjam:</strong> {{ $historyTransaksi->tanggal_pinjam }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <strong>Tanggal Kembali:</strong> {{ $historyTransaksi->tanggal_kembali }}
                            </span>
                            <span class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <strong>Total Hari Meminjam:</strong> <span id="totalHari">0</span> hari
                            </span>
                        </div>
                    </div>
                    <div class="sm:col-span-2 mt-6">
                        <h3 class="font-semibold text-gray-800 dark:text-gray-100 mb-2">Detail Produk:</h3>
                        <table class="min-w-full bg-white shadow-md dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg">
                            <thead>
                                <tr class="border-gray-300 dark:border-gray-600 text-left text-gray-800 dark:text-gray-100">
                                    <th class="py-2 px-4 border-b ">Kode Produk</th>
                                    <th class="py-2 px-4 border-b ">Nama Produk</th>
                                    <th class="py-2 px-4 border-b ">Quantity</th>
                                    <th class="py-2 px-4 border-b ">Harga</th>
                                    <th class="py-2 px-4 border-b ">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historyItems as $item)
                                    <tr class="border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-200">
                                        <td class="py-2 px-4 border-b ">{{ $item->product->kode_product }}</td>
                                        <td class="py-2 px-4 border-b ">{{ $item->product->nama_product }}</td>
                                        <td class="py-2 px-4 border-b  text-center">{{ $item->quantity }}</td>
                                        <td class="py-2 px-4 border-b ">{{ number_format($item->price, 2) }}</td>
                                        <td class="py-2 px-4 border-b ">{{ number_format($item->quantity * $item->price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-200">
                                    <td colspan="4" class="text-right py-2 px-4 border"><strong>Total Harga:</strong></td>
                                    <td class="py-2 px-4 border"><strong id="totalHarga">0.00</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalPinjam = new Date('{{ $historyTransaksi->tanggal_pinjam }}');
            const tanggalKembali = new Date('{{ $historyTransaksi->tanggal_kembali }}');
            const totalHargaElement = document.getElementById('totalHarga');
            const totalHariElement = document.getElementById('totalHari');
            const calculateTotal = () => {
                const oneDay = 24 * 60 * 60 * 1000; // Milliseconds in one day 
                const jumlahHari = Math.round((tanggalKembali - tanggalPinjam) / oneDay) + 1;
                let totalHarga = 0;
                @foreach ($historyItems as $item)
                    totalHarga += {{ $item->quantity }} * {{ $item->price }} * jumlahHari;
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
