<?php 
require "functions.php";
session_start();

if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $course = cari($keyword);
} else {
    $course = query("SELECT * FROM mata_pelajaran");
}

if (!isset($_SESSION['session_username'])) {
    // Redirect to login if not logged in
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['role']) && $_SESSION['role'] == 'S') {
    echo "Selamat datang, Siswa!";
} else {
    header("location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Siswa</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="css-file/siswa.css" />
  <style>
  .card {
    margin: 0 auto;
    /* Center the card */
  }

  .product-box {
    margin-bottom: 15px;
    /* Add space between products */
    height: 50%;
  }

  /* Style for the search bar */
  .search-bar {
    margin-bottom: 20px;
    /* Space below the search bar */
    width: 300px;
    /* Set a fixed width for the search bar */
  }

  /* Center the header */
  .header-container {
    display: flex;
    justify-content: center;
    /* Center content horizontally */
    align-items: center;
    /* Center content vertically */
    margin-bottom: 20px;
    /* Space below the header */
  }

  /* Position search bar on the right */
  .header-container .search-bar {
    margin-left: auto;
    /* Push search bar to the right */
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
          <a href="#" class="sidebar-link">
            <i class="lni lni-user"></i>
            <span>Profile</span>
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
                aria-expanded="false" aria-controls="multi-two">PPLG</a>
              <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="" class="sidebar-link">HTML & CSS</a>
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
                aria-expanded="false" aria-controls="multi-three">TJKT</a>
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
                aria-expanded="false" aria-controls="multi-four">OTKP</a>
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
      <div class="header-container">
        <!-- Flex container for header -->
        <h1>Dashboard Siswa</h1>
        <div class="search-bar">
          <!-- Search bar container -->
          <form action="" method="post">
            <input type="text" class="form-control" placeholder="Search..." aria-label="Search" name="keyword" autofocus
              autocomplete="off" />
            <button type="submit" name="cari">Cari!</button>
          </form>
        </div>
      </div>

      <!-- Dummy Cart Section -->
      <div class="container mt-5">
        <div class="row justify-content-center">

          <?php
        if (!empty($course)) {
            foreach($course as $mataPelajaran) {
                ?>

          <div class="col-md-4">
            <!-- Adjusted column size -->
            <div class="card">
              <div class="card-header">
                <h3 class="text-center"><?= ($mataPelajaran['nama_pelajaran']); ?></h3>
              </div>
              <div class="card-body text-center">
                <div class="product-box section">
                  <img src="<?= ($mataPelajaran['gambar']); ?>" alt="<?= ($mataPelajaran['nama_pelajaran']); ?>"
                    class="product-img" style="width: 100%; height: auto; max-height: 200px; object-fit: contain;">
                  <h3 class="product-title"><?= ($mataPelajaran['nama_pelajaran']); ?></h3>
                  <p class="product-price">FREE</p>
                  <div class="path">
                    <a href="<?= ($mataPelajaran['link_pelajaran']); ?>" class="btn btn-primary">Learn</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php
            }
        } else {
            echo "<p>Data tidak ditemukan.</p>";
        }
        ?>
          <!-- END FOR Dummy Cart Section -->
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="script.js"></script>
</body>

</html>