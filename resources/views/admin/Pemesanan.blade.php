<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($transactions as $transaction)
            <a href="/detail_pemesanan/{{ $transaction->id }}"
                class="w-full h-72 bg-white border border-black shadow-lg rounded-md overflow-hidden transition-transform transform hover:scale-105 cursor-pointer block">
                <div class="h-2/3 bg-gray-100 flex items-center justify-center">
                    <img src="/storage/{{ $transaction->user->profile->foto_profile??'' }}" alt="Gambar Peminjam" class="max-w-full max-h-full object-contain">
                </div>
                 
                <div class="h-1/3 bg-gray-300 flex flex-col items-center justify-center">
                    <span class="text-black">dipesan oleh...</span>
                    <span class="text-black">{{ $transaction->user->name }}</span>
                    <span class="text-black">tgl: {{ $transaction->created_at->format('d F Y') }}</span>
                </div>
               
                

            </a>
            @endforeach
        </div>
    </div>
</x-layoutadmin>
