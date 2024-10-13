<?php
include 'functions.php';

// Ambil ID dari query string
$id = $_GET['id'];

// Ambil data admin berdasarkan ID
$sql = "SELECT * FROM siswa WHERE id=$id";
$result = mysqli_query($koneksi, $sql);
$admin = mysqli_fetch_assoc($result);

// Proses form jika disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $username = $_POST['Nama'];
    $password = md5($_POST['Password']); // Hash password

    // Update data admin di database
    $sql = "UPDATE siswa SET Nama ='$username', Password='$password' WHERE id=$id";
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, arahkan ke halaman admin.php
        header('Location: admin.php');
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
</head>
<body>
    <h1>Edit Admin</h1>
    <form method="POST" action="">
        <!-- Pastikan name pada input sesuai dengan variabel di PHP -->
        <label>Username: </label>
        <input type="text" name="Nama" value="<?php echo $admin['Nama']; ?>" required><br>
        <label>Password: </label>
        <input type="password" name="password"><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
