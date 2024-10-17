<?php
include 'functions.php'; // Menghubungkan ke database

// Mengambil ID dari query string
$id = $_GET['id'];

// Query untuk menghapus data admin berdasarkan ID
$sql = "DELETE FROM siswa WHERE id=$id";

// Eksekusi query
if (mysqli_query($koneksi, $sql)) {
    // Jika berhasil, arahkan ke halaman daftar admin
    header('Location: datasiswa.php');
} else {
    // Jika gagal, tampilkan pesan error
    echo "Error deleting record: " . mysqli_error($koneksi);
}
?>
