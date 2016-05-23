<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->database();
		$this->languageID   = 1;
	}
	
	public function get_login($table,$where){
		$this->db->select('userID,userTypeID,userFirstName,userProfileImage');
		$this->db->from($table);
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
	}
	
}

?>