<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('html','url'));
	}

	public function index()
	{
		redirect('dashboard/login');
	}

	public function login()
	{
		$this->load->view('dashboard/loginNew');
	}

	public function home()
	{
		$this->load->view('dashboard/home/header');
		$this->load->view('dashboard/home/navbar');
		$this->load->view('dashboard/home/sidebar');
		$this->load->view('dashboard/home/content/main');
		$this->load->view('dashboard/home/footer');
	}
}

?>