  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add News
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">เพิ่มข่าวสาร</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php echo form_open_multipart('Dashboard/addnews'); 
                if($this->session->flashdata('msg_success')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success');
                  echo '</div>';
                }
                echo isset($errorpic) ? $errorpic : '';
                echo isset($errorfile) ? $errorfile : '';
                echo validation_errors();              ?>
              <div class="form-group">
                <label>อัพโหลดรูป <?php echo nbs(2); ?><font style="color: red">*ต้องเป็น gif, jpg, png, jpeg เท่านั้น</font></label>
                <?php echo form_upload('pic'); ?>
              </div>
              <div class="form-group">
                <label>หัวข้อ</label>
                <input type="text" style="width: 50%" class="form-control" name="topic" value="<?php echo set_value('topic'); ?>" placeholder="Topic">
              </div>
              <div class="form-group">
                <label>เนื้อหา</label>
                <?php 
                  $datadetail = array(
                    'name'        => 'detail',
                    'value'       => set_value('detail'),
                    'rows'        => '20',
                    'class'       => 'form-control',
                    'placeholder' => 'Detail',
                  );
                  echo form_textarea($datadetail);
                 ?>
              </div>
              <div class="form-group">
                <label>เอกสารที่เกี่ยวข้อง<?php echo nbs(5); ?><font style="color: red">*ต้องเป็นไฟล์ประเภทเอกสารเท่านั้น</font></label>
              </div>
              <div class="form-group">
                <label>
                  <input type="checkbox" name="filestatus" id="filestatus"> ต้องการแนบเอกสาร
                </label>
              </div>
              <div class="form-group">
                <?php 
                  $file = array(
                    'name'        => 'file',
                    'id'        => 'file',
                    'disabled' => 'disabled',
                  );
                  echo form_upload($file); 
                ?>
              </div>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
                <?php 
                    $extra = array(
                            'class'=>'btn btn-info pull-right');
                  echo form_reset('reset','Reset','class="btn btn-default"');
                  echo form_submit('submit', 'Save',$extra); 
                  echo form_close(); 
                ?>
            </div>
            <!-- ./ box-footer -->
          </div>
          <!-- ./ box -->
        </div>
        <!-- ./ col-left -->
      </div>
      <!-- ./ row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->