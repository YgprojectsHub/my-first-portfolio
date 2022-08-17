<?php 

$host = "localhost";
$kullanici = "root";
$parola = "";
$db = "portfoliodb";

$baglanti = mysqli_connect($host, $kullanici, $parola, $db);
mysqli_set_charset($baglanti, "UTF8");

?>