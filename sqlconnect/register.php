<?php

$conn = new PDO("mysql:host=localhost;dbname=crypto;charset=utf8", "root", "");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(mysqli_connect_errno()){
        echo "1";
        exit();
    }



    //Check
    $username = "mycTest2";
    $password = 123;

    $checkQuery = $conn->query("SELECT username FROM crypto_users WHERE  username='".$username."'")->rowCount();
    if($checkQuery > 0){
        echo '3: Kullanıcı adı zaten kullanılıyor.';
        exit();
    }

    //add

    $salt = "\$5\$rounds=5000\$". "steamedhams". $username ."\$";
    $hash = crypt($password, $salt);

    $AddUser =  $conn->query("INSERT INTO crypto_users (username, hash,salt,score) VALUES ('".$username."', '". $hash ."', '". $salt ."', 0)");
    if(!$AddUser){
        echo 'Kullanıcı oluşturulurken hata oluştu, geliştiriciler ile iletişime geçiniz.';
        die();
    }

 echo $hash;




?>