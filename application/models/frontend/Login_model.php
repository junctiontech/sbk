<?php
class Login_model extends CI_Model
{
	
	function insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	function fetch($id=false)
	{
		$qry=$this->db->query("select * from s4k_user where userID='$id' ");
		return $qry->Result();
	}
}