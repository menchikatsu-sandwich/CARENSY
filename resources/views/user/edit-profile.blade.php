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
</style>

<!-- Profile Section -->
<div style="margin: 30px auto; width: 50%; background-color: #e0e0e0; padding: 20px; border-radius: 10px; text-align: center;">
    <div style="width: 100px; height: 100px; background-color: #f5f5f5; border-radius: 50%; margin: 0 auto;
    display: flex; justify-content: center; align-items: center; font-size: 40px; color: gray; overflow: hidden;">
        @if($profile->foto_profile && Storage::disk('public')->exists($profile->foto_profile))
            <img src="{{ asset('storage/' . $profile->foto_profile) }}" alt="Profile Picture" 
                 class="profile-pic" style="width: 100%; height: 100%; object-fit: cover;">
        @else
            <img src="" alt="Profile Picture" class="profile-pic" 
                 style="width: 100%; height: 100%; object-fit: cover; display: none;">
            <span class="profile-initial">{{ substr($user->name, 0, 1) }}</span>
        @endif
    </div>
    <div style="margin-top: 10px;">
        <label for="upload-photo" style="cursor: pointer; font-size: 20px;">Ubah Foto</label>
        <input type="file" id="upload-photo" style="display: none;" form="profile-form" name="foto_profile" accept="image/*">
    </div>
    <h3 style="margin-top: 10px; font-size: 20px;">{{ $user->username }}</h3>
</div>

@if(session('success'))
    <div style="margin: 0 auto; width: 50%; background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; text-align: center; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

<!-- Edit Profile Section -->
<div style="margin: 30px auto; width: 50%; background-color: #e0e0e0; padding: 20px; border-radius: 10px; text-align: left;">
    <h2 style="text-align: center; margin-bottom: 20px;">Edit Profile</h2>
    <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data" id="profile-form">
        @csrf
        <!-- FullName -->
        <div style="margin-bottom: 10px;">
            <label for="name">Nama Lengkap</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-input">
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gender -->
        <div style="margin-bottom: 10px;">
            <label for="gender">Jenis Kelamin</label><br>
            <select name="gender" id="gender" class="form-input">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ old('gender', $profile->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('gender', $profile->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- No. Telp -->
        <div style="margin-bottom: 10px;">
            <label for="no_telp">No. Telp</label><br>
            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $profile->no_telp) }}" 
                   class="form-input" placeholder="081234567890">
            @error('no_telp')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div style="margin-bottom: 10px;">
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="{{ old('email', $profile->email) }}" 
                   class="form-input" placeholder="email@example.com">
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div style="margin-bottom: 10px;">
            <label for="password">Password Baru (Opsional)</label><br>
            <input type="password" name="password" id="password" class="form-input" placeholder="Kosongkan jika tidak ingin mengubah">
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div style="margin-bottom: 20px;">
            <label for="password_confirmation">Konfirmasi Password Baru</label><br>
            <input type="password" name="password_confirmation" id="password_confirmation" 
                   class="form-input" placeholder="Konfirmasi password baru">
        </div>

        <!-- Submit Button -->
        <div style="text-align: center;">
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