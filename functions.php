<?php 

$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "login";
$conn    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  return $rows;
}


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


function cari($keyword) {
    $query = "SELECT * FROM mata_pelajaran WHERE nama_pelajaran OR nama_pelajaran_tjkt LIKE '%$keyword%'";
    return query($query);
}   
?>