<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('html','url','form'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		redirect('dashboard/login');
	}

	public function login()
	{
		$this->load->view('dashboard/loginPage');
	}

	public function home()
	{
		$this->load->view('dashboard/home/header');
		$this->load->view('dashboard/home/navbar');
		$this->load->view('dashboard/home/sidebar');
		$this->load->view('dashboard/home/content/main');
		$this->load->view('dashboard/home/footer');
	}

	public function logincheck()
	{
		$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_message('required','%s ต้องไม่เป็นค่าว่าง');
		$this->form_validation->set_message('valid_email','รูปแบบของ %s ไม่ถูกต้อง');
		$this->form_validation->set_message('min_length','รหัสผ่านอย่างน้อย 6 ตัวอักษร');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('dashboard/loginPage');
		} else {
			 redirect('dashboard/home');
		}
	}
}

?>