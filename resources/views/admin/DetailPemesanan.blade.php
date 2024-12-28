<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        {{-- back --}}
        <a href="/pemesanan" class="text-gray-600">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        {{-- confirm --}}
        <div class="flex space-x-2">
            <form action="{{ route('transactions.confirm', $transaction->id) }}" method="POST">
                @csrf
                <button class="text-gray-600 px-4 py-2 text-lg">
                    <i class="fa-regular fa-square-check">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                    </i>
                </button>
            </form>
        </div>
    </div>
    <!-- Content -->
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
                    @foreach ($cartItems->where('transaction_id', $transaction->id) as $item)
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
    
    {{-- detail pemesanan --}}
    <div class="mt-6">
        <h3 class="font-semibold text-gray-800 mb-2">Detail Pemesan:</h3>
        <div class="flex flex-col">
            <span class="text-gray-600 text-sm leading-relaxed">
                Nama: {{ $transaction->user->name }}
            </span>
            <span class="text-gray-600 text-sm leading-relaxed">
                Alamat Pemesan: {{ $transaction->alamat_now }}
            </span>
            <span class="text-gray-600 text-sm leading-relaxed">
                Alamat KTP: {{ $transaction->alamat_ktp }}
            </span>
            <span class="text-gray-600 text-sm leading-relaxed">
                Nomor Handphone: {{ $transaction->user->profile->no_telp }}
            </span>
            <span class="text-gray-600 text-sm leading-relaxed">
                Email: {{ $transaction->email }}
            </span>
            <span class="text-gray-600 text-sm leading-relaxed">
                Tanggal Pinjam: {{ $transaction->tanggal_pinjam }}
            </span>
            <span class="text-gray-600 text-sm leading-relaxed">
                Tanggal Kembali: {{ $transaction->tanggal_kembali }}
            </span>
            <span class="text-gray-600 text-sm leading-relaxed">
                Total Hari Meminjam: <span id="totalHari">0</span> hari
            </span>
        </div>
    </div>

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
