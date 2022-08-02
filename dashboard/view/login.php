<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/css/reset.min.css">
    <link rel="stylesheet" href="assets/css/<?=$theme?>.css">
  </head>
  <body>
    <div class="login-panel">
      <div class="panel">
        <div class="panel-head text-uppercase text-tall text-600 p-t-30">Admin Panel</div>
        <form id="form" action="javascript:;">
          <div class="panel-body">
            <div class="input-group">
              <label>Kullanıcı Adı</label>
              <input type="text" class="form-control" name="login" value="">
            </div>
            <div class="input-group m-t-30">
              <label>Şifre</label>
              <input type="password" class="form-control" name="password" value="">
            </div>
          </div>
          <div class="panel-footer">
            <button type="submit" class="btn btn-primary" onclick="logIn()">Giriş Yap</button>
          </div>
        </form>
      </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
  </body>
</html>
