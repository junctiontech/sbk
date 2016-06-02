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
		$index = Zend_Search_Lucene::create($this->search_index);
		$query = $this->Landingpage_model->get_products();
		foreach ($query as $article)
		{
			
			$doc = new Zend_Search_Lucene_Document();
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productsID', $article->productsID));
			$doc->addField(Zend_Search_Lucene_Field::Text('productName', $article->productName));
			$doc->addField(Zend_Search_Lucene_Field::Text('categoriesUrlKey',$article->categoriesUrlKey));
			$doc->addField(Zend_Search_Lucene_Field::UnStored('productDescription',$article->productDescription));
			$doc->addField(Zend_Search_Lucene_Field::Text('productsUrlKey',$article->productsUrlKey));
			$doc->addField(Zend_Search_Lucene_Field::Text('productAttributeLable',$article->productAttributeLable));
			$doc->addField(Zend_Search_Lucene_Field::Text('productAttributeValue',$article->productAttributeValue));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('imageName',$article->imageName));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productImageTitle',$article->productImageTitle));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productImageAltTag',$article->productImageAltTag));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productPrice',$article->productPrice));
			$doc->addField(Zend_Search_Lucene_Field::UnIndexed('productShopUrl',$article->productShopUrl));
			$index->addDocument($doc);
		echo 'Added ' . $article->productName . ' to index.<br />';
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
	
	public function product($categorykey=false,$productkey=false)
	{
		$app=$this->input->get('app');
		$this->data['searchq']=$searchq=$this->input->Get('q');
		$b=$this->input->Get('b');
		
		$jsonarray=array();
		$query='';$searchqry='';
		if($categorykey=='search'){
			$searchquery=$searchq;
			$index = Zend_Search_Lucene::open($this->search_index);
			$products = $index->find($searchquery);
			//$searchqry['productName']=$searchq;
		}elseif(!empty($b)){
			$productName=array();
			if($productkey){
			$productName=explode("_",$productkey);
			}
			/*$searchquery2="categoriesUrlKey: $categorykey";
			$searchquery2.="AND productName: $productName[0]";
			$index = Zend_Search_Lucene::open($this->search_index);
			$products = $index->find($searchquery2);*/
			$where=array('categoriesUrlKey like'=>$categorykey);
			$searchqry=isset($productName[0])?$productName[0]:'';
			$products=$this->Landingpage_model->get_products($query,$searchqry,$where);
		}else{
		if(!empty($categorykey)){
			$searchquery="categoriesUrlKey: $categorykey";
			$query['categoriesUrlKey']=$categorykey;
			$this->data['categorykey']=ucwords(implode(" ",explode("_",$categorykey)));
		}
		if(!empty($productkey)){
			$searchquery.="and productsUrlKey: $productkey";
			$query['productsUrlKey']=$productkey;
			$products=$this->Landingpage_model->get_products($query,$searchqry);
		}else{
			$index = Zend_Search_Lucene::open($this->search_index);
			if($app=='true'){
						Zend_Search_Lucene::setResultSetLimit(500);
						}
			$products = $index->find($searchquery);
		}
	}
		
		
		//$products=$this->Landingpage_model->get_products($query,$searchqry);
		
		//print_r($products);die;
		
		if($app=='true'){
			if(!empty($products)){
				 
			foreach($products as $product){
				
				  $apparray[]=array ('categoriesUrlKey'=>$product->categoriesUrlKey,
				  'productsUrlKey'=>$product->productsUrlKey,
				  'productName'=>$product->productName,
				  'productAttributeLable'=>$product->productAttributeLable,
				  'productAttributeValue'=>$product->productAttributeValue,
				  'imageName'=>$product->imageName,
				  'productImageTitle'=>$product->productImageTitle,
				  'productImageAltTag'=>$product->productImageAltTag,
				  'productPrice'=>$product->productPrice,
				  'productShopUrl'=>$product->productShopUrl,
				 // 'productDescription'=>$product->productDescription
				 );
			}
				$jsonarray['products']=$apparray;
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
			if(!empty($productkey) && empty($b)){
				if(!empty($products)){ $productID=$products[0]->productsID;$productName=$products[0]->productName;$shopID=$products[0]->shopID;
				$this->data['othershopprices']=$this->Landingpage_model->get_shopprices($productID,$shopID);
				$searchquery1="categoriesUrlKey: $categorykey";
				//$searchquery1.="AND productName: $productName";
				$searchquery1.="AND productsUrlKey: $productkey";
				$index = Zend_Search_Lucene::open($this->search_index);
				Zend_Search_Lucene::setResultSetLimit(5);
				$this->data['similarproduct'] = $index->find($searchquery1,'score',SORT_DESC);
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
	
				echo "<input name=\"$pro_id\" value=\"$pro_name\">";
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
	$compareproduct=implode(',',$productID);
	
	
	$data=$this->data['compareproduct']=$this->Landingpage_model->comparepro($compareproduct);
		$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
		$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
		$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
	$this->parser->parse('frontend/Header',$this->data);
	$this->parser->parse('frontend/Compare',$this->data);
	$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function Deals($category=false)
	{	
		$app=$this->input->get('app');
		$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
		$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
		$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
		if($category){
		$category=str_replace('_',' ',$category);
		$data=$this->data['dealsdata']=$this->Landingpage_model->get_deals_by_category($category);
		if($app=='true'){
			echo json_encode($data);
		}else{
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Deals',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
		}
		}
	}
	
}
