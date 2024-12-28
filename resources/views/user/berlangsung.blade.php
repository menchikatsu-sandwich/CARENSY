<x-layout>
    <x-slot name="title">
        History Transaksi
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-gray-100"> Transaksi Berlangsung </h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($transactions as $transaksi)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset($transaksi->cartItems->first()->product->image) }}" class="w-full h-48 object-cover" alt="{{ $transaksi->cartItems->first()->product->nama_product }}">
                <div class="p-4">
                    <h5 class="text-xl font-semibold mb-2 text-gray-700 dark:text-gray-300">{{ $transaksi->cartItems->first()->product->nama_product }}</h5>
                    <p class="text-gray-600 dark:text-gray-400">Tanggal Pinjam: {{ $transaksi->tanggal_pinjam }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Tanggal Kembali: {{ $transaksi->tanggal_kembali }}</p>
                    @php
                        $tglPinjam = new DateTime($transaksi->tanggal_pinjam);
                        $tglKembali = new DateTime($transaksi->tanggal_kembali);
                        $jumlahHariPinjam = $tglPinjam->diff($tglKembali)->days + 1;
                        $totalKeseluruhan = $transaksi->cartItems->sum(function($item) use ($jumlahHariPinjam) {
                            return $item->price * $item->quantity * $jumlahHariPinjam;
                        });
                    @endphp
                    <p class="text-gray-600 dark:text-gray-400">Jumlah Hari Pinjam: {{ $jumlahHariPinjam }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Total Keseluruhan: Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}</p>
                    <a href="{{ route('receipts.show', $transaksi->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>