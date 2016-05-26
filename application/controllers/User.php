<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for User Functionality */
class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		if (!$this->session->userdata('searchb4kharch')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect("Login");}
		$this->userinfos=$this->data['userinfos']=$this->session->userdata('searchb4kharch');
		$this->load->model('frontend/Login_model');
		$this->load->model('frontend/User_model');
		$this->load->model('frontend/Landingpage_model');
		$this->load->library('form_validation');
		$this->data['base_url']=base_url();
		$this->data['categories']=$categories=$this->Landingpage_model->get_categories();
		$this->data['topbrands']=$topbrand=$this->Landingpage_model->get_topbrand();
		$wishlist=$this->User_model->get_wishlistcount('s4k_user_wishlist',array('userID'=>$this->userinfos['userID'],'Status'=>'Active'));
		$this->data['whislist']=count($wishlist);
		foreach($wishlist as $wishlists){
		$this->data['whislistproduct'][]=$wishlists->productID;
		}
	}
	
	public function display($template_file){
		$this->parser->parse('frontend/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function dashboard()
	{	
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Leftheader',$this->data);
		$this->parser->parse('frontend/Dashboard',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	public function personal_info($id=false)
	{	
		$data=$this->data['userdata']=$this->Login_model->fetch($id);
		$this->parser->parse('frontend/Header',$this->data);
		$this->parser->parse('frontend/Leftheader',$this->data);
		$this->parser->parse('frontend/info',$this->data);
		$this->parser->parse('frontend/Footer',$this->data);
	}
	
	public function AddToWishList($productID=false)
	{	
		if(!empty($productID) && !empty($this->userinfos['userID'])){
			$data=array('userID'=>$this->userinfos['userID'],'productID'=>$productID,'Status'=>'Active');
			$this->User_model->addwishlist('s4k_user_wishlist',$data);
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	
	
}