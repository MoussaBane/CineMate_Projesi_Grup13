<?php
error_reporting(0);
//Notice'leri gosterilmemesi için
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CineMate Registration Page</title>
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
                        <img src="Images/CINEMATE.png" width="300" height="250" class="logo" alt="Register">
                    </a>
            </div>
            
            <p style="font-family: Arial Black; font-size:xx-large">"CINEMATE OTOMASYON" KAYIT FORMU</p>
            
            <div class="row">
                
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <form action="register_save.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="user_name" class="form-control" placeholder="Ad" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_lastname" class="form-control" placeholder="Soyad" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_email" class="form-control" placeholder="E-Mail" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_phone" class="form-control" placeholder="Telefon Numarasi" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="user_password" class="form-control" placeholder="Sifre" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-lg" name="user_tongue" placeholder="Dil" required>
                                <?php
                                $languages = [
                                    'Dilinizi Seciniz',
                                    'Arabic',
                                    'Chinese',
                                    'Czech',
                                    'Danish',
                                    'Dutch',
                                    'English',
                                    'Finnish',
                                    'French',
                                    'German',
                                    'Hungarian',
                                    'Italian',
                                    'Japanese',
                                    'Korean',
                                    'Norwegian',
                                    'Polish',
                                    'Portuguese',
                                    'Romanian',
                                    'Russian',
                                    'Spanish',
                                    'Swedish',
                                    'Turkish',
                                ];

                                // $languages dizisini dolaşarak select box'un seçeneklerini oluşturun.
                                foreach ($languages as $language) {
                                    if ($language === 'Dilinizi Seciniz') {
                                        echo '<option value="' .
                                            ' ' .
                                            '">' .
                                            $language .
                                            '</option>';
                                    } else {
                                        echo '<option value="' .
                                            $language .
                                            '">' .
                                            $language .
                                            '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="KAYDET" >
                        </div>
                        <div class="form-group" style="font-family: cooper black;">
                            <span>Zaten Hesabim Var? </span>
                            <a href="login.php"><b>Giris Yap</b></a>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2"></div>

            </div>
        </div>
      </center>
    </body>
</html>