<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userwishlist_model extends CI_Model
 {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_userwishlist()
	{
		$table = ['s4k_user_wishlist'];		
		$this->db->select('productID');
		$this->db->from($table);
		$this->db->where("userID !=", 0);	
		$user=$this->db->get();
		return $user->result();
	}
	 public function get_usernotify()
	 {
		$this->db->order_by('notifyID','DESC');
		$query=$this->db->get('s4k_notify');
		// echo $this->db->last_query(); die;
		 return $query->result();
	 }
 }