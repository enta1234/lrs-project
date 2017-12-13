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
    <div class="col-10">
        <?php echo form_open('Register/formRegister'); ?>
        <section class="" id="section1">
            <div class="row form-name">
                <div class="col">
                    <?php echo validation_errors(); ?>
                    <h2 class="display-5 topic-a ">ส่วนที่ ๑ ข้อมูลส่วนบุคคล</h2> <hr>
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
                                        <label >ชื่่อ</label>
                                        <input type="text" name="name" class="form-control" placeholder="ชื่่อ(คำนำหน้า) เช่น นายกรกนก">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label >นามสกุล</label>
                                        <input type="text" name="lastname" class="form-control" placeholder="นามสกุล เช่น กุลกล">
                                    </div>
                                </div>
                                <!-- end row 1 -->
                            </div>
                        </div>
                        <!-- end left form -->
                        <!-- right form -->
                        <div class="col">
                            <div class="form-group">
                                <label >เลขบัตรประจำตัวประชาชน</label>
                                <input type="text" name="idcard" value="<?= $idCard; ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <!-- end right form -->
                    </div>
                    <!-- row 2 -->
                    <div class="row">
                        <!-- col 1 -->
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >วันเกิด</label>
                                        <input type="date" id="birthday" name="birthday" class="form-control" placeholder="วว/ดด/ปป" onchange="submitBday()">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label >อายุ</label>
                                        <input type="text" id="resultBday" name="age" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label >เชื่อชาติ</label>
                                        <input type="text" name="nationalism" class="form-control" placeholder="เชื่อชาติ">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label >สัญชาติ</label>
                                        <input type="text" name="nationality" class="form-control" placeholder="สัญชาติ">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label >ศาสนา</label>
                                        <input type="text" name="religion" class="form-control" placeholder="ศาสนา">
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
                                            <div class="col-2">
                                                <input type="radio" name="status" value="โสด" /> โสด
                                            </div>
                                            <div class="col-3">
                                                <input type="radio" name="status" value="สมรส" /> สมรส
                                            </div>
                                            <div class="col-2">
                                                <input type="radio" name="status" value="หม้าย" /> หม้าย
                                            </div>
                                            <div class="col-2">
                                                <input type="radio" name="status" value="หย่า" /> หย่า
                                            </div>
                                            <div class="col-3">
                                                <input type="radio" name="status" value="แยกกันอยู่" /> แยกกันอยู่
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>ที่อยู่ที่่ติดต่อได้ เลขที่่</label>
                                <input type="text" name="address_number" class="form-control" placeholder="เลขที่่บ้าน" maxlenght="10">
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
                                        <input type="text" name="moo" class="form-control" placeholder="หมู่ที่/ซอย">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>ถนน</label>
                                        <input type="text" name="road" class="form-control" placeholder="ถนน">
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
                                        <input type="text" name="district" class="form-control" placeholder="แขวง/ตําบล">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>เขต/อําเภอ</label>
                                        <input type="text" name="county" class="form-control" placeholder="เขต/อําเภอ">
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
                                        <input type="text" name="province" class="form-control" placeholder="จังหวัด">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>รหัสไปรษณีย์</label>
                                        <input type="text" name="postcode" class="form-control" placeholder="รหัสไปรษณีย์">
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
                                <input type="text" pattern="\d*" maxlength="13" name="phonenumber" class="form-control" placeholder="0981234567">
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
                                        <input type="text" name="bachalor_from" class="form-control" placeholder="สถานศึกษา">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end left form -->
                        <!-- right form -->
                        <div class="col">
                            <div class="form-group">
                                <label >ปีที่สําเร็จการศึกษา </label>
                                <input type="text" name="bachalor_year" pattern="\d*" maxlength="4" class="form-control" placeholder="ปีพ.ศ. เช่น 2560">
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
                                        <input type="text" name="master_form" class="form-control" placeholder="สถานศึกษา">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label >ปีที่สําเร็จการศึกษา </label>
                                    <input type="text" name="master_year" pattern="\d*" maxlength="4" class="form-control" placeholder="ปีพ.ศ. เช่น 2560">
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
                                        <input type="text" name="master_laws_form" class="form-control" placeholder="สถานศึกษา">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label >ปีทีสําเร็จการศึกษา </label>
                                    <input type="text" name="master_laws_year" pattern="\d*" maxlength="4" class="form-control" placeholder="ปีพ.ศ. เช่น 2560">
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
                                        <input type="text" name="certificate_form" class="form-control" placeholder="สถานศึกษา">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label >ปีที่สําเร็จการศึกษา </label>
                                    <input type="text" name="certificate_year" pattern="\d*" maxlength="4" class="form-control" placeholder="ปีพ.ศ. เช่น 2560">
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
                                    <div class="col-4">
                                        <label >เคยเป็นที่ปรึกษาประจำคลินิกยุติธรรม</label>
                                    </div>
                                    <div class="col-1">
                                        <input type="radio" name="ever_work" value="เคย" /> เคย 
                                    </div>
                                    <div class="col-5">
                                        <select name="selclinic" class="form-control js-example-basic-single" id="selectClinic" style="max-width:90%;" disabled>
                                        <option value="0">---- กรุณาเลือก -----</option>
                                            <?php
                                                foreach($getClinic as $clinic){
                                                    echo '<option value="'.$clinic->clinic_id.'>'.$clinic->clinic_name.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input type="radio" name="ever_work" value="ไม่เคย" /> ไม่เคย 
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
                                <div class="row flip">
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
                                                        <input type="text" name="lawyer_career" class="form-control col" placeholder="ประเภทอาชีพทนาย" maxlength="45">
                                                    </div>
                                            </div>
                                            <div class="col">
                                                    <div class="row">
                                                        <label class="same-line-label">ชื่อสํานักงาน </label>
                                                        <input type="text" name="company" class="form-control col" placeholder="ชื่อสํานักงาน" maxlength="45">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>ที่อยู่ </label>
                                                <input type="text" name="company_address" class="form-control" placeholder="ที่อยู่เลขที่">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label>ประสบการณ์เป็นทนายมาแล้วกี่ปี</label>
                                                    </div>
                                                    <div class="row ">
                                                        <input type="text" name="experiencd" placeholder="เช่น 20" class="form-control col-5" pattern="\d*" maxlength="2">
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
                                                        <input type="text" name="past_cases" placeholder="เช่น 70" class="form-control col-5" pattern="\d*" maxlength="5">
                                                        <label class="same-line-label"> คดี </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col ">
                                                <div class="form-group">
                                                    <label>ประเภทคดีที่มีความเชี่ยวชาญ</label>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" name="expert_cases" class="form-control " placeholder="ประเภทคดี"maxlength="45">
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
                                <div class="row flip">
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
                                                        <input type="text" name="retire_date" placeholder="เช่น 2560" class="form-control col-5" pattern="\d*" maxlength="2">
                                                        <label class="same-line-label"> ปี </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>รวมอายุราชการ</label>
                                                    <div class="row ">
                                                        <input type="text" name="governmental_age" placeholder="เช่น 40" class="form-control col-5" pattern="\d*" maxlength="2">
                                                        <label class="same-line-label"> ปี </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>เกษียณอายุราชการในตําแหน่ง</label>
                                                    <div class="row ">
                                                        <input type="text" name="government_position" class="form-control" placeholder="ตำแหน่งที่เกษียณอายุราชการ" maxlength="45">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <div class="row ">
                                                        <input type="text" name="lavel" class="form-control col-6" placeholder="เช่น 4, 5, 7" pattern="\d*" maxlength="2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>สังกัดกรม</label>
                                                    <div class="row ">
                                                        <input type="text" name="departments" class="form-control col-6" placeholder="ชื่อกรมที่สังกัด" maxlength="45">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>กระทรวง</label>
                                                    <div class="row ">
                                                        <input type="text" name="ministry" class="form-control" placeholder="ชื่อกระทรวงที่สังกัด" maxlength="40">
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
                                <div class="row flip">
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
                                                                            <input type="text"id="work_year[0]" name="work_year[0]" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[0]" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[0]" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
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
                                                                            <input type="text" name="work_job[0]"  class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
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
                                                                            <input type="text" name="work_year[1]" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[1]" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[1]" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
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
                                                                            <input type="text" name="work_job[1]" class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
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
                                                                            <input type="text" name="work_year[2]" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[2]" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[2]" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
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
                                                                            <input type="text" name="work_job[2]" class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
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
                                                                            <input type="text" name="work_year[3]" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[3]" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[3]" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
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
                                                                            <input type="text" name="work_job[3]" class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
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
                                                                            <input type="text" name="work_year[4]" maxlength="4" class="form-control col-6" placeholder="ปีที่ทำงาน">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>ตําแหน่ง</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_position[4]" maxlength="45" class="form-control col-10" placeholder="ชื่อตำแหน่งที่ทำ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>หน่วยงาน</label>
                                                                    <div class="row ">
                                                                        <div class="col">
                                                                            <input type="text" name="work_department[4]" maxlength="45" class="form-control col" placeholder="ชื่อหน่วยงาน">
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
                                                                            <input type="text" name="work_job[4]" class="form-control" placeholder="อธิบายลักษณะของงานที่ทำ">
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
<!-- 
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary btn-block add-work-btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- end form -->
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
                                                    <input type="text" name="skill_com_name[1]" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์" >
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_com_level[1]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option>
                                                    </select>
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
                                                    <input type="text" name="skill_com_name[2]" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์">
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_com_level[2]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option>
                                                    </select>
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
                                                    <input type="text" name="skill_com_name[3]" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์">
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_com_level[3]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option>
                                                    </select>
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
                                                    <input type="text" name="skill_com_name[4]" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์">
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_com_level[4]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option>
                                                    </select>
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
                                                    <input type="text" name="skill_com_name[5]" maxlength="45" class="form-control" placeholder="ความสามารถทางคอมพิวเตอร์">
                                                </div>
                                            </div>
                                            <!-- level -->
                                            <div class="col-3 ">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_com_level[5]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option>
                                                    </select>
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
                                                    <input type="text" name="skill_lan_name[1]" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_lan_level[1]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option>
                                                    </select>
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
                                                    <input type="text" name="skill_lan_name[2]" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_lan_level[2]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option></select>
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
                                                    <input type="text" name="skill_lan_name[3]" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_lan_level[3]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option>
                                                        </select>
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
                                                    <input type="text" name="skill_lan_name[4]" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_lan_level[4]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option></select>
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
                                                    <input type="text" name="skill_lan_name[5]" maxlength="45" class="form-control" placeholder="ความสามารถทางภาษา">
                                                </div>
                                            </div>
                                            <!-- lavel -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>ระดับ</label>
                                                    <select name="skill_lan_level[5]" id="">
                                                        <option value="">-- ระดับ --</option>
                                                        <option value="อ่อน">อ่อน</option>
                                                        <option value="ปานกลาง">ปานกลาง</option>
                                                        <option value="เก่ง">เก่ง</option>
                                                        <option value="เก่งมาก">เก่งมาก</option></select>
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
                <button type="reset" class="btn btn-default roud">ยกเลิก</button>
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
    <!-- script -->
    <script src="<?php echo base_url('assets/web/'); ?>assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>popper/popper.min.js"></script>
    <!-- <script type="text/javascript" src="js/SmoothScroll.js"></script>  -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/dashboard/'); ?>select2/js/select2.min.js"></script>
