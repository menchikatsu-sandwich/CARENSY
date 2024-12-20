<!-- resources/views/admin/Dashboard_admin.blade.php -->
<x-layoutadmin>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($products as $product)
                <a href="/detail_kamera/{{ $product->id }}"
                    class="w-full h-72 bg-white border border-black shadow-lg rounded-md overflow-hidden transition-transform transform hover:scale-105 cursor-pointer block">
                    <div class="h-2/3 bg-gray-100 flex items-center justify-center">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->nama_product }}"
                            class="max-w-full max-h-full object-contain">
                    </div>
                    <div class="h-1/3 bg-gray-300 flex items-center justify-center">
                        <span class="text-black">{{ $product->nama_product }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layoutadmin>
