
<?php

include('admintabs/baglanti.php');
include('controls/textconvert.php');

$sec= "SELECT * FROM hakkimda";
$sonuc= $baglanti->query($sec);

if($sonuc->num_rows>0){
    while($cek=$sonuc->fetch_assoc()){
        $ad= $cek['admin_name'];
        $atext= $cek['admin_text'];
        $aimg= $cek['img'];
        $aisurl= $cek['isurl'];
    }
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
    <link rel="stylesheet" href="styles/responsive.css">
    <title>Hakkımda</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
            <a href="homepage.php" id="logo">Yusufg</a>
            </div>
            <div class="navigation">
                <a href="homepage.php">ANASAYFA</a>
                <a href="hakkimda.php" id="active">HAKKIMDA</a>
                <a href="iletisim.php">İLETİŞİM</a>
            </div>
        </div>
        <div class="main">
            <div class="content1">
                <div class="b-0 hakkimda" style="<?php
                
                if($aisurl == "TRUE"){
                    echo "background-image: url('$aimg');";
                }
                else{
                    echo "background-image: url('uploads/hakkımda/$aimg');";
                }
                
                ?>">

                </div>
            </div>
            <div class="content2">
                <div class="b-1" style= "margin-top: 100px;">
                    <h1><?php 
                    
                    echo "$ad";
                    
                    ?></h1>
                    <form action="contuineread.php" method="POST">
                    <h5 name= "ad" style= "word-wrap: break-word; color: #494949;"><?php 
                    $ddoku= "<button type='submit' name= 'sbm'; style= 'border: none; cursor: pointer; background: transparent;' id='cread'>...Devamını Oku</button>";
                    echo split($atext,50,$ddoku);
                    ?></h5>                     
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">

<div class="b-2">
        <h3>Copyright &copy; 2022</h3>                    
</div>

<div class="b-3">
        <a href="#">by yusufg</a>                    
</div>

<div class="b-4">
        <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
</div>

</footer>
    
</body>
</html>