<?php

$conn = new PDO("mysql:host=localhost;dbname=asfmarine_com_cr;charset=utf8", "asfmarine.com", "%0Z2zr3w9");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(mysqli_connect_errno()){
        echo "1";
        exit();
    }
   
   
    //Check
    $username = $_POST['name'];
    $password = $_POST['password'];



    $checkQuery = $conn->query("SELECT username FROM crypto_users WHERE  username='".$username."'")->rowCount();
    if($checkQuery != 1){
        echo '5: Kullanıcı bulunamadı.';
        exit();
    }

    //Login Attempt

    $logInfo = $conn->query("SELECT * FROM crypto_users WHERE  username='".$username."'")->fetch();

    $salt = $logInfo['salt'];
    $hash = $logInfo['hash'];

    $loginHash = crypt($password, $salt);

    if($hash != $loginHash){
        echo '6: Şifre hatalı!';
        exit();
    }

    echo "0\t". $logInfo['adminLevel'];


?> 