<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deal_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();		
		$this->load->database();
	}
	public function viewdeal ()
	{
		$Deal=$this->db->get('s4k_deals');
		return $Deal->result();
		
	}
	public function UpdateStatus_deal ($data, $dealID)
	{ 
		$this->db->where('dealID',$dealID);
		$this->db->update('s4k_deals',$data);
	}
}