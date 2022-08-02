<?php
$conn = new PDO("mysql:host=localhost;dbname=asfmarine_com_cr;charset=utf8", "asfmarine.com", "%0Z2zr3w9");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(mysqli_connect_errno()){
        echo "1";
        exit();
    }
   

    $kills = $_POST['kills'];
    $assits = $_POST['assits'];
    $death = $_POST['death'];
    $name = $_POST['name'];

    $checkUsername = $conn->query("SELECT * FROM crypto_users WHERE username='".$name."'")->fetch();

    if(!$checkUsername['username']){
        echo '5: Hesap bulunamadı veri kayıt başarısız.';
        exit();
    }

    $insertData = $conn->query("INSERT INTO crypto_match (Name,kills,assits,death) VALUES ('".$name."', '".$kills."', '".$assits."', '".$death."')");

    if($insertData){
        echo '0\t';
    }






?>