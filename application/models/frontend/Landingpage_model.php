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
	
	public function getProductName($productKey=false)
	{
		$this->db->distinct();
		$this->db->select('t1.productName');
		$this->db->from('s4k_products_map t1');
		$this->db->like(array('t1.productName'=>$productKey));
		$this->db->limit(15);
		$query=$this->db->get();
		return $query->result();
			
	}
	
	
	
	public function get_categories(){
		$this->db->select('t1.categoriesID,categoriesUrlKey,categoryName,categoryImage');
		$this->db->from('s4k_categories t1');
		$this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID','left');
		$this->db->where(array('categoriesStatus'=>'Active','languageID'=>$this->languageID));
		$this->db->order_by('categoriesSortOrder','ASC');
		$this->db->order_by('categoriesUrlKey','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_categoryID()
	{
			$this->db->select('t1.categoriesID');
			$this->db->from('s4k_categories t1');
			$this->db->where(array('categoriesStatus'=>'Active'));
			$query=$this->db->get();
			$result=$query->result();
		return $result;
	}
	
	public function get_inventory_data($where=false){
		
		$this->db->select('t11.categoriesUrlKey,t4.productsUrlKey,t4.sb4kProductID,t4.productsID,t4.productName,t4.productDescription,t6.productAttributeLable,t6.productAttributeValue,t8.imageName,t8.productImageTitle,t8.productImageAltTag,t10.productPrice,t10.productShopUrl,shop_image');
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
		$this->db->join('s4k_shops t12','t12.shopID=t10.shopID');
		$this->db->where(array('inventoryKey'=>$where,'t1.Status'=>'Active'));
		//$this->db->where_in('productAttributeLable',array('Handset Color','Internal'));
		$this->db->order_by('t1.sortOrder','DESC');
		$this->db->order_by('t1.createdOn','DESC');
		$this->db->group_by('t4.productsID');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_products_search($extraquery=false,$searchqry=false,$where=false,$where1=false,$categoriesID=false){
		$this->db->select('t1.productsID,t1.sb4kProductID,t8.categoriesID,t8.categoriesID,t8.categoriesUrlKey,productsUrlKey,productName,productDescription,	t5.imageName,productImageTitle,productImageAltTag,t7.productPrice,t7.productShopUrl,shop_image');
		if($extraquery){
			$this->db->select('t9.shop_image,t9.shopID');
			
		}
		$this->db->from('s4k_products_map t1');
		//$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID','left');
		//$this->db->join('s4k_product_attribute_map t3','t1.productsID=t3.productsID','left');
		//$this->db->join('s4k_product_attribute_details t4','t3.productAttributeID=t4.productAttributeID','left');
		$this->db->join('s4k_product_images_map t5','t1.productsID=t5.productsID','left');
		//$this->db->join('s4k_product_image_details t6','t5.productImageID=t6.productImageID','left');
		$this->db->join('s4k_product_price_map t7','t1.productsID=t7.productsID','left');
		$this->db->join('s4k_categories t8','t1.categoriesID=t8.categoriesID','left');
		$this->db->join('s4k_shops t9','t7.shopID=t9.shopID','left');
		if($extraquery){
			$this->db->join('s4k_shops t9','t7.shopID=t9.shopID','left');
			$this->db->where($extraquery);
			$this->db->order_by('productPrice','ASC');
		}elseif($searchqry){
			//.$this->db->like($searchqry);
			$this->db->like("productBrand",$searchqry);
		}
		//$this->db->where_in('productAttributeLable',array('Handset Color','Internal'));
		if($where){
			$this->db->where($where);
		}elseif($where1){
			$this->db->where($where1);
		}
		if(!empty($categoriesID)){
			$this->db->where($categoriesID);
		}
		if(empty($extraquery)){
		$this->db->order_by('productsSortOrder','ASC');
		$this->db->order_by('productsUrlKey','ASC');
		$this->db->order_by('productPrice','ASC');
		$this->db->group_by('productsID');
		}
		
		

		$query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}
	
	public function get_products($extraquery=false,$searchqry=false,$where=false,$where1=false,$limit=false,$page=false){
		$this->db->select('t1.productsID,t1.sb4kProductID,t8.categoriesID,t8.categoriesUrlKey,productsUrlKey,productName,productDescription,	t5.imageName,productImageTitle,productImageAltTag,t7.productPrice,t7.productShopUrl');//productAttributeLable,productAttributeValue,
		if($extraquery){
			$this->db->select('t9.shop_image,t9.shopID');
			
		}else{
			$this->db->select('t9.shop_image');
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
			$this->db->like("productBrand",$searchqry);
		}else{
			$this->db->join('s4k_shops t9','t7.shopID=t9.shopID','left');
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
		$this->db->group_by('t1.sb4kProductID');
		}
		if($limit){
		$this->db->limit($limit,$page);
		}
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}
	
	public function getcountproduct($where=false)
	{
		$this->db->select('count(t1.productsID) as total');
		$this->db->from('s4k_products_map t1');
		$this->db->join('s4k_categories t8','t1.categoriesID=t8.categoriesID','left');
		$this->db->where($where);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_shopprices($productID=false,$shopID=false){
		
		$this->db->select('t2.productPrice,t2.productShopUrl,t3.shopID');
		$this->db->from('s4k_product_mapping t1');
		$this->db->join('s4k_product_price t2','t1.childProductID=t2.shopProductID and t1.childShopID=t2.shopID');
		$this->db->join('s4k_shops t3','t3.shopID=t2.shopID');
		$this->db->join('s4k_product_price_map t4','t4.shopID=t1.parentShopID and t4.shopProductID=t1.parentProductID');
		$this->db->where(array('t4.productsID'=>$productID,'t4.shopID'=>$shopID));
		$this->db->order_by('shopSortOrder','ASC');
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	public function get_shoppricesApp($productID=false,$shopID=false)
	{
		$this->db->select('t2.productPrice,t2.productShopUrl,t3.shop_image,t3.shopID');
		$this->db->from('s4k_product_mapping t1');
		$this->db->join('s4k_product_price t2','t1.childProductID=t2.shopProductID and t1.childShopID=t2.shopID');
		$this->db->join('s4k_shops t3','t3.shopID=t2.shopID');
		$this->db->join('s4k_product_price_map t4','t4.shopID=t1.parentShopID and t4.shopProductID=t1.parentProductID');
		$this->db->where(array('t4.productsID'=>$productID,'t4.shopID'=>$shopID));
		$this->db->order_by('shopSortOrder','ASC');
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	}
	public function shop_image()
	{
		$this->db->select('t1.shop_image,t1.shopID');
		$this->db->from('s4k_shops t1');
		$query=$this->db->get();
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
 $qry=$this->db->query("SELECT `t1`.`productsID`, `t1`.`categoriesID`,`t1`.`productName`, `t1`.`productsUrlKey`,`t1`.`sb4kProductID`,  `t3`.`imageName`, `t4`.`productPrice`, `t5`.`categoriesUrlKey`,`t6`.`shop_image` FROM 	`s4k_products_map` `t1` JOIN `s4k_product_images_map` `t3` ON `t3`.`productsID`=`t1`.`productsID` JOIN `s4k_product_price_map` `t4` ON `t4`.`productsID`=`t1`.`productsID` JOIN `s4k_categories` `t5` ON `t5`.`categoriesID`=`t1`.`categoriesID` JOIN `s4k_shops` `t6` ON `t4`.`shopID`=`t6`.`shopID` WHERE `t1`.`productsID` IN($compareproduct)");
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
	public function get_filters2 ($searchq=false)
	{	 
		$this->db->select('categoriesUrlKey');
		$this->db->from('s4k_category_details t1');
		$this->db->join('s4k_categories t2','t2.categoriesID=t1.categoriesID','left');
		$this->db->where($searchq);	
		$query=$this->db->get();	
		//echo $this->db->last_query(); die;
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
	
	public function get_deals_by_category($category,$limit,$page=false){
		$this->db->select('t1.offer_name,coupon_title,coupon_description,coupon_code,link,url,coupon_expiry,added');
		$this->db->from('s4k_deals t1');
		$this->db->join('s4k_deals_banner t2','t1.dealID=t2.dealID','left');
		$this->db->where(array('t1.Status'=>'Active','category'=>$category));
		$this->db->limit($limit,$page);
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_deals_counttotal($category){
		$this->db->select('count(t1.dealID) as total');
		$this->db->from('s4k_deals t1');
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

	
	function compare_pro_attribute($categoryinfo=false)
	{
		$query=$this->db->query("SELECT DISTINCT `t1`.`productAttributeLable` FROM `s4k_product_attribute_map` `t1` WHERE `t1`.`productsID` IN($categoryinfo)");
		return $query->result();
	}
	function product_attribute($compareproduct=false){
	
		$qry=$this->db->query("SELECT `t1`.`productAttributeValue`, `t1`.`productAttributeLable` FROM `s4k_product_attribute_map` `t1` WHERE `t1`.`productsID` ='$compareproduct'");
		return $qry->result_array();
	}

	public function get_invetory_deal_data($where)
	{
		$this->db->select('t4.offer_name,coupon_title,coupon_description,coupon_code,link,url,coupon_expiry,added');
		$this->db->from('s4k_inventorydeals_consumption t1');
		$this->db->join('s4k_inventorydeals_master t2','t1.dealMasterID=t2.dealMasterID','left');
		$this->db->join('s4k_inventorydeals_type t3','t2.dealTypeID=t3.dealTypeID','left');
		$this->db->join('s4k_deals t4','t1.dealID=t4.dealID','left');
		$this->db->join('s4k_deals_banner t5','t4.dealID=t5.dealID','left');
		$this->db->where(array('inventoryDealKey'=>$where,'t1.Status'=>'Active'));
		$query=$this->db->get();
		//print_r($this->db->last_query()); die;
		return $query->result();
	}
	public function notify_insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
	}
	public function match_emailid($email){
		$this->db->select('t1.notifyID');
		$this->db->from('s4k_notify t1');
		$this->db->where(array('email'=>$email));
		$query=$this->db->get();
		return $query->result();
	}
	public function update_notify($table, $data, $notifyID)
	{
		$this->db->where(array('notifyID'=>$notifyID));
		$this->db->update($table, $data);
	}
	public function get_email($userID=false)
	{
		$this->db->select('t1.userEmail,userID,userFirstName');
		$this->db->from('s4k_user t1');
		$this->db->where($userID);
		$query=$this->db->get();
		return $query->result();
	}	
	function forgetpassword ($data=false, $email=false)
	{	
		$this->db->where(array('userEmail'=>$email));
		$this->db->update('s4k_user',$data);		
	}
	function userinfo($where=false)
	{
		$this->db->select('userProfileImage');
		$this->db->from('s4k_user');
		$this->db->where(array('userID'=>$where));
		$query=$this->db->get();	
		return $query->result();
	}
	
}

?>
