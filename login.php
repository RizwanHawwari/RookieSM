<?php 
session_start();

// Mengatur koneksi ke database
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "login";
$koneksi    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

// Menyiapkan variabel
$err        = ""; // Menyimpan pesan kesalahan
$username   = ""; // Menyimpan username dari form login
$ingataku   = ""; // Menyimpan status checkbox "Ingat Aku"

// Mengecek jika cookie login ada dan valid
if (isset($_COOKIE['cookie_nis']) && isset($_COOKIE['cookie_password'])) {
    $cookie_nis = $_COOKIE['cookie_nis'];
    $cookie_password = $_COOKIE['cookie_password'];

    // Cek NIS di database
    $sql1 = "SELECT * FROM login WHERE nis = '$cookie_nis'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);

    // Verifikasi password dari cookie
    if ($r1 && $r1['password'] == $cookie_password) {
        $_SESSION['session_nis'] = $cookie_nis;
        $_SESSION['session_password'] = $cookie_password;
    }
}

// Jika sudah login, arahkan ke halaman siswa
if (isset($_SESSION['session_nis'])) {
    header("location: siswa.php");
    exit();
}

// Jika form login disubmit
if (isset($_POST['login'])) {
    $username  = isset($_POST['username']) ? $_POST['username'] : ""; // Ambil Username dari form
    $password  = isset($_POST['password']) ? $_POST['password'] : ""; // Ambil password dari form

    // Pastikan checkbox 'ingataku' ada sebelum mengaksesnya
    $ingataku  = isset($_POST['ingataku']) ? $_POST['ingataku'] : ""; 

    // Validasi input
    if ($username == '' || $password == '') {
        $err .= "<li>Please input your Username and password before continuing.</li>";
    } else {
        // Cek Username di tabel admin
        $sql_admin = "SELECT * FROM admin WHERE username = '$username'";
        $q_admin = mysqli_query($koneksi, $sql_admin);
        $r_admin = mysqli_fetch_assoc($q_admin);

        // Cek Username di tabel siswa
        $sql_siswa = "SELECT * FROM siswa WHERE username = '$username'";
        $q_siswa = mysqli_query($koneksi, $sql_siswa);
        $r_siswa = mysqli_fetch_array($q_siswa);

        // Verifikasi password untuk admin
        if ($r_admin) {
          if ($r_admin['Password'] != md5($password)) {
              $err .= "<li>Password tidak sesuai.</li>";
          } else {
              $_SESSION['session_username'] = $username;
              $_SESSION['role'] = 'A';
              header("location: admin.php");
              exit();
          }
      } elseif ($r_siswa = mysqli_fetch_assoc($q_siswa)) {
          if ($r_siswa['Password'] != md5($password)) {
              $err .= "<li>Password tidak sesuai.</li>";
          } else {
              $_SESSION['session_username'] = $username;
              $_SESSION['role'] = 'S';
              header("location: siswa.php");
              exit();
          }
      } else {
          $err .= "<li>Username tidak tersedia.</li>";
      }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css-file/login.css">
</head>

<body>

  <div class="container">
    <div class="login-box">
      <div class="logo-cn">
        <img src="img/logo-cn.png" alt="logo-cn" width="100px">
      </div>
      <?php if ($err) { ?>
      <!-- Tampilkan pesan kesalahan jika ada -->
      <div id="error-message">
        <ul style="list-style-type: none; margin-top: 30px; font-style: italic; color: crimson;"><?php echo $err ?></ul>
      </div>
      <?php } ?>
      <h2>Login</h2>
      <form id="loginform" action="" method="post" role="form" autocomplete="off">

        <div class="input-box">
          <input id="login-username" type="text" name="username" value="<?php echo htmlspecialchars($username) ?>"
            required>
          <label>Username</label>
        </div>

        <div class="input-box">
          <input id="login-password" type="password" name="password" required>
          <label>Password</label>
        </div>

        <div class="checkbox-container">
          <input id="login-remember" type="checkbox" name="ingataku" value="1"
            <?php if ($ingataku == '1') echo "checked" ?>>
          <label for="login-remember" class="remember">Remember me</label>
        </div>

        <!-- Tombol login -->
        <input type="submit" name="login" class="btn" value="Login" />

      </form>
    </div>
  </div>
</body>

</html>