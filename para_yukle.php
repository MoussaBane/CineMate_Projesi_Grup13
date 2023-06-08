<?php
//oturumu başlat 
   
session_start(); 
error_reporting(0);

//eğer username adlı oturum değişkeni yok ise  

//login sayfasına yönlendir 

if ( !isset($_SESSION['user_name']) ) { 

  header("Location: login.php"); 

  exit(); 

 }
//mysql baglanti kodunu ekliyoruz 
include("database_baglan.php");

//degiskenleri formdan aliyoruz
$para=$_POST['para'];
$isim=$_SESSION['user_name'];
//sorguyu hazirliyoruz
$sql = "UPDATE users SET balance = balance + '$para' WHERE user_name = '$isim' ";

//sorguyu veritabanina gönderiyoruz.
$cevap = mysqli_query( $MySql_Baglanti,$sql);

//veritabani baglantisini kapatiyoruz.
mysqli_close($MySql_Baglanti);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CinaMate</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Google fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
      rel="stylesheet"
      type="text/css"
    />
    <!-- SimpleLightbox plugin CSS-->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
  <body id="page-top">
    <!-- Navigation-->
    <nav
      class="navbar navbar-expand-lg navbar-light fixed-top py-3"
      id="mainNav"
    >
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">CineMate</a>
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Kampanyalarımız</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Kısaca CineMate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Vizyondaki Filmler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_page.php">Profilim</a>
            </li>
            <li>
              <form action="/search" method="get">
                <input type="text" name="search" placeholder="Film Ara..." />
                <button type="submit">Film Ara</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
    <article class="card-body mx-auto" style="max-width: 600px;">
        <h4 class="navbar-nav ms-auto my-2 my-lg-0" style="color:white;">Bakiyeniz başarıyla yüklenmiştir</h4>
    </article>
    </header>
    <!-- Footer-->
    <footer class="bg-light py-5">
      <div class="container px-4 px-lg-5">
        <div class="small text-center text-muted">
          Copyright &copy; 2023 - CineMate
          <a href="lokasyon.php">Lokasyon ve İletişim Bilgilerimiz için Tıklayın</a>

        </div>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
