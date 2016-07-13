<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
	
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
	
	
	public function display($template_file){
		$this->parser->parse('frontend/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function index()
	{
		$app=$this->input->get('app');
		$jsonarray=array();
		$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
		//$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
		/* $this->data['featureproduct']=$featureproduct=$this->Landingpage_model->get_inventory_data("feature_product");
		$this->data['newproduct']=$newproduct=$this->Landingpage_model->get_inventory_data("new_product");
		$this->data['lshproduct']=$lshproduct=$this->Landingpage_model->get_inventory_data("lhs_landing_page");
		$this->data['deals']=$deals=$this->Landingpage_model->get_deals(); */
		//$this->data['dealsgategorys']=$dealsgategorys=$this->Landingpage_model->get_dealsgategory();
		//print_r($dealsgategorys);die;
		/* echo"<br>";print_r($categories);echo"<br>";echo"<br>";print_r($featureproduct);echo"<br>";echo"<br>";print_r($lshproduct);die; */
		
		if($this->input->get())
		{
			$where=$this->input->get('where');
			$checkIn=$this->input->get('checkIn');
			$checkOut=$this->input->get('checkOut');
			$noOfGuests=$this->input->get('noOfGuests');
			$noOfRoom=$this->input->get('noOfRoom');
			
			$jsonData = json_decode(file_get_contents("http://partners.api.skyscanner.net/apiservices/hotels/liveprices/v2/IN/INR/en-GB/$where/$checkIn/$checkOut/$noOfGuests/$noOfRoom?apiKey=prtl6749387986743898559646983194"),true);
			
			
			if(!empty($jsonData['urls']['hotel_details'])){
				$hotelsDetailUrl=$jsonData['urls']['hotel_details'];
			}
			
			if(!empty($jsonData['hotels'])){
				
				$hotelsID='';
				
				foreach($jsonData['hotels'] as $hotel)
				{ 
					$hotelsID[]=$hotel['hotel_id'];
					
				}
			}
			
			if(!empty($hotelsDetailUrl) && !empty($hotelsID)){
				
				$hotelsID=implode(",",$hotelsID);
				$getHotelsDetail = json_decode(file_get_contents("http://partners.api.skyscanner.net$hotelsDetailUrl&hotelIds=$hotelsID"),true);
				//print_r($getHotelsDetail);die;
				$this->data['getHotelsDetail']=$getHotelsDetail;
				
			}
			
		}
		
		
		if($app=='true'){
			if(!empty($categories)){
				$jsonarray['categories']=$categories;
				//$jsonarray['featureproduct']=$featureproduct;
				//$jsonarray['newproduct']=$newproduct;
				//$jsonarray['lshproduct']=$lshproduct;
				//$jsonarray['topbrand']=$topbrand;
				$jsonarray['hotels']=$getHotelsDetail;
				//$jsonarray['deals']=$deals;
				//$jsonarray['dealsgategorys']=$dealsgategorys;
				echo json_encode($jsonarray);
			}else{
				echo "No category found";
			}
		}else{
			
			$this->display ('frontend/Hotel');
				
		}
	}
	
	public function getplaceID()
	{
		if($this->input->post())
		{
			$placekey=$this->input->post('placekey');
			
			$jsonData = json_decode(file_get_contents("http://partners.api.skyscanner.net/apiservices/hotels/autosuggest/v2/IN/INR/en-GB/$placekey?apiKey=se891278314094529612719886766340"),true);

			if(!empty($jsonData['results'])){
				echo "<option  value=\"\">where</option> ";
				foreach($jsonData['results'] as $place)
				{ 
					$placeID='';$placeName='';
					$placeID=$place['individual_id'];$placeName=$place['display_name'];
					echo "<option  value=\"$placeID\">$placeName</option> ";
				}
			}
		}
	}
	
	public function gethotels()
	{
		$app=$this->input->get('app');
		if($this->input->get())
		{
			$where=$this->input->get('where');
			$checkIn=$this->input->get('checkIn');
			$checkOut=$this->input->get('checkOut');
			$noOfGuests=$this->input->get('noOfGuests');
			$noOfRoom=$this->input->get('noOfRoom');
			
			$jsonData = json_decode(file_get_contents("http://partners.api.skyscanner.net/apiservices/hotels/liveprices/v2/IN/INR/en-GB/$where/$checkIn/$checkOut/$noOfGuests/$noOfRoom?apiKey=prtl6749387986743898559646983194"),true);
			
			
			if(!empty($jsonData['urls']['hotel_details'])){
				$hotelsDetailUrl=$jsonData['urls']['hotel_details'];
			}
			
			if(!empty($jsonData['hotels'])){
				
				$hotelsID='';
				
				foreach($jsonData['hotels'] as $hotel)
				{ 
					$hotelsID[]=$hotel['hotel_id'];
					
				}
			}
			
			if(!empty($hotelsDetailUrl) && !empty($hotelsID)){
				
				$hotelsID=implode(",",$hotelsID);
				$getHotelsDetail = json_decode(file_get_contents("http://partners.api.skyscanner.net$hotelsDetailUrl&hotelIds=$hotelsID"),true);
				if($app=true){
					echo json_decode($getHotelsDetail);exit;
				}else{
				$this->data['getHotelsDetail']=$getHotelsDetail;
				}
			}
			
		}
	}
	
}
