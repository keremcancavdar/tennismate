<?php
$katilimciID = $_GET["katilimciID"];
$oyunID = $_GET["oyunID"];
$istekID = $_GET["istekID"];
include "kontrol.php";
require_once "baglan.php";

$oyunKontrol = $baglan->query("SELECT etkinlikID FROM oyunonay WHERE etkinlikID = '$oyunID'");
$kontrolSayi = mysqli_num_rows($oyunKontrol);
if($kontrolSayi != '0')
    {
        echo "<script> alert('Bu oyun daha önce onaylanmış.'); window.location = '../yeniBildirim.php';  </script>";
        
    }
    
    else{
        $kurucuGetir = $baglan->query("SELECT kurucuID FROM aktifoyunlar WHERE oyunID = '$oyunID'");
        $kurucuSonuc =  $kurucuGetir->fetch_assoc();
        $kurucuID = $kurucuSonuc["kurucuID"];
        $katilimOnay = "insert into oyunonay(etkinlikID, katilimciID, kurucuID) values('$oyunID', '$katilimciID', '$kurucuID')";
        $baglan->query($katilimOnay); // katilim onaylıyor tabloya kaydediyor
        $istekSil = "DELETE FROM oyunistek WHERE istekID = '$istekID'";
        $baglan->query($istekSil); // istek kabul olduğu için isteği tablodan siliyor

        // aktifliği değiştirip listelenmemesini sağlıyor.
        $aktifOyun = ("UPDATE aktifoyunlar SET durum = 0 WHERE oyunID = '$oyunID'");
        $baglan->query($aktifOyun);
        echo "<script> alert('Onaylandı'); window.location = '../yeniBildirim.php';  </script>";
    }