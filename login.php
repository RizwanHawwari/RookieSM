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
$nis        = ""; // Menyimpan NIS atau username dari form login
$role       = ""; // Menyimpan role (siswa/admin) dari form login
$ingataku   = ""; // Menyimpan status checkbox "Ingat Aku"

// Mengecek jika cookie login ada dan valid
if (isset($_COOKIE['cookie_nis']) && isset($_COOKIE['cookie_password'])) {
    $cookie_nis = $_COOKIE['cookie_nis'];
    $cookie_password = $_COOKIE['cookie_password'];

    // Cek NIS di database siswa
    $sql1 = "SELECT * FROM siswa WHERE nis = '$cookie_nis'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);

    if ($r1 && $r1['password'] == $cookie_password) {
        $_SESSION['session_nis'] = $cookie_nis;
        $_SESSION['session_password'] = $cookie_password;
    }
}

// Jika sudah login, arahkan ke halaman siswa atau admin
if (isset($_SESSION['session_nis']) && $_SESSION['session_role'] == 'siswa') {
    header("location: siswa.php");
    exit();
} elseif (isset($_SESSION['session_nis']) && $_SESSION['session_role'] == 'admin') {
    header("location: admin.php");
    exit();
}

// Jika form login disubmit
if (isset($_POST['login'])) {
    $nis       = isset($_POST['nis']) ? $_POST['nis'] : ""; // Ambil NIS atau username dari form
    $password  = isset($_POST['password']) ? $_POST['password'] : ""; // Ambil password dari form
    $role      = isset($_POST['role']) ? $_POST['role'] : ""; // Ambil role dari form siswa/admin
    $ingataku  = isset($_POST['ingataku']) ? $_POST['ingataku'] : ""; // Checkbox "ingat aku"

    // Validasi input
    if ($nis == '' || $password == '') {
        $err .= "<li>Please input your NIS/Username and password before continuing.</li>";
    } else {
        // Cek berdasarkan role
        if ($role == 'siswa') {
            // Cek NIS di tabel siswa
            $sql_siswa = "SELECT * FROM siswa WHERE nis = '$nis'";
            $q_siswa = mysqli_query($koneksi, $sql_siswa);
            $r_siswa = mysqli_fetch_array($q_siswa);

            // Cek apakah NIS dan password siswa sesuai
            if (!$r_siswa || $r_siswa['password'] != md5($password)) {
                $err .= "<li>NIS atau password tidak sesuai.</li>";
            } else {
                // Jika valid, simpan sesi siswa
                $_SESSION['session_nis'] = $nis;
                $_SESSION['session_password'] = md5($password);
                $_SESSION['session_role'] = 'siswa';

                // Jika "ingat aku" dicentang, simpan cookie
                if ($ingataku == 1) {
                    setcookie("cookie_nis", $nis, time() + (60 * 60 * 24 * 30), "/");
                    setcookie("cookie_password", md5($password), time() + (60 * 60 * 24 * 30), "/");
                }

                // Redirect ke halaman siswa
                header("location: siswa.php");
                exit();
            }
        } elseif ($role == 'admin') {
            // Cek username admin di tabel admin
            $sql_admin = "SELECT * FROM atmin WHERE username = '$nis'";
            $q_admin = mysqli_query($koneksi, $sql_admin);
            $r_admin = mysqli_fetch_array($q_admin);

            // Cek apakah username admin dan password sesuai
            if (!$r_admin || $r_admin['Password'] != md5($password)) {
                $err .= "<li>Username atau password tidak sesuai.</li>";
            } else {
                // Jika valid, simpan sesi admin
                $_SESSION['session_nis'] = $nis;
                $_SESSION['session_password'] = md5($password);
                $_SESSION['session_role'] = 'admin';

                // Jika "ingat aku" dicentang, simpan cookie
                if ($ingataku == 1) {
                    setcookie("cookie_nis", $nis, time() + (60 * 60 * 24 * 30), "/");
                    setcookie("cookie_password", md5($password), time() + (60 * 60 * 24 * 30), "/");
                }

                // Redirect ke halaman admin
                header("location: admin.php");
                exit();
            }
        } else {
            $err .= "<li>Role tidak valid.</li>";
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
          <input id="login-nis" type="text" name="nis" value="<?php echo htmlspecialchars($nis) ?>" autocomplete="off">
          <label>Username</label>
        </div>

        <div class="input-box">
          <input id="login-password" type="password" name="password" required>
          <label>Password</label>
        </div>

        <div class="input-box">
          <select label="role" name="role">
            <option value="siswa" <?php if(isset($_POST['role']) && $_POST['role'] == 'siswa') echo 'selected'; ?>>Siswa</option>
            <option value="admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'admin') echo 'selected'; ?>>Admin</option>
          </select>
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
