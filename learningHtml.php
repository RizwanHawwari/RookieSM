<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css-file/learningSatu.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>HTML & CSS | Course</title>
</head>

<style>
.course-overview .container {
  width: 100%;
  padding: 0;
  margin-top: 40px;
  margin-bottom: 40px;
}

.course-overview .row {
  margin: 0;
}

.course-overview .col-md-6 {
  padding: 20px;
}

.course-overview h3 {
  margin-bottom: 5px;
  margin-left: 70px;
}

.title-underline {
  width: 100%;
  height: 2px;
  background-color: #333;
  margin-left: 0;
}

ol li {
  margin-left: 17px;
}

.learning-structure h3 {
  margin-left: 70px;
}

.description-section h3 {
  font-size: 24px;
  font-weight: bold;
  margin-top: 20px;
  margin-bottom: 20px;
  color: #333; /* Adjust color if needed */
}

</style>

<body>
  <header class="header">
    <div class="logo-container">
      <img src="hero-img/cookie.svg" alt="Rookies Evolution" class="rookies">
      <a href="https://smkscitranegara.sch.id" class="logo">Free Course SMK Citra Negara</a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="siswa.php">Back</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <section class="video-section">
    <div class="container">
      <h2 class="text-center">HTML & CSS Courses</h2>
      <hr class="video-underline">
      <div class="video-container text-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/HGTJBPNC-Gw?si=LiNoPZyPnUhZnhVQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </section>

  <section class="description-section text-center">
  <h3>Description</h3>
</section>

  <section class="course-overview">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="overview">
            <h3>Course Overview</h3>
            <hr class="title-underline">
            <p>This course provides a comprehensive introduction to HTML and CSS, the foundational languages of web development. Throughout this program, you will learn how to create well-structured web pages using HTML, which serves as the backbone of any website. Understanding the semantic nature of HTML will also enhance your ability to create accessible websites that serve diverse audiences.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="learning-structure">
            <h3>Course Structure</h3>
            <hr class="title-underline">
            <ol>
              <li>Introduction</li>
              <li>HTML Fundamentals</li>
              <li>CSS Fundamentals</li>
              <li>CSS Layout Techniques</li>
              <li>Responsive Design</li>
              <li>Advanced CSS Styling</li>
              <li>Start Building Your Own Project</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="footerContainer">
      <div class="socialIcons">
        <a href="https://github.com/RizwanHawwari/RookieSM"><i class="fa-brands fa-github"></i>
          <span class="social-title">GitHub</span></a>
      </div>
    </div>

    <div class="footerBottom">
      <p>Rookies Evolution &copy; 2024</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>