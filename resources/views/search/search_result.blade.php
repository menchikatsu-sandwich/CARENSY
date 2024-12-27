<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto mt-10 px-4">
        <div class="bg-gray-200 dark:bg-gray-700 rounded-full px-4 py-2 text-center shadow">
            <h2 class="text-gray-800 dark:text-gray-100 text-lg font-bold">Hasil Pencarian Produk</h2>
        </div>
        
        @if(isset($products))
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
                @foreach ($products as $product)
                    <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform hover:scale-105">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 text-center border border-black dark:border-gray-700">
                            <div class="bg-gray-200 dark:bg-gray-700 h-48 rounded-lg overflow-hidden flex justify-center items-center">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->nama_product }}" class="h-full w-full object-cover">
                            </div>
                            <div class="bg-gray-200 dark:bg-gray-700 mt-4 p-2 rounded-lg">
                                <h3 class="text-gray-700 dark:text-gray-300 font-medium">{{ $product->nama_product }}</h3>
                                <p class="text-gray-900 dark:text-gray-100 font-bold">Rp. {{ number_format($product->harga_sewa) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
