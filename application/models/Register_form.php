<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_form extends CI_Model {

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
		$result =	$this->db->where('information_idcard', $idcard)->count_all_results('information');
		return $result > 0 ? FALSE : TRUE;
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
		$this->db->insert('work', $work);
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
	function _skill_person($skill_person){
		$this->db->insert('skill_person', $skill_person);
	}

}