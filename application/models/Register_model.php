<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_model extends CI_Model {

    function _construct(){
        parent::_construct();    
    }

    // Get All Areas
	function _getArea(){
		$query = $this->db->get('area')->result();
		return $query;
	}
	// Check
	function _getClinic(){
		$query = $this->db->get('clinic')->result();
		return $query;
	}
	// check id card
	function _checkIdcard($idcard){
		$result =	$this->db->where('information_idcard', $idcard)
		->count_all_results('information');
		return $result > 0 ? TRUE : false;
	}
	// insert information
	function _information($information){
		// $now = unix_to_human(now('+7'),TRUE,'eu');  time
		$this->db->insert('information', $information);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	function _graduated($graduated){
		$this->db->insert('graduated', $graduated);
	}
	function _work($work){
		$this->db->insert('works', $work);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	function _lawyer_work($lawyer_work){
		$this->db->insert('lawyer_work', $lawyer_work);
	}
	function _government_work($government_work){
		$this->db->insert('government_work', $government_work);
	}
	function _related_law_work($related_law_work){
		$this->db->insert('related_law_work', $related_law_work);
	}
	function _skill_person_com($skill_person){
		$this->db->insert('skill_person_com', $skill_person);
	}
	function _skill_person_lan($skill_person){
		$this->db->insert('skill_person_language', $skill_person);
	}
	function _getInformation($idcard){
		$row =	$this->db->where('information_idcard', $idcard)->get('information')->row();
		return $row;
	}
	function _checkregistersclinic($clinic_id,$information_idcard){
		$count = $this->db->where('clinic_id', $clinic_id)
		->where('information_idcard', $information_idcard)
		->count_all_results('registers');
		if($count<1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function _registers($registers){
		$this->db->insert('registers', $registers);
	}
	function _get_lawyer_ban_status($data){
		// check by information_idcard
		$count = $this->db->where('information_idcard',$data)->count_all_results('lawyer');
		if($count<1){
			$str = '-';
			return $str;
		}else{
			$result = $this->db->select_max('lawyer_id')->where('information_idcard',$data)->get('lawyer')->row();
			$lawyer_id = $result->lawyer_id;
			$row = $this->db->select('lawyer_ban_status')->where('lawyer_id',$lawyer_id)->get('lawyer')->row();
			if (isset($row)){
				return $row->lawyer_ban_status;
			}
		}
		
	}
	function _wregisters($data_idcrad){
		$query = $this->db->where('information_id', $data_idcrad)->get('registers')->result();
		return $query;
	}
	function _dregisters($id){
		$this->db->where('registers_id',$id);
		$this->db->delete('registers');
	}
	function _getregisters($data){
		$sql = 'SELECT registers.registers_id, registers.information_idcard, information.information_name, 
		 clinic.clinic_name, registers.registers_status, registers.registers_timeregister
		FROM registers
		LEFT JOIN information ON registers.information_id = information.information_id
		LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
		WHERE registers.information_idcard ='.$data;

		$query = $this->db->query($sql)->result_array();
		$data2['data'] = json_encode($query);
		$this->load->view('registed/json/registed', $data2);
	}
	// get infprmation_id
	function _getInformation_id($idcard){
		$id = $this->db->select('information_id')->where('information_idcard',$idcard)->get('information')->row();
		return $id;
	}
	// get id works
	function _getWorks_id($information_id){
		return $this->db->select('work_id')->where('information_id',$information_id)->get('works')->row();
	}
	// getinformation
	function _getAllInformation($idcard){
		if(isset($idcard)){
			return $this->db
			->query('SELECT * 
				FROM information
				LEFT JOIN works ON information.information_id = works.information_id
				LEFT JOIN graduated ON information.information_id = graduated.information_id
				LEFT JOIN skill_person_com ON information.information_id = skill_person_com.information_id
				LEFT JOIN skill_person_language ON information.information_id = skill_person_language.information_id
				LEFT JOIN government_work ON works.work_id = government_work.work_id
				LEFT JOIN lawyer_work ON works.work_id = lawyer_work.work_id
				LEFT JOIN related_law_work ON works.work_id = related_law_work.work_id
				WHERE information.information_idcard ='.$idcard)
			->row();
		}else{
			redirect('register');
		}
	}
	// update
	function _updateInformation($information_id, $work_id, $information, 
									$graduated, $work, $government_work, $lawyer_work, $related_law_work
									, $skill_person_com, $skill_person_lan){
		
		$this->db->set($information);
		$this->db->where($information_id);
		$this->db->update('information');

		$this->db->set($graduated);
		$this->db->where($information_id);
		$this->db->update('graduated');

		$this->db->set($work);
		$this->db->where($information_id);
		$this->db->update('work');

		$this->db->set($government_work);
		$this->db->where($work_id);
		$this->db->update('government_work');

		$this->db->set($lawyer_work);
		$this->db->where($work_id);
		$this->db->update('lawyer_work');
		
		$this->db->set($related_law_work);
		$this->db->where($work_id);
		$this->db->update('related_law_work');

		$this->db->set($skill_person_com);
		$this->db->where($information_id);
		$this->db->update('skill_person_com');

		$this->db->set($skill_person_lan);
		$this->db->where($information_id);
		$this->db->update('skill_person_lan');
	}
}