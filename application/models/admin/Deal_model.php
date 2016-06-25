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
	public function get_cetegorydeal()
	{
		$this->db->select('t1.category,dealID');
		$this->db->from('s4k_deals t1');
		$this->db->where(array('t1.Status'=>'Active','category !='=>''));
		$this->db->group_by('category');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_featuredealtype()
	{
		$this->db->select('t1.inventoryDealName,t1.dealTypeID');
		$this->db->from('s4k_inventorydeals_type t1');
		$this->db->order_by('inventoryDealName','ASC');
		$query=$this->db->get();
		return $query->result();		
	}
	public function add_featuredeal($table=false, $data=false,$where=false)
	{
		if(!empty($where)){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		else
		{
			$this->db->insert($table,$data);
		}
	}		
	public function featuredeal ()
	{
		$this->db->select('t1.dealMasterID, t2.inventoryDealName, t1.maxQuantity, t1.createdOn');
		$this->db->from('s4k_inventorydeals_master t1');
		$this->db->join('s4k_inventorydeals_type t2','t1.dealTypeID=t2.dealTypeID','left');		
		$query=$this->db->get();
		return $query->result();
	}
	public function get_deal($where)
	{
		$this->db->select('t1.dealTypeID,maxQuantity,dealMasterID');
		$this->db->from('s4k_inventorydeals_master t1');
		$this->db->where($where);
		$query= $this->db->get();
		return $query->result();
	} 
	public function get_featureDealName()
	{
		$this->db->select('t1.dealMasterID, t2.inventoryDealName');
		$this->db->from('s4k_inventorydeals_master t1');
		$this->db->join('s4k_inventorydeals_type t2','t1.dealTypeID=t2.dealTypeID','left');
		$this->db->order_by('inventoryDealName','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_databydealcategory($dealID)
	{
		$this->db->select('t1.coupon_title,dealID');
		$this->db->from('s4k_deals t1');
		$this->db->where(array('t1.Status'=>'Active','category'=>$dealID));
		$query =$this->db->get();
		return $query->result();
	}
	public function Add_featre_Deal($table=false,$data=false,$where=false)
	{
		if(!empty($where))
		{
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		else{
			$this->db->insert($table,$data);
		}		
	}
	public function get_newdeal()
	{
		$this->db->select('t1.dealConsumptionID, t2.coupon_title, t4.inventoryDealName,t1.sortOrder,t1.status,t1.createdOn');
		$this->db->from('s4k_inventorydeals_consumption t1');
		$this->db->join('s4k_deals t2','t1.dealID=t2.dealID','left');
		$this->db->join('s4k_inventorydeals_master t3','t1.dealMasterID=t3.dealMasterID','');
		$this->db->join('s4k_inventorydeals_type t4','t3.dealTypeID=t4.dealTypeID','left');
		$query=$this->db->get();
		return $query->result();
	}
	public function fatchnewdealupd($select,$table,$where,$extraselect)
	{
		//print_r($extraselect); die;
		$this->db->select($select);
		$this->db->from($table);
		if(!empty($extraselect))
		{
			$this->db->join('s4k_deals t2','t1.dealID=t2.dealID','left');
		}
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
	}
	public function get_by_dealcategory ($where)
	{
		$this->db->select('t1.coupon_title,t1.dealID');
		$this->db->from('s4k_deals t1');
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
	}
}