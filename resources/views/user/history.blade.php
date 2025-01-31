<x-layout>
    <x-slot name="title">
        History Transaksi
    </x-slot>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-gray-100">History Transaksi</h1>
        @php
            // Kelompokkan transaksi berdasarkan bulan dan tahun
            $groupedHistoryTransaksi = $historyTransaksi->sortByDesc('tanggal_pinjam')->groupBy(function($historyTransaction) {
                return (new DateTime($historyTransaction->tanggal_pinjam))->format('F Y');
            });
        @endphp
        @foreach($groupedHistoryTransaksi as $monthYear => $transactions)
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-100">{{ $monthYear }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($transactions as $historyTransaction)
                        @php
                            $firstItem = $historyTransaction->historiItems->first();
                        @endphp
                        @if($firstItem && $firstItem->product)
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                                <img src="{{ asset($firstItem->product->image) }}" class="w-full h-48 object-cover" alt="{{ $firstItem->product->nama_product }}">
                                <div class="p-4">
                                    <h5 class="text-xl font-semibold mb-2 text-gray-700 dark:text-gray-300">{{ $firstItem->product->nama_product }}</h5>
                                    <p class="text-gray-600 dark:text-gray-400">Tanggal Pinjam: {{ $historyTransaction->tanggal_pinjam }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">Tanggal Kembali: {{ $historyTransaction->tanggal_kembali }}</p>
                                    @php
                                        $tglPinjam = new DateTime($historyTransaction->tanggal_pinjam);
                                        $tglKembali = new DateTime($historyTransaction->tanggal_kembali);
                                        $jumlahHariPinjam = $tglPinjam->diff($tglKembali)->days + 1;
                                        $totalKeseluruhan = $historyTransaction->historiItems->sum(function($item) use ($jumlahHariPinjam) {
                                            return $item->price * $item->quantity * $jumlahHariPinjam;
                                        });
                                    @endphp
                                    <p class="text-gray-600 dark:text-gray-400">Jumlah Hari Pinjam: {{ $jumlahHariPinjam }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">Total Keseluruhan: Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}</p>
                                    <a href="/detail_pesanan/{{$historyTransaction->id}}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat Detail</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
