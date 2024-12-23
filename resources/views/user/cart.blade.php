<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

<div class="font-sans w-full bg-white min-h-screen flex flex-col">
    <h1 class="mb-6 text-2xl font-bold text-center"><img src="img/CARENSY.png" alt="LOGO CARENSY" style="width: 15%; height: auto; margin: 0 auto;"></h1>
    <!-- Konten Utama -->
    <div class="flex-1 py-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full">
            <div class="md:col-span-2 bg-gray-100 p-4 rounded-md w-full">
                <h2 class="text-2xl font-bold text-gray-800">Cart</h2>
                <hr class="border-gray-300 mt-4 mb-8" />
                <div class="space-y-4">
                    @foreach($cart as $item)
                    <div class="grid grid-cols-3 items-center gap-4">
                        <div class="col-span-2 flex items-center gap-4">
                            <div class="w-24 h-24 shrink-0 bg-white p-2 rounded-md">
                                <img src="{{ asset('img/' . $item->image) }}" class="w-full h-full object-contain" />
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-gray-800">{{ $item->name }}</h3>
                                <h6 class="text-xs text-red-500 cursor-pointer mt-0.5">Remove</h6>
                                <!-- Ukuran dan Kuantitas -->
                                <div class="flex gap-4 mt-4">
                                    <div>
                                        <button type="button" class="flex items-center px-2.5 py-1.5 border border-gray-300 text-gray-800 text-xs outline-none bg-transparent rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current" viewBox="0 0 124 124">
                                                <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"></path>
                                            </svg>
                                            <span class="mx-2.5">{{ $item->quantity }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current" viewBox="0 0 42 42">
                                                <path d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <h4 class="text-base font-bold text-gray-800">${{ $item->price }}</h4>
                        </div>
                    </div>
                    @endforeach
                    <!-- Tambahan item lainnya -->
                </div>
            </div>

            <!-- Summary -->
            <div class="bg-gray-100 rounded-md p-4 md:sticky top-0 w-full">
                <div class="flex border border-blue-600 overflow-hidden rounded-md">
                    <input type="email" placeholder="Promo code" class="w-full outline-none bg-white text-gray-600 text-sm px-4 py-2.5" />
                    <button type='button' class="flex items-center justify-center font-semibold tracking-wide bg-blue-600 hover:bg-blue-700 px-4 text-sm text-white">
                        Apply
                    </button>
                </div>
                <ul class="text-gray-800 mt-8 space-y-4">
                    <li class="flex flex-wrap gap-4 text-base">Discount <span class="ml-auto font-bold">$0.00</span></li>
                    <li class="flex flex-wrap gap-4 text-base">Shipping <span class="ml-auto font-bold">$2.00</span></li>
                    <li class="flex flex-wrap gap-4 text-base">Tax <span class="ml-auto font-bold">$4.00</span></li>
                    <li class="flex flex-wrap gap-4 text-base font-bold">Total <span class="ml-auto">${{ $total }}</span></li>
                </ul>
                <div class="mt-8 space-y-2">
                    <button type="button" class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-blue-600 hover:bg-blue-700 text-white rounded-md">Checkout</button>
                    <button type="button" class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-transparent text-gray-800 border border-gray-300 rounded-md">Continue Shopping</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto py-4 bg-gray-200 text-center text-sm text-gray-600">
        &copy; 2024 Your Company. All rights reserved.
    </footer>
</div>
</x-layout>
