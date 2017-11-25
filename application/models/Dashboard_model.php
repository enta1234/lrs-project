<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	//เช็คล็อกอิน
	function _checkUser($Username,$Password){
		$result =	$this->db->where('officer_username', $Username)
					->where('officer_password', md5($Password))
					->count_all_results('officer');
		return $result > 0 ? TRUE : FALSE;
	}

	//ข้อมูลผู้ใช้งาน
	function _getUser($Username){
		$cause = array('officer_username' => $Username);
		$query =	$this->db->get_where('officer', $cause);
		return $query->row();
	}

	//Update login time
	function _updateLogin($Username){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$this->db->where('officer_username', $Username)
		->set('officer_lastLogin' , $now)
		->update('officer');
	}
	// Update Logout time
	function _updateLogout($Username){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$this->db->where('officer_username', $Username)
		->set('officer_lastLogout' , $now)
		->update('officer');
	}
	// Update Avata
	function _updateProfile($Username,$img){
		$result = $this->db->where('officer_username', $Username)
		->set('officer_image' , $img)
		->update('officer');
	}
	// Update Information
	function _updateInfor($Username,$firstname,$lastname,$idcard){
		$result = $this->db->where('officer_username', $Username)
		->set('officer_name' , $firstname)
		->set('officer_lastname' , $lastname)
		->set('officer_idcard' , $idcard)
		->update('officer');
	}	
	// Update Password
	function _updatePassword($Username,$Password){
		$result = $this->db->where('officer_username', $Username)
		->set('officer_password' , md5($Password))
		->update('officer');
	}	
	/* Add Staff */
	// Get All Areas
	function _getArea(){
		$query = $this->db->get('area')->result();
		return $query;
	}
	// Check Clinic in Area
	function _checkArea($area){
		if($area!=''){
			$query = $this->db->where('area_id' , $area)
			->get('clinic')
			->result();
			return $query;
		}else return FALSE;
	}	
	// Insert Officer
	function _addStaff($clinic, $status, $name, $lastname, $email, $password, $idcard){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$query = $this->db->set('officer_password' , md5($password))
		->set('clinic_id', $clinic)
		->set('officer_idcard', $idcard)
		->set('officer_name', $name)
		->set('officer_lastname', $lastname)
		->set('officer_username', $email)
		->set('officer_status', $status)
		->set('officer_registerDate', $now)
		->insert('officer');
	}	
	// Check Email
	function _checkEmail($email){
		$query = $this->db->where('officer_username', $email)
		->count_all_results('officer');
		return $query > 0 ? TRUE : FALSE;
	}
	// Check IDcard
	function _checkIdcard($idcard){
		$query = $this->db->where('officer_idcard', $idcard)
		->count_all_results('officer');
		return $query > 0 ? TRUE : FALSE;
	}	
	/* End Add Staff */

	// Staff Page
	// Get All Officer
	function _getOfficer(){
		$query = $this->db->get('officer')->result_array();
		return $query;
	}
	// ./Staff Page
}
?>