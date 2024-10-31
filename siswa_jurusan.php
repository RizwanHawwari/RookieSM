<?php
session_start();
if (!isset($_SESSION['session_username']) || $_SESSION['role'] !== 'A') {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
require 'functions.php';

// Mendapatkan jurusan dari URL
$jurusan = $_GET['jurusan'] ?? '';

// Query untuk mendapatkan data siswa berdasarkan jurusan yang sudah memiliki akun
$sql = "SELECT nama, username, kelas, jurusan, role FROM siswa WHERE jurusan = '$jurusan' AND username IS NOT NULL";
$siswa = query($sql); // Menggunakan fungsi query yang sudah ada
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Siswa <?php echo htmlspecialchars($jurusan); ?> | Admin</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="css-file/siswa.css" />
  <style>
  .card-jurusan {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
  }

  .card-jurusan:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
  }

  .card-jurusan .card-icon {
    font-size: 3rem;
    color: #fff;
  }

  .card-jurusan h5 {
    color: #fff;
    font-weight: bold;
  }
  </style>
</head>

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
          <a href="profile.php" class="sidebar-link">
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
              <a href="#" class="sidebar-link">PPLG</a>
              <ul>
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
            <li class="sidebar-item">
              <a href="#" class="sidebar-link">TJKT</a>
              <ul>
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
            <li class="sidebar-item">
              <a href="#" class="sidebar-link">OTKP</a>
              <ul>
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
        <h1>Daftar Siswa Jurusan <?php echo htmlspecialchars($jurusan); ?></h1>
      </div>

      <div class="row mt-4">
        <?php foreach ($siswa as $row): ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card card-jurusan text-white bg-dark text-center">
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
              <p class="card-text">
                <strong>Username:</strong> <?php echo htmlspecialchars($row['username']); ?><br>
                <strong>Kelas:</strong> <?php echo htmlspecialchars($row['kelas']); ?><br>
                <strong>Jurusan:</strong> <?php echo htmlspecialchars($row['jurusan']); ?><br>
                <strong>Role:</strong> <?php echo htmlspecialchars($row['role']); ?><br>
              </p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OCXHDyzz3fW//lAwpG9RscB+nQeIl38zPS2VikTYhZxK1AyKSm8nANn94fjz29uX" crossorigin="anonymous">
  </script>
  <script src="script.js"></script>
</body>

</html>