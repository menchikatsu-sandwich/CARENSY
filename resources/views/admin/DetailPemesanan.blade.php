<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        {{-- back --}}
        <a href="/pemesanan" class="text-gray-600 hover:text-gray-800">
            <i class="fa-solid fa-angle-left text-xl"></i>
        </a>
        {{-- confirm --}}
        <div class="flex space-x-2">
            <form action="{{ route('transactions.confirm', $transaction->id) }}" method="POST">
                @csrf
                <button class="text-green-600 hover:text-green-800 px-4 py-2 text-lg">
                    <i class="fa-regular fa-square-check text-xl"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Content -->
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
        <div class="flex flex-col items-center">
            <div class="w-full">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Detail Pesanan</h2>
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 mb-2">Detail Pemesan:</h3>
                    <div class="flex flex-col space-y-2">
                        <span class="text-gray-600 text-sm leading-relaxed">
                            <strong>Nama:</strong> {{ $transaction->user->name }}
                        </span>
                        <span class="text-gray-600 text-sm leading-relaxed">
                            <strong>Alamat Pemesan:</strong> {{ $transaction->alamat_now }}
                        </span>
                        <span class="text-gray-600 text-sm leading-relaxed">
                            <strong>Alamat KTP:</strong> {{ $transaction->alamat_ktp }}
                        </span>
                        <span class="text-gray-600 text-sm leading-relaxed">
                            <strong>Nomor Handphone:</strong> {{ $transaction->user->profile->no_telp }}
                        </span>
                        <span class="text-gray-600 text-sm leading-relaxed">
                            <strong>Email:</strong> {{ $transaction->email }}
                        </span>
                        <span class="text-gray-600 text-sm leading-relaxed">
                            <strong>Tanggal Pinjam:</strong> {{ $transaction->tanggal_pinjam }}
                        </span>
                        <span class="text-gray-600 text-sm leading-relaxed">
                            <strong>Tanggal Kembali:</strong> {{ $transaction->tanggal_kembali }}
                        </span>
                        <span class="text-gray-600 text-sm leading-relaxed">
                            <strong>Total Hari Meminjam:</strong> <span id="totalHari">0</span> hari
                        </span>
                    </div>
                <h3 class="font-semibold text-gray-800 mb-2 mt-4">Detail Produk:</h3>
                <table class="min-w-full bg-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border">Kode Produk</th>
                            <th class="py-2 px-4 border">Nama Produk</th>
                            <th class="py-2 px-4 border">Quantity</th>
                            <th class="py-2 px-4 border">Harga</th>
                            <th class="py-2 px-4 border">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
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
                        <tr class="bg-gray-200">
                            <td colspan="4" class="text-right py-2 px-4 border"><strong>Total Harga:</strong></td>
                            <td class="py-2 px-4 border"><strong id="totalHarga">0.00</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Description -->
    
    {{-- detail pemesanan --}}


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tanggalPinjam = new Date('{{ $transaction->tanggal_pinjam }}');
            const tanggalKembali = new Date('{{ $transaction->tanggal_kembali }}');
            const totalHargaElement = document.getElementById('totalHarga');
            const totalHariElement = document.getElementById('totalHari');

            const calculateTotal = () => {
                const oneDay = 24 * 60 * 60 * 1000; // Milliseconds in one day
                const jumlahHari = Math.round((tanggalKembali - tanggalPinjam) / oneDay) + 1;

                let totalHarga = 0;

                @foreach ($cartItems->where('transaction_id', $transaction->id) as $item)
                    totalHarga += {{ $item->quantity }} * {{ $item->price }} * jumlahHari;
                @endforeach

                totalHargaElement.textContent = totalHarga.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                totalHariElement.textContent = jumlahHari;
            };

            calculateTotal();
        });
    </script>
</x-layoutadmin>
