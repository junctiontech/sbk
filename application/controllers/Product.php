<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$this->userinfo=$this->session->userdata('searchb4kharch');
		$this->load->model('admin/Product_model');
		
	}

	public function display($template_file){
		$this->parser->parse('admin/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('admin/Footer',$this->data);
	}
	
	public function index($url=false)
	{
		
		//$products=$this->Product_model->get_products($query,$searchqry);
		
		$this->display ('admin/ProductList');
		
	}
	
	public function Addproduct($url=false)
	{
		
		$this->display ('admin/Addproduct');
		
	}
	
	public function MappProduct($url=false)
	{
		
		$this->display ('admin/MappProduct');
		
	}
	
	public function Testcaptch($url=false)
	{
		require_once('recaptchalib.php');
  $privatekey = "6Lfl8x4TAAAAAHUJQrKji5-rlUuAh5S0xgYwb3gS";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    echo"rohit";
  }
		
	}
	
	
}
