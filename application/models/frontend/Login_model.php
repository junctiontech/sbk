<?php
class Login_model extends CI_Model
{
	
	public function get_login($table,$where){
		$this->db->select('userID,userTypeID,userFirstName,userProfileImage');
		$this->db->from($table);
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
	}
	
	function insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id=$this->db->insert_id();
		return $last_id;
	}
	function insert_login($table=false,$data=false,$where=false,$email=false,$update=false)
	{
		$last_id='';
		$this->db->select('userID');
		$this->db->from($table);
		$this->db->where($where);
		$query=$this->db->get();
		$result=$query->result();
		if(!empty($result[0]->userID)){
			$last_id=$result[0]->userID;
		}else{
			$this->db->select('userID');
			$this->db->from($table);
			$this->db->where(array('userEmail'=>$email));
			$query=$this->db->get();
			$result1=$query->result();
			if(!empty($result1[0]->userID)){
				$this->db->where(array('userEmail'=>$email));
				$this->db->update($table,$update);
				$last_id=$result1[0]->userID;
			}else{
			$this->db->insert($table,$data);
			$last_id=$this->db->insert_id();
			}
		}
		
		return $last_id;
	}
	function fetch($id=false)
	{
		$qry=$this->db->query("select * from s4k_user where userID='$id' ");
		return $qry->Result();
	}
	public function get_data($table,$where){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
	}
	public function reset_pass($table=false, $data=false, $email=false)
	{
		//print_r($data); die;
		$this->db->where(array('userEmail'=>$email));
		$this->db->update($table, $data);
	}
	public function updateStatus ($data=false, $id=false)
	{
		$this->db->where(array('userID'=>$id));
		$this->db->update('s4k_user',$data);
		
	}	
}