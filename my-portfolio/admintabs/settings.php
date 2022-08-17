<?php

session_start();
if(isset($_SESSION["username"])){

    include('baglanti.php');

    $sec= "SELECT * FROM adminlist";
    $sonuc= $baglanti->query($sec);

    if($sonuc->num_rows>0){
        while($cek=$sonuc->fetch_assoc()){
            $aname= $cek['admin_username'];
        }
    }

    if(isset($_POST['updatesname'])){
        $name= $_POST['editadminnamee'];

        if($name != ""){
        $degistir2= "UPDATE adminlist SET admin_username='$name'";
        $calistir2= mysqli_query($baglanti, $degistir2);
        mysqli_close($baglanti);

        header('location:settings.php');
        }
        else{
            echo "<script>alert ('Kullanıcı Etiketi boş bıraklamaz.'); </script>";
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
                <a href="settings.php snav" id="active">İSİM GÜNCELLE</a>
                <a href="admin_psw.php">PAROLA GÜNCELLE</a>
            </div>
            <div class="logaut">
            <a href="admin.php" style=" color: #202020; padding: 0px 5px;">Admin Paneli</a>
            </div>
        </div>

        <div class="main">
            <div class="admin-edit">
                <form action="settings.php" method="POST">
                <label for="editadminname">Admin İsmi :</label>
                <input type="text" name="editadminnamee" id="editadminname" value=<?php 
                
                echo "$aname";
                
                ?>>
                <button type="submit" name="updatesname">Değiştir</button>                    
                </form>
            </div>
        </div>

    </div>
</body>
</html>