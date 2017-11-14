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
	function _updateTime($Username){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$this->db->where('officer_username', $Username)
		->set('officer_lastLogin' , $now)
		->update('officer');
	}
}
?>