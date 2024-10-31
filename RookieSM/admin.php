<?php 
session_start();
if (!isset($_SESSION['session_username']) || $_SESSION['role'] !== 'A') {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Admin</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <!-- CSS -->
  <link rel="stylesheet" href="css-file/siswa.css" />
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
        <h1>Dashboard Admin</h1>
      </div>
    </div>
  </div>

  </div>
  <script src="script.js"></script>
</body>

</html>