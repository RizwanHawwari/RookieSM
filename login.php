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
if (isset($_COOKIE['cookie_username']) && isset($_COOKIE['cookie_password'])) {
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    // Cek username di database (Admin atau Siswa)
    $sql1 = "SELECT * FROM admin WHERE username = '$cookie_username' 
             UNION 
             SELECT * FROM siswa WHERE username = '$cookie_username'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);

    // Verifikasi password dari cookie
    if ($r1 && $r1['password'] == $cookie_password) {
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
        $_SESSION['role'] = ($r1['role'] == 'admin') ? 'A' : 'S'; // Set role berdasarkan tabel
    }
}

// Jika sudah login, arahkan ke halaman sesuai role
if (isset($_SESSION['session_username'])) {
    if ($_SESSION['role'] == 'S') {
        header("location: siswa.php");
    } elseif ($_SESSION['role'] == 'A') {
        header("location: admin.php");
    }
    exit();
}

// Jika form login disubmit
if (isset($_POST['login'])) {
  // Ambil data dari form
  $username = isset($_POST['username']) ? $_POST['username'] : ""; 
  $password = isset($_POST['password']) ? $_POST['password'] : "";
  $role     = isset($_POST['role']) ? $_POST['role'] : "";
  $ingataku = isset($_POST['ingataku']) ? $_POST['ingataku'] : "";

  // Validasi input
  if (empty($username) || empty($password)) {
      $err = "<li>Please input your Username and password before continuing.</li>";
  } else {
      // Buat query berdasarkan role
      $sql = ($role == 'admin') ? "SELECT * FROM admin WHERE username = '$username'" : "SELECT * FROM siswa WHERE username = '$username'";
      
      // Eksekusi query
      $q = mysqli_query($koneksi, $sql);
      
      // Cek user di tabel sesuai role
      if ($r = mysqli_fetch_assoc($q)) {
          // Verifikasi password
          if (password_verify($password, $r['Password'])) {
              // Jika password benar, set session dan arahkan ke halaman sesuai role
              $_SESSION['session_username'] = $username;
              $_SESSION['role'] = ($role == 'admin') ? 'A' : 'S';

              // Set cookie jika ingat aku dipilih
              if ($ingataku == '1') {
                  setcookie('cookie_username', $username, time() + (86400 * 30), "/"); // 30 hari
                  setcookie('cookie_password', $r['Password'], time() + (86400 * 30), "/");
              }

              // Arahkan ke halaman sesuai role
              if ($_SESSION['role'] == 'A') {
                  header("Location: admin.php");
              } else {
                  header("Location: siswa.php");
              }
              exit();
          } else {
              $err = "<li>Password tidak sesuai.</li>";
          }
      } else {
          $err = "<li>Username tidak tersedia.</li>";
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

        <!-- Role -->
        <div class="input-box">
          <select label="role" name="role">
            <option value="siswa" <?php if(isset($_POST['role']) && $_POST['role'] == 'siswa') echo 'selected'; ?>>Siswa
            </option>
            <option value="admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'admin') echo 'selected'; ?>>Admin
            </option>
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