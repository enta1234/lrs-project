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
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">รูปประจำตัว</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php echo form_open_multipart('Dashboard/updateProfile');
                if($this->session->flashdata('msg_success_profileleft')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success_profileleft');
                  echo '</div>';
                }
                  echo isset($error) ? $error : '';
                $User->officer_image == '' ? $img = base_url('assets/dashboard/images/default_profile.png') : $img = $User->officer_image; ?>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/dashboard/upload/profile/'.$img); ?>" alt="User profile pictur">
                <div class="form-group">
                  <label>อัพโหลดรูปประจำตัว</label>
                  <?php echo form_upload('profile'); ?>
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

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">ข้อมูลส่วนตัว</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php echo form_open('Dashboard/updateInfor');
                echo form_error('firstname');
                echo form_error('lastname');
                echo form_error('idcard');
                if($this->session->flashdata('msg_success_inforleft')) {
                  echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success_inforleft');
                  echo '</div>';
                }
                ?>
                <div class="form-group">
                  <label>ชื่อ</label>
                  <input type="text" class="form-control" name="firstname" value="<?php echo $User->officer_name; ?>" placeholder="First Name">
                </div>
                <div class="form-group">
                  <label>นามสกุล</label>
                  <input type="text" class="form-control" name="lastname" value="<?php echo $User->officer_lastname; ?>" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <label>เลขที่บัตรประชาชน</label>
                  <input type="text" class="form-control" name="idcard" value="<?php echo $User->officer_idcard; ?>" placeholder="ID Card">
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

        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">จัดการรหัสผ่าน</h3>
            </div>
            <!-- ./ box-header -->
            <div class="box-body">
              <?php echo form_open('Dashboard/updatePassword'); 
                echo form_error('password');
                echo form_error('confirmpassword');
                echo form_error('oldpassword');
                if($this->session->flashdata('msg_success_right')) {
                  echo '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_success_right');
                  echo '</div>';
                }
                if($this->session->flashdata('msg_error_right')) {
                  echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                  echo $this->session->flashdata('msg_error_right');
                  echo '</div>';
                }
              ?>
                <div class="form-group">
                  <label>รหัสผ่านใหม่</label>
                  <input type="password" class="form-control" name="password" value="" placeholder="New Password">
                </div>
                <div class="form-group">
                  <label>ยืนยันรหัสผ่านใหม่</label>
                  <input type="password" class="form-control" name="confirmpassword" value="" placeholder="Confirm New Password">
                </div>
                <div class="form-group">
                  <label>รหัสผ่านเก่า</label>
                  <input type="password" class="form-control" name="oldpassword" value="" placeholder="Old Password">
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
        <!-- ./ col-right -->
      </div>
      <!-- ./ row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->