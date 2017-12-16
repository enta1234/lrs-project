<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registed extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html','array','date','form'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('Register_model','register');

	}
	private $data;
	function setdata($data){
		$data = $data;
	}
	function getdata(){
		return $this->data;
	}
	public function index()
	{
		$getData = $this->session->flashdata('msg_error_confirmRegister'); // get session data
		// $this->session->set_flashdata('getData', $getData);
		if($this->session->userdata('getData')!==null){
			$getData = $this->session->userdata('getData');
			$this->load->view('registed/registed',$getData);
		}else{
			redirect('welcome');
		}
	}
	// Make json
	public function getregisters()
	{	
		// 1234567890112
		if($this->session->userdata('getData')){
			$getData = $this->session->userdata('getData');
			$idcard = $getData['information']->information_idcard;
			$this->register->_getregisters($idcard);
		}else{
			$this->register->_getregisters();
		}
		

	}
	function confirmRegister(){
		$this->form_validation->set_rules('selclinic', 'คลินิก', 'required');
		$this->form_validation->set_rules('idcard', 'เลขบัตรประชาชน', 'required');
		$this->form_validation->set_message('required','กรุณาเลือก "%s"');
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');		
		$idcard= $this->input->post('idcard');
		$getData['information'] = $this->register->_getInformation($idcard);
		$getData['registers'] = $this->register->_wregisters($idcard); // get register data from idcard	
		$getData['getClinic'] = $this->register->_getClinic(); // get Clinic data
		if($this->form_validation->run()){
			if($this->register->_checkregistersclinic($this->input->post('selclinic'),$this->input->post('idcard'))){
				$registers['information_id'] = $getData['information']->information_id;
				$registers['information_idcard'] = $this->input->post('idcard');
				$registers['registers_clinic_name'] = $this->input->post('selclinic');
				$registers['lawyer_ban_status'] = $this->register->_get_lawyer_ban_status($this->input->post('idcard'));
				$registers['registers_status'] = 'รอผลสอบสัมภาษณ์';
				$registers['registers_timeregister'] = unix_to_human(now('+7'),TRUE,'eu');

				$this->register->_registers($registers);
				redirect('registed');
			}else{
				$this->session->set_flashdata('msg_error_selclinic', 'ท่านได้สมัครที่ '.$this->input->post('selclinic').' แล้ว');
				redirect('registed');
			}
		}else{
			redirect('registed');
		}
	}
	function delregister(){
		$data = json_decode($this->input->post('data'),true);
		$registers_id = $data['registers_id'];
		$this->register->_dregisters($registers_id);
	}
}