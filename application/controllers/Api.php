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
		$this->load->library('Aws_signed_request');
		$this->load->library('AmazonProductAPI');
		$this->load->model('frontend/Api_model');
	}

	
	public function flipkart($value=false)
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
			$categoryID=$this->Api_model->insert_category($categoryarray,$key,$data['availableVariants']['v1.1.0']['get'],1);
			if(!empty($categoryID))
			{
				$url = $data['availableVariants']['v1.1.0']['get'];
				$i=1;
				echo $key;echo"<br>";
				do{
					echo $i;echo"<br>";
					
				$details = $flipkart->call_url($url);
				$details = json_decode($details, TRUE);
				//print_r($details);die;
				if(!empty($details))
				{
					
					$products = $details['productInfoList'];
					
					foreach($products as $product)
					{ echo $product['productBaseInfoV1']['title'];echo"<br>";
						$productdata=array();
						
						if($product['productBaseInfoV1']['productBrand']=='Apple' || $product['productBaseInfoV1']['productBrand']=='apple'){
						$shopproductfamily=$product['productBaseInfoV1']['productFamily'];
						$specificationLists=$product['categorySpecificInfoV1']['specificationList'];
						
						$productdata=array('categoriesID'=>$categoryID,
						'subCategoriesID'=>0,
						'productBrand'=>$product['productBaseInfoV1']['productBrand'],
						'productsUrlKey'=>strtolower(implode("_",explode(" ",$product['productBaseInfoV1']['title']))),
						'productsSortOrder'=>1,
						'productsStatus'=>'Active',
						'productName'=>$product['productBaseInfoV1']['title'],
						'productDescription'=>$product['productBaseInfoV1']['productDescription'],
						'imageSortOrder'=>1,
						'isDefault'=>'Yes',
						'imageName'=>array_key_exists('200x200', $product['productBaseInfoV1']['imageUrls'])?$product['productBaseInfoV1']['imageUrls']['200x200']:'',
						'imageStatus'=>'Active',
						'productImageTitle'=>$product['productBaseInfoV1']['title'],
						'productImageAltTag'=>$product['productBaseInfoV1']['title'],
						'currencyID'=>1,
						'productPrice'=>$product['productBaseInfoV1']['flipkartSellingPrice']['amount'],
						'shopProductID'=>$product['productBaseInfoV1']['productId'],
						'shopID'=>1,
						'productShopUrl'=>$product['productBaseInfoV1']['productUrl']
						);
													   
													   
						if(!empty($value))
							{
						$this->Api_model->insert_product($productdata,$shopproductfamily,$specificationLists);
							}
							else
							{
						$this->Api_model->insert_new_product($productdata,$shopproductfamily,$specificationLists);		
							}
							
					}	
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
					{ print_r($product['subCategoryName']);echo"<br>";
						if($product['subCategoryName']=='Mobile Phones'){
						echo $product['title'];echo"<br>";
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
		$this->flipkart($value='First');
	}
	
	
	public function amazone()
	{
		$obj = new AmazonProductAPI();
		$productnameforsearchs=$this->Api_model->get_productname();
		$j=1;
		foreach($productnameforsearchs as $productnameforsearch){
			$productName=$productnameforsearch->productName;
			$productBrand=$productnameforsearch->productBrand;
			$categoryid=$productnameforsearch->categoriesID;
			print_r($categoryid);die;
			echo"<br>";echo $j;echo"outer";echo"<br>";
			if(!empty($productName)){
		$ItemPage='';$i=1;
		
		do{
			//try
			//{
				$result = $obj->searchProducts("$productBrand $productName",'Electronics',"TITLE",'',1389432031,$ItemPage);
			//}
			/* catch(Exception $e)
			{
				echo $e->getMessage();
			} */
			$nextUrl='';
			$home = json_decode(json_encode($result),true);
			echo"<br>";print_r($home);echo"<br>";
			if(!empty($home)){
			
			
			//echo"<br>";print_r($home['Items']);echo"<br>";die;
			$lists = $home['Items'];
			
			$ItemPage=$i+1;
			if(!empty($home['Items']['TotalPages'])){
			$nextUrl = $home['Items']['TotalPages'];
			}else{ $nextUrl='';}
			if($i==$nextUrl){ $nextUrl=''; }
			echo"<br>";echo $i;echo"<br>";
			
					if(!empty($lists['Item'])){
							foreach($lists['Item'] as $list)
							{		echo"<br>";echo $list['ASIN'];echo"<br>";	
									echo"<br>";echo $list['ItemAttributes']['Title'];echo"<br>";
									echo"<br>";print_r($list);echo"<br>";									
								if(!empty($list['ASIN'])){
										$ASIN=$list['ASIN'];
										$productdata = $obj->getItemByAsin("$ASIN");
										$productdata=json_decode(json_encode($productdata),true);
										//echo"<br>";print_r($productdata['Items']);echo"<br>";
										
										if(!empty($productdata['Items'])){
											
										$productdata1=array();
								
								$shopproductfamily=array();//$product['productBaseInfoV1']['productFamily'];
								$specificationLists=$productdata['Items']['Item']['ItemAttributes'];
								
								$productdata1=array('categoriesID'=>$categoryid,
								'subCategoriesID'=>0,
								'productBrand'=>array_key_exists('Brand', $productdata['Items']['Item']['ItemAttributes'])?$productdata['Items']['Item']['ItemAttributes']['Brand']:'',
								'productsUrlKey'=>strtolower(implode("_",explode(" ",array_key_exists('Title', $productdata['Items']['Item']['ItemAttributes'])?$productdata['Items']['Item']['ItemAttributes']['Title']:''))),
								'productsSortOrder'=>1,
								'productsStatus'=>'Active',
								'productName'=>array_key_exists('Title', $productdata['Items']['Item']['ItemAttributes'])?$productdata['Items']['Item']['ItemAttributes']['Title']:'',
								'productDescription'=>'',
								'imageSortOrder'=>1,
								'isDefault'=>'Yes',
								'imageName'=>array_key_exists('LargeImage', $productdata['Items']['Item'])?$productdata['Items']['Item']['LargeImage']['URL']:'',
								'imageStatus'=>'Active',
								'productImageTitle'=>array_key_exists('Title', $productdata['Items']['Item']['ItemAttributes'])?$productdata['Items']['Item']['ItemAttributes']['Title']:'',
								'productImageAltTag'=>array_key_exists('Title', $productdata['Items']['Item']['ItemAttributes'])?$productdata['Items']['Item']['ItemAttributes']['Title']:'',
								'currencyID'=>1,
								'productPrice'=>array_key_exists('OfferSummary', $productdata['Items']['Item'])?$productdata['Items']['Item']['OfferSummary']['LowestNewPrice']['Amount']:'',
								'shopProductID'=>$ASIN,
								'shopID'=>3,
								'productShopUrl'=>array_key_exists('DetailPageURL', $productdata['Items']['Item'])?$productdata['Items']['Item']['DetailPageURL']:''
								);
															   
														   
								if(!empty($value))
									{
								$this->Api_model->insert_product($productdata1,$shopproductfamily,$specificationLists);
									}
									else
									{
								$this->Api_model->insert_new_product($productdata1,$shopproductfamily,$specificationLists);		
									}
									
									
							
										}
								}
							}
						}
		}
					$i++; 
		}while(!empty($nextUrl));
		}
$j++;	}
	}
	
			
}
