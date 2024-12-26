<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Checkout</h2>

        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border">Kode Produk</th>
                    <th class="py-2 px-4 border">Nama Produk</th>
                    <th class="py-2 px-4 border">Quantity</th>
                    <th class="py-2 px-4 border">Harga</th>
                    <th class="py-2 px-4 border">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->cartItems as $item)
                    <tr>
                        <td class="py-2 px-4 border">{{ $item->product->kode_product }}</td>
                        <td class="py-2 px-4 border">{{ $item->product->nama_product }}</td>
                        <td class="py-2 px-4 border text-center">{{ $item->quantity }}</td>
                        <td class="py-2 px-4 border">{{ number_format($item->price, 2) }}</td>
                        <td class="py-2 px-4 border">{{ number_format($item->quantity * $item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right py-2 px-4 border"><strong>Total Harga:</strong></td>
                    <td class="py-2 px-4 border"><strong id="totalHarga">0.00</strong></td>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('checkout.process') }}" method="POST" class="mt-4 space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Card Kiri -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="form-group">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>

                    <div class="form-group mt-4">
                        <label for="alamat_now" class="block text-sm font-medium text-gray-700">Alamat Saat ini</label>
                        <textarea name="alamat_now" id="alamat_now" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="alamat_ktp" class="block text-sm font-medium text-gray-700">Alamat Sesuai KTP</label>
                        <textarea name="alamat_ktp" id="alamat_ktp" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                    </div>

                    <div class="form-group mt-4">
                        <label for="media_sosial" class="block text-sm font-medium text-gray-700">Media Sosial</label>
                        <input type="text" name="media_sosial" id="media_sosial" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                </div>

                <!-- Card Kanan -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="form-group">
                        <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>

                    <div class="form-group mt-4">
                        <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4">Pesan</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tanggalPinjam = document.getElementById('tanggal_pinjam');
            const tanggalKembali = document.getElementById('tanggal_kembali');
            const totalHargaElement = document.getElementById('totalHarga');

            const calculateTotal = () => {
                const startDate = new Date(tanggalPinjam.value);
                const endDate = new Date(tanggalKembali.value);
                const oneDay = 24 * 60 * 60 * 1000; // Milliseconds in one day
                const jumlahHari = Math.round((endDate - startDate) / oneDay) + 1;
                
                let totalHarga = 0;

                @foreach ($cart->cartItems as $item)
                    totalHarga += {{ $item->quantity }} * {{ $item->price }} * jumlahHari;
                @endforeach

                totalHargaElement.textContent = totalHarga.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            };

            tanggalPinjam.addEventListener('change', calculateTotal);
            tanggalKembali.addEventListener('change', calculateTotal);
        });
    </script>
</x-layout>
