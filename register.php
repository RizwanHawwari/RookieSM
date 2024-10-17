<?php 
session_start();
include "functions.php";
if (!isset($_SESSION['session_username']) || $_SESSION['role'] !== 'A') {
  header("Location: login.php");
  exit();
}

// Proses pendaftaran
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $kelas = $_POST['kelas'];
  $jurusan = $_POST['jurusan'];
  $role = 'S';
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Cek apakah username sudah ada
  $checkUsername = "SELECT * FROM siswa WHERE username='$username'";
  $result = $conn->query($checkUsername);

  if ($result->num_rows > 0) {
    echo "<script>alert('Username sudah terdaftar! Silakan pilih username lain.');</script>";
  } else {
    $sql = "INSERT INTO siswa (nama, username, kelas, jurusan, role, password) VALUES ('$nama', '$username', '$kelas', '$jurusan', '$role', '$password')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Pendaftaran berhasil!');</script>";
    } else {
      echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Siswa | Admin</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="css-file/siswa.css" />
</head>

<style>
.form-container {
  width: 80%;
  margin: auto;
  margin-top: 50px;
  background-color: #333;
  padding: 20px 40px;
  border-radius: 8px;
  box-shadow: 3px 5px 9px 2px rgba(0, 0, 0, 0.8);
  color: #fff;
}

.form-group label {
  color: #fff;
}

.form-control {
  background-color: #444;
  color: #fff;
  border: 1px solid #555;
}

.form-control::placeholder {
  color: #bbb;
}

.form-text {
  color: #fff;
}

.form-control:focus {
  color: #fff;
  background-color: #444;
  border-color: #007bff;
  outline: none;
}

.btn-primary {
  background-color: #00bd82;
  border-color: #00bd82;
}

.btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

@media screen and (max-width: 728px) {
  .form-container {
    width: 100%;
  }
}
</style>

<body>
  <div class="wrapper">
    <aside id="sidebar">
      <div class="d-flex">
        <button class="toggle-btn" type="button">
          <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
          <a href="#">Free Course CN</a>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-user"></i>
            <span>Profile</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="statistic.php" class="sidebar-link" id="daftar-siswa">
            <i class="lni lni-bar-chart"></i>
            <span>Statistic</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="daftarsiswa.php" class="sidebar-link" id="daftar-siswa">
            <i class="lni lni-list"></i>
            <span>Daftar Siswa</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="register.php" class="sidebar-link" id="daftar-siswa">
            <i class="lni lni-pencil"></i>
            <span>Register Siswa</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi"
            aria-expanded="false" aria-controls="multi">
            <i class="lni lni-layout"></i>
            <span>Courses</span>
          </a>
          <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two"
                aria-expanded="false" aria-controls="multi-two">
                PPLG
              </a>
              <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">HTML & CSS</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">JavaScript</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">PHP</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">MySQL</a>
                </li>
              </ul>
            </li>

            <!-- TJKT -->
            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-three"
                aria-expanded="false" aria-controls="multi-three">
                TJKT
              </a>
              <ul id="multi-three" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Arduino</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Jaringan Komputer</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Server Administrator</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Made & Repair Computer</a>
                </li>
              </ul>
            </li>

            <!-- OTKP -->
            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-four"
                aria-expanded="false" aria-controls="multi-four">
                OTKP
              </a>
              <ul id="multi-four" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Akutansi</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Administrasi</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Ekonomi dan Bisnis</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Kearsipan</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-cog"></i>
            <span>Setting</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="logout.php" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </aside>

    <div class="main p-3">
      <div class="text-center">
        <h1>Register Siswa</h1>
      </div>

      <div class="form-container">
        <form action="" method="POST" autocomplete="off">
          <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
            <small class="form-text">Nama lengkap siswa.</small>
          </div>
          <div class="form-group mb-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username"
              required>
            <small class="form-text">Masukan username yang unik.</small>
          </div>
          <div class="form-group mb-3">
            <label for="kelas">Kelas</label>
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas" required>
            <small class="form-text">Contoh: 10, 11, 12.</small>
          </div>
          <div class="form-group mb-3">
            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan jurusan" required>
            <small class="form-tex">Masukkan jurusan siswa.</small>
          </div>
          <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"
              minlength="6" required>
            <small class="form-text">Password harus terdiri dari minimal 6 karakter.</small>
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>

    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>