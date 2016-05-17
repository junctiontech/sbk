<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->database();
		$this->languageID   = 1;
	}
	
	
	
	public function get_product_by_cat($extraquery=false){
		$this->db->select('t1.productsID,t2.productName');
		$this->db->from('s4k_products t1');
		$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID','left');
		$this->db->where($extraquery);
		$this->db->order_by('productName','ASC');
		$this->db->group_by('productsUrlKey');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_categories(){
		$this->db->select('t1.categoriesID,categoryName');
		$this->db->from('s4k_categories t1');
		$this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID','left');
		$this->db->where(array('categoriesStatus'=>'Active','languageID'=>$this->languageID));
		$this->db->order_by('categoriesSortOrder','ASC');
		$this->db->order_by('categoriesUrlKey','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_inventorytype(){
		$this->db->select('t1.inventoryName,t1.inventoryTypeID');
		$this->db->from('s4k_inventory_type t1');
		$this->db->order_by('inventoryName','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_inventor_list(){
		$this->db->select('t1.inventoryMasterID,maxQuantity,t1.createdOn,inventoryName');
		$this->db->from('s4k_inventory_master t1');
		$this->db->join('s4k_inventory_type t2','t1.inventoryTypeID=t2.inventoryTypeID','left');
		$this->db->order_by('inventoryName','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_inventoryname(){
		$this->db->select('t2.inventoryName,t1.inventoryMasterID');
		$this->db->from('s4k_inventory_master t1');
		$this->db->join('s4k_inventory_type t2','t1.inventoryTypeID=t2.inventoryTypeID','left');
		$this->db->order_by('inventoryName','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function insert_data($table=false,$data=false,$where=false){
		if(!empty($where)){
			$this->db->where($where);
			$this->db->update($table,$data);
		}else{
			$this->db->insert($table,$data);
		}
	}
	
	public function get_data($select=false,$table=false,$where=false,$extraqry=false){
		//print_r($extraqry);die;
		$this->db->select($select);
		$this->db->from($table);
		if($extraqry){
			$this->db->join('s4k_products t2','t1.productID=t2.productsID','left');
		}
		if($where){
			$this->db->where($where);
		}
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_inventoryconsumptionlist(){
		$this->db->select('t1.inventoryConsumptionID,sortOrder,Status,t1.createdOn,t3.inventoryName,productName');
		$this->db->from('s4k_inventory_consumption t1');
		$this->db->join('s4k_inventory_master t2','t1.inventoryMasterID=t2.inventoryMasterID','left');
		$this->db->join('s4k_inventory_type t3','t2.inventoryTypeID=t3.inventoryTypeID','left');
		$this->db->join('s4k_product_details t4','t4.productsID=t1.productID','left');
		$this->db->order_by('t1.inventoryConsumptionID','DESC');
		$query=$this->db->get();
		return $query->result();
	}
	
}

?>