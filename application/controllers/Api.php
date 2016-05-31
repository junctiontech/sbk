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
					{ echo $product['title'];echo"<br>";
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
					
					$products = $details['products'];
					
					foreach($products as $product)
					{ echo $product['title'];echo"<br>";
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
	
	public function vcommission($value=false)
	{
		define('HASOFFERS_API_URL', 'https://api.hasoffers.com/Apiv3/json');
		$json = "http://tools.vcommission.com/api/coupons.php?apikey=b7ea8d87c04b8ca5779acbabeee549dc8fe189a5ff5f1da61b004307efa06b3d";
		$response = file_get_contents($json);
		$mydecode = json_decode($response);
		
		for ($i = 0; $i < count($mydecode); $i++) {
			
		$featured=$mydecode[$i]->featured;
		$exclusive=$mydecode[$i]->exclusive;
		$promo_id=$mydecode[$i]->promo_id;
		$offer_id=$mydecode[$i]->offer_id;
		$offer_name=$mydecode[$i]->offer_name;
		$coupon_title=str_replace("&amp;", "&", $mydecode[$i]->coupon_title);
		$category=$mydecode[$i]->category;
		$coupon_description=str_replace("&amp;", "&", $mydecode[$i]->coupon_description);
		$coupon_type=$mydecode[$i]->coupon_type;
		$coupon_code=$mydecode[$i]->coupon_code;
		$ref_id=$mydecode[$i]->ref_id;
		$link=$mydecode[$i]->link;
		$coupon_expiry=$mydecode[$i]->coupon_expiry;
		$added=$mydecode[$i]->added;
		$Status='Active';
			
		$dealdata=array('featured'=>$featured,'exclusive'=>$exclusive,'promo_id'=>$promo_id,
						'offer_id'=>$offer_id,'offer_name'=>$offer_name,'coupon_title'=>$coupon_title,
						'category'=>$category,'coupon_description'=>$coupon_description,'coupon_type'=>$coupon_type,'coupon_code'=>$coupon_code,'ref_id'=>$ref_id,'link'=>$link,
						'coupon_expiry'=>$coupon_expiry,'added'=>$added,'Status'=>$Status);
		
						$args = array(
							'NetworkId' => 'vcm',
							'Target' => 'Affiliate_Offer',
							'Method' => 'getThumbnail',
							'api_key' => 'b7ea8d87c04b8ca5779acbabeee549dc8fe189a5ff5f1da61b004307efa06b3d',
							'ids' => array(
								$offer_id
							)
						);
						
						if (function_exists('curl_init') && function_exists('curl_setopt')){
	       
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, HASOFFERS_API_URL . '?' . http_build_query($args));
						curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-Rohit-Flipkart/0.1');
						curl_setopt($ch, CURLOPT_TIMEOUT, 30);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
						$result = curl_exec($ch);
						curl_close($ch);

					}else{
						
						echo "technical error";
					}
					
					$result=json_decode($result, TRUE);					
					  
					if($result['response']['status'] === 1) {
							//echo 'API call successful';
							$dealID1=$this->Api_model->insert_deals($dealdata,$promo_id);
							
							$dealID=$dealID1;
							
							foreach($result['response']['data'] as $results){
							foreach($results['Thumbnail'] as $key=>$resultss){
						 	 $dealbannerdata=array('dealID'=>$dealID,'offer_id'=>$resultss['offer_id'],
												  'display'=>$resultss['display'],'filename'=>$resultss['filename'],
												  'size'=>$resultss['size'],'status'=>$resultss['status'],
												  'type'=>$resultss['type'],'width'=>$resultss['width'],
												  'height'=>$resultss['height'],'code'=>$resultss['code'],
												  'flash_vars'=>$resultss['flash_vars'],'interface'=>$resultss['interface'],
												  'account_id'=>$resultss['account_id'],'is_private'=>$resultss['is_private'],
												  'created'=>$resultss['created'],'modified'=>$resultss['modified'],
												  'url'=>$resultss['url'],'thumbnail'=>$resultss['thumbnail']); 
								$this->Api_model->insert_dealsbanner($dealbannerdata,$dealID); 
								echo"<br>";print_r($dealbannerdata);echo"<br>";
							}
							//die;	
							}
						}
						else {
							echo 'API call failed (' . $result['response']['errorMessage'] . ')';
							echo PHP_EOL;
							echo 'Errors: ' . print_r($result['response']['errors'], true);
							echo PHP_EOL;
						} 

			
		
		}
		
	}
	
	public function api_call()
	{
		$this->snapdeal($value='First');
	}
			
}
