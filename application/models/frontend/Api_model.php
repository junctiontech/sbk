<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->database();
		$this->languageID=1;
	}
	
	public function insert_category($categoryarray=false,$key=false,$categoryShopUrl=false,$shopID=false)
	{
		/* $query=$this->db->get_where('s4k_categories',array('categoriesUrlKey'=>$key));
		$result=$query->result();
		if(empty($result)){
		$this->db->insert('s4k_categories',$categoryarray);
		if($this->db->insert_id()){
			$categoryID=$this->db->insert_id();
			$key1=explode('_',$key);
			$key1=implode(' ',$key1);
		$categorydetails=array('categoriesID'=>$categoryID,'languageID'=>$this->languageID,'categoryName'=>ucwords($key1));
		$this->db->insert('s4k_category_details',$categorydetails);
		}
		}else{
			$categoryID=$result[0]->categoriesID;
		} */
		$key1=explode('_',$key);
		$key1=implode(' ',$key1);
		$categoryID=0;
		$query1=$this->db->get_where('s4k_category_to_shop',array('categoryKey'=>$key,'shopID'=>$shopID));
			$result1=$query1->result();
			if(empty($result1)){
			$categoryshopdata=array('categoriesID'=>$categoryID,'shopID'=>$shopID,'categoryShopUrl'=>$categoryShopUrl,'categoryKey'=>$key,'categoryUrl'=>$key1);
		$this->db->insert('s4k_category_to_shop',$categoryshopdata);
			}else{
				$categoryID=$result1[0]->categoriesID;
				$this->db->where(array('categoryKey'=>$key,'shopID'=>$shopID));
				$this->db->update('s4k_category_to_shop',array('categoryShopUrl'=>$categoryShopUrl));
			}
		
		return $categoryID;
	}

	public function insert_api_log($logdata=false,$where=false)
	{
		if(empty($where)){
					$this->db->insert('s4k_api_log',$logdata);
					return $this->db->insert_id();
			}else{
					$this->db->where($where);
					$this->db->set('productCount',$logdata, FALSE);
					$this->db->update('s4k_api_log');
			}
	}
	
	public function update_data($logdata=false,$where=false)
	{
					$this->db->where($where);
					$this->db->update('s4k_api_log',$logdata);
	}
	
public function insert_product($productdata=false,$shopproductfamily=false,$specificationLists=false)
{	
			$this->db->select('t1.productsID');
			$this->db->from('s4k_products t1');
			$this->db->join('s4k_product_price t2','t1.productsID=t2.productsID','left');
			$this->db->where(array('shopProductID'=>$productdata['shopProductID'],'shopID'=>$productdata['shopID']));
			$query=$this->db->get();
			$result=$query->result();
		
			$this->db->select('t1.productsID');
			$this->db->from('s4k_products_map t1');
			$this->db->join('s4k_product_price_map t2','t1.productsID=t2.productsID','left');
			$this->db->where(array('shopProductID'=>$productdata['shopProductID'],'shopID'=>$productdata['shopID']));
			$query1=$this->db->get();
			$resultmap=$query1->result();
		
		if(empty($result) && empty($resultmap)){
		$productMasterData=array('categoriesID'=>$productdata['categoriesID'],
								 'subCategoriesID'=>$productdata['subCategoriesID'],
								 'productsUrlKey'=>$productdata['productsUrlKey'],
								 'productsSortOrder'=>$productdata['productsSortOrder'],
								 'productBrand'=>$productdata['productBrand'],
								 'productsStatus'=>$productdata['productsStatus'],
								 'liveStatus'=>'Yes'
								 );
		$this->db->insert('s4k_products',$productMasterData);
		$productID=$this->db->insert_id();
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
			$firstproductID=$this->db->insert_id();
			$productDetailData=array('productsID'=>$productID,
									 'languageID'=>$this->languageID,
									 'productName'=>$productdata['productName'],
									 'productDescription'=>$productdata['productDescription']);
			$this->db->insert('s4k_product_details',$productDetailData);
			
			$productImage=array('productsID'=>$productID,
								'imageSortOrder'=>$productdata['imageSortOrder'],
								'isDefault'=>$productdata['isDefault'],
								'imageName'=>$productdata['imageName'],
								'imageStatus'=>$productdata['imageStatus']);
			$this->db->insert('s4k_product_images',$productImage);
			$productImageID=$this->db->insert_id();
			$productImageDetailData=array('productImageID'=>$productImageID,
										   'languageID'=>$this->languageID,
										   'productImageTitle'=>$productdata['productImageTitle'],
										   'productImageAltTag'=>$productdata['productImageAltTag']);
			$this->db->insert('s4k_product_image_details',$productImageDetailData);
			
			$productMapImage=array('productsID'=>$firstproductID,
								'isDefault'=>$productdata['isDefault'],
								'imageName'=>$productdata['imageName'],
								'imageStatus'=>$productdata['imageStatus'],
								'productImageTitle'=>$productdata['productImageTitle'],
								'productImageAltTag'=>$productdata['productImageAltTag']);
			$this->db->insert('s4k_product_images_map',$productMapImage);

			$productPrice=array('productsID'=>$productID,
								'currencyID'=>$productdata['currencyID'],
								'productPrice'=>$productdata['productPrice'],
								'shopID'=>$productdata['shopID'],
								'shopProductID'=>$productdata['shopProductID'],
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price',$productPrice);
			
			$productMapPrice=array('productsID'=>$firstproductID,
								'productPrice'=>$productdata['productPrice'],
								'shopID'=>$productdata['shopID'],
								'shopProductID'=>$productdata['shopProductID'],
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price_map',$productMapPrice);
			
			foreach($specificationLists as $specificationList){
							$attributelable=$specificationList['key'];
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
							$productAttributeLable='';$productAttributeValue='';
							foreach($specificationList['values'] as $productAttributekeysingle){
								
								$productAttributeLable=$productAttributekeysingle['key'];
								foreach($productAttributekeysingle['value'] as $innerdata){
									$productAttributeValue=$innerdata;
								}
								$productAttributeData=array('productsID'=>$productID,
										'productAttributeSortOrder'=>1,
										'productAttributeStatus'=>'Active',
										'productAttributehighLight'=>'Yes',
										'productAttributekey'=>$AttributeID);
							$this->db->insert('s4k_product_attribute',$productAttributeData);
							
							$productAttributeID=$this->db->insert_id();
							$productAttributeDetailData=array('productAttributeID'=>$productAttributeID,
															  'languageID'=>$this->languageID,
															  'productAttributeLable'=>$productAttributeLable,
															  'productAttributeValue'=>$productAttributeValue);
							$this->db->insert('s4k_product_attribute_details',$productAttributeDetailData);
							
							$productAttributeMapDetail=array('productsID'=>$firstproductID,
															 'AttributeID'=>$AttributeID,
															  'productAttributeLable'=>$productAttributeLable,
															  'productAttributeValue'=>$productAttributeValue);
							$this->db->insert('s4k_product_attribute_map',$productAttributeMapDetail);
							}
						}
			
			foreach($shopproductfamily as $shopproductfamilys){
				$this->db->insert('s4k_product_family',array('productID'=>$productID,'shopProductID'=>$shopproductfamilys));
			}
		}
		}else{
			$productID=$result[0]->productsID;
			$mapproductID=$resultmap[0]->productsID;
			$query1=$this->db->get_where('s4k_product_price',array('productsID'=>$productID,'shopID'=>$productdata['shopID']));
			$result1=$query1->result();
			if(empty($result1)){
			$productPrice=array('productsID'=>$productID,
								'currencyID'=>$productdata['currencyID'],
								'productPrice'=>$productdata['productPrice'],
								'shopID'=>$productdata['shopID'],
								'shopProductID'=>$productdata['shopProductID'],
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price',$productPrice);
			
			$productMapPrice=array('productsID'=>$mapproductID,
								'productPrice'=>$productdata['productPrice'],
								'shopID'=>$productdata['shopID'],
								'shopProductID'=>$productdata['shopProductID'],
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price_map',$productMapPrice);
			}else{
				$this->db->where(array('productsID'=>$productID,'shopID'=>$productdata['shopID']));
				$this->db->update('s4k_product_price',array('productShopUrl'=>$productdata['productShopUrl'],'productPrice'=>$productdata['productPrice']));
				$this->db->where(array('productsID'=>$mapproductID,'shopID'=>$productdata['shopID']));
				$this->db->update('s4k_product_price_map',array('productShopUrl'=>$productdata['productShopUrl'],'productPrice'=>$productdata['productPrice']));
			}
		}
		
	}	

public function insert_new_product($productdata=false,$shopproductfamily=false,$specificationLists=false)
{		
			$this->db->select('t1.productsID');
			$this->db->from('s4k_products t1');
			$this->db->join('s4k_product_price t2','t1.productsID=t2.productsID','left');
			$this->db->where(array('shopProductID'=>$productdata['shopProductID'],'shopID'=>$productdata['shopID']));
			$query=$this->db->get();
			$result=$query->result();
			
		if(empty($result)){
		$productMasterData=array('categoriesID'=>$productdata['categoriesID'],
								 'subCategoriesID'=>$productdata['subCategoriesID'],
								 'productsUrlKey'=>$productdata['productsUrlKey'],
								 'productBrand'=>$productdata['productBrand'],
								 'productsSortOrder'=>$productdata['productsSortOrder'],
								 'productsStatus'=>$productdata['productsStatus']);
		$this->db->insert('s4k_products',$productMasterData);
		if($this->db->insert_id()){
			$productID=$this->db->insert_id();
			$productDetailData=array('productsID'=>$productID,
									 'languageID'=>$this->languageID,
									 'productName'=>$productdata['productName'],
									 'productDescription'=>$productdata['productDescription']);
			$this->db->insert('s4k_product_details',$productDetailData);
			
			$productImage=array('productsID'=>$productID,
								'imageSortOrder'=>$productdata['imageSortOrder'],
								'isDefault'=>$productdata['isDefault'],
								'imageName'=>$productdata['imageName'],
								'imageStatus'=>$productdata['imageStatus']);
			$this->db->insert('s4k_product_images',$productImage);
			$productImageID=$this->db->insert_id();
			$productImageDetailData=array('productImageID'=>$productImageID,
										   'languageID'=>$this->languageID,
										   'productImageTitle'=>$productdata['productImageTitle'],
										   'productImageAltTag'=>$productdata['productImageAltTag']);
			$this->db->insert('s4k_product_image_details',$productImageDetailData);
			$productPrice=array('productsID'=>$productID,
								'currencyID'=>$productdata['currencyID'],
								'productPrice'=>$productdata['productPrice'],
								'shopID'=>$productdata['shopID'],
								'shopProductID'=>$productdata['shopProductID'],
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price',$productPrice);
			
			foreach($specificationLists as $key=>$specificationList){
				if(is_array($specificationList)){
					foreach($specificationList as $specificationList1){
					$productAttributeData=array('productsID'=>$productID,
												'productAttributeSortOrder'=>1,
												'productAttributeStatus'=>'Active',
												'productAttributehighLight'=>'Yes',
												'productAttributekey'=>0);
					$this->db->insert('s4k_product_attribute',$productAttributeData);
					$productAttributeID=$this->db->insert_id();
					$productAttributeDetailData=array('productAttributeID'=>$productAttributeID,
													  'languageID'=>$this->languageID,
													  'productAttributeLable'=>$key,
													  'productAttributeValue'=>is_array($specificationList1)?'':$specificationList1 );
					$this->db->insert('s4k_product_attribute_details',$productAttributeDetailData);
					}
				}else{
					$productAttributeData=array('productsID'=>$productID,
												'productAttributeSortOrder'=>1,
												'productAttributeStatus'=>'Active',
												'productAttributehighLight'=>'Yes',
												'productAttributekey'=>0);
					$this->db->insert('s4k_product_attribute',$productAttributeData);
					$productAttributeID=$this->db->insert_id();
					$productAttributeDetailData=array('productAttributeID'=>$productAttributeID,
													  'languageID'=>$this->languageID,
													  'productAttributeLable'=>$key,
													  'productAttributeValue'=>$specificationList);
					$this->db->insert('s4k_product_attribute_details',$productAttributeDetailData);
				}
			}
			
		}
		}else{
			$productID=$result[0]->productsID;
			$query1=$this->db->get_where('s4k_product_price',array('productsID'=>$productID,'shopID'=>$productdata['shopID']));
			$result1=$query1->result();
			if(empty($result1)){
			$productPrice=array('productsID'=>$productID,
								'currencyID'=>$productdata['currencyID'],
								'productPrice'=>$productdata['productPrice'],
								'shopID'=>$productdata['shopID'],
								'shopProductID'=>$productdata['shopProductID'],
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price',$productPrice);
			}else{
				$this->db->where(array('productsID'=>$productID,'shopID'=>$productdata['shopID']));
				$this->db->update('s4k_product_price',array('productShopUrl'=>$productdata['productShopUrl'],'productPrice'=>$productdata['productPrice']));
			}
		}
		
	}
	
	public function insert_deals($dealdata=false,$promo_id=false)
	{
		$dealID=0;
		$query1=$this->db->get_where('s4k_deals',array('promo_id'=>$promo_id));
			$result1=$query1->result();
			if(empty($result1)){
				$this->db->insert('s4k_deals',$dealdata);
				$dealID=$this->db->insert_id();
			}else{
				$dealID=$result1[0]->dealID;
				$this->db->where(array('dealID'=>$dealID));
				$this->db->update('s4k_deals',$dealdata);
			}
		
		return $dealID;
	}
	
	public function insert_dealsbanner($dealbannerdata=false,$dealID=false)
	{
		
		$query1=$this->db->get_where('s4k_deals_banner',array('dealID'=>$dealID));
			$result1=$query1->result();
			if(empty($result1)){
				$this->db->insert('s4k_deals_banner',$dealbannerdata);
				
			}else{
				
			}
	}
	
	public function get_productname($categoryID)
	{
			$this->db->select('t1.productName,t1.productBrand');
			$this->db->from('s4k_products_map t1');
			$this->db->where(array('productsStatus'=>'Active','categoriesID'=>$categoryID));
			$this->db->group_by('productName');
			$query=$this->db->get();
			$result=$query->result();
		return $result;
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
	
	public function check_api_log_entry($where=false)
	{
			$this->db->select('t1.apiLogID');
			$this->db->from('s4k_api_log t1');
			$this->db->where($where);
			$query=$this->db->get();
			$result=$query->result();
			return $result;
	} 
	
	 public function get_api_log_data($categoryID=false,$shopID=false)
	{
			$query=$this->db->query(" SELECT *
								   FROM s4k_api_log
								   WHERE `lastUpdate` < DATE_SUB(NOW() , INTERVAL 15 MINUTE)    
								   AND `status` = 'uncompleted'
								   AND `categoryID` = $categoryID
								   AND `shopID`= $shopID
								   LIMIT 1
									");
			$result=$query->result();
			return $result;
	} 
}

?>