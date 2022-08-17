
<?php 

if(isset($_POST['loginus'])){
    include('admintabs/baglanti.php');

    $name= $_POST['adminname'];
    $pswww= $_POST['adminpsw'];

    $secimm= "SELECT * FROM adminlist WHERE admin_username ='$name'";
    $calistirr= mysqli_query($baglanti, $secimm);
    $kayitnumm= mysqli_num_rows($calistirr);

    if($kayitnumm>0){

        $ilgilikayitt= mysqli_fetch_assoc($calistirr);
        $hash_passs= $ilgilikayitt["password"];
        $admin_name= $ilgilikayitt["admin_username"];

        if($hash_passs != "" && $admin_name != ""){
        if(password_verify($pswww,$hash_passs) && $name==$admin_name){
            session_start();
            $_SESSION['username']=$ilgilikayitt['admin_username'];
            $_SESSION['email']=$ilgilikayitt['email'];
            header('location:admintabs/admin.php');
        }
        else{
            echo "<script>alert ('Bilgiler Yanlış.'); </script>";
        }
        }
        else{
            echo "<script>alert ('Bilgiler Boş bırakılamaz.'); </script>"; 
        }
    }
    else{
        echo "<script>alert ('Admin Hesabı Bulunamamaktadır.'); </script>";
    }
}
else{

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/alogin.css">
    <title>Admin Giriş Paneli</title>
</head>
<body>
    <div class="container">
        <h3>Admin paneline ulaşmak için giriş yap</h3>
        <form action="admin_login.php"  method="POST">
            <label for="adminnameid">Admin adı :</label>
            <input type="text" name="adminname" id="adminname">
            <label for="adminpswid">Parola :</label>
            <input type="password" name="adminpsw" id="adminpswid">
            <button type="submit" name="loginus">Giriş yap</button>
        </form>
    </div>
</body>
</html>