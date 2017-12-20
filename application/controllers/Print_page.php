<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_page extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html','array','date'));
		// $this->load->model('Print_model','db');
    }
    function index(){
        $this->load->view('print/print-page');
    }
}