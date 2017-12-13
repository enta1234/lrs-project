<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/rlpd-logo-125x140.png" type="image/x-icon">
  <meta name="description" content="">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/data-tables/data-tables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>
<!-- nav -->
<section class="menu cid-qyLFvClZQ0" once="menu" id="menu1-m" data-rv-view="1285">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="col-1">
                
            </div>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="#top">
                        <img src="assets/images/rlpd-logo-125x140.png" title="" media-simple="true" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-primary display-4" href="#top">กรมคุ้มครองสิทธิและเสรีภาพ <br>กระทรวงยุติธรรม</a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item dropdown open">
                    <a class="nav-link link text-warning dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="true"><?php echo $clinic; ?></a>
                    <div class="dropdown-menu">
                        <?php foreach($getArea as $a){ ?>
                        <div class="dropdown">
                            <a class="text-warning dropdown-item dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true"> 
                                <?php echo $a->area_name; ?>
                            </a>
                            <div class="dropdown-menu dropdown-submenu"  style="overflow:scroll; height:400px;">
                            <?php foreach($getClinic as $c){ ?>
                                <?php 
                                    if($a->area_id == $c->area_id){ ?>
                                <a class="text-warning dropdown-item display-4" title=<?php echo $c->clinic_name; ?> href="index.html#map1-o" style="width:340px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                    <?php 
                                        echo $c->clinic_name;
                                    ?>
                                </a>
                                <?php } ?>
                            <?php 
                                 } 
                            ?>    
                            </div>
                        </div>
                        <?php 
                            } 
                        ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-warning display-4" href="index.html#table1-s"><?php echo $news; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-warning display-4" href="index.html#footer1-r"><?php echo $contact; ?></a>
                </li>
            </ul>
            <div class="navbar-buttons mbr-section-btn">
                <a class="btn btn-sm btn-primary display-4" href="<?= base_url("register"); ?>"><?php echo $register; ?></a>
            </div>
            <div class="col-2">
                
            </div>
        </div>
    </nav>
</section>
<!-- script -->
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/jarallax/jarallax.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/data-tables/jquery.data-tables.min.js"></script>
  <script src="assets/data-tables/data-tables.bootstrap4.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
<!-- btn-go-top -->
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up">
        <a style="text-align: center;">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
    <input name="animation" type="hidden">
  </body>
</html>