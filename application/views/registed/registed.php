<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/rlpd-logo-125x140.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สมัครสมาชิก</title>
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/ba567eae7a.css">
	<!-- Bootstrap and css  -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/'); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/'); ?>css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/'); ?>css/bootstrap-reboot.min.css">    
    <link rel="stylesheet" href="<?php echo base_url('assets/register/'); ?>css/main.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>select2/css/select2.css">
</head>
<body>
<div class="container-fluid border border-info">
    <div class="row fullscreen">
        <div class="col-2 slide-step">
            <!-- A vertical navbar -->
            <nav class="navbar fixed-top">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <!-- <a class="active nav-link page-scroll" href="#section1"><i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i></a> -->
                    </li>
                </ul>
            </nav>
        </div>
        <!-- data -->
        <div class="col-10">
            <section class="" id="section1">
                <div class="row form-name">
                    <div class="col">
                        <h2 class="display-5 topic-a ">ยื่นยันการสมัคร (ยังไม่เสร็จ)</h2> <hr>
                    </div>
                </div>
                <!-- Body form -->
                <div class="row form-body">
                    <div class="col">
                        <h2>ข้อมูล</h2>
                        <p>เลขบัตรประชาชนท่านคือ <?= $idCard ?></p>
                        <button type="reset" onclick="location.href ='<?= base_url(); ?>';" id="myButton"  class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>



<!-- script -->
<script src="<?php echo base_url('assets/web/'); ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>popper/popper.min.js"></script>
<!-- <script type="text/javascript" src="js/SmoothScroll.js"></script>  -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/dashboard/'); ?>select2/js/select2.min.js"></script>
</body>

</html>