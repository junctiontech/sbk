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
	public function Inventorydealview ()
	{
		$this->data['Inventorydeal']=$this->Deal_model->featuredeal();	
		$this->display('admin/Inventorydealview', $this->data);
	}	
	public function CreateInventorydeal ($dealMasterID=false)
	{
		if(!empty($dealMasterID))
		{
			$where = array('dealMasterID'=>$dealMasterID);
			$this->data['inventorydealupd']=$this->Deal_model->get_deal($where);			
		}
		$this->data['inventorydealtype']=$this->Deal_model->get_featuredealtype();
		$this->load->view('admin/CreateInventorydeal',$this->data);
	}
	public function InventoryAdddeal ()
	{
		//print_r($_POST); die;
		$dealMasterID=$this->input->post('dealMasterID');		
		$data = array(
						'dealTypeID' =>$this->input->post('dealTypeID'),
						'maxQuantity' =>$this->input->post('maxquantity')
						);		
		$table ='s4k_inventorydeals_master';
		if(!empty($dealMasterID))
		{
			$where=array('dealMasterID'=>$dealMasterID);
			$this->Deal_model->add_featuredeal($table,$data,$where);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("Deals") . " You Have Successfully Update this Record!!");
			redirect ('Deals/Inventorydealview');
		}
		else{
			$this->Deal_model->add_featuredeal($table,$data);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("Deals") . " You Have Successfully Add this Record!!");
			redirect ('Deals/Inventorydealview');
		}		
	}
	public function Inventorydeal()
	{
		$this->data['newdeals']=$this->Deal_model->get_newdeal();				
		$this->display('admin/inventorydeal', $this->data);
	}
	public function AddInventorydeal ($dealConsumptionID=false)
	{
		if(!empty($dealConsumptionID))
		{
			$where= array('dealConsumptionID'=>$dealConsumptionID);
			$select="dealConsumptionID,dealMasterID,t1.dealID,sortOrder,t1.Status,t2.category";
			$extraselect="'s4k_deals t2','t1.dealID=t2.dealID'";
			$table='s4k_inventorydeals_consumption t1';
			$this->data['newfatch']=$newfatchs=$this->Deal_model->fatchnewdealupd($select,$table,$where,$extraselect);			
			if(!empty($newfatchs))
			{
				$where=array('t1.Status'=>'Active','category'=>$newfatchs[0]->category);				
				$this->data['categorydeal']=$this->Deal_model->get_by_dealcategory($where);				
			}
		}
		$this->data['cetegorydeal'] = $this->Deal_model->get_cetegorydeal();
		$this->data['featuredealName']=$this->Deal_model->get_featureDealName();		
		$this->load->view('admin/AddInventorydeal',$this->data);
	}
	public function Add_InventoryConsumption_deal()
	{		
		
		$dealConsumptionID =$this->input->post('dealConsumptionID');		
		$data = array(
						'dealMasterID' =>$this->input->post('dealMasterID'),
						'dealID' =>$this->input->post('dealID'),
						'sortOrder' =>$this->input->post('sortOrder'),
						'status' =>$this->input->post('status')						
						);
		$table='s4k_inventorydeals_consumption';
			if(!empty($dealConsumptionID))
			{
				$where = array('dealConsumptionID'=>$dealConsumptionID);
				$this->Deal_model->Add_featre_Deal($table,$data,$where);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("Deals") . " You Have Successfully Update this Record!!");
				redirect ('Deals/Inventorydeal');
			}
			else{
				$this->Deal_model->Add_featre_Deal($table,$data);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("Deals") . " You Have Successfully Add this Record!!");
				redirect ('Deals/Inventorydeal');
			}		
	}
	public function Get_data_bycategory ()
	{
		$dealID = $this->input->post('dealID');
		$deal =$this->Deal_model->get_databydealcategory($dealID);
		if(!empty($deal))
		{
			foreach ($deal as $ct){
				  echo "<option value ='".$ct->dealID."')>".$ct->coupon_title."</option>";
			}
		}
		else{
			echo "<option>No value</option>";
		}
	}	
}
