<?php
session_start();
include "inc/kontrol.php";
include "inc/header.php";
include "inc/menu.php";
?>
<div class="container-fluid oyunKurSayfa">
    <div class="row justify-content-between">
        <div class="col-5 profilSol p-5 ">
            <form action="" method="POST">
                <div class="row justify-content-center mt-5">
                    <div class="col-12">
                        <b>Bir maç oluştur.</b> <br><br>
                        <input type="date" name="tarih" style="width:150px; height:40px;" required>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-12">
                        <input type="time" name="saat" style="width:150px; height:40px;" required>
                    </div>
                </div>
                <div class=" row justify-content-center mt-3">
                    <div class="col-12">
                        <b>Seviye</b> <br>
                        <input type="radio" value="Başlangıç" name="seviye"> <span
                            style="margin-left:10px;">Başlangıç</span> <br>
                        <input type="radio" value="Orta" name="seviye"> <span style="margin-left:10px;">Orta</span>
                        <br>
                        <input type="radio" value="İleri Seviye" name="seviye" required> <span
                            style="margin-left:10px;">İleri
                            Seviye</span>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 oyunKurButton text-center">
                        <button type="submit"> Maç Kur</button>
                        <button style="color: #5A5A5A; background: #fff; border:1px solid black;">İptal
                            Et</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-5 profilSag py-5"
            style="background-image: url('image/oyunKurArka.jpg'); background-position: center; background-size: cover; border-top-left-radius: 30px; border-bottom-left-radius: 30px;">
        </div>
    </div>


</div>

</body>

</html>
<?php
if ($_POST) {
    require_once "inc/baglan.php";
    $posta = $_SESSION["kullaniciMail"];
    $uyeGetir = "SELECT uyeID, uyeAd FROM uye where uyeMail = '$posta'";
    $sorguSonuc = $baglan->query($uyeGetir);
    if ($row = $sorguSonuc->FETCH_ASSOC()) {
        $uyeID = $row["uyeID"];
        $uyeAD = $row["uyeAd"];
    }
    $kurucuID = $uyeID;
    $kurucuİsim = $uyeAD;
    $tarih = $_POST["tarih"];
    $saat = $_POST["saat"];
    $seviye = $_POST["seviye"];
  
   
    
    $oyunKur = "insert into aktifoyunlar(kurucuID, kurucuİsim, tarih, saat, seviye) values('$kurucuID','$kurucuİsim','$tarih','$saat','$seviye')";
    if ($baglan->query($oyunKur)) {
        echo "<script> alert('Oyun Kuruldu'); window.location = 'yeniBildirim.php';  </script>";
    } else {
        echo "hata";
    }
    
}
?>