<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <style>
        .save-btn {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .save-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .form-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 50px;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        /* Profile image styles */
        .profile-pic {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-initial {
            font-size: 40px;
            color: gray;
        }

    </style>

    <!-- Profile Section -->
    <div class="max-w-md mx-auto my-8 p-6 bg-gray-200 dark:bg-gray-800 rounded-lg text-center">
        <div class="w-24 h-24 bg-gray-300 dark:bg-gray-700 rounded-full mx-auto flex justify-center items-center text-3xl text-gray-600 dark:text-gray-300 overflow-hidden">
            @if($profile->foto_profile && Storage::disk('public')->exists($profile->foto_profile))
                <img src="{{ asset('storage/' . $profile->foto_profile) }}" alt="Profile Picture" 
                     class="profile-pic">
            @else
                <span class="profile-initial">{{ substr($user->name, 0, 1) }}</span>
            @endif
        </div>
        <div class="mt-4">
            <label for="upload-photo" class="cursor-pointer text-xl text-gray-700 dark:text-gray-300">Ubah Foto</label>
            <input type="file" id="upload-photo" class="hidden" form="profile-form" name="foto_profile" accept="image/*">
        </div>
        <h3 class="mt-2 text-xl text-gray-900 dark:text-gray-100">{{ $user->username }}</h3>
    </div>

    @if(session('success'))
        <div class="max-w-md mx-auto mb-4 bg-green-500 text-white p-3 rounded-md text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Edit Profile Section -->
    <div class="max-w-lg mx-auto my-8 p-6 bg-gray-200 dark:bg-gray-800 rounded-lg text-left">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-900 dark:text-gray-100">Edit Profile</h2>
        <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data" id="profile-form">
            @csrf

            <!-- FullName -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-input bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gender -->
            <div class="mb-4">
                <label for="gender" class="block text-gray-700 dark:text-gray-300">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-input bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('gender', $profile->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('gender', $profile->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- No. Telp -->
            <div class="mb-4">
                <label for="no_telp" class="block text-gray-700 dark:text-gray-300">No. Telp</label>
                <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $profile->no_telp) }}" class="form-input bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="081234567890">
                @error('no_telp')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $profile->email) }}" class="form-input bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="email@example.com">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 dark:text-gray-300">Password Baru (Opsional)</label>
                <input type="password" name="password" id="password" class="form-input bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="Kosongkan jika tidak ingin mengubah">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="Konfirmasi password baru">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="save-btn">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <script>
        // Preview foto profile saat dipilih
        document.getElementById('upload-photo').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                const profilePic = document.querySelector('.profile-pic');
                const profileInitial = document.querySelector('.profile-initial');

                reader.onload = function(e) {
                    if (profilePic) {
                        profilePic.src = e.target.result;
                        profilePic.style.display = 'block';
                        // Sembunyikan inisial jika ada
                        if (profileInitial) {
                            profileInitial.style.display = 'none';
                        }
                    }
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>

</x-layout>
