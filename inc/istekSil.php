<?php
$istekID = $_GET["istekID"];
include "kontrol.php";
require_once "baglan.php";
$istekSil = $baglan->query("DELETE from oyunistek WHERE istekID = '$istekID'");
if ($baglan->affected_rows > 0) {
    echo "<script> alert('İstek silindi.'); window.location = '../yeniBildirim.php';  </script>";
} else 

{
    echo "<script> alert('HATA'); window.location = '../yeniBildirim.php';  </script>";
}


?>