  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit News
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">หัวข้อและเนื้อหา</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php 
                echo form_open_multipart('Dashboard/editNewcontent'); 
                if($this->session->flashdata('msg_success')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success');
                  echo '</div>';
                }
                echo form_error('topic');
                echo form_error('detail');
                echo form_hidden('newsid', $news->news_id);
              ?>
              <div class="form-group">
                <label>หัวข้อ</label>
                <input type="text" class="form-control" name="topic" value="<?php echo $news->news_name; ?>" placeholder="Topic">
              </div>
              <div class="form-group">
                <label>เนื้อหา</label>
                <?php 
                  $datadetail = array(
                    'name'        => 'detail',
                    'value'       => $news->news_detail,
                    'rows'        => '20',
                    'class'       => 'form-control',
                    'placeholder' => 'Detail',
                  );
                  echo form_textarea($datadetail);
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
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">รูปข่าว</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php 
                echo form_open_multipart('Dashboard/editNewspic'); 
                echo form_hidden('newsid', $news->news_id);
                echo isset($errorpic) ? $errorpic : '';
                $img = base_url('assets/upload/news/pic/'.$news->news_file); 
                if($this->session->flashdata('msg_success_pic')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success_pic');
                  echo '</div>';
                }
              ?>
                <img class="img-responsive pad" width=100% src="<?php echo $img; ?>" alt="News Picture">
              <div class="form-group">
                <label>อัพโหลดรูป <?php echo nbs(2); ?><font style="color: red">*ต้องเป็น gif, jpg, png, jpeg เท่านั้น</font></label>
                <?php echo form_upload('pic'); ?>
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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">เอกสารที่เกี่ยวข้อง</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php 
                echo form_open_multipart('Dashboard/editNewsfile');
                echo form_hidden('newsid', $news->news_id);
                echo isset($errorfile) ? $errorfile : '';
                $file = base_url('assets/upload/news/file/'.$news->news_otherfile);
                if($this->session->flashdata('msg_success_file')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success_file');
                  echo '</div>';
                } 
              ?>
              <div class="form-group">
                <label>เอกสารปัจจุบัน <?php echo nbs(2); ?></label><br>
                <?php if ($news->news_otherfile): ?>
                  <a target="_blank" href="<?php echo($file); ?>">
                    <i class="fa fa-download fa-2x" aria-hidden="true"></i>
                  </a> <?php echo nbs(3); echo $news->news_otherfile;?> 
                <?php else: ?>
                  ไม่มีเอกสารแนบ
                <?php endif ?>
              </div>
              <div class="form-group">
                               
              </div>
              <div class="form-group">
                <label>เปลี่ยนเอกสารที่เกี่ยวข้อง <?php echo nbs(5); ?><font style="color: red">*ต้องเป็นไฟล์ประเภทเอกสารเท่านั้น</font></label>
                <?php echo form_upload('pic'); ?>
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
        <!-- ./ col-right -->
      </div>
      <!-- ./ row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->