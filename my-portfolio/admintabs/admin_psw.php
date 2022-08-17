<?php

session_start();
if(isset($_SESSION["username"])){

    include('baglanti.php');

    if(isset($_POST['newadminpswbtn'])){

        $lastpsw= $_POST['lastadminpsw'];
        $newpsw= $_POST['newadminpsw'];
        $newretrypsw= $_POST['retrynewadminpsw'];

        if($lastpsw != "" && $newpsw != "" && $newretrypsw != ""){

        $sec= "SELECT * FROM adminlist";
        $sonuc= $baglanti->query($sec);

        if($sonuc->num_rows>0){
        while($cek=$sonuc->fetch_assoc()){
            $apsw= $cek['password'];
        }
        }

        if(password_verify($lastpsw,$apsw)){
        if($newpsw == $newretrypsw){
        $newpassword= password_hash($newpsw,PASSWORD_DEFAULT);

        $degistir= "UPDATE adminlist SET password='$newpassword'";
        $calistir= mysqli_query($baglanti, $degistir);
        mysqli_close($baglanti); 

        echo "<script>alert ('Parolanız başarı ile değiştirildi.'); </script>";

        header('location:admin_psw.php');                   
        }
        else{
            echo "<script>alert ('Yeni Parolanız ile Parola Tekrar Eşleşmiyor.'); </script>";
        }
        }
        else{
            echo "<script>alert ('Eski Parolanız Yanlış.'); </script>";
        }
        }
        else{
            echo "<script>alert ('Bilgileri Doldurunuz.'); </script>";
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
    <link rel="stylesheet" href="../styles/account.css">
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
            <a href="settings.php">İSİM GÜNCELLE</a>
            <a href="admin_psw.php" id="active">PAROLA GÜNCELLE</a>
            </div>
            <div class="logaut">
            <a href="admin.php" style=" color: #202020; padding: 0px 5px;">Admin Paneli</a>
            </div>
        </div>

        <div class="main">

            <div class="admin-edit">
                <form action="admin_psw.php" method="POST">
                <div class="content">
                <input type="text" name="lastadminpsw" style= "display: block; margin-bottom: 10px;" id="editadminpsw1" placeholder="Eski Parola">                        
                </div>

                <div class="content">
                <input type="password" name="newadminpsw" style= "display: block; margin-bottom: 10px;" id="editadminpsw2" placeholder="Yeni Parola">                    
                </div>
                
                <div class="content">
                <input type="password" name="retrynewadminpsw" style= "display: block; margin-bottom: 10px;" id="editadminpsw3" placeholder="Yeni Parola Tekrar">                    
                </div>

                <button type="submit" name="newadminpswbtn">Değiştir</button>
                </form>
            </div>

        </div>

    </div>
</body>
</html>