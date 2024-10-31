<?php 
session_start();
include "functions.php";
if (!isset($_SESSION['session_username']) || $_SESSION['role'] !== 'A') {
  header("Location: login.php");
  exit();
}

$sql = "SELECT name, email, phone, join_date FROM admin LIMIT 1";
$result = mysqli_query($conn, $sql);

// Mengecek hasil query
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  
    $admin_name = $row["name"];
    $admin_email = $row["email"];
    $admin_phone = $row["phone"];
    $admin_join_date = date("d-M-Y", strtotime($row["join_date"]));
} else {
    echo "No results found.";
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

<style>
.profile-container {
  background-color: #333;
  color: #f0f0f0;
  border-radius: 8px;
  padding: 20px;
  width: 80%;
  max-width: 1000px;
  box-shadow: 3px 5px 9px 2px rgba(0, 0, 0, 0.8);
  margin: 20px auto;
}

.profile-card {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  flex-wrap: wrap;
}

.profile-image {
  position: relative;
  margin-bottom: 20px;
  text-align: center;
}

.profile-image img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
}

.upload-btn {
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  background-color: #007bff;
  color: white;
  border: none;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
}

.profile-info {
  flex: 1;
  margin-left: 40px;
}

.profile-info h2 {
  font-size: 1.8rem;
  margin-bottom: 5px;
  color: #fff;
}

.profile-info p {
  font-size: 1rem;
  color: #ccc;
}

.about-section {
  margin-bottom: 20px;
}

.about-section h3 {
  font-size: 1.4rem;
  margin-bottom: 10px;
  color: #fff;
}

.about-section p {
  font-size: 1rem;
  color: #ddd;
}

.tab-section {
  margin-bottom: 20px;
}

.tabs {
  display: flex;
  border-bottom: 1px solid #555;
  flex-wrap: wrap;
}

.tab {
  flex: 1;
  padding: 10px;
  text-align: center;
  cursor: pointer;
  background-color: #444;
  border: none;
  font-size: 0.9rem;
  color: #ddd;
}

.tab.active {
  background-color: #333;
  border-bottom: 2px solid #007bff;
}

.tab-content {
  margin-top: 10px;
}

.tab-pane {
  display: none;
}

.tab-pane.active {
  display: block;
}

.action-buttons {
  display: flex;
  justify-content: end;
}

.cancel-btn,
.save-btn {
  margin: 0 10px;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
}

.cancel-btn {
  background-color: #555;
  color: #ddd;
}

.save-btn {
  background-color: #007bff;
  color: white;
}

/* Responsiveness */
@media (max-width: 768px) {
  .profile-container {
    width: 90%;
  }

  .profile-card {
    flex-direction: column;
    text-align: center;
  }

  .profile-info {
    margin-left: 0;
    margin-top: 20px;
  }

  .upload-btn {
    bottom: -20px;
  }

  .profile-image img {
    width: 120px;
    height: 120px;
  }

  .tabs {
    flex-direction: column;
  }

  .tab {
    font-size: 0.8rem;
  }
}

@media (max-width: 480px) {
  .profile-image img {
    width: 100px;
    height: 100px;
  }

  .profile-info h2 {
    font-size: 1.5rem;
  }

  .profile-info p {
    font-size: 0.9rem;
  }

  .about-section h3 {
    font-size: 1.2rem;
  }

  .about-section p {
    font-size: 0.8rem;
  }
}
</style>

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
          <a href="profile.php" class="sidebar-link">
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
          <a href="setting.php" class="sidebar-link">
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
        <h1>Profile Admin</h1>
      </div>
      <div class="profile-container">
        <div class="profile-card">
          <div class="profile-image">
            <img src="img/logo-cn.png" alt="Profile Image" class="rounded-circle">
            <button class="upload-btn">Upload</button>
          </div>
          <div class="profile-info">
            <h2><?php echo $admin_name; ?></h2>
            <p>Administrator</p>
          </div>
        </div>

        <div class="about-section">
          <h3>About Me</h3>
          <p>Administrator for Free Course CN platform.</p>
        </div>

        <div class="tab-section">
          <div class="tabs">
            <button class="tab active" onclick="openTab(event, 'contact-info')">Contact Info</button>
            <button class="tab" onclick="openTab(event, 'additional-info')">Additional Info</button>
          </div>
          <div class="tab-content">
            <div id="contact-info" class="tab-pane active">
              <p><strong>Email:</strong> <?php echo $admin_email; ?></p>
              <p><strong>Nomor Telepon:</strong> <?php echo $admin_phone; ?></p>
            </div>
            <div id="additional-info" class="tab-pane">
              <p><strong>Tanggal Bergabung:</strong> <?php echo $admin_join_date; ?></p>
            </div>
          </div>
        </div>

        <div class="action-buttons">
          <button class="cancel-btn">Cancel</button>
          <button class="save-btn">Save</button>
        </div>
      </div>
    </div>
  </div>


  </div>

  <script src="script.js"></script>
  <script>
  function openTab(event, tabId) {
    const tabPanes = document.querySelectorAll('.tab-pane');
    tabPanes.forEach(tab => tab.classList.remove('active'));

    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => tab.classList.remove('active'));

    document.getElementById(tabId).classList.add('active');
    event.currentTarget.classList.add('active');
  }
  </script>
</body>

</html>