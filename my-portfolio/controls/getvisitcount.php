<?php

    include('baglanti.php');

    $hesapla="SELECT COUNT(id) FROM visitcount";
    $kod=mysqli_query($baglanti,$hesapla);
    
    $yaz=mysqli_fetch_array($kod);
    $vcount= $yaz[0]; 

?>