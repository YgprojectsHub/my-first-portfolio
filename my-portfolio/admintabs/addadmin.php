<?php 

$islegal= false;

if($islegal==true){
include('baglanti.php');

$name= "yusufadming";
$password= password_hash("yusuf123",PASSWORD_DEFAULT);
$email= "adming@yusufadminister.com";    

$degistir= "INSERT INTO adminlist (admin_username, email, password) VALUES($name,$email,$password)";
$calistirekle= mysqli_query($baglanti,$degistir);    
}
else{
    echo "Bu sayfayı görüntüleme yetkiniz yoktur";
}

?>
