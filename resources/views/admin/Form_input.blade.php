<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-8">
        <form action="/submit" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-4 max-w-3xl mx-auto">
          <!-- KODE PRODUCT -->
          <div class="flex flex-col">
            <label for="kode-product" class="mb-2 text-sm font-medium text-gray-700">KODE PRODUCT</label>
            <input type="text" id="kode-product" name="kode_product" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
          </div>
      
          <!-- NAMA CAMERA -->
          <div class="flex flex-col">
            <label for="nama-camera" class="mb-2 text-sm font-medium text-gray-700">NAMA CAMERA</label>
            <input type="text" id="nama-camera" name="nama_camera" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
          </div>
      
          <!-- MEREK CAMERA -->
          <div class="flex flex-col">
            <label for="merek-camera" class="mb-2 text-sm font-medium text-gray-700">MEREK CAMERA</label>
            <input type="text" id="merek-camera" name="merek_camera" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
          </div>
      
          <!-- DETAIL CAMERA -->
          <div class="flex flex-col">
            <label for="detail-camera" class="mb-2 text-sm font-medium text-gray-700">DETAIL CAMERA</label>
            <input type="text" id="detail-camera" name="detail_camera" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
          </div>
      
          <!-- TAHUN RILIS -->
          <div class="flex flex-col">
            <label for="tahun-rilis" class="mb-2 text-sm font-medium text-gray-700">TAHUN RILIS</label>
            <input type="number" id="tahun-rilis" name="tahun_rilis" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
          </div>

          <!-- STOCK -->
          <div class="flex flex-col">
            <label for="stock" class="mb-2 text-sm font-medium text-gray-700">STOCK</label>
            <input type="number" id="stock" name="stock" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
          </div>
      
      
          <!-- UPLOAD IMAGE -->
          <div class="flex items-center">
            <div class="w-52 h-52 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-md p-2 cursor-pointer hover:border-blue-400 hover:bg-blue-50">
              <label for="upload-image" class="flex flex-col items-center">
                <img src="https://via.placeholder.com/100x100?text=Image" alt="Upload Icon" class="w-12 h-12 mb-2">
                <span class="text-sm text-gray-500">Upload Image</span>
              </label>
              <input type="file" id="upload-image" name="image" class="hidden">
            </div>
          </div>
      
          
          <!-- HARGA SEWA -->
          <div class="flex flex-col">
            <label for="harga-sewa" class="mb-2 text-sm font-medium text-gray-700">HARGA SEWA</label>
            <input type="number" id="harga-sewa" name="harga_sewa" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-blue-200">
          </div>
      
          <!-- BUTTON SUBMIT -->
          <div class="col-span-2 flex justify-end">
            <button type="submit" class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 transition">SUBMIT</button>
          </div>
        </form>
      </div>
      
      
</x-layoutadmin>