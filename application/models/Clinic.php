<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clinic extends CI_Model {

    function _construct(){
        parent::_construct();
    }
    public function getAllClinic(){
        $db = $this->db->get('clinic')->result();
        return $db;
    }
    public function getArea(){
        $db = $this->db->get('area')->result();
        return $db;
    }

}