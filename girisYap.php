<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="library/tennisMateStyle.css" />
    <title>tennisMate | Giriş</title>
</head>

<body style="height: 100vh; font-family: 'Dosis', sans-serif;">
    <div class="container p-5 girisKayit">
        <div class="container-fluid p-4">

            <div class="row">

                <div class="col-auto">
                    <a href="index.html">
                        <svg width="22" height="22" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.666664 14.0581C0.76582 14.3216 0.914499 14.5623 1.10417 14.7664L11.5208 25.4987C11.7151 25.6989 11.9457 25.8576 12.1995 25.9659C12.4533 26.0743 12.7253 26.13 13 26.13C13.5548 26.13 14.0869 25.9029 14.4792 25.4987C14.6734 25.2986 14.8275 25.061 14.9326 24.7995C15.0378 24.538 15.0919 24.2578 15.0919 23.9748C15.0919 23.4032 14.8715 22.855 14.4792 22.4508L7.60416 15.3889L23.4167 15.3889C23.9692 15.3889 24.4991 15.1628 24.8898 14.7602C25.2805 14.3577 25.5 13.8117 25.5 13.2424C25.5 12.6732 25.2805 12.1272 24.8898 11.7247C24.4991 11.3221 23.9692 11.096 23.4167 11.096L7.60416 11.096L14.4792 4.0341C14.6744 3.83456 14.8294 3.59716 14.9352 3.33559C15.041 3.07403 15.0954 2.79347 15.0954 2.51011C15.0954 2.22675 15.041 1.9462 14.9352 1.68463C14.8294 1.42307 14.6744 1.18567 14.4792 0.986124C14.2855 0.784941 14.0551 0.625252 13.8012 0.516279C13.5473 0.407305 13.275 0.351202 13 0.351202C12.725 0.351202 12.4527 0.407305 12.1988 0.516279C11.9449 0.625252 11.7145 0.784941 11.5208 0.986124L1.10417 11.7184C0.914499 11.9226 0.76582 12.1633 0.666664 12.4268C0.458294 12.9494 0.458294 13.5355 0.666664 14.0581Z"
                                fill="#272727" />
                        </svg>
                    </a>
                </div>

                <div class="col-auto"><a href="index.html"><b style="font-size:20px;">Geri Dön</b></a></div>

            </div>

            <div class="row mt-5 justify-content-around">
                <div class="col-auto text-center" style="font-size:35px;">
                    <img src="image/logo.png"> <br> <b style="font-family: Segoe Script;">Tennismate </b><span
                        style="color: #ff9518">'e <br> hoş geldiniz</span>
                </div>
                <div class="col-auto" style="font-size: 25px;">
                    <form method="POST">
                        <div class="row">
                            <div class="col-auto">
                                E-posta Adresiniz<br><input type="email" name="uyePosta" required>
                            </div>
                        </div>
                        <div class=" row mt-5">
                            <div class="col-auto">
                                Parola<br><input type="password" name="uyeSifre" required>
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-between" style="font-size:16px;">
                            <div class="col-auto">
                                <input type="checkbox"> Beni Hatırla
                            </div>
                            <div class="col-auto">
                                <a href="#">Şifremi Unuttum</a>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="col-auto kayitOlButton">
                                <button type="submit" id="girisDegis" name="girisYap"> Giriş Yap </button>
                            </div>
                        </div>
                        <!--
                        <div class="row mt-3 justify-content-center">
                            <div class="col-auto" style="font-size:17px;">veya</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                facebook and google
                            </div>
                        </div>
                        -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-auto" style="font-size:18px;">
                                <b><span style="color: #5A5A5A;">Hesabınız yok mu?</span> <a href="kaydol.php"
                                        style="color:#ff0303">Hemen
                                        Kaydol</a></b>
                            </div>
                        </div>




                    </form>
                </div>
            </div>
        </div>
        <div class="orangeLine mainColor"></div>
    </div>
</body>
<!-- RESPONSİVE İÇİN HOŞGELDİNİZDEN SONRA MT VER -->

</html>
<?php
/*
    include "inc/baglan.php";
    if($_POST){
        $uyePosta = $_POST["uyePosta"];
        $uyeSifre = $_POSTA["uyeSifre"];
        $sorgu = $baglan->query("select uyeSifre from uye where uyeMail='$uyePosta'");
        $sonuc = $sorgu->fetch_assoc();
        echo "$sonuc";
        
        if($sonuc["uyeSifre"] == $uyeSifre){
            echo $uyePosta;
            echo $uyeSifre;
        }
        else echo "hata";
    }
    */
if ($_POST) {

    $kad = $_POST['uyePosta'];
    $sifre = $_POST['uyeSifre'];
    try {
        $db = new PDO("mysql:host=localhost;dbname=tennismate", "root", "admin3535");
    } catch (PDOException $e) {
        print $e->getMessage();
    }



    $login = $db->prepare("SELECT * FROM uye WHERE uyeMail=? AND uyeSifre=?");
    $login->execute(array($kad, $sifre));
    if ($login->rowCount()) {

        $_SESSION["kullaniciMail"] = $kad;
        echo "<script> window.location = 'kullaniciProfil.php';  </script>";
    } else {
        echo "<script>
                    document.getElementById('girisDegis').style.background='#ff0303';
                    document.getElementById('girisDegis').innerHTML = 'E-posta veya Şifre Hatalı';
                    
                    function bekle(){
                        document.getElementById('girisDegis').innerHTML = 'Giriş Yap';
                        document.getElementById('girisDegis').style.background='#59EF9F';
                    }
                    setTimeout('bekle()', 3000)
                </script>";
    }
}

?>