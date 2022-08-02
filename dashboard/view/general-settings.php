<div class="hero">
  <h1 class="text-600">Genel Ayarlar</h1>
  <p class="hidden-xs m-b-0 m-t-20">Sitenin genel ayarlarını buradan düzenleyebilirsiniz</p>
</div>
<div class="page-wrapper">
  <div class="row">
    <div class="col-sm-9">
      <div class="panel">
        <div class="panel-head bg-primary text-uppercase text-normal text-600">Genel Ayarlar</div>
        <form id="form" action="javascript:;" method="post">
          <div class="panel-body">
            <div class="input-group m-b-30">
              <label>Başlık</label>
              <input type="text" class="form-control" name="title" value="<?=$main['title']?>">
            </div>
            <div class="input-group m-b-30">
              <label>Açıklama</label>
              <input type="text" class="form-control" name="description" value="<?=$main['description']?>">
            </div>
            <div class="input-group m-b-30">
              <label>Anahtar Kelimeler</label>
              <input type="text" class="form-control" name="keywords" value="<?=$main['keywords']?>">
            </div>
            <div class="divider m-b-30"></div>
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group m-b-30">
                  <label><?=SYSNAME?> TV</label>
                  <input type="text" class="form-control" name="tv_url" value="<?=$main['tv_url']?>" placeholder="Örnek: http://cratoshdyayin.com/">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group m-b-30">
                  <label>Popup Banner</label>
                  <select class="form-control" name="popup_status">
                    <option value="0">Pasif</option>
                    <option value="1" <?=$main['popup_status'] == 1 ? 'selected' : ''?>>Aktif</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group m-b-30">
                  <label>Popup Resmi Url</label>
                  <input type="text" class="form-control" name="popup_url" value="<?=$main['popup_url']?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group">
                  <label>Telefon Sor</label>
                  <select class="form-control" name="phone_status">
                    <option value="0">Sorma</option>
                    <option value="1" <?=$main['phone_status'] == 1 ? 'selected' : ''?>>Sor</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group">
                  <label>TC Kimlik Sor</label>
                  <select class="form-control" name="passport_status">
                    <option value="0">Sorma</option>
                    <option value="1" <?=$main['passport_status'] == 1 ? 'selected' : ''?>>Sor</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="input-group">
                  <label>Giriş Lokasyonu</label>
                  <select class="form-control" name="location">
                    <option value="0">Ana Sayfa</option>
                    <option value="1" <?=$main['location'] == 1 ? 'selected' : ''?>>Para Yatırma</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="divider m-t-30"></div>
            <div class="input-group m-t-30">
              <label>Admin Login</label>
              <input type="text" class="form-control" name="admin_login" value="<?=$main['admin_login']?>">
            </div>
            <div class="input-group m-t-30">
              <label>Admin Şifre</label>
              <input type="text" class="form-control" name="admin_password" value="<?=$main['admin_password']?>">
            </div>
            <div class="input-group m-t-30">
              <label>Canlı Destek Kodu</label>
              <textarea name="sources" class="form-control" rows="4" cols="80" placeholder="Buraya bir çok script kod ekleyebilirsiniz"><?=$main['sources']?></textarea>
            </div>
          </div>
          <div class="panel-footer">
            <button class="btn btn-default" onclick="save('general')">Kaydet</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-sm-3 hidden-xs">
      <div class="row">
        <div class="col-sm-12">
          <div class="card p-l-15 p-r-15 p-t-20 p-b-20 text-left m-b-15">
            <h2 class="text-primary text-600 m-t-0 m-b-0 m-b-10"><?=$db->query("SELECT count(id) as num from users")->fetch_assoc()['num']?></h2>
            <div class="text-uppercase text-medium text-500">Toplam Kullanıcı</div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="card p-l-15 p-r-15 p-t-20 p-b-20 text-left m-b-15">
            <h2 class="text-primary text-600 m-t-0 m-b-0 m-b-10"><?=$db->query("SELECT count(id) as num from users where device = 'mobile'")->fetch_assoc()['num']?></h2>
            <div class="text-uppercase text-medium text-500">Mobil sürüm kullanan</div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="card p-l-15 p-r-15 p-t-20 p-b-20 text-left m-b-15">
            <h2 class="text-primary text-600 m-t-0 m-b-0 m-b-10"><?=$db->query("SELECT count(id) as num from users where device = 'pc'")->fetch_assoc()['num']?></h2>
            <div class="text-uppercase text-medium text-500">Masaüstü sürüm kullanan</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
