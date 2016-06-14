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
		
		$this->db->select('productImage,t11.categoriesUrlKey,t4.productsUrlKey,t4.productsID,t4.productName,t4.productDescription,t6.productAttributeLable,t6.productAttributeValue,t8.imageName,t8.productImageTitle,t8.productImageAltTag,t10.productPrice,t10.productShopUrl');
		$this->db->from('s4k_inventory_consumption t1');
		$this->db->join('s4k_inventory_master t2','t1.inventoryMasterID=t2.inventoryMasterID','left');
		$this->db->join('s4k_inventory_type t3','t2.inventoryTypeID=t3.inventoryTypeID','left');
		$this->db->join('s4k_products_map t4','t1.productID=t4.productsID','left');
		//$this->db->join('s4k_product_details t5','t4.productsID=t5.productsID','left');
		$this->db->join('s4k_product_attribute_map t6','t4.productsID=t6.productsID','left');
		//$this->db->join('s4k_product_attribute_details t7','t6.productAttributeID=t7.productAttributeID','left');
		$this->db->join('s4k_product_images_map t8','t4.productsID=t8.productsID','left');
		//$this->db->join('s4k_product_image_details t9','t8.productImageID=t9.productImageID','left');
		$this->db->join('s4k_product_price_map t10','t4.productsID=t10.productsID','left');
		$this->db->join('s4k_categories t11','t4.categoriesID=t11.categoriesID','left');
		$this->db->where(array('inventoryKey'=>$where,'t1.Status'=>'Active'));
		$this->db->order_by('t1.sortOrder','DESC');
		$this->db->order_by('t1.createdOn','DESC');
		$this->db->group_by('t4.productsUrlKey');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_products($extraquery=false,$searchqry=false,$where=false,$where1=false){
		$this->db->select('t1.productsID,t8.categoriesID,t8.categoriesUrlKey,productsUrlKey,productName,productDescription,	productAttributeLable,productAttributeValue,t5.imageName,productImageTitle,productImageAltTag,t7.productPrice,t7.productShopUrl');
		if($extraquery){
			$this->db->select('t9.shop_image,t9.shopID');
			
		}
		$this->db->from('s4k_products_map t1');
		//$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID','left');
		$this->db->join('s4k_product_attribute_map t3','t1.productsID=t3.productsID','left');
		//$this->db->join('s4k_product_attribute_details t4','t3.productAttributeID=t4.productAttributeID','left');
		$this->db->join('s4k_product_images_map t5','t1.productsID=t5.productsID','left');
		//$this->db->join('s4k_product_image_details t6','t5.productImageID=t6.productImageID','left');
		$this->db->join('s4k_product_price_map t7','t1.productsID=t7.productsID','left');
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
		}elseif($where1){
			$this->db->where($where1);
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
		
		$this->db->select('t2.productPrice,t2.productShopUrl,t3.shop_image');
		$this->db->from('s4k_product_mapping t1');
		$this->db->join('s4k_product_price t2','t1.childProductID=t2.productsID');
		$this->db->join('s4k_shops t3','t3.shopID=t2.shopID');
		$this->db->where(array('parentProductID'=>$productID));
		$this->db->order_by('shopSortOrder','ASC');
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}
	public function fetchdata_compare_product($productid=false)
	{
		$this->db->select('t1.productName,t1.productsID');
		$this->db->from('s4k_products_map t1');
		$this->db->where(array('t1.productsID'=>$productid));
		$query=$this->db->get();
		return $query->result();
			
	}
	
	function comparepro($compareproduct=false)
	{
			
		$qry=$this->db->query("SELECT `t1`.`productsID`, `t1`.`productName`, `t1`.`productDescription`, `t3`.`imageName`, `t4`.`productPrice` FROM 	`s4k_products_map` `t1` JOIN `s4k_product_images_map` `t3` ON `t3`.`productsID`=`t1`.`productsID` JOIN `s4k_product_price_map` `t4` ON `t4`.`productsID`=`t1`.`productsID` WHERE `t1`.`productsID` IN($compareproduct)");
		return $qry->result();
	}
	
	function attribute($compareproduct=false)
	{
			
		$qry=$this->db->query("SELECT `t1`.`productsID`, `t1`.`productName`,`t2`.`productAttributeLable`, `t2`.`productAttributeValue` FROM 	`s4k_products_map` `t1` JOIN `s4k_product_attribute_map` `t2` ON `t2`.`productsID`=`t1`.`productsID` WHERE `t1`.`productsID` IN($compareproduct) ");
		return $qry->result();
	}
	
	public function get_filters($categoriesUrlKey){
		$this->db->select('t2.categoriesID,filterGroupID,groupName,filterType');
		$this->db->from('s4k_filter_group t1');
		$this->db->join('s4k_categories t2','t2.categoriesID=t1.categoryID','left');
		$this->db->where(array('categoriesUrlKey'=>$categoriesUrlKey));
		$this->db->order_by('t1.sortOrder','ASC');
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
	
	public function get_deals(){
		$this->db->select('t1.offer_name,coupon_title,coupon_description,coupon_code,link,url');
		$this->db->from('s4k_deals t1');
		$this->db->join('s4k_deals_banner t2','t1.dealID=t2.dealID','left');
		$this->db->where(array('t1.Status'=>'Active'));
		$this->db->limit(40);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_dealsgategory(){
		$this->db->select('t1.category');
		$this->db->from('s4k_deals t1');
		$this->db->where(array('t1.Status'=>'Active','category !='=>''));
		$this->db->group_by('category');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_deals_by_category($category){
		$this->db->select('t1.offer_name,coupon_title,coupon_description,coupon_code,link,url,coupon_expiry,added');
		$this->db->from('s4k_deals t1');
		$this->db->join('s4k_deals_banner t2','t1.dealID=t2.dealID','left');
		$this->db->where(array('t1.Status'=>'Active','category'=>$category));
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_attribute_by_category($category){
		$this->db->select('t1.productAttributeLable,t1.AttributeID');
		$this->db->from('s4k_categories_to_attribute t1');
		$this->db->where(array('categoriesID'=>$category));
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_attribute_by_product($AttributeID,$productsID=false){
		$this->db->select('t1.productAttributeLable,t1.productAttributeValue');
		$this->db->from('s4k_product_attribute_map t1');
		$this->db->where(array('AttributeID'=>$AttributeID,'productsID'=>$productsID));
		$query=$this->db->get();
		return $query->result();
	}
}

?>