<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategories_Model extends CI_Model
 {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->languageID   = 1;
	}	
	public function get_subcategory ()
	{
		$this->db->select('t1.subCategoriesID, t1.subCategoriesUrlKey,subCategoriesStatus, t2.subCategoryName, t1.createdOn, t3.categoryName');
		$this->db->from('s4k_sub_categories t1');
		$this->db->join('s4k_sub_category_details t2', 't1.subCategoriesID=t2.subCategoriesID','left');
		$this->db->join('s4k_category_details t3','t1.categoriesID=t3.categoriesID','left');
		$sub = $this->db->get();
		return $sub->result();
	}
	public function addcategory($table, $table2, $data, $data2, $categoryToShopIDs)
	{ 
		$this->db->insert($table, $data);
		$subCategoriesID = $this->db->insert_id();
		($data2['subCategoriesID']=$subCategoriesID);
		$this->db->insert($table2, $data2);
		foreach($categoryToShopIDs as $ac)
			{
				$categoryToShopID = $ac ;
				$data3 = array(
								'subCategoriesID' => $subCategoriesID
							 );
				$table3 = 's4k_category_to_shop';
				$this->db->where('categoryToShopID',$categoryToShopID);
				$this->db->update($table3, $data3);
			}		
	}	
	public function updatecategory ($table, $table2, $data, $data2,$categoryToShopIDs, $subCategoriesID)
	{  
		$this->db->where($subCategoriesID);
		$this->db->update($table, $data);
		$this->db->where($subCategoriesID);
		$this->db->update($table2, $data2);
		foreach ($categoryToShopIDs as $at)
		{  
				$categoryToShopID = $at ;
				$table3 = 's4k_category_to_shop';
				$this->db->where('categoryToShopID',$categoryToShopID);
				$this->db->update($table3, $subCategoriesID);
		}
	}	
	public function delete_subcategories($subCategoriesID)
	{
		$this->db->query("DELETE s4k_sub_categories,s4k_sub_category_details FROM s4k_sub_categories JOIN s4k_sub_category_details ON s4k_sub_categories.subCategoriesID=s4k_sub_category_details.subCategoriesID WHERE s4k_sub_categories.subCategoriesID ='$subCategoriesID'");
	}
	public function shop_tabledata ($table, $categoriesID)
	{
		$this->db->where("MATCH (`categoryUrl`) AGAINST ('{$categoriesID}')");
		$where = ['categoriesID' => '' ,'subCategoriesID' => ''];
		$this->db->where($where);
		$value= $this->db->get($table);
		return $value->result();
	}	
	public function fatchcategory ($table)
	{
		$category=$this->db->get($table);
		return $category->result();
	}
	public function fatchUpdate($subCategoriesID)
	{
		$this->db->select('t1.subCategoriesID, t1.categoriesID,subCategoriesSortOrder,subCategoriesStatus, t2.subCategoryName, t3.categoryToShopID,categoryUrl, t4.categoryName');
		$this->db->from('s4k_sub_categories t1');
		$this->db->join('s4k_sub_category_details t2','t1.subCategoriesID=t2.subCategoriesID','left');
		$this->db->join('s4k_category_to_shop t3','t1.subCategoriesID=t3.subCategoriesID','left');
		$this->db->join('s4k_category_details t4','t1.categoriesID=t4.categoriesID','left');
		$this->db->where($subCategoriesID);
		$query = $this->db->get();
		return $query->result();		
	}
	public function fatchCategoryUrl($ar)
	{
		$this->db->select('t1.categoryToShopID, t1.categoryToShopID,categoryUrl');
		$this->db->from('s4k_category_to_shop t1');
		$this->db->where("MATCH (`categoryUrl`) AGAINST ('{$ar}')");
		$where = array ('subCategoriesID' => '', 'categoriesID' => '' );
		$this->db->where($where);
		$Data = $this->db->get();
		return $Data->result();
	}
	public function updateSubcetegory ($table, $data, $subCategoriesID)
	{
		$this->db->where('subCategoriesID',$subCategoriesID);
		$this->db->update($table, $data);
	}
 }