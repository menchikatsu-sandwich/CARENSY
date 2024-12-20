<x-layoutadmin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex items-center border rounded-lg overflow-hidden">
        <!-- Bagian Gambar -->
        <div class="w-1/3 bg-white flex items-center justify-center p-4">
            <span class="text-gray-500">image</span>
        </div>
        <!-- Bagian Informasi -->
        <div class="w-2/3 bg-gray-200 p-4">
            <h2 class="text-lg font-bold">NAMA PRODUCT</h2>
            <p>Nama Peminjam</p>
            <p>Tanggal Peminjaman</p>
            <p>Tanggal Pengembalian</p>
        </div>
    </div>

</x-layoutadmin>
