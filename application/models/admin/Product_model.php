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
	
	
	
	public function fetch_product($category=false,$limit=false,$page=false)
	{
		$this->db->select('t1.productsID,t8.categoriesID,t8.categoriesUrlKey,t9.categoryName,productsUrlKey,t1.productsStatus,t1.productName,t1.productDescription,t3.	productAttributeLable,t3.productAttributeValue,t5.imageName,t5.productImageTitle,t5.productImageAltTag,t7.productPrice,t7.productShopUrl');
		$this->db->from('s4k_products_map t1');
		$this->db->join('s4k_product_attribute_map t3','t1.productsID=t3.productsID');
		$this->db->join('s4k_product_images_map t5','t1.productsID=t5.productsID');
		$this->db->join('s4k_product_price_map t7','t1.productsID=t7.productsID');
		$this->db->join('s4k_categories t8','t1.categoriesID=t8.categoriesID');
		$this->db->join('s4k_category_details t9','t9.categoriesID=t8.categoriesID');
		$this->db->where(array('t8.categoriesID'=>$category));
		$this->db->group_by('sb4kProductID');
		$this->db->limit($limit,$page);	
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->result();		
	}
	
	public function getcounttotalrecord($category=false)
	{
		$this->db->select('count(productsID) as total');
		$this->db->from('s4k_products_map');
		$this->db->where(array('categoriesID'=>$category));
		$query=$this->db->get();
		return $query->result();		
	}
	
	public function fetch_productmapped($product)
	{
		$this->db->select('t6.productMappingID,t1.productsID,t2.productName,t3.imageName,t4.productPrice,shopName');
		$this->db->from('s4k_product_mapping t6');
		$this->db->join('s4k_product_price t4','t6.childProductID=t4.shopProductID and t4.shopID=t6.childShopID');
		$this->db->join('s4k_products t1','t4.productsID=t1.productsID');
		$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID');
		$this->db->join('s4k_product_images t3','t1.productsID=t3.productsID');
		$this->db->join('s4k_shops t5','t4.shopID=t5.shopID');
		$this->db->join('s4k_product_price_map t7','t7.shopID=t6.parentShopID and t7.shopProductID=t6.parentProductID');
		$this->db->where(array('t7.productsID'=>$product));
		$query=$this->db->get();	
		return $query->result();
	}
	
	public function delete_data($table=false,$where=false){
		$this->db->delete($table,$where);
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
		$query=$this->db->get();	//echo $this->db->last_query();die;	
		return $query->result();
		
	}
	
	function map_product1($category=false,$product=false,$productName=false,$productBrand )
	{
		/* $query1=$this->db->query("select productAttributeLable,productAttributeValue from s4k_product_attribute_map where productsID=$product and productAttributeLable in ('Model ID','Model Name')");
		//echo $this->db->last_query();die;
		$query2=$query1->result_array();
		$query4='';//array();
		foreach($query2 as $query3){
			$query4[]=$query3['productAttributeValue'];
		} */
		//$query5=implode(',',$query4);
		//print_r($query5);die;
		//$this->db->distinct();
		$this->db->select('t1.productsID,t2.productName,t3.imageName,t4.productPrice,shopName');
		$this->db->from('s4k_products t1');
		
		$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID');
		$this->db->join('s4k_product_images t3','t1.productsID=t3.productsID');
		$this->db->join('s4k_product_price t4','t1.productsID=t4.productsID');
		$this->db->join('s4k_shops t5','t4.shopID=t5.shopID');
		$this->db->join('s4k_product_status t6','t4.shopID=t6.shopID and t6.shopProductID=t4.shopProductID');
		//$this->db->join('s4k_product_attribute t6','t1.productsID=t6.productsID');
		//$this->db->join('s4k_product_attribute_details t7','t6.productAttributeID=t7.productAttributeID');
		$this->db->where("MATCH (`productName`) AGAINST ('{$productName}')");
		$this->db->where(array('t1.categoriesID'=>$category,'t1.productBrand'=>$productBrand));
		$this->db->where(array('t5.shopID !='=>1));
		
		//$this->db->where('t1.productsID NOT IN(select childProductID from s4k_product_mapping)');
		//$this->db->where_in('t7.productAttributeValue',$query4);
		//$this->db->where('t7.productAttributeLable','Model');
		$this->db->where('t6.productsStatus','Active');
		$this->db->where('t6.liveStatus','No');
		$this->db->where('t6.mapp','Unmapped');
		//$this->db->where(array('t7.productAttributeLable'=>'Model','t7.productAttributeValue like'=>"%$query4%"));
		//$this->db->order_by('productName','ASC');
		//$this->db->group_by('productName');
		$query=$this->db->get();	//echo $this->db->last_query();die;	
		return $query->result();
		
	}
	
	function get_product_by_filter($where=false,$limit=false,$page=false )
	{	
		$this->db->select('t1.productsID,t1.categoriesID,t2.productName,t3.imageName,t4.productPrice,shopName,productsStatus,mapp,liveStatus');
		$this->db->from('s4k_products t1');
		$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID');
		$this->db->join('s4k_product_images t3','t1.productsID=t3.productsID');
		$this->db->join('s4k_product_price t4','t1.productsID=t4.productsID');
		$this->db->join('s4k_shops t5','t4.shopID=t5.shopID');
		$this->db->join('s4k_product_status t6','t4.shopID=t6.shopID and t6.shopProductID=t4.shopProductID');
		//$this->db->join('s4k_product_attribute t6','t1.productsID=t6.productsID');
		//$this->db->join('s4k_product_attribute_details t7','t6.productAttributeID=t7.productAttributeID');
		$this->db->where($where);
		$this->db->limit($limit,$page);
		$query=$this->db->get();		
		return $query->result();
	}
	
	function gettotalrecorddownloaded($where=false )
	{	
		$this->db->select('count(t1.productsID) as total');
		$this->db->from('s4k_products t1');
		$this->db->join('s4k_product_price t4','t1.productsID=t4.productsID');
		$this->db->join('s4k_shops t5','t4.shopID=t5.shopID');
		$this->db->join('s4k_product_status t6','t4.shopID=t6.shopID and t6.shopProductID=t4.shopProductID');
		$this->db->where($where);
		$query=$this->db->get();	
		return $query->result();
	}
	
	function get_product_full_data($where=false )
	{	
		$this->db->select('t1.productsID,t1.categoriesID,t1.subCategoriesID,t1.productBrand,t1.productsUrlKey,t1.productsSortOrder,t6.productsStatus,t2.productDescription,t2.productName,t3.imageName,t3.imageSortOrder,t3.isDefault,t3.imageStatus,t6.productImageTitle,t6.productImageAltTag,t4.productPrice,t4.currencyID,t4.shopProductID,t4.shopID,t4.productShopUrl');
		$this->db->from('s4k_products t1');
		$this->db->join('s4k_product_details t2','t1.productsID=t2.productsID');
		$this->db->join('s4k_product_images t3','t1.productsID=t3.productsID');
		$this->db->join('s4k_product_price t4','t1.productsID=t4.productsID');
		$this->db->join('s4k_product_image_details t6','t3.productImageID=t6.productImageID');
		$this->db->join('s4k_shops t5','t4.shopID=t5.shopID');
		$this->db->join('s4k_product_status t6','t4.shopID=t6.shopID,t6.shopProductID=t4.shopProductID');
		$this->db->where($where);
		$query=$this->db->get();		
		return $query->result();
	}
	
	function get_product_attribute($where=false )
	{	
		$this->db->select('productAttributeLable,productAttributeValue');
		$this->db->from('s4k_product_attribute t1');
		$this->db->join('s4k_product_attribute_details t2','t1.productAttributeID=t2.productAttributeID');
		$this->db->where($where);
		$query=$this->db->get();		
		return $query->result();
	}
	
	public function insert_mapp_it($productdata=false,$shopproductfamily=false,$specificationLists=false)
{	
		if(!empty($productdata) && !empty($specificationLists)){
		$sb4kProductID= strtoupper ( bin2hex ( mcrypt_create_iv ( 4, MCRYPT_DEV_RANDOM ) ) );;
		$productMapData=array('categoriesID'=>$productdata['categoriesID'],
								 'sb4kProductID'=>$sb4kProductID,
								 'productsUrlKey'=>$productdata['productsUrlKey'],
								 'productsSortOrder'=>$productdata['productsSortOrder'],
								 'productsStatus'=>$productdata['productsStatus'],
								 'productName'=>$productdata['productName'],
								 'productBrand'=>$productdata['productBrand'],
								 'productDescription'=>$productdata['productDescription']);
		$this->db->insert('s4k_products_map',$productMapData);
		if($this->db->insert_id()){
			$productID=$this->db->insert_id();
			
			foreach($specificationLists as $specificationList){
							$productAttributeLable='';$productAttributeValue='';
							$attributelable=$specificationList->productAttributeLable;
							$productAttributeLable=$specificationList->productAttributeLable;$productAttributeValue=$specificationList->productAttributeValue;
							$this->db->select('t1.AttributeID');
							$this->db->from('s4k_categories_to_attribute t1');
							$this->db->like(array('productAttributeLable'=>$attributelable));
							$query1=$this->db->get();
							$categoryattribute=$query1->result();
							if(!empty($categoryattribute[0]->AttributeID)){
								$AttributeID=$categoryattribute[0]->AttributeID;
							}else{
								$categoryattributedata=array('categoriesID'=>$productdata['categoriesID'],'productAttributeLable'=>$attributelable);
								$this->db->insert('s4k_categories_to_attribute',$categoryattributedata);
								$AttributeID=$this->db->insert_id();
							}
							
							$productAttributeMapDetail=array('productsID'=>$productID,
															 'AttributeID'=>$AttributeID,
															  'productAttributeLable'=>$productAttributeLable,
															  'productAttributeValue'=>$productAttributeValue);
							$this->db->insert('s4k_product_attribute_map',$productAttributeMapDetail);
							
						}
			
			$productMapImage=array('productsID'=>$productID,
								'isDefault'=>$productdata['isDefault'],
								'imageName'=>$productdata['imageName'],
								'imageStatus'=>$productdata['imageStatus'],
								'productImageTitle'=>$productdata['productImageTitle'],
								'productImageAltTag'=>$productdata['productImageAltTag']);
			$this->db->insert('s4k_product_images_map',$productMapImage);

			$productMapPrice=array('productsID'=>$productID,
								'productPrice'=>$productdata['productPrice'],
								'shopID'=>$productdata['shopID'],
								'shopProductID'=>$productdata['shopProductID'],
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price_map',$productMapPrice);
			
		}
		}
		
	}	
	
	public function get_shop()
	{
		$this->db->select('shopName, shopID');
		$this->db->from('s4k_shops');
		$this->db->order_by('shopSortOrder','ASC');
		$query=$this->db->get();
		return $query->result();
	}
	
	public function get_data($table=false,$filter=false)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($filter);
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
		$this->db->select('t1.productsID,t1.productName');//,GROUP_CONCAT(t2.productAttributeValue SEPARATOR ",") as attr
		$this->db->from('s4k_products_map t1');
		//$this->db->join('s4k_product_attribute_map t2','t1.productsID=t2.productsID','left');
		//$this->db->where_in('productAttributeLable',array('Handset Color','Internal'));
		$this->db->where(array('t1.categoriesID'=>$category));
		$this->db->like(array('productName'=>$product));
		$this->db->group_by('t1.productsID');
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
		$this->db->select('t1.productsID,t1.productName,t1.categoriesID,t1.productBrand,t4.imageName,t5.productPrice,shopName');//,GROUP_CONCAT(t3.productAttributeValue SEPARATOR ",") as attr
		$this->db->from('s4k_products_map t1');
		//$this->db->join('s4k_product_attribute_map t3','t1.productsID=t3.productsID','left');
		$this->db->join('s4k_product_images_map t4','t1.productsID=t4.productsID');
		$this->db->join('s4k_product_price_map t5','t1.productsID=t5.productsID');
		$this->db->join('s4k_shops t6','t5.shopID=t6.shopID');
		//$this->db->where_in('productAttributeLable',array('Handset Color','Internal'));
		$this->db->where(array('t1.productsID'=>$product));
		$this->db->group_by('t1.productsID');
		$query=$this->db->get();
		return $query->result();
	}
	
	/* public function fetch_productname($product)
	{
		$this->db->select('t1.productsID,t1.productName,t2.categoriesID,GROUP_CONCAT(t3.productAttributeValue SEPARATOR ",") as attr  , t4.imageName,t5.productPrice,shopName');
		$this->db->from('s4k_product_details t1');
		$this->db->join('s4k_products t2','t1.productsID=t2.productsID');
		$this->db->join('s4k_product_attribute_map t3','t1.productsID=t3.productsID','left');
		$this->db->join('s4k_product_images t4','t1.productsID=t4.productsID');
		$this->db->join('s4k_product_price t5','t1.productsID=t5.productsID');
		$this->db->join('s4k_shops t6','t5.shopID=t6.shopID');
		$this->db->where_in('productAttributeLable',array('Handset Color','Internal'));
		$this->db->where(array('t1.productsID'=>$product));
		$this->db->group_by('t1.productsID');
		$query=$this->db->get();
		return $query->result();
	} */
	
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