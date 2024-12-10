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
                <button class="text-gray-600">
                    <i class="fa-regular fa-pen-to-square">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                    </i>
                </button>
                {{-- delete --}}
                <button class="text-gray-600">
                    <i class="fa-regular fa-trash-can">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </i>
                </button>
            </div>
        </div>
        <!-- Content -->
        <div class="flex items-start space-x-4">
            <div class="w-24 h-24 bg-gray-200 rounded-md flex items-center justify-center">
                <img src="img/produk/cam1.jpeg" alt="">
            </div>
            <div>
                <h2 class="text-lg font-bold">Nama Camera</h2>
                <p class="text-gray-600">Merek</p>
                <p class="text-gray-800 font-bold">Rp 100.000</p>
            </div>
        </div>
        <!-- Description -->
        <div class="mt-6">
            <h3 class="font-semibold text-gray-800 mb-2">Deskripsi/kelengkapan camera :</h3>
            <p class="text-gray-600 text-sm leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent justo felis, tempus quis semper ac, auctor at orci. Sed ut magna ut dolor porta ultrices vitae vitae quam. Curabitur vitae egestas nulla.
            </p>
        </div>

</x-layoutadmin>
