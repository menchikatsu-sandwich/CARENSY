<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
</head>
<body class="flex flex-col min-h-screen">
  <x-navbar></x-navbar>

  <main class="flex-grow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
  </main>
  
  <x-footer></x-footer>
</body>

@if (session('error'))
    <div id="alert-box" class="alert-error">
        <span class="icon">⚠️</span> {{ session('error') }}
    </div>
@endif

<style>
    #alert-box {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1050;
        background-color: #e74c3c;  /* Warna merah */
        color: #fff;                /* Teks putih */
        padding: 12px 20px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        font-weight: 500;
        max-width: 600px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    #alert-box .icon {
        margin-right: 10px;
        font-size: 18px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alertBox = document.getElementById('alert-box');

        if (alertBox) {
            setTimeout(function () {
                alertBox.style.transition = "opacity 0.5s ease";
                alertBox.style.opacity = '0';
                
                setTimeout(function () {
                    alertBox.remove();
                }, 500);
            }, 4000);  // Muncul selama 4 detik
        }
    });
</script>

</html>
