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
		
		
		if($app=='true'){
			if(!empty($categories)){
				$jsonarray['categories']=$categories;
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
			$searchqry['productName']=$searchq;
		}else{
		if(!empty($categorykey)){
			$query['categoriesUrlKey']=$categorykey;
			$this->data['categorykey']=ucwords(implode(" ",explode("_",$categorykey)));
		}
		if(!empty($productkey)){
			$query['productsUrlKey']=$productkey;
		}
	}
		
		
		$products=$this->Landingpage_model->get_products($query,$searchqry);
		
		
		if($app=='true'){
			if(!empty($products)){
				$jsonarray['products']=$products;
				echo json_encode($jsonarray);
			}else{
				echo "No product found";
			}
				
		}else{
			$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
			
			
			$this->data['products']=$products;
			if(!empty($productkey)){
				if(!empty($products)){ $productID=$products[0]->productsID;$shopID=$products[0]->shopID;
				$this->data['othershopprices']=$this->Landingpage_model->get_shopprices($productID,$shopID);
				}
				
				$this->display ('frontend/ProductDetail');
			}else{
			$this->display ('frontend/Products');
			}
		}
	}
}
