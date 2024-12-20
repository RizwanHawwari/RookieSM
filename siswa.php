<?php 
require "functions.php";


if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $course = cari($keyword);
} else {
    $course = query("SELECT 
                    mp.id,
                    mp.nama_pelajaran,
                    pplg.nama_pelajaran_pplg, 
                    pplg.gambar AS gambar_pplg, 
                    pplg.link_pelajaran AS link_pelajaran_pplg,
                    tjkt.nama_pelajaran_tjkt, 
                    tjkt.gambar AS gambar_tjkt, 
                    tjkt.link_pelajaran AS link_pelajaran_tjkt,
                    otkp.nama_pelajaran_otkp, 
                    otkp.gambar AS gambar_otkp, 
                    otkp.link_pelajaran AS link_pelajaran_otkp
                 FROM 
                    mata_pelajaran AS mp
                 LEFT JOIN 
                    mp_pplg AS pplg ON mp.id = pplg.mata_pelajaran_id
                 LEFT JOIN 
                    mp_tjkt AS tjkt ON mp.id = tjkt.mata_pelajaran_id
                 LEFT JOIN 
                    mp_otkp AS otkp ON mp.id = otkp.mata_pelajaran_id");
}


// Uncomment the following code to enforce session checks
// if (!isset($_SESSION['session_nis'])) {
//     // Redirect to login if not logged in
//     header("Location: login.php");
//     exit();
// }
// 
// if (isset($_SESSION['session_role']) && $_SESSION['session_role'] == 'siswa') {
//     echo "Selamat datang, Siswa!";
// } else {
//     header("location: admin.php");
// }
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
    <link rel="stylesheet" href="css-file/ss.css" />
    <style>
        .card {
            margin: 0 auto; /* Center the card */
        }

        .product-box {
            margin-bottom: 15px; /* Add space between products */
            height: 50%;
            padding-top: 10px;
            margin: 10%;
        }

        /* Style for the search bar */
        .search-bar {
            margin-bottom: 20px; /* Space below the search bar */
            width: 300px; /* Set a fixed width for the search bar */
        }

        /* Center the header */
        .header-container {
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            margin-bottom: 20px; /* Space below the header */
        }

        /* Position search bar on the right */
        .header-container .search-bar {
            margin-left: auto; /* Push search bar to the right */
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
                    <a href="profileSiswa.php" class="sidebar-link">
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
                            <a href="#pplg" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two"
                                aria-expanded="false" aria-controls="multi-two">PPLG</a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#html" class="sidebar-link">HTML & CSS</a>
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
                                    <a href="#arduino" class="sidebar-link">Arduino</a>
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
            <div class="header-container"> <!-- Flex container for header -->
                <h1>Dashboard Siswa</h1>
                <div class="search-bar"> <!-- Search bar container -->
                  <form action="" method="post">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" name="keyword" autofocus autocomplete="off"/>
                    <button type="submit" name="cari">Cari!</button>
                  </form>
                </div>
            </div>

            <!-- Dummy Cart Section -->
                <!-- <div class="pplg"><h1>PPLG</h1></div>   -->
            <div class="container mt-5">
    <div class="row justify-content-center">
    <div class="row">
    <!-- Tampilkan Judul dan Card untuk PPLG -->
    <div class="col-12 text-center my-4">
        <h1>PPLG</h1>
    </div>
    <?php
    foreach ($course as $mataPelajaran) {
        if (!empty($mataPelajaran['nama_pelajaran_pplg'])) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"><?= $mataPelajaran['nama_pelajaran_pplg']; ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="<?= $mataPelajaran['gambar_pplg']; ?>" alt="<?= $mataPelajaran['nama_pelajaran_pplg']; ?>" class="product-img">
                        <h3 class="product-title"><?= $mataPelajaran['nama_pelajaran_pplg']; ?></h3> 
                        <p class="product-price">FREE</p>
                        <div class="path">
                            <a href="<?= $mataPelajaran['link_pelajaran_pplg']; ?>" class="btn btn-primary">Learn</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>

    <!-- Tampilkan Judul dan Card untuk TJKT -->
    <div class="col-12 text-center my-4">
        <h1>TJKT</h1>
    </div>
    <?php
    foreach ($course as $mataPelajaran) {
        if (!empty($mataPelajaran['nama_pelajaran_tjkt'])) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"><?= $mataPelajaran['nama_pelajaran_tjkt']; ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <img src="<?= $mataPelajaran['gambar_tjkt']; ?>" alt="<?= $mataPelajaran['nama_pelajaran_tjkt']; ?>" class="product-img">
                        <h3 class="product-title"><?= $mataPelajaran['nama_pelajaran_tjkt']; ?></h3> 
                        <p class="product-price">FREE</p>
                        <div class="path">
                            <a href="<?= $mataPelajaran['link_pelajaran_tjkt']; ?>" class="btn btn-primary">Learn</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>

    <!-- Tampilkan Judul dan Card untuk OTKP -->
    <div class="col-12 text-center my-4">
        <h1>OTKP</h1>
    </div>
    <?php
    foreach ($course as $mataPelajaran) {
        if (!empty($mataPelajaran['nama_pelajaran_otkp'])) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center"><?= $mataPelajaran['nama_pelajaran_otkp']; ?></h3>
                    </div>
                    <div class="card-body text-center">
                    <div class="product-box section">
                    <img src="<?= $mataPelajaran['gambar_otkp']; ?>"
                     alt="<?= $mataPelajaran['nama_pelajaran_otkp']; ?>"
                     class="product-img" style="width: 100%; height: auto; max-height: 200px; object-fit: contain;">
                        <h3 class="product-title"><?= $mataPelajaran['nama_pelajaran_otkp']; ?></h3> 
                        <p class="product-price">FREE</p>
                        <div class="path">
                            <a href="<?= $mataPelajaran['link_pelajaran_otkp']; ?>" class="btn btn-primary">Learn</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>



         
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
