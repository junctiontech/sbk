<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller 
{
		function __construct() 
		{
			parent::__construct();		
			$this->data[]="";
			$this->data['url'] = base_url();	
			$this->load->model('admin/Categories_model');
		}	
		public function display($template_file)
		{
			$this->parser->parse('admin/Header',$this->data);
			$this->load->view($template_file, $this->data);
			$this->parser->parse('admin/Footer',$this->data);
		}
		public function index($url=false) 
		{
			$this->data['categories']=$this->Categories_model->get_categories();
			$this->display('admin/Categorieslist', $this->data);
		}
		public function AddCategories($categoriesID=false)
		{
			if(!empty($categoriesID))
			{
				$categoriesID = array ('t1.categoriesID'=>$categoriesID);
				$this->data['categoriesID'] = $categoriesID ;
				$this->data['query'] = $this->Categories_model->get_Categori($categoriesID);				
			}
				$table = 's4k_shops';
				$this->data['shopdatas']= $this->Categories_model->get_shopName($table);
				$this->display('admin/AddCategories', $this->data);
		}
			public function Add_Categories()
		{ 
				$categoriesID= $this->input->Post('categoriesID') ;
				$string = $this->input->post('categoryName');
				$name = str_replace(' ','_',$string);
				$string = $name ;
				$repname = rtrim($string, '_');
				$data = array
					( 
							'categoriesUrlKey' => $this->input->post('categoriesUrlKey'),
							'categoriesSortOrder' => $this->input->post('categoriesSortOrder'),
							'categoriesStatus' => $this->input->post('categoriesStatus')
					);
							// table content s4k_category_details
				($data['categoriesUrlKey']=$repname);
				 $data1 = array
					(  
							'categoryName' => $this->input->post('categoryName')		
					);
							$table = 's4k_categories';
							$table1 = 's4k_category_details';						
					if(!empty($categoriesID))
						{ 
							$categoriesID = array ('categoriesID'=> $categoriesID);
							$this->Categories_model->Update_Categories($table, $table1, $data, $data1, $categoriesID);
							$this->session->set_flashdata('message_type', 'success');
							$this->session->set_flashdata('message', $this->config->item("Categories") . " You Have Successfully Update Categories this Record!!");
							redirect ('Categories');
						}
					else
						{
							$this->Categories_model->Add_Categories($table, $table1, $data, $data1);
							$this->session->set_flashdata('message_type', 'success');
							$this->session->set_flashdata('message', $this->config->item("Categories") . " You Have Successfully Add New Categories this Record!!");
							redirect ('Categories/AddCategories');
						}
		}		
		public function Dltcategories($categoriesID)
		{
			$this->Categories_model->Dlt_categories($categoriesID);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("Categories") . " You Have Successfully Delete Categories this Record!!");
			redirect ('Categories');
		}	
		public function MapCategories ($categoriestoshopID= false)
		{	
			$ar='';
			$table = 's4k_category_details';
			$this->data['categories']= $this->Categories_model->Categories_name($table);
			$this->data['fetch'] = $this->Categories_model->Fatch_mapcategories();
			if (!empty($categoriestoshopID))
			{ 		$this->data['categoriestoshopID']=$categoriestoshopID;
					$categoriestoshopID = array ('categoryToShopID'=>$categoriestoshopID);
					$onevalue=$this->data['map'] = $this->Categories_model->map_fatch($categoriestoshopID);
					$data=array('categoriesID'=>0);
					$this->Categories_model->updaterecords('s4k_category_to_shop',$data,$categoriestoshopID);
					if(!empty($onevalue)){
						$ar= $onevalue[0]->categoryName;
						$this->data['min'] = $this->Categories_model->map_category($ar); 
					}
			}
			$this->display('admin/MapCategories', $this->data);
		}		
		public function Categories_Map()
		{
			$categoriesID = $this->input->POST('categoriesID');
			$table ='s4k_category_to_shop';
			$category = $this->Categories_model->Categories_Shop($table, $categoriesID);
			if (!empty($category))
			{
				foreach($category as $ct)
				{
					echo "<option value ='".$ct->categoryToShopID."')>".$ct->categoryKey."</option>";
				}
			}
			else
			{
				echo "<option>No value</option>" ;
			}
		}
		public function Map_Update()
		{
			$CategoriesID = $this->input->POST('findname');
			$categoryToShopIDs = $this->input->POST('categoryToShopIDs');
			foreach($categoryToShopIDs as $ac)
			{
				$categoryToShopID = $ac ;
				$data = array(
								'categoriesID' => $this->input->POST('findname')
							 );
				$table = 's4k_category_to_shop';
				$this->Categories_model->Update_Map($table,$data,$categoryToShopID);
			}
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("Categories") . " You Have Successfully Map Categories this Record!!");
			redirect ('Categories/MapCategories');
		}
		public function Brand ()
		{
			$table ='s4k_brand';
			$this->data['brand'] = $this->Categories_model->get_brand($table);
			$this->display('admin/Brand', $this->data);
		}
		public function Addbrand($brandID=false)
		{ 
		
		if(!empty($brandID))
		{
			$brandID = array('brandID' => $brandID);
			$this->data['brandID'] = $brandID;
			$table = 's4k_brand';
			$this->data['brand']= $this->Categories_model->Brand_fatch($table, $brandID);
		}
			$this->load->view('admin/Addbrand', $this->data);
		}
		public function brand_Add ()
		{  
			$brandID = $this->input->POST('brandID');
			$data = array (
							'brandName' => $this->input->post('brandName'),
							'brandKey' => $this->input->post('brandKey'),
							'brandStatus' => $this->input->post('brandStatus'),
							'brandSortOrder' => $this->input->post('brandSortOrder')
						   );
					$table = 's4k_brand';
				if (!empty($brandID))
				{
					$brandID = array ('brandID' => $brandID);
					$this->Categories_model->Update_brand($table,$data, $brandID);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("Categories") . " You Have Successfully Update Brand this Record!!");
					redirect ('Categories/Brand');
				}
				else
				{
					$this->Categories_model->add_brand($table, $data);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("Categories") . " You Have Successfully Add New Brand this Record!!");
					redirect ('Categories/Brand');
				}
		}
		public function delete_Brand ($brandID)
		{
			$table = 's4k_brand';
			$this->Categories_model->Brand_delete($table, $brandID);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("Categories") . " You Have Successfully Delete Brand this Record!!");
			redirect ('Categories/Brand');
		}
	
}

