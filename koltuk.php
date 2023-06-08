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

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="stylesSeat.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="movieInfo">
      <p id="movieName">
        <?php
        include('database_baglan.php');
        // Check connection
        if (!$MySql_Baglanti) {
            die("Connection failed: " . 
        mysqli_connect_error());
        }
            //echo "Connected successfully";



        echo "Koltuk Seçimi :";

        $isim=$_SESSION['user_name'];
        //sorguyu hazirliyoruz
        $sql = "UPDATE users SET balance = balance -120 WHERE user_name = '$isim' ";

        $cevap = mysqli_query( $MySql_Baglanti,$sql);

        mysqli_close($MySql_Baglanti);
    ?>

      </p>
    </div>
    <div id="seatContainer"></div>
    <p id="price"></p>
    <form action="#" method="POST">
    <button id="bookBtn"><a href="user_page.php">Ayır</a></button>

    <div class="info">
      <div class="seatt ornek">Boş</div>
      <br />
      <div class="seatt booked ornek">Alındı</div>
      <br />
      <div class="seatt selectedd ornek">Seçili</div>
    </div>

    <script src="scriptSeat.js"></script>
  </body>
</html>

