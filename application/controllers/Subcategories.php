<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategories extends CI_Controller 
{
		function __construct() 
		{
			parent::__construct();		
			$this->data[]="";
			$this->data['url'] = base_url();	
			$this->load->model('admin/Subcategories_model');
		}
		public function display($template_file)
		{
			$this->parser->parse('admin/Header',$this->data);
			$this->load->view($template_file, $this->data);
			$this->parser->parse('admin/Footer',$this->data);
		}
		public function index()
		{
			$this->data['sub'] = $this->Subcategories_model->get_subcategory();
			$this->display('admin/subcategory', $this->data);
		}
		
		public function Addsubcategory ($subCategoriesID = false)
		{ 
			$table = 's4k_category_details';
			$this->data['category']= $this->Subcategories_model->fatchcategory($table); 
			if (!empty($subCategoriesID))
			{
				$this->data['subCategoriesID']=$subCategoriesID ;
				$sub= array ('t1.subCategoriesID'=>$subCategoriesID);
				$value= $this->data['query']=$this->Subcategories_model->fatchUpdate($sub);
				$data = array('subCategoriesID' => 0);
				$this->Subcategories_model->updateSubcetegory('s4k_category_to_shop', $data, $subCategoriesID);
				if(!empty($value)){
					$ar= $value[0]->categoryName;
					$this->data['Data']=$this->Subcategories_model->fatchCategoryUrl($ar);
				}				
			}
			$this->display('admin/Addsubcategory',$this->data);
		}
		public function Add_subcategory ()
		{	
			$subCategoriesID = $this->input->POST('subCategoriesID');
			$string = $this->input->post('subCategoryName');
			$name = str_replace(' ','_',$string);
			$string = $name ;
			$repname = rtrim($string, '_');
			$data = array (
						   'categoriesID' => $this->input->post('fildname'),
						   'subCategoriesUrlKey' => $this->input->post('subCategoriesUrlKey'),
						   'subCategoriesSortOrder' => $this->input->post('subCategoriesSortOrder'),
						   'subCategoriesStatus' => $this->input->post('subCategoriesStatus')
						   );
						   ($data['subCategoriesUrlKey']=$repname);
			$data2 = array (
							'subCategoryName' => $this->input->post('subCategoryName')
							);			
			$categoryToShopIDs = $this->input->POST('categoryToShopIDs');
			$table = 's4k_sub_categories';
			$table2 = 's4k_sub_category_details';
			if (!empty($subCategoriesID))
			{
				$subCategoriesID = array ('subCategoriesID'=>$subCategoriesID);
				$this->Subcategories_model->updatecategory($table, $table2, $data, $data2, $categoryToShopIDs, $subCategoriesID);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("Subcategories") . " You Have Successfully Update  Sub Categories this Record!!");
				redirect ('Subcategories');
			}
			else
			{
				$this->Subcategories_model->addcategory($table, $table2, $data, $data2, $categoryToShopIDs);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("Subcategories") . " You Have Successfully Add New Sub Categories this Record!!");
				redirect ('Subcategories/Addsubcategory');
			}
		}			
			public function DltSubcategories ($subCategoriesID)
			{
				$this->Subcategories_model->delete_subcategories($subCategoriesID);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("Subcategories") . " You Have Successfully Delete Sub Categories this Record!!");
				redirect ('Subcategories');
			}
			public function Get_categoryurl()
			{
				$categoriesID = $this->input->POST('categoriesID');
				$table ='s4k_category_to_shop';
				$value = $this->Subcategories_model->shop_tabledata($table, $categoriesID);
				if(!empty($value))
				{
					foreach($value as $ct)
					{
						echo "<option value ='".$ct->categoryToShopID."')>".$ct->categoryUrl."</option>";
					}
				}
				else
				{
					echo "<option>No Value</option>" ;
				}
			}			
}