<?php
include 'functions.php';

// Ambil data siswa dari database
$sql = "SELECT * FROM siswa";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>siswa List</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
    <a href="siswa_create.php">Tambah Siswa</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php

$i = 1; 
while ($siswa = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?php echo $siswa['NIS']; ?></td> 
        <td><?= $siswa['Nama'] ?></td>
        <td>
            <a href="siswa_edit.php?id=<?php echo $siswa['ID']; ?>">Edit</a>
            <a href="siswa_delete.php?id=<?php echo $siswa['ID']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
<?php } ?>
    </table>
</body>
</html>
