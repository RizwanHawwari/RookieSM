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
    $query = "SELECT
            mp.id,
            mp.nama_pelajaran,
            otkp.nama_pelajaran_otkp AS nama_pelajaran_otkp, 
            otkp.gambar AS gambar_otkp, 
            otkp.link_pelajaran AS link_pelajaran_otkp,
            pplg.nama_pelajaran_pplg AS nama_pelajaran_pplg, 
            pplg.gambar AS gambar_pplg, 
            pplg.link_pelajaran AS link_pelajaran_pplg,
             tjkt.nama_pelajaran_tjkt AS nama_pelajaran_tjkt, 
            tjkt.gambar AS gambar_tjkt, 
            tjkt.link_pelajaran AS link_pelajaran_tjkt
        FROM 
            mata_pelajaran AS mp
        LEFT JOIN 
            mp_otkp AS otkp ON mp.id = otkp.mata_pelajaran_id
        LEFT JOIN 
           
             mp_pplg AS pplg ON mp.id = pplg.mata_pelajaran_id
        LEFT JOIN 
            mp_tjkt AS tjkt ON mp.id = tjkt.mata_pelajaran_id
        WHERE 
            mp.nama_pelajaran LIKE '%$keyword%' OR
           otkp.nama_pelajaran_otkp LIKE '%$keyword%' OR
            pplg.nama_pelajaran_pplg LIKE '%$keyword%' OR
           tjkt.nama_pelajaran_tjkt LIKE '%$keyword%'";
            
 
    return query($query);
}
?>