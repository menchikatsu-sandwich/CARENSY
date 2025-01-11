<x-layoutadmin>
    <x-slot:title>
    </x-slot:title>

    <div class="p-6 bg-gray-100 min-h-screen">
        <!-- Search Form -->
        <div class="mb-4">
            <form action="{{ route('product.index') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Search by name"
                    class="border border-gray-300 rounded-md p-2 w-full" value="{{ request('search') }}">
                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
            </form>
        </div>
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">{{ $title }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <a href="/detail_kamera/{{ $product->id }}"
                    class="block bg-white border border-gray-200 shadow-lg rounded-lg overflow-hidden hover:shadow-xl hover:scale-105 transition-transform duration-300">
                    <div class="h-48 bg-gray-100 flex items-center justify-center">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->nama_product }}"
                            class="max-w-full max-h-full object-contain">
                    </div>
                    <div class="p-4 bg-white">
                        <span class="block text-center text-xl font-semibold text-gray-800">
                            {{ $product->nama_product }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layoutadmin>
