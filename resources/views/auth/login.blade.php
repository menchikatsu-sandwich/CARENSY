<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

  <div class="w-full max-w-md px-6 py-8 bg-white rounded-lg shadow-md">
    <h1 class="mb-6 text-2xl font-bold text-center"><img src="img/CARENSY.png" alt="LOGO CARENSY" style="width: 60%; height: auto; margin: 0 auto;"></h1>
    <h1 class="mb-6 text-2xl font-bold text-center">Login</h1>

    <!-- Pesan error jika ada -->
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-4 mb-4 rounded-lg">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    
    <form action="{{url('/login')}}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="username" class="block mb-2 font-medium">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
          placeholder="Masukkan username">
      </div>
      <div class="mb-6">
        <label for="password" class="block mb-2 font-medium">Password</label>
        <input 
          type="password" 
          id="password" 
          name="password" 
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
          placeholder="Masukkan password">
      </div>
      <p class="mb-4 text-sm text-center">Belum punya akun? <a href="/register" class="text-blue-500 hover:underline">Daftar di sini</a></p>
      <button 
        type="submit" 
        class="w-full py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none">
        Login
      </button>
    </form>
  </div>

</body>
</html>
