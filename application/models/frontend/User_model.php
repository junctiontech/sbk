<?php
class User_model extends CI_Model
{
	
	public function get_wishlistcount($table,$where){
		$this->db->select('productID');
		$this->db->from($table);
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function addwishlist($table,$data){
		$this->db->insert($table,$data);
	}
	
	
}