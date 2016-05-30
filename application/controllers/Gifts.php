 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gifts extends CI_Controller {
		
		
		function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();	
		$this->load->model('admin/Gift_model');
		}
	
	public function display($template_file){
		$this->parser->parse('admin/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('admin/Footer',$this->data);
	}
	public function index ()
	{
		$this->display('admin/Viewgift',$this->data);
	}
	public function Addgift ()
	{
		$this->display('admin/Addgift', $this->data);
	}

}