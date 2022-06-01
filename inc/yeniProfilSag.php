<div class="col-3 profilSag">
    <div class="row justify-content-center mt-3">
        <div class="col-auto profilResmi">
            <img src="image/<?php echo $resim; ?>">
        </div>

    </div>
    <?php
    require_once "inc/baglan.php";
    $seviyeBiyo = ("SELECT seviye, biyografi FROM uye WHERE uyeID = '$uyeID'");
    $seviyeBiyoBagla = $baglan->query($seviyeBiyo);
    $seviyeBiyoSonuc = $seviyeBiyoBagla->fetch_assoc();
    ?>
    <div class="row justify-content-center mt-1">
        <div class="col-auto text-center">
            <b><?php echo $uyeAD . " " . $uyeSOYAD; ?></b>
            <span style="font-size:13px;"><?php echo $seviyeBiyoSonuc["seviye"];?></span>
            <br>
            <?php echo $seviyeBiyoSonuc["biyografi"]; ?>
        </div>
        <hr>
    </div>
    <div class="row p-3 justify-content-around">
        <div class="col-6 text-center"><b>Puan</b>
            <div class="puanDiv">
                <?php
                require_once "baglan.php";
                $puan = $baglan->query("SELECT AVG(puan) FROM degerlendirme WHERE puanlanan = '$uyeID'");
                $puanSonuc = $puan->fetch_assoc();
                $ortalamaPuan = $puanSonuc["AVG(puan)"];
                $ortalamaPuan = number_format($ortalamaPuan, 1, '.', '');
                ?>
                <i class="fas fa-star" style="color: yellow; font-size: 25px;"></i>
                <b style="margin-left: 10px; color: white;"><?php echo $ortalamaPuan; ?></b>
            </div>
        </div>
        <div class="col-6 text-center"><b>Oynadığı Oyun</b>
            <div class="puanDiv">
                <?php
                $oyunSayi = $baglan->query("SELECT COUNT(etkinlikID) FROM `oyunonay` WHERE 
                (katilimciID= '$uyeID' or kurucuID='$uyeID') and durum = 0");
                $oyunSayiSonuc = $oyunSayi->fetch_assoc();
                
            ?>
                <i class="fas fa-table-tennis" style="color: yellow; font-size: 25px;"></i>
                <b style="margin-left: 15px; color: white;"><?php echo $oyunSayiSonuc["COUNT(etkinlikID)"]; ?></b>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 text-center"><b style="font-size: 18px;">Yaklaşan Maçlar</b></div>
    </div>
    <div class="row justify-content-center">
        <?php
        $yaklasanOyun = $baglan->query("SELECT oyunonay.katilimciID, oyunonay.durum, oyunonay.kurucuID, oyunonay.etkinlikID, 
        aktifoyunlar.tarih, aktifoyunlar.saat 
        FROM oyunonay INNER JOIN aktifoyunlar ON oyunonay.etkinlikID = aktifoyunlar.oyunID 
        WHERE (oyunonay.katilimciID = '$uyeID' or oyunonay.kurucuID = '$uyeID') and oyunonay.durum = '1'");
        $yaklasanOyun_sayi = mysqli_num_rows($yaklasanOyun);
        if($yaklasanOyun_sayi == '0'){
            ?>
        <div class="col-10 alert alert-warning text-center p-1" role="alert">
            <h6>Henüz bir eşleşme yapmadınız.</h6>
        </div>
        <?php
        }
        else{
            
        
        while ($oyunSonuc = $yaklasanOyun->fetch_assoc()) {
        ?>
        <div class=" col-10 upComingEvents border">
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
        <?php } } ?>

    </div>

    <div class="row mt-3 justify-content-center">

        <div class="col-12 text-center"><b style="font-size: 18px;">Yorumlar</b></div>

        <?php
            $degerlendirme = $baglan->query("SELECT degerlendirme.puanlayan, degerlendirme.yorum, degerlendirme.puan, uye.uyeAd, uye.uyeResim
            FROM `degerlendirme` INNER JOIN uye ON degerlendirme.puanlayan = uye.uyeID WHERE degerlendirme.puanlanan = '$uyeID'");
            $degerlendirmeSayi = mysqli_num_rows($degerlendirme);
            if($degerlendirmeSayi == '0')
            {
                ?>
        <div class="col-10 alert alert-warning text-center p-1" role="alert">
            <h6>Henüz bir yorum almadınız.</h6>
        </div>
        <?php
            }
            while($degerlendirmeSonuc = $degerlendirme->fetch_assoc()){
                
        ?>
        <div class="col-12 profilSagYorum">
            <div class="row border-bottom border-dark  p-2">
                <div class="col-auto align-self-center">
                    <img src="image/<?php echo $degerlendirmeSonuc['uyeResim']; ?>" width="60px" height="60px"
                        style="border-radius:90px;">
                </div>
                <div class="col-9 px-3"><b><?php echo $degerlendirmeSonuc["uyeAd"]; ?></b>
                    <span style="color: #F39C12;">
                        <?php
                            $yildiz = $degerlendirmeSonuc["puan"];
                            for ($i=0; $i <$yildiz ; $i++)
                            { 
                                 echo "★";
                            }
                        ?>
                    </span> <br>
                    <?php echo $degerlendirmeSonuc["yorum"]; ?>
                </div>
            </div>
        </div>
        <?php  }?>
    </div>


</div>