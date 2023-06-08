<?php
session_start();

require 'database_baglan.php';
extract($_POST);

if (isset($submit)) {
    // şifre metni SHA256 ile şifreleniyor.
    $user_password = hash('sha256', $user_password);
    $sql_query = "SELECT * FROM `users` WHERE user_name='$user_name' and user_lastname = '$user_lastname' and user_password='$user_password' ";

    $cevap = mysqli_query($MySql_Baglanti, $sql_query);
    // eğer cevap FALSE ise hata yazdırıyoruz.
    if (!$cevap) {
        echo '<br>Hata:' . mysqli_error($MySql_Baglanti);
    }

    // veritabanından dönen satır sayısını bul
    $SatirSayisi = mysqli_num_rows($cevap);
    if ($SatirSayisi == 1) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_lastname'] = $user_lastname;
        $_SESSION['user_password'] = $user_password;

        $gelen = mysqli_fetch_array($cevap); // gelen satırı
        if (strstr($gelen['user_email'], '@personel.gmail.com') !== false) {
            header('Location: personel_page.php');
        } else {
            // Admin değilse kullanıcıdır
            header('Location: user_page.php');
        }
    } else {
        $mesaj = '<h1> Hatalı Kullanıcı Adı veya Şifre</h1>';
        include 'login_form.php';
    }
} else {
    // oturum yok ise login formunu görüntüle
    include 'login_form.php';
}
?>
