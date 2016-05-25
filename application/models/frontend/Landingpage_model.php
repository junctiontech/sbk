<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landingpage_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->database();
		$this->languageID   = 1;
	}
	
	public function get_topbrand(){
		$this->db->select('t1.categoriesID,brandName,brandKey,categoriesUrlKey');
		$this->db->from('s4k_brand t1');
		$this->db->join('s4k_categories t2','t1.categoriesID=t2.categoriesID','left');
		$this->db->where(array('brandStatus'=>'Active'));
		$this->db->order_by('brandSortOrder','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_categories(){
		$this->db->select('t1.categoriesID,categoriesUrlKey,categoryName');
		$this->db->from('s4k_categories t1');
		$this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID','left');
		$this->db->where(array('categoriesStatus'=>'Active','languageID'=>$this->languageID));
		$this->db->order_by('categoriesSortOrder','ASC');
		$this->db->order_by('categoriesUrlKey','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_inventory_data($where=false){
		$this->db->select('productImage,categoriesUrlKey,productsUrlKey,t4.productsID,productName,productDescription,productAttributeLable,productAttributeValue,imageName,productImageTitle,productImageAltTag,productPrice,productShopUrl');
		$this->db->from('s4k_inventory_consumption t1');
		$this->db->join('s4k_inventory_master t2','t1.inventoryMasterID=t2.inventoryMasterID','left');
		$this->db->join('s4k_inventory_type t3','t2.inventoryTypeID=t3.inventoryTypeID','left');
		$this->db->join('s4k_products t4','t1.productID=t4.productsID','left');
		$this->db->join('s4k_product_details t5','t4.productsID=t5.productsID','left');
		$this->db->join('s4k_product_attribute t6','t4.productsID=t6.productsID','left');
		$this->db->join('s4k_product_attribute_details t7','t6.productAttributeID=t7.productAttributeID','left');
		$this->db->join('s4k_product_images t8','t4.productsID=t8.productsID','left');
		$this->db->join('s4k_product_image_details t9','t8.productImageID=t9.productImageID','left');
		$this->db->join('s4k_product_price t10','t4.productsID=t10.productsID','left');
		$this->db->join('s4k_categories t11','t4.categoriesID=t11.categoriesID','left');
		$this->db->where(array('inventoryKey'=>$where,'t1.Status'=>'Active'));
		$this->db->order_by('t1.sortOrder','DESC');
		$this->db->order_by('t1.createdOn','DESC');
		$this->db->group_by('productsUrlKey');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_products($extraquery=false,$searchqry=false,$where=false){
		$this->db->select('t1.productsID,t8.categoriesID,t8.categoriesUrlKey,productsUrlKey,t2.productName,t2.productDescription,t4.	productAttributeLable,t4.productAttributeValue,t5.imageName,t6.productImageTitle,t6.productImageAltTag,t7.productPrice,t7.productShopUrl');
		if($extraquery){
			$this->db->select('t9.shop_image,t9.shopID');
			
		}
		$this->db->from('s4k_products t1');
		$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID','left');
		$this->db->join('s4k_product_attribute t3','t1.productsID=t3.productsID','left');
		$this->db->join('s4k_product_attribute_details t4','t3.productAttributeID=t4.productAttributeID','left');
		$this->db->join('s4k_product_images t5','t1.productsID=t5.productsID','left');
		$this->db->join('s4k_product_image_details t6','t5.productImageID=t6.productImageID','left');
		$this->db->join('s4k_product_price t7','t1.productsID=t7.productsID','left');
		$this->db->join('s4k_categories t8','t1.categoriesID=t8.categoriesID','left');
		if($extraquery){
			$this->db->join('s4k_shops t9','t7.shopID=t9.shopID','left');
			$this->db->where($extraquery);
			$this->db->order_by('productPrice','ASC');
		}elseif($searchqry){
			//.$this->db->like($searchqry);
			$this->db->where("MATCH (`productName`) AGAINST ('{$searchqry}')");
		}
		if($where){
			$this->db->where($where);
		}
		if(empty($extraquery)){
		$this->db->order_by('productsSortOrder','ASC');
		$this->db->order_by('productsUrlKey','ASC');
		$this->db->order_by('productPrice','ASC');
		$this->db->group_by('productsUrlKey');
		}
		//$this->db->limit(2000);

		$query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}
	
	public function get_shopprices($productID=false,$shopID=false){
		
		$this->db->select('t1.productPrice,t1.productShopUrl,t2.shop_image');
		$this->db->from('s4k_product_price t1');
		$this->db->join('s4k_shops t2','t1.shopID=t2.shopID');
		$this->db->where(array('productsID'=>$productID,'t1.shopID !=' =>$shopID));
		$this->db->order_by('shopSortOrder','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
}

?>