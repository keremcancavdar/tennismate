<?php
session_start();
$posta = $_SESSION["kullaniciMail"];
$uyeID = $_SESSION["uyeID"];
include "inc/header.php";
include "inc/menu.php";
require_once "inc/baglan.php";
$profilID = $_GET["profilID"];
$uyeGetir = "SELECT * FROM uye where uyeMail = '$posta'";
$sorguSonuc = $baglan->query($uyeGetir);
if ($row = $sorguSonuc->FETCH_ASSOC()) {
    $uyeID = $row["uyeID"];
    $uyeAD = $row["uyeAd"];
    $uyeSOYAD = $row["uyeSoyad"];
    $uyeID = $row["uyeID"];
    $resim = $row["uyeResim"];
}
$profilGetir = ("SELECT * FROM uye WHERE uyeID = '$profilID'");
$profilGetirS = $baglan->query($profilGetir);
$profilGetirSonuc = $profilGetirS->FETCH_ASSOC();

?>

<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-7 profilSol p-5">
            <div class="row justify-content-center mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="kullaniciProfil.php">Anasayfa</a></li>
                        <li class="breadcrumb-item active text-warning" aria-current="page">Oyuncu Profili</li>
                    </ol>
                </nav>
                <div class="col-10 profilGoruntuleGenel p-2 mt-3">
                    <div class="row">
                        <div class="col-auto profilGoruntuleResim"><img
                                src="image/<?php echo $profilGetirSonuc["uyeResim"]; ?>" class="img-fluid"></div>
                        <div class="col-9">
                            <div class="col-12 profilGoruntuleIsım">
                                <h5><b><?php echo $profilGetirSonuc["uyeAd"]." ".$profilGetirSonuc["uyeSoyad"];  ?></b>
                                </h5>
                            </div>
                            <div class="row ">
                                <div class="col-12 profilGoruntuleBiyo text-justify">
                                    <?php echo $profilGetirSonuc["biyografi"]; ?>
                                    <div class="row mt-3">
                                        <div class="col-9 profilGoruntuleIco">
                                            <div class="row">
                                                <div class="col-auto">

                                                    <b style="color:#ff9518;"> Derecesi </b>
                                                    <br><?php echo $profilGetirSonuc["seviye"];?>
                                                </div>
                                                <div class="col-auto px-5">
                                                    <?php
                                                        $puan = $baglan->query("SELECT AVG(puan) FROM degerlendirme WHERE puanlanan = '$profilID'");
                                                        $puanSonuc = $puan->fetch_assoc();
                                                        $ortalamaPuan = $puanSonuc["AVG(puan)"];
                                                        $ortalamaPuan = number_format($ortalamaPuan, 1, '.', '');
                                                    ?>
                                                    <b style="color:#ff9518;"> Puan</b> <br> <?php echo $ortalamaPuan;?>
                                                </div>
                                                <div class="col-auto">
                                                    <?php
                                                        $oyunSayi = $baglan->query("SELECT COUNT(etkinlikID) FROM `oyunonay` WHERE 
                                                        (katilimciID= '$profilID' or kurucuID='$profilID') and durum = 0");
                                                        $oyunSayiSonuc = $oyunSayi->fetch_assoc();
                                                      ?>
                                                    <b style="color:#ff9518;"> Yapılan Maç Sayısı</b>
                                                    <br><?php echo $oyunSayiSonuc["COUNT(etkinlikID)"]; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h4 style="color:#ff9518;"><b>Yorumlar</b> </h4>
                        </div>
                        <?php
                        $degerlendirme = $baglan->query("SELECT degerlendirme.puanlayan, degerlendirme.yorum,
                        degerlendirme.puan, uye.uyeAd, uye.uyeSoyad, uye.uyeResim
                        FROM `degerlendirme` INNER JOIN uye ON degerlendirme.puanlayan = uye.uyeID WHERE
                        degerlendirme.puanlanan = '$profilID'");
                        $degerlendirmeSayi = mysqli_num_rows($degerlendirme);
                        if($degerlendirmeSayi == '0')
                        {
                        ?>
                        <div class="col-10 alert alert-warning text-center p-1" role="alert">
                            <h6>Henüz bir yorum almadınız.</h6>
                        </div>
                        <?php 
                        }
                        else{
                            
                        

                        while($degerlendirmeSonuc = $degerlendirme->fetch_assoc()){
                            ?>
                        <div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-auto yorumGoruntuleResim">
                                    <img src="image/<?php echo $degerlendirmeSonuc['uyeResim']; ?>" class="img-fluid">
                                </div>
                                <div class="col-10">
                                    <b><?php echo $degerlendirmeSonuc["uyeAd"]." ".$degerlendirmeSonuc["uyeSoyad"]; ?></b><br><span
                                        style="color:#F39C12;">
                                        <?php
                            $yildiz = $degerlendirmeSonuc["puan"];
                            for ($i=0; $i <$yildiz ; $i++)
                            { 
                                 echo "★ ";
                            }
                        ?>
                                    </span> <br>
                                    <?php echo $degerlendirmeSonuc["yorum"]; ?>
                                </div>

                            </div>
                        </div>
                        <?php }} ?>

                    </div>
                </div>

            </div>
        </div>

        <?php include "inc/yeniProfilSag.php"; ?>
    </div>
</div>

</body>

</html>