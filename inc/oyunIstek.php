<?php
// include "kontrol.php";
include "baglan.php";
session_start();
$posta = $_SESSION["kullaniciMail"];
$uyeAdi = $_SESSION["kullaniciAd"];
$oyunID = $_GET["oyunID"];
$uyeGetir = "SELECT * FROM uye where uyeMail = '$posta'";
$sorguSonuc = $baglan->query($uyeGetir);
if ($row = $sorguSonuc->FETCH_ASSOC()) {
    $uyeID = $row["uyeID"];
}



$kontrol = $baglan->query("SELECT * FROM oyunistek WHERE oyunID = '$oyunID' and uyeID = '$uyeID'");
$baglan->query($kontrol);
$geriDonen = mysqli_num_rows($kontrol);
if($geriDonen > 0)
{
    echo "<script> alert('Önceden istek gönderilmiş'); window.location = '../oyunaKatıl.php';  </script>";
}
else{
    $sahipGetir = $baglan->query("SELECT kurucuID FROM aktifoyunlar WHERE oyunID='$oyunID'");
    $sahipSonuc = $sahipGetir->fetch_assoc();
    $sahipID = $sahipSonuc["kurucuID"];
    $katilimGonder = "insert into oyunistek(oyunID, sahipID, uyeID, uyePosta, uyeAD) values('$oyunID', '$sahipID', '$uyeID', '$posta','$uyeAdi' )";
    $baglan->query($katilimGonder);
    echo "<script> alert('Katılım İsteği Gönderildi'); window.location = '../yeniBildirim.php';  </script>";
}




    