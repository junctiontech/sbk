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
		//$this->parser->parse('header',$this->data);
		$this->load->view($template_file, $this->data);
		//$this->parser->parse('footer',$this->data);
	}
	
	public function index($url=false)
	{
		$app=$this->input->get('app');
		$jsonarray=array();
		$categories=$this->Landingpage_model->get_categories();
		
		
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
		$jsonarray=array();
		if(!empty($categorykey)){
			$query['categoriesUrlKey']=$categorykey;
		}
		if(!empty($productkey)){
			$query['productsUrlKey']=$productkey;
		}
		
		$products=$this->Landingpage_model->get_products($query);
		
		
		if($app=='true'){
			if(!empty($products)){
				$jsonarray['products']=$products;
				echo json_encode($jsonarray);
			}else{
				echo "No category found";
			}
				
		}else{
			$this->display ('frontend/Landingpage');
		}
	}
}
