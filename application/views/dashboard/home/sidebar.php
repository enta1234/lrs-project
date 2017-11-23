  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php 
            if ($User->officer_image == '') {
              $img = base_url('assets/dashboard/images/default_profile.png');
            }else{
              $img = base_url('assets/dashboard/upload/profile/'.$User->officer_image);
            }
          ?>
          <img src="<?php echo $img;?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $User->officer_name.' '.$User->officer_lastname; ?></p>
          <small><?php echo ucfirst($User->officer_status); ?></small>
        </div>
      </div>
      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php echo $ac_home; ?>" ><a href="<?php echo base_url() ?>Dashboard/home"><i class="fa fa-tachometer fa-lg"></i><span><?php echo nbs(2); ?>Dashboard</span></a></li>
        <li><a href=""><i class="fa fa-address-book-o fa-lg"></i> <span><?php echo nbs(2); ?>จัดการที่ปรึกษา</span></a></li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-file-text-o fa-lg"></i> 
            <span><?php echo nbs(2); ?>จัดการหน้าเว็บ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo $ac_addStaff; ?>">
          <a href="#">
            <i class="fa fa-users fa-lg"></i> 
            <span><?php echo nbs(2); ?>จัดการเจ้าหน้าที่</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $ac_addStaff; ?>"><?php echo anchor('Dashboard/addStaff','เพิ่มเจ้าหน้าที่'); ?></li>
            <li class="<?php echo $ac_addStaff; ?>"><?php echo anchor('Dashboard/staff','จัดการเจ้าหน้าที่'); ?></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
