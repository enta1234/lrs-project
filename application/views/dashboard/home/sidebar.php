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
        <li class="treeview <?php echo $ac_lawyer.$ac_lawyer70.$ac_lawyerban; ?>">
          <a href="">
            <i class="fa fa-address-book-o fa-lg"></i> 
            <span><?php echo nbs(2); ?>จัดการที่ปรึกษา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $ac_lawyer; ?>" ><?php echo anchor('Dashboard/lawyer','ที่ปรึกษาปัจจุบัน'); ?></li>
            <li class="<?php echo $ac_lawyer70; ?>" ><?php echo anchor('Dashboard/lawyer70','ที่ปรึกษาอายุใกล้ถึง 70 ปี'); ?></li>
            <li class="<?php echo $ac_lawyerban; ?>" ><?php echo anchor('Dashboard/lawyerbanpage','ที่ปรึกษาที่มีสถานะแบล็คลิสต์'); ?></li>
          </ul>
        </li>
        <li class="<?php echo $ac_register; ?>"><a href="<?php echo base_url() ?>Dashboard/register"><i class="fa fa-user fa-lg"></i> <span><?php echo nbs(2); ?>จัดการผู้สมัคร</span></a></li>
        <li class="treeview <?php echo $ac_addnews.$ac_news; ?>">
          <a href="">
            <i class="fa fa-file-text-o fa-lg"></i> 
            <span><?php echo nbs(2); ?>จัดการหน้าเว็บ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $ac_addnews; ?>"><?php echo anchor('Dashboard/addnews','เพิ่มข่าวสาร'); ?></li>
            <li class="<?php echo $ac_news; ?>"><?php echo anchor('Dashboard/news','จัดการข่าวสาร'); ?></li>
          </ul>
        </li>
        <?php if($User->officer_status!='staff'){ ?>
        <li class="treeview <?php echo $ac_addStaff.$ac_staff; ?>">
          <a href="#">
            <i class="fa fa-users fa-lg"></i> 
            <span><?php echo nbs(2); ?>จัดการเจ้าหน้าที่</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $ac_addStaff; ?>"><?php echo anchor('Dashboard/addStaff','เพิ่มเจ้าหน้าที่'); ?></li>
            <li class="<?php echo $ac_staff; ?>"><?php echo anchor('Dashboard/staff','จัดการเจ้าหน้าที่'); ?></li>
          </ul>
        </li>
        <?php } ?>
        <li class="treeview <?php echo $ac_historyregister.$ac_historylawyer; ?>">
          <a href="#">
            <i class="fa fa-history fa-lg"></i> 
            <span><?php echo nbs(2); ?>ประวัติ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $ac_historylawyer; ?>"><?php echo anchor('Dashboard/historyLawyer','ผู้ที่เคยเป็นที่ปรึกษา'); ?></li>
            <li class="<?php echo $ac_historyregister; ?>"><?php echo anchor('Dashboard/historyRegister','ผู้ที่เคยสมัคร'); ?></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>