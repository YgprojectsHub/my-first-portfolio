<?php

session_start();
if(isset($_SESSION["username"])){
    include('baglanti.php');
    include('../controls/getvisitcount.php');
    include('../controls/urlcontrol.php');
    
        $sec= "SELECT * FROM anasayfa";
        $sonuc= $baglanti->query($sec);
    
        if($sonuc->num_rows>0){
            while($cek=$sonuc->fetch_assoc()){
                $ad= $cek['admin_name'];
                $atag= $cek['admin_tag'];
                $aimg= $cek['img'];
            }
        }
    
        if(isset($_POST['updatesname'])){
            $name= $_POST['editadminname'];
    
            if($name != ""){
            $degistir= "UPDATE anasayfa SET admin_name='$name'";
            $calistir= mysqli_query($baglanti, $degistir);
            mysqli_close($baglanti);
    
            header('location:admin.php');
            }
            else{
                echo "<script>alert ('Kullanıcı ismi boş bıraklamaz.'); </script>";
            }
        }
    
        else if(isset($_POST['updatestag'])){
            $tag= $_POST['editadmintag'];
    
            if($tag != ""){
            $degistir2= "UPDATE anasayfa SET admin_tag='$tag'";
            $calistir2= mysqli_query($baglanti, $degistir2);
            mysqli_close($baglanti);
    
            header('location:admin.php');
            }
            else{
                echo "<script>alert ('Kullanıcı Etiketi boş bıraklamaz.'); </script>";
            }
        }
    
        else if(isset($_POST['updatesimg'])){
            $img= $_POST['editadminimg'];
            $d_isurl= "TRUE";
        
            if($img != ""){
            if(endsWith($img,".jpg") || endsWith($img,".png")){
            $degistir3= "UPDATE anasayfa SET img='$img', isurl='$d_isurl'";
            $calistir3= mysqli_query($baglanti, $degistir3);
            mysqli_close($baglanti);
            header('location:admin.php');             
            }
            else{
                echo "<script>alert ('Sadece jpg ve png formatı izin verilir.'); </script>";
            }
            }
            else{
                echo "<script>alert ('İçerik boş bıraklamaz.'); </script>";
            }
        
        }
    
        else if(isset($_POST["updatesimg2"])){		
            $dosya=$_FILES["editadminimg2"]["name"];
            $d_isurl2= "FALSE";
    
            if($dosya != ""){
            move_uploaded_file($_FILES["editadminimg2"]["tmp_name"],"../uploads/anasayfa/" . $_FILES["editadminimg2"]["name"]);	
    
            $degistir4= "UPDATE anasayfa SET img='$dosya', isurl='$d_isurl2'";
            $calistir4= mysqli_query($baglanti, $degistir4);
            mysqli_close($baglanti);
    
            header('location:admin.php');
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
    <title>Anasayfa-Admin Paneli</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="admin.php" id="logo">./Adming</a>
            </div>
            <div class="navigation">
                <a href="admin.php" id="active">ANASAYFA</a>
                <a href="hadmin.php">HAKKIMDA</a>
                <a href="iadmin.php">İLETİŞİM</a>
            </div>
            <div class="logaut">
            <a href="settings.php" style=" color: #202020; padding: 0px 5px;">Ayarlar</a>
            <a href="close_admin.php" style=" color: #202020; padding: 0px 5px;">Çıkış Yap</a>
            </div>
        </div>

        <div class="main">
            <div class="admin-edit" style="margin-top: 20px;">
                <form action="admin.php" method="POST">
                <h3>Kullanıcı İsmi :</h3>
                <input type="text" name="editadminname" id="editadminname" value=<?php 
                
                echo "$ad";
                
                ?>>
                <button type="submit" name="updatesname">Değiştir</button>                    
                </form>
            </div>

            <div class="admin-edit" style="margin-top: 20px;">
                <form action="admin.php" method="POST">
                <h3>Etiket İsmi :</h3>
                <input type="text" name="editadmintag" id="editadmintag" value=<?php 
                
                echo "$atag";
                
                ?>>
                <button type="submit" name="updatestag">Değiştir</button>                    
                </form>
            </div>

            <div class="admin-edit" style="margin-top: 20px;">
                <form action="admin.php" method="POST" enctype="multipart/form-data">
                <h3>(url) Yan resim :</h3>
                <input type="text" name="editadminimg" id="editadminimg" value=<?php 
                
                echo "$aimg";
                
                ?>>
                <button type="submit" name="updatesimg">Değiştir</button>                    
                </form>
            </div>

            <div class="admin-edit" style="margin-top: 20px;">
                <form action="admin.php" method="POST" enctype="multipart/form-data">
                <h3>Yan resim :</h3>
                <input type="file" name="editadminimg2" id="editadminimg2">
                <button type="submit" name="updatesimg2">Değiştir</button>                    
                </form>
            </div>
            
            <div class="visit_site" style="margin-top: 10px">
                <a href="../index.php" target="_blank" style="color: #202020; text-decoration: none; border-bottom: 1px solid #202020; padding-bottom: 3px;">Sitenizi ziyaret edin ></a>
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