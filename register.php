<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "login");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Inisialisasi variabel untuk pesan error dan success
$err = '';
$success = '';

if (isset($_POST['register'])) {
    // Ambil data dari form
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash password

    // Jika role siswa, ambil NIS dan Nama
    if ($role == 'S') {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];

        // Validasi input
        if (empty($username) || empty($password) || empty($nis) || empty($nama)) {
            $err = "Semua field harus diisi untuk siswa.";
        } else {
            // Insert ke tabel siswa
            $sql = "INSERT INTO siswa (Nama, Username, NIS, Password, role) 
                    VALUES ('$nama', '$username', '$nis', '$hashed_password', 'S')";

            if (mysqli_query($koneksi, $sql)) {
                $success = "Akun siswa berhasil dibuat!";
            } else {
                $err = "Error: " . mysqli_error($koneksi);
            }
        }
    }

    // Jika role admin, cukup ambil username dan password
    elseif ($role == 'A') {
        // Validasi input
        if (empty($username) || empty($password)) {
            $err = "Username dan password harus diisi untuk admin.";
        } else {
            // Insert ke tabel admin
            $sql = "INSERT INTO admin (Username, Password, role) 
                    VALUES ('$username', '$hashed_password', 'A')";

            if (mysqli_query($koneksi, $sql)) {
                $success = "Akun admin berhasil dibuat!";
            } else {
                $err = "Error: " . mysqli_error($koneksi);
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Admin dan Siswa</title>
</head>

<body>
  <h1>Form Registrasi</h1>

  <!-- Tampilkan pesan sukses atau error -->
  <?php if ($err): ?>
  <p style="color: red;"><?php echo $err; ?></p>
  <?php endif; ?>
  <?php if ($success): ?>
  <p style="color: green;"><?php echo $success; ?></p>
  <?php endif; ?>

  <form action="" method="POST">
    <label for="role">Daftar sebagai:</label>
    <select name="role" id="role" required>
      <option value="A">Admin</option>
      <option value="S">Siswa</option>
    </select>
    <br><br>

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br><br>

    <!-- Field tambahan untuk siswa -->
    <div id="siswa-fields" style="display: none;">
      <label for="nama">Nama:</label>
      <input type="text" name="nama" id="nama">
      <br><br>

      <label for="nis">NIS:</label>
      <input type="text" name="nis" id="nis">
      <br><br>
    </div>

    <button type="submit" name="register">Register</button>
  </form>

  <script>
  // Tampilkan atau sembunyikan field khusus siswa berdasarkan pilihan role
  document.getElementById('role').addEventListener('change', function() {
    var siswaFields = document.getElementById('siswa-fields');
    if (this.value == 'S') {
      siswaFields.style.display = 'block';
    } else {
      siswaFields.style.display = 'none';
    }
  });
  </script>
</body>

</html>