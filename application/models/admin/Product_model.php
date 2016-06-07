<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
	
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
	
	public function fetch_product($category=false)
	{
		$this->db->select('t1.productsID,t8.categoriesID,t8.categoriesUrlKey,t9.categoryName,productsUrlKey,t1.productsStatus,t1.productName,t1.productDescription,t3.	productAttributeLable,t3.productAttributeValue,t5.imageName,t5.productImageTitle,t5.productImageAltTag,t7.productPrice,t7.productShopUrl');
		$this->db->from('s4k_products_map t1');
		$this->db->join('s4k_product_attribute_map t3','t1.productsID=t3.productsID');
		$this->db->join('s4k_product_images_map t5','t1.productsID=t5.productsID');
		$this->db->join('s4k_product_price_map t7','t1.productsID=t7.productsID');
		$this->db->join('s4k_categories t8','t1.categoriesID=t8.categoriesID');
		$this->db->join('s4k_category_details t9','t9.categoriesID=t8.categoriesID');
		$this->db->where(array('t8.categoriesID'=>$category));
		$this->db->group_by('productName');
		//$this->db->limit(20);	
		$query=$this->db->get();
		return $query->result();		
	}
	
	public function fetch_productmapped($product)
	{
		$this->db->select('t1.childProductID,t2.productName,t3.imageName, t4.productPrice');
		$this->db->from('s4k_product_mapping t1');
		$this->db->join('s4k_products_map t2','t2.productsID=t1.parentProductID');
		$this->db->join('s4k_product_images_map t3','t3.productsID=t1.parentProductID');
		$this->db->join('s4k_product_price_map t4','t4.productsID=t1.parentProductID');
		$this->db->where(array('t1.parentProductID'=>$product));
		$this->db->where(array('t1.childProductID'=>'t2.productsID'));
		$query=$this->db->get();
		return $query->result();
	}
	
	/* public function get_products($extraquery=false,$searchqry=false){
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
		$this->db->limit(2);
		
		
		/* if($extraquery){
			$this->db->join('s4k_shops t9','t7.shopID=t9.shopID','left');
			$this->db->where($extraquery);
			$this->db->order_by('productPrice','ASC');
		}elseif($searchqry){
			//.$this->db->like($searchqry);
			$this->db->where("MATCH (`productName`) AGAINST ('{$searchqry}')");
		}
		if(empty($extraquery)){
		$this->db->order_by('productsSortOrder','ASC');
		$this->db->order_by('productsUrlKey','ASC');
		$this->db->order_by('productPrice','ASC');
		$this->db->group_by('productsUrlKey');
		}
		$this->db->limit(20);
 */
		/* $query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();
	} */
	
	public function get_shopprices($productID=false,$shopID=false){
		
		$this->db->select('t1.productPrice,t1.productShopUrl,t2.shop_image');
		$this->db->from('s4k_product_price t1');
		$this->db->join('s4k_shops t2','t1.shopID=t2.shopID');
		$this->db->where(array('productsID'=>$productID,'t1.shopID !=' =>$shopID));
		$this->db->order_by('shopSortOrder','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	function map_product($category=false,$product=false,$productName=false )
	{	
		$this->db->select('t1.productsID,t2.productName,t3.imageName,t4.productPrice,shopName');
		$this->db->from('s4k_products t1');
		$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID');
		$this->db->join('s4k_product_images t3','t1.productsID=t3.productsID');
		$this->db->join('s4k_product_price t4','t1.productsID=t4.productsID');
		$this->db->join('s4k_shops t5','t4.shopID=t5.shopID');
		$this->db->where(array('t1.categoriesID'=>$category));
		$this->db->where(array('t1.productsID !='=>$product));
		$this->db->where("MATCH (`productName`) AGAINST ('{$productName}')");
		$this->db->where('t1.productsID NOT IN(select childProductID from s4k_product_mapping)');
		$query=$this->db->get();		
		return $query->result();
		
	}
	public function get_shop()
	{
		$this->db->select('shopName, shopID');
		$this->db->from('s4k_shops');
		$this->db->order_by('shopSortOrder','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	public function update($table=false,$data=false,$filter=false)
	{
		$this->db->where($filter);
		$this->db->update($table,$data);
	}
	public function search_product($category=false,$product=false )
	{	
		$this->db->select('t1.productsID,t1.productName');
		$this->db->from('s4k_products_map t1');
		$this->db->where(array('t1.categoriesID'=>$category));
		$this->db->like(array('productName'=>$product));
		$query=$this->db->get();
		return $query->result();
		
	}
	public function selected_categories($category){
		$this->db->select('t1.categoriesID,t2.categoryName');
		$this->db->from('s4k_categories t1');
		$this->db->join('s4k_category_details t2','t1.categoriesID=t2.categoriesID','left');
		$this->db->where(array('t1.categoriesID'=>$category));
		$query=$this->db->get();
		return $query->result();
	}
	public function fetch_productname($product)
	{
		$this->db->select('t1.productsID,t1.productName,t2.categoriesID');
		$this->db->from('s4k_product_details t1');
		$this->db->join('s4k_products t2','t1.productsID=t2.productsID');
		$this->db->where(array('t1.productsID'=>$product));
		$query=$this->db->get();
		return $query->result();
	}
	function delete($table1=false,$table2=false,$table3=false,$table4=false,$filter=false)
	{
		$this->db->delete($table1,$filter);	
		$this->db->delete($table2,$filter);	
		$this->db->delete($table3,$filter);	
		$this->db->delete($table4,$filter);	
	}
	function get_product_update($productid=false)
	{
		$this->db->select('t1.productsID,t1.productName,t1.productsUrlKey,t1.productsSortOrder,t1.productsStatus,t1.productDescription,t2.categoriesID,t3.categoryName,t4.productAttributeLable,t4.productAttributeValue,t5.imageName,t5.imageStatus,t5.productImageTitle,t5.productImageAltTag,t6.productPrice,t6.productShopUrl,t6.shopID,t7.shopName');
		$this->db->from('s4k_products_map t1');
		$this->db->join('s4k_products_map t2','t1.productsID=t2.productsID');
		$this->db->join('s4k_category_details t3','t3.categoriesID=t2.categoriesID');
		$this->db->join('s4k_product_attribute_map t4','t1.productsID=t4.productsID');
		$this->db->join('s4k_product_images_map t5','t1.productsID=t5.productsID');
		$this->db->join('s4k_product_price_map t6','t1.productsID=t6.productsID');
		$this->db->join('s4k_shops t7','t6.shopID=t7.shopID');
		$this->db->group_by('productName');
		$this->db->where(array('t1.productsID'=>$productid));
		$this->db->limit(2);
		$query=$this->db->get();
		return $query->result();
	}
}

?>