<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->database();
		$this->languageID=1;
	}
	
	public function insert_category($categoryarray=false,$key=false,$categoryShopUrl=false,$shopID=false)
	{
		$query=$this->db->get_where('s4k_categories',array('categoriesUrlKey'=>$key));
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
		}
		
		$query1=$this->db->get_where('s4k_category_to_shop',array('categoriesID'=>$categoryID,'shopID'=>$shopID));
			$result1=$query1->result();
			if(empty($result1)){
			$categoryshopdata=array('categoriesID'=>$categoryID,'shopID'=>$shopID,'categoryShopUrl'=>$categoryShopUrl,'categoryKey'=>$key);
		$this->db->insert('s4k_category_to_shop',$categoryshopdata);
			}else{
				$this->db->where(array('categoriesID'=>$categoryID,'shopID'=>$shopID));
				$this->db->update('s4k_category_to_shop',array('categoryShopUrl'=>$categoryShopUrl));
			}
		
		return $categoryID;
	}

public function insert_product($productdata=false)
{
	$query=$this->db->get_where('s4k_products',array('productsUrlKey'=>$productdata['productsUrlKey']));
		$result=$query->result();
		if(empty($result)){
		$productMasterData=array('categoriesID'=>$productdata['categoriesID'],
								 'subCategoriesID'=>$productdata['subCategoriesID'],
								 'productsUrlKey'=>$productdata['productsUrlKey'],
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
			$index=0;
			foreach($productdata['productAttributekey'] as $productAttributekey){
			$productAttributeData=array('productsID'=>$productID,
										'productAttributeSortOrder'=>$productdata['productAttributeSortOrder'],
										'productAttributeStatus'=>$productdata['productAttributeStatus'],
										'productAttributehighLight'=>$productdata['productAttributehighLight'],
										'productAttributekey'=>$productAttributekey[$index]);
			$this->db->insert('s4k_product_attribute',$productAttributeData);
			$productAttributeID=$this->db->insert_id();
			$productAttributeDetailData=array('productAttributeID'=>$productAttributeID,
											  'languageID'=>$this->languageID,
											  'productAttributeLable'=>$productdata['productAttributeLable'][$index],
											  'productAttributeValue'=>$productdata['productAttributeValue'][$index]);
			$this->db->insert('s4k_product_attribute_details',$productAttributeDetailData);
			$index++;
			}
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
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price',$productPrice);
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
								'productShopUrl'=>$productdata['productShopUrl']);
			$this->db->insert('s4k_product_price',$productPrice);
			}else{
				$this->db->where(array('productsID'=>$productID,'shopID'=>$productdata['shopID']));
				$this->db->update('s4k_product_price',array('productShopUrl'=>$productdata['productShopUrl'],'productPrice'=>$productdata['productPrice']));
			}
		}
		
	}	
	
	
}

?>