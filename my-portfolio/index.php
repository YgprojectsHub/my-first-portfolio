<?php 

include('admintabs/baglanti.php');

$ip =$_SERVER["REMOTE_ADDR"];

$veri_ekle="INSERT INTO visitcount(ip) VALUES ('$ip')";
mysqli_query($baglanti,$veri_ekle);

if($baglanti){
    header("location:homepage.php");
}

?>