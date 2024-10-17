<?php 
session_start();
if (!isset($_SESSION['session_username']) || $_SESSION['role'] !== 'A') {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Admin</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <!-- CSS -->
  <link rel="stylesheet" href="css-file/siswa.css" />
</head>

<body>
  <div class="wrapper">
    <aside id="sidebar">
      <div class="d-flex">
        <button class="toggle-btn" type="button">
          <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
          <a href="#">Free Course CN</a>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-user"></i>
            <span>Profile</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="statistic.php" class="sidebar-link" id="daftar-siswa">
            <i class="lni lni-bar-chart"></i>
            <span>Statistic</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="daftarsiswa.php" class="sidebar-link" id="daftar-siswa">
            <i class="lni lni-list"></i>
            <span>Daftar Siswa</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="register.php" class="sidebar-link" id="daftar-siswa">
            <i class="lni lni-pencil"></i>
            <span>Register Siswa</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi"
            aria-expanded="false" aria-controls="multi">
            <i class="lni lni-layout"></i>
            <span>Courses</span>
          </a>
          <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two"
                aria-expanded="false" aria-controls="multi-two">
                PPLG
              </a>
              <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">HTML & CSS</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">JavaScript</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">PHP</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">MySQL</a>
                </li>
              </ul>
            </li>

            <!-- TJKT -->
            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-three"
                aria-expanded="false" aria-controls="multi-three">
                TJKT
              </a>
              <ul id="multi-three" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Arduino</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Jaringan Komputer</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Server Administrator</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Made & Repair Computer</a>
                </li>
              </ul>
            </li>

            <!-- OTKP -->
            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-four"
                aria-expanded="false" aria-controls="multi-four">
                OTKP
              </a>
              <ul id="multi-four" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Akutansi</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Administrasi</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Ekonomi dan Bisnis</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Kearsipan</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-cog"></i>
            <span>Setting</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="logout.php" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </aside>
    <div class="main p-3">
      <div class="text-center">
        <h1>Dashboard Admin</h1>
      </div>

      <!-- Menampilkan statistik siswa -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Siswa</div>
            <div class="card-body">
              <h5 class="card-title" id="total-siswa">0</h5>
              <p class="card-text">Jumlah total siswa yang terdaftar.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-white bg-success mb-3">
            <div class="card-header">Siswa Aktif</div>
            <div class="card-body">
              <h5 class="card-title" id="siswa-aktif">0</h5>
              <p class="card-text">Jumlah siswa yang aktif saat ini.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-white bg-warning mb-3">
            <div class="card-header">Siswa Tidak Aktif</div>
            <div class="card-body">
              <h5 class="card-title" id="siswa-tidak-aktif">0</h5>
              <p class="card-text">Jumlah siswa yang tidak aktif.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Menampilkan grafik pemantauan siswa -->
      <div class="mb-4">
        <h2 class="text-center">Grafik Pemantauan Siswa</h2>
        <canvas id="myChart" style="height: 400px;"></canvas>
      </div>

      <!-- Daftar Siswa -->
      <div id="siswa-list" style="display: none;">
        <h2 class="text-center mb-4">Daftar Siswa</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Username</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody id="siswa-table-body">
            <!-- Data siswa akan diisi oleh script.js -->
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <script src="script.js"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    const daftarSiswaLink = document.getElementById("daftar-siswa");
    const siswaListDiv = document.getElementById("siswa-list");

    // Fungsi untuk mengambil dan menampilkan data siswa
    function loadSiswaData() {
      fetch("get_siswa.php")
        .then((response) => response.json())
        .then((data) => {
          let totalSiswa = data.length;
          let siswaAktif = data.filter(siswa => siswa.status === 'aktif').length;
          let siswaTidakAktif = data.filter(siswa => siswa.status === 'tidak aktif').length;

          document.getElementById("total-siswa").innerText = totalSiswa;
          document.getElementById("siswa-aktif").innerText = siswaAktif;
          document.getElementById("siswa-tidak-aktif").innerText = siswaTidakAktif;

          // Menampilkan daftar siswa
          let html = '';
          data.forEach((siswa) => {
            html += `<tr>
                                  <td>${siswa.nama}</td>
                                  <td>${siswa.username}</td>
                                  <td>${siswa.role}</td>
                               </tr>`;
          });
          document.getElementById("siswa-table-body").innerHTML = html;

          // Menampilkan grafik pemantauan siswa
          const ctx = document.getElementById('myChart').getContext('2d');
          const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['Total Siswa', 'Siswa Aktif', 'Siswa Tidak Aktif'],
              datasets: [{
                label: 'Jumlah Siswa',
                data: [totalSiswa, siswaAktif, siswaTidakAktif],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 206, 86, 0.2)',
                  'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        })
        .catch((error) => console.error("Error:", error));
    }

    daftarSiswaLink.addEventListener("click", loadSiswaData);
    loadSiswaData(); // Memanggil fungsi saat halaman dimuat
  });
  </script>
</body>

</html>