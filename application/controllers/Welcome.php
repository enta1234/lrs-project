<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('home');
		$this->load->view('content/header');
		$this->load->view('content/news');
		$this->load->view('content/map');
		$this->load->view('content/footer');
	}
}
