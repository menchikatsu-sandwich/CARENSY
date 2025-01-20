<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <!-- Search Form -->
    <div class="mb-4">
        <form action="{{ route('transactions.history') }}" method="GET" class="flex items-center space-x-4">
            <input type="text" name="search_name" placeholder="Search by name"
                   class="border border-gray-300 rounded-md p-2" value="{{ request('search_name') }}">
            <input type="date" name="search_date" placeholder="Search by date"
                   class="border border-gray-300 rounded-md p-2" value="{{ request('search_date') }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
        </form>
    </div>

    <div id="history-container">
        @php
            // Group transactions by month and year, sorted in descending order
            $groupedHistory = $historyTransaksi->sortByDesc('created_at')->groupBy(function ($history) {
                return (new DateTime($history->created_at))->format('F Y'); // Format: "Bulan Tahun"
            });
        @endphp
        @foreach ($groupedHistory as $monthYear => $transactions)
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $monthYear }}</h2>
                @foreach ($transactions as $history)
                    <a href="/detail_history/{{ $history->id }}"
                        class="flex items-center rounded-lg overflow-hidden bg-white shadow-lg hover:shadow-xl transition-shadow duration-300 mb-4">
                        <!-- Profile Picture -->
                        <div class="w-1/3 flex items-center justify-center p-4 bg-gray-200">
                            <img src="/storage/{{ $history->user->profile->foto_profile }}" alt=""
                                class="rounded-full w-24 h-24 object-cover">
                        </div>
                        <!-- Information -->
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
