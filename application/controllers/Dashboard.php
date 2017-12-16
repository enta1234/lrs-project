<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('html','url','form','cookie','date'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('Dashboard_model','db_model');
	}

	public function index()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			redirect('dashboard/home');
		}else{
			$this->load->view('dashboard/loginPage');
		}
	}
	// Home
	public function home()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$getUser['User'] = $this->db_model->_getUser($Username);
			$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => 'active', 'ac_addStaff' => '', 'ac_staff' => '');
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar', $getUser);
			$this->load->view('dashboard/home/sidebar', $active);
			$this->load->view('dashboard/home/content/main');
			$this->load->view('dashboard/home/footer');
			
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}
	// ./ Home
/*--------------------------------------------------------------------------------------------------------------------------------------*/
	// Edit Peofile 
	public function profile()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
			$getUser['User'] = $this->db_model->_getUser($Username);
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar', $getUser);
			$this->load->view('dashboard/home/sidebar', $active);
			$this->load->view('dashboard/home/content/profile');
			$this->load->view('dashboard/home/footer');
			
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}

	public function updateProfile()
	{
		if ($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$getUser['User'] = $this->db_model->_getUser($Username);
			$name = $getUser['User']->officer_id.'_'.$getUser['User']->officer_name.'_'.'profile';
			$config['upload_path'] = './assets/dashboard/upload/profile';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = $name;
			$config['max_size'] = '2560';
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);
			$this->db_model->_updateLogin($Username);
			if ($this->upload->do_upload('profile')) {
				$img = $this->upload->data('file_name');
				$this->db_model->_updateProfile($Username,$img);
				$this->session->set_flashdata('msg_success_profileleft', 'บันทึกข้อมูลสำเร็จ');
				redirect('Dashboard/profile');
			}else {
				$data['error'] = $this->upload->display_errors('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
				$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/profile', $data);
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}	

	public function updateInfor()
	{
		$this->form_validation->set_rules('firstname', 'ชื่อ', 'required|max_length[30]');
		$this->form_validation->set_rules('lastname', 'นามสกุล', 'required|max_length[30]');
		$this->form_validation->set_rules('idcard', 'เลขบัตรประชาชน', 'required|is_natural|callback_valid_citizen_id');
		$this->form_validation->set_message('required','กรุณากรอก "%s"');
		$this->form_validation->set_message('max_length','"%s" ยาวเกินไป');
		$this->form_validation->set_message('is_natural','"%s" ต้องเป็นตัวเลขเท่านั้น');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');

		if ($this->input->post('submit')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$getUser['User'] = $this->db_model->_getUser($Username);
			$this->db_model->_updateLogin($Username);
			if ($this->form_validation->run()) {
				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$idcard = $this->input->post('idcard');
				if ($idcard != $getUser['User']->officer_idcard) {
					if($this->db_model->_checkIdcard($idcard)){
						$this->session->set_flashdata('msg_error_inforleft', 'เลขบัตรประชาชนนี้มีในระบบแล้ว');
						redirect('Dashboard/profile');
					}
				}
				$this->db_model->_updateInfor($Username,$firstname,$lastname,$idcard);
				$this->session->set_flashdata('msg_success_inforleft', 'บันทึกข้อมูลสำเร็จ');
				redirect('Dashboard/profile');
			}else {
				$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/profile');
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}	

	public function updatePassword()
	{
		$this->form_validation->set_rules('password', 'รหัสผ่านใหม่', 'required|min_length[5]');
		$this->form_validation->set_rules('confirmpassword', 'ยืนยันรหัสผผ่านใหม่', 'required|min_length[5]');
		$this->form_validation->set_rules('oldpassword', 'รหัสผ่านเก่า', 'required|min_length[5]');
		$this->form_validation->set_message('min_length','"รหัสผ่าน" ต้องมีอย่างน้อย 5 ตัวอักษร');
		$this->form_validation->set_message('required','กรุณากรอก "%s"');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');

		if ($this->input->post('submit')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$getUser['User'] = $this->db_model->_getUser($Username);
			$this->db_model->_updateLogin($Username);
			if ($this->form_validation->run()) {
				$Password = $this->input->post('password');
				$confirmpassword = $this->input->post('confirmpassword');
				$oldpassword = $this->input->post('oldpassword');
				if ($Password != $confirmpassword) {
					$this->session->set_flashdata('msg_error_right', 'ยืนยันรหัสผ่านไม่ตรงกัน');
					redirect('Dashboard/profile');
				}
				if (md5($oldpassword) != $getUser['User']->officer_password) {
					$this->session->set_flashdata('msg_error_right', 'รหัสผ่านเก่าไม่ถูกต้อง');
					redirect('Dashboard/profile');
				}
				$this->db_model->_updatePassword($Username,$Password);
				$this->session->set_flashdata('msg_success_right', 'บันทึกข้อมูลสำเร็จ');
				redirect('Dashboard/profile');
			}else {
				$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/profile');
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}	
	public function updateEmail()
	{
		$this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email|max_length[50]');
		$this->form_validation->set_message('required','กรุณากรอก "%s"');
		$this->form_validation->set_message('max_length','"%s" ยาวเกินไป');
		$this->form_validation->set_message('valid_email','รูปแบบของ "%s" ไม่ถูกต้อง');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');

		if ($this->input->post('submit')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$getUser['User'] = $this->db_model->_getUser($Username);
			$this->db_model->_updateLogin($Username);
			if ($this->form_validation->run()) {
				$email = $this->input->post('email');
				if($this->db_model->_checkEmail($email)){
					$this->session->set_flashdata('msg_error_emailright', 'E-Mail นี้มีในระบบแล้ว');
					redirect('Dashboard/profile');
				}
				$this->db_model->_updateEmail($Username,$email);
				$this->session->set_userdata('username',$email);
				$this->session->set_flashdata('msg_success_emailright', 'บันทึกข้อมูลสำเร็จ');
				redirect('Dashboard/profile');
			}else {
				$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/profile');
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}
	// ./ Edit Profile
/*--------------------------------------------------------------------------------------------------------------------------------------*/
	/* Manage Staff */
	// Add Staff
	public function addStaff()
	{
		$this->form_validation->set_rules('clinic', 'คลินิก', 'required');
		$this->form_validation->set_rules('status', 'ตำแหน่ง', 'required');
		$this->form_validation->set_rules('name', 'ชื่อ', 'required|max_length[30]');
		$this->form_validation->set_rules('lastname', 'นามสกุล', 'required|max_length[30]');
		$this->form_validation->set_rules('idcard', 'เลขบัตรประชาชน', 'required|is_natural|callback_valid_citizen_id');
		$this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email|max_length[50]');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required|max_length[32]');
		$this->form_validation->set_message('required','กรุณากรอก "%s"');
		$this->form_validation->set_message('max_length','"%s" ยาวเกินไป');
		$this->form_validation->set_message('is_natural','"%s" ต้องเป็นตัวเลขเท่านั้น');
		$this->form_validation->set_message('valid_email','รูปแบบของ "%s" ไม่ถูกต้อง');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$getUser['User'] = $this->db_model->_getUser($Username);
			if ($getUser['User']->officer_status =='staff') {
				redirect('Dashboard/home');
			}
			$this->db_model->_updateLogin($Username);
			$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => 'active', 'ac_staff' => '');
			$check = $this->input->post('check');
			if($getUser['User']->officer_status =='superadmin'){
				$getClinicArea['getArea'] = $this->db_model->_getArea();
				if ($check =='checked') {
					$getClinicArea['checkArea'] = $this->db_model->_checkArea($this->input->post('area'));
					$getClinicArea['disabled'] =  '';
				}else{
					$getClinicArea['checkArea'] = $this->db_model->_checkArea('');
					$getClinicArea['disabled'] =  'disabled';
				}
			}else{
				$getClinicArea['checkArea'] = $this->db_model->_getClinicinarea($getUser['User']->area_id);
			}
			if ($this->form_validation->run()) {
				$clinic = $this->input->post('clinic');
				$status = $this->input->post('status');
				$name = $this->input->post('name');
				$lastname = $this->input->post('lastname');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$idcard = $this->input->post('idcard');
				if($this->db_model->_checkIdcard($idcard)){
					$this->session->set_flashdata('msg_error', 'เลขบัตรประชาชนนี้มีในระบบแล้ว');
					redirect('Dashboard/addStaff');
				}
				if($this->db_model->_checkEmail($email)){
					$this->session->set_flashdata('msg_error', 'E-Mail นี้มีในระบบแล้ว');
					redirect('Dashboard/addStaff');
				}
				$this->db_model->_addStaff($clinic, $status, $name, $lastname, $email, $password, $idcard);
				$this->session->set_flashdata('msg_success', 'เพิ่มเจ้าหน้าที่สำเร็จ');
				redirect('Dashboard/addStaff');
			}else{
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/addstaff', $getClinicArea);
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}

	public function checkArea()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => 'active', 'ac_staff' => '');
			$getUser['User'] = $this->db_model->_getUser($Username);
			$area = $this->input->post('area');
			$getClinicArea['getArea'] = $this->db_model->_getArea();
			$getClinicArea['checkArea'] = $this->db_model->_checkArea($area);
			$getClinicArea['disabled'] =  '';
			if($getClinicArea['checkArea']==FALSE){
				redirect('Dashboard/addStaff');
			}
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar', $getUser);
			$this->load->view('dashboard/home/sidebar', $active);
			$this->load->view('dashboard/home/content/addstaff', $getClinicArea);
			$this->load->view('dashboard/home/footer');
			
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
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
	// ./ Add Staff

    // Manage Staff
    public function staff()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$getUser['User'] = $this->db_model->_getUser($Username);
			if ($getUser['User']->officer_status =='staff') {
				redirect('Dashboard/home');
			}
			$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => 'active');
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar', $getUser);
			$this->load->view('dashboard/home/sidebar', $active);
			$this->load->view('dashboard/home/content/staff');
			$this->load->view('dashboard/home/footer');
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}
	// Make json
	public function getofficerjson()
	{	
		if($this->session->userdata('Logged')){
			$Username = $this->session->userdata['username'];
		}else{
			$Username = get_cookie('username');
		}
		$getUser['User'] = $this->db_model->_getUser($Username);
		if ($getUser['User']->officer_status=='superadmin') {
			$this->db_model->_getOfficerjson();
		}else{
			$this->db_model->_getOfficerAreajson($getUser['User']->area_id);
		}
	}
	// Delete Staff
	public function staffdelete()
	{
		$data = json_decode($_POST['data'],true);
		$officerid = $data['officer_id'];
		$this->db_model->_staffdelete($officerid);
	}
	// Edit Staff
	public function staffedit()
	{
		if (isset($_POST['data'])) {
			$data = json_decode($_POST['data'],true);
			$this->session->set_userdata('editstaff', $data);
		}
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$getUser['User'] = $this->db_model->_getUser($Username);
			if ($getUser['User']->officer_status =='staff') {
				redirect('Dashboard/home');
			}
			$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => 'active');
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar', $getUser);
			$this->load->view('dashboard/home/sidebar', $active);
			$this->load->view('dashboard/home/content/editstaff', $getClinic);
			$this->load->view('dashboard/home/footer');
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}	
	}
	public function staffditinfo()
	{
		$this->form_validation->set_rules('clinic', 'พื้นที่', 'required');
		$this->form_validation->set_rules('status', 'ตำแหน่ง', 'required');
		$this->form_validation->set_message('required','กรุณาเลือก "%s"');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
		if ($this->input->post('submit')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$getUser['User'] = $this->db_model->_getUser($Username);
			if ($getUser['User']->officer_status =='staff') {
				redirect('Dashboard/home');
			}
			$this->db_model->_updateLogin($Username);
			$getClinic['allclinic'] = $this->db_model->_getClinic();
			if ($this->form_validation->run()) {
				$clinic = $this->input->post('clinic');
				$status = $this->input->post('status');
				$officerID = $this->session->userdata['editstaff']['officer_id'];
				$this->db_model->_updateStaffinfo($officerID,$clinic,$status);
				$this->session->userdata['editstaff']['clinic_id'] = $clinic;
				$this->session->userdata['editstaff']['officer_status'] = $status;
				$this->session->set_flashdata('msg_success_left', 'บันทึกข้อมูลสำเร็จ');
				redirect('Dashboard/staffedit');
			}else {
				$active = array('ac_news'=>'', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => 'active');
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/editstaff', $getClinic);
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}
	public function staffeditpassword()
	{
		if ($this->input->post('submit')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$officerID = $this->session->userdata['editstaff']['officer_id'];
			$password = $this->input->post('password');
			$this->db_model->_updateStaffpassword($officerID,$password);
			$this->session->set_flashdata('msg_success_right', 'บันทึกข้อมูลสำเร็จ');
			redirect('Dashboard/staffedit');
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}
    // ./ Manage Staff
/*--------------------------------------------------------------------------------------------------------------------------------------*/
	/* Manage Website */
	// Add News
	public function addnews()
	{
		$this->form_validation->set_rules('topic', 'หัวข้อข่าว', 'required|max_length[45]');
		$this->form_validation->set_rules('detail', 'เนื้อหา', 'required');
		$this->form_validation->set_message('required','กรุณาใส่ "%s"');
		$this->form_validation->set_message('max_length','"%s" ยาวเกินไป');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$getUser['User'] = $this->db_model->_getUser($Username);
			$active = array('ac_news'=>'', 'ac_addnews'=>'active','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
			$this->db_model->_updateLogin($Username);
			$officer_id = $getUser['User']->officer_id;
			$topic = $this->input->post('topic');
			$detail = $this->input->post('detail');
			$click = $this->input->post('click');
			// config upload pic
			$configuppic['upload_path'] = './assets/upload/news/pic';
			$configuppic['allowed_types'] = 'gif|jpg|png|jpeg';
			$configuppic['file_name'] = $topic;
			$configuppic['max_size'] = '3072';
			$this->load->library('upload', $configuppic, 'picupload');
			$this->picupload->initialize($configuppic);
			// config upload file
			$configupfile['upload_path'] = './assets/upload/news/file';
			$configupfile['allowed_types'] = 'pdf|txt|doc|docx|csv|ppt|pptx|pps|xls|xlsx|7z|zip|zipx|rar';
			$configupfile['max_size'] = '30720';
			$this->load->library('upload', $configupfile, 'fileupload');
			$this->fileupload->initialize($configupfile);

			if ($this->form_validation->run()) {
				if ($this->input->post('filestatus')) {
					$upload_pic = $this->picupload->do_upload('pic');
					if ($upload_pic == FALSE) {
						$data['errorpic'] = $this->picupload->display_errors('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>[รูป]&nbsp&nbsp&nbsp','</div>');
					}
					$upload_file = $this->fileupload->do_upload('file');
					if ($upload_file == FALSE) {
						$data['errorfile'] = $this->fileupload->display_errors('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>[เอกสารที่เกี่ยวข้อง]&nbsp&nbsp&nbsp','</div>');
					}
					if ($upload_pic && $upload_file) {
						$picname = $this->picupload->data('file_name');
						$filename = $this->fileupload->data('file_name');
						$this->db_model->_addnews($officer_id, $topic, $detail, $picname, $filename);
						$this->session->set_flashdata('msg_success', 'เพิ่มข่าวสำเร็จ');
						redirect('Dashboard/addnews');
					}else{
						$this->load->view('dashboard/home/header');
						$this->load->view('dashboard/home/navbar', $getUser);
						$this->load->view('dashboard/home/sidebar', $active);
						$this->load->view('dashboard/home/content/addnews', $data);
						$this->load->view('dashboard/home/footer');
					}
				}else{
					$upload_pic = $this->picupload->do_upload('pic');
					if ($upload_pic == FALSE) {
						$data['errorpic'] = $this->picupload->display_errors('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>[รูป]&nbsp&nbsp&nbsp','</div>');
					}
					if ($upload_pic) {
						$picname = $this->picupload->data('file_name');
						$this->db_model->_addnewsNofile($officer_id, $topic, $detail, $picname);
						$this->session->set_flashdata('msg_success', 'เพิ่มข่าวสำเร็จ');
						redirect('Dashboard/addnews');
					}else{
						$this->load->view('dashboard/home/header');
						$this->load->view('dashboard/home/navbar', $getUser);
						$this->load->view('dashboard/home/sidebar', $active);
						$this->load->view('dashboard/home/content/addnews', $data);
						$this->load->view('dashboard/home/footer');
					}
				}
			}else{
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/addnews');
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}
	// Manage News
	public function news()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$getUser['User'] = $this->db_model->_getUser($Username);
			$active = array('ac_news'=>'active', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar', $getUser);
			$this->load->view('dashboard/home/sidebar', $active);
			$this->load->view('dashboard/home/content/news');
			$this->load->view('dashboard/home/footer');
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}
	// Make json
	public function getNewsjson()
	{	
		if($this->session->userdata('Logged')){
			$Username = $this->session->userdata['username'];
		}else{
			$Username = get_cookie('username');
		}
		$this->db_model->_getNewsjson();
	}
	// Edit News Mainpage
	public function editnews()
	{
		if (isset($_POST['data'])) {
			$data = json_decode($_POST['data'],true);
			$this->session->set_userdata('editnews', $data);
		}
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$getUser['User'] = $this->db_model->_getUser($Username);
			$data['news'] = $this->db_model->_getNews($this->session->userdata['editnews']['news_id']);
			$active = array('ac_news'=>'active', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar', $getUser);
			$this->load->view('dashboard/home/sidebar', $active);
			$this->load->view('dashboard/home/content/editnews', $data);
			$this->load->view('dashboard/home/footer');
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}	
	}
	// Edit News Content
	public function editNewcontent()
	{
		$this->form_validation->set_rules('topic', 'หัวข้อข่าว', 'required|max_length[45]');
		$this->form_validation->set_rules('detail', 'เนื้อหา', 'required');
		$this->form_validation->set_message('required','กรุณาใส่ "%s"');
		$this->form_validation->set_message('max_length','"%s" ยาวเกินไป');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$getUser['User'] = $this->db_model->_getUser($Username);
			$newsid = $this->input->post('newsid');
			$topic = $this->input->post('topic');
			$detail = $this->input->post('detail');
			$active = array('ac_news'=>'active', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
			$data['news'] = $this->db_model->_getNews($this->session->userdata['editnews']['news_id']);
			if ($this->form_validation->run()) {
				$this->db_model->_editNewcontent($newsid, $topic, $detail);
				$this->session->set_flashdata('msg_success', 'เพิ่มข่าวสำเร็จ');
				redirect('Dashboard/editnews');
			}else{
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/editnews',$data);
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}	
	}
	// Edit News Pic
	public function editNewspic()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$getUser['User'] = $this->db_model->_getUser($Username);
			$active = array('ac_news'=>'active', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
			$data['news'] = $this->db_model->_getNews($this->session->userdata['editnews']['news_id']);
			$configuppic['upload_path'] = './assets/upload/news/pic';
			$configuppic['allowed_types'] = 'gif|jpg|png|jpeg';
			$configuppic['file_name'] = $data['news']->news_name;
			$configuppic['max_size'] = '3072';
			$this->load->library('upload', $configuppic, 'picupload');
			$this->picupload->initialize($configuppic);
			$newsid = $this->input->post('newsid');
			if ($this->picupload->do_upload('pic')) {
				$picname = $this->picupload->data('file_name');
				$this->db_model->_editNewpic($newsid, $picname);
				$this->session->set_flashdata('msg_success_pic', 'แก้ไขรูปสำเร็จ');
				redirect('Dashboard/editnews');
			}else{
				$data['errorpic'] = $this->picupload->display_errors('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/editnews',$data);
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}	
	}
	// Edit News File
	public function editNewsfile()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$getUser['User'] = $this->db_model->_getUser($Username);
			$active = array('ac_news'=>'active', 'ac_addnews'=>'','ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
			$data['news'] = $this->db_model->_getNews($this->session->userdata['editnews']['news_id']);
			$configupfile['upload_path'] = './assets/upload/news/file';
			$configupfile['allowed_types'] = 'pdf|txt|doc|docx|csv|ppt|pptx|pps|xls|xlsx|7z|zip|zipx|rar';
			$configupfile['max_size'] = '30720';
			$this->load->library('upload', $configupfile, 'fileupload');
			$this->fileupload->initialize($configupfile);
			$newsid = $this->input->post('newsid');
			if ($this->fileupload->do_upload('pic')) {
				$filename = $this->fileupload->data('file_name');
				$this->db_model->_editNewfile($newsid, $filename);
				$this->session->set_flashdata('msg_success_file', 'แก้ไขเอกสารแนบสำเร็จ');
				redirect('Dashboard/editnews');
			}else{
				$data['errorfile'] = $this->fileupload->display_errors('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
				$this->load->view('dashboard/home/header');
				$this->load->view('dashboard/home/navbar', $getUser);
				$this->load->view('dashboard/home/sidebar', $active);
				$this->load->view('dashboard/home/content/editnews',$data);
				$this->load->view('dashboard/home/footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}	
	}
	/* ./ Manage Website */
/*--------------------------------------------------------------------------------------------------------------------------------------*/
	// Login 
	public function logincheck()
	{
		$this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email|max_length[50]');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required|min_length[5]');
		$this->form_validation->set_message('required','กรุณากรอก "%s"');
		$this->form_validation->set_message('valid_email','รูปแบบของ "%s" ไม่ถูกต้อง');
		$this->form_validation->set_message('min_length','"%s" ต้องมีอย่างน้อย 5 ตัวอักษร');
		$this->form_validation->set_message('max_length','"%s" ยาวเกินไป');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');

		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			redirect('dashboard/home');
		}else{
			if ($this->input->post('submit')){
				if ($this->form_validation->run()) {
					$Username = $this->input->post('email');
					$Password = $this->input->post('password');
					$check = $this->db_model->_checkUser($Username, $Password);
					if($check){
						$data = array(
							'username' => $Username,
							'Logged' => TRUE,
						);
						$this->session->set_userdata($data);
						if($this->input->post('remember')){
							set_cookie('username',$Username,'86400');
						}
						redirect('Dashboard/home');
					}else{
						$this->session->set_flashdata('msg_error', 'E-mail หรือ Password ไม่ถูกต้อง');
						$this->load->view('dashboard/loginPage');
					}	
				}else {
					$this->load->view('dashboard/loginPage');
				}
			}else{
				$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
				$this->load->view('dashboard/loginPage');
			} 
		}
	}

	public function logout(){
		if($this->input->cookie('username')){
			$Username = get_cookie('username');
			$this->db_model->_updateLogout($Username);
			delete_cookie('username');
			redirect('Dashboard');
		}else{
			$Username = $this->session->userdata['username'];
			$this->db_model->_updateLogout($Username);
			$this->session->sess_destroy();
			redirect('Dashboard');
		}
	}
	// ./ Login
}

?>