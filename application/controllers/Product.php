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
	
	public function Viewproductbyfilter()
	{	
		$get_data=$this->input->get();
		if(!empty($get_data)){
			$this->data['categoriesID']=$categoriesID=$get_data['categoriesID'];
			$this->data['shopID']=$shopID=$get_data['shopID'];
			$this->data['productStatus']=$productStatus=$get_data['productStatus'];
			$this->data['liveStatus']=$liveStatus=$get_data['liveStatus'];
			$this->data['mapp']=$mapp=$get_data['mapp'];
			$where=array();
			if($categoriesID){ $where['categoriesID']=$categoriesID; }
			if($shopID){ $where['t4.shopID']=$shopID; }
			if($productStatus){ $where['productsStatus']=$productStatus; }
			if($liveStatus){ $where['liveStatus']=$liveStatus; }
			if($mapp){ $where['mapp']=$mapp; }
			$product=$this->data['products']=$this->Product_model->get_product_by_filter($where);
			$this->data['category']=$this->Product_model->get_categories();
			$this->data['shops']=$this->Product_model->get_shop();
			$this->display ('admin/Viewproductbyfilter');
		}
		else{
			$this->data['category']=$this->Product_model->get_categories();
			$this->session->set_flashdata('message_type', 'success');        
			$this->session->set_flashdata('message', $this->config->item("fetch_product").' Select category');
			$this->display ('admin/Viewproductbyfilter');
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
			redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function inactiveproduct($status=false,$id=false){
			
			$categoriesID=$this->input->get('categoriesID');
			$data=array('productsStatus'=>$status);
			$filter=array('ProductsID'=>$id);
			$this->Product_model->update('s4k_products',$data,$filter);	
			if(!empty($categoriesID)){ redirect($_SERVER['HTTP_REFERER']); }else{ echo"success"; }
	}
	
	public function moveToLive($productID=false){
			
			$categoriesID=$this->input->get('categoriesID');
			if(!empty($productID)){
				$productdata=$this->Product_model->get_product_full_data(array('t1.productsID'=>$productID));
				if(!empty($productdata)){
					$productdata1=array('categoriesID'=>$productdata[0]->categoriesID,
								'subCategoriesID'=>$productdata[0]->subCategoriesID,
								'productBrand'=>$productdata[0]->productBrand,
								'productsUrlKey'=>$productdata[0]->productsUrlKey,
								'productsSortOrder'=>$productdata[0]->productsSortOrder,
								'productsStatus'=>$productdata[0]->productsStatus,
								'productName'=>$productdata[0]->productName,
								'productDescription'=>$productdata[0]->productDescription,
								'imageSortOrder'=>$productdata[0]->imageSortOrder,
								'isDefault'=>$productdata[0]->isDefault,
								'imageName'=>$productdata[0]->imageName,
								'imageStatus'=>$productdata[0]->imageStatus,
								'productImageTitle'=>$productdata[0]->productImageTitle,
								'productImageAltTag'=>$productdata[0]->productImageAltTag,
								'currencyID'=>$productdata[0]->currencyID,
								'productPrice'=>$productdata[0]->productPrice,
								'shopProductID'=>$productdata[0]->shopProductID,
								'shopID'=>$productdata[0]->shopID,
								'productShopUrl'=>$productdata[0]->productShopUrl
								);
								$productattribute=$this->Product_model->get_product_attribute(array('productsID'=>$productID));
								$this->Product_model->insert_mapp_it($productdata1,'',$productattribute);
								$this->Product_model->update('s4k_products',array('liveStatus'=>'Yes'),array('productsID'=>$productID));
				}
			}
			if(!empty($categoriesID)){ redirect($_SERVER['HTTP_REFERER']); }else{ redirect(base_url().'Dashboard.html'); }
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
				
			$productAttributeData=array(
										'productID'=>$productID,
										'categoriesID'=>$this->input->post('categoriesID'),
										'attributeID'=>$productattributelabel1,
										'productAttributeValue'=>$productattributevalue[$index]);
				
			$this->db->insert('s4k_product_to_attributes',$productAttributeData);
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
public function chooseattribute()
	
	{	$categoriesID=$this->input->post('categoriesID');

		
		if(!empty($categoriesID))
		{
		$productattribute=$this->data['attribute']=$this->Product_model->get_attribute($categoriesID);

		foreach($productattribute as $attribute)
		{	
			$category=($attribute->categoriesID);
			$product_attribute=($attribute->productAttributeLable);
			$product_attributeid=($attribute->AttributeID);
				echo "<option value=\"$product_attributeid\">$product_attribute </option> ";
		}
		}
		else{
			echo "<option value=\"No attribute found\">No attribute found </option> ";
		}
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
			
		$id='';
		$name='';
		$final_product_name='';
		$category=$this->input->post('categoryName');
		$product=$this->input->post('productName');
		$check_product=$this->Product_model->search_product($category,$product);
		//print_r($check_product);die;
	echo "<option value=\"\" selected>Select</option>";
	$i=1;
		foreach($check_product as $check_product)
		{ $id=($check_product->productsID);
			$name=($check_product->productName);
			$attribute=($check_product->attr);
			if($i==1){ $select="selected";}else{ $select='';}
	
	echo "<option  value=\"$id\">$name $attribute</option> ";
	$i++;
	}
	}
	}
	
	public function map_product()
	{
	if(!empty($_POST['categoriesID']) && !empty($_POST['productName']))
	{
	$this->data['id']=$this->Product_model->selected_categories($_POST['categoriesID']);

	$FetchName=$this->data['Fetch_ProductName']=$this->Product_model->fetch_productname($_POST['productName']);
	$Fetchdata=$this->data['fetch_productmapped']=$this->Product_model->fetch_productmapped($_POST['productName']);
	$this->data['category']=$this->Product_model->get_categories();
	$map_product=$this->data['mappedproduct']=$this->Product_model->map_product1($_POST['categoriesID'],$_POST['productName'],$FetchName[0]->productName);
	

	$this->display ('admin/Mappproduct');
	}
	
	else{
		$this->session->set_flashdata('message_type', 'error');        
        $this->session->set_flashdata('message', $this->config->item("map_product").' Select category and product');
		$this->data['category']=$this->Product_model->get_categories();
		$this->display ('admin/Mappproduct');
	}
	}
	
	public function getproductimage()
	{
		
		$productName=$this->input->post('productID');
		if(!empty($productName))
		{
			$FetchNames=$this->Product_model->fetch_productname($productName);
			
			if(!empty($FetchNames)){
				foreach($FetchNames as $FetchName){
				echo'<div class="thumbnail">';
                    echo'<div class="image view view-first">';
                        echo"<img style=\"width: 100%; height:150px; display: block;\" src=$FetchName->imageName alt=\"image\" />";
					echo'</div>';
                    echo'<div class="caption">';
						echo"<p>$FetchName->productName</p>";
						echo"<p style=\"margin-top:10px\">Price-$FetchName->productPrice</p>";
						echo"<p style=\"margin-top:10px\">Shop-$FetchName->shopName</p>";
						echo"<p style=\"margin-top:10px\">$FetchName->attr</p>";
					echo'</div>';
				}	
			}else{
				echo"Invalid product!!";
			}
		}else{
			echo"Invalid product!!";
		}
	}
	
	public function getProductToMapp()
	{
		
		$productName=$this->input->post('productID');
		$categoryID=$this->input->post('categoriesID');
		if(!empty($productName))
		{
			$FetchNames=$this->Product_model->fetch_productname($productName);
			if(!empty($FetchNames)){
				
				$map_products=$this->Product_model->map_product1($categoryID,$productName,$FetchNames[0]->productName);
				if(!empty($map_products)){
				foreach($map_products as $map_product){
				echo"<div class=\"col-md-6\">";	
					echo'<div class="thumbnail">';
						echo'<div class="image view view-first">';
							echo"<img style=\"width: 100%; height:150px; display: block;\" src=$map_product->imageName alt=\"image\" />";
						echo'</div>';
						echo'<div class="caption">';
							echo"<p>$map_product->productName</p>";
							echo"<p style=\"margin-top:10px\">Price-$map_product->productPrice</p>";
							echo"<p style=\"margin-top:10px\">Shop-$map_product->shopName</p>";
							echo'<div class="col-md-3 col-sm-3 col-xs-12">';
							echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"mappit($map_product->productsID)\">Mapp it</a>";
							echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"inactiveproduct($map_product->productsID)\">Inactive</a>";
							echo'</div>';
						echo'</div>';	
					echo'</div>';
				echo'</div>';
				}
				}else{
					echo"No product found!!";
				}
			}else{
				echo"No product found!!";
			}
		}else{
			echo"Invalid request!!";
		}
	}
	
	public function getMappedProduct()
	{
		
		$productName=$this->input->post('productID');
		
		if(!empty($productName))
		{
			$FetchNames=$this->Product_model->fetch_productmapped($productName);
			if(!empty($FetchNames)){
				
				foreach($FetchNames as $FetchName){
				echo"<div class=\"col-md-6\">";	
					echo'<div class="thumbnail">';
						echo'<div class="image view view-first">';
							echo"<img style=\"width: 100%; height:150px; display: block;\" src=$FetchName->imageName alt=\"image\" />";
						echo'</div>';
						echo'<div class="caption">';
							echo"<p>$FetchName->productName</p>";
							echo"<p style=\"margin-top:10px\">Price-$FetchName->productPrice</p>";
							echo"<p style=\"margin-top:10px\">Shop-$FetchName->shopName</p>";
							echo'<div class="col-md-3 col-sm-3 col-xs-12">';
							echo"<a class=\"btn btn-small btn-danger show-tooltip\" onclick=\"unmappit($FetchName->productMappingID,$FetchName->productsID)\">Unmapp it</a>";
							echo'</div>';
						echo'</div>';	
					echo'</div>';
				echo'</div>';
				}
				
			}else{
				echo"No product mapp!!";
			}
		}else{
			echo"Invalid request!!";
		}
	}
	
	public function mappit()
	{
		$parentProductID=$this->input->post('productID');
		$childproductID=$this->input->post('childproductID');
	
		if(!empty($parentProductID && $childproductID )){ 
				
			$data=array('parentProductID'=>$parentProductID,'childProductID'=>$childproductID);
			$this->db->insert('s4k_product_mapping',$data);	
			$this->Product_model->update('s4k_products',array('mapp'=>'Mapped'),array('productsID'=>$childproductID));
			echo"success";
		}else{
			echo"error Parent product or child product is missing. please try again!!";
		}
		
	}
	
	public function unmappit()
	{
		$mappedproductID=$this->input->post('mappedproductID');
		$productID=$this->input->post('productID');
		if(!empty($mappedproductID) && !empty($productID)){ 
				
			$where=array('productMappingID'=>$mappedproductID);
			$this->Product_model->delete_data('s4k_product_mapping',$where);	
			$this->Product_model->update('s4k_products',array('mapp'=>'Unmapped'),array('productsID'=>$productID));
			echo"success";
		}else{
			echo"Unable to unmapped!!";
		}
		
	}
	
	/* public function mapped_product()
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
	} */
	public function create_attribute()
	{
		$productattribute=$this->input->post('field_name');
		
		if(!empty($productattribute)){
		foreach($productattribute as $attribute)
		{
		$attributedata=array('categoriesID'=>$this->input->post('categoriesID'),
							'productAttributeLable'=>$attribute);
		$this->db->insert('s4k_categories_to_attribute',$attributedata);
		$this->session->set_flashdata('message_type', 'success');        
        $this->session->set_flashdata('message', $this->config->item("mapped_product").' Your attributes are created');
		redirect('product/create_attribute');
		}
		}
		$this->data['category']=$this->Product_model->get_categories();
		$this->display ('admin/Createattribute');
	}
}
