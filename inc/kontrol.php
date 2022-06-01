<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['kullaniciMail'])) {
    echo "<script> alert('Giriş yapmadınız.'); window.location = 'girisYap.php';  </script>";
}