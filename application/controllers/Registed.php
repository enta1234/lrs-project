<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registed extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','html','array','date','form'));
		$this->load->library(array('form_validation','session'));
		$this->load->model('Register_model','register');
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
				$registers['clinic_id'] = $this->input->post('selclinic');
				$registers['lawyer_ban_status'] = $this->register->_get_lawyer_ban_status($this->input->post('idcard'));
				$registers['registers_status'] = 'รอประกาศคำสั่งแต่งตั้ง';
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
	// del
	function delregister(){
		$data = json_decode($this->input->post('data'),true);
		$registers_id = $data['registers_id'];
		$this->register->_dregisters($registers_id);
	}
	// edit
	function editregister($idcard, $name, $lname){
		if($idcard!=null && $name!=null && $lname!=null){
			$data['getinid'] = $this->register->_getInformation_id($idcard);
			$information_id = $data['getinid']->information_id;
			$data['getworkid'] = $this->register->_getWorks_id($information_id);
			$data['getedit'] = $this->register->_getAllInformation($idcard);
			$data['getClinic'] = $this->register->_getClinic(); // get Clinic data
			$this->load->view('registed/editregister',$data);
		}else{
			redirect('register');
		}
	}
	// update
	function updateregister(){

		$information_id = $this->input->post('information_id');
		$work_id = $this->input->post('work_id');
		
		if($information_id != NULL && $work_id != NULL){

		$information['information_name'] = $this->input->post('name');
		$information['information_lastname'] = $this->input->post('lastname');
		$day = $this->input->post('day');
		$month = $this->input->post('month');
		$year = $this->input->post('year')-543;
		$dob = $year.'-'.$month.'-'.$day;
		$information['information_birthday'] = $dob;
		$information['information_nationalism'] = $this->input->post('nationalism');
		$information['information_nationality'] = $this->input->post('nationality');
		$information['information_religion'] = $this->input->post('religion');
		$information['information_status'] = $this->input->post('status');
		$information['information_address_number'] = $this->input->post('address_number');
		$information['information_moo'] = $this->input->post('moo');
		$information['information_road'] = $this->input->post('road');
		$information['information_district'] = $this->input->post('district');
		$information['information_county'] = $this->input->post('amphoe');
		$information['information_province'] = $this->input->post('province');
		$information['information_postcode'] = $this->input->post('zipcode');
		$information['information_phonenumber'] = $this->input->post('phonenumber');
		// send to model
		if(isset($information)){
			$this->register->_updateInformation($information_id, $information);
		}

		// set graduated get data form post
		$graduated['graduated_bachalor_from'] = $this->input->post('bachalor_from');
		$graduated['graduated_bachalor_year'] = $this->input->post('bachalor_year');
		$graduated['graduated_master_form'] = $this->input->post('master_form');
		$graduated['graduated_master_year'] = $this->input->post('master_year');
		$graduated['graduated_master_laws_year'] = $this->input->post('master_laws_year');
		$graduated['graduated_certificate_type'] = $this->input->post('certificate_type');
		$graduated['graduated_certificate_no'] = $this->input->post('certificate_no');
		$graduated['graduated_certificate_start'] = $this->input->post('certificate_start');
		$graduated['graduated_certificate_exp'] = $this->input->post('certificate_exp');
		// send to model
		// if(isset($information_id)){
			$this->register->_UpdateGraduated($information_id, $graduated);
		// } 
		// set work get data form post
		if($this->input->post('ever_work') == 'เคย'){
			$work['ever_clinic_name'] = $this->input->post('selectClinic');
		}else{
			$work['ever_clinic_name'] = $this->input->post('ever_work');
		}
		if(isset($work)){
			$this->register->_UpdateWorks($information_id, $work);
		}
		
		if($this->input->post('lawyer_career')!=NULL&&$this->input->post('company')!=NULL){
			// set lawyer_work get data form post
			$lawyer_work['work_id'] = $work_id;
			$lawyer_work['lawyer_work_lawyer_career'] = $this->input->post('lawyer_career');
			$lawyer_work['lawyer_work_company'] = $this->input->post('company');
			$lawyer_work['lawyer_work_company_address'] = $this->input->post('company_address');
			$lawyer_work['lawyer_work_experiencd'] = $this->input->post('experiencd');
			$lawyer_work['lawyer_work_past_cases'] = $this->input->post('past_cases');
			$lawyer_work['lawyer_work_expert_cases'] = $this->input->post('expert_cases');
			if(isset($lawyer_work)){
				$this->register->_UpdateLawyerWork($work_id, $lawyer_work);
			}
		}

		if($this->input->post('retire_date') != NULL && $this->input->post('departments') != NULL){
			// set government_work get data form post
			$government_work['work_id'] = $work_id;
			$government_work['government_work_retire_date'] = $this->input->post('retire_date');
			$government_work['government_work_governmental_age'] = $this->input->post('governmental_age');
			$government_work['government_work_position'] = $this->input->post('government_position');
			$government_work['government_work_lavel'] = $this->input->post('lavel');
			$government_work['government_work_departments'] = $this->input->post('departments');
			$government_work['government_work_ministry'] = $this->input->post('ministry');
			if(isset($government_work)){
				$this->register->_UpdateGovernment_work($work_id, $government_work);
			}
		}


		if($this->input->post('work_year0')!=null){
			$related_law_work['work_id'] = $work_id;
			$related_law_work['related_law_work_year0'] = $this->input->post('work_year[0]');
			$related_law_work['related_law_work_position0'] = $this->input->post('work_position[0]');
			$related_law_work['related_law_work_department0'] = $this->input->post('work_department[0]');
			$related_law_work['related_law_work_job0'] = $this->input->post('work_job[0]');
			$related_law_work['related_law_work_year1'] = $this->input->post('work_year[1]');
			$related_law_work['related_law_work_position1'] = $this->input->post('work_position[1]');
			$related_law_work['related_law_work_department1'] = $this->input->post('work_department[1]');
			$related_law_work['related_law_work_job1'] = $this->input->post('work_job[1]');
			$related_law_work['related_law_work_year2'] = $this->input->post('work_year[2]');
			$related_law_work['related_law_work_position2'] = $this->input->post('work_position[2]');
			$related_law_work['related_law_work_department2'] = $this->input->post('work_department[2]');
			$related_law_work['related_law_work_job2'] = $this->input->post('work_job[2]');
			$related_law_work['related_law_work_year3'] = $this->input->post('work_year[3]');
			$related_law_work['related_law_work_position3'] = $this->input->post('work_position[3]');
			$related_law_work['related_law_work_department3'] = $this->input->post('work_department[3]');
			$related_law_work['related_law_work_job3'] = $this->input->post('work_job[3]');
			$related_law_work['related_law_work_year4'] = $this->input->post('work_year[4]');
			$related_law_work['related_law_work_position4'] = $this->input->post('work_position[4]');
			$related_law_work['related_law_work_department4'] = $this->input->post('work_department[4]');
			$related_law_work['related_law_work_job4'] = $this->input->post('work_job[4]');
			if(isset($related_law_work)){
				$this->register->_UpadteRelatedLawWork($work_id, $related_law_work);
				// TODO..delete other works
			}					
		}

		// set skill_person get data form post
		$skill_person_com['information_id'] = $information_id;
		$skill_person_com['skill_person_com_name0'] = $this->input->post('skill_com_name[1]');
		$skill_person_com['skill_person_com_level0'] = $this->input->post('skill_com_level[1]');
		$skill_person_com['skill_person_com_name1'] = $this->input->post('skill_com_name[2]');
		$skill_person_com['skill_person_com_level1'] = $this->input->post('skill_com_level[2]');
		$skill_person_com['skill_person_com_name2'] = $this->input->post('skill_com_name[3]');
		$skill_person_com['skill_person_com_level2'] = $this->input->post('skill_com_level[3]');
		$skill_person_com['skill_person_com_name3'] = $this->input->post('skill_com_name[4]');
		$skill_person_com['skill_person_com_level3'] = $this->input->post('skill_com_level[4]');
		$skill_person_com['skill_person_com_name4'] = $this->input->post('skill_com_name[5]');
		$skill_person_com['skill_person_com_level4'] = $this->input->post('skill_com_level[5]');
		if(isset($skill_person_com)){
			$this->register->_UpdateSkillPersonCom($information_id, $skill_person_com);
		}

		$skill_person_lan['information_id'] = $information_id;
		$skill_person_lan['skill_person_lan_name0'] = $this->input->post('skill_lan_name[1]');
		$skill_person_lan['skill_person_lan_level0'] = $this->input->post('skill_lan_level[1]');
		$skill_person_lan['skill_person_lan_name1'] = $this->input->post('skill_lan_name[2]');
		$skill_person_lan['skill_person_lan_level1'] = $this->input->post('skill_lan_level[2]');
		$skill_person_lan['skill_person_lan_name2'] = $this->input->post('skill_lan_name[3]');
		$skill_person_lan['skill_person_lan_level2'] = $this->input->post('skill_lan_level[3]');
		$skill_person_lan['skill_person_lan_name3'] = $this->input->post('skill_lan_name[4]');
		$skill_person_lan['skill_person_lan_level3'] = $this->input->post('skill_lan_level[4]');
		$skill_person_lan['skill_person_lan_name4'] = $this->input->post('skill_lan_name[5]');
		$skill_person_lan['skill_person_lan_level4'] = $this->input->post('skill_lan_level[5]');
		if(isset($skill_person_lan)){
			$this->register->_UpdateSkillPersonLan($information_id, $skill_person_lan);
		}
		// after update
		$getData['information'] = $this->register->_getInformation($this->input->post('idcard')); //get information from idcard
		$getData['getClinic'] = $this->register->_getClinic(); // get Clinic data
		$getData['registers'] = $this->register->_wregisters($information_id); // get register data from idcard

		$this->session->set_userdata('getData', $getData);
		redirect('registed');
		}else{
			redirect('welcome');
		}
	}
}