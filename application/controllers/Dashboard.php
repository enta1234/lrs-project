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
			$active = array('ac_home' => 'active', 'ac_addStaff' => '', 'ac_staff' => '');
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
			$active = array('ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
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
				$active = array('ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
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
		$this->form_validation->set_rules('idcard', 'เลขบัตรประชาชน', 'required|exact_length[13]|is_natural|callback_valid_citizen_id');
		$this->form_validation->set_message('required','กรุณากรอก "%s"');
		$this->form_validation->set_message('exact_length','"%s" ต้องมี 13 หลัก');
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
				$this->db_model->_updateInfor($Username,$firstname,$lastname,$idcard);
				$this->session->set_flashdata('msg_success_inforleft', 'บันทึกข้อมูลสำเร็จ');
				redirect('Dashboard/profile');
			}else {
				$active = array('ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
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
				$active = array('ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => '');
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

	// Add Staff
	public function addStaff()
	{
		$this->form_validation->set_rules('clinic', 'คลินิก', 'required');
		$this->form_validation->set_rules('status', 'ตำแหน่ง', 'required');
		$this->form_validation->set_rules('name', 'ชื่อ', 'required|max_length[30]');
		$this->form_validation->set_rules('lastname', 'นามสกุล', 'required|max_length[30]');
		$this->form_validation->set_rules('idcard', 'เลขบัตรประชาชน', 'required|exact_length[13]|is_natural|callback_valid_citizen_id');
		$this->form_validation->set_rules('email', 'อีเมล', 'required|valid_email|max_length[50]');
		$this->form_validation->set_rules('password', 'รหัสผ่าน', 'required|max_length[32]');
		$this->form_validation->set_message('required','กรุณากรอก "%s"');
		$this->form_validation->set_message('exact_length','"%s" ต้องมี 13 หลัก');
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
			$this->db_model->_updateLogin($Username);
			$active = array('ac_home' => '', 'ac_addStaff' => 'active', 'ac_staff' => '');
			$getUser['User'] = $this->db_model->_getUser($Username);
			$check = $this->input->post('check');
			$getClinicArea['getArea'] = $this->db_model->_getArea();
			if ($check =='checked') {
				$getClinicArea['checkArea'] = $this->db_model->_checkArea($this->input->post('area'));
				$getClinicArea['disabled'] =  '';
			}else{
				$getClinicArea['checkArea'] = $this->db_model->_checkArea('');
				$getClinicArea['disabled'] =  'disabled';
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
			$active = array('ac_home' => '', 'ac_addStaff' => 'active', 'ac_staff' => '');
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

    // Staff
    public function staff()
	{
		if($this->session->userdata('Logged')||$this->input->cookie('username')){
			if($this->session->userdata('Logged')){
				$Username = $this->session->userdata['username'];
			}else{
				$Username = get_cookie('username');
			}
			$this->db_model->_updateLogin($Username);
			$active = array('ac_home' => '', 'ac_addStaff' => '', 'ac_staff' => 'active');
			$getUser['User'] = $this->db_model->_getUser($Username);
			$getOfficer['getOfficer'] = $this->db_model->_getOfficer();
			$data['Officer'] = json_encode($getOfficer['getOfficer']);
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar', $getUser);
			$this->load->view('dashboard/home/sidebar', $active);
			$this->load->view('dashboard/home/content/staff', $data);
			$this->load->view('dashboard/home/footer');
		}else{
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}
	}
    // ./Staff

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
							set_cookie('username',$Username,'3600');
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