<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/dashboard_admin" class="text-black text-3xl font-semibold uppercase ">Dashboard</a>
    </div>
    <nav class=" text-white text-base font-semibold pt-3">
        <x-nav-link-admin href='/dashboard_admin' :active="request()->is('dashboard_admin')">List Produk</x-nav-link-admin>
            <x-nav-link-admin href="/form_input" :active="request()->is('form_input')">Form Input</x-nav-link-admin>
            <x-nav-link-admin href='/pemesanan' :active="request()->is('pemesanan')">pemesanan</x-nav-link-admin>
            <x-nav-link-admin href='/history' :active="request()->is('history')">History</x-nav-link-admin>
        
       
    </nav>
</aside>

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    

    <!-- Mobile Header & Nav -->
    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
        <div class="flex items-center justify-between">
            <a href="index.html" class="text-black text-3xl font-semibold uppercase ">Dashboard</a>
            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                <i x-show="!isOpen" class="fas fa-bars" style="color: #000000;"></i>
                
                <i x-show="isOpen" class="fas fa-times" style="color: #000000;"></i>
            </button>
        </div>

        <!-- Dropdown Nav -->
        <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
            <x-nav-link-admin href='/dashboard_admin' :active="request()->is('dashboard_admin')">List Produk</x-nav-link-admin>
            <x-nav-link-admin href="/form_input" :active="request()->is('form_input')">Form Input</x-nav-link-admin>
            <x-nav-link-admin href='/pemesanan' :active="request()->is('pemesanan')">pemesanan</x-nav-link-admin>
            <x-nav-link-admin href='/history' :active="request()->is('history')">History</x-nav-link-admin>
            
        </nav>
        <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus mr-3"></i> New Report
        </button> -->
    </header>