<?php
$oyunID = $_GET["oyunID"];
include "kontrol.php";
require_once "baglan.php";
$istekSil = $baglan->query("DELETE from aktifoyunlar WHERE oyunID = '$oyunID'");
if ($baglan->affected_rows > 0) {
    echo "<script> alert('Oyun silindi.'); window.location = '../yeniBildirim.php';  </script>";
} else 

{
    echo "<script> alert('HATA'); window.location = '../yeniBildirim.php';  </script>";
}


?>