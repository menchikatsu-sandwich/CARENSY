<x-layoutadmin>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    {{-- pesan gagal input --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert"> <strong
                class="font-bold">Oops!</strong> <span class="block sm:inline">Ada beberapa masalah dengan inputan
                Anda.</span>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="p-8">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-2 gap-4 max-w-3xl mx-auto" x-data="{ fileName: '', fileUrl: '' }">
            @csrf
            <!-- KODE PRODUCT -->
            <div class="flex flex-col">
                <label for="kode-product" class="mb-2 text-sm font-medium text-gray-700">KODE PRODUCT</label>
                <input type="text" id="kode-product" name="kode_product"
                    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- NAMA PRODUCT -->
            <div class="flex flex-col">
                <label for="nama-camera" class="mb-2 text-sm font-medium text-gray-700">NAMA PRODUCT</label>
                <input type="text" id="nama-camera" name="nama_product"
                    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- MEREK PRODUCT -->
            <div class="flex flex-col">
                <label for="merek-camera" class="mb-2 text-sm font-medium text-gray-700">MEREK PRODUCT</label>
                <select id="merek-camera" name="merek_product"
                    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="Canon">Canon</option>
                    <option value="Sony">Sony</option>
                    <option value="Nikon">Nikon</option>
                    <option value="FujiFilm">FujiFilm</option>
                    <option value="Dll">Dll</option>
                </select>
            </div>

            <!-- KATEGORI CAMERA -->
            <div class="flex flex-col">
                <label for="kategori-camera" class="mb-2 text-sm font-medium text-gray-700">KATEGORI</label>
                <select id="kategori-camera" name="kategori_product"
                    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="Kamera">Kamera</option>
                    <option value="Gimbal">Gimbal</option>
                    <option value="Tripod">Tripod</option>
                    <option value="Lensa">Lensa</option>
                    <option value="Dll">Dll</option>
                </select>
            </div>

            <!-- DETAIL CAMERA -->
            <div class="flex flex-col">
                <label for="detail-camera" class="mb-2 text-sm font-medium text-gray-700">DETAIL CAMERA</label>
                <input type="text" id="detail-camera" name="detail_product"
                    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- TAHUN RILIS -->
            <div class="flex flex-col">
                <label for="tahun-rilis" class="mb-2 text-sm font-medium text-gray-700">TAHUN RILIS</label>
                <input type="date" id="tahun-rilis" name="tahun_rilis"
                    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- STOCK -->
            <div class="flex flex-col">
                <label for="stock" class="mb-2 text-sm font-medium text-gray-700">STOCK</label>
                <input type="number" id="stock" name="stock"
                    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- HARGA SEWA -->
            <div class="flex flex-col">
                <label for="harga-sewa" class="mb-2 text-sm font-medium text-gray-700">HARGA SEWA</label>
                <input type="number" id="harga-sewa" name="harga_sewa"
                    class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
            </div>

            <!-- UPLOAD IMAGE -->
            <div class="flex items-center">
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

            <!-- BUTTON SUBMIT -->
            <div class="col-span-2 flex justify-end">
                <button type="submit"
                    class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition">SUBMIT</button>
            </div>
        </form>
    </div>
</x-layoutadmin>
