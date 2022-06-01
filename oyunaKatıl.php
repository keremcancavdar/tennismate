<?php
session_start();
$posta = $_SESSION["kullaniciMail"];
include "inc/header.php";
include "inc/menu.php";
require_once "inc/baglan.php";
$uyeGetir = "SELECT * FROM uye where uyeMail = '$posta'";
$sorguSonuc = $baglan->query($uyeGetir);
if ($row = $sorguSonuc->FETCH_ASSOC()) {
    $uyeID = $row["uyeID"];
    $uyeAD = $row["uyeAd"];
    $uyeSOYAD = $row["uyeSoyad"];
    $resim = $row["uyeResim"];
}
?>

<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-7 profilSol p-5 mt-4">
            <div class="row mb-2">
                <div class="col-12">
                    <b style="font-size:30px">Oyuna Katıl</b>
                </div>
            </div>
            <?php
            require_once "inc/baglan.php";
            $oyunSorgu = "SELECT * FROM aktifoyunlar WHERE durum = '1' ORDER BY oyunID DESC";
            $oyunSorguSonuc = $baglan->query($oyunSorgu);
            if ($oyunSorguSonuc->num_rows > 0) {
                while ($oyunSorguSatir = $oyunSorguSonuc->fetch_assoc()) {
                /*    $kurucuID = $oyunSorguSatir["kurucuID"];
                    $uyeResim = ("SELECT aktifoyunlar.kurucuID, uye.uyeResim FROM `aktifoyunlar` I
                    NNER JOIN uye ON aktifoyunlar.kurucuID = '$kurucuID' ");
                   $uyeResimSonuc = $baglan->query($uyeResim);
                   $resimSatir = $uyeResimSonuc->fetch_assoc();

                   oyun kartlarına üye resmini getirmeye çalıştım
                */


            ?>
            <div class="row justify-content-center mb-3">

                <div class="col-12 oyunKart">
                    <div class="row">
                        <div class="col-auto p-3">

                            <img src="image/tennis_ball.png" width="75px" height="75px" style="border-radius: 90px;">
                        </div>
                        <div class="col-auto p-3">
                            <b style="font-size:17px"><?php echo $oyunSorguSatir["kurucuİsim"]; ?></b> <br>
                            <span style="color: yellow;">★★★★★</span> <br>
                            <span style="font-size: 14px;"><?php echo $oyunSorguSatir["seviye"]; ?></span>
                        </div>
                    </div>
                    <div class="row px-3" style="font-weight: 600; color: #A3A4A3; font-size: 15px;">
                        <div class="col-12">
                            <i class="far fa-clock"
                                style="color: #FF5678; margin-right: 10px; font-size: 15px;"></i><?php echo $oyunSorguSatir["saat"]; ?><br>
                            <i class="far fa-calendar-check my-2"
                                style="color: #FF9518; margin-right: 10px; font-size: 15px;"></i><?php echo $oyunSorguSatir["tarih"]; ?>
                            <br> <i class="fas fa-map-marker-alt"
                                style="color: #137B1F; margin-right: 10px; font-size: 15px;"></i>
                            Pamukkale
                            Üniversitesi Sosyal
                            Tesisler
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12 text-center oyunKatil">
                            <a href="inc/oyunIstek.php?oyunID=<?= $oyunSorguSatir['oyunID'] ?>">İstek Gönder </a>
                        </div>
                    </div>
                </div>

            </div>
            <?php
                }
            }
            ?>
        </div>
        <?php include "inc/yeniProfilSag.php"; ?>
    </div>


</div>

</body>

</html>