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
				$oldvalue= $this->input->post('oldvalue');
				if($_FILES['shop_image']['name']!='')
					{
						$data['image_z1']= $_FILES['shop_image']['name'];   
						$shop_image=sha1($_FILES['shop_image']['name']).time().rand(0, 9);
						if(!empty($_FILES['shop_image']['name']))
							{
								$config =  array(
												'upload_path'	  => './uploads/images/shopimages/',
												'file_name'       => $shop_image,
												'allowed_types'   => "gif|jpg|png|jpeg|JPG|JPEG|PNG|JPG",
												'overwrite'       => true,
												);
								//var_dump($config);
								$this->upload->initialize($config);
								$this->load->library('upload');
   
									if($this->upload->do_upload("shop_image"))
										{
											$upload_data = $this->upload->data();
											$shop_image=$upload_data['file_name'];
   				
										}
									else
										{
											$this->upload->display_errors()."file upload failed";
											$image    ="";
										}
						}
					}
					//print_r($shop_image); die;
				$data= array (
							'shopUrl' => $this->input->post('shopUrl'),
							'shopApiUrl' => $this->input->post('shopApiUrl'),
							'shopApiKey' => $this->input->post('shopApiKey'),
							'shopApiToken' => $this->input->post('shopApiToken'),
							'shopName' => $this->input->post('shopName'),
							'shopSortOrder' => $this->input->post('shopSortOrder'),
							'shopStatus' => $this->input->post('shopStatus'),
							'shopkey' => $this->input->post('shopkey')
							);
							
							//print_r($data); die;
						$table = 's4k_shops';
						
						if(!empty($shopID))
						{
							if (!empty($shop_image))								
							{ 
								($data['shop_image'] = $shop_image);
									 $originalPath=base_url().'uploads/images/shopimages/'.$oldvalue;							 	
										if (file_exists ($originalPath )) 
										{ 	
											unlink ($originalPath );				
										}	
							}
							$shopID = array('shopID' => $shopID);
							$this->Setting_Model->Update_Shop($table, $data, $shopID);
							$this->session->set_flashdata('message_type', 'success');
							$this->session->set_flashdata('message', $this->config->item("Setting") . " You Have Successfully Update Shop this Record!!");
							redirect ('Setting');
						}
						else
						{
							($data['shop_image'] = $shop_image);
							$this->Setting_Model->Add_Shop($table, $data);
							$this->session->set_flashdata('message_type', 'success');
							$this->session->set_flashdata('message', $this->config->item("Setting") . " You Have Successfully Add New Shop this Record!!");
							redirect ('Setting');
						}
			}
			public function delete_Shop($shopID, $shop_image)
			{
				$table='s4k_shops';
				 $originalPath=base_url().'uploads/images/shopimages/'.$shop_image;				
				if (file_exists ( $originalPath )) {
					unlink ($originalPath );					
				}
				$this->Setting_Model->Dlt_shop($table, $shopID, $shop_image);
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
		public function Apiinfo ()
		{ 
			$table = 'sbk_other_api_info';
			$this->data['tableapi'] = $this->Setting_Model->get_tableapi($table);
			$this->display('admin/Apiinfo', $this->data);
		}
		public function Addapi ($apiID = false)
		{ 
			if (!empty($apiID))
			{
				$apiID = array ('apiID' => $apiID);				
				$table = 'sbk_other_api_info';
				$this->data['fatch'] = $this->Setting_Model->updatefatch($table, $apiID);
			}			
			$this->load->view('admin/Addapi', $this->data);
		}
		public function insertapi ()
		{
			$apiID = $this->input->POST('apiID');
			$data = array(
							'apiName' => $this->input->post('apiName'),
							'appID' => $this->input->post('appID'),
							'appSecreatID' => $this->input->post('appSecreatID'),
							'Status' => $this->input->post('Status')
							);
			$table = 'sbk_other_api_info';
			if (!empty($apiID))
			{
				$apiID = array ('apiID' => $apiID);
				$this->Setting_Model->Update_api($table, $data, $apiID);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("Setting") . " You Have Successfully Update Api this Record!!");
				redirect ('Setting/Apiinfo');
			}
			else
			{
				$this->Setting_Model->Insert_api($table, $data);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("Setting") . " You Have Successfully Add New Api this Record!!");
				redirect ('Setting/Apiinfo');
			}			
		}
		public function Delete_api ($apiID)
		{			
			$table ='sbk_other_api_info';
			$this->Setting_Model->api_delete($table, $apiID);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("Setting") . " You Have Successfully Delete Api this Record!!");
			redirect ('Setting/Apiinfo');
		}
}




