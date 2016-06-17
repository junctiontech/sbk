<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->languageID   = 1;
	}	
	public function get_categories()
	{
		$this->db->select('t1.categoriesID, t1.categoriesUrlKey,categoriesStatus,t2.categoryName, t1.createdOn');
		$this->db->from('s4k_categories t1');
		$this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID', 'left');
		$query=$this->db->get();
		return $query->result();
	}
	Public function Add_Categories($table, $table1, $data, $data1)
	{	
		$this->db->insert($table, $data);
		$categoriesID = $this->db->insert_id();
		($data1['categoriesID']=$categoriesID);
		$this->db->insert($table1, $data1);
	}	
	public function get_Categori($categoriesID)
	{
		$this->db->select('t1.categoriesID, t1.categoriesUrlKey,categoriesStatus,categoriesSortOrder, t2.categoryName');
		$this->db->from('s4k_categories t1');
		$this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID', 'left');
		$this->db->where($categoriesID);
		$query=$this->db->get();
		return $query->result();
	}	
	public function Update_Categories($table, $table1, $data, $data1, $categoriesID)
	{
		$this->db->where($categoriesID);
		$this->db->update($table, $data);
		$this->db->where($categoriesID);
		$this->db->update($table1, $data1);
	}	
	public function get_shopName($table)
	{
		$shopdatas = $this->db->get($table);
		return  $shopdatas->result();
	}	
	public function Dlt_categories($categoriesID)
	{ 
		$this->db->query("DELETE s4k_categories,s4k_category_details FROM s4k_categories JOIN s4k_category_details ON s4k_categories.categoriesID=s4k_category_details.categoriesID WHERE s4k_categories.categoriesID ='$categoriesID'");
	}
	public function Categories_name($table)
	{
		$categories = $this->db->get($table);
		return $categories->result();
	}
	public function Categories_Shop ($table, $categoriesID)
	{		
		$this->db->where("MATCH (`categoryUrl`) AGAINST ('{$categoriesID}')");
		$where = ['categoriesID' => '', 'subCategoriesID' => ''];
		$this->db->where($where);
		$category= $this->db->get($table);
		return $category->result();
	}
	public function Update_Map($table, $data, $categoryToShopID)
	{
		$this->db->where('categoryToShopID', $categoryToShopID);
		$this->db->update($table, $data);
	}
	public function Fatch_mapcategories()
	 {
		 $this->db->select('t1.categoryToShopID, t1.categoryUrl`, t2.categoryName, t3.shopName');
		 $this->db->from('s4k_category_to_shop  t1');
		 $this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID', 'left');
		 $this->db->join('s4k_shops t3', 't1.shopID=t3.shopID','left');
		 $where = array('t1.categoriesID !=' => '' );
		 $this->db->where($where);
		 $tablefetch = $this->db->get();
		 return $tablefetch->result();
	}
	 public function map_fatch($categoriesID)
	{
		$this->db->select('t1.categoryToShopID,t1.categoryUrl, t2.categoriesID,categoryName');
		$this->db->from('s4k_category_to_shop t1');
		$this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID','left');
		$this->db->where ($categoriesID);
		$map = $this->db->get();
		return $map->result();
	} 
	
	public function map_category($data5)
	{   
		$this->db->select('t1.categoryToShopID, t1.categoriesID,categoryUrl');
		$this->db->from('s4k_category_to_shop t1');
		$this->db->where("MATCH (`categoryUrl`) AGAINST ('{$data5}')");
		$where = array ('categoriesID' => '', 'subCategoriesID' =>'' );
		$this->db->where($where);
		$min = $this->db->get();
		return $min->result();
	}
	public function updaterecords($table=false,$data=false,$where=false)
	{   
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function get_brand($table)
	{
		$brand = $this->db->get($table);
		return $brand->result();
	}
	public function add_brand($table, $data)
	{
		$this->db->insert($table, $data);
	}
	public function Brand_delete($table, $brandID)
	{
		$where = array ('brandID' => $brandID);
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function Brand_fatch($table, $brandID)
	{
		$this->db->where($brandID);
		$brand = $this->db->get($table);
		return $brand->result();
	}
	public function Update_brand ($table,$data,$brandID)
	{
		$this->db->where($brandID);
		$this->db->update($table, $data);
	}
	public function load_category($table)
	{
		$brand_name = $this->db->get($table);
		return $brand_name->result();
	}
	
	public function get_categorydata()
	{
		$this->db->select('t1.categoriesID,t2.categoryName');
		$this->db->from('s4k_categories t1');
		$this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID', 'left');
		$this->db->where(array('categoriesStatus'=>'Active'));
		$query=$this->db->get();
		return $query->result();
	}
//	(select * from `s4k_filter_group_to_attribute` where `filterGroupID`=t1.filterGroupID) as grwpatt
	public function get_catfilter($categoriesID)
	{
		$this->db->select('t1.filterGroupID,groupName,t1.categoryID,t3.categoryName,sortOrder,filterStatus,	filterType');
		$this->db->from('s4k_filter_group t1');
		$this->db->join('s4k_categories t2','t1.categoryID=t2.categoriesID','left');
		$this->db->join('s4k_category_details t3','t2.categoriesID=t3.categoriesID', 'left');
		$this->db->where(array('t1.categoryID'=>$categoriesID));
		$query=$this->db->get();
		return $query->result();
	}
	public function get_grpatt($filterGroupID)
	{
		$this->db->select('*');
		$this->db->from('s4k_filter_group_to_attribute t1');
		$this->db->where(array('t1.filterGroupID'=>$filterGroupID));
		$query=$this->db->get();
		return $query->result();
	}
	public function insert_catfilter($data1=false,$name=false,$lable=false,$value=false,$where=false)
	{
		if($where){
			
		}else{
			$this->db->insert('s4k_filter_group',$data1);
			$filterGroupID=$this->db->insert_id();
			if(!empty($filterGroupID) && !empty($name) && !empty($lable) && !empty($value)){
				foreach($name as $key=>$names){
					$attributeinfo=array('lable'=>isset($lable[$key])?$lable[$key]:'','name'=>isset($names)?$names:'','value'=>isset($value[$key])?$value[$key]:'','filterGroupID'=>$filterGroupID);
					$this->db->insert('s4k_filter_group_to_attribute',$attributeinfo);
				}
			}
		}
	}
} 