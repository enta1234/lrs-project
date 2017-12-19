<div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">กรอกเลขบัตรประชาชน</h4>
      </div>
      <?= form_open('register/registed'); ?>
      <div class="modal-body">
        <h6><?= validation_errors(); ?></h6>
        <input type="text" name="idcard" id="" pattern="\d*" maxlength="13" class="form-control" placeholder="เช่น 1134567891011" required autofocus>
      </div>
      <div class="modal-footer">
        <button type="reset" onclick="location.href ='<?= base_url(); ?>';" id="myButton"  class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-primary">ตกลง</button>
      </div>
      <?= form_close(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->