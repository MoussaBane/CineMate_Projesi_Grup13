<?php
require 'database_baglan.php';

error_reporting(0); //Notice'leri gösterilmemesi için

extract($_POST); //Formdaki nameleri direkt kullanabilmek için

if (isset($submit)) {
    // Form submit edilmişse
    $user_password = hash('sha256', $user_password); // Password'u hashlanmış hali olsun

    $control_query = "SELECT * FROM users WHERE user_name = '$user_name' and user_lastname = '$user_lastname' and user_password = '$user_password'";

    $control_cevap = mysqli_query($MySql_Baglanti, $control_query);
    $rows = mysqli_num_rows($control_cevap);
    if ($rows == 1) {
        echo '<h1>Bu Kullanıcı Zaten Kayıtlıdır!!!</h1>';
        echo "<h2>Giriş Yapmak İçin <a href='login.php'>Tıklayınız</a></h2>";
    } else {
        $mysql_query = "SELECT tongue_id FROM tongues WHERE tongue_name = '$user_tongue'";
        $tongue_id_result = mysqli_query($MySql_Baglanti, $mysql_query);

        if (!$tongue_id_result) {
            // Sorgu başarısızsa hata mesajını ekrana yazdır ve işlemi sonlandır
            echo '<h1>Tongue ID Sorgusu Başarısız!</h1>';
            exit();
        }

        $tongue_row = mysqli_fetch_assoc($tongue_id_result);
        $tongue_id = $tongue_row['tongue_id'];

        $new_mysql_query =
            'INSERT INTO users (user_name, user_lastname, user_email, user_phone, user_password, user_tongue_id) ';
        $new_mysql_query .= "VALUES ('$user_name', '$user_lastname', '$user_email', '$user_phone', '$user_password', '$tongue_id')";

        $cevap = mysqli_query($MySql_Baglanti, $new_mysql_query);

        if ($cevap) {
            header('Location: login.php');
        } else {
            require 'register.php';
        }
    }
}

mysqli_close($MySql_Baglanti);
?>
