<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$this->userinfo=$this->session->userdata('searchb4kharch');
		$this->load->library('Flipkart');
		$this->load->library('Snapdeal');
		$this->load->model('frontend/Api_model');
	}

	
	public function flipkart()
	{

		$flipkart = new Flipkart(array('affiliateId'=>"rohitthak6", 'token'=>"9575b4e1913c4c11bc0f43b0a175622d",'response_type'=>"json"));
		$home = $flipkart->api_home();
		if($home==false)
		{
			echo 'Error: Could not retrieve API homepage';
			exit();
		}
		$home = json_decode($home, TRUE);
		$list = $home['apiGroups']['affiliate']['apiListings'];
		//echo"<br>";print_r($list);echo"<br>";
		//echo"<br>";print_r($data);echo"<br>";
		foreach ($list as $key => $data) 
		{
			$categoryarray=array();
			$categoryarray['categoriesUrlKey']=$key;
			$categoryarray['categoriesSortOrder']=1;
			$categoryarray['categoriesStatus']='Active';
			$categoryID=$this->Api_model->insert_category($categoryarray,$key,$data['availableVariants']['v0.1.0']['get'],1);
			if(!empty($categoryID))
			{
				$url = $data['availableVariants']['v0.1.0']['get'];
				$i=1;
				echo $key;echo"<br>";
				do{
					echo $i;echo"<br>";
				$details = $flipkart->call_url($url);
				$details = json_decode($details, TRUE);
				if(!empty($details))
				{
					
					$products = $details['productInfoList'];
					
					foreach($products as $product)
					{ 
						$productdata=array();
						$productdata=array('categoriesID'=>$categoryID,
						'subCategoriesID'=>0,
						'productsUrlKey'=>strtolower(implode("_",explode(" ",$product['productBaseInfo']['productAttributes']['title']))),
						'productsSortOrder'=>1,
						'productsStatus'=>'Active',
						'productName'=>$product['productBaseInfo']['productAttributes']['title'],
						'productDescription'=>$product['productBaseInfo']['productAttributes']['productDescription'],
						'imageSortOrder'=>1,
						'isDefault'=>'Yes',
						'imageName'=>array_key_exists('200x200', $product['productBaseInfo']['productAttributes']['imageUrls'])?$product['productBaseInfo']['productAttributes']['imageUrls']['200x200']:'',
						'imageStatus'=>'Active',
						'productImageTitle'=>$product['productBaseInfo']['productAttributes']['title'],
						'productImageAltTag'=>$product['productBaseInfo']['productAttributes']['title'],
						'currencyID'=>1,
						'productPrice'=>$product['productBaseInfo']['productAttributes']['sellingPrice']['amount'],
						'shopID'=>1,
						'productShopUrl'=>$product['productBaseInfo']['productAttributes']['productUrl'],
						'productAttributeSortOrder'=>1,
						'productAttributeStatus'=>'Active',
						'productAttributehighLight'=>'Yes',
						'productAttributekey'=>array('color','productBrand'),
						'productAttributeLable'=>array('Color','Product Brand'),
						'productAttributeValue'=>array($product['productBaseInfo']['productAttributes']['color'],
													   $product['productBaseInfo']['productAttributes']['productBrand']));
													   
													   
						$this->Api_model->insert_new_product($productdata);
							
							
					}
						$nextUrl = $details['nextUrl'];
						$url=$nextUrl;
				}
				/* if($i==2){ echo $nextUrl;die; }*/
				$i++; 
				}while(!empty($nextUrl));
			
			}
		
		}
		
		
	}
	
	public function snapdeal($value=false)
	{
		$snapdeal = new Snapdeal(array('affiliateId'=>"92451", 'token'=>"7b9f147b667d5c9dbc09288a353528",'response_type'=>"json"));
		$home = $snapdeal->api_home();
		if($home==false)
		{
			echo 'Error: Could not retrieve API homepage';
			exit();
		}
		$home = json_decode($home, TRUE);
		
		$list = $home['apiGroups']['Affiliate']['listingsAvailable'];
		
		foreach ($list as $key => $data) 
		{
			$categoryarray=array();
			$categoryarray['categoriesUrlKey']=$key;
			$categoryarray['categoriesSortOrder']=1;
			$categoryarray['categoriesStatus']='Active';
			
			$categoryID=$this->Api_model->insert_category($categoryarray,$key,$data['listingVersions']['v1']['get'],2);
			if(!empty($categoryID))
			{
				$url = $data['listingVersions']['v1']['get'];
				$i=1;
				echo $key;echo"<br>";
				do{
					echo $i;echo"<br>";
				$details = $snapdeal->call_url($url);
				$details = json_decode($details, TRUE);
				if(!empty($details))
				{
					echo $product['title'];echo"<br>";
					$products = $details['products'];
					
					foreach($products as $product)
					{
						$productdata=array();
						$productdata=array('categoriesID'=>$categoryID,
						'subCategoriesID'=>0,
						'productsUrlKey'=>strtolower(implode("_",explode(" ",$product['title']))),
						'productsSortOrder'=>1,
						'productsStatus'=>'Active',
						'productName'=>$product['title'],
						'productDescription'=>$product['description'],
						'imageSortOrder'=>1,
						'isDefault'=>'Yes',
						'imageName'=>$product['imageLink'],
						'imageStatus'=>'Active',
						'productImageTitle'=>$product['title'],
						'productImageAltTag'=>$product['title'],
						'currencyID'=>1,
						'productPrice'=>$product['offerPrice'],
						'shopID'=>2,
						'productShopUrl'=>$product['link'],
						'productAttributeSortOrder'=>1,
						'productAttributeStatus'=>'Active',
						'productAttributehighLight'=>'Yes',
						'productAttributekey'=>array('color','productBrand'),
						'productAttributeLable'=>array('Color','Product Brand'),
						'productAttributeValue'=>array('',
													   $product['brand']));
													   
						if(!empty($value))
							{
						$this->Api_model->insert_product($productdata);
							}
							else
							{
						$this->Api_model->insert_new_product($productdata);		
							}
					}
					
					$nextUrl = $details['nextUrl'];
					$url=$nextUrl;
					
				}
				$i++;
				}while(!empty($nextUrl));
			}
		
		}
		
	}
	
	public function api_call()
	{
		$this->snapdeal($value='First');
	}
			
}
