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
        <link rel="stylesheet" href="<?php echo base_url('assets/register/'); ?>css/select2-bootstrap.min.css">
        <!-- bootstrap Table -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/bootstrap-table.css">

</head>
<body>
<div class="container-fluid">
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
                        <h2 class="display-5 topic-a ">ยืนยันการสมัคร</h2> <hr>
                    </div>
                </div>
                <!-- Body form -->
                <div class="row form-body">
                    <div class="col">
                        <h2>ข้อมูล</h2>
                        <p>เลขบัตรประชาชนท่านคือ <?= $information->information_idcard ?></p>
                        <p>ชื่อ <?= $information->information_name." ".$information->information_lastname; ?></p>
                        <table id="table" 
                        data-toolbar="#toolbar"
                        data-search="true"
                        data-icons-prefix="fa"
                        data-icons="icons"
                        data-show-refresh="true"
                        data-sort-name="registers_id" 
                        data-sort-order="asc"
                        data-pagination="true"
                        data-side-pagination="client"
                        data-page-size="3"
                        data-page-list="[5, 7, 10, 15]"
                        ></table>
                    </div>
                </div>
                <div class="row form-body">
                    <div class="col form-comf border border-info">
                        <section>
                            <div class="row ">
                                <div class="col form-name">
                                    <h3>เลือกเขตคลินิกที่ต้องการสมัคร</h3><h6>
                                    <?php validation_errors();
                                        if ($this->session->flashdata('msg_error_selclinic')) {
                                            echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                            echo $this->session->flashdata('msg_error_selclinic');
                                            echo '</div>';
  						                } ?>
                                    </h6><hr>
                                </div>
                            </div>
                            <div class="row center">
                                <div class="col right">
                                    คลินิก
                                </div>
                                <div class="col-4">
                                <?= form_open('Registed/confirmRegister'); ?>
                                    <input type="hidden" name="idcard" value="<?= $information->information_idcard ?>" />
                                    <select name="selclinic" class="form-control selcet-2" require id="selectClinic">
                                        <option value="">---- กรุณาเลือก -----</option>
                                        <?php
                                            foreach($getClinic as $clinic){
                                                echo '<option value="'.$clinic->clinic_name.'">'.$clinic->clinic_name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col btn-conf">
                                    <button type="submit" class="add-data  btn btn-info roud">ตกลง</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </section>
                    </div>
                </div>
                <section class=" for-btn top">
                    <div class="row">
                        <div class="col-10 spac-left btn-back">
                            <button type="reset"  class="btn btn-default roud" onclick="location.href = '<?= base_url(); ?>';">กลับ</button>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>
</div>

<!-- script -->
<script src="<?php echo base_url('assets/web/'); ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>popper/popper.min.js"></script>
<!-- Font Awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
<!-- <script type="text/javascript" src="js/SmoothScroll.js"></script>  -->
<script src="<?php echo base_url('assets/register/'); ?>js/register-js.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- Bootstrap Table -->
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/bootstrap-table.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/extensions/export/bootstrap-table-export.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/extensions/editable/bootstrap-table-editable.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>bootstraptable/dist/locale/bootstrap-table-th-TH.js"></script>
<!-- Alert2 -->
<script src="https://unpkg.com/sweetalert2@7.0.9/dist/sweetalert2.all.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/dashboard/'); ?>select2/js/select2.min.js"></script>
<!-- customJS -->
<script src="<?php echo base_url('assets/register/'); ?>js/manageregiter.js"></script>
</body>
</html>