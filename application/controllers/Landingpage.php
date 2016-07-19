<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$this->userinfos=$this->data['userinfos']=$this->session->userdata('searchb4kharch');
		$this->load->model('frontend/Landingpage_model');
		$this->search_index = APPPATH . 'search/index';
		$this->load->library('zend');
		$this->zend->load('Zend/Search/Lucene');
		$this->zend->load('Zend/Paginator');
		$this->zend->load('Zend/View/Helper/PaginationControl');
		if($this->userinfos){
		$this->load->model('frontend/User_model');
		$wishlist=$this->User_model->get_wishlistcount('s4k_user_wishlist',array('userID'=>$this->userinfos['userID'],'Status'=>'Active'));
		$this->data['whislist']=count($wishlist);
		$this->data['whislistproduct']=array();
		foreach($wishlist as $wishlists){
		$this->data['whislistproduct'][]=$wishlists->productID;

		}

		}
	}
	
	function reindex()
	{
		ini_set('max_execution_time', 0); 
		$index = Zend_Search_Lucene::create($this->search_index);
		$categories = $this->Landingpage_model->get_categoryID();
		foreach($categories as $category){
			
		$query = $this->Landingpage_model->get_products_search('','','','',array('t1.categoriesID'=>$category->categoriesID));
		
		foreach ($query as $article)
		{
			
			$doc = new Zend_Search_Lucene_Document();
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productsID', $article->productsID));
			$doc->addField(Zend_Search_Lucene_Field::Text('productName', $article->productName));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('sb4kProductID', $article->sb4kProductID));
			$doc->addField(Zend_Search_Lucene_Field::Text('categoriesID',$article->categoriesID));
			$doc->addField(Zend_Search_Lucene_Field::Text('categoriesUrlKey',$article->categoriesUrlKey));
			$doc->addField(Zend_Search_Lucene_Field::UnStored('productDescription',$article->productDescription));
			$doc->addField(Zend_Search_Lucene_Field::Text('productsUrlKey',$article->productsUrlKey));
			 $doc->addField(Zend_Search_Lucene_Field::Text('attr',''));//$article->attr
			/*$doc->addField(Zend_Search_Lucene_Field::Text('productAttributeValue',$article->productAttributeValue)); */
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('imageName',$article->imageName));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productImageTitle',$article->productImageTitle));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productImageAltTag',$article->productImageAltTag));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productPrice',$article->productPrice));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productShopUrl',$article->productShopUrl));
			$index->addDocument($doc);
		echo 'Added ' . $article->productName . ' to index.<br />';
		}
		}
		$index->optimize();
	}

	function optimize()
	{
		$index = Zend_Search_Lucene::open($this->search_index);
		$index->optimize();
		echo"index optimize";
	}

	public function display($template_file){
		$this->parser->parse('frontend/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function index($url=false)
	{
		$app=$this->input->get('app');
		$jsonarray=array();
		$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
		$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
		$this->data['featureproduct']=$featureproduct=$this->Landingpage_model->get_inventory_data("feature_product");
		$this->data['newproduct']=$newproduct=$this->Landingpage_model->get_inventory_data("new_product");
		$this->data['lshproduct']=$lshproduct=$this->Landingpage_model->get_inventory_data("lhs_landing_page");
		$this->data['deals']=$deals=$this->Landingpage_model->get_deals();
		$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
		//print_r($dealsgategorys);die;
		/* echo"<br>";print_r($categories);echo"<br>";echo"<br>";print_r($featureproduct);echo"<br>";echo"<br>";print_r($lshproduct);die; */
		if($app=='true'){
			if(!empty($categories)){
				$jsonarray['categories']=$categories;
				$jsonarray['featureproduct']=$featureproduct;
				$jsonarray['newproduct']=$newproduct;
				$jsonarray['lshproduct']=$lshproduct;
				$jsonarray['topbrand']=$topbrand;
				$jsonarray['deals']=$deals;
				$jsonarray['dealsgategorys']=$dealsgategorys;
				echo json_encode($jsonarray);
			}else{
				echo "No category found";
			}
				
		}else{
			
			$this->display ('frontend/Landingpage');
		}
	}
	
	public function product($categorykey=false,$sbkProductID=false,$productkey=false)
	{
		$app=$this->input->get('app');
		$this->data['searchq']=$searchq=$this->input->Get('q');
		$b=$this->input->Get('b');
		$jsonarray=array();
		$query='';$searchqry='';
		
		$get_data=$this->input->get();
		$filters='';$page=$this->input->get('page');
		if($page){
			$filters="";
		}
		/* if(!empty($get_data)){
			foreach($get_data as $key=>$value){
				if($key !='page'){
				$filters.="$key=$value";
				$filters.="&";
				}
			}
		} */
		
			$limit = 82;
			$config['per_page'] = $limit;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = 'Previous';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li ><a class="active" >';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['base_url'] = base_url() . "Landingpage/product/".$categorykey.'.html';
			
		
		if($categorykey=='search'){
			$searchquery=$searchq;
			$index = Zend_Search_Lucene::open($this->search_index);
			$totalrecord = count($index->find($searchquery));
			$products = $index->find($searchquery);
			//$paginator = Zend_Paginator::factory($products);
			//$paginator->setCurrentPageNumber($page);
			//$products=$paginator->setItemCountPerPage($limit);
			//Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
			//echo $this->PaginationControl->paginationControl($this->paginator,'sliding','controls.phtml',array('route' => 'album'));
			$config['total_rows'] =$totalrecord;
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			
		}elseif(!empty($b)){
			$productName=array();
			if($sbkProductID){
			$productName=explode("_",$sbkProductID);
			}
			$where=array('categoriesUrlKey like'=>$categorykey);
			$searchqry=isset($productName[0])?$productName[0]:'';
			$products=$this->Landingpage_model->get_products($query,$searchqry,$where);
			
		}else{
		if(!empty($categorykey)){
			$searchquery="categoriesUrlKey: $categorykey";
			$query['categoriesUrlKey']=$categorykey;
			$this->data['categorykey']=ucwords(implode(" ",explode("_",$categorykey)));
		}
		if(!empty($sbkProductID)){
			$searchquery.="and productsUrlKey: $productkey";
			$query['sb4kProductID']=$sbkProductID;
			$products=$this->Landingpage_model->get_products($query,$searchqry);
		}else{
			//$index = Zend_Search_Lucene::open($this->search_index);
			//$products = $index->find($searchquery);
			$where=array('categoriesUrlKey like'=>$categorykey);
			$products=$this->Landingpage_model->get_products('','',$where,'',$limit,$page);
			$total=$this->Landingpage_model->getcountproduct($where);
			$this->data['totalresult']=$total[0]->total;
			$config['total_rows'] =$total[0]->total;
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
		}
	}
		
		
		if($app=='true'){
			if(!empty($products)){
				 
			foreach($products as $product){
				
				$attributegroups=$this->Landingpage_model->get_attribute_by_category($products[0]->categoriesID);
				$productFeatures='';
				foreach($attributegroups as $attributegroup){ 
				$attributebyproducts=$this->Landingpage_model->get_attribute_by_product($attributegroup->AttributeID,$products[0]->productsID); 
					if(!empty($attributebyproducts)){
						$valuearray='';
						foreach($attributebyproducts as $attributebyproduct){
							$valuearray[]=array('lable'=>$attributebyproduct->productAttributeLable,'value'=>$attributebyproduct->productAttributeValue);
						}
							$productFeatures[]=array('lable'=>$attributegroup->productAttributeLable,'value'=>$valuearray);		
					}
				}
				
				$moreprice='';
				
				if(!empty($products[0]->productsID) && !empty($products[0]->shopID)){
				$othershopprices=$this->Landingpage_model->get_shopprices($products[0]->productsID,$products[0]->shopID);
				
				if(!empty($othershopprices)){
					foreach($othershopprices as $othershopprice){
						$moreprice[]=array('shop_image'=>$othershopprice->shop_image,'productPrice'=>$othershopprice->productPrice,'productShopUrl'=>$othershopprice->productShopUrl);
					}
				}
				}
				$moreprice[]=array('shop_image'=>isset($product->shop_image)?$product->shop_image:'','productPrice'=>$product->productPrice,'productShopUrl'=>$product->productShopUrl);
				if($this->input->post('user_id')){
				$this->load->model('frontend/User_model');
				$wishlist=$this->User_model->get_wishlistcount('s4k_user_wishlist',array('userID'=>$this->input->post('user_id'),'Status'=>'Active'));
				$whislistproduct=array();
				foreach($wishlist as $wishlists){
				$whislistproduct[]=$wishlists->productID;
				}
				}
				  $apparray[]=array ('categoriesUrlKey'=>$product->categoriesUrlKey,
				  'productsUrlKey'=>$product->productsUrlKey,
				  'sb4kProductID'=>$product->sb4kProductID,
				  'productName'=>$product->productName,
				  //'productAttributeLable'=>$product->productAttributeLable,
				 // 'productAttributeValue'=>$product->productAttributeValue,
				  'imageName'=>$product->imageName,
				  'productImageTitle'=>$product->productImageTitle,
				  'productImageAltTag'=>$product->productImageAltTag,
				  'productPrice'=>$product->productPrice,
				  'productShopUrl'=>$product->productShopUrl,
				  'shop_image'=>isset($product->shop_image)?$product->shop_image:'',
				  'productFeatures'=>$productFeatures,
				  'morePrices'=>$moreprice,
				  'wishlist'=>$whislistproduct
				  );
			}
			
				$searchquery1="categoriesUrlKey: $categorykey";
				$searchquery1.="AND productsUrlKey: $productkey";
				$index = Zend_Search_Lucene::open($this->search_index);
				Zend_Search_Lucene::setResultSetLimit(5);
				$similarproductDatas= $index->find($searchquery1,'score',SORT_DESC);
				$similarproduct='';
				foreach($similarproductDatas as $similarproductData){
					$similarproduct[]=array ('categoriesUrlKey'=>$similarproductData->categoriesUrlKey,
				  'productsUrlKey'=>$similarproductData->productsUrlKey,
				  'sb4kProductID'=>$similarproductData->sb4kProductID,
				  'productName'=>$similarproductData->productName,
				  //'productAttributeLable'=>$product->productAttributeLable,
				 // 'productAttributeValue'=>$product->productAttributeValue,
				  'imageName'=>$similarproductData->imageName,
				  'productImageTitle'=>$similarproductData->productImageTitle,
				  'productImageAltTag'=>$similarproductData->productImageAltTag,
				  'productPrice'=>$similarproductData->productPrice,
				  'productShopUrl'=>$similarproductData->productShopUrl,
				  
				  );
				}
			$jsonarray['products']=$apparray;
			$jsonarray['similarproduct']=$similarproduct;
				
				echo json_encode($jsonarray);
			}else{
				echo "No product found";
			}
				
		}else{
			$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
			$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
			$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
			if($categorykey !='' && $categorykey !='search'){
				$this->data['filters']=$this->Landingpage_model->get_filters($categorykey);
			}
			$this->data['products']=$products;
			if(!empty($sbkProductID) && empty($b)){
				$this->data['backurl']=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
				if(!empty($products)){ $productID=$products[0]->productsID;$productName=$products[0]->productName;$shopID=$products[0]->shopID;
				$this->data['othershopprices']=$this->Landingpage_model->get_shopprices($productID,$shopID);
				$searchquery1="categoriesUrlKey: $categorykey";
				$searchquery1.="AND productsUrlKey: $productkey";
				$index = Zend_Search_Lucene::open($this->search_index);
				Zend_Search_Lucene::setResultSetLimit(5);
				$this->data['similarproduct'] = $index->find($searchquery1,'score',SORT_DESC);
				$this->data['attributegroups']=$this->Landingpage_model->get_attribute_by_category($products[0]->categoriesID);
				}
				
				$this->display ('frontend/ProductDetail');
			}else{
			$this->display ('frontend/Products');
			}
		}
	}
	
	public function fetchdata_compare_product($productid=false)
	{
	
		$productid=$this->input->post('productid');
		$product=$this->Landingpage_model->fetchdata_compare_product($productid);
	
		if(!empty($product))
		{
			foreach($product as $productname)
	
			{
				$pro_id=($productname->productsID);
				$pro_name=($productname->productName);
	
				echo "<input class=\"form-control\" name=\"$pro_id\" value=\"$pro_name\">";
			}
		}
	
	}
	

	
	public function compare()

	{	$product=$this->input->post();
		
	foreach($product as $key=>$products)
	{
		$productID[]=$key;
		//print_r($productID);die;
	}
	
	if(!empty($productID))
	{
	$compareproduct=implode(',',$productID);
	
	$compareproductinfo=$data=$this->data['compareproduct']=$this->Landingpage_model->comparepro($compareproduct);
	
	//$categoryinfo=($compareproductinfo[0]->categoriesID);
	//print_r($compareproduct); //die;
	$getattribute=$data=$this->data['compareproduct_info']=$this->Landingpage_model->compare_pro_attribute($compareproduct);
	
	
	
	//print_r($getattribute);
	$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
	$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
	$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
	$this->parser->parse('frontend/Header',$this->data);
	$this->parser->parse('frontend/Compare',$this->data);
	$this->parser->parse('frontend/Footer',$this->data);
	}
	else{
		 redirect($_SERVER['HTTP_REFERER']);
	}
	} 
	
	
	public function Deals($category=false)
	{	
		$app=$this->input->get('app');
		$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
		$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
		$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
		$this->data['deals']=$deals=$this->Landingpage_model->get_deals();
		$this->data['feature_deal']=$this->Landingpage_model->get_invetory_deal_data("feature_deal");
		$this->data['new_deal']=$this->Landingpage_model->get_invetory_deal_data("New_deal");
		if($category){
		$category=str_replace('_',' ',$category);
		
		$get_data=$this->input->get();
		$filters='';$page=$this->input->get('page');
		if($page){
			$filters="";
		}
		/* if(!empty($get_data)){
			foreach($get_data as $key=>$value){
				if($key !='page'){
				$filters.="$key=$value";
				$filters.="&";
				}
			}
		} */
		
			$limit = 50;
			$config['per_page'] = $limit;
			$config['page_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationA tsc_paginationA01">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = 'Previous';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li ><a class="active" >';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['base_url'] = base_url() . "Landingpage/Deals/".$category.'.html';
			
			$total=$this->Landingpage_model->get_deals_counttotal($category);
			$this->data['totalresult']=$total[0]->total;
			$config['total_rows'] =$total[0]->total;
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			
		$data=$this->data['dealsdata']=$this->Landingpage_model->get_deals_by_category($category,$limit,$page);
		if($app=='true'){
			echo json_encode($data);
		}		 
		}
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Deals',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
		//$this->display('frontend/Deals', $this->data);
	}
	
	public function Filter_product ()
	{	
		$str =$this->input->post('data');
		$id = $this->input->post('categories');
		$query='';$where='';$searchqry='';$where1='';		
		if(!empty($str))
		{
			foreach($str as $data)
			{
				$arr = explode('-', $data);
				if(!empty($arr[0] == 'productPrice'))
				{
					$a = $arr[1];									
				}
				elseif(!empty($arr[0]))
				{
					$b=$arr[1];	
					$c[]=$b;
				}				
			}				
		if(!empty($c))
		{
			$d = implode("','", $c);
		}
		if(!empty($a))
		{
			if (!empty($d))
			{ 		
				$where1 =("productPrice BETWEEN {$a} AND productAttributeValue IN ('$d') AND t8.categoriesID IN('$id')");					
			} 
			else 
			{
				$where1 =("productPrice BETWEEN {$a} AND t8.categoriesID IN('$id')");
			}						
		}
		elseif(!empty($d))
		{
			//$d= implode(' ',$c);
			$where =("(`productAttributeValue`) IN ('{$d}') AND t8.categoriesID IN('$id')");		 
		} 
		//print_r($where); die;
		$filterprodect = $this->Landingpage_model->get_products($query, $searchqry, $where, $where1);
		}
		if (!empty($filterprodect))
		{
			foreach ($filterprodect as $filter)
			{				 
				echo"<div class=\"grid_1_of_4 images_1_of_4\">
					 <a href=\"".$filter->categoriesUrlKey."/".$filter->sb4kProductID."/".$filter->productsUrlKey.".html\"><img src=".$filter->imageName." alt=\"\" /></a>
					 <h2>".$filter->productName."</h2>
					 <p><span class=\"price\">Rs. ".$filter->productPrice."</span></p>					 
					 <div class=\"checkbox\">
					<label>
						<input type=\"checkbox\" value=\"$filter->productsID\" class=\"chkcount\" name=\"productid\" onchange=\"compare_product(this.value)\"> Add to Compare
					</label>
					</div>
				</div>"; 				
			}
		} 
		else{
			echo "NO Product Found ";
		}
	}
	
	function Flights()
	{	
		$flightFinalArray=array();
		$app=$this->input->get('app');
		if($this->input->get())
		{
			$from=$this->data['from']=$this->input->get('from');
			$to=$this->data['to']=$this->input->get('to');
			$departure=$this->data['departure']=$this->input->get('departure');
			$return=$this->data['return']=$this->input->get('return');
			$class=$this->data['class']=$this->input->get('class');
			$adults=$this->data['adult']=$this->input->get('adults');
			
			$url = 'http://partners.api.skyscanner.net/apiservices/pricing/v1.0?apiKey=se388177191712562214854946236057';
			$data = array('country'=>'IN', 'currency'=>'INR', 'locale'=>'en-GB','originplace'=>$from,'destinationplace'=>$to,'outbounddate'=>$departure,'adults'=>$adults,'inbounddate'=>$return,'cabinclass'=>$class,'groupPricing'=>true );
			
			$options = array(
				'http' => array(
					'header'  => "Content-type: application/x-www-form-urlencoded",
					'method'  => 'POST',
					'accept'=>'application/json',
					'content' => http_build_query($data)
				)
			);
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context); 
			
			if(!empty($http_response_header[4])){
				$location=explode(' ',$http_response_header[4]);
				if(!empty($location[1])){
					$flightsDetailUrl=$location[1];
				}
			}
			
			if(!empty($flightsDetailUrl)){
				
				$getFlightsDetail = json_decode(file_get_contents("$flightsDetailUrl?apiKey=se388177191712562214854946236057"),true);
				//print_r($getFlightsDetail);die;
				if(!empty($getFlightsDetail['Legs'])){
					foreach($getFlightsDetail['Legs'] as $leg){
						
						$flight=$OriginStation=$DestinationStation=$Departure=$Arrival=$Duration=$Stops=$Directionality=$FlightNumbers=$Segments=$priceAndAgent='';
						
						foreach($leg['Carriers'] as $flights){
							
							$flightkeys = array_search($flights, array_column($getFlightsDetail['Carriers'], 'Id'));
							
											

							$flight[]=array('Name'=>$getFlightsDetail['Carriers'][$flightkeys]['Name'],
											'ImageUrl'=>$getFlightsDetail['Carriers'][$flightkeys]['ImageUrl'],
											'Code'=>$getFlightsDetail['Carriers'][$flightkeys]['Code'],
											'DisplayCode'=>$getFlightsDetail['Carriers'][$flightkeys]['DisplayCode']);
						}
						
						if(!empty($leg['OriginStation'])){
							
							$originstationkeys = array_search($leg['OriginStation'], array_column($getFlightsDetail['Places'], 'Id'));
							$OriginStation=array('Name'=>$getFlightsDetail['Places'][$originstationkeys]['Name'],'Code'=>$getFlightsDetail['Places'][$originstationkeys]['Code']);
						}
						
						if(!empty($leg['DestinationStation'])){
							
							$destinationkeys = array_search($leg['DestinationStation'], array_column($getFlightsDetail['Places'], 'Id'));
							$DestinationStation=array('Name'=>$getFlightsDetail['Places'][$destinationkeys]['Name'],'Code'=>$getFlightsDetail['Places'][$destinationkeys]['Code']);
						}
						
						if(!empty($leg['Departure']) && !empty($leg['Arrival'])){
							
							$depar=explode('T',$leg['Departure']);
							
							$arrive=explode('T',$leg['Arrival']);
							
							$Departure=$depar[0]." ".$depar[1];$Arrival=$arrive[0]." ".$arrive[1];
							
							$datetime1 = date_create($arrive[1]);
							$datetime2 = date_create($depar[1]);
							$interval = date_diff($datetime1, $datetime2);
							$Duration=$interval->format('%h H %i M %s S');
							
						}
						
						if(!empty($leg['Stops'])){
							$stopName='';
							foreach($leg['Stops'] as $Stop){
								
								$stopkeys = array_search($Stop, array_column($getFlightsDetail['Places'], 'Id'));
								$stopName[]=array('Name'=>$getFlightsDetail['Places'][$stopkeys]['Name'],'Code'=>$getFlightsDetail['Places'][$stopkeys]['Code']);
								
							}
							$Stops=array('stopNo'=>count($leg['Stops']),'stopName'=>$stopName);
						}else{
							$Stops=0;
						}
						
						if(!empty($leg['Directionality'])){
							$Directionality=$leg['Directionality'];
						}
						
						if(!empty($leg['FlightNumbers'])){
							
							foreach($leg['FlightNumbers'] as $FlightNumber){
								
									$FlightNumbers[]=array('FlightNumber'=>$FlightNumber['FlightNumber'],'CarrierId'=>$FlightNumber['CarrierId']);
							}
						}
						
						if(!empty($leg['SegmentIds'])){
							
							foreach($leg['SegmentIds'] as $SegmentId){
								
								$segmentkeys = array_search($SegmentId, array_column($getFlightsDetail['Segments'], 'Id'));
								
								$flightkeys = array_search($getFlightsDetail['Segments'][$segmentkeys]['Carrier'], array_column($getFlightsDetail['Carriers'], 'Id'));
							
								$Carrier=array('Name'=>$getFlightsDetail['Carriers'][$flightkeys]['Name'],
											'ImageUrl'=>$getFlightsDetail['Carriers'][$flightkeys]['ImageUrl'],
											'Code'=>$getFlightsDetail['Carriers'][$flightkeys]['Code'],
											'DisplayCode'=>$getFlightsDetail['Carriers'][$flightkeys]['DisplayCode']);
											
								$deparsegment=explode('T',$getFlightsDetail['Segments'][$segmentkeys]['DepartureDateTime']);
								
								$arrivesegment=explode('T',$getFlightsDetail['Segments'][$segmentkeys]['ArrivalDateTime']);
								
								$Departuresegment=$deparsegment[0]." ".$deparsegment[1];$Arrivalsegment=$arrivesegment[0]." ".$arrivesegment[1];
								
								$datetime1 = date_create($arrivesegment[1]);
								$datetime2 = date_create($deparsegment[1]);
								$interval = date_diff($datetime1, $datetime2);
								$Durationsegment=$interval->format('%h Hours %i Minute %s Seconds');
								
								$segmentoriginstationkeys = array_search($getFlightsDetail['Segments'][$segmentkeys]['OriginStation'], array_column($getFlightsDetail['Places'], 'Id'));
								$segmentOriginStation=array('Name'=>$getFlightsDetail['Places'][$segmentoriginstationkeys]['Name'],'Code'=>$getFlightsDetail['Places'][$segmentoriginstationkeys]['Code']);
								
								$segmentdestinationstationkeys = array_search($getFlightsDetail['Segments'][$segmentkeys]['DestinationStation'], array_column($getFlightsDetail['Places'], 'Id'));
								$segmentdestinationStation=array('Name'=>$getFlightsDetail['Places'][$segmentdestinationstationkeys]['Name'],'Code'=>$getFlightsDetail['Places'][$segmentdestinationstationkeys]['Code']);
							
								$Segments[]=array('OriginStation'=>$segmentOriginStation,
												  'DestinationStation'=>$segmentdestinationStation,
												  'Departure'=>$Departuresegment,
												  'Arrival'=>$Arrivalsegment,
												  'Carrier'=>$Carrier,
												  'Duration'=>$Durationsegment,
												  'FlightNumber'=>$getFlightsDetail['Segments'][$segmentkeys]['FlightNumber'],
												  'Directionality'=>$getFlightsDetail['Segments'][$segmentkeys]['Directionality']);
							}
							
						}
						
						if(!empty($leg['Id'])){
							
							$itinerarieskeys = array_search($leg['Id'], array_column($getFlightsDetail['Itineraries'], 'OutboundLegId'));
							
							foreach($getFlightsDetail['Itineraries'][$itinerarieskeys]['PricingOptions'] as $PricingOption){
								
								$agentkeys = array_search($PricingOption['Agents'][0], array_column($getFlightsDetail['Agents'], 'Id'));
								
								$priceAndAgent[]=array('AgentsName'=>$getFlightsDetail['Agents'][$agentkeys]['Name'],'AgentsImage'=>$getFlightsDetail['Agents'][$agentkeys]['ImageUrl'],'Price'=>$PricingOption['Price'],'DeeplinkUrl'=>$PricingOption['DeeplinkUrl']);
							}
							
						}
						
						
						
						
						$flightFinalArray[]=array('flight'=>$flight,'OriginStation'=>$OriginStation,'DestinationStation'=>$DestinationStation,'Departure'=>$Departure,
												  'Arrival'=>$Arrival,'Duration'=>$Duration,'Stops'=>$Stops,'Directionality'=>$Directionality,
												  'FlightNumbers'=>$FlightNumbers,'Segments'=>$Segments,'priceAndAgent'=>$priceAndAgent);
					}
				}
			}
			
		}
			if($app==true){
				echo json_encode($flightFinalArray);exit;
			}else{
			$this->data['flightFinalArray']=$flightFinalArray;
			}
			$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
			$this->parser->parse('frontend/Header',$this->data);
			$this->parser->parse('frontend/Flights',$this->data);
			$this->parser->parse('frontend/Footer',$this->data);
	}
}
