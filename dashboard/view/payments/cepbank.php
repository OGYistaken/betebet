<?php
  $type = "cepbank";
  $query = $db -> query("SELECT payments.*, banks.name as bank_name from payments left join banks ON payments.bank_id = banks.id where payments.type='$type' order by id DESC");
  $total = $db -> query("SELECT count(id) as num from payments where type='$type'")->fetch_assoc()[num];
  $payment_status = $db -> query("SELECT status from payment_methods where slug = '$type'")->fetch_assoc()["status"];
?>
<script type="text/javascript">
let title = {
  user: 'Kullanıcı',
  sender_phone: 'Gönderici Tel',
  buyer_phone: 'Alıcı Tel',
  buyer_passport: 'Alıcı TC No',
  buyer_passport_date: 'Alıcı TC veriliş',
  buyer_birth: 'Alıcı Doğum',
  referance: 'Referans',
  amount: 'Miktar',
  time: 'Tarih'
};
</script>
<div class="dflex align-center justify-between m-b-15">
  <div>
    <button class="btn btn-danger hidden-xs" onclick="deleteAllData('payments', '<?=$type?>')">Tümünü sil</button>
    <button class="btn btn-default m-l-5" onclick="exportTable('payments','<?=$type?>')">Dışa Aktar</button>
    <button class="btn btn-default m-l-5" onclick="changePaymentStatus('<?=$type?>')"><?=$payment_status ? "Kapalı" : "Açık"?></button>
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
  <div class="panel-head bg-primary text-uppercase text-normal text-600">CepBank İşlemleri</div>
  <div class="simple-table simple-table-primary">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Kullanıcı</th>
          <th>Tarih</th>
          <th>İşlem Tipi</th>
          <th>Tutar</th>
          <th>Durum</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $status = [
            array('title' => 'Bekliyor', 'icon' => 'dot-warning'),
            array('title' => 'Onaylandı', 'icon' => 'dot-success'),
            array('title' => 'İptal Edildi', 'icon' => 'dot-danger')
          ];
          $order = $db -> query("SELECT count(id) as num from payments where type='$type'")->fetch_assoc()[num];
          while ($res = $query -> fetch_assoc()) { ?>
            <tr>
              <td><?=$order?></td>
              <td><?=$res['user']?></td>
              <td><?=explode(' ', $res['time'])[0]?></td>
              <td><?=$res['bank_name']?></td>
              <td><?=$res['amount']?> TL</td>
              <td class="status">
                <div class="dflex align-center">
                  <span class="dot <?=$status[$res['status']]['icon']?> m-r-10"></span>
                  <?=$status[$res['status']]['title']?>
                </div>
              </td>
              <td>
                <ul class="dflex">
                  <?php if ($res['status'] == 0) { ?>
                    <li class="m-l-10 rm"><a href="javascript:;" onclick="changeStatus(<?=$res['id']?>, 1, <?=$res['user_id']?>, <?=$res['amount']?>)" class="btn btn-default btn-sm">Onayla</a></li>
                    <li class="m-l-10 rm"><a href="javascript:;" onclick="changeStatus(<?=$res['id']?>, 2, <?=$res['user_id']?>, <?=$res['amount']?>)" class="btn btn-default btn-sm">İptal Et</a></li>
                  <? } ?>
                  <li class="m-l-10"><a href="javascript:;"  onclick="showDetails(<?=$res['id']?>)"class="btn btn-default btn-sm">İncele</a></li>
                  <li class="m-l-10"><a href="javascript:;" onclick="deleteData('payments', <?=$res['id']?>, this)" class="btn btn-default btn-sm">Sil</a></li>
                </ul>
              </td>
            </tr>
          <? $order--; } ?>
      </tbody>
    </table>
  </div>
</div>
<div class="modal" id="details-modal">
  <div class="modal-content">
    <div class="modal-head">
      <h3 class="text-600 m-y-0">Detaylar</h3>
      <button onclick="closemodal()" class="modal-close"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body p-t-0">
      <ul class="todo-list" id="todo-list"></ul>
    </div>
  </div>
  <div class="modal-overlay"></div>
</div>
