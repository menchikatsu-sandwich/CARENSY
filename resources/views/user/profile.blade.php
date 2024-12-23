<x-layout>
<x-slot:title>{{$title}}</x-slot:title>
<style>
        /* Efek hover untuk button */
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
            transform: scale(1.05); /* Efek pop-up */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        }
    </style>
<!-- Profile Section -->
<div style="margin: 30px auto; width: 50%; background-color: #e0e0e0; padding: 20px; border-radius: 10px; text-align: center;">
    <div style="width: 100px; height: 100px; background-color: #f5f5f5; border-radius: 50%; margin: 0 auto;
    display: flex; justify-content: center; align-items: center; font-size: 40px; color: gray;">
        
    </div>
    <div style="margin-top: 10px;">
        <label for="upload-photo" style="cursor: pointer; font-size: 20px;">oijerojg</label>
        <input type="file" id="upload-photo" style="display: none;">
    </div>
    <h3 style="margin-top: 10px; font-size: 20px;">USERNAME</h3>
</div>

<!-- Edit Profile Section -->
<div style="margin: 30px auto; width: 50%; background-color: #e0e0e0; padding: 20px; border-radius: 10px; text-align: left;">
    <h2 style="text-align: center; margin-bottom: 20px;">Edit Profile</h2>
    <form action="edit_profile.php" method="POST">
        <!-- FullName -->
        <div style="margin-bottom: 10px;">
            <label for="fullname">FullName</label><br>
            <input type="text" name="fullname" id="fullname" placeholder="FullName"
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 50px;">
        </div>
        <!-- Gender -->
        <div style="margin-bottom: 10px;">
            <label for="gender">Gender</label><br>
            <input type="text" name="gender" id="gender" placeholder="Gender"
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 50px;">
        </div>
        <!-- No. Telp -->
        <div style="margin-bottom: 10px;">
            <label for="phone">No. Telp</label><br>
            <input type="text" name="phone" id="phone" placeholder="081234567890"
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 50px;">
        </div>
        <!-- Password -->
        <div style="margin-bottom: 10px;">
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Password"
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 50px;">
        </div>
        <!-- Konfirmasi Password -->
        <div style="margin-bottom: 10px;">
            <label for="confirm_password">Konfirmasi Password</label><br>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Konfirmasi" 
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 50px;">
        </div>
        <!-- Submit Button -->
        <div style="text-align: center;">
            <button type="submit" class="save-btn">Save</button>
        </div>
    </form>
</div>


</x-layout>