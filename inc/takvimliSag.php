<div class="col-3 profilSag py-5">
    <div class="row justify-content-center">
        <div class="col-auto profilResmi">
            <img src="image/<?php echo $resim; ?>">
        </div>

    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-auto text-center">
            <b><?php echo $uyeAD . " " . $uyeSOYAD; ?></b><br>
            Beceri Seviyesi <br>
            Biyografi
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-auto text-center">
            <img src="image/takvim.PNG">
        </div>
    </div>
    <div class="row px-4 mt-2">
        <div class="col-auto"><b>Yaklaşan Maçlar</b></div>
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
</div>