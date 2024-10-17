<?php 
session_start();
// if (!isset($_SESSION['session_nis'])) {
//   // Jika belum login, arahkan ke halaman login
//   header("Location: login.php");
//   exit();

//   if (isset($_SESSION['session_role']) && $_SESSION['session_role'] == 'siswa') {
//     echo "Selamat datang, Siswa!";
// } else {
//   header("location: admin.php");
// }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css-file/test.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <title>Free Course | CN</title>
</head>

<body>
  <header class="header">
    <div class="logo-container">
      <img src="hero-img/cookie.svg" alt="Rookies Evolution" class="rookies">
      <a href="https://smkscitranegara.sch.id" class="logo">Free Course SMK Citra Negara</a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#team">Our Team</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section class="hero-section">
    <div class="hero-text">
      <h1>Choose Your Path and Start Learning Today</h1>
      <p>Empowering students through innovation and technology.</p>
      <div class="nav-btn">
        <a href="login.php" class="login-hero">Log In</a>
        <a href="#product" class="register-hero">Get Started &gt;&gt;</a>
      </div>
    </div>
    <div class="hero-image">
      <img src="hero-img/cookie.svg" alt="Rookies Evolution">
    </div>
  </section>

  <section class="about">
    <div class="section aboutus">
      <h2 id="about">About Us</h2>
      <p class="about-information">Selamat datang di Free Course SMK Citra Negara! Kami adalah platform pembelajaran
        online
        gratis yang dirancang
        untuk mendukung siswa SMK Citra Negara dari berbagai jurusan. Dengan berbagai materi yang tersedia, kamu dapat
        belajar kapan saja dan di mana saja sesuai dengan kebutuhanmu. Kami berkomitmen untuk memberikan pengalaman
        belajar yang menyenangkan dan bermanfaat. Mari tingkatkan keterampilan dan pengetahuanmu bersama kami!</p>
      <br>
      <h2 class="section">Why Choose Us?</h2>
      <div class="features-container">
        <div class="feature-box section">
          <i class="fa fa-book-open" aria-hidden="true"></i>
          <h3>Project-based Learning</h3>
          <p>Setiap course disusun untuk melibatkan siswa dalam proyek nyata, yang membantu mereka mempraktikkan apa
            yang mereka pelajari.</p>
        </div>
        <div class="feature-box section">
          <i class="fa fa-infinity" aria-hidden="true"></i>
          <h3>Unlimited Access</h3>
          <p>Akses materi kapan saja dan di mana saja tanpa batasan waktu. Belajar dengan kecepatanmu sendiri.</p>
        </div>
        <div class="feature-box section">
          <i class="fa fa-certificate" aria-hidden="true"></i>
          <h3>Certified Courses</h3>
          <p>Setelah menyelesaikan kursus, dapatkan sertifikat yang akan membantumu meningkatkan portofolio dan
            kesempatan karier.</p>
        </div>
      </div>
    </div>
    </div>
  </section>

  <section class="product-course">
    <h2 class="section">Courses</h2>
    <h3 class="product-head section">PPLG</h3>
    <!-- PPLG Section -->
    <div id="product">

      <div class="product-box section" id="html-css-course">
        <img src="img-logo/htmlcss-removebg-preview.png" alt="HTML & CSS" class="product-img">
        <h3 class="product-title">HTML & CSS</h3>
        <p class="product-price">FREE</p>
        <div class="path">
          <a href="learningHtml.php">Learn</a>
        </div>
      </div>
      <div class="product-box section">
        <img src="img-logo/js.png" alt="JavaScript" class="product-img">
        <h3 class="product-title">JavaScript</h3>
        <p class="product-price">FREE</p>
        <div class="path">
          <a href="#">Learn</a>
        </div>
      </div>
      <div class="product-box section">
        <img src="img-logo/pehape-removebg-preview.png" alt="PHP" class="product-img">
        <h3 class="product-title">PHP</h3>
        <p class="product-price">FREE</p>
        <div class="path">
          <a href="#">Learn</a>
        </div>
      </div>
      <div class="product-box section">
        <img src="img-logo/sql-removebg-preview.png" alt="MySQL" class="product-img">
        <h3 class="product-title">MySQL</h3>
        <p class="product-price">FREE</p>
        <div class="path">
          <a href="#">Learn</a>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="footerContainer">
      <div class="socialIcons">
        <a href="https:/github.com/RizwanHawwari/RookieSM"><i class="fa-brands fa-github"></i>
          <span class="social-title">GitHub</span></a>
      </div>
    </div>
    <div class="footerBottom">
      <p>Rookies Evolution &copy2024</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
