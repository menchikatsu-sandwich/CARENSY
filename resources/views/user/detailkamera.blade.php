<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        {{-- back --}}
        <a href="/" class="text-gray-600">
            <i class="fa-solid fa-angle-left"></i>
        </a>
    </div>

    <!-- Content -->
    <div class="p-6 bg-white shadow-lg rounded-lg">
        <div class="flex flex-col md:flex-row items-start space-x-0 md:space-x-4 space-y-4 md:space-y-0">
            <div class="w-full md:w-1/2 h-96 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden">
                <img src="{{ asset($product->image) }}" alt="{{ $product->nama_product }}" class="w-full h-full object-cover rounded-md transition-transform duration-300 hover:scale-105">
            </div>
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold text-gray-800">{{ $product->nama_product }}</h2>
                <p class="text-gray-600 mt-2">Kategori: {{ $product->kategori_product }}</p>
                <p class="text-gray-600">Merek: {{ $product->merek_product }}</p>
                <p class="text-gray-800 font-bold text-2xl mt-4">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
                <p class="text-gray-600 mt-2">Stok: {{ $product->stock }}</p>
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 mb-2">Deskripsi/Kelengkapan Kamera:</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
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
            <form action="{{ route('cart.add') }}" method="POST" class="mt-6 p-4 bg-gray-300 shadow-lg rounded-lg">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mt-4">
                    <label for="quantity" class="block text-gray-700">Jumlah:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-24 border border-gray-300 rounded-md p-2">
                </div>
                <button type="submit" class="mt-4 bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition-colors duration-300">Tambah ke Keranjang</button>
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
