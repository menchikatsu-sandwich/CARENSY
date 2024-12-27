<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="space-y-4">
        @foreach ($historyTransaksi as $history)
            <a href="/detail_history/{{ $history->id }}" class="flex items-center rounded-lg overflow-hidden bg-white shadow-lg">
                <!-- Bagian Gambar profile peminjam -->
                <div class="w-1/3 flex items-center justify-center p-4">
                    <img src="/storage/{{ $history->user->profile->foto_profile }}" alt="">
                    
                </div>
                <!-- Bagian Informasi -->
                <div class="w-2/3 bg-gray-200 p-4">
                    <h2 class="text-lg font-bold">{{ $history->user->name }}</h2>
                    <p>Tanggal Peminjaman: {{ $history->tanggal_pinjam }}</p>
                    <p>Tanggal Pengembalian: {{ $history->tanggal_kembali }}</p>
                </div>
            </a>
        @endforeach
    </div>
</x-layoutadmin>
