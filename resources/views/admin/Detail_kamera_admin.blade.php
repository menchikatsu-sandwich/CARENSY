<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-6" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block">{{ session('success') }}</span>
        </div>
    @endif



    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <a href="/dashboard_admin" class="text-gray-600 hover:text-gray-800">
            <i class="fa-solid fa-angle-left text-xl"></i>
        </a>
        <div class="flex space-x-4">
            <a href="/edit_produk/{{ $product->id }}" class="text-blue-600 hover:text-blue-800">
                <i class="fa-regular fa-pen-to-square text-xl"></i>
            </a>
            <form id="delete-form" action="{{ route('product.destroy', $product->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="button" class="text-red-600 hover:text-red-800" onclick="confirmDelete()">
                    <i class="fa-regular fa-trash-can text-xl"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Content -->
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
        <div class="flex flex-col items-center">
            <div class="w-full h-64 bg-gray-200 rounded-md flex items-center justify-center mb-6">
                <img src="{{ asset($product->image) }}" alt="{{ $product->nama_product }}" class="max-w-full max-h-full object-contain">
            </div>
            <div class="w-full">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">{{ $product->nama_product }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="font-bold text-gray-800">Kategori:</p>
                        <p class="text-gray-600">{{ $product->kategori_product }}</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Merek:</p>
                        <p class="text-gray-600">{{ $product->merek_product }}</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Stock:</p>
                        <p class="text-gray-600">{{ $product->stock }}</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800">Harga Sewa:</p>
                        <p class="text-gray-800 font-bold">Rp {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="font-bold text-gray-800">Deskripsi:</p>
                        <p class="text-gray-600">{{ $product->detail_product }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda dapat menginputkannya kembali di Form Input",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            })
        }
    </script>
</x-layoutadmin>
