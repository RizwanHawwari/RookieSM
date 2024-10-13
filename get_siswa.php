<?php
$conn = new mysqli("localhost", "root", "", "login");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nama, username, password, role FROM siswa";
$result = $conn->query($sql);

$siswa = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $siswa[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($siswa);

$conn->close();
?>