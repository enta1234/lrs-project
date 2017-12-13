<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class news extends CI_Model {

    function _construct(){
        parent::_construct();
    }
    public function getOrderNews(){
        $this->db->from('news');
        $this->db->order_by("news_postdate", "DESC");
        $this->db->limit('15');
        $query = $this->db->get(); 
        return $query->result();
    }
    public function getTopNews(){
        $this->db->from('news');
        $this->db->order_by("news_postdate", "DESC");
        $this->db->limit('1');
        $query = $this->db->get(); 
        return $query->row();
    }
    
}