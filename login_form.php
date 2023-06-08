<?php
error_reporting(0);
//Notice'leri gosterilmemesi için
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Kuafor Otomasyona GirisSayfasi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
    </head>
    <body style="background-color:antiquewhite;">
    <center>
        <div class="container d-flex align-items-center">
            <div class="row">
                    <a href="index.php">
                        <img src="Images/CINEMATE.png" width="300" height="250" class="logo" alt="AnaSayfa">
                    </a>
            </div>
            
            <p style="font-family: Arial Black; font-size:xx-large">"CINEMATE OTOMASYON" KULLANICI GIRISI</p>
            
            <div class="row">
                
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <form action="<?php $_PHP_SELF; ?>" method="POST">
                        <?php if (isset($mesaj)) {
                            //hata mesaji varsa
                            echo '<br>' . $mesaj . '<br>';
                        } ?>
                        <div class="form-group">
                            <input type="text" name="user_name" class="form-control" placeholder="Ad" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_lastname" class="form-control" placeholder="Soyad" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="user_password" class="form-control" placeholder="Sifre" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="GIRIS YAP" >
                        </div>
                        <div class="form-group" style="font-family: cooper black;">
                            <span>Hesabim Yok? Hemen </span>
                            <a href="register.php"><b>Kayit Ol</b></a>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2"></div>

            </div>
        </div>
    </center>
    </body>
</html>