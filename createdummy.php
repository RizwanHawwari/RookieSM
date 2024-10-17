<?php
include "functions.php";

function addAdmin($conn, $username, $password, $role) {
    $hashedPassword = hash('sha256', $password);
    $sql = "INSERT INTO admin (Username, Password, Role) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $hashedPassword, $role);

    if ($stmt->execute()) {
        echo "Admin berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

function addSiswa($conn, $nama, $username, $nis, $password, $role, $status, $kelas, $jurusan) {
    $hashedPassword = hash('sha256', $password);
    $sql = "INSERT INTO siswa (Nama, Username, NIS, Password, Role, status, kelas, jurusan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $nama, $username, $nis, $hashedPassword, $role, $status, $kelas, $jurusan);

    if ($stmt->execute()) {
        echo "Siswa berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

addAdmin($conn, 'admin_baru', 'password_admin', 'A');

addSiswa($conn, 'Nama Siswa', 'username_siswa', 'NIS12345', 'password_siswa', 'S', 'aktif', '10', 'RPL');

$conn->close();
?>


?>