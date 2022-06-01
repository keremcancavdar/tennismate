<?php                                     
 $user ="root";
 $pass="admin3535";
 $host="localhost";
 $db="tennismate";

$baglan = new mysqli ($host,$user,$pass,$db);

if($baglan->connect_error) {
 die ("Bağlantı hatası oluştu");
}
?>