<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		if (!$this->session->userdata('searchb4kharchadmin')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect("admin");}
		$this->userinfo=$this->data['userinfo']=$this->session->userdata('searchb4kharchadmin');
		$this->load->model('admin/Inventory_model');
	}

	public function display($template_file){
		$this->parser->parse('admin/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('admin/Footer',$this->data);
	}
	
	public function index($url=false)
	{
		$this->data['inventoryconsumptions']=$this->Inventory_model->get_inventoryconsumptionlist();
		$this->display ('admin/Inventoryconsumption');
		
	}
	
	public function Loadinventoryconsumptionmodal($inventoryConsumptionID=false)
	{
		if(!empty($inventoryConsumptionID)){
			$where=array('inventoryConsumptionID'=>$inventoryConsumptionID);
			$select="inventoryConsumptionID,inventoryMasterID,productID,productImage,sortOrder,Status,categoriesID";
			$extraqry="'s4k_products t2','t1.productID=t2.productsID'";
			
		$this->data['inventory']=$inventory=$this->Inventory_model->get_data($select,'s4k_inventory_consumption t1',$where,$extraqry);
		if(!empty($inventory)){
		$this->data['products']=$this->Inventory_model->get_product_by_cat(array('t1.productsID'=>$inventory[0]->productID));
		}
		}
		$this->data['inventorytypes']=$this->Inventory_model->get_inventoryname();
		$this->data['categories']=$this->Inventory_model->get_categories();
		$this->load->view('admin/Inventoryconsumptionmodal',$this->data);
		
	}
	
	public function get_products_by_cat($url=false)
	{
		$categoryID=$this->input->post('categoryID');
		if(!empty($categoryID)){
			$where=array('categoriesID'=>$categoryID);
		$products=$this->Inventory_model->get_product_by_cat($where);
		if(!empty($products)){
				foreach($products as $product){
					echo'<option value="';echo $product->productsID;echo'">';echo $product->productName;echo'</option>';
				}
				
			}else{
				echo"<option value=''>No product found!!</option>";
			}
		}
	}
	
	public function Insertinventryconsumption($url=false)
	{
		$submit = $this->input->post('submit');
		if (!empty($submit)) {

			$inventoryMasterID = $this->input->post('inventoryMasterID');
			$productID = $this->input->post('productID');
			$sortoder = $this->input->post('sortoder');
			$status = $this->input->post('status');
			$banerimage = $this->input->post('banerimage');
			$inventoryConsumptionID = $this->input->post('inventoryConsumptionID');
			$date = date("Y-m-d h:i:s");
			
			if (!empty($inventoryMasterID) && !empty($productID) && !empty($sortoder) && !empty($status)) {

				if(empty($inventoryConsumptionID)){
					$filter = array('inventoryMasterID' => $inventoryMasterID);
					$maxquantity = $this->Inventory_model->get_data('maxQuantity','s4k_inventory_master',$filter);
					$inventorycountfilter = array('inventoryMasterID' => $inventoryMasterID);
					$inventorycountdata = $this->Inventory_model->get_data('count(inventoryConsumptionID) as count','s4k_inventory_consumption',$inventorycountfilter);
					
					if (!empty($maxquantity) && !empty($inventorycountdata) && $inventorycountdata[0]->count>=$maxquantity[0]->maxQuantity) {
						$max=$maxquantity[0]->maxQuantity;
						$this->session->set_flashdata('message_type', 'error');
						$this->session->set_flashdata('message', $this->config->item("index") . "The max quantity of inventory is $max and its all used!!");
					} else {
						$data=array('inventoryMasterID'=>$inventoryMasterID,'productID'=>$productID,
									 'sortOrder'=>$sortoder,'Status'=>$status);
						$this->Inventory_model->insert_data('s4k_inventory_consumption',$data);
						$this->session->set_flashdata('message_type', 'success');
						$this->session->set_flashdata('message', $this->config->item("index") . " Inventory Created Successfully!!");
					}
				}else{
						$data=array('inventoryMasterID'=>$inventoryMasterID,'productID'=>$productID,
									 'sortOrder'=>$sortoder,'Status'=>$status,'updatedOn'=>$date);
						$where=array('inventoryConsumptionID'=>$inventoryConsumptionID);
						$this->Inventory_model->insert_data('s4k_inventory_consumption',$data,$where);
						$this->session->set_flashdata('message_type', 'success');
						$this->session->set_flashdata('message', $this->config->item("index") . " Inventory Updated Successfully!!");
				}
				
			} else {
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("index") . " All Fields Are Mendatory!!");
				redirect('Inventory');
			}
		} else {

			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Invalid Request!!");
		}

		redirect('Inventory');
	}
	
	public function Createinventory($url=false)
	{
		$this->data['inventries']=$this->Inventory_model->get_inventor_list();
		$this->display ('admin/Createinventory');
	}
	
	public function Loadinventorymodal($inventoryMasterID=false)
	{
		if(!empty($inventoryMasterID)){
			$where=array('inventoryMasterID'=>$inventoryMasterID);
			$select="inventoryMasterID,inventoryTypeID,maxQuantity";
		$this->data['inventory']=$this->Inventory_model->get_data($select,'s4k_inventory_master',$where);
		}
		$this->data['inventorytypes']=$this->Inventory_model->get_inventorytype();
		$this->load->view('admin/createinventorymodal',$this->data);
	}
	
	public function Insertinventory($url=false)
	{
		$submit = $this->input->post('submit');
		if (!empty($submit)) {

			$inventoryTypeID = $this->input->post('inventoryID');
			$inventoryunit = $this->input->post('maxquantity');
			$inventoryMasterID = $this->input->post('inventoryMasterID');
			$date = date("Y-m-d h:i:s");
			
			if (!empty($inventoryTypeID) && !empty($inventoryunit)) {

				if(empty($inventoryMasterID)){
					$filter = array('inventoryTypeID' => $inventoryTypeID);
					$iventoryvalidation = $this->Inventory_model->get_data('inventoryMasterID','s4k_inventory_master',$filter);
					if (!empty($iventoryvalidation)) {
						$this->session->set_flashdata('message_type', 'error');
						$this->session->set_flashdata('message', $this->config->item("index") . "This inventory is already created!!");
					} else {
						$data=array('inventoryTypeID'=>$inventoryTypeID,'maxQuantity'=>$inventoryunit);
						$this->Inventory_model->insert_data('s4k_inventory_master',$data);
						$this->session->set_flashdata('message_type', 'success');
						$this->session->set_flashdata('message', $this->config->item("index") . " Inventory Created Successfully!!");
					}
				}else{
						$data=array('maxQuantity'=>$inventoryunit,'updatedOn'=>$date);
						$where=array('inventoryMasterID'=>$inventoryMasterID);
						$this->Inventory_model->insert_data('s4k_inventory_master',$data,$where);
						$this->session->set_flashdata('message_type', 'success');
						$this->session->set_flashdata('message', $this->config->item("index") . " Inventory Updated Successfully!!");
				}
				
			} else {
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("index") . " All Fields Are Mendatory!!");
				redirect('Inventory/Createinventory');
			}
		} else {

			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Invalid Request!!");
		}

		redirect('Inventory/Createinventory');
	}
	public function updatestatus()
	{
		//print_r($_POST); die;
		$status=$this->input->post('status');
		$inventoryConsumptionID=$this->input->post('inventoryConsumptionID');
		if(!empty($inventoryConsumptionID))
		{
			if(!empty($status))
			{
				$data=array('Status'=>$status);
				$this->Inventory_model->updatestatus('s4k_inventory_consumption',$data,$inventoryConsumptionID);
			}
				redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			$this->session->set_flashdata('message_type', 'error');        
			$this->session->set_flashdata('message', $this->config->item("fetch_product").'Please checked atleast one checkbox');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	
}
