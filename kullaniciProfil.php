<?php
session_start();
$posta = $_SESSION["kullaniciMail"];
include "inc/kontrol.php";
include "inc/header.php";
include "inc/menu.php";
require_once "inc/baglan.php";
$uyeGetir = "SELECT * FROM uye where uyeMail = '$posta'";
$sorguSonuc = $baglan->query($uyeGetir);
if ($row = $sorguSonuc->FETCH_ASSOC()) {
    $uyeID = $row["uyeID"];
    $uyeAD = $row["uyeAd"];
    $uyeSOYAD = $row["uyeSoyad"];
    $uyeID = $row["uyeID"];
    $resim = $row["uyeResim"];
}
$_SESSION["kullaniciAd"] = $uyeAD;
$_SESSION["uyeID"] = $uyeID;

?>
<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-7 profilSol p-5">
            <div class="row  justify-content-between px-5">
                <div class="col-12">
                    <b style="font-size: 25px;">Hoş geldin <?php echo $uyeAD . " " . $uyeSOYAD; ?></b><br><span
                        style="font-family:Titillium Web; font-size: 20px;">Haydi bir oyun kur veya
                        oyuna katıl.</span>
                    <div class="row justify-content-center text-center mt-5 p-5">
                        <div class="col-auto mainColor oyunKur">
                            <a href="oyunKur.php">
                                <img src="image/users.svg" class="img-fluid">
                                <br><br>
                                Oyun Kur
                            </a>
                        </div>
                        <div class="col-auto oyunKur"
                            style="margin-left: 20px; background-color: white; border:2px solid #c4c4c4;">
                            <a href="oyunaKatıl.php">
                                <img src="image/chevron-down.svg" class="img-fluid">
                                <br><br>
                                Oyuna Katıl
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include "inc/yeniProfilSag.php"; ?>
    </div>


</div>

</body>

</html>