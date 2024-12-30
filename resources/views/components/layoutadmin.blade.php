<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    
        <!-- Tailwind -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
        
        <style>
            /* Mengimpor font Poppins */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
    
            /* Mengganti font-family menjadi Poppins */
            .font-family-popins { font-family: 'Poppins', sans-serif; }
    
            /* Warna dan gaya */
            .bg-sidebar { background: #D9D9D9; }
            .cta-btn { color: #D9D9D9; }
            /* .upgrade-btn { background: #1947ee; }
            .upgrade-btn:hover { background: #0038fd; } */
            .active-nav-link { background: #C3C3C3; }
            /* .nav-item:hover { background: #C3C3C3; } */
            .account-link:hover { background: #C3C3C3; }
        </style>
    </head>
    
<body class="bg-gray-100 font-family-popins flex">

    <x-nav-bar-admin></x-nav-bar-admin>
    <div>
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div>
                <h1 class="text-3xl text-black pb-6 text-center"><strong>{{ $title }}</strong></h1>
                </div>
                <div class="ml-4">{{ $slot }}</div>
                
            </main>
    
            
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>