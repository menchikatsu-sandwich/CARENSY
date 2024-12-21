<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto mt-10 px-4">
        <div class="bg-gray-200 rounded-full px-4 py-2 text-center shadow">
            <h2 class="text-gray-800 text-lg font-bold">Hasil Pencarian Produk</h2>
        </div>
        
        <form action="{{ route('search') }}" method="GET" class="mt-6">
            <div class="flex items-center">
                <input type="text" name="query" class="w-full px-4 py-2 rounded-lg border border-gray-300" placeholder="Cari produk...">
                <button type="submit" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Cari</button>
            </div>
        </form>
        
        @if(isset($products))
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
                @foreach ($products as $product)
                    <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform hover:scale-105">
                        <div class="bg-white rounded-lg shadow p-4 text-center border border-black">
                            <div class="bg-gray-200 h-48 rounded-lg overflow-hidden flex justify-center items-center">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->nama_product }}">
                            </div>
                            <div class="bg-gray-200 mt-4 p-2 rounded-lg">
                                <h3 class="text-gray-700 font-medium">{{ $product->nama_product }}</h3>
                                <p class="text-gray-900 font-bold">Rp. {{ number_format($product->harga_sewa) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
