<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	// Check username password
	function _checkUser($Username,$Password){
		$result =	$this->db->where('officer_username', $Username)
					->where('officer_password', md5($Password))
					->count_all_results('officer');
		return $result > 0 ? TRUE : FALSE;
	}

	// Get detail user logged
	function _getUser($Username){
		// $cause = array('officer_username' => $Username);
		// $query =	$this->db->get_where('officer', $cause);
		// return $query->row();

		$query = $this->db->join('clinic','clinic.clinic_id = officer.clinic_id','LEFT')
			->where('officer_username' , $Username)
			->get('officer')
			->row();
		return $query;
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
	/* Count All main page */
	function _countStaff(){
		$result =	$this->db->count_all_results('officer');
		return $result;
	}
	function _countLawyer(){
		$result =	$this->db->count_all_results('lawyer');
		return $result;
	}
	function _countLawyer70(){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$date = date('Y-m-d', strtotime('-25537 day', strtotime($now)));
		$result =	$this->db->join('registers','lawyer.registers_id = registers.registers_id','LEFT')
		->join('information','information.information_id = registers.information_id','LEFT')
		->where('information_birthday <=', $date)
		->count_all_results('lawyer');
		return $result;
	}
	function _countRegister(){
		$result =	$this->db->count_all_results('registers');
		return $result;
	}
	/* ./Count All main page */

	/* Edit Profile */
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
	function _updateEmail($Username,$Email){
		$result = $this->db->where('officer_username', $Username)
		->set('officer_username' , $Email)
		->update('officer');
	}	
	/* END Edit Profile */

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
	//get Clinic WHRER User area_id
	function _getClinicinarea($area){
		$query = $this->db->where('area_id' , $area)
			->get('clinic')
			->result();
		return $query;
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

	/* Manage Staff */
	// get All Officer and clinic JSON (for table)
	function _getOfficerjson(){
		$query = $this->db->join('clinic','clinic.clinic_id = officer.clinic_id','LEFT')->get('officer')->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/officer', $data);
	}
	// get Officer and clinic WHERE area_id JSON (for table)
	function _getOfficerAreajson($area){
		$query = $this->db->join('clinic','clinic.clinic_id = officer.clinic_id','LEFT')->where('area_id',$area)->get('officer')->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/officer', $data);
	}	
	// Delete Staff
	function _staffDelete($officerID){
		$this->db->where('officer_id',$officerID)->delete('officer');
	}
	// get All clinic
	function _getClinic(){
		$query = $this->db->get('clinic')->result();
		return $query;;
	}
	function _updateStaffinfo($officerID,$clinic,$status){
		$result = $this->db->where('officer_id', $officerID)
		->set('clinic_id' , $clinic)->set('officer_status' , $status)
		->update('officer');
	}
	function _updateStaffpassword($officerID,$password){
		$result = $this->db->where('officer_id', $officerID)
		->set('officer_password' , md5($password))
		->update('officer');
	}
	/* END Manage Staff */

	/* Manage Page */
	// Add news
	function _addnews($officer_id, $topic, $detail, $picname, $filename){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$query = $this->db->set('officer_id' , $officer_id)
		->set('news_name', $topic)
		->set('news_detail', $detail)
		->set('news_file', $picname)
		->set('news_otherfile', $filename)
		->set('news_postdate', $now)
		->insert('news');
	}
	// Add news without Files
	function _addnewsNofile($officer_id, $topic, $detail, $picname){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$query = $this->db->set('officer_id' , $officer_id)
		->set('news_name', $topic)
		->set('news_detail', $detail)
		->set('news_file', $picname)
		->set('news_postdate', $now)
		->insert('news');
	}
	// Get all news
	function _getNewsjson(){
		$sql = 'SELECT n.news_id, o.officer_name, n.news_name, n.news_otherfile, n.news_postdate FROM news AS n LEFT JOIN officer AS o ON n.officer_id = o.officer_id';
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/news', $data);
	}
	// Get news WHERE newsID
	function _getNews($newsid){
		$query = $this->db->where('news_id',$newsid)->get('news')->row();
		return $query;
	}
	// Update Content
	function _editNewcontent($newsid, $topic, $detail){
		$this->db->set('news_name' , $topic)
		->set('news_detail', $detail)
		->where('news_id', $newsid)
		->update('news');
	}
	// Update Pic
	function _editNewpic($newsid, $picname){
		$this->db->set('news_file' , $picname)
		->where('news_id', $newsid)
		->update('news');
	}
	//Update File
	function _editNewfile($newsid, $filename){
		$this->db->set('news_otherfile' , $filename)
		->where('news_id', $newsid)
		->update('news');
	}
	/* ./ Manage Page */

	/* Manage Register */
	// Get all Register JSON
	function _getRegisterjson(){
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT registers.registers_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber, works.ever_clinic_name,
				registers.lawyer_ban_status, registers.registers_timeregister, clinic.clinic_name, registers.registers_status
				FROM registers 
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN works ON works.information_id = information.information_id
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE registers.registers_status != 'ผ่าน' AND registers.registers_timeregister >= $date";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/register', $data);
	}
	// Get Register with Area JSON
	function _getRegisterAreajson($area){
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT registers.registers_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber, works.ever_clinic_name,
				registers.lawyer_ban_status, registers.registers_timeregister, clinic.clinic_name, registers.registers_status
				FROM registers 
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN works ON works.information_id = information.information_id
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE registers.registers_status != 'ผ่าน' AND clinic.area_id = $area AND registers.registers_timeregister >= $date";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/register', $data);
	}
	// Get Register with Clinic JSON
	function _getRegisterClinicjson($clinic){
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT registers.registers_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber, works.ever_clinic_name,
				registers.lawyer_ban_status, registers.registers_timeregister, clinic.clinic_name, registers.registers_status
				FROM registers 
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN works ON works.information_id = information.information_id
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE registers.registers_status != 'ผ่าน' AND registers.clinic_id = $clinic AND registers.registers_timeregister >= $date";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/register', $data);
	}
	// Update register Fail
	function _registerfail($registerid){
		$this->db->set('registers_status', 'ไม่ผ่าน')
		->where('registers_id',$registerid)
		->update('registers');
	}
	// Update register Pass
	function _registerpass($registerid,$banstatus,$idcard){
		// Upddate Status
		$this->db->set('registers_status', 'ผ่าน')
		->where('registers_id',$registerid)
		->update('registers');
		// Insert lawyer
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$year = substr($now, 0, 4);
		$datestart = $year.'-10-01';
		$dateexp = ($year+2).'-10-01';
		if ($banstatus == 'เคย') {
			$max = $this->db->select_max('lawyer_id')->where('information_idcard', $idcard)->get('lawyer')->row();
			$bandetail = $this->db->select('lawyer_ban_detail')->where('lawyer_id', $max->lawyer_id)->get('lawyer')->row();
			$bandetail = $bandetail->lawyer_ban_detail;
		}else{
			$bandetail = '-';
		}
		$this->db->set('registers_id', $registerid)
		->set('lawyer_ban_status', $banstatus)
		->set('lawyer_ban_detail', $bandetail)
		->set('information_idcard', $idcard)
		->set('lawyer_date_approve', $now)
		->set('lawyer_date_start', $datestart)
		->set('lawyer_date_exp', $dateexp)
		->insert('lawyer');
	}
	/* ./Manage Register */

	/* History Register */
	// Get all Register JSON
	function _getHistoryregisterjson(){
		$sql = "SELECT registers.registers_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber, works.ever_clinic_name,
				registers.lawyer_ban_status, registers.registers_timeregister, clinic.clinic_name, registers.registers_status
				FROM registers 
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN works ON works.information_id = information.information_id
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/register', $data);
	}
	// Get Register with Area JSON
	function _getHistoryregisterAreajson($area){
		$sql = "SELECT registers.registers_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber, works.ever_clinic_name,
				registers.lawyer_ban_status, registers.registers_timeregister, clinic.clinic_name, registers.registers_status
				FROM registers 
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN works ON works.information_id = information.information_id
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE clinic.area_id = $area";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/register', $data);
	}
	// Get Register with Clinic JSON
	function _getHistoryregisterClinicjson($clinic){
		$sql = "SELECT registers.registers_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber, works.ever_clinic_name,
				registers.lawyer_ban_status, registers.registers_timeregister, clinic.clinic_name, registers.registers_status
				FROM registers 
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN works ON works.information_id = information.information_id
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE registers.clinic_id = $clinic";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/register', $data);
	}
	/* ./History Register */

	/* History Lawyer*/
	// Get all Lawyer JSON
	function _getHistorylawyerjson(){
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, lawyer.lawyer_ban_detail, lawyer.lawyer_status,clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get Lawyer with Area JSON
	function _getHistorylawyerAreajson($area){
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, lawyer.lawyer_ban_detail, lawyer.lawyer_status,clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE clinic.area_id = $area";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get Lawyer with Clinic JSON
	function _getHistorylawyerClinicjson($clinic){
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, lawyer.lawyer_ban_detail, lawyer.lawyer_status,clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE registers.clinic_id = $clinic";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	/* ./History Lawyer*/

	/* Manage Lawyer */
	// Get all Lawyer JSON
	function _getLawyerjson(){
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง'";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get Lawyer with Area JSON
	function _getLawyerAreajson($area){
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE clinic.area_id = $area AND lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง'";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get Lawyer with Clinic JSON
	function _getLawyerClinicjson($clinic){
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE registers.clinic_id = $clinic AND lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง'";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get all Lawyer70 JSON
	function _getLawyer70json(){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$age = date('Y-m-d', strtotime('-25537 day', strtotime($now)));
		$age = "'".$age."'";
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง' AND information.information_birthday <= $age";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get Lawyer70 with Area JSON
	function _getLawyer70Areajson($area){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$age = date('Y-m-d', strtotime('-25537 day', strtotime($now)));
		$age = "'".$age."'";
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE clinic.area_id = $area AND lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง' AND information.information_birthday <= $age";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get Lawyer70 with Clinic JSON
	function _getLawyer70Clinicjson($clinic){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$age = date('Y-m-d', strtotime('-25537 day', strtotime($now)));
		$age = "'".$age."'";
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE registers.clinic_id = $clinic AND lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง' AND information.information_birthday <= $age";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get all Lawyer in Blacklists JSON
	function _getLawyerbanpagejson(){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$age = date('Y-m-d', strtotime('-25537 day', strtotime($now)));
		$age = "'".$age."'";
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, lawyer.lawyer_ban_detail, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง' AND lawyer.lawyer_ban_status = 'มีสถานะ'";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get Lawyer in Blacklists with Area JSON
	function _getLawyerbanpageAreajson($area){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$age = date('Y-m-d', strtotime('-25537 day', strtotime($now)));
		$age = "'".$age."'";
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, lawyer.lawyer_ban_detail, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE clinic.area_id = $area AND lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง' AND lawyer.lawyer_ban_status = 'มีสถานะ'";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Get Lawyer in Blacklists with Clinic JSON
	function _getLawyerbanpageClinicjson($clinic){
		$now = unix_to_human(now('+7'),TRUE,'eu');
		$age = date('Y-m-d', strtotime('-25537 day', strtotime($now)));
		$age = "'".$age."'";
		$date = "'".(date('Y')-2).'-10-01'."'";
		$sql = "SELECT lawyer.lawyer_id, information.information_name, information.information_lastname, 
				information.information_idcard, information.information_phonenumber,
				lawyer.lawyer_ban_status, lawyer.lawyer_ban_detail, clinic.clinic_name, lawyer.lawyer_date_start, lawyer.lawyer_date_exp
				FROM lawyer 
				LEFT JOIN registers ON registers.registers_id = lawyer.registers_id
				LEFT JOIN information ON registers.information_id = information.information_id 
				LEFT JOIN clinic ON registers.clinic_id = clinic.clinic_id
				WHERE registers.clinic_id = $clinic AND lawyer.lawyer_date_start >= $date AND lawyer.lawyer_status = 'ดำรงตำแหน่ง' AND lawyer.lawyer_ban_status = 'มีสถานะ'";
		$query = $this->db->query($sql)->result_array();
		$data['data'] = json_encode($query);
		$this->load->view('dashboard/home/content/json/lawyer', $data);
	}
	// Lawyer Remove
	function _lawyerRemove($lawyerid){
		$this->db->set('lawyer_status', 'พ้นสภาพ')
		->where('lawyer_id',$lawyerid)
		->update('lawyer');
	}
	// Lawyer Ban
	function _lawyerBan($lawyerid,$reason){
		$this->db->set('lawyer_ban_status', 'มีสถานะ')->set('lawyer_ban_detail', $reason)
		->where('lawyer_id',$lawyerid)
		->update('lawyer');
	}
	// Lawyer Unban
	function _lawyerUnban($lawyerid){
		$this->db->set('lawyer_ban_status', '-')->set('lawyer_ban_detail', '-')
		->where('lawyer_id',$lawyerid)
		->update('lawyer');
	}
	/* ./Manage Lawyer */
}
?>