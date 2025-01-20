<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto mb-6 mt-6 md:mb-10 md:mt-10 px-2 md:px-4">
        <h1 class="mb-4 md:mb-6 text-xl md:text-2xl font-bold text-center text-gray-800 dark:text-gray-100">Checkout</h1>
        <div class="bg-gray-200 dark:bg-gray-700 rounded-lg shadow p-2 md:p-4">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">Kode Produk</th>
                            <th class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">Nama Produk</th>
                            <th class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">Quantity</th>
                            <th class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">Harga</th>
                            <th class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->cartItems as $item)
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">{{ $item->product->kode_product }}</td>
                                <td class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">{{ $item->product->nama_product }}</td>
                                <td class="py-2 px-2 md:px-4 border text-center dark:border-gray-700 text-sm md:text-base">{{ $item->quantity }}</td>
                                <td class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">{{ number_format($item->price, 2) }}</td>
                                <td class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base">{{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <td colspan="4" class="text-right py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base"><strong>Jumlah Hari:</strong></td>
                            <td class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base"><strong id="jumlahHari">0</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base"><strong>Total Harga:</strong></td>
                            <td class="py-2 px-2 md:px-4 border dark:border-gray-700 text-sm md:text-base"><strong id="totalHarga">0.00</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <form action="{{ route('checkout.process') }}" method="POST" class="mt-4 space-y-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Card Kiri -->
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                        <div class="form-group">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" value="{{ $cart->user->profile->email }}" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_now" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat Saat ini</label>
                            <textarea name="alamat_now" id="alamat_now" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required></textarea>
                        </div>

                        <div class="form-group mt-4">
                            <label for="alamat_ktp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat Sesuai KTP</label>
                            <textarea name="alamat_ktp" id="alamat_ktp" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>{{ $cart->user->profile->alamat_ktp }}</textarea>
                        </div>

                        <div class="form-group mt-4">
                            <label for="media_sosial" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Media Sosial</label>
                            <input type="text" name="media_sosial" id="media_sosial" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                        </div>
                    </div>

                    <!-- Card Kanan -->
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                        <div class="form-group">
                            <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="jaminan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jaminan</label>
                            <select id="jaminan" name="jaminan" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                            <option value="" disabled selected>Pilih Jaminan</option>
                            <option value="KTP">KTP</option>
                            <option value="SIM">SIM</option>
                            <option value="KartuPelajar">Kartu Pelajar</option>
                            
            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 dark:bg-indigo-700 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 dark:hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4">Pesan</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tanggalPinjam = document.getElementById('tanggal_pinjam');
            const tanggalKembali = document.getElementById('tanggal_kembali');
            const jumlahHariElement = document.getElementById('jumlahHari');
            const totalHargaElement = document.getElementById('totalHarga');

            const calculateTotal = () => {
                const startDate = new Date(tanggalPinjam.value);
                const endDate = new Date(tanggalKembali.value);
                const oneDay = 24 * 60 * 60 * 1000; // Milliseconds in one day
                const jumlahHari = Math.round((endDate - startDate) / oneDay) + 1;

                if (jumlahHari < 2) {
                    alert('Minimal peminjaman 2 hari atau lebih');
                    return;
                }
                
                let totalHarga = 0;
                
                @foreach ($cart->cartItems as $item)
                totalHarga += {{ $item->quantity }} * {{ $item->price }} * jumlahHari;
                @endforeach
                
                jumlahHariElement.textContent = jumlahHari;
                totalHargaElement.textContent = totalHarga.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            };

            tanggalPinjam.addEventListener('change', calculateTotal);
            tanggalKembali.addEventListener('change', calculateTotal);
        });
    </script>


</x-layout>
