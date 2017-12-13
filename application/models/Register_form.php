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
		return $result > 0 ? TRUE : FALSE;
	}
	// insert information
	function _information($information, $gr){
		// $now = unix_to_human(now('+7'),TRUE,'eu');  time
		$this->db->insert('information', $information);
		$insert_id = $this->db->insert_id();
		$gr['information_id']= $insert_id;
	}
}