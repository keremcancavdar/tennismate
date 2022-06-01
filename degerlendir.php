<?php
session_start();
$posta = $_SESSION["kullaniciMail"];
$uyeID = $_SESSION["uyeID"];
$etkinlikID = $_GET["etkinlikID"];
$rol = $_GET["rol"];

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
?>
<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-7 profilSol p-5">
            <div class="row justify-content-center">
                <div class="col-9">
                    <h4>Değerlendirme</h4>
                </div>
                <div class="col-6 form-group mt-3">
                    <label for="Puan" class="col-6 col-form-label">Derece seçiniz.</label>
                    <form action="" method="POST">
                        <select class="form-control" name="puan" required>
                            <option value="1">Çok Kötü</option>
                            <option value="2">Kötü</option>
                            <option value="3">Orta</option>
                            <option value="4">İyi</option>
                            <option value="5">Çok iyi</option>
                        </select>
                        <label for="Puan" class="col-sm-2 col-form-label mt-2">Yorumunuz:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required
                            name="yorum"></textarea>
                        <button type="submit" class="btn btn-primary mt-3" name="degerlendirme">Gönder</button>

                    </form>
                </div>
            </div>

        </div>
        <?php include "inc/yeniProfilSag.php"; ?>
    </div>


</div>
<?php
if(isset($_POST["degerlendirme"])){
    $puan = $_POST["puan"]; $yorum = $_POST["yorum"]; // post ile verileri aldık
    // etkinlikID ile kimin ve hangi oyunun değerlendirileceğini seçiyoruz
    $degerlendir_belirle = $baglan->query("SELECT * FROM oyunonay WHERE etkinlikID = '$etkinlikID'");
    $degerlendir_belirleSonuc =  $degerlendir_belirle->fetch_assoc();
    if($uyeID == $degerlendir_belirleSonuc["kurucuID"]){
        $yorumla_katilimci = $baglan->query("SELECT katilimciID FROM oyunonay WHERE etkinlikID = '$etkinlikID'");
        $yorumla_katilimciID = $yorumla_katilimci->fetch_assoc();
        $katilimciID = $yorumla_katilimciID["katilimciID"];
    }
    else{
        $yorumla_katilimci = $baglan->query("SELECT kurucuID FROM oyunonay WHERE etkinlikID = '$etkinlikID'");
        $yorumla_katilimciID = $yorumla_katilimci->fetch_assoc();
        $katilimciID = $yorumla_katilimciID["kurucuID"];
    }
    $yorumla_olustur = $baglan->query("insert into degerlendirme (etkinlikID, puanlayan, puanlanan, yorum, puan) 
    values('$etkinlikID', '$uyeID','$katilimciID','$yorum','$puan')");
    $baglan->query($yorumla_olustur);
    
    if($rol=='1'){
      $durumGuncelle = $baglan->query("UPDATE oyunonay SET kurucuPuan = 1 WHERE $etkinlikID = '$etkinlikID'");
      $baglan->query($durumGuncelle);
      
    }
    else{
        $durumGuncelle = $baglan->query("UPDATE oyunonay SET katilimciPuan = 1 WHERE $etkinlikID = '$etkinlikID'");
        $baglan->query($durumGuncelle);
     
    }
    echo "<script> alert('Değerlendirme yapıldı.');
     window.location = 'yeniBildirim.php';  </script>";
   
    
}
?>
</body>

</html>