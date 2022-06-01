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
    $uyeID = $row["uyeID"];
    $uyeAD = $row["uyeAd"];
    $uyeSOYAD = $row["uyeSoyad"];
    $uyeID = $row["uyeID"];
    $resim = $row["uyeResim"];
    $uyeSeviye = $row["seviye"];
    $uyeBio = $row["biyografi"];
}
?>
<div class="container-fluid hesapAyarlari mt-5 pt-5">
    <div class="container px-5">
        <div class="row mt-2 px-5" style="margin-left: 150px;">

            <div class="col-6">
                <div class="row">
                    <div class="col-auto hesapProfilResim">
                        <img src="image/tennis_ball.png">
                    </div>
                    <div class="col-auto resimButon">
                        <button class="mainColor">Resmi Değiştir</button><br>
                        <button style="color: #5A5A5A; border-color: black; background-color: #fff;">Resmi
                            Sil</button>
                    </div>
                </div>
                <div class="row mt-2 hesapAyar">
                    <div class="col-auto">
                        <form action="" method="POST">
                            <label>İsim</label><label style="margin-left: 162px;">Soyisim</label><br>
                            <input type="text" name="isim" value="<?php echo $uyeAD;?>">
                            <input type="text" name="soyad" value="<?php echo $uyeSOYAD;?>"
                                style="margin-left: 30px;"><br>
                            <label>Konum(isteğe bağlı)</label><br>
                            <input type="text" style="width: 330px;" disabled><br>
                            <label>Profesyonellik</label><br>
                            <select defaultValue="1" name="seviye">
                                <option value="0">Seçiniz</option>
                                <option value="Başlangıç">Başlangıç</option>
                                <option value="Orta Düzey">Orta Düzey</option>
                                <option value="İleri Düzey">İleri Düzey</option>
                            </select><br>
                            <label>Biyografi</label><br>
                            <textarea name="biyografi"><?php echo $row["biyografi"];?> </textarea>
                            <br>
                            <button type="submit" name="guncelle">Ayarları Kaydet</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    if($_POST)
    {
        $isim = $_POST["isim"];
        $soyAd = $_POST["soyad"];
        $seviye = $_POST["seviye"];
        $biyografi = $_POST["biyografi"];
        if($seviye == '0'){
            $seviye = $uyeSeviye;
        }
        $guncelle = $baglan->query("UPDATE uye SET uyeAd = '$isim', uyeSoyad = '$soyAd', seviye = '$seviye', biyografi = '$biyografi' WHERE uyeID = '$uyeID'");
        if ($baglan->affected_rows > 0) 
            {
                echo $baglan->affected_rows ."<script> alert('Ayarlar güncellendi'); window.location = 'yeniBildirim.php';  </script>";
            } 
    }

?>
</body>

</html>