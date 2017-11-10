<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('html','url','form'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('Dashboard_model','db_model');
	}

	public function index()
	{
		if(!$this->session->userdata('Logged')){
			$this->load->view('dashboard/loginPage');
		}else{
			redirect('dashboard/home');
		}
	}

	public function home()
	{
		if(!$this->session->userdata('Logged')){
			$this->session->set_flashdata('msg_error', 'กรุณาเข้าสู่ระบบ');
			$this->load->view('dashboard/loginPage');
		}else{
			$this->load->view('dashboard/home/header');
			$this->load->view('dashboard/home/navbar');
			$this->load->view('dashboard/home/sidebar');
			$this->load->view('dashboard/home/content/main');
			$this->load->view('dashboard/home/footer');
		}
	}

	public function logincheck()
	{
		$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_message('required','กรุณากรอก %s');
		$this->form_validation->set_message('valid_email','รูปแบบของ %s ไม่ถูกต้อง');
		$this->form_validation->set_message('min_length','รหัสผ่านอย่างน้อย 5 ตัวอักษร');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">','</div>');

		if ($this->input->post('submit')){
			if ($this->form_validation->run()) {
				$Username = $this->input->post('email');
				$Password = $this->input->post('password');
				$check = $this->db_model->_checkUser($Username, $Password);
				if($check){
					$data = array(
						'username' => $username,
						'Logged' => TRUE
					);
					$this->session->set_userdata($data);
					redirect('Dashboard');
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

	public function logout(){
		$this->session->sess_destroy();
		redirect('Dashboard');
	}
}

?>