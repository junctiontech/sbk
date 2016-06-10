 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deals extends CI_Controller {
		
		
		function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();	
		$this->load->model('admin/Deal_model');
		}
	
	public function display($template_file){
		$this->parser->parse('admin/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('admin/Footer',$this->data);
	}
	public function index ()
	{
		$this->data['Deal'] = $this->Deal_model->viewdeal();		
		$this->display('admin/Viewdeal', $this->data);
	}
	public function Adddeal ()
	{
		$this->display('admin/Adddeal', $this->data);
	}
	public function UpdateStatus_deal ($dealID, $Status)
	{
		if(!empty($Status))
		{ 
			if($Status=='Active')
			{
				$data = array ('Status' => 'Active');
				$this->Deal_model->UpdateStatus_deal($data, $dealID);
			}
			elseif($Status=='Inactive')
			{
				$data = array ('Status' => 'Inactive');
				$this->Deal_model->UpdateStatus_deal($data, $dealID);
			}
							$this->session->set_flashdata('message_type', 'success');
							$this->session->set_flashdata('message', $this->config->item("Deals") . " You Have Successfully Update this Record!!");
							redirect ('Deals');
		}
			
	}
}
