<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($transactions as $transaction)
            <a href="/detail_pemesanan/{{ $transaction->id }}"
                class="w-full h-72 bg-white border border-gray-200 shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl cursor-pointer block">
                <div class="h-2/3 bg-gray-100 flex items-center justify-center">
                    <img src="/storage/{{ $transaction->user->profile->foto_profile??'' }}" alt="Gambar Peminjam" class="rounded-full w-24 h-24 object-cover">
                </div>
                 
                <div class="h-1/3 bg-gray-300 flex flex-col items-center justify-center p-4">
                    <span class="text-lg font-semibold text-gray-800">Penyewa:</span>
                    <span class="text-lg font-semibold text-gray-800">{{ $transaction->user->name }}</span>
                    <span class="text-gray-600">Tgl: {{ $transaction->created_at->format('d F Y') }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-layoutadmin>
