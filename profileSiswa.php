<?php 
session_start();
include "functions.php";

// Pastikan session_username ada di session dan role 'S' (Siswa)
if (!isset($_SESSION['session_username']) || $_SESSION['role'] !== 'S') {
    header("Location: login.php");
    exit();
}

// Ambil username dari session
$username = $_SESSION['session_username'];

// Query menggunakan prepared statement untuk keamanan
$sql = "SELECT Nama, kelas, jurusan, last_login FROM siswa WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); // 's' untuk string
$stmt->execute();
$result = $stmt->get_result();

// Mengecek hasil query
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  
    // Ambil data siswa dari query
    $siswa_nama = $row["Nama"];
    $siswa_kelas = $row["kelas"];
    $siswa_jurusan = $row["jurusan"];
    $siswa_last_login = date("d-M-Y", strtotime($row["last_login"]));
} else {
    // Jika tidak ditemukan data siswa
    echo "No results found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile | Siswa</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="css-file/siswa.css" />
</head>

<style>
/* General body and background */
body {
  font-family: 'Poppins', sans-serif;
  background-color: #121212;
  margin: 0;
  padding: 0;
}

/* Main profile container */
.profile-container {
  background-color: #1e1e1e;
  color: #fff;
  border-radius: 20px;
  padding: 40px;
  max-width: 950px;
  margin: 40px auto;
  box-shadow: 0 15px 45px rgba(0, 0, 0, 0.3);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.profile-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
}

/* Profile header styling */
.profile-header {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 30px;
}

.profile-image {
  position: relative;
  margin-right: 30px;
  border-radius: 50%;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.profile-image img {
  width: 140px;
  height: 140px;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.upload-btn {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #4caf4c;
  color: white;
  padding: 8px 15px;
  border-radius: 5px;
  font-size: 0.9rem;
  cursor: pointer;
  border: none;
  transition: background-color 0.3s ease;
}

.upload-btn:hover {
  background-color: #0088ff;
}

/* Profile Info Styling */
.profile-info h2 {
  font-size: 2rem;
  font-weight: 600;
  color: #ffffff;
  margin-bottom: 5px;
}

.profile-info p {
  font-size: 1.1rem;
  color: #bbb;
}

/* About Section Styling */
.about-section h3 {
  font-size: 1.6rem;
  color: white;
  margin-bottom: 15px;
}

.about-section p {
  font-size: 1rem;
  color: #aaa;
}

/* Tabs section */
.tab-section {
  margin-top: 40px;
}

.tabs {
  display: flex;
  border-bottom: 2px solid #333;
  margin-bottom: 15px;
}

.tab {
  flex: 1;
  text-align: center;
  padding: 12px;
  font-size: 1rem;
  background-color: #2a2a2a;
  color: #bbb;
  cursor: pointer;
  border: none;
  border-radius: 10px 10px 0 0;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.tab.active {
  background-color: #4caf4c;
  color: white;
  border-bottom: 4px solid white;
}

.tab:hover {
  background-color: #333;
  color: white;
}

/* Tab content area */
.tab-content {
  padding: 20px;
  background-color: #2a2a2a;
  border-radius: 0 0 10px 10px;
}

.tab-pane {
  display: none;
}

.tab-pane.active {
  display: block;
}

/* Action buttons */
.action-buttons {
  display: flex;
  justify-content: flex-end;
  margin-top: 30px;
}

.cancel-btn,
.save-btn {
  padding: 12px 25px;
  border-radius: 5px;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.cancel-btn {
  background-color: #444;
  color: #fff;
  border: none;
}

.save-btn {
  background-color:  #4caf4c;
  color: white;
  border: none;
}

.cancel-btn:hover {
  background-color: #666;
}

.save-btn:hover {
  background-color: #0088ff;
}

/* Mobile responsive design */
@media (max-width: 768px) {
  .profile-container {
    width: 95%;
    padding: 30px;
  }

  .profile-image img {
    width: 110px;
    height: 110px;
  }

  .profile-info h2 {
    font-size: 1.8rem;
  }

  .tabs {
    flex-direction: column;
  }

  .tab {
    font-size: 0.9rem;
    margin-bottom: 10px;
  }

  .action-buttons {
    flex-direction: column;
    align-items: flex-end;
  }

  .cancel-btn, .save-btn {
    width: 100%;
    margin: 5px 0;
  }
}
</style>

<body>
  <div class="main p-3">
      <div class="text-center">
        <h1>Profile Siswa</h1>
      </div>
      <div class="profile-container">
        <div class="profile-header">
          <div class="profile-image">
            <img src="img/logo-cn.png" alt="Profile Image" class="rounded-circle">
            <button class="upload-btn">Upload</button>
          </div>
          <div class="profile-info">
            <h2><?php echo htmlspecialchars($siswa_nama); ?></h2>
            <p>Student</p>
          </div>
        </div>

        <div class="about-section">
          <h3>About Me</h3>
          <p>Student of Free Course CN platform.</p>
        </div>

        <div class="tab-section">
          <div class="tabs">
            <button class="tab active" onclick="openTab(event, 'contact-info')">Class Information</button>
            <button class="tab" onclick="openTab(event, 'additional-info')">Login Information</button>
          </div>
          <div class="tab-content">
            <div id="contact-info" class="tab-pane active">
              <p><strong>Kelas:</strong> <?php echo htmlspecialchars($siswa_kelas); ?></p>
              <p><strong>Jurusan:</strong> <?php echo htmlspecialchars($siswa_jurusan); ?></p>
            </div>
            <div id="additional-info" class="tab-pane">
              <p><strong>Terakhir Masuk:</strong> <?php echo htmlspecialchars($siswa_last_login); ?></p>
            </div>
          </div>
        </div>

        <div class="action-buttons">
          <button class="cancel-btn">Cancel</button>
          <button class="save-btn">Save</button>
        </div>

        <!-- Tombol Kembali ke Halaman Awal -->
        <div class="text-center mt-4">
          <a href="siswa.php" class="btn btn-secondary">Kembali ke Halaman Awal</a>
        </div>

      </div>
    </div>
  </div>

  <script>
    function openTab(event, tabId) {
      const tabPanes = document.querySelectorAll('.tab-pane');
      tabPanes.forEach(tab => tab.classList.remove('active'));

      const tabs = document.querySelectorAll('.tab');
      tabs.forEach(tab => tab.classList.remove('active'));

      document.getElementById(tabId).classList.add('active');
      event.currentTarget.classList.add('active');
    }

    // Script untuk toggle sidebar
    document.getElementById("toggle-btn").addEventListener("click", function() {
      document.getElementById("sidebar").classList.toggle("active");
    });
  </script>
</body>

</html>
