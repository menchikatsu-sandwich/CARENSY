<!-- resources/views/admin/Edit_produk.blade.php -->
<x-layoutadmin>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="p-8 bg-gray-100 min-h-screen">
        <a href="/dashboard_admin" class="text-gray-600 hover:text-gray-800 mb-4 inline-block">
            <i class="fa-solid fa-angle-left text-xl"></i>
        </a>
        {{-- pesan gagal edit --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong> <span class="block sm:inline">Ada beberapa masalah dengan inputan Anda.</span>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulir -->
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-2 gap-6 max-w-3xl mx-auto" x-data="{ fileName: '', fileUrl: '' }">
            @csrf
            @method('POST')
            <!-- UPLOAD IMAGE -->
            <div class="flex flex-col items-center">
                <div
                    class="w-52 h-52 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-md p-2 cursor-pointer hover:border-blue-400 hover:bg-blue-50">
                    <label for="upload-image" class="flex flex-col items-center">
                        <template x-if="!fileUrl">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                        </template>
                        <template x-if="fileUrl">
                            <img :src="fileUrl" alt="" class="w-full h-full object-cover">
                        </template>
                        <span class="text-sm text-gray-500" x-text="fileName || 'Upload Image'"></span>
                    </label>
                    <input type="file" id="upload-image" name="image" class="hidden"
                        @change="fileName = $event.target.files[0].name; fileUrl = URL.createObjectURL($event.target.files[0])">
                </div>
            </div>

            <!-- Informasi Kamera -->
            <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                <div class="flex items-start">
                    <div class="w-24 h-24 bg-gray-200 rounded-md flex items-center justify-center">
                        <img src="{{ asset($product->image) }}" alt="" class="max-w-full max-h-full object-contain">
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">{{ $product->nama_product }}</h3>
                        <p class="text-gray-600">Merek: {{ $product->merek_product }}</p>
                        <p class="text-gray-600">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
                    </div>
                </div>
                <p class="font-bold mt-4">Deskripsi/detail Produk</p>
                <p class="text-gray-600">{{ substr($product->detail_product, 0, 150) }}</p>
            </div>

            <!-- KODE PRODUCT -->
            <div class="flex flex-col">
                <label for="kode-product" class="mb-2 text-sm font-medium text-gray-700">KODE PRODUCT</label>
                <input type="text" id="kode-product" name="kode_product" value="{{ $product->kode_product }}"
                    class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- NAMA PRODUCT -->
            <div class="flex flex-col">
                <label for="nama-camera" class="mb-2 text-sm font-medium text-gray-700">NAMA PRODUCT</label>
                <input type="text" id="nama-camera" name="nama_product" value="{{ $product->nama_product }}"
                    class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- MEREK PRODUCT -->
            <div class="flex flex-col">
                <label for="merek-camera" class="mb-2 text-sm font-medium text-gray-700">MEREK PRODUCT</label>
                <select id="merek-camera" name="merek_product"
                    class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="Canon" {{ $product->merek_product == 'Canon' ? 'selected' : '' }}>Canon</option>
                    <option value="Sony" {{ $product->merek_product == 'Sony' ? 'selected' : '' }}>Sony</option>
                    <option value="Nikon" {{ $product->merek_product == 'Nikon' ? 'selected' : '' }}>Nikon</option>
                    <option value="FujiFilm" {{ $product->merek_product == 'FujiFilm' ? 'selected' : '' }}>FujiFilm</option>
                    <option value="Dll" {{ $product->merek_product == 'Dll' ? 'selected' : '' }}>Dll</option>
                </select>
            </div>

            <!-- KATEGORI CAMERA -->
            <div class="flex flex-col">
                <label for="kategori-camera" class="mb-2 text-sm font-medium text-gray-700">KATEGORI</label>
                <select id="kategori-camera" name="kategori_product"
                    class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="Kamera" {{ $product->kategori_product == 'Kamera' ? 'selected' : '' }}>Kamera</option>
                    <option value="Gimbal" {{ $product->kategori_product == 'Gimbal' ? 'selected' : '' }}>Gimbal</option>
                    <option value="Tripod" {{ $product->kategori_product == 'Tripod' ? 'selected' : '' }}>Tripod</option>
                    <option value="Lensa" {{ $product->kategori_product == 'Lensa' ? 'selected' : '' }}>Lensa</option>
                    <option value="Dll" {{ $product->kategori_product == 'Dll' ? 'selected' : '' }}>Dll</option>
                </select>
            </div>

            <!-- DETAIL CAMERA -->
            <div class="flex flex-col">
                <label for="detail-camera" class="mb-2 text-sm font-medium text-gray-700">DETAIL CAMERA</label>
                <input type="text" id="detail-camera" name="detail_product" value="{{ $product->detail_product }}"
                    class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- TAHUN RILIS -->
            <div class="flex flex-col">
                <label for="tahun-rilis" class="mb-2 text-sm font-medium text-gray-700">TAHUN RILIS</label>
                <input type="date" id="tahun-rilis" name="tahun_rilis" value="{{ $product->tahun_rilis }}"
                    class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- STOCK -->
            <div class="flex flex-col">
                <label for="stock" class="mb-2 text-sm font-medium text-gray-700">STOCK</label>
                <input type="number" id="stock" name="stock" value="{{ $product->stock }}"
                    class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- HARGA SEWA -->
            <div class="flex flex-col">
                <label for="harga-sewa" class="mb-2 text-sm font-medium text-gray-700">HARGA SEWA</label>
                <input type="number" id="harga-sewa" name="harga_sewa" value="{{ $product->harga_sewa }}"
                    class="border border-gray-300 rounded-md p-3 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- BUTTON SUBMIT -->
            <div class="col-span-2 flex justify-end">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition">SUBMIT</button>
            </div>
        </form>
    </div>
</x-layoutadmin>
