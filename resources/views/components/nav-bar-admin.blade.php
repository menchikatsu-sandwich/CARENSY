<aside class="relative text-white bg-gray-800 h-screen w-64 hidden sm:flex flex-col shadow-xl">
    <div class="p-6">
        <a href="/dashboard_admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Dashboard</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3 flex-grow space-y-2">
        <x-nav-link-admin href='/dashboard_admin' :active="request()->is('dashboard_admin')" 
            class="px-4 py-2 block rounded {{ request()->is('dashboard_admin') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            List Produk
        </x-nav-link-admin>
        <x-nav-link-admin href="/form_input" :active="request()->is('form_input')" 
            class="px-4 py-2 block rounded {{ request()->is('form_input') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            Form Input
        </x-nav-link-admin>
        <x-nav-link-admin href='/pemesanan' :active="request()->is('pemesanan')" 
            class="px-4 py-2 block rounded {{ request()->is('pemesanan') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            Pemesanan
        </x-nav-link-admin>
        <x-nav-link-admin href='/history' :active="request()->is('history')" 
            class="px-4 py-2 block rounded {{ request()->is('history') ? 'bg-gray-700' : 'hover:bg-gray-700' }}">
            History
        </x-nav-link-admin>
    </nav>
    <div class="mt-auto border-t border-gray-700">
        <form action="{{ route('logout') }}" method="POST" class="p-4">
            @csrf
            <button type="submit" class="flex items-center px-4 py-3 text-white hover:bg-gray-700 transition-colors duration-200 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Sign Out
            </button>
        </form>
    </div>
</aside>

<div class="w-full flex flex-col h-screen overflow-hidden">
    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-gray-800 py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="/dashboard_admin" class="text-white text-3xl font-semibold uppercase">Dashboard</a>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars"></i>
                <i x-show="isOpen" class="fas fa-times"></i>
            </button>
        </div>
        <nav :class="isOpen ? 'block' : 'hidden'" class="flex flex-col pt-4 space-y-2">
            <x-nav-link-admin href='/dashboard_admin' :active="request()->is('dashboard_admin')" 
                class="px-4 py-2 block rounded text-white hover:bg-gray-700">List Produk</x-nav-link-admin>
            <x-nav-link-admin href="/form_input" :active="request()->is('form_input')" 
                class="px-4 py-2 block rounded text-white hover:bg-gray-700">Form Input</x-nav-link-admin>
            <x-nav-link-admin href='/pemesanan' :active="request()->is('pemesanan')" 
                class="px-4 py-2 block rounded text-white hover:bg-gray-700">Pemesanan</x-nav-link-admin>
            <x-nav-link-admin href='/history' :active="request()->is('history')" 
                class="px-4 py-2 block rounded text-white hover:bg-gray-700">History</x-nav-link-admin>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="flex items-center px-4 py-2 text-white hover:bg-gray-700 transition-colors duration-200 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Sign Out
                </button>
            </form>
        </nav>
    </header>