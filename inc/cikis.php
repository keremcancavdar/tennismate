<?php
session_start();
session_destroy();
session_unset();
header("Location:../index.html");
echo "<script> alert('çıkış yapıldı'); </script>";