<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registed extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html','array','date','form'));
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('registed/registed');
    }
}