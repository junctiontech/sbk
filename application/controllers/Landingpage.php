<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$this->userinfo=$this->session->userdata('searchb4kharch');
		$this->load->model('frontend/Landingpage_model');
		$this->search_index = APPPATH . 'search/index';
		$this->load->library('zend');
		$this->zend->load('Zend/Search/Lucene');
	}
	
	function reindex()
	{
		$index = Zend_Search_Lucene::create($this->search_index);
		$query = $this->Landingpage_model->get_products();
		foreach ($query as $article)
		{
			
		$doc = new Zend_Search_Lucene_Document();
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
		$this->data['featureproduct']=$featureproduct=$this->Landingpage_model->get_inventory_data("feature_product");
		$this->data['newproduct']=$newproduct=$this->Landingpage_model->get_inventory_data("new_product");
		$this->data['lshproduct']=$lshproduct=$this->Landingpage_model->get_inventory_data("lhs_landing_page");
		/* echo"<br>";print_r($categories);echo"<br>";echo"<br>";print_r($featureproduct);echo"<br>";echo"<br>";print_r($lshproduct);die; */
		if($app=='true'){
			if(!empty($categories)){
				$jsonarray['categories']=$categories;
				$jsonarray['featureproduct']=$featureproduct;
				$jsonarray['newproduct']=$newproduct;
				$jsonarray['lshproduct']=$lshproduct;
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
		$jsonarray=array();
		$query='';$searchqry='';
		if($categorykey=='search'){
			$searchquery=$searchq;
			$index = Zend_Search_Lucene::open($this->search_index);
			$products = $index->find($searchquery);
			//$searchqry['productName']=$searchq;
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
			
			
			$this->data['products']=$products;
			if(!empty($productkey)){
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
}
