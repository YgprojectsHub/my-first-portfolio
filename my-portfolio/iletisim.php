
<?php
    include('admintabs/baglanti.php');

    $sec= "SELECT * FROM iletisim";
    $sonuc= $baglanti->query($sec);

    if($sonuc->num_rows>0){
        while($cek=$sonuc->fetch_assoc()){
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
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="styles/responsive.css">
    <title>İleti̇şi̇m</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
            <a href="homepage.php" id="logo">Yusufg</a>
            </div>
            <div class="navigation">
                <a href="homepage.php">ANASAYFA</a>
                <a href="hakkimda.php">HAKKIMDA</a>
                <a href="iletisim.php" id="active">İLETİŞİM</a>
            </div>
        </div>
        <div class="main">
            <div class="content1" style= "overflow: hidden;";>
                <div class="b-0 iletisim" style="<?php 
                
                if($aisurl == "TRUE"){
                    echo "background-image: url('$aimg');";
                }
                else{
                    echo "background-image: url('uploads/iletisim/$aimg');";
                }
                
                ;?>"></div>
            </div>
            <div class="content2">
                <div class="b-1 contactformedit" style="margin-top: 300px;">
                    <h1>İLETİŞİM</h1>
                    <form method="POST" class="contact-form">
                        <input type="text" placeholder="İsim" id="kname">
                        <input type="email" placeholder="Email" id="kemail">
                        <input type="text" placeholder="Başlık" id="ksubject">
                        <textarea name="message" maxcols="30" rows="10" placeholder="Mesaj..." id="kbody"></textarea>
                        <button name="contactbtn" type="submit">Gönder</button>
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

<script src=" https://smtpjs.com/v3/smtp.js"></script>
<script>

    const form = document.querySelector(".contact-form");
    form.addEventListener("submit", e => {
    e.preventDefault();
    let name = document.querySelector("#kname").value;
    let email = document.querySelector("#kemail").value;
    let subject = document.querySelector("#ksubject").value;
    let body = document.querySelector("#kbody").value;

    let newbody = body + " ---- "+ email+" Buradan bana ulaşabilirsiniz.";
  
    document.querySelector(".contact-form").reset();

    if( name != "" && email != "" && subject != "" && body != ""){
    sendEmail(subject, newbody);
    }
    else{
        alert("Bilgileri doldurduğunuzdan emin olun.");
    }

  });
  function sendEmail(subject, newbody){
    Email.send({
        
      Host: "smtp.elasticemail.com", 
      Username: "sftwaretests@gmail.com",
      Password: "72CD608B77BBA08F808B1C38C8D81EE09A0F",
      To: "homecargo34@gmail.com",
      From: "sftwaretests@gmail.com",
      Subject: `${subject}`,
      Body: `${newbody}`,
    }).then((success) => {
     
      alert("Mail başarı ile gönderildi mesajınız için teşekkürler.");
    }).catch((error) => {
        
      alert("hay aksi mesaj gönderilirken bir hata oluştu :(");
    })
  }

</script>
    
</body>
</html>