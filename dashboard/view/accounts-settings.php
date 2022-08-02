<?php
  $res = $db -> query("SELECT * from accounts where id = 1")->fetch_assoc();
?>
<div class="hero">
  <h1 class="text-600">Hesap Ayarları</h1>
  <p class="hidden-xs m-b-0 m-t-20">Papara, Bitcoin ve diğer hesap bilgilerinizi buradan ayarlayabilirsiniz</p>
</div>
<div class="page-wrapper">
  <div class="row">
    <div class="col-sm-9">
      <div class="panel">
        <div class="panel-head bg-primary text-uppercase text-normal text-600">Hesap Ayarları</div>
        <form id="form" action="javascript:;" method="post">
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="input-group m-b-30">
                  <label>Papara Hesap Sahibi</label>
                  <input type="text" class="form-control" name="papara_holder" value="<?=$res['papara_holder']?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group m-b-30">
                  <label>Papara Hesap Numarası</label>
                  <input type="text" class="form-control" name="papara_number" value="<?=$res['papara_number']?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group m-b-30">
                  <label>Bitcoin Wallet Code</label>
                  <input type="text" class="form-control" name="bitcoin_wallet" value="<?=$res['bitcoin_wallet']?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group m-b-30">
                  <label>Bitcoin QR resmi</label>
                  <input type="text" class="form-control" name="bitcoin_img" value="<?=$res['bitcoin_img']?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group m-b-30">
                  <label>Cmt Hesap Sahibi</label>
                  <input type="text" class="form-control" name="cmt_holder" value="<?=$res['cmt_holder']?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group m-b-30">
                  <label>Cmt Hesap Numarası</label>
                  <input type="text" class="form-control" name="cmt_number" value="<?=$res['cmt_number']?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <label>Payfix Hesap Sahibi</label>
                  <input type="text" class="form-control" name="payfix_holder" value="<?=$res['payfix_holder']?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group">
                  <label>Payfix Cüzdan Numarası</label>
                  <input type="text" class="form-control" name="payfix_number" value="<?=$res['payfix_number']?>">
                </div>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <button class="btn btn-default" onclick="save('accounts')">Kaydet</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
