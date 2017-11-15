<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url().'Dashboard'; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <?php 
        $logomini = array('src' => 'assets/dashboard/images/RLPD_logo.png','width' => '40.2' , 'height' => '45');               
      ?>
      <span class="logo-mini">
        <?php echo img($logomini); ?>
      </span>
      <!-- logo for regular state and mobile devices -->
      <?php 
        $logolg = array('src' => 'assets/dashboard/images/dashboard-logo.png','width' => '200' , 'height' => '45');               
      ?>
      <span class="logo-lg text-center">
        <?php echo img($logolg); ?>
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <?php 
          if ($User->officer_image == '') {
            $img = base_url('assets/dashboard/images/default_profile.png');
          }else{
            $img = base_url('assets/dashboard/upload/profile/'.$User->officer_image);
          }
        ?>
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $img;?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $User->officer_name.' '.$User->officer_lastname; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $img; ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $User->officer_name.' '.$User->officer_lastname; ?>
                  <small><?php echo ucfirst($User->officer_status); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo anchor('Dashboard/profile', 'Edit Profile', 'class="btn btn-default btn-flat"'); ?>
                </div>
                <div class="pull-right">
                  <?php echo anchor('Dashboard/logout', 'Sign out', 'class="btn btn-default btn-flat"'); ?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>