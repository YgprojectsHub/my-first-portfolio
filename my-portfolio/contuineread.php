<?php 

if(isset($_POST['sbm'])){

include('admintabs/baglanti.php');

$sec= "SELECT * FROM hakkimda";
$sonuc= $baglanti->query($sec);

if($sonuc->num_rows>0){
    while($cek=$sonuc->fetch_assoc()){
        $ad= $cek['admin_name'];
        $atext= $cek['admin_text'];
    }
}

}
else{
    header('location:hakkimda.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/cread.css">
    <link rel="stylesheet" href="styles/responsive.css">
    <title>Hakkımda İçeriği</title>
</head>
<body>

<div class="container">
    <div class="navbar">
        <div class="logo">
        <a href="homepage.php" id="logo">Yusufg</a>
        </div>
    </div>

    <div class="content cread">
        <div class="a-1"><h1><?php 
        
        echo "$ad";
        
        ?></h1></div>
        <div class="a-2"><h4><?php 
        
        echo "$atext";
        
        ?></h4></div>
    </div>
</div>
    
    
</body>
</html>