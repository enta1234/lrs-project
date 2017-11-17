  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
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
              <?php echo form_open('Dashboard/addstaffCheck');
                if($this->session->flashdata('msg_success_profileleft')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success_profileleft');
                  echo '</div>';
                }
                  echo isset($error) ? $error : '';
              ?>
              <div class="form-group">
                <label>ชื่อ</label>
                <?php 
                  echo form_input('name',set_value('name'),'class="form-control" placeholder="Name"');
                ?>
              </div>              
              <div class="form-group">
                <label>นามสกุล</label>
                <?php 
                  echo form_input('lastname',set_value('lastname'),'class="form-control" placeholder="Last Name"');
                ?>
              </div>
              <div class="form-group">
                <label>เลขบัตรประจำตัวประชาชน</label>
                <?php 
                  echo form_input('idcard',set_value('idcard'),'class="form-control" placeholder="ID Card"');
                ?>
              </div>
              <div class="form-group">
                <label>อีเมล</label>
                <?php 
                  echo form_input('email',set_value('email'),'class="form-control" placeholder="E-Mail"');
                ?>
              </div>
              <div class="form-group">
                <label>รหัสผ่าน</label>
                <?php 
                  echo form_input('password',set_value('password'),'class="form-control" placeholder="Password"');
                ?>
              </div>
              <div class="form-group">
                <label>ตำแหน่ง</label>
                <?php 
                $attr = array('' => '--- Please Select ---','superadmin' =>'Super Admin','admin' => 'Admin','staff' => 'Staff');
                  echo form_dropdown('status',$attr, '','class="form-control select2"');
                ?>
              </div>
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
                <?php echo form_reset('reset','Reset','class="btn btn-default"'); ?>
                <?php echo form_submit('submit', 'Save','class="btn btn-info pull-right"'); ?>
              <?php echo form_close(); ?>
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