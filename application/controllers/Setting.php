<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller 
{
		function __construct() 
		{
			parent::__construct();		
			$this->data[]="";
			$this->data['url'] = base_url();	
			if (!$this->session->userdata('searchb4kharchadmin')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect("admin");}
			$this->userinfo=$this->data['userinfo']=$this->session->userdata('searchb4kharchadmin');
			$this->load->model('admin/Setting_Model');
		}
			public function display($template_file)
			{
			$this->parser->parse('admin/Header',$this->data);
			$this->load->view($template_file, $this->data);
			$this->parser->parse('admin/Footer',$this->data);
			}
			public function index ()
			{
				$table =' s4k_shops';
				$this->data['shop']= $this->Setting_Model->get_shop($table);
				$this->display('admin/Shoplist', $this->data);
			}	
			public function shop_Add()
			{
				$shopID = $this->input->POST('shopID');
				print_r($_POST); die;
				 $config = array(
							'upload_path' => "./uploads/images/shopimages",
							'allowed_types' => "gif|jpg|png|jpeg",
							'overwrite' => TRUE,
							'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
							'max_height' => "768",
							'max_width' => "1024"  ); 
				$data= array (
							'shopUrl' => $this->input->post('shopUrl'),
							'shopApiUrl' => $this->input->post('shopApiUrl'),
							'shopApiKey' => $this->input->post('shopApiKey'),
							'shopApiToken' => $this->input->post('shopApiToken'),
							'shopName' => $this->input->post('shopName'),
							'shopSortOrder' => $this->input->post('shopSortOrder'),
							'shop_image' => $this->input->post('shop_image'),
							'shopStatus' => $this->input->post('shopStatus'),
							'shopkey' => $this->input->post('shopkey')
							);
						$table = 's4k_shops';
						
						if(!empty($shopID))
						{
							$shopID = array('shopID' => $shopID);
							$this->Setting_Model->Update_Shop($table, $data, $shopID);
							$this->session->set_flashdata('message_type', 'success');
							$this->session->set_flashdata('message', $this->config->item("Setting") . " You Have Successfully Update Shop this Record!!");
							redirect ('Setting');
						}
						else
						{
							$this->Setting_Model->Add_Shop($table, $data);
							$this->session->set_flashdata('message_type', 'success');
							$this->session->set_flashdata('message', $this->config->item("Setting") . " You Have Successfully Add New Shop this Record!!");
							redirect ('Setting');
						}
			}
			public function delete_Shop($shopID)
			{
				$table='s4k_shops';
				$this->Setting_Model->Dlt_shop($table, $shopID);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("Setting") . " You Have Successfully Delete Shop this Record!!");
				redirect ('Setting');
			}
		public function Addshop ($shopID = false)
		{
			if (!empty($shopID))
			{
				$shopID = array ('shopID'=> $shopID);
				$this->data['shopID'] = $shopID;
				$table='s4k_shops';
				$this->data['shopdata'] = $this->Setting_Model->Shopdata_fatch($table,$shopID);
			}
			$this->load->view('admin/Addshop', $this->data);
		}
}




