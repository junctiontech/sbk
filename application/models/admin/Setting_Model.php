<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_Model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function Get_Shop($table)
	{
		$shop= $this->db->get($table);
		return $shop->result();
	}
	public function Add_Shop($table,$data)
	{
		$this->db->insert($table, $data);
	}	
	public function Update_Shop ($table, $data, $shopID)
	{
		$this->db->where($shopID);
		$this->db->update($table, $data);
	}
	public function Dlt_Shop($table,$shopID)
	{ 
		$where = array ('shopID'=>$shopID);
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function Shopdata_fatch($table, $shopID)
	{
		$this->db->where($shopID);
		$shopdata = $this->db->get($table);
		return $shopdata->result();
	}
	public function Insert_api ($table, $data)
	{
		$this->db->insert($table, $data);
	}
	public function Update_api($table, $data, $apiID)
	{
		$this->db->where($apiID);
		$this->db->update($table, $data);
	}
	public function get_tableapi($table)
	{
		$tableapi = $this->db->get($table);
		return $tableapi->result();
	}
	public function updatefatch($table, $apiID)
	{
		$this->db->where($apiID);
		$fatch = $this->db->get($table);
		return $fatch->result();
	}
	public function api_delete ($table, $apiID)
	{
		$where = array ('apiID' => $apiID);
		$this->db->where($where);
		$this->db->delete($table);
	}
}