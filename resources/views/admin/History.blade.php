<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="space-y-6 p-6 bg-gray-100 min-h-screen">
        <!-- Sort Tools -->
        <div class="flex justify-end mb-4">
            <label for="sort-method" class="mr-2 text-gray-700">Sort By:</label>
            <select id="sort-method" class="border border-gray-300 rounded-md p-2" onchange="sortHistory()">
                <option value="tanggal_pinjam_desc" {{ $sortMethod == 'tanggal_pinjam_desc' ? 'selected' : '' }}>Tanggal Pinjam (Newest)</option>
                <option value="tanggal_pinjam_asc" {{ $sortMethod == 'tanggal_pinjam_asc' ? 'selected' : '' }}>Tanggal Pinjam (Oldest)</option>
                <option value="tanggal_kembali_desc" {{ $sortMethod == 'tanggal_kembali_desc' ? 'selected' : '' }}>Tanggal Kembali (Newest)</option>
                <option value="tanggal_kembali_asc" {{ $sortMethod == 'tanggal_kembali_asc' ? 'selected' : '' }}>Tanggal Kembali (Oldest)</option>
                <option value="name_desc" {{ $sortMethod == 'name_desc' ? 'selected' : '' }}>Nama (A-Z)</option>
                <option value="name_asc" {{ $sortMethod == 'name_asc' ? 'selected' : '' }}>Nama (Z-A)</option>
                
            </select>
        </div>

        <div id="history-container">
            @php
                // Kelompokkan transaksi berdasarkan bulan dan tahun
                $groupedHistory = $historyTransaksi->groupBy(function($history) {
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
    </div>

    <script>
        function sortHistory() {
            const sortMethod = document.getElementById('sort-method').value;
            window.location.href = `?sort=${sortMethod}`;
        }
    </script>
</x-layoutadmin>

