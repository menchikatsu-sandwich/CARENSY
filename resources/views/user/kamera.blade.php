<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>
<!-- Produk Section -->
<div class="container mx-auto mb-10 mt-10 px-4">
  <h1 class="mb-6 text-2xl font-bold text-center">
    <img src="img/CARENSY.png" alt="LOGO CARENSY" class="mx-auto w-32 sm:w-40 md:w-48 lg:w-56">
  </h1>
  <!-- Judul Utama -->
  <div class="rounded-full px-4 py-2 text-center">
    <h2 class="text-gray-800 dark:text-gray-100 text-lg sm:text-xl font-bold">LIST CAMERA</h2>
  </div>

  <!-- Canon Section -->
  <div class="mt-8" id="canon">
    <div class="bg-gray-200 dark:bg-gray-700 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 dark:text-gray-100 text-base sm:text-lg font-bold">Canon</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mt-6">
      @foreach ($products->where('merek_product', 'Canon')->where('kategori_product', 'Kamera') as $product)
      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-2 sm:p-4 text-center border border-black dark:border-gray-700 h-full flex flex-col">
          <div class="bg-gray-200 dark:bg-gray-700 h-32 sm:h-40 md:h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-contain">
          </div>
          <div class="bg-gray-200 dark:bg-gray-700 mt-2 sm:mt-4 p-2 rounded-lg flex-grow">
            <h3 class="text-gray-700 dark:text-gray-300 font-medium text-sm sm:text-base">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 dark:text-gray-100 font-bold text-sm sm:text-base mt-1">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <!-- Nikon Section -->
  <div class="mt-8" id="nikon">
    <div class="bg-gray-200 dark:bg-gray-700 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 dark:text-gray-100 text-base sm:text-lg font-bold">Nikon</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mt-6">
      @foreach ($products->where('merek_product', 'Nikon')->where('kategori_product', 'Kamera') as $product)
      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-2 sm:p-4 text-center border border-black dark:border-gray-700 h-full flex flex-col">
          <div class="bg-gray-200 dark:bg-gray-700 h-32 sm:h-40 md:h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-contain">
          </div>
          <div class="bg-gray-200 dark:bg-gray-700 mt-2 sm:mt-4 p-2 rounded-lg flex-grow">
            <h3 class="text-gray-700 dark:text-gray-300 font-medium text-sm sm:text-base">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 dark:text-gray-100 font-bold text-sm sm:text-base mt-1">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <!-- FujiFilm Section -->
  <div class="mt-8" id="fujifilm">
    <div class="bg-gray-200 dark:bg-gray-700 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 dark:text-gray-100 text-base sm:text-lg font-bold">FujiFilm</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mt-6">
      @foreach ($products->where('merek_product', 'FujiFilm')->where('kategori_product', 'Kamera') as $product)
      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-2 sm:p-4 text-center border border-black dark:border-gray-700 h-full flex flex-col">
          <div class="bg-gray-200 dark:bg-gray-700 h-32 sm:h-40 md:h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-contain">
          </div>
          <div class="bg-gray-200 dark:bg-gray-700 mt-2 sm:mt-4 p-2 rounded-lg flex-grow">
            <h3 class="text-gray-700 dark:text-gray-300 font-medium text-sm sm:text-base">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 dark:text-gray-100 font-bold text-sm sm:text-base mt-1">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <!-- Sony Section -->
  <div class="mt-8" id="sony">
    <div class="bg-gray-200 dark:bg-gray-700 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 dark:text-gray-100 text-base sm:text-lg font-bold">Sony</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mt-6">
      @foreach ($products->where('merek_product', 'Sony')->where('kategori_product', 'Kamera') as $product)
      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-2 sm:p-4 text-center border border-black dark:border-gray-700 h-full flex flex-col">
          <div class="bg-gray-200 dark:bg-gray-700 h-32 sm:h-40 md:h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-contain">
          </div>
          <div class="bg-gray-200 dark:bg-gray-700 mt-2 sm:mt-4 p-2 rounded-lg flex-grow">
            <h3 class="text-gray-700 dark:text-gray-300 font-medium text-sm sm:text-base">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 dark:text-gray-100 font-bold text-sm sm:text-base mt-1">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  <!-- Lainnya Section -->
  <div class="mt-8" id="dll">
    <div class="bg-gray-200 dark:bg-gray-700 rounded-full px-4 py-2 text-center shadow">
      <h3 class="text-gray-800 dark:text-gray-100 text-base sm:text-lg font-bold">Lainnya</h3>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mt-6">
      @foreach ($products->where('merek_product', 'Dll')->where('kategori_product', 'Kamera') as $product)
      <a href="/link_produk/{{ $product->id }}" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-2 sm:p-4 text-center border border-black dark:border-gray-700 h-full flex flex-col">
          <div class="bg-gray-200 dark:bg-gray-700 h-32 sm:h-40 md:h-48 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset($product->image) }}" alt="gambar camera" class="h-full w-full object-contain">
          </div>
          <div class="bg-gray-200 dark:bg-gray-700 mt-2 sm:mt-4 p-2 rounded-lg flex-grow">
            <h3 class="text-gray-700 dark:text-gray-300 font-medium text-sm sm:text-base">{{ $product->nama_product }}</h3>
            <p class="text-gray-900 dark:text-gray-100 font-bold text-sm sm:text-base mt-1">Rp. {{ number_format($product->harga_sewa, 0, ',', '.') }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>

</div>
</x-layout>