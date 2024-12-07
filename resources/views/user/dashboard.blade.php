<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div 
  class="relative bg-gray-300 rounded-lg h-[350px] overflow-hidden"
  x-data="{ 
      activeSlide: 0, 
      slides: [
          { image: 'img/camera1.webp' },
          { image: 'img/camera.jpg' },
          { image: 'img/camera3.webp' }
      ] 
  }">
  <!-- Gambar -->
  <template x-for="(slide, index) in slides" :key="index">
    <div x-show="activeSlide === index" class="absolute inset-0">
      <img :src="slide.image" :alt="'Slide ' + (index + 1)" class="w-full h-full object-cover">
    </div>
  </template>
  <!-- Tombol Navigasi -->
  <button 
    @click="activeSlide = activeSlide > 0 ? activeSlide - 1 : slides.length - 1" 
    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-[#333333] text-white w-8 h-8 flex items-center justify-center rounded-full">
    &#10094;
  </button>
  <button 
    @click="activeSlide = (activeSlide + 1) % slides.length" 
    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-[#333333] text-white w-8 h-8 flex items-center justify-center rounded-full">
    &#10095;
  </button>

  <!-- Indicator -->
  <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
    <template x-for="(slide, index) in slides" :key="index">
      <div 
        class="w-3 h-3 rounded-full cursor-pointer transition-all duration-300"
        :class="{ 'bg-gray-700': activeSlide === index, 'bg-gray-400': activeSlide !== index }"
        @click="activeSlide = index">
      </div>
    </template>
  </div>
</div>

<!-- Produk Section -->
<div class="container mx-auto mt-10 px-4">
    <h2 class="text-gray-800 text-xl font-bold mb-6">PRODUK</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
      <!-- Produk Card -->
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
      <a href="/link-produk" class="block transform transition-transform duration-300 hover:scale-105">
        <div class="bg-white rounded-lg shadow p-4 text-center">
          <div class="bg-gray-200 h-40 rounded-lg flex justify-center items-center">
            <p class="text-gray-500">image</p>
          </div>
          <h3 class="mt-4 text-gray-700 font-medium">Nama Kamera</h3>
          <p class="text-gray-900 font-bold">Rp 100.000</p>
        </div>
      </a>
    </div>
  </div>

  <!-- Footer -->

</x-layout>