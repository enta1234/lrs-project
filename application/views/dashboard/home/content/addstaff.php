  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Officer
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">เพิ่มเจ้าหน้าที่</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php 
                if($this->session->flashdata('msg_success')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success');
                  echo '</div>';
                }
                if ($this->session->flashdata('msg_error')) {
                  echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_error');
                  echo '</div>';
                }
                echo validation_errors();
                if ($User->officer_status == 'superadmin') {
                echo form_open('Dashboard/checkArea');
              ?>
              <div class="form-group">
                <label>พื้นที่รับผิดชอบ</label>
                <?php 
                  $areaname[] = '-- Please Select --';
                  foreach ($getArea as $area) {
                    $areaname[$area->area_id] = $area->area_name;
                  }
                  $extra = array(
                          'class'=>'form-control select2', 
                          'onchange'=>'this.form.submit();');
                  echo form_dropdown('area',$areaname, set_value('area'), $extra);
                  echo form_close();
                ?>
              </div>
              <?php }
                echo form_open('Dashboard/addStaff') ;
                echo form_hidden('check', 'checked');
                echo form_hidden('area', set_value('area'));
                echo form_hidden('password', '123456');
              ?>
              <?php if($User->officer_status == 'superadmin'){ ?>
              <div class="form-group">
                <label>คลินิก <?php echo nbs(2); ?><font style="color: red">*กรุณาเลือกพื้นที่ก่อน</font></label>
                <?php 
                  $clinicname[''] = '-- Please Select --';
                  if($checkArea!=FALSE){
                    foreach ($checkArea as $clinic) {
                      $clinicname[$clinic->clinic_id] = $clinic->clinic_name;
                    } 
                  }
                  $extra = array(
                          'class'=>'form-control select2',
                          $disabled =>'');
                  echo form_dropdown('clinic', $clinicname, set_value('clinic'), $extra);
                ?>
              </div>   
              <?php }else{ ?>  
              <div class="form-group">
                <label>พื้นที่</label>
                <?php 
                  $clinicname[''] = '-- Please Select --';
                    foreach ($checkArea as $clinic) {
                      $clinicname[$clinic->clinic_id] = $clinic->clinic_name;
                    } 
                  $extra = array(
                          'class'=>'form-control select2');
                  echo form_dropdown('clinic', $clinicname, set_value('clinic'), $extra);
                ?>
              </div>
              <?php } ?>       
              <div class="form-group">
                <label>ตำแหน่ง</label>
                <?php 
                  if ($User->officer_status == 'superadmin') {
                    $attr = array('' => '--- Please Select ---','superadmin' =>'Super Admin','admin' => 'Admin','staff' => 'Staff');
                  }else{
                    $attr = array('staff' => 'Staff');
                  }
                  echo form_dropdown('status', $attr, set_value('status'), 'class="form-control select2"');
                ?>
              </div>
              <div class="form-group">
                <label>ชื่อ</label>
                <?php 
                  echo form_input('name', set_value('name'),'class="form-control" placeholder="Name"');
                ?>
              </div>              
              <div class="form-group">
                <label>นามสกุล</label>
                <?php 
                  echo form_input('lastname', set_value('lastname'),'class="form-control" placeholder="Last Name"');
                ?>
              </div>
              <div class="form-group">
                <label>เลขบัตรประจำตัวประชาชน</label>
                <?php 
                  echo form_input('idcard', set_value('idcard'),'class="form-control" placeholder="ID Card"');
                ?>
              </div>
              <div class="form-group">
                <label>อีเมล</label>
                <?php 
                  echo form_input('email', set_value('email'),'class="form-control" placeholder="E-Mail"');
                ?>
              </div>
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
                  if($User->officer_status == 'superadmin'){
                    $extra = array(
                            'class'=>'btn btn-info pull-right',
                            $disabled =>'');
                  }else{
                    $extra = array(
                            'class'=>'btn btn-info pull-right');
                  }
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