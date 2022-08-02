<?php
$query = $db -> query("SELECT * from banks order by id DESC");
?>
<div class="hero">
  <h1 class="text-600">Bankalar</h1>
  <p class="hidden-xs m-b-0 m-t-20">Buradan bankaları yönetebilir ve yeni banka ekleyebilirsiniz</p>
</div>
<div class="page-wrapper">
  <div class="m-b-15">
    <button class="btn btn-default" onclick="openmodal('bank-add')">Yeni Banka Ekle</button>
  </div>
  <div class="panel">
    <div class="panel-head bg-primary text-uppercase text-normal text-600">Bankalar</div>
    <div class="simple-table simple-table-primary">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Banka</th>
            <th>Hesap Sahibi</th>
            <th>Hesap Numarası</th>
            <th>Şube Kodu</th>
            <th>Iban</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $order = $db -> query("SELECT count(id) as num from banks")->fetch_assoc()[num];
            while ($res = $query -> fetch_assoc()) { ?>
              <tr>
                <td><?=$order?></td>
                <td><?=$res['name']?></td>
                <td><?=$res['account_holder']?></td>
                <td><?=$res['account_number']?></td>
                <td><?=$res['branch_code']?></td>
                <td><?=$res['iban']?></td>
                <td>
                  <ul class="dflex">
                    <li><a href="javascript:;" onclick="deleteData('banks', <?=$res['id']?>, this)">Sil</a></li>
                  </ul>
                </td>
              </tr>
            <? $order--; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal" id="bank-add">
  <div class="modal-content">
    <div class="modal-head">
      <h3 class="text-600 m-y-0">Banka Ekle</h3>
      <button onclick="closemodal()" class="modal-close"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body p-t-0">
      <form id="form" class="p-l-15 p-r-15 p-b-15" onsubmit="event.preventDefault()">
        <div class="input-group">
          <label>Banka Adı</label>
          <input type="text" class="form-control" name="name" value="">
        </div>
        <div class="input-group m-t-20">
          <label>Hesap Sahibi</label>
          <input type="text" class="form-control" name="account-holder" value="">
        </div>
        <div class="input-group m-t-20">
          <label>Hesap Numarası</label>
          <input type="text" class="form-control" name="account-number" value="">
        </div>
        <div class="input-group m-t-20">
          <label>Şube Kodu</label>
          <input type="text" class="form-control" name="branch-code" value="">
        </div>
        <div class="input-group m-t-20">
          <label>Iban</label>
          <input type="text" class="form-control" name="iban" value="">
        </div>
        <div class="input-group m-t-20">
          <button onclick="addBank()" class="btn btn-default">Onayla</button>
        </div>
      </form>
    </div>
  </div>
  <div class="modal-overlay"></div>
</div>