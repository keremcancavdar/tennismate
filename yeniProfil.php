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
        <div class="col-3 profilSag">
            <div class="row justify-content-center mt-3">
                <div class="col-auto profilResmi">
                    <img src="image/<?php echo $resim; ?>">
                </div>

            </div>
            <div class="row justify-content-center mt-1">
                <div class="col-auto text-center">
                    <b><?php echo $uyeAD . " " . $uyeSOYAD; ?></b>
                    <span style="font-size:13px;">Amatör</span>
                    <br>
                    Boş vakitlerimde tenis oynayarak yeni insanlar tanıyorum. Bu vakitleri değerlendiriyorum.
                </div>
                <hr>
            </div>
            <div class="row p-3 justify-content-around">
                <div class="col-6 text-center"><b>Puan</b>
                    <div class="puanDiv">
                        <i class="fas fa-star" style="color: yellow; font-size: 25px;"></i>

                        <b style="margin-left: 15px; color: white;">4,7/5</b>
                    </div>
                </div>
                <div class="col-6 text-center"><b>Oynadığı Oyun</b>
                    <div class="puanDiv">
                        <i class="fas fa-table-tennis" style="color: yellow; font-size: 25px;"></i>


                        <b style="margin-left: 15px; color: white;">50</b>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 text-center"><b style="font-size: 18px;">Yaklaşan Maçlar</b></div>
            </div>
            <div class="row justify-content-center">
                <?php
                $yaklasanOyun = $baglan->query("SELECT oyunonay.katilimciID, oyunonay.kurucuID, oyunonay.etkinlikID, aktifoyunlar.tarih, aktifoyunlar.saat FROM oyunonay INNER JOIN aktifoyunlar ON oyunonay.etkinlikID = aktifoyunlar.oyunID WHERE oyunonay.katilimciID = '$uyeID' or oyunonay.kurucuID = '$uyeID'");
                while ($oyunSonuc = $yaklasanOyun->fetch_assoc()) {
                ?>
                <div class="col-10 upComingEvents border">
                    <div class="row justify-content-center">
                        <div class="col-auto eventDay"><?php
                                                            $tarihTam = $oyunSonuc["tarih"];
                                                            $tarihGun = $tarihTam[1];
                                                            $deneme = substr($tarihTam, -2);
                                                            echo $deneme; ?></div>
                        <div class="col-6">Pamukkale Üniversitesi Sosyal Tesisler</div>
                        <div class="col-auto"><?php echo $oyunSonuc["saat"] ?></div>
                    </div>

                </div>
                <?php } ?>

            </div>

            <div class="row mt-2">
                <div class="col-12 profilSagYorum">
                    <div class="row border-bottom border-dark  p-2">
                        <div class="col-auto align-self-center">
                            <img src="image/profil.jpg" width="60px" height="60px" style="border-radius:90px;">
                        </div>
                        <div class="col-9 px-3"><b>Keremcan Çavdar</b> <br>
                            <span style="color: rgb(163, 163, 50);">★★★★★</span> <br>
                            Güzel bir oyun oldu, saatinde geldi teşekkür ederim.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 profilSagYorum">
                    <div class="row border-bottom border-dark  p-2">
                        <div class="col-auto align-self-center">
                            <img src="image/profil.jpg" width="60px" height="60px" style="border-radius:90px;">
                        </div>
                        <div class="col-9 px-3"><b>Keremcan Çavdar</b> <br>
                            <span style="color: yellow;">★★★★★</span> <br>
                            Güzel bir oyun oldu, saatinde geldi teşekkür ederim.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

</body>

</html>