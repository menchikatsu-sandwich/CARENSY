<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>
<!-- Produk Section -->
<div class="container mx-auto mb-10 mt-10 px-4">
  <h1 class="mb-6 text-2xl font-bold text-center"><img src="img/CARENSY.png" alt="LOGO CARENSY" style="width: 15%; height: auto; margin: 0 auto;"></h1>
  <!-- Judul Utama -->
  <div class="rounded-full px-4 py-2 text-center">
    <h2 class="text-gray-800 text-lg font-bold">LIST PRODUK</h2>
  </div>

  <!-- Camera Section -->
  <div class="mt-8" id="camera">
    <div class="bg-gray-200 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 text-lg font-bold">Camera</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
      <!-- Camera Produk Card -->
      @foreach ($products->where('kategori_product','Kamera') as $product)
        

      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center border border-black">
          <div class="bg-gray-200 h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-cover">
          </div>
          <div class="bg-gray-200 mt-4 p-2 rounded-lg">
            <h3 class="text-gray-700 font-medium">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 font-bold">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach

    </div>
  </div>

  <!-- Gimbal Section -->
  <div class="mt-8" id="gimbal"> 
    <div class="bg-gray-200 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 text-lg font-bold">Gimbal</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
      <!-- Gimbal Produk Card -->
      @foreach ($products->where('kategori_product','Gimbal') as $product)
        

      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center border border-black">
          <div class="bg-gray-200 h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-cover">
          </div>
          <div class="bg-gray-200 mt-4 p-2 rounded-lg">
            <h3 class="text-gray-700 font-medium">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 font-bold">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>

  <!-- Lensa Section -->
  <div class="mt-8" id="lensa">
    <div class="bg-gray-200 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 text-lg font-bold">Lensa</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
      <!-- Lensa Produk Card -->
      @foreach ($products->where('kategori_product','Lensa') as $product)
        

      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center border border-black">
          <div class="bg-gray-200 h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-cover">
          </div>
          <div class="bg-gray-200 mt-4 p-2 rounded-lg">
            <h3 class="text-gray-700 font-medium">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 font-bold">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach

    </div>
  </div>

  <!-- Tripod Section -->
  <div class="mt-8" id="tripod">
    <div class="bg-gray-200 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 text-lg font-bold">Tripod</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
      <!-- Tripod Produk Card -->
      @foreach ($products->where('kategori_product','Tripod') as $product)
        

      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center border border-black">
          <div class="bg-gray-200 h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-cover">
          </div>
          <div class="bg-gray-200 mt-4 p-2 rounded-lg">
            <h3 class="text-gray-700 font-medium">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 font-bold">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <!-- Lainnya Section -->
  <div class="mt-8" id="dlll">
    <div class="bg-gray-200 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 text-lg font-bold">Lainnya</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
      <!-- Lainnya Produk Card -->
      @foreach ($products->where('kategori_product','Dll') as $product)
        

      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center border border-black">
          <div class="bg-gray-200 h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-cover">
          </div>
          <div class="bg-gray-200 mt-4 p-2 rounded-lg">
            <h3 class="text-gray-700 font-medium">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 font-bold">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</div>

</x-layout>