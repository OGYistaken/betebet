<div class="hero">
  <h1 class="text-600">Yatırım Limitleri</h1>
</div>
<div class="page-wrapper">
  <div class="row">
    <div class="col-sm-9">
      <div class="panel">
        <div class="panel-head bg-primary text-uppercase text-normal text-600">Yatırım Limitleri</div>
        <form id="form" action="javascript:;" method="post">
          <div class="panel-body">
            <?php
            $query = $db -> query("SELECT * from limits");
            while ($res = $query->fetch_assoc()) { ?>
              <h5 class="text-capitalize m-b-25"><?=$res['name']?></h5>
              <div class="row">
                <div class="col-sm-6">
                  <div class="input-group m-b-30">
                    <label>Minimum</label>
                    <input type="hidden" name="id[]" value="<?=$res['id']?>">
                    <input type="text" class="form-control" name="minimum[]" value="<?=$res['min']?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group m-b-30">
                    <label>Maksimum</label>
                    <input type="text" class="form-control" name="maximum[]" value="<?=$res['max']?>">
                  </div>
                </div>
              </div>
            <? } ?>
          </div>
          <div class="panel-footer">
            <button class="btn btn-default" onclick="save('update_limits')">Kaydet</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
