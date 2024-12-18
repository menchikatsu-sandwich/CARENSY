<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <!-- Logo Section -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button -->
        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 text-white font-bold text-xl">Logo</div>
        <!-- Desktop Menu -->
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>

            <!-- Kamera Menu dropdown -->
            <div class="relative group">
              <button type="button" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><a href="/kamera">Kamera</a></button>
              <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200 ease-in-out z-10">
                <a href="/kamera#canon" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Canon</a>
                <a href="/kamera#nikon" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Nikon</a>
                <a href="/kamera#fujifilm" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">FujiFilm</a>
                <a href="/kamera#sony" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Sony</a>
                <a href="/kamera#dll" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Lainnya</a>
              </div>
            </div>
            <!-- Kategori Menu dropdown -->
            <div class="relative group">
              <button type="button" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><a href="/kategori">Kategori</a></button>
              <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-200 ease-in-out z-10">
                <a href="/kategori#camera" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Kamera</a>
                <a href="/kategori#gimbal" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Gimbal</a>
                <a href="/kategori#tripod" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tripod</a>
                <a href="/kategori#lensa" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Lensa</a>
                <a href="/kategori#dlll" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Lainnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT MENU -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 space-x-4">
        <!-- search -->
        <form action="" method="GET" class="relative hidden lg:block">
          <button type="submit" class="absolute left-2 top-2 text-gray-500">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 10A7 7 0 1 1 3 10a7 7 0 0 1 14 0z" />
            </svg>
          </button>
          <input type="text" name="q" placeholder="Cari..." class="pl-10 pr-4 py-2 w-64 border rounded-md focus:outline-none">
        </form>

        <!-- Cart Icon -->
        <a href="/cart" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="sr-only">View cart</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2m0 0h13.2l.4-2H21M5.4 5L6.9 14.6a2 2 0 0 0 2 1.4h6.2a2 2 0 0 0 2-1.4L18.6 5M16 19a2 2 0 1 1-4 0M9 19a2 2 0 1 1-4 0" />
          </svg>
        </a>

        <!-- Profile Dropdown -->
        <div class="relative ml-3">
          <div>
            <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://via.placeholder.com/150" alt="Profile">
            </button>
          </div>

          <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="user-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign Out</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
      <a href="/" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>

      <!-- Kamera Dropdown for Mobile -->
      <div class="relative">
        <button type="button" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" id="mobile-kamera-menu">
          Kamera
        </button>
        <div class="hidden" id="mobile-kamera-dropdown">
          <a href="/kamera#canon" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Canon</a>
          <a href="/kamera#nikon" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Nikon</a>
          <a href="/kamera#fujifilm" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">FujiFilm</a>
          <a href="/kamera#sony" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Sony</a>
          <a href="/kamera#dll" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Lainnya</a>
        </div>
      </div>

      <!-- Kategori Dropdown for Mobile -->
      <div class="relative">
        <button type="button" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" id="mobile-kategori-menu">
          Kategori
        </button>
        <div class="hidden" id="mobile-kategori-dropdown">
          <a href="/kategori#camera" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Kamera</a>
          <a href="/kategori#gimbal" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Gimbal</a>
          <a href="/kategori#tripod" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Tripod</a>
          <a href="/kategori#lensa" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Lensa</a>
          <a href="/kategori#dlll" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Lainnya</a>
        </div>
      </div>

      <a href="/profile" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Profile</a>
      <a href="/cart" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Cart</a>
      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Sign Out</a>

      <!-- Search Bar for Mobile -->
      <form action="" method="GET" class="relative block lg:hidden px-3 py-2">
        <button type="submit" class="absolute left-5 top-4 text-gray-500">
          <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 10A7 7 0 1 1 3 10a7 7 0 0 1 14 0z" />
          </svg>
        </button>
        <input type="text" name="q" placeholder="Cari..." class="pl-10 pr-4 py-2 w-full border rounded-md focus:outline-none">
      </form>
    </div>
  </div>
</nav>



<!-- JS -->
<script>
  // hover delay dd
  function addHoverDelay(menuSelector) {
    const menu = document.querySelector(menuSelector);
    const dropdown = menu.querySelector('div.absolute');
    let hoverTimeout;

    menu.addEventListener('mouseenter', () => {
      clearTimeout(hoverTimeout);
      dropdown.classList.add('opacity-100', 'visible');
      dropdown.classList.remove('opacity-0', 'invisible');
    });

    menu.addEventListener('mouseleave', () => {
      hoverTimeout = setTimeout(() => {
        dropdown.classList.add('opacity-0', 'invisible');
        dropdown.classList.remove('opacity-100', 'visible');
      }, 100); // delay sensi
    });
  }

  // hover delay apply
  addHoverDelay('.group:nth-of-type(1)'); // Kamera
  addHoverDelay('.group:nth-of-type(2)'); // Kategori

  // mobile dropdown
  const mobileKameraMenu = document.getElementById('mobile-kamera-menu');
  const mobileKameraDropdown = document.getElementById('mobile-kamera-dropdown');

  mobileKameraMenu.addEventListener('click', () => {
    mobileKameraDropdown.classList.toggle('hidden');
  });

  // oprofile dropdown
  const userMenuButton = document.getElementById('user-menu-button');
  const userMenu = document.getElementById('user-menu');

  userMenuButton.addEventListener('click', () => {
    userMenu.classList.toggle('hidden');
  });

  // mobile dropdown Kategori
  const mobileKategoriMenu = document.getElementById('mobile-kategori-menu');
  const mobileKategoriDropdown = document.getElementById('mobile-kategori-dropdown');

  mobileKategoriMenu.addEventListener('click', () => {
    mobileKategoriDropdown.classList.toggle('hidden');
  });

  // close mobile menu
  document.addEventListener('click', (event) => {
    if (!mobileKameraMenu.contains(event.target) && !mobileKameraDropdown.contains(event.target)) {
      mobileKameraDropdown.classList.add('hidden');
    }
    if (!mobileKategoriMenu.contains(event.target) && !mobileKategoriDropdown.contains(event.target)) {
      mobileKategoriDropdown.classList.add('hidden');
    }
  });

  // Mobile menu toggle
  const mobileMenuButton = document.querySelector('button[aria-controls="mobile-menu"]');
  const mobileMenu = document.getElementById('mobile-menu');

  mobileMenuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>
