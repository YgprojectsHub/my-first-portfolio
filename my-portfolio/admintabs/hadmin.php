<?php

session_start();
if(isset($_SESSION["username"])){

include('baglanti.php');
include('../controls/getvisitcount.php');

$sec= "SELECT * FROM hakkimda";
$sonuc= $baglanti->query($sec);

if($sonuc->num_rows>0){
    while($cek=$sonuc->fetch_assoc()){
        $ad= $cek['admin_name'];
        $atext= $cek['admin_text'];
        $aimg= $cek['img'];
    }
}

if(isset($_POST['updatestitle'])){
    $name= $_POST['editadmintitle'];

    if($name != ""){
    $degistir= "UPDATE hakkimda SET admin_name='$name'";
    $calistir= mysqli_query($baglanti, $degistir);
    mysqli_close($baglanti);
    header('location:hadmin.php'); 
    }
    else{
        echo "<script>alert ('Başlık boş bıraklamaz.'); </script>";
    }

}
if(isset($_POST['updatessubject'])){
    $sbj= $_POST['editadminsubject'];

    if($sbj != ""){
    $degistir2= "UPDATE hakkimda SET admin_text='$sbj'";
    $calistir2= mysqli_query($baglanti, $degistir2);
    mysqli_close($baglanti);
    header('location:hadmin.php');
    }
    else{
        echo "<script>alert ('İçerik boş bıraklamaz.'); </script>";
    }

}
if(isset($_POST['updatesimg'])){
    $img= $_POST['editadminimg2'];
    $d_isurl= "TRUE";

    if($img != ""){
    if(endsWith($img,".jpg") || endsWith($img,".png")){
    $degistir3= "UPDATE hakkimda SET img='$img', isurl='$d_isurl'";
    $calistir3= mysqli_query($baglanti, $degistir3);
    mysqli_close($baglanti);
    header('location:hadmin.php');        
    }
    else{
        echo "<script>alert ('Sadece jpg ve png formatı izin verilir.'); </script>";
    }
    }
    else{
        echo "<script>alert ('İçerik boş bıraklamaz.'); </script>";
    }

}

if(isset($_POST["updatesimg3"])){			
    $dosya=$_FILES["editadminimg3"]["name"];
    $d_isurl2= "FALSE";

    if($dosya != ""){
    move_uploaded_file($_FILES["editadminimg3"]["tmp_name"],"../uploads/hakkımda/" . $_FILES["editadminimg3"]["name"]);

    $degistir4= "UPDATE hakkimda SET img='$dosya', isurl='$d_isurl2'";
    $calistir4= mysqli_query($baglanti, $degistir4);
    mysqli_close($baglanti);

    header('location:hadmin.php');        
    }
    else{
        echo "<script>alert('Boş resim gönderilemez.');</script>";
    }
}

}
else{
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles/admin.css">
    <link rel="stylesheet" href="../styles/count.css">
    <link rel="stylesheet" href="../styles/aresponsive.css">
    <title>Hakkımda-Admin Paneli</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="admin.php" id="logo">./Adming</a>
            </div>
            <div class="navigation">
                <a href="admin.php">ANASAYFA</a>
                <a href="hadmin.php" id="active">HAKKIMDA</a>
                <a href="iadmin.php">İLETİŞİM</a>
            </div>
            <div class="logaut">
            <a href="settings.php" style=" color: #202020; padding: 0px 5px;">Ayarlar</a>
            <a href="close_admin.php" style=" color: #202020; padding: 0px 5px;">Çıkış Yap</a>
            </div>
        </div>

        <div class="main">
            <div class="admin-edit">
                <form action="hadmin.php" method="POST">
                <h3>Hakkımda Başlık :</h3>
                <input type="text" name="editadmintitle" id="editadmintitles" class="s-1" style= "padding: 6px 10px;"  value=<?php 
                
                echo "$ad";
                
                ?>>
                <button type="submit" name="updatestitle">Değiştir</button>                    
                </form>
            </div>

            <div class="admin-edit" style="margin-top: 10px;">
                <form action="hadmin.php" method="POST">
                <h3>Hakkımda İçerik :</h3>
                <textarea name="editadminsubject" id="editadminsubject" cols="40" rows="7"  placeholder=<?php 
                
                echo "$atext";
                
                ?>></textarea>
                <button type="submit" name="updatessubject" id="updatessubject">Değiştir</button>                    
                </form>
            </div>

            <div class="admin-edit spcl-edit" style="margin-top: 10px;">
                <form action="hadmin.php" method="POST">
                <h3>(url) Yan Resim :</h3>
                <input type="text" name="editadminimg2" id="editadminimg2" value=<?php 
                
                echo "$aimg";
                ?>>
                <button type="submit" name="updatesimg" id="updatesimg">Değiştir</button>                    
                </form>
            </div>

            <div class="admin-edit" style="margin-top: 10px;">
                <form action="hadmin.php" method="POST" enctype="multipart/form-data">
                <h3>Yan Resim :</h3>
                <input type="file" name="editadminimg3" id="editadminimg3">
                <button type="submit" name="updatesimg3">Değiştir</button>                    
                </form>
            </div>

            <div class="visit_site"  style="margin-top: 1px">
                <a href="../index.php" target="_blank" style="color: #202020; text-decoration: none; border-bottom: 1px solid #202020; padding-bottom: 2px;">Sitenizi ziyaret edin ></a>
            </div>
        </div>
    </div>

    <div id="visited-count">
        <div class="count"><h4>
        <?php 
            
        echo "$yaz[0]";
            
        ?>
        </h4></div>
        <div class="desc"><h4 id="count-desc">Kez Ziyaret edildi !</h4></div>
    </div>
    
</body>
</html>