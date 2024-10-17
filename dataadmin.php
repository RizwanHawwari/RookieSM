<?php
include 'functions.php'; // Koneksi database dan fungsi lainnya

// Ambil data admin dari tabel admin
$sql = "SELECT * FROM atmin"; // Mengambil data dari tabel 'admin'
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin List</title>
</head>
<body>
    <h1>Daftar Admin</h1>
    <a href="admin_create.php">Tambah Admin</a> <!-- Link untuk menambah admin -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
        <?php
        $i = 1; 
        // Looping untuk menampilkan setiap admin
        while ($admin = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?php echo $admin['Username']; ?></td> <!-- Tampilkan username admin -->
                <td>
                    <a href="admin_edit.php?id=<?php echo $admin['ID']; ?>">Edit</a>
                    <a href="admin_delete.php?ID=<?php echo $admin['ID']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php } ?>
    </table>
</body>
</html>
