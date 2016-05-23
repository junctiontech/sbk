<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	function __construct() {
		parent::__construct();		
		$this->data[]="";
		$this->data['url'] = base_url();
		$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		if (!$this->session->userdata('searchb4kharchadmin')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect("admin");}
		$this->userinfo=$this->data['userinfo']=$this->session->userdata('searchb4kharchadmin');
		$this->load->model('admin/Product_model');
		$this->languageID='1';

	}

	public function display($template_file){
		$this->parser->parse('admin/Header',$this->data);
		$this->load->view($template_file, $this->data);
		$this->parser->parse('admin/Footer',$this->data);
	}
	
	public function index()
	{
		$this->data['category']=$this->Product_model->get_categories();
		$this->display ('admin/ProductList');
		
	}
	
	public function fetch_product()
	
	{	if(!empty($_GET['categoriesID'])){
		
		$product=$this->data['products']=$this->Product_model->fetch_product($_GET['categoriesID']);
	
		$this->data['category']=$this->Product_model->get_categories();
		
		$this->display ('admin/ProductList');
	}
	else{
		$this->data['category']=$this->Product_model->get_categories();
		$this->session->set_flashdata('message_type', 'success');        
        $this->session->set_flashdata('message', $this->config->item("fetch_product").' Select category');
		$this->display ('admin/ProductList');
	}
	}
	
	public function delete($categoryid=false,$id=false){
		$this->data['category']=$this->Product_model->get_categories();
		$filter=array('productsID'=>$id);
		$this->Product_model->delete('s4k_products_map','s4k_product_attribute_map','s4k_product_images_map','s4k_product_price_map' ,$filter);
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("delete")." Data deleted Successfully!!");
		redirect('product/fetch_product?categoriesID='.$categoryid);
	}
	
	public function update($categoryid=false,$status=false,$id=false){
			$this->data['category']=$this->Product_model->get_categories();
			$data=array('productsStatus'=>$status);
			$filter=array('ProductsID'=>$id);
			$this->Product_model->update('s4k_products_map',$data,$filter);	
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("delete")." Data status updated Successfully!!");
			redirect('product/fetch_product?categoriesID='.$categoryid);

	}
	public function edit($productid=false)
	{
		$this->data['updatedata']=$this->Product_model->get_product_update($productid);
		//print_r($this->data['updatedata']);die;
		$this->display ('admin/Addproduct');
	}
	public function insert_product()
	
{
	
	$query=$this->db->get_where('s4k_products_map',array('productsUrlKey'=>$this->input->post('productsUrlKey')));
		$result=$query->result();
		if(empty($result)){
			
		$productMapData=array('categoriesID'=>$this->input->post('categoriesID'),
								 'productsUrlKey'=>$this->input->post('productsUrlKey'),
								 'productsSortOrder'=>$this->input->post('productsSortOrder'),
								 'productsStatus'=>$this->input->post('productsStatus'),
								 'productName'=>$this->input->post('productName'),
								 'productDescription'=>$this->input->post('productDescription'));
		$this->db->insert('s4k_products_map',$productMapData);
		if($this->db->insert_id()){
			$productID=$this->db->insert_id();
		
			$productattributelabel=$this->input->post('productAttributeLabel');
			
			$productattributevalue=$this->input->post('productAttributeValue');
			
			
			$index=0;
			foreach($productattributelabel as $productattributelabel1){

			$productAttributeData=array('productsID'=>$productID,
										'productAttributeLable'=>$productattributelabel1,
										'productAttributeValue'=>$productattributevalue[$index]);
			$this->db->insert('s4k_product_attribute_map',$productAttributeData);
			$index++;
			}
			
			$productImage=array('productsID'=>$productID,
								'isDefault'=>$this->input->post('isDefault'),
								'imageName'=>$this->input->post('imageName'),
								'imageStatus'=>$this->input->post('imageStatus'),
								'productImageTitle'=>$this->input->post('productImageTitle'),
								'productImageAltTag'=>$this->input->post('productImageAltTag'));
								
			$this->db->insert('s4k_product_images_map',$productImage);
		
			
			$productPrice=array('productsID'=>$productID,
								'productPrice'=>$this->input->post('productPrice'),
								'shopID'=>$this->input->post('shopID'),
								'productShopUrl'=>$this->input->post('productShopUrl'));
			$this->db->insert('s4k_product_price_map',$productPrice);
		}
		}else{
			
			$productID=$result[0]->productsID;
			$query1=$this->db->get_where('s4k_product_price',array('productsID'=>$productID,'shopID'=>$this->input->post('shopID')));
			$result1=$query1->result();
			if(empty($result1)){
			$productPrice=array('productsID'=>$productID,
								'productPrice'=>$this->input->post('productPrice'),
								'shopID'=>$this->input->post('shopID'),
								'productShopUrl'=>$this->input->post('productShopUrl'));
			$this->db->insert('s4k_product_price_map',$productPrice);
			}else{
				$this->db->where(array('productsID'=>$productID,'shopID'=>$this->input->post('shopID')));
				$this->db->update('s4k_product_price',array('productShopUrl'=>$this->input->post('productShopUrl'),'productPrice'=>$this->input->post('productPrice')));
			}
		}
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("delete")." Data added Successfully!!");
			redirect('product/Addproduct');

	}	
	
	
	public function Addproduct($url=false)
	{
		$this->data['category']=$this->Product_model->get_categories();
		$this->data['shop']=$this->Product_model->get_shop();
		$this->display ('admin/Addproduct');
	
	}
	
	public function MappProduct($url=false)
	{
		$this->data['category']=$this->Product_model->get_categories();
		$this->display ('admin/Mappproduct');
		
	}
	
	public function search_product()
	{
		if($_POST)
		{
			
		$q=$_POST['productName'];
		$id='';
		$name='';
		$final_product_name='';
		$category=$this->input->post('categoryName');
		$product=$this->input->post('productName');
		$check_product=$this->Product_model->search_product($category,$product);
	echo "<option value=\"\">Select</option>";
		foreach($check_product as $check_product)
		{ $id=($check_product->productsID);
			$name=($check_product->productName);
		
	
	echo "<option value=\"$id\">$name </option> ";
	
	}
	}
	}
	
	public function map_product()
	{
	if(!empty($_POST['categoriesID']) && !empty($_POST['productName']))
	{
	$this->data['id']=$this->Product_model->selected_categories($_POST['categoriesID']);

	$FetchName=$this->data['Fetch_ProductName']=$this->Product_model->fetch_productname($_POST['productName']);
	
	$this->data['category']=$this->Product_model->get_categories();
	$map_product=$this->data['mappedproduct']=$this->Product_model->map_product($_POST['categoriesID'],$_POST['productName'],$FetchName[0]->productName);
	

	$this->display ('admin/MappProduct');
	}
	
	else{
		$this->session->set_flashdata('message_type', 'success');        
        $this->session->set_flashdata('message', $this->config->item("map_product").' Select category and product');
		$this->data['category']=$this->Product_model->get_categories();
		$this->display ('admin/MappProduct');
	}
	}
	
	public function mapped_product()
	{
		$parentProductID=$this->input->post('productName');
		$childproductID=$this->input->post('mapped_value');
	
		
		if(!empty($parentProductID && $childproductID ))
		{ 
		foreach($childproductID as $mapproductID){
			
		$data=array('parentProductID'=>$parentProductID,
						'childProductID'=>$mapproductID);
		$this->db->insert('s4k_product_mapping',$data);	
		
		}}
		else
		{
			
		$this->session->set_flashdata('message_type', 'success');        
        $this->session->set_flashdata('message', $this->config->item("mapped_product").' Checkbox are not checked');
		redirect('product/map_product');
		}
		$this->session->set_flashdata('message_type', 'success');        
        $this->session->set_flashdata('message', $this->config->item("mapped_product").' Your products are mapped');
		redirect('product/MappProduct');
	}
}
