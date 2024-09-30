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
$nis        = ""; // Menyimpan NIS dari form login
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

// Jika sudah login, arahkan ke halaman home
if (isset($_SESSION['session_nis'])) {
    header("location:home.php");
    exit();
}

// Jika form login disubmit
if (isset($_POST['login'])) {
    $nis       = isset($_POST['nis']) ? $_POST['nis'] : ""; // Ambil NIS dari form
    $password  = isset($_POST['password']) ? $_POST['password'] : ""; // Ambil password dari form

    // Pastikan checkbox 'ingataku' ada sebelum mengaksesnya
    $ingataku  = isset($_POST['ingataku']) ? $_POST['ingataku'] : ""; 

    // Validasi input
    if ($nis == '' || $password == '') {
        $err .= "<li>Please input your NIS and password before continuing.</li>";
    } elseif (!is_numeric($nis)) {
        $err .= "<li>NIS harus berupa angka.</li>"; // Validasi agar NIS hanya angka
    } else {
        // Cek NIS di database
        $sql1 = "SELECT * FROM login WHERE nis = '$nis'";
        $q1   = mysqli_query($koneksi, $sql1);
        $r1   = mysqli_fetch_array($q1);

        // Cek apakah NIS ada dan password sesuai
        if (!$r1) {
            $err .= "<li>NIS tidak tersedia.</li>";
        } elseif ($r1['password'] != md5($password)) {
            $err .= "<li>Password tidak sesuai.</li>";
        }       
        
        // Jika tidak ada kesalahan, simpan sesi dan cookie jika perlu
        if (empty($err)) {
            $_SESSION['session_nis'] = $nis; // Simpan NIS di sesi
            $_SESSION['session_password'] = md5($password); // Simpan password hash di sesi

            // Jika checkbox "Ingat Aku" dicentang, simpan cookie
            if ($ingataku == 1) {
                setcookie("cookie_nis", $nis, time() + (60 * 60 * 24 * 30), "/");
                setcookie("cookie_password", md5($password), time() + (60 * 60 * 24 * 30), "/");
            }
            header("location:home.php"); // Arahkan ke halaman home setelah login berhasil
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
        <ul><?php echo $err ?></ul>
      </div>
      <?php } ?>
      <h2>Login</h2>
      <form id="loginform" action="" method="post" role="form" autocomplete="off">

        <div class="input-box">
          <input id="login-nis" type="text" name="nis" value="<?php echo htmlspecialchars($nis) ?>" required>
          <label>NIS</label>
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