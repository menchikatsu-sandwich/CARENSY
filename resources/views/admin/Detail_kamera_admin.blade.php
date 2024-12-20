<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        {{-- back --}}
        <a href="/dashboard_admin" class="text-gray-600">
            <i class="fa-solid fa-angle-left"></i>
        </a>
        {{-- edit --}}
        <div class="flex space-x-2">
            <a href="/edit_produk/{{ $product->id }}">
                <button class="text-gray-600">
                    <i class="fa-regular fa-pen-to-square">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                    </i>
                </button>
            </a>

            {{-- delete --}}
            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this product?');"> @csrf @method('DELETE')
                <button type="submit" class="text-gray-600"> <i class="fa-regular fa-trash-can">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </i> </button>
            </form>
        </div>
    </div>
    <!-- Content -->
    <div class="flex items-start space-x-4">
        <div class="w-24 h-24 bg-gray-200 rounded-md flex items-center justify-center">
            <img src="{{ asset($product->image) }}" alt="">
        </div>
        <div>
            <h2 class="text-lg font-bold">{{ $product->nama_product }}</h2>
            <p class="text-gray-600">Kategoy : {{ $product->merek_product }}</p>
            <p class="text-gray-600">Merek : {{ $product->kategori_product }}</p>
            <p class="text-gray-800 font-bold">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
        </div>
    </div>
    <!-- Description -->
    <div class="mt-6">
        <h3 class="font-semibold text-gray-800 mb-2">Deskripsi/kelengkapan camera :</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
            {{ $product->detail_product }}
        </p>
    </div>

</x-layoutadmin>
