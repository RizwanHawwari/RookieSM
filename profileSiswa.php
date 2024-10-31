<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-file/sisway.css">
    <title>Profile Siswa</title>
    <script>    
    function updateProfilePic(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.profile-pic').src = e.target.result;
                localStorage.setItem('profilePic', e.target.result); // Simpan ke localStorage
            };
            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function loadProfilePic() {
            const savedPic = localStorage.getItem('profilePic');
            if (savedPic) {
                document.querySelector('.profile-pic').src = savedPic; // Muat dari localStorage
            }
        }

        window.onload = loadProfilePic; // Panggil saat halaman dimuat
    </script>
</head>
<body>
    <div class="container">
    <h2 class="main-title">Ini Dia Profile Kamu!</h2>
    <hr class="title-underline">
        <div class="profile-container">
            <div class="profile-header">
                <img src="img/dumy.jpg" alt="Foto Admin" class="profile-pic">
                <h1 class="profile-name">Nama: Dummy</h1>
            </div>
            <div class="profile-info">
                <h2>Informasi</h2>
                <p><strong>NIS:</strong> 123456789</p>
                <p><strong>Kelas:</strong> 11</p>
                <p><strong>Jurusan:</strong> PPLG 2</p>
            </div>
            <div class="profile-footer">
                <button class="button" onclick="document.getElementById('editProfileModal').style.display='block'">Edit Profil</button>
            </div>
        </div>

        <!-- Modal untuk Edit Profil -->
        <div id="editProfileModal" class="modal">
            <div class="modal-content">
                <span onclick="document.getElementById('editProfileModal').style.display='none'" class="close">&times;</span>
                <h2>Edit Profil</h2>
                <label for="profilePic">Pilih Foto Baru:</label>
                <input type="file" id="profilePic" accept="image/*" onchange="updateProfilePic(event)">
                <div style="margin-top: 15px;">
                    <button class="button" onclick="document.getElementById('editProfileModal').style.display='none'">Simpan</button>
                </div>
            </div>
        </div>

        <div class="back-button-container">
            <a href="siswa.php" class="button back-button">Kembali</a>
        </div>
    </div>
</body>
</html>
