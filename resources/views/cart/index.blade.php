<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Keranjang Anda</h2>

        @if(session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($cart && $cart->cartItems->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 table-auto">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="py-2 px-4 border-b text-left text-gray-900 dark:text-gray-100">Gambar</th>
                            <th class="py-2 px-4 border-b text-left text-gray-900 dark:text-gray-100">Kode Produk</th>
                            <th class="py-2 px-4 border-b text-left text-gray-900 dark:text-gray-100">Nama Produk</th>
                            <th class="py-2 px-4 border-b text-left text-gray-900 dark:text-gray-100">Harga Sewa</th>
                            <th class="py-2 px-4 border-b text-left text-gray-900 dark:text-gray-100">Jumlah</th>
                            <th class="py-2 px-4 border-b text-left text-gray-900 dark:text-gray-100">Subtotal</th>
                            <th class="py-2 px-4 border-b text-left text-gray-900 dark:text-gray-100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart->cartItems as $item)
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    <img src="{{ asset($item->product->image) }}" 
                                         alt="{{ $item->product->nama_product }}"
                                         class="w-24 h-auto rounded-md">
                                </td>
                                <td class="py-2 px-4 border-b text-gray-900 dark:text-gray-100">{{ $item->product->kode_product }}</td>
                                <td class="py-2 px-4 border-b text-gray-900 dark:text-gray-100">{{ $item->product->nama_product }}</td>
                                <td class="py-2 px-4 border-b text-gray-900 dark:text-gray-100">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="py-2 px-4 border-b">
                                    <div class="flex items-center justify-start space-x-2">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                            <button type="submit" class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md text-gray-900 dark:text-gray-100">-</button>
                                        </form>
                                        <span class="mx-2 text-gray-900 dark:text-gray-100">{{ $item->quantity }}</span>
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                            <button type="submit" class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md text-gray-900 dark:text-gray-100">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b text-gray-900 dark:text-gray-100">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                                <td class="py-2 px-4 border-b">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 dark:text-red-400">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <td colspan="6" class="py-2 px-4 text-right font-bold text-gray-900 dark:text-gray-100">Total:</td>
                            <td class="py-2 px-4 font-bold text-gray-900 dark:text-gray-100">Rp {{ number_format($cart->total_amount, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-4">
                <a href="{{ route('cart.checkout') }}" class="bg-blue-500 dark:bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600 dark:hover:bg-blue-800">
                    Lanjut ke Checkout
                </a>
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-400">Keranjang Anda kosong.</p>
        @endif
    </div>
</x-layout>
