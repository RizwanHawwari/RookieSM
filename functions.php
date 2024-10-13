<?php 

$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "login";
$koneksi    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  return $rows;
}

// function edit($tabel, $id) {
//   global $conn;
  
//   $tabelValid = ["siswa", "admin"];
//   if (!in_array($tabel, $tabelValid)) {
//       return false;
//   }

//   if ($tabel == "siswa" || $tabel == "admin") {
//     $nis = htmlspecialchars($_POST["nis"]);
//     $atmin = htmlspecialchars($_POST["atmin"])

//     if ($tabel == "siswa") {
//         $nis = htmlspecialchars($_POST["nis"]);
//         $query = "UPDATE siswa SET
//             nis = '$nis'
//             WHERE id = $id";
//     } elseif ($tabel == "guru") {

//         $q4 = "SELECT id FROM login WHERE atmin = '$atmin'";
//         $r4 = mysqli_query($conn, $q4);
//         if (!$r4) {
//             echo "<script>alert('Query gagal: " . mysqli_error($conn) . "');</script>";
//             return false;
//         }
//         $query = "UPDATE atmin SET
//             $atmin = '$atmin'
//             WHERE id = $id";
//     }
//   }
  
//   return mysqli_affected_rows($conn);
// }

// function delete($tabel, $id) {
//   global $conn;
  
//   $tabelValid = ['siswa', 'guru', 'mapel'];
//   if (!in_array($tabel, $tabelValid)) {
//       return false;
//   }
  
//   $query = "DELETE FROM $tabel WHERE id = '$id'";
//   mysqli_query($conn, $query);
  
//   return mysqli_affected_rows($conn);
// }

// function create($table, $fields) {
//   global $conn;

//   //validasi buat tabel yg bkn mapel
//   if ($table != "mapel") {
//     $fieldData = [];
//     foreach ($fields as $field => $value) {
//         $fieldData[$field] = htmlspecialchars($value);
//     }

//     $email = $fieldData['email'];
//     $q2 = "SELECT email FROM $table WHERE email = '$email'";
//     $r2 = mysqli_query($conn, $q2);
//     if (mysqli_fetch_assoc($r2)) {
//         echo "<script>alert('Email Sudah Terdaftar');</script>";
//         return false;
//     }

//     $no_telp = $fieldData['no_telp'];
//     if (!validatePhoneNumber($no_telp)) {
//         echo "<script>alert('Nomor Telepon Tidak Valid');</script>";
//         return false;
//     }

//     $q3 = "SELECT no_telp FROM $table WHERE no_telp = '$no_telp'";
//     $r3 = mysqli_query($conn, $q3);
//     if (mysqli_fetch_assoc($r3)) {
//         echo "<script>alert('Nomor Telepon Sudah Terdaftar');</script>";
//         return false;
//     }
//   }
// }


function validatePhoneNumber($no_telp) {

  $kode_operator = [
      '852', '853', '811', '812', '813', '821', '822', '851',    // Telkomsel
      '856', '857',   // Indosat
      '817', '818', '819', '859', '877', '878',   // XL
      '896', '895', '897', '898', '899',    // Tri
      '881', '882', '883', '884', '885', '886', '887', '888', '889',    // Smartfren
      '813', '832', '833', '838',   // Axis
      // source: https://kumparan.com/how-to-tekno/daftar-kode-nomor-operator-seluler-di-indonesia-1xTI8XnRtVj/full
  ];

  $no_telp = preg_replace('/[^\d]/', '', $no_telp);

  if (preg_match('/^62|^08/', $no_telp)) {
      if (substr($no_telp, 0, 2) == '08') {
          $no_telp = '62' . substr($no_telp, 1);
      }

      $kode = substr($no_telp, 2, 3);

      if (in_array($kode, $kode_operator)) {
          return true;
      } else {
          return false;
      }
  } else {
      return false; 
  }
}
?>