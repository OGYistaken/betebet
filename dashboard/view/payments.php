<div class="hero">
  <h1 class="text-600">Ödemeler</h1>
  <p class="hidden-xs m-b-0 m-t-20">Buradan gelen ödemeleri görebilir ve kontrol edebilirsiniz</p>
</div>
<div class="page-wrapper">
  <?php
    $type = $_GET['type'] ? $_GET['type'] : "cepbank";
    include 'view/payments/'.$type.'.php';
  ?>
    <script>
    for(let el of $('.simple-table.simple-table-primary tr')){
        $(el).find('td:last-child>ul').prepend('<li class="m-l-10"><a href="javascript:;" onclick="changeBalance(\''+$(el).find('td:nth-child(2)').text().trim()+'\')" class="btn btn-default btn-sm">Bakiye Ekle</a></li>');
    }
  </script>
</div>
