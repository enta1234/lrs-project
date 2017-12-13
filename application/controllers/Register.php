<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html','array','date','form'));
		$this->load->library('form_validation');
		$this->load->model('Register_form','register');
	}

	public function index()
	{
		$getData['idCard'] = "";
		$this->load->view('register/register-head',$getData);
		$this->load->view('register/register-modal');
		$this->load->view('register/register-form');
        $this->load->view('register/register-js');
	}

	public function check_idcard(){
		$this->load->view('register/register-head');
		$this->form_validation->set_rules('idcard', 'เลขบัตรประชาชน', 'required|is_natural|callback_valid_citizen_id');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
		
		if ($this->form_validation->run()) {
			$idcard = $this->input->post('idcard');
			$getData['idCard'] = "";
			$check = $this->register->_checkIdcard('$idcard');
			if($check){
				redirect('Welcome'); //change redirect to resulf page
			}else{
				$getData['getClinic'] = $this->register->_getClinic();
				$getData['idCard'] = $idcard;
				$this->load->view('register/register-head',$getData);	
				$this->load->view('register/register-form');
				$this->load->view('register/register-js');
			}
		}else{
			$getData['idCard'] = "";
			$this->load->view('register/register-head',$getData);
			$this->load->view('register/register-modal');
			$this->load->view('register/register-form');
			$this->load->view('register/register-js');
		}
		
	}

	public function formRegister(){
		// Infomation
		$this->form_validation->set_rules('name', 'ชื่อ', 'required|max_length[30]');
		$this->form_validation->set_rules('lastname', 'นามสกุล', 'required|max_length[30]');
		$this->form_validation->set_rules('idcard', 'เลขบัตรประชาชน', 'required|is_natural|callback_valid_citizen_id');
		$this->form_validation->set_rules('birthday', 'วันเกิด', 'required');
		$this->form_validation->set_rules('resultBday', 'อายุ', 'required|is_natural|callback_valid_age');
		$this->form_validation->set_rules('nationalism', 'เชื่อชาติ', 'required|max_length[10]');
		$this->form_validation->set_rules('nationality', 'สัญชาติ', 'required|max_length[10]');
		$this->form_validation->set_rules('religion', 'ศาสนา', 'required|max_length[10]');
		$this->form_validation->set_rules('status', 'สถานภาพ', 'required');
		$this->form_validation->set_rules('address_number', 'ที่อยู่', 'required|max_length[10]');
		$this->form_validation->set_rules('moo', 'หมู่ที/ซอย', 'max_length[10]');
		$this->form_validation->set_rules('road', 'ถนน', 'max_length[50]');
		$this->form_validation->set_rules('district', 'แขวง/ตําบล', 'required|max_length[50]');
		$this->form_validation->set_rules('county', 'เขต/อําเภอ', 'required|max_length[50]');
		$this->form_validation->set_rules('province', 'จังหวัด', 'required|max_length[25]');
		$this->form_validation->set_rules('postcode', 'รหัสไปรษณีย์', 'required|max_length[5]|is_natural');
		$this->form_validation->set_rules('phonenumber', 'หมายเลขโทรศัพท์ที่สามารถติดต่อได้', 'required|max_length[10]|is_natural');
		// graduated
		$this->form_validation->set_rules('bachalor_from', 'จบการศึกษานิติศาสตรบัณฑิต', 'required|max_length[50]');
		$this->form_validation->set_rules('bachalor_year', 'ปีที่สําเร็จการศึกษา', 'required|max_length[4]|is_natural');
		$this->form_validation->set_rules('master_form', 'ปริญญาโท', 'max_length[50]');
		$this->form_validation->set_rules('bachalor_year', 'ปีที่สําเร็จการศึกษา', 'max_length[4]|is_natural');
		$this->form_validation->set_rules('master_laws_form', 'ประกาศนียบัตรเนติบัณฑิต', 'max_length[50]');
		$this->form_validation->set_rules('master_laws_year', 'ปีที่สําเร็จการศึกษา', 'max_length[4]|is_natural');
		$this->form_validation->set_rules('certificate_form', 'ประกาศนียบัตรว่าความ', 'max_length[50]');
		$this->form_validation->set_rules('certificate_year', 'ปีที่สําเร็จการศึกษา', 'max_length[4]|is_natural');
		// work history
		$this->form_validation->set_rules('ever_work', 'เคยเป็นที่่ปรึกษาประจำคลินิกยุติธรรม', 'required');
		$this->form_validation->set_rules('selclinic', 'คลินิกที่ประจำอยู่', 'required');
		// lawyer_work
		$this->form_validation->set_rules('lawyer_work', 'ประเภทอาชีพทนาย', 'max_length[45]');
		$this->form_validation->set_rules('company', 'ประเภทอาชีพทนาย', 'max_length[45]');
		$this->form_validation->set_rules('experiencd', 'ประสบการณ์เป็นทนายมาแล้วกี่ปี', 'max_length[2]');
		$this->form_validation->set_rules('past_cases', 'เคยว่าความมาแล้วกี่คดี', 'max_length[5]');
		$this->form_validation->set_rules('expert_cases', 'ประเภทคดีที่มีความเชี่ยวชาญ', 'max_length[45]');
		// set_message
		$this->form_validation->set_message('required','กรุณากรอก "%s"');
		$this->form_validation->set_message('exact_length','"%s" ต้องมี 13 หลัก');
		$this->form_validation->set_message('max_length','"%s" ยาวเกินไป');
		$this->form_validation->set_message('is_natural','"%s" ต้องเป็นตัวเลขเท่านั้น');
		$this->form_validation->set_message('valid_email','รูปแบบของ "%s" ไม่ถูกต้อง');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');

		if ($this->form_validation->run()) {
			// set information get data form post
			$information['information_name'] = $this->input->post('name');
			$information['information_lastname'] = $this->input->post('lastname');
			$information['information_birthday'] = $this->input->post('birthday');
			$information['information_age'] = $this->input->post('resultBday');
			$information['information_idcard'] = $this->input->post('idcard');
			$information['information_nationalism'] = $this->input->post('nationalism');
			$information['information_nationality'] = $this->input->post('nationality');
			$information['information_religion'] = $this->input->post('religion');
			$information['information_status'] = $this->input->post('status');
			$information['information_address_number'] = $this->input->post('address_number');
			$information['information_moo'] = $this->input->post('moo');
			$information['information_road'] = $this->input->post('road');
			$information['information_district'] = $this->input->post('district');
			$information['information_county'] = $this->input->post('county');
			$information['information_province'] = $this->input->post('province');
			$information['information_postcode'] = $this->input->post('postcode');
			$information['information_phonenumber'] = $this->input->post('phonenumber');

			// set graduated get data form post
			$graduated['graduated_bachalor_from'] = $this->input->post('bachalor_from');
			$graduated['graduated_bachalor_year'] = $this->input->post('bachalor_year');
			$graduated['graduated_master_form'] = $this->input->post('master_form');
			$graduated['graduated_master_year'] = $this->input->post('master_year');
			$graduated['graduated_master_laws_form'] = $this->input->post('master_laws_form');
			$graduated['graduated_master_laws_year'] = $this->input->post('master_laws_year');
			$graduated['graduated_certificate_form'] = $this->input->post('certificate_form');
			$graduated['graduated_certificate_year'] = $this->input->post('certificate_year');

			// set work get data form post
			$work['work_every'] = $this->input->post('ever_work');
			$work['clinic_id'] = $this->input->post('selclinic');

			// set lawyer_work get data form post
			$lawyer_work['lawyer_work_lawyer_career'] = $this->input->post('lawyer_career');
			$lawyer_work['lawyer_work_company'] = $this->input->post('company');
			$lawyer_work['lawyer_work_company_address'] = $this->input->post('company_address');
			$lawyer_work['lawyer_work_experiencd'] = $this->input->post('experiencd');
			$lawyer_work['lawyer_work_past_cases'] = $this->input->post('past_cases');
			$lawyer_work['lawyer_work_expert_cases'] = $this->input->post('expert_cases');
			// set government_work get data form post
			$government_work['government_work_retire_date'] = $this->input->post('selclinic');
			$government_work['government_work_governmental_age'] = $this->input->post('selclinic');
			$government_work['government_work_position'] = $this->input->post('selclinic');
			$government_work['government_work_lavel'] = $this->input->post('selclinic');
			$government_work['government_work_departments'] = $this->input->post('selclinic');
			$government_work['government_work_ministry'] = $this->input->post('selclinic');

			// send to model
			if(isset($information)){
				$this->register->_information($information);
			}
			

		}

		
	}

	public function valid_citizen_id($personID)
	{
		if (strlen($personID) != 13) {
			$this->form_validation->set_message('valid_citizen_id','"%s" ต้องมี 13 หลัก');
			return false;
		}
		$rev = strrev($personID); // reverse string ขั้นที่ 0 เตรียมตัว
		$total = 0;
		for($i=1;$i<13;$i++) // ขั้นตอนที่ 1 - เอาเลข 12 หลักมา เขียนแยกหลักกันก่อน
			{
				$mul = $i +1;
				$count = $rev[$i]*$mul; // ขั้นตอนที่ 2 - เอาเลข 12 หลักนั้นมา คูณเข้ากับเลขประจำหลักของมัน
				$total = $total + $count; // ขั้นตอนที่ 3 - เอาผลคูณทั้ง 12 ตัวมา บวกกันทั้งหมด
			}
			$mod = $total % 11; //ขั้นตอนที่ 4 - เอาเลขที่ได้จากขั้นตอนที่ 3 มา mod 11 (หารเอาเศษ)
			$sub = 11 - $mod; //ขั้นตอนที่ 5 - เอา 11 ตั้ง ลบออกด้วย เลขที่ได้จากขั้นตอนที่ 4
			$check_digit = $sub % 10; //ถ้าเกิด ลบแล้วได้ออกมาเป็นเลข 2 หลัก ให้เอาเลขในหลักหน่วยมาเป็น Check Digit
			if($rev[0] == $check_digit)  // ตรวจสอบ ค่าที่ได้ กับ เลขตัวสุดท้ายของ บัตรประจำตัวประชาชน
				return true; /// ถ้า ตรงกัน แสดงว่าถูก
			else
				$this->form_validation->set_message('valid_citizen_id','"%s" รูปแบบไม่ถูกต้อง');
				return false; // ไม่ตรงกันแสดงว่าผิด
	}

	public function valid_age($age){
			if($age > 70){
				$this->form_validation->set_message('valid_age','"%s" อายุเกิน 70 ปี');
				return false;
			}else if($age > 69 && $age > 70){
				$this->form_validation->set_message('valid_age','"%s" ท่านจะมีอายุงาน 1 ปี');
				return true;
			}
	}
	
}