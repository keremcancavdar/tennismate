<?php
session_start();
$posta = $_SESSION["kullaniciMail"];
$uyeID = $_SESSION["uyeID"];
include "inc/header.php";
include "inc/menu.php";
require_once "inc/baglan.php";
$uyeGetir = "SELECT * FROM uye where uyeMail = '$posta'";
$sorguSonuc = $baglan->query($uyeGetir);
if ($row = $sorguSonuc->FETCH_ASSOC()) {
    $uyeAD = $row["uyeAd"];
    $uyeSOYAD = $row["uyeSoyad"];
    $uyeID = $row["uyeID"];
    $resim = $row["uyeResim"];
    $seviye = $row["seviye"];
    $biyo = $row["biyografi"]; 
}
?>
<div class="container-fluid">
    <div class="row justify-content-between ">
        <div class="col-7 profilSol p-5">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <ul class="nav nav-pills mb-3 tabButtonLink" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Kurduğun Oyunlar</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Bekleyen Davetler</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Onaylanan Oyunlar</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-deger" type="button" role="tab" aria-controls="pills-deger"
                                aria-selected="false">Değerlendirme
                                Bekleyen</button>
                        </li>
                        <!--
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-gecmis" type="button" role="tab" aria-controls="pills-deger"
                                aria-selected="false">Geçmiş Oyunlar
                            </button>
                        </li>
                        -->

                    </ul>
                </div>
                <div class="tab-content p-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="row justify-content-center">
                            <?php

                            $aktifOyun = $baglan->query("SELECT * FROM aktifoyunlar WHERE kurucuID = '$uyeID' and durum='1'");
                            $davetSayi = mysqli_num_rows($aktifOyun);
                            if($davetSayi == '0'){
                                ?>
                            <div class=" col-9 alert alert-warning text-center p-2" role="alert">
                                <h6>Kurduğunuz bir oyun yok.</h6>
                            </div>
                            <?php
                                }
                                else{

                                while ($aktifOyunSonuc = $aktifOyun->fetch_assoc()) {

                        ?>
                            <div class="col-9 oyunTeklif mt-2">
                                <div class="row">

                                    <div class="col-2 oyunTeklifResim align-self-center">
                                        <img src="image/tennis_ball.png" class="img-fluid">
                                    </div>
                                    <div class="col-6 p-3" style="height:100px;">
                                        <b> <?php echo $aktifOyunSonuc["tarih"]." - ".$aktifOyunSonuc["saat"]; ?></b>
                                        tarihinde,
                                        Pamukkale
                                        Üniversitesi
                                        Sosyal
                                        Tesisleri için kurduğunuz oyun.

                                    </div>


                                    <div class="col-4 align-self-center text-center">
                                        <a href="inc/oyunSil.php?oyunID=<?=$aktifOyunSonuc['oyunID'];?>"><button
                                                type="button" class="btn btn-danger">İptal Et</button></a>
                                    </div>


                                </div>
                            </div>

                            <?php }} ?>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row justify-content-center">
                            <?php

                                $sahipEtkinlik = $baglan->query("SELECT * FROM oyunistek WHERE sahipID = '$uyeID'");
                                $davetSayi = mysqli_num_rows($sahipEtkinlik);
                                if($davetSayi == '0'){
                                    ?>
                            <div class="col-9 alert alert-warning text-center p-2" role="alert">
                                <h6>Bekleyen davetiniz yok.</h6>
                            </div>
                            <?php
                                    }
                                    else{

                                    while ($sahipEtkinlikSonuc = $sahipEtkinlik->fetch_assoc()) {
                                    $katilimciID = $sahipEtkinlikSonuc["uyeID"];

                                    // uyeID ler karışmaması için gelen istek ID yi kullanıcıya atıyorum
                                    $oyunID = $sahipEtkinlikSonuc["oyunID"];
                                    $katilimciAd = $baglan->query("SELECT uyeAd FROM uye WHERE uyeID = '$katilimciID'");
                                    // katılımcının bilgilerine ulaşmak için uye tablosundan ID ile aratıyorum
                                    $katilimciAdSonuc = $katilimciAd->fetch_assoc();

                                    $etkinlikBilgi = $baglan->query("SELECT * FROM aktifoyunlar WHERE oyunID = '$oyunID'"); 
                                    // gelen  isteklerin hangi oyuna olduğunu bulup bunların bilgilerine ulaşıyorum

                                    $etkinlikBilgiSonuc = $etkinlikBilgi->fetch_assoc();
                                    $istekID = $sahipEtkinlikSonuc["istekID"];

                            ?>
                            <div class=" col-9 oyunTeklif mt-2">
                                <div class="row">
                                    <!--
                                        <div class="oyunTeklifSaat" style="position: absolute; top: 5px; left: 90%;">
                                            10:50
                                        </div>
                                    -->
                                    <div class="col-2 oyunTeklifResim align-self-center">
                                        <img src="image/invite.png" class="img-fluid">
                                    </div>
                                    <div class="col-6 p-3" style="height:100px;">
                                        <a href="profilGoruntule.php?profilID=<?=$katilimciID?>"
                                            class="profilLink"><?php echo $katilimciAdSonuc['uyeAd']; ?></a>
                                        <b> <?php echo ", ".$etkinlikBilgiSonuc["tarih"]. " </b> tarihli oyununa katılmak istiyor.";?>

                                    </div>

                                    <div class=" col-2 align-self-center text-center">
                                        <a
                                            href="inc/macOnay.php?katilimciID=<?=$katilimciID?>&oyunID=<?=$oyunID?>&istekID=<?=$istekID?>"><button
                                                type="button" class="btn btn-success">Kabul Et</button></a>
                                    </div>
                                    <div class="col-2 align-self-center text-center">
                                        <a href="inc/istekSil.php?istekID=<?=$sahipEtkinlikSonuc['istekID'];?>"><button
                                                type="button" class="btn btn-danger">Reddet</button></a>
                                    </div>



                                </div>
                            </div>

                            <?php }} ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class=" row justify-content-center mt-3">
                            <?php
                                //aktif oyundan almasını sağla
                                // kurduğu oyunları listeleyip katilimcinin adına erişiyor ve yazdırıyor.
                                $bitir_kurucu = $baglan->query("SELECT * FROM oyunonay where kurucuID = '$uyeID' and durum = '1'");
                                $kurucuSayi = mysqli_num_rows($bitir_kurucu);
                                if($kurucuSayi == '0'){
                                    ?>
                            <div class="col-9 alert alert-warning text-center p-2" role="alert">
                                <h6>Onaylanan bir oyununuz yok.</h6>
                            </div>
                            <?php
                                }
                                else{
                                    while($bitir_kurucuSonuc = $bitir_kurucu->fetch_assoc()){
                                        $bitir_katilimciID = $bitir_kurucuSonuc["katilimciID"];
                                        $bitir_etkinlikID = $bitir_kurucuSonuc["etkinlikID"];
                                        $bitir_katilimciAd = $baglan->query("SELECT uyeAd FROM uye WHERE uyeID = '$bitir_katilimciID'");
                                        $bitir_katilimciAdSonuc = $bitir_katilimciAd->fetch_assoc();
                          
                                        
                            ?>

                            <div class=" col-9 oyunTeklif mt-2">
                                <div class="row">

                                    <div class="col-2  oyunTeklifResim align-self-center">
                                        <img src="image/up.png" class="img-fluid">
                                    </div>
                                    <div class="col-6 p-3" style="height:100px;">
                                        <a href="profilGoruntule.php?profilID=<?=$bitir_katilimciID?>"
                                            class="profilLink"><?php echo $bitir_katilimciAdSonuc['uyeAd']; ?></a>
                                        ile
                                        oynadığın oyunu
                                        bitirip değerlendirebilirsin.

                                    </div>

                                    <div class="col-4 align-self-center text-center">
                                        <a href="oyunSonlandir.php?etkinlikID=<?=$bitir_etkinlikID?>"><button
                                                type="button" class="btn btn-success">Oynandı</button></a>
                                    </div>
                                    <!--
                        <div class="col-2 align-self-center text-center"><button type="button"
                                class="btn btn-danger">İptal Et</button>
                        </div>
                        -->


                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-deger" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row justify-content-center">
                            <?php
                    
                                $deglendirme_oyunlar = $baglan->query("SELECT * FROM oyunonay WHERE durum = '0' and 
                                (katilimciID = '$uyeID' or kurucuID = '$uyeID') and (kurucuPuan = '0' or katilimciPuan = '0')");
                                $degerlendirmeSayi = mysqli_num_rows($deglendirme_oyunlar);
                                if($degerlendirmeSayi == '0')
                                {
                            ?>
                            <div class="col-9 alert alert-warning text-center p-2" role="alert">
                                <h6>Değerlendirme bekleyen oyununuz yok.</h6>
                            </div>
                            <?php
                                }
                                else{
                                    
                                    while($deglendirme_oyunlarSonuc = $deglendirme_oyunlar->fetch_assoc()){
                                        $degerlendirme_etkinlikID = $deglendirme_oyunlarSonuc["etkinlikID"];
                                        $degerlendirme_katilimciID = $deglendirme_oyunlarSonuc["katilimciID"];
                                        $degerlendirme_kurucuID = $deglendirme_oyunlarSonuc["kurucuID"];
                                        $degerlendirme_kurucuRol = $deglendirme_oyunlarSonuc["kurucuPuan"];
                                        $degerlendirme_katilimRol = $deglendirme_oyunlarSonuc["katilimciPuan"];
                                
    
                        
                                        if($uyeID == $degerlendirme_kurucuID){
                                            $degerlendirme_katilimciAd = $baglan->query("SELECT uyeAd FROM uye 
                                            WHERE uyeID = '$degerlendirme_katilimciID'");
                                            $degerlendirme_katilimciAdSonuc = $degerlendirme_katilimciAd->fetch_assoc();
                                            // Sadece karşı tarafın ismine erişiyor
                                            $rol = 1; // ROL = 1 Kurucu, puan tablosunda puanladığı belli olması için
                                            
                                        }
                                        else{
                                            $degerlendirme_katilimciAd = $baglan->query("SELECT uyeAd FROM uye 
                                            WHERE uyeID = '$degerlendirme_kurucuID'");
                                            $degerlendirme_katilimciAdSonuc = $degerlendirme_katilimciAd->fetch_assoc();
                                            // Sadece karşı tarafın ismine erişiyor
                                            $rol = 2; // ROL = 2 Katilimci, puan tablosunda puanladığı belli olması için
                                            
                                        }
                       
                        
                            ?>
                            <div class=" col-9 oyunTeklif mb-3">
                                <div class="row">
                                    <div class="col-2  oyunTeklifResim align-self-center">
                                        <img src="image/anket.png" class="img-fluid">
                                    </div>
                                    <div class="col-6 p-3" style="height:100px;">
                                        <b>
                                            <a href="profilGoruntule.php?profilID=<?=$degerlendirme_katilimciID?>"
                                                class="profilLink"><?php echo $degerlendirme_katilimciAdSonuc['uyeAd']; ?></a>
                                        </b> ile oynanan oyunu
                                        değerlendir.
                                    </div>
                                    <div class="col-4 align-self-center text-center">

                                        <?php 
                                    
                                    if(($rol == '1' && $degerlendirme_kurucuRol== '1') || ($rol == '2' && $degerlendirme_katilimRol == '1'))
                                    
                                    {                
                                        echo
                                        "
                                    <button type='button' class='btn btn-danger' disabled>
                                        Rakibin değerlendirme yapması bekleniyor.
                                    </button>
                                     ";
                                    }
    
                                    else
                                    {
                                    
                                    ?>
                                        <a
                                            href='degerlendir.php?etkinlikID=<?=$degerlendirme_etkinlikID?>&rol=<?=$rol?>'><button
                                                type='button' class='btn btn-warning'>Değerlendir</button></a>
                                        <?php
                                    }
    
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <?php } }?>
                        </div>
                    </div>
                    <!--
                    <div class="tab-pane fade" id="pills-gecmis" role="tabpanel" aria-labelledby="pills-contact-tab">
                        5
                    </div>
                    -->
                </div>

            </div>
        </div>
        <?php include "inc/yeniProfilSag.php"; ?>
    </div>


</div>
<script>
var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
triggerTabList.forEach(function(triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function(event) {
        event.preventDefault()
        tabTrigger.show()
    })
})
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
</script>
</body>

</html>