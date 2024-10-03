<?php
session_start();

// Hapus session
session_unset();
session_destroy();

// Hapus cookie jika ada
if (isset($_COOKIE['cookie_nis']) && isset($_COOKIE['cookie_password'])) {
    setcookie('cookie_nis', '', time() - 3600, '/'); // Menghapus cookie NIS
    setcookie('cookie_password', '', time() - 3600, '/'); // Menghapus cookie password
}

// Redirect ke halaman home setelah logout
header("Location: home.php");
exit();
?>