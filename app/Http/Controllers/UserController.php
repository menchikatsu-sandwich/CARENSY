<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; 

class UserController extends Controller
{
    // form edit profile
    public function editProfile()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();
        
        // log untuk path gambar
        if ($profile->foto_profile) {
            Log::info('Profile picture path: ' . Storage::disk('public')->path($profile->foto_profile));
        }

        return view('user.edit-profile', [
            'title' => 'Edit Profile',
            'user' => $user,
            'profile' => $profile
        ]);
    }
    //update profilenya
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'no_telp' => 'required',
            'password' => 'nullable|confirmed|min:8',
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        // Handle foto profile
        if ($request->hasFile('foto_profile')) {
            // Hapus foto lama jika ada
            if ($user->profile && $user->profile->foto_profile) {
                Storage::disk('public')->delete($user->profile->foto_profile);
            }
            $fotoPath = $request->file('foto_profile')->store('profile_pictures', 'public');
        }
        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'foto_profile' => $request->hasFile('foto_profile') ? $fotoPath : ($user->profile?->foto_profile ?? null),
                'gender' => $request->gender,
                'no_telp' => $request->no_telp,
                'alamat_now' => $request->alamat_now,
                'alamat_ktp' => $request->alamat_ktp,
                'media_sosial' => $request->media_sosial,
                'email' => $request->email,
            ]
        );
        // Alert 
        return redirect()->route('edit-profile')->with('success', 'Profile berhasil diperbarui.');
    }
    //logout
    public function logout()
    {
        Auth::logout(); // Hapus sesi user
        return redirect()->route('login')->with('success', 'Anda berhasil keluar.');
    }
}