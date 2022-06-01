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
    <title>tennisMate | Kaydol</title>
    <style>
    /*
        .hizliGiris {
            font-size: 15px;
            border: 2px solid #C4C4C4;
            border-radius: 92px;
            padding: 5px 10px;
        }
        */
    </style>
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
                <div class="col-auto"><a href="index.html"><b style="font-size: 20px;">Geri Dön</b></a></div>

            </div>
            <div class="row mt-5 justify-content-around" style="font-size:35px;">
                <div class="col-auto leftContent  text-center">
                    <img src="image/logo.png"> <br> <b style="font-family: Segoe Script;">Tennismate </b><span
                        style="color: #ff9518">'e <br> hoş geldiniz</span>
                </div>
                <div class="col-auto" style="font-size: 25px;">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-auto">
                                Ad, Soyad<br><input type="text" name="uyeAd" required
                                    style="width: 140px; margin-right: 20px;"><input type="text" name="uyeSoyad"
                                    required style="width: 140px;">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-auto">
                                E-posta Adresiniz<br><input type="email" name="uyeMail" required>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-auto">
                                Parola<br><input type="password" name="uyeSifre" required>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <div class="col-auto kayitOlButton">
                                <button type="submit" id="kayitDegis" name="kaydol"> Kaydol </button>
                            </div>
                        </div>
                        <!--
                        <div class=" row justify-content-center mt-5">
                                    <div class="col-6 text-center hizliGiris">
                                        <svg width="25" height="25" viewBox="0 0 52 54" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect x="0.842285" y="0.607727" width="50.7818" height="52.4989"
                                                fill="url(#pattern0)" />
                                            <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                                    height="1">
                                                    <use xlink:href="#image0_10_3101"
                                                        transform="translate(-0.0169064) scale(0.0107689 0.0104167)" />
                                                </pattern>
                                                <image id="image0_10_3101" width="96" height="96"
                                                    xlink:href="data:image/png;base64,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" />
                                            </defs>
                                        </svg>
                                        Facebook ile kaydol
                                    </div>

                            </div>

                            <div class="row  justify-content-center mt-3">
                                <div class="col-6 text-center hizliGiris">
                                    <svg width="25" height="25" viewBox="0 0 45 46" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect x="0.970215" y="0.89917" width="43.8858" height="44.5937"
                                            fill="url(#pattern0)" />
                                        <defs>
                                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                                height="1">
                                                <use xlink:href="#image0_10_3098"
                                                    transform="translate(-0.00806452) scale(0.0105847 0.0104167)" />
                                            </pattern>
                                            <image id="image0_10_3098" width="96" height="96"
                                                xlink:href="data:image/png;base64,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" />
                                        </defs>
                                    </svg>
                                    Google ile kaydol
                                </div>

                            </div>
                            -->

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
include "inc/baglan.php";
if (isset($_POST["kaydol"])) {
    $ad = $_POST["uyeAd"];
    $soyAd = $_POST["uyeSoyad"];
    $ePosta = $_POST["uyeMail"];
    $sifre = $_POST["uyeSifre"];

    $yeniUye = "insert into uye(uyeAd, uyeSoyad, uyeMail, uyeSifre) values('$ad','$soyAd','$ePosta','$sifre')";
    if ($baglan->query($yeniUye)) {
        echo "
            <script>
            document.getElementById('kayitDegis').innerHTML = 'Kayıt Başarılı';
            document.getElementById('kayitDegis').style.background='#ff9518';
                function bekle(){
                    window.location = 'girisYap.php';
            }
                setTimeout('bekle()', 4000)
            </script>";
    } else {
        echo "<script>
                    document.getElementById('kayitDegis').style.background='red';
                    document.getElementById('kayitDegis').innerHTML = 'Hata';
                    
                    function bekle(){
                        document.getElementById('kayitDegis').innerHTML = 'Kaydol';
                        document.getElementById('kayitDegis').style.background='#59EF9F';
                    }
                    setTimeout('bekle()', 3000)
                </script>";
    }
}


?>