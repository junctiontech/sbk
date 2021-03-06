<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller 
{
		function __construct() 
		{
			parent::__construct();		
			$this->data[]="";
			$this->data['url'] = base_url();
			if (!$this->session->userdata('searchb4kharchadmin')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect("admin");}
			$this->userinfo=$this->data['userinfo']=$this->session->userdata('searchb4kharchadmin');
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
			$this->data['tablefetch'] = $this->Categories_model->Fatch_mapcategories();
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
					echo "<option value ='".$ct->categoryToShopID."')>".$ct->categoryUrl."</option>";
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
			$table= 's4k_category_details';
			$this->data['brand_name'] = $this->Categories_model->load_category($table);
			
			$this->load->view('admin/Addbrand', $this->data);
		}
		public function brand_Add ()
		{  
			$brandID = $this->input->POST('brandID');
			$data = array (
							'brandName' => $this->input->post('brandName'),
							'categoriesID' => $this->input->post('categoriesID'),
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
		
		public function Filter($url=false)
	{
		$categoriesID=$this->data['categoriesID']=$this->input->post('categoriesID');
		if(!empty($categoriesID)){
			$this->data['catfilters']=$this->Categories_model->get_catfilter(array('t1.categoryID'=>$categoriesID));
		}
		$this->data['category']=$this->Categories_model->get_categorydata();
		$this->display ('admin/Createfilter');
	}
	
	public function createfiltermodel($filtergroupID=false)
	{
		if(!empty($filtergroupID)){ 
			$query = $this->data['filtergroupdata']=$this->Categories_model->get_catfilter(array('t1.filterGroupID'=>$filtergroupID));
			if(!empty($query)){ foreach ($query as $data) {$filterGroupID=$data->filterGroupID ; }}
			$this->data['filtergroupvalue'] = $this->Categories_model->get_catfilterlable(array('filterGroupID'=>$filtergroupID));
			//print_r($this->data['filtergroupvalue']); die;
		}
		$this->data['categories']=$this->Categories_model->get_categorydata();
		$this->load->view('admin/Createfiltermodel', $this->data);
	}
	
	public function insertfilter()
	{
		if($this->input->post('submit')){
			$categoryID=$this->input->post('categoryid');
			$groupname=$this->input->post('groupname');
			$sortoder=$this->input->post('sortoder');
			$filterStatus=$this->input->post('status');
			$filterType=$this->input->post('filtertype');
			$lable=$this->input->post('lable');
			$name=$this->input->post('name');
			$value=$this->input->post('value');
			$filterGroupID=$this->input->post('filterGroupID');
			
			if(!empty($categoryID) && !empty($groupname) && !empty($filterType) && !empty($lable) && !empty($name) && !empty($value)){
				if(!empty($filterGroupID)){
					//$where=array('filterGroupID'=>$filterGroupID);
					$data1=array('categoryID'=>$categoryID,'groupName'=>$groupname,'sortOrder'=>$sortoder,'filterStatus'=>$filterStatus,'filterType'=>$filterType);
					$this->Categories_model->insert_catfilter($data1,$name,$lable,$value,$filterGroupID);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("index") . " Filter Updated Successfully!!");
				}else{
					$data1=array('categoryID'=>$categoryID,'groupName'=>$groupname,'sortOrder'=>$sortoder,'filterStatus'=>$filterStatus,'filterType'=>$filterType);
					$this->Categories_model->insert_catfilter($data1,$name,$lable,$value);
					$this->session->set_flashdata('message_type', 'success');
					$this->session->set_flashdata('message', $this->config->item("index") . " Filter Created Successfully!!");
				}
				
			}else{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("index") . " All Fields Are Mendatory!!");
			}
			
		}else{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("index") . " Invalid Request!!");
		}
		
		redirect('Categories/Filter');
	}
	
}