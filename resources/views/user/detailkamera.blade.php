<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Header -->
    <div class="flex items-center justify-between mb-4 px-4">
        <a href="javascript:window.history.back();" class="text-gray-600">
            <i class="fa-solid fa-angle-left"></i>
        </a>
    </div>

    <!-- Content -->
    <div class="p-4 md:p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <div class="flex flex-col md:flex-row items-start space-y-4 md:space-y-0 md:space-x-4">
            <!-- Image Container -->
            <div class="w-full md:w-1/2">
                <div class="aspect-[4/3] bg-gray-200 dark:bg-gray-700 rounded-md overflow-hidden">
                    <img 
                        src="{{ asset($product->image) }}" 
                        alt="{{ $product->nama_product }}" 
                        class="w-full h-full object-contain rounded-md transition-transform duration-300 hover:scale-105"
                    >
                </div>
            </div>
            
            <!-- Product Details -->
            <div class="w-full md:w-1/2 px-2 md:px-0">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100">{{ $product->nama_product }}</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Kategori: {{ $product->kategori_product }}</p>
                <p class="text-gray-600 dark:text-gray-400">Merek: {{ $product->merek_product }}</p>
                <p class="text-gray-800 dark:text-gray-100 font-bold text-xl md:text-2xl mt-4">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Stok: {{ $product->stock }}</p>
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 dark:text-gray-100 mb-2">Deskripsi/Kelengkapan Kamera:</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                        {{ $product->detail_product }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Alert for stock error -->
        @if(session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4 mt-4">
                Stock tidak mencukupi atau sedang kosong
            </div>
        @endif

        <!-- Form Tambah ke Keranjang -->
        @if($product->stock > 0)
        <form action="{{ route('cart.add') }}" method="POST" class="mt-6 p-4 bg-gray-100 dark:bg-gray-700 shadow-lg rounded-lg border border-gray-300 dark:border-gray-600">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="mt-4">
                <label for="quantity" class="block text-gray-800 dark:text-gray-100">Jumlah:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-24 border border-gray-300 dark:border-gray-600 rounded-md p-2 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
            </div>
            <button type="submit" class="mt-4 bg-gray-800 dark:bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-600 dark:hover:bg-gray-400 transition-colors duration-300">Tambah ke Keranjang</button>
        </form>
        @else
            <div class="bg-red-500 text-white p-2 rounded mb-4 mt-4">
                Stock kosong
            </div>
        @endif
    </div>

    <!-- JavaScript for interactive elements -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const image = document.querySelector('img');
            image.addEventListener('mouseover', function() {
                this.classList.add('scale-105');
            });
            image.addEventListener('mouseout', function() {
                this.classList.remove('scale-105');
            });
        });
    </script>
</x-layout>
