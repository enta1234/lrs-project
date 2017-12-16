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
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">แก้ไขข่าว</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php
                if($this->session->flashdata('msg_success_left')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success_left');
                  echo '</div>';
                }
                echo form_error('clinic');
                echo form_error('status');
              ?>
              <?php 
                echo form_open('Dashboard/staffditinfo') ;
              ?>
              <div class="form-group">
              	<label>พื้นที่</label>
                <?php 
                  $clinicname[''] = '-- Please Select --';
                    foreach ($allclinic as $clinic) {
                      $clinicname[$clinic->clinic_id] = $clinic->clinic_name;
                    } 
                  $extra = array(
                          'class'=>'form-control select2');
                  echo form_dropdown('clinic', $clinicname, $this->session->userdata['editstaff']['clinic_id'], $extra);
                ?>
              </div>              
              <div class="form-group">
                <label>ตำแหน่ง</label>
                <?php 
                  $attr = array('' => '--- Please Select ---','superadmin' =>'Super Admin','admin' => 'Admin','staff' => 'Staff');
                  echo form_dropdown('status', $attr, $this->session->userdata['editstaff']['officer_status'], 'class="form-control select2"');
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
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">รีเซ็ทรหัสผ่าน</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php 
                echo form_open('Dashboard/staffeditpassword') ;
                echo form_hidden('password', '123456');
                if($this->session->flashdata('msg_success_right')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success_right');
                  echo '</div>';
                }
              ?>
              <div class="form-group">
                <label>รหัสผ่าน <?php echo nbs(2); ?><font style="color: red">*ไม่สามารถกำหนดรหัสผ่านได้</font></label>
                <?php 
                  echo form_input('passworddis','123456','class="form-control" placeholder="123456" disabled');
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
        <!-- ./ col-right -->
      </div>
      <!-- ./ row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->