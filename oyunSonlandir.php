<?php
$etkinlikID = $_GET["etkinlikID"];
require_once "inc/baglan.php";
$oyunSonlandir = $baglan->query("UPDATE oyunonay SET durum = '0' WHERE etkinlikID = '$etkinlikID'");
if ($baglan->affected_rows > 0) 
{
    echo $baglan->affected_rows ."<script> window.location = 'yeniBildirim.php';  </script>";
} 
?>