<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>


        @if(session('error'))
            <div class="bg-red-500 text-white p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($cart && $cart->cartItems->count() > 0)
            <div class="hidden md:block">
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
            </div>

            <!-- Added Mobile View -->
            <div class="md:hidden space-y-4">
                @foreach($cart->cartItems as $item)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                        <div class="flex space-x-4">
                            <img src="{{ asset($item->product->image) }}" 
                                 alt="{{ $item->product->nama_product }}"
                                 class="w-36 h-32 rounded-md">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100">{{ $item->product->nama_product }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $item->product->kode_product }}</p>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                
                                <div class="flex items-center mt-2">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                        <button type="submit" class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md text-gray-900 dark:text-gray-100">-</button>
                                    </form>
                                    
                                    <span class="mx-2 text-gray-900 dark:text-gray-100">{{ $item->quantity }}</span>
                                    
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                        <button type="submit" class="px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md text-gray-900 dark:text-gray-100">+</button>
                                    </form>
                                </div>

                                <div class="mt-2 flex justify-between items-center">
                                    <span class="text-gray-900 dark:text-gray-100">Subtotal: Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 dark:text-red-400">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Mobile Total -->
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                    <div class="text-right font-bold text-gray-900 dark:text-gray-100">
                        Total: Rp {{ number_format($cart->total_amount, 0, ',', '.') }}
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('cart.checkout') }}" class="bg-blue-500 dark:bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-600 dark:hover:bg-blue-800">
                    Lanjut ke Checkout
                </a>

                @if(session('profileIncomplete'))
                    <div class="bg-red-500 text-white p-2 rounded mt-4">
                        {{ session('profileIncomplete') }}
                    </div>
                @endif
            </div>
        @else
        <div class="flex flex-col items-center justify-center h-64">
        <!-- Ikon Keranjang dengan Perubahan Warna -->
        <svg xmlns="http://www.w3.org/2000/svg" 
             class="h-16 w-16 text-gray-800 dark:text-white animate-bounce" 
             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-4 8h18M9 21h6m-6-4h6" />
        </svg>
        <!-- Teks -->
        <p class="text-gray-600 dark:text-gray-400 mt-4 text-lg font-semibold">
            Keranjang Anda kosong.
        </p>
    </div>
        @endif
    </div>
</x-layout>
