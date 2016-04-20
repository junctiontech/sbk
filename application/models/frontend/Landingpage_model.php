<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landingpage_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->database();
		$this->languageID   = 1;
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
	
	public function get_products($extraquery=false){
		$this->db->select('t1.productsID,t8.categoriesID,t8.categoriesUrlKey,productsUrlKey,t2.productName,t2.productDescription,t4.	productAttributeLable,t4.productAttributeValue,t5.imageName,t6.productImageTitle,t6.productImageAltTag,t7.productPrice,t7.productShopUrl');
		$this->db->from('s4k_products t1');
		$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID','left');
		$this->db->join('s4k_product_attribute t3','t1.productsID=t3.productsID','left');
		$this->db->join('s4k_product_attribute_details t4','t3.productAttributeID=t4.productAttributeID','left');
		$this->db->join('s4k_product_images t5','t1.productsID=t5.productsID','left');
		$this->db->join('s4k_product_image_details t6','t5.productImageID=t6.productImageID','left');
		$this->db->join('s4k_product_price t7','t1.productsID=t7.productsID','left');
		$this->db->join('s4k_categories t8','t1.categoriesID=t8.categoriesID','left');
		if($extraquery){
			$this->db->where($extraquery);
		}
		$this->db->order_by('productsSortOrder','ASC');
		$this->db->order_by('productsUrlKey','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
}

?>