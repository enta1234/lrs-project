<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/'); ?>rlpd-logo-125x140.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขข้อมูล</title>
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
</head>
<body>
<div class="container-fluid">
  <div class="row ">
    <div class="col-2 slide-step">
        <!-- A vertical navbar -->
        <nav class="navbar fixed-top">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="active nav-link page-scroll" href="#section1"><i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                <a class="nav-link page-scroll" href="#section2"><i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                <a class="nav-link page-scroll" href="#section3"><i class="fa fa-building-o fa-2x" aria-hidden="true"></i></a>
                </li>
                <li class="nav-item">
                <a class="nav-link page-scroll" href="#section4"><i class="fa fa-language fa-2x" aria-hidden="true"></i></a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="col">
        <?php $attributes = array('data-toggle' => 'validator','role'=>'form','id'=>'formregiter'); ?>
        <?= form_open('Register/formRegister', $attributes); ?>
        <section class="" id="section1">
            <div class="row form-name">
                <div class="col">
                    <?php echo validation_errors(); ?>
                    <h2 class="display-5 topic-a ">ส่วนที่ ๑ ข้อมูลส่วนบุคคล</h2> <hr>
                    <input type="hidden" name="information_id" value="<?= $getinid->information_id;?>">
                </div>
            </div>
            <!-- Body form -->
            <div class="row form-body">
                <div class="col">
                    <!--  -->
                    <div class="row">
                        <!-- left form -->
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col form-group">
                                            <label>ชื่อ</label>
                                            <input type="text" name="name" value="<?= $getedit->information_name;?>" class="form-control" placeholder="ชื่่อ" required>
                                        </div>
                                        <div class="col form-group">
                                        <label >นามสกุล</label>
                                        <input type="text" name="lastname" value="<?= $getedit->information_lastname;?>" class="form-control" placeholder="นามสกุล" required>
                                    </div>
                                    </div>
                                </div>
                                <!-- end row 1 -->
                            </div>
                        </div>
                        <!-- end left form -->
                        <!-- right form -->
                        <div class="col-3">
                            <div class="form-group">
                                <label >เลขบัตรประจำตัวประชาชน</label>
                                <input type="text" name="idcarddis" value="<?= $getedit->information_idcard; ?>" pa class="form-control" disabled>
                                <input type="hidden" name="idcard" value="<?= $getedit->information_idcard; ?>" />
                            </div>
                        </div>
                        <!-- end right form -->
                    </div>
                    <!-- row 2 -->
                    <div class="row">
                        <!-- col 1 -->
                        <div class="col">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class=" form-group">
                                        <label >วันเกิด</label>
                                        <div class="row dob">
                                        <?php 
                                            $y = substr($getedit->information_birthday, 0, 4);
                                            $y+=543;
                                            $m = substr($getedit->information_birthday, 5, 2);
                                            $d = substr($getedit->information_birthday, 8, 2);
                                        ?>
                                            <input type="text" id="birthday" value="<?= $d; ?>" name="day" class="form-control col-md-3" pattern="\d*" maxlength="2"  placeholder="วัดเกิด" required>
                                            <?php 
                                                $month = array( 
                                                    ''=>'-- เดือน --',
                                                    '01'=>'มกราคม',
                                                    '02'=>'กุมภาพันธ์',
                                                    '03'=>'มีนาคม',
                                                    '04'=>'เมษายน',
                                                    '05'=>'พฤษภาคม',
                                                    '06'=>'มิถุนายน',
                                                    '07'=>'กรกฎาคม',
                                                    '08'=>'สิงหาคม',
                                                    '09'=>'กันยายน',
                                                    '10'=>'ตุลาคม',
                                                    '11'=>'พฤศจิกายน',
                                                    '12'=>'ธันวาคม'
                                                );
                                                $attm = array(
                                                    'class'=>'form-control selcet-2 col-md-4',
                                                    'required'=>''
                                                );
                                                echo form_dropdown('month', $month, $m, $attm);
                                            ?>
                                                <?php
                                                    $atty = array(
                                                        'class'=>'form-control selcet-2 col-md-4',
                                                        'required'=>'',
                                                        'id'=>'year',
                                                        'onchange'=>'submitBday()'
                                                    );
                                                    $year[''] = '-- ปี --';
                                                    for($i=2490;$i<2561;$i++){
                                                        $year[$i] = $i;
                                                    } 
                                                    echo form_dropdown('year', $year, $y, $atty);
                                                ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>อายุ</label>
                                        <?php 
                                             date("Y-m-d")
                                        ?>
                                        <input type="text" id="resultBdayDis" name="aged" class="form-control" disabled>
                                        <input type="hidden" id="resultBday" name="age" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nationalism" class="control-label">เชื่อชาติ</label>
                                        <input type="text" value="<?= $getedit->information_nationalism;?>" name="nationalism" class="form-control" placeholder="เชื่อชาติ" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nationality" class="control-label">สัญชาติ</label>
                                        <input type="text" value="<?= $getedit->information_nationality;?>" name="nationality" class="form-control" placeholder="สัญชาติ" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="religion" class="control-label">ศาสนา</label>
                                        <input type="text" value="<?= $getedit->information_religion;?>" name="religion" class="form-control" placeholder="ศาสนา" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row 3 -->
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>สถานภาพ</label>
                                        <div class="row">
                                            <div class="col">
                                                <label class="label-radio">
                                                <input type="radio" class="option-input radio" <?php echo set_value('status', $getedit->information_status) == 'โสด' ? "checked" : ""; ?> name="status" required/>
                                                    โสด
                                                </label>
                                                <label class="label-radio">
                                                <input type="radio" class="option-input radio" <?php echo set_value('status', $getedit->information_status) == 'สมรส' ? "checked" : ""; ?> name="status" required/>
                                                    สมรส
                                                </label>
                                                <label class="label-radio">
                                                <input type="radio" class="option-input radio" <?php echo set_value('status', $getedit->information_status) == 'หม้าย' ? "checked" : ""; ?> name="status" required/>
                                                    หม้าย
                                                </label>
                                                <label class="label-radio">
                                                <input type="radio" class="option-input radio" <?php echo set_value('status', $getedit->information_status) == 'หย่า' ? "checked" : ""; ?> name="status" required/>
                                                    หย่า
                                                </label>
                                                <label class="label-radio">
                                                <input type="radio" class="option-input radio" <?php echo set_value('status', $getedit->information_status) == 'แยกกันอยู่' ? "checked" : ""; ?> name="status" required/>
                                                    แยกกันอยู่
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>ที่อยู่ที่ติดต่อได้ เลขที่</label>
                                <input type="text"  value="<?= $getedit->information_address_number;?>" name="address_number" class="form-control" placeholder="เลขที่่บ้าน" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                    <!-- row 4 -->
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>หมู่ที่/ซอย</label>
                                        <input type="text" value="<?= $getedit->information_moo;?>" name="moo" class="form-control" placeholder="หมู่ที่/ซอย" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>ถนน</label>
                                        <input type="text" value="<?= $getedit->information_road;?>" name="road" class="form-control" placeholder="ถนน" required>
                                    </div>
                                </div>
                            <!-- end row 1 -->
                            </div>
                        </div>
                        <!-- end left form -->
                        <!-- right form -->
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>แขวง/ตําบล </label>
                                        <input type="text" value="<?= $getedit->information_district;?>" name="district" class="form-control" placeholder="แขวง/ตําบล" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>เขต/อําเภอ</label>
                                        <input type="text" value="<?= $getedit->information_county;?>" name="county" class="form-control" placeholder="เขต/อําเภอ" required>
                                    </div>
                                </div>
                            <!-- end row 1 -->
                            </div>
                        </div>
                    </div>
                    <!-- row 5 -->
                    <div class="row">
                        <!-- left form -->
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>จังหวัด</label>
                                        <input type="text" value="<?= $getedit->information_province;?>" name="province" class="form-control" placeholder="จังหวัด" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>รหัสไปรษณีย์</label>
                                        <input type="text" value="<?= $getedit->information_postcode;?>" name="postcode" pattern="\d*" maxlength="5" class="form-control" placeholder="รหัสไปรษณีย์" required>
                                    </div>
                                </div>
                                <!-- end row 1 -->
                            </div>
                        </div>
                        <!-- end left form -->
                        <!-- right form -->
                        <div class="col">
                            <div class="form-group">
                                <label >หมายเลขโทรศัพท์ที่สามารถติดต่อได้</label>
                                <input type="text" value="<?= $getedit->information_phonenumber;?>" pattern="\d*" maxlength="10" name="phonenumber" class="form-control" placeholder="0981234567" required   >
                            </div>
                        </div>
                        <!-- end right form -->
                    </div>
                </div>
            </div>
        </section>
        <!-- ---------------------------------------------------------------------------------------------------- -->
        <!-- ------------------------------------       Form register 2        ---------------------------------- -->
        <!-- ------------------------------------       Form register 2        ---------------------------------- -->
        <!-- ---------------------------------------------------------------------------------------------------- -->
        <section class="" id="section2">
            <div class="row form-name">
                <div class="col">
                    <h2 class="display-5 topic-a ">ส่วนที่ ๒ ประวัติการศึกษา</h2> <hr>
                    <input type="hidden" name="graduated_id" value="<?= $getedit->graduated_id;?>">
                </div>
            </div>
            <!-- Body form -->
            <div class="row form-body">
                <div class="col">
                    <!--  -->
                    <div class="row">
                        <!-- left form -->
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label >จบการศึกษานิติศาสตรบัณฑิต จาก </label>
                                        <input type="text" value="<?= $getedit->graduated_bachalor_from;?>" name="bachalor_from" class="form-control" placeholder="สถานศึกษา">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end left form -->
                        <!-- right form -->
                        <div class="col">
                            <div class="form-group">
                                <label >ปีที่สําเร็จการศึกษา </label>
                                <input type="text" value="<?= $getedit->graduated_bachalor_year;?>" name="bachalor_year" pattern="\d*" maxlength="4" class="form-control" placeholder="ปีพ.ศ. เช่น 2560">
                            </div>
                        </div>
                        <!-- end right form -->
                    </div>
                    <!-- row 2 -->
                    <div class="row">
                        <div class="col">
                            <h4 class="display-5 topic-a">คุณสมบัติเพิมเติม (ถ้ามี)</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label >ปริญญาโท</label>
                                        <input type="text" value="<?= $getedit->graduated_master_form;?>" name="master_form" class="form-control" placeholder="สถานศึกษา">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label >ปีที่สําเร็จการศึกษา </label>
                                    <input type="text" value="<?= $getedit->graduated_master_year;?>" name="master_year" pattern="\d*" maxlength="4" class="form-control" placeholder="ปีพ.ศ. เช่น 2560">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label >ประกาศนียบัตรเนติบัณฑิต</label>
                                        <input type="text" value="<?= $getedit->graduated_master_laws_form;?>" name="master_laws_form" class="form-control" placeholder="สถานศึกษา">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label >ปีทีสําเร็จการศึกษา </label>
                                    <input type="text" value="<?= $getedit->graduated_master_laws_year;?>" name="master_laws_year" pattern="\d*" maxlength="4" class="form-control" placeholder="ปีพ.ศ. เช่น 2560">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label >ประกาศนียบัตรว่าความ</label>
                                        <input type="text" value="<?= $getedit->graduated_certificate_form;?>" name="certificate_form" class="form-control" placeholder="สถานศึกษา">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label >ปีที่สําเร็จการศึกษา </label>
                                    <input type="text" value="<?= $getedit->graduated_certificate_year;?>" name="certificate_year" pattern="\d*" maxlength="4" class="form-control" placeholder="ปีพ.ศ. เช่น 2560">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ---------------------------------------------------------------------------------------------------- -->
        <!-- ------------------------------------       Form register 3        ---------------------------------- -->
        <!-- ------------------------------------       Form register 3        ---------------------------------- -->
        <!-- ---------------------------------------------------------------------------------------------------- -->
        <section class="" id="section3">
        <div class="row form-name">
            <div class="col">
                <h2 class="display-5 topic-a ">ส่วนที่ ๓ ประวัติการทำงาน</h2> <hr>
                <input type="hidden" name="work_id" value="<?= $getworkid->work_id;?>">
            </div>
        </div>
        <!-- Body form -->
        <div class="row form-body">
            <div class="col">
            <div class="row">
                    <!-- left form -->
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-4">
                                        <label >เคยเป็นที่ปรึกษาประจำคลินิกยุติธรรม</label>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <label class="label-radio">
                                                <input type="radio" class="option-input radio" value="เคย" name="ever_work"/>
                                                เคย
                                            </label>
                                            <select name="selclinic" class="form-control selcet-2" id="selectClinic" style="max-width:70%;" disabled>
                                            <option value="">---- กรุณาเลือก -----</option>
                                                <?php
                                                    foreach($getClinic as $clinic){
                                                        echo '<option value="'.$clinic->clinic_name.'>'.$clinic->clinic_name.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <label class="label-radio">
                                        <input type="radio" class="option-input radio" value="ไม่เคย" name="ever_work"/>
                                            ไม่เคย
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row 2 -->
                <div class="row">
                    <div class="col">
                        <h4 class="display-5 topic-a">กรุณาระบุประสบการณ์ด้านการทํางาน (เลือกเพียงข้อเดียว)</h4>
                        <p>(ด้านกฏหมายหรือ ด้านคดีในหน่วยงานของรัฐหรือ รัฐวิสาหกิจหรือ องค์กรอิสระตามรัฐธรรมนูญหรือ หน่วยงานเอกชนแล้วไม่น้อยกว่า 10 ปี) </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row flip-head">
                            <div class="col">
                                <div class="row flip flip-1">
                                    <h4>ประเภทคดีที่มีความเชียวชาญ</h4>
                                    <i class="fa fa-plus-circle fa-2x icon-right" aria-hidden="true"></i>
                                    <i class="fa fa-minus-circle fa-2x icon-right" aria-hidden="true" style="display:none"></i>
                                </div>
                                <div class="row panel">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                    <div class="row">
                                                        <label class="same-line-label">ประเภทอาชีพทนาย</label>
                                                        <input type="text" value="<?= $getedit->lawyer_work_lawyer_career;?>" name="lawyer_career" class="form-control col" placeholder="ประเภทอาชีพทนาย" maxlength="45">
                                                    </div>
                                            </div>
                                            <div class="col">
                                                    <div class="row">
                                                        <label class="same-line-label">ชื่อสํานักงาน </label>
                                                        <input type="text" value="<?= $getedit->lawyer_work_company;?>" name="company" class="form-control col" placeholder="ชื่อสํานักงาน" maxlength="45">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>ที่อยู่ </label>
                                                <input type="text" value="<?= $getedit->lawyer_work_company_address;?>" name="company_address" class="form-control" placeholder="ที่อยู่เลขที่">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label>ประสบการณ์เป็นทนายมาแล้วกี่ปี</label>
                                                    </div>
                                                    <div class="row ">
                                                        <input type="text" name="experiencd" value="<?= $getedit->lawyer_work_experiencd;?>" placeholder="เช่น 20" class="form-control col-5" pattern="\d*" maxlength="2">
                                                        <label class="same-line-label"> ปี </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col ">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label>เคยว่าความมาแล้วกี่คดี</label>
                                                    </div>
                                                    <div class="row">
                                                        <input type="text" value="<?= $getedit->lawyer_work_past_cases;?>" name="past_cases" placeholder="เช่น 70" class="form-control col-5" pattern="\d*" maxlength="5">
                                                        <label class="same-line-label"> คดี </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col ">
                                                <div class="form-group">
                                                    <label>ประเภทคดีที่มีความเชี่ยวชาญ</label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" value="<?= $getedit->lawyer_work_expert_cases;?>" name="expert_cases" class="form-control " placeholder="ประเภทคดี"maxlength="45">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row flip-head">
                            <div class="col">
                                <div class="row flip flip-2">
                                    <h4>ประกอบอาชีพรับราชการ</h4>
                                    <i class="fa fa-plus-circle fa-2x icon-right" aria-hidden="true"></i>
                                    <i class="fa fa-minus-circle fa-2x icon-right" aria-hidden="true" style="display:none"></i>
                                </div>
                                <div class="row panel">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>เกษียณอายุ</label>
                                                    <div class="row ">
                                                        <input type="text" value="<?= $getedit->government_work_retire_date;?>" name="retire_date" placeholder="เช่น 2560" class="form-control col-5" pattern="\d*" maxlength="2">
                                                        <label class="same-line-label"> ปี </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>รวมอายุราชการ</label>
                                                    <div class="row ">
                                                        <input type="text" value="<?= $getedit->government_work_governmental_age;?>" name="governmental_age" placeholder="เช่น 40" class="form-control col-5" pattern="\d*" maxlength="2">
                                                        <label class="same-line-label"> ปี </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>เกษียณอายุราชการในตําแหน่ง</label>
                                                    <div class="row ">
                                                        <input type="text" value="<?= $getedit->government_work_position;?>" name="government_position" class="form-control" placeholder="ตำแหน่งที่เกษียณอายุราชการ" maxlength="45">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <div class="row ">
                                                        <input type="text" value="<?= $getedit->government_work_lavel;?>" name="lavel" class="form-control col-6" placeholder="เช่น 4, 5, 7" pattern="\d*" maxlength="2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>สังกัดกรม</label>
                                                    <div class="row ">
                                                        <input type="text" name="departments" value="<?= $getedit->government_work_departments;?>" class="form-control col-6" placeholder="ชื่อกรมที่สังกัด" maxlength="45">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>กระทรวง</label>
                                                    <div class="row ">
                                                        <input type="text" value="<?= $getedit->government_work_ministry;?>" name="ministry" class="form-control" placeholder="ชื่อกระทรวงที่สังกัด" maxlength="40">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row flip-head">
                            <div class="col">
                                <div class="row flip flip-3">
                                    <h4>ประกอบอาชีพทนายความ</h4>
                                    <i class="fa fa-plus-circle fa-2x icon-right" aria-hidden="true"></i>
                                    <i class="fa fa-minus-circle fa-2x icon-right" aria-hidden="true" style="display:none"></i>
                                </div>
                                <div class="row panel">
                                    <!-- start form -->
                                    <h4>สามารถกรอกได้หลายตำแหน่ง</h4>
                                    <div class="col">
                                            
                                        <div class="row">
                                            <div class="col div-selected-work">
                                                <h6>ข้อมูลที่ 1</h6>
                                                <div class="row gb-3">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ปีพ.ศ. </label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" id="work_year[0]" value="<?= $getedit->related_law_work_year0;?>" name="work_year[0]" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[0]" value="<?= $getedit->related_law_work_position0;?>"  maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[0]" value="<?= $getedit->related_law_work_department0;?>" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ลักษณะงานที่ปฏิบัติ</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_job[0]" value="<?= $getedit->related_law_work_job0;?>"  class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- for coppy -->
                                                <h6>ข้อมูลที่ 2</h6>
                                                <div class="row gb-3">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ปีพ.ศ. </label>
                                                                     <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_year[1]" value="<?= $getedit->related_law_work_year1;?>" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[1]" value="<?= $getedit->related_law_work_position1;?>" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[1]" value="<?= $getedit->related_law_work_department1;?>" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ลักษณะงานที่ปฏิบัติ</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_job[1]" value="<?= $getedit->related_law_work_job1;?>" class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- for coppy -->
                                                <h6>ข้อมูลที่ 3</h6>
                                                <div class="row gb-3">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ปีพ.ศ. </label>
                                                                     <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_year[2]" value="<?= $getedit->related_law_work_year2;?>" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[2]" value="<?= $getedit->related_law_work_position2;?>" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[2]" value="<?= $getedit->related_law_work_department2;?>" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ลักษณะงานที่ปฏิบัติ</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_job[2]" value="<?= $getedit->related_law_work_job2;?>" class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- for coppy -->
                                                <h6>ข้อมูลที่ 4</h6>
                                                <div class="row gb-3">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ปีพ.ศ. </label>
                                                                     <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_year[3]" value="<?= $getedit->related_law_work_year3;?>" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[3]" value="<?= $getedit->related_law_work_position3;?>" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[3]" value="<?= $getedit->related_law_work_department3;?>" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ลักษณะงานที่ปฏิบัติ</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_job[3]" value="<?= $getedit->related_law_work_job3;?>" class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- for coppy -->
                                                <h6>ข้อมูลที่ 5</h6>
                                                <div class="row gb-3">
                                                    <div class="col">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ปีพ.ศ. </label>
                                                                     <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_year[4]" value="<?= $getedit->related_law_work_year4;?>" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[4]" value="<?= $getedit->related_law_work_position4;?>" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[4]" value="<?= $getedit->related_law_work_department4;?>" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ลักษณะงานที่ปฏิบัติ</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_job[4]" value="<?= $getedit->related_law_work_job4;?>" class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- ---------------------------------------------------------------------------------------------------- -->
        <!-- ------------------------------------       Form register 4        ---------------------------------- -->
        <!-- ------------------------------------       Form register 4        ---------------------------------- -->
        <!-- ---------------------------------------------------------------------------------------------------- -->
        <section class="" id="section4">
        <div class="row form-name">
            <div class="col">
                <h2 class="display-5 topic-a ">ส่วนที่ ๔ ความสามารถพิเศษ</h2> <hr>
                <input type="hidden" name="skill_person_com_id" value="<?= $getedit->skill_person_com_id;?>">
                <input type="hidden" name="skill_person_lan_id" value="<?= $getedit->skill_person_lan_id;?>">
            </div>
        </div>
        <!-- Body form -->
        <div class="row form-body">
            <div class="col">
                <!--   -->
                <!-- 1 -->
                <!--   -->
                <div class="row">
                    <!-- left form -->
                    <div class="col">
                        <div class="row">
                            <div class="col div-add">
                                <div class="row">
                                    <h4 class="display-5 topic-a">การใช้คอมพิวเตอร์และสื่ออิเล็กทรอนิกส์</h4>
                                </div>
                                <!-- skill data row -->
                                <div class="row">
                                    <div class="col div-selected-skill">
                                        <div class="row gb-1">
                                            <!-- icon -->
                                            <!-- <div class="col-2 icon-delete ">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7 ">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_com_name[1]" value="<?= $getedit->skill_person_com_name0 ;?>"  maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์" >
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        $lave = array( 
                                                            ''=>'-- ระดับ --',
                                                            'อ่อน'=>'อ่อน',
                                                            'ปานกลาง'=>'ปานกลาง',
                                                            'เก่ง'=>'เก่ง',
                                                            'เก่งมาก'=>'เก่งมาก'
                                                        );
                                                        $extra = array(
                                                                'class'=>'form-control');
                                                        echo form_dropdown('skill_com_level[1]', $lave, $getedit->skill_person_com_level0, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- for coppy -->
                                        <div class="row gb-1">
                                            <!-- <div class="col-2">
                                                <button type="button" class="btn btn-danger icon-delete">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7 ">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_com_name[2]" value="<?= $getedit->skill_person_com_name1 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์">
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_com_level[2]', $lave, $getedit->skill_person_com_level1, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gb-1">
                                            <!-- <div class="col-2">
                                                <button type="button" class="btn btn-danger icon-delete">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7 ">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_com_name[3]" value="<?= $getedit->skill_person_com_name2 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์">
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_com_level[3]', $lave, $getedit->skill_person_com_level2, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gb-1">
                                            <!-- <div class="col-2">
                                                <button type="button" class="btn btn-danger icon-delete">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7 ">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_com_name[4]" value="<?= $getedit->skill_person_com_name3 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์">
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_com_level[4]', $lave, $getedit->skill_person_com_level3, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gb-1">
                                            <!-- <div class="col-2">
                                                <button type="button" class="btn btn-danger icon-delete">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7 ">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_com_name[5]" value="<?= $getedit->skill_person_com_name4 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์">
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_com_level[5]', $lave, $getedit->skill_person_com_level4, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- button -->
                                <!-- <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary btn-block add-skill-btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    </div>
                                </div> -->
                            </div>

                            <div class="col">
                                <div class="row">
                                    <h4 class="display-5 topic-a">ความสามารถด้านภาษาต่างประเทศ</h4>
                                </div>
                                <div class="row ">
                                    <div class="col div-selected-language">
                                        <div class="row gb-2">
                                            <!-- icon -->
                                            <!-- <div class="col-2 icon-delete ">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_lan_name[1]" value="<?= $getedit->skill_person_lan_name0 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_lan_level[1]', $lave, $getedit->skill_person_lan_level0, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- for clond -->
                                        <div class="row gb-2">
                                            <!-- icon -->
                                            <!-- <div class="col-2 icon-delete ">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_lan_name[2]" value="<?= $getedit->skill_person_lan_name1 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_lan_level[2]', $lave, $getedit->skill_person_lan_level1, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row gb-2">
                                            <!-- icon -->
                                            <!-- <div class="col-2 icon-delete ">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_lan_name[3]" value="<?= $getedit->skill_person_lan_name2 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_lan_level[3]', $lave, $getedit->skill_person_lan_level2, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gb-2">
                                            <!-- icon -->
                                            <!-- <div class="col-2 icon-delete ">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_lan_name[4]" value="<?= $getedit->skill_person_lan_name3 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_lan_level[4]', $lave, $getedit->skill_person_lan_level3, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gb-2">
                                            <!-- icon -->
                                            <!-- <div class="col-2 icon-delete ">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true">ลบ</i>
                                                </button>
                                            </div> -->
                                            <!-- name -->
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <label>หัวข้อ</label>
                                                    <input type="text" name="skill_lan_name[5]" value="<?= $getedit->skill_person_lan_name4 ;?>" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <?php 
                                                        echo form_dropdown('skill_lan_level[5]', $lave, $getedit->skill_person_lan_level4, $extra);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                    
                                <!-- button -->
                                <!-- <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary btn-block add-language-btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                    </div>
                                </div> -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" for-btn">
        <div class="row">
            <div class="col-10 spac-left ">
                <button type="reset"  class="btn btn-default roud" onclick="location.href = '<?= base_url(); ?>';">ยกเลิก</button>
            </div>
            <div class="col-2 spac-right ">
                <div class="row spac-right">
                    <button type="submit" class="btn btn-info roud">ตกลง</button>
                </div>
            </div>
        </div>
    </section>
    <?= form_close(); ?>
</div>
</div>
</div>
    <!-- script -->
    <script src="<?php echo base_url('assets/web/'); ?>assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>popper/popper.min.js"></script>
    <!-- <script type="text/javascript" src="js/SmoothScroll.js"></script>  -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/dashboard/'); ?>select2/js/select2.min.js"></script>
    <script>
    $('#formregiter').validator()
    // auto show modal
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    
    //slideToggle 
    (function ($) {
        'use strict';
        $('.flip').on("click", function () {
            $(this).next().slideToggle('slow');
            $(this).find('i').toggle();
            $('.panel').not($(this).next()).slideUp('slow');
        });
        $('.flip-1').on("click", function () {
            // 1
            document.getElementsByName('lawyer_career').removeAttribute('disabled', '');
            document.getElementsByName('company').removeAttribute('disabled', '');
            document.getElementsByName('company_address').removeAttribute('disabled', '');
            document.getElementsByName('experiencd').removeAttribute('disabled', '');
            document.getElementsByName('past_cases').removeAttribute('disabled', '');
            document.getElementsByName('expert_cases').removeAttribute('disabled', '');
            // 2
            document.getElementsByName('retire_date').setAttribute('disabled', '');
            document.getElementsByName('governmental_age').setAttribute('disabled', '');
            document.getElementsByName('government_position').setAttribute('disabled', '');
            document.getElementsByName('lavel').setAttribute('disabled', '');
            document.getElementsByName('departments').setAttribute('disabled', '');
            document.getElementsByName('ministry').setAttribute('disabled', '');
            // 3
            document.getElementsByName('work_year[0]').setAttribute('disabled', '');
            document.getElementsByName('work_position[0]').setAttribute('disabled', '');
            document.getElementsByName('work_department[0]').setAttribute('disabled', '');
            document.getElementsByName('work_job[0]').setAttribute('disabled', '');
            document.getElementsByName('work_year[1]').setAttribute('disabled', '');
            document.getElementsByName('work_position[1]').setAttribute('disabled', '');
            document.getElementsByName('work_department[1]').setAttribute('disabled', '');
            document.getElementsByName('work_job[1]').setAttribute('disabled', '');
            document.getElementsByName('work_year[2]').setAttribute('disabled', '');
            document.getElementsByName('work_position[2]').setAttribute('disabled', '');
            document.getElementsByName('work_department[2]').setAttribute('disabled', '');
            document.getElementsByName('work_job[2]').setAttribute('disabled', '');
            document.getElementsByName('work_year[3]').setAttribute('disabled', '');
            document.getElementsByName('work_position[3]').setAttribute('disabled', '');
            document.getElementsByName('work_department[3]').setAttribute('disabled', '');
            document.getElementsByName('work_job[3]').setAttribute('disabled', '');
            document.getElementsByName('work_year[4]').setAttribute('disabled', '');
            document.getElementsByName('work_position[4]').setAttribute('disabled', '');
            document.getElementsByName('work_department[4]').setAttribute('disabled', '');
            document.getElementsByName('work_job[4]').setAttribute('disabled', '');
        });
        $('.flip-2').on("click", function () {
            // disable 1, 3
            // 1
            document.getElementsByName('lawyer_career').setAttribute('disabled', '');
            document.getElementsByName('company').setAttribute('disabled', '');
            document.getElementsByName('company_address').setAttribute('disabled', '');
            document.getElementsByName('experiencd').setAttribute('disabled', '');
            document.getElementsByName('past_cases').setAttribute('disabled', '');
            document.getElementsByName('expert_cases').setAttribute('disabled', '');
            // 2
            document.getElementsByName('retire_date').removeAttribute('disabled', '');
            document.getElementsByName('governmental_age').removeAttribute('disabled', '');
            document.getElementsByName('government_position').removeAttribute('disabled', '');
            document.getElementsByName('lavel').removeAttribute('disabled', '');
            document.getElementsByName('departments').removeAttribute('disabled', '');
            document.getElementsByName('ministry').removeAttribute('disabled', '');
            // 3
            document.getElementsByName('work_year[0]').setAttribute('disabled', '');
            document.getElementsByName('work_position[0]').setAttribute('disabled', '');
            document.getElementsByName('work_department[0]').setAttribute('disabled', '');
            document.getElementsByName('work_job[0]').setAttribute('disabled', '');
            document.getElementsByName('work_year[1]').setAttribute('disabled', '');
            document.getElementsByName('work_position[1]').setAttribute('disabled', '');
            document.getElementsByName('work_department[1]').setAttribute('disabled', '');
            document.getElementsByName('work_job[1]').setAttribute('disabled', '');
            document.getElementsByName('work_year[2]').setAttribute('disabled', '');
            document.getElementsByName('work_position[2]').setAttribute('disabled', '');
            document.getElementsByName('work_department[2]').setAttribute('disabled', '');
            document.getElementsByName('work_job[2]').setAttribute('disabled', '');
            document.getElementsByName('work_year[3]').setAttribute('disabled', '');
            document.getElementsByName('work_position[3]').setAttribute('disabled', '');
            document.getElementsByName('work_department[3]').setAttribute('disabled', '');
            document.getElementsByName('work_job[3]').setAttribute('disabled', '');
            document.getElementsByName('work_year[4]').setAttribute('disabled', '');
            document.getElementsByName('work_position[4]').setAttribute('disabled', '');
            document.getElementsByName('work_department[4]').setAttribute('disabled', '');
            document.getElementsByName('work_job[4]').setAttribute('disabled', '');
        });
        $('.flip-3').on("click", function () {
            // disable 1, 2
            // 1
            document.getElementsByName('lawyer_career').setAttribute('disabled', '');
            document.getElementsByName('company').setAttribute('disabled', '');
            document.getElementsByName('company_address').setAttribute('disabled', '');
            document.getElementsByName('experiencd').setAttribute('disabled', '');
            document.getElementsByName('past_cases').setAttribute('disabled', '');
            document.getElementsByName('expert_cases').setAttribute('disabled', '');
            // 2
            document.getElementsByName('retire_date').setAttribute('disabled', '');
            document.getElementsByName('governmental_age').setAttribute('disabled', '');
            document.getElementsByName('government_position').setAttribute('disabled', '');
            document.getElementsByName('lavel').setAttribute('disabled', '');
            document.getElementsByName('departments').setAttribute('disabled', '');
            document.getElementsByName('ministry').setAttribute('disabled', '');
            // 3
            document.getElementsByName('work_year[0]').removeAttribute('disabled', '');
            document.getElementsByName('work_position[0]').removeAttribute('disabled', '');
            document.getElementsByName('work_department[0]').removeAttribute('disabled', '');
            document.getElementsByName('work_job[0]').removeAttribute('disabled', '');
            document.getElementsByName('work_year[1]').removeAttribute('disabled', '');
            document.getElementsByName('work_position[1]').removeAttribute('disabled', '');
            document.getElementsByName('work_department[1]').removeAttribute('disabled', '');
            document.getElementsByName('work_job[1]').removeAttribute('disabled', '');
            document.getElementsByName('work_year[2]').removeAttribute('disabled', '');
            document.getElementsByName('work_position[2]').removeAttribute('disabled', '');
            document.getElementsByName('work_department[2]').removeAttribute('disabled', '');
            document.getElementsByName('work_job[2]').removeAttribute('disabled', '');
            document.getElementsByName('work_year[3]').removeAttribute('disabled', '');
            document.getElementsByName('work_position[3]').removeAttribute('disabled', '');
            document.getElementsByName('work_department[3]').removeAttribute('disabled', '');
            document.getElementsByName('work_job[3]').removeAttribute('disabled', '');
            document.getElementsByName('work_year[4]').removeAttribute('disabled', '');
            document.getElementsByName('work_position[4]').removeAttribute('disabled', '');
            document.getElementsByName('work_department[4]').removeAttribute('disabled', '');
            document.getElementsByName('work_job[4]').removeAttribute('disabled', '');
        });
    }(jQuery));

    // ------------------------------------------------- low work --------------------------------------------------
    // ------------------------------------------------- low work --------------------------------------------------
    // add work
    var i = 0;
    $('.add-work-btn').click(function () {
        // var gb = ["work_year[0]","work_year[1]","work_year[2]","work_year[3]","work_year[4]"];
        var $clone = $('.div-selected-work').find('div.clond-low-work.gb-3').clone(true).removeClass('clond-low-work');
        $('.div-selected-work').append($clone);
        var name = document.getElementById(gb[i]);
        console.log(i);
        i++;
    });
    // delete work
    $('.icon-delete').click(function () {
        $(this).parents('.gb-3').detach();
    });

    // ------------------------------------------------- language --------------------------------------------------
    // ------------------------------------------------- language --------------------------------------------------
    // add language
    $('.add-language-btn').click(function () {
        var $clone = $('.div-selected-language').find('div.clond-language').clone(true).removeClass('clond-language');
        $('.div-selected-language').append($clone);
    });
    // delete language
    $('.icon-delete').click(function () {
        $(this).parents('.gb-2').detach();
    });
    // ------------------------------------------------- Skill --------------------------------------------------
    // ------------------------------------------------- Skill --------------------------------------------------
    // add skill
    $('.add-skill-btn').click(function () {
        var $clone = $('.div-selected-skill').find('div.clond-skill').clone(true).removeClass('clond-skill');
        $('.div-selected-skill').append($clone);
    });
    // delete skill
    $('.icon-delete').click(function () {
        $(this).parents('.gb-1').detach();
    });

// Page Scroll
jQuery(document).ready(function ($) {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
			|| location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top - 32
				}, 1000);
				return false;
			}
		}
	});
});
    // Fixed Nav
    jQuery(document).ready(function ($) {
        $(window).scroll(function(){
            var scrollTop = 142;
            if($(window).scrollTop() >= scrollTop){
                $('nav').css({
                    position : 'fixed',
                    top : '0'
                });
            }
            if($(window).scrollTop() < scrollTop){
                $('nav').removeAttr('style');	
            }
        })
    
    // Active Nav Link
    $('nav ul li a').click(function(){
            $('nav ul li a').removeClass('active');
            $(this).addClass('active');
        });
    })
    
    // cal age
        function submitBday() {
        var Bdate = document.getElementById('year').value-543;
        var currentTime = new Date();
        var year = currentTime.getFullYear();

        var age = year-Bdate;

        var theBdayDis = document.getElementById('resultBdayDis');
        theBdayDis.setAttribute("value", age);
        console.log(theBdayDis.name+ " : " + age + "currentTime"+year);
        var theBday = document.getElementById('resultBday');
        theBday.setAttribute("value", age);
        console.log(theBday.name+ " : " + age );
    }

    // onChange of radio
    $(document).ready(function(){
        $("input[name='ever_work']").change(function() {
            var ever_work = $('input:radio[name="ever_work"]:checked').val();
            if(ever_work=="ไม่เคย"){
                document.getElementById("selectClinic").setAttribute("disabled","");
            }else{
                document.getElementById("selectClinic").removeAttribute("disabled");
            }
        });
    });

    $(document).ready(function() {
        $(".selcet-2").select2({
            theme: "bootstrap"
        });
    });

</script>
</body>
</html> 