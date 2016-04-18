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
		$this->load->model('frontend/Api_model');
	}

	
	public function flipkart()
	{
		$flipkart = new Flipkart(array('affiliateId'=>"rohitthak6", 'token'=>"9575b4e1913c4c11bc0f43b0a175622d",'response_type'=>"json"));

		$home = $flipkart->api_home();

		if($home==false){
			echo 'Error: Could not retrieve API homepage';
			exit();
		}

		$home = json_decode($home, TRUE);
		
		$list = $home['apiGroups']['affiliate']['apiListings'];
		
		//echo"<br>";print_r($list);echo"<br>";
		
		foreach ($list as $key => $data) {
		$categoryarray=array();
		
		$categoryarray['categoriesUrlKey']=$key;
		$categoryarray['categoriesSortOrder']=1;
		$categoryarray['categoriesStatus']='Active';
		
		$this->Api_model->insert_category($categoryarray,$key);
		echo"<br>";print_r($data);echo"<br>";
		/* $url = $data['availableVariants']['v0.1.0']['get'];

		$details = $flipkart->call_url($url);
		$details = json_decode($details, TRUE);
	
		$products = $details['productInfoList'];
		echo"<br>";print_r($products);echo"<br>"; */
		}
		
	}
			
}
