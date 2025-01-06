<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="space-y-6 p-6 bg-gray-100 min-h-screen">
        @php
            // Kelompokkan transaksi berdasarkan bulan dan tahun
            $groupedHistory = $historyTransaksi->sortByDesc('tanggal_pinjam')->groupBy(function($history) {
                return (new DateTime($history->tanggal_pinjam))->format('F Y'); // Format: "Bulan Tahun"
            });
        @endphp
        @foreach ($groupedHistory as $monthYear => $transactions)
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $monthYear }}</h2>
                @foreach ($transactions as $history)
                    <a href="/detail_history/{{ $history->id }}" class="flex items-center rounded-lg overflow-hidden bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 mb-4">
                        <!-- Bagian Gambar profile peminjam -->
                        <div class="w-1/3 flex items-center justify-center p-4 bg-gray-200">
                            <img src="/storage/{{ $history->user->profile->foto_profile }}" alt="" class="rounded-full w-24 h-24 object-cover">
                        </div>
                        <!-- Bagian Informasi -->
                        <div class="w-2/3 p-4">
                            <h2 class="text-xl font-bold text-gray-800">{{ $history->user->name }}</h2>
                            <p class="text-gray-600">Tanggal Peminjaman: {{ $history->tanggal_pinjam }}</p>
                            <p class="text-gray-600">Tanggal Pengembalian: {{ $history->tanggal_kembali }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
</x-layoutadmin>

