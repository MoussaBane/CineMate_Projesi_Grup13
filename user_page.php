<?php
// Oturum kontrolü
session_start();

// Oturumda giriş yapılıp yapılmadığını kontrol et
if (!isset($_SESSION['user_name'])) {
    // Giriş yapılmamışsa tekrar giriş yapma sayfasına yönlendir
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sinema Otomasyonu - Kullanıcı Sayfası</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="background-color:gray;">

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
            <li class="nav-item">
              <a class="nav-link" href="_logout.php">Çıkış</a>
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


<div class="container mt-5">
    <h1>Hoş Geldiniz, <?php echo $_SESSION['user_name']; ?>!</h1>
    <?php
    require 'database_baglan.php';
    $isim=$_SESSION['user_name'];
    $sql1="SELECT balance FROM users WHERE user_name = '$isim'";
    $result = mysqli_query($MySql_Baglanti, $sql1);
    $satir = mysqli_fetch_assoc($result);

    echo "Bakiyeniz :".$satir['balance'];
    ?>
    <br>
    <a href="bakiye_yukle.php" class="btn btn-success">Bakiye Yükle</a>
    <h3>Son çıkan filmler...</h3>
    <div class="row">
        <?php
        require 'database_baglan.php';

        // Film bileşenlerini oluştur
        // SQL sorgusu
        $sql = 'SELECT title, description, image FROM films';
        $result = mysqli_query($MySql_Baglanti, $sql);
        if (!$result) {
            // Sorgu başarısızsa hata mesajını ekrana yazdır ve işlemi sonlandır
            echo '<h1>Filmler Sorgusu Başarısız!</h1>';
            exit();
        }
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            // Veritabanından gelen verileri kullanarak film bileşenlerini oluştur
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-4">';
                echo '<div class="card">';
                echo '<img class="card-img-top" width="100%" height="350" src="' .
                    $row['image'] .
                    '" alt="' .
                    $row['title'] .
                    '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                echo '<p class="card-text">' . $row['description'] . '</p>';
                echo '<a href="koltuk.php" class="btn btn-primary">Detaylar</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'Veritabanında hiç film bulunamadı.';
        }

        // Veritabanı bağlantısını kapat
        mysqli_close($MySql_Baglanti);
        ?>

    </div>
</div>
</body>
<div >
    <?php require 'footer.php'; ?>
</div>

</html>

