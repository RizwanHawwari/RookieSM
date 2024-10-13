<?php
include 'functions.php';

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $username = $_POST['Username'];
    $password = md5($_POST['password']); 

    $sql = "INSERT INTO atmin (Username, Password) VALUES ('$username', '$password')";

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Admin</title>
</head>
<body>
    <h1>Tambah Admin</h1>
    <form method="POST" action="">
        <label>Username: </label>
        <input type="text" name="Username" autocomplete="off" required><br>
        <label>Password: </label>
        <input type="password" name="Password" required><br>
        <select label="role" name="role">
            <option value="admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'atmin') echo 'selected'; ?>>Admin</option>
          </select><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
