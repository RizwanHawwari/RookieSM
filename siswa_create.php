<?php
include 'functions.php';

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nis = $_POST['NIS'];
    $username = $_POST['Nama'];
    $password = md5($_POST['Password']); 

    // Validasi bahwa NIS harus berupa angka
    if (!is_numeric($nis)) {
        echo "NIS harus berupa angka!";
    } else {
        // Cek apakah NIS sudah ada di database
        $cek_nis = "SELECT * FROM siswa WHERE NIS = '$nis'";
        $result = mysqli_query($koneksi, $cek_nis);

        if (mysqli_num_rows($result) > 0) {
            // Jika NIS sudah ada
            echo "NIS sudah digunakan, silakan gunakan NIS lain.";
        } else {
            // Jika NIS belum ada, lakukan insert data ke tabel siswa
            $sql = "INSERT INTO siswa (NIS, Nama, password) VALUES ('$nis', '$username', '$password')";

            // Eksekusi query
            if (mysqli_query($koneksi, $sql)) {
                header('Location: datasiswa.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
</head>
<body>
    <h1>Tambah Siswa</h1>
    <form method="POST" action="">
        <label>NIS: </label>
        <input type="text" name="NIS" autocomplete="off" required><br> <!-- Input untuk NIS hanya menerima angka -->
        <label>Username: </label>
        <input type="text" name="Nama" autocomplete="off" required><br>
        <label>Password: </label>
        <input type="password" name="Password" required><br>
    <select label="role" name="role">
        <option value="siswa" <?php if(isset($_POST['role']) && $_POST['role'] == 'siswa') echo 'selected'; ?>>Siswa</option>
    </select><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
