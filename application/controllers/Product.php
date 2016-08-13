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
	{	
		$page=$this->input->get('page');
		
		if(!empty($_GET['categoriesID'])){
			$this->data['categoriesID']=$_GET['categoriesID'];
			$limit = 50;
			$totalrecord=$this->Product_model->getcounttotalrecord($_GET['categoriesID']);
			$base_url = base_url() . "Product/fetch_product?categoriesID=".$_GET['categoriesID'];
			include('paginator.class.php');
			$pages = new Paginator($base_url);
			$pages->items_total = $totalrecord[0]->total;
			$pages->mid_range = 6; // Number of pages to display. Must be odd and > 3
			$pages->paginate();
			$this->data['pagination']=$pages->display_pages($base_url);
			$this->data['paginationPagedrop']=$pages->display_jump_menu($base_url);
			
			$product=$this->data['products']=$this->Product_model->fetch_product($_GET['categoriesID'],$limit,$page);
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
		$page=$this->input->get('page');
		$get_data=$this->input->get();
		$filters='';
		if(!empty($get_data)){
			foreach($get_data as $key=>$value){
				if($key !='page'){
				$filters.="$key=$value";
				$filters.="&";
				}
			}
			$filters=rtrim($filters,"&");
			
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
			
			$limit = 50;
			$totalrecord=$this->Product_model->gettotalrecorddownloaded($where);
			$base_url = base_url() . "Product/Viewproductbyfilter?".$filters;
			include('paginator.class.php');
			$pages = new Paginator($base_url);
			$pages->items_total = $totalrecord[0]->total;
			$pages->mid_range = 6; // Number of pages to display. Must be odd and > 3
			$pages->paginate();
			$this->data['pagination']=$pages->display_pages($base_url);
			$this->data['paginationPagedrop']=$pages->display_jump_menu($base_url);			
			$product=$this->data['products']=$this->Product_model->get_product_by_filter($where,$limit,$page);		 
			$this->data['category']=$this->Product_model->get_categories();
			$this->data['shops']=$this->Product_model->get_shop();
			$this->display ('admin/Viewproductbyfilter');
		}
		else{
			$this->data['category']=$this->Product_model->get_categories();
			$this->data['shops']=$this->Product_model->get_shop();
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
	
	/*public function inactiveproduct($status=false,$id=false){
			//print_r($status); die;
			$categoriesID=$this->input->get('categoriesID');
			$data=array('productsStatus'=>$status);
			$filter=array('ProductsID'=>$id);
			$productshopdata=$this->Product_model->get_data('s4k_product_price',$filter);
			if(!empty($productshopdata)){			
			$updatefilter=array('shopProductID'=>$productshopdata[0]->shopProductID,'shopID'=>$productshopdata[0]->shopID);
			$this->Product_model->update('s4k_product_status',$data,$updatefilter);	
			}
			//$this->Product_model->update('s4k_products',$data,$filter);	
			if(!empty($categoriesID)){ redirect($_SERVER['HTTP_REFERER']); }else{ echo"success"; }
	}
	*/
	public function updateSatusInactiveproduct()
	{
		//$this->data['category']=$this->Product_model->get_categories();
		$shopProductID=$this->input->post('shopProductID');
		$status =$this->input->post('status');
		if(!empty($shopProductID)){
		if(!empty($status)){	
			$d = implode("','",$shopProductID);								 		
			$this->Product_model->updateSatus2($status,$d);	
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("delete")." Data status updated Successfully!!");
			if(!empty($shopProductID)){ redirect($_SERVER['HTTP_REFERER']); }else{ echo"success"; }		 
		}
		}else{			
			$this->session->set_flashdata('message_type', 'error');        
			$this->session->set_flashdata('message', $this->config->item("fetch_product").'Please checked atleast one checkbox');
			redirect($_SERVER['HTTP_REFERER']);		
		}
	}
	public function moveToLive($status=false, $productID=false ){	 
	//	print_r($_POST);die;
		$movetolive=$this->input->post('moveTolive');
		$shopProductID=$this->input->post('shopProductID');
		$status =$this->input->post('status');
		$changecategory=$this->input->post('changecategory');
		$categoriesID=$this->input->post('categoriesID');
		if(!empty($shopProductID)){			
		if(!empty($movetolive))
		{		
			if(!empty($shopProductID)){
				foreach($shopProductID as $shopProductid){
					$shopProductids=$shopProductid;				
				$productdata=$this->Product_model->get_product_full_data(array('t4.shopProductID'=>$shopProductids));				
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
								$productattribute=$this->Product_model->get_product_attribute(array('productsID'=>$productdata[0]->productsID,)); 				 
								$this->Product_model->insert_mapp_it($productdata1,'',$productattribute);
								$this->Product_model->update('s4k_product_status',array('liveStatus'=>'Yes'),array('shopProductID'=>$productdata[0]->shopProductID,'shopID'=>$productdata[0]->shopID));
				}
			} 			
			}
			if(!empty($shopProductID)){ redirect($_SERVER['HTTP_REFERER']); }else{ redirect(base_url().'Dashboard.html'); }
		}
		elseif(!empty($status)){				 
			 $shopProductID;			
				$data=array('productsStatus'=>$status);				 
				$filter=array('shopProductID'=>$shopProductID);			 		
					$this->Product_model->updateSatus('s4k_product_status',$data,$shopProductID);			 
			if(!empty($shopProductID)){ redirect($_SERVER['HTTP_REFERER']); }else{ echo"success"; }		 
		}
		elseif(!empty($changecategory))
		{
			if(!empty($shopProductID))
			{
				$data=$categoriesID;			
				$d = implode("','",$shopProductID);			 
				$this->Product_model->changecategory($data,$d);
			}
			else{
				if(!empty($shopProductID)){ redirect($_SERVER['HTTP_REFERER']); }else{ echo"success"; }
			}
		}	 
		}
		else{
			$this->session->set_flashdata('message_type', 'error');        
			$this->session->set_flashdata('message', $this->config->item("fetch_product").'Please checked atleast one checkbox');
			redirect($_SERVER['HTTP_REFERER']);
		}
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
			
		$id=$name='';
		$category=$this->input->post('categoryName');
		$product=$this->input->post('productName');
		$unmapped=$this->input->post('unmapped');
		$check_product=$this->Product_model->search_product($category,$product,$unmapped);
		
		$i=1;
			foreach($check_product as $check_product)
			{ $id=($check_product->productsID);
				$name=($check_product->productName);
				$attribute=isset($check_product->attr)?$check_product->attr:'';
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
		$categoryID=$this->input->post('categoryID');
		if(!empty($productName))
		{
			$FetchNames=$this->Product_model->fetch_productname($productName,$categoryID);
			
			if(!empty($FetchNames)){
				foreach($FetchNames as $FetchName){
					$attr=isset($FetchName->attr)?$FetchName->attr:'';
				echo'<div class="thumbnail">';
                    echo'<div class="image view view-first">';
                        echo"<img style=\"width: 100%; height:150px; display: block;\" src=$FetchName->imageName alt=\"image\" />";
					echo'</div>';
                    echo'<div class="caption">';
						echo"<p>$FetchName->productName</p>";
						echo"<p style=\"margin-top:10px\">Price-$FetchName->productPrice</p>";
						echo"<p style=\"margin-top:10px\">Shop-$FetchName->shopName</p>";
						echo"<p style=\"margin-top:10px\">$attr</p>";
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
		$keyword=$this->input->post('keyword');
		if(!empty($productName))
		{
			if($keyword =='keyword'){}else{
			$FetchNames=$this->Product_model->fetch_productname($productName);}
			if(!empty($FetchNames) || $keyword =='keyword'){
				
				if($keyword =='keyword'){}else{
				$map_products=$this->Product_model->map_product1($categoryID,$productName,$FetchNames[0]->productName,$FetchNames[0]->productBrand,3);}
				if(!empty($map_products)){
				foreach($map_products as $map_product){
				echo"<div class=\"col-md-12\" id=\"$map_product->productsID\">";	
					echo'<div class="thumbnail">';
						echo'<div class="image view view-first">';
							echo"<img style=\"width: 100%; height:150px; display: block;\" src=$map_product->imageName alt=\"image\" />";
						echo'</div>';
						echo"<label><input type=\"checkbox\" name=\"parent\" id=\"parent\" value=\"$map_product->productsID\" class=\"cbr parent parent1 $map_product->productsID\">Parent</label>";
						echo"<label><input type=\"checkbox\" name=\"child\" id=\"child\" value=\"$map_product->productsID\" class=\"cbr child $map_product->productsID\">Child</label>";
						echo'<div class="caption">';
							echo"<p>$map_product->productName</p>";
							echo"<p style=\"margin-top:10px\">Price-$map_product->productPrice</p>";
							echo"<p style=\"margin-top:10px\">Shop-$map_product->shopName</p>";
							echo'<div class="col-md-3 col-sm-3 col-xs-12">';
							echo"<a class=\"btn btn-small btn-danger show-tooltip map\" style=\"display: initial  !important;\" onclick=\"mappit($map_product->productsID)\">Mapp it</a>";
							echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"inactiveproduct($map_product->productsID)\">Inactive</a>";
							echo'</div>';
						echo'</div>';	
					echo'</div>';
				echo'</div>';
				}
				}else{
					if($keyword =='keyword'){
						$productName=str_replace(","," ",$productName);
			$map_products1=$this->Product_model->map_product4(array('t1.categoriesID'=>$categoryID,'t5.shopID'=>3),$productName,3);
					}else{
					$map_products1=$this->Product_model->map_product3($categoryID,$productName,$FetchNames[0]->productName,$FetchNames[0]->productBrand,3);}
					if(!empty($map_products1)){
					foreach($map_products1 as $map_product){
					echo"<div class=\"col-md-12\" id=\"$map_product->productsID\">";	
						echo'<div class="thumbnail">';
							echo'<div class="image view view-first">';
								echo"<img style=\"width: 100%; height:150px; display: block;\" src=$map_product->imageName alt=\"image\" />";
							echo'</div>';
							echo"<label><input type=\"checkbox\" name=\"parent\" id=\"parent\" value=\"$map_product->productsID\" class=\"cbr parent parent1 $map_product->productsID\">Parent</label>";
							echo"<label><input type=\"checkbox\" name=\"child\" id=\"child\" value=\"$map_product->productsID\" class=\"cbr child $map_product->productsID\">Child</label>";
							echo'<div class="caption">';
								echo"<p>$map_product->productName</p>";
								echo"<p style=\"margin-top:10px\">Price-$map_product->productPrice</p>";
								echo"<p style=\"margin-top:10px\">Shop-$map_product->shopName</p>";
								echo'<div class="col-md-3 col-sm-3 col-xs-12">';
								echo"<a class=\"btn btn-small btn-danger show-tooltip map\" style=\"display: initial  !important;\" onclick=\"mappit($map_product->productsID)\">Mapp it</a>";
								echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"inactiveproduct($map_product->productsID)\">Inactive</a>";
								echo'</div>';
							echo'</div>';	
						echo'</div>';
					echo'</div>';
					}
					}else{
						echo"No product found!!";
					}
				}
			}else{
				echo"No product found!!";
			}
		}else{
			echo"Invalid request!!";
		}
	}
	
	public function getProductToMappSnapdeal()
	{
		
		$productName=$this->input->post('productID');
		$categoryID=$this->input->post('categoriesID');
		$keyword=$this->input->post('keyword');
		if(!empty($productName))
		{
			if($keyword =='keyword'){}else{
			$FetchNames=$this->Product_model->fetch_productname($productName);}
			if(!empty($FetchNames) || $keyword =='keyword'){
				
				if($keyword =='keyword'){}else{
				$map_products=$this->Product_model->map_product1($categoryID,$productName,$FetchNames[0]->productName,$FetchNames[0]->productBrand,2);}
				if(!empty($map_products)){
				foreach($map_products as $map_product){
				echo"<div class=\"col-md-12\" id=\"$map_product->productsID\">";	
					echo'<div class="thumbnail">';
						echo'<div class="image view view-first">';
							echo"<img style=\"width: 100%; height:150px; display: block;\" src=$map_product->imageName alt=\"image\" />";
						echo'</div>';
						echo"<label><input type=\"checkbox\" name=\"parent\" id=\"parent\" value=\"$map_product->productsID\" class=\"cbr parent parent1 $map_product->productsID\">Parent</label>";
						echo"<label><input type=\"checkbox\" name=\"child\" id=\"child\" value=\"$map_product->productsID\" class=\"cbr child $map_product->productsID\">Child</label>";
						echo'<div class="caption">';
							echo"<p>$map_product->productName</p>";
							echo"<p style=\"margin-top:10px\">Price-$map_product->productPrice</p>";
							echo"<p style=\"margin-top:10px\">Shop-$map_product->shopName</p>";
							echo'<div class="col-md-3 col-sm-3 col-xs-12">';
							echo"<a class=\"btn btn-small btn-danger show-tooltip map\" style=\"display: initial  !important;\" onclick=\"mappit($map_product->productsID)\">Mapp it</a>";
							echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"inactiveproduct($map_product->productsID)\">Inactive</a>";
							echo'</div>';
						echo'</div>';	
					echo'</div>';
				echo'</div>';
				}
				}else{
					if($keyword =='keyword'){
						$productName=str_replace(","," ",$productName);
			$map_products1=$this->Product_model->map_product4(array('t1.categoriesID'=>$categoryID,'t5.shopID'=>2),$productName,2);
					}else{
					$map_products1=$this->Product_model->map_product3($categoryID,$productName,$FetchNames[0]->productName,$FetchNames[0]->productBrand,2);}
					if(!empty($map_products1)){
					foreach($map_products1 as $map_product){
					echo"<div class=\"col-md-12\" id=\"$map_product->productsID\">";	
						echo'<div class="thumbnail">';
							echo'<div class="image view view-first">';
								echo"<img style=\"width: 100%; height:150px; display: block;\" src=$map_product->imageName alt=\"image\" />";
							echo'</div>';
							echo"<label><input type=\"checkbox\" name=\"parent\" id=\"parent\" value=\"$map_product->productsID\" class=\"cbr parent parent1 $map_product->productsID\">Parent</label>";
							echo"<label><input type=\"checkbox\" name=\"child\" id=\"child\" value=\"$map_product->productsID\" class=\"cbr child $map_product->productsID\">Child</label>";
							echo'<div class="caption">';
								echo"<p>$map_product->productName</p>";
								echo"<p style=\"margin-top:10px\">Price-$map_product->productPrice</p>";
								echo"<p style=\"margin-top:10px\">Shop-$map_product->shopName</p>";
								echo'<div class="col-md-3 col-sm-3 col-xs-12">';
								echo"<a class=\"btn btn-small btn-danger show-tooltip map\" style=\"display: initial  !important;\" onclick=\"mappit($map_product->productsID)\">Mapp it</a>";
								echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"inactiveproduct($map_product->productsID)\">Inactive</a>";
								echo'</div>';
							echo'</div>';	
						echo'</div>';
					echo'</div>';
					}
					}else{
						echo"No product found!!";
					}
				}
			}else{
				echo"No product found!!";
			}
		}else{
			echo"Invalid request!!";
		}
	}
	
	public function getProductToMappFlipkart()
	{
		
		$productName=$this->input->post('productID');
		$categoryID=$this->input->post('categoriesID');
		$keyword=$this->input->post('keyword');
		if(!empty($productName))
		{
			if($keyword =='keyword'){}else{
			$FetchNames=$this->Product_model->fetch_download_productname($productName);
			}
			if(!empty($FetchNames) || $keyword =='keyword'){
				
				if($keyword =='keyword'){}else{
				$map_products=$this->Product_model->map_product1($categoryID,$productName,$FetchNames[0]->productName,$FetchNames[0]->productBrand,1);}
				if(!empty($map_products)){
				foreach($map_products as $map_product){
				echo"<div class=\"col-md-12\" id=\"$map_product->productsID\">";	
					echo'<div class="thumbnail">';
						echo'<div class="image view view-first">';
							echo"<img style=\"width: 100%; height:150px; display: block;\" src=$map_product->imageName alt=\"image\" />";
						echo'</div>';
						echo"<label><input type=\"checkbox\" name=\"parent\" id=\"parent\" value=\"$map_product->productsID\" class=\"cbr parent1 $map_product->productsID\">Parent</label>";
						echo"<label><input type=\"checkbox\" name=\"child\" id=\"child\" value=\"$map_product->productsID\" class=\"cbr child $map_product->productsID\">Child</label>";
						echo'<div class="caption">';
							echo"<p>$map_product->productName</p>";
							echo"<p style=\"margin-top:10px\">Price-$map_product->productPrice</p>";
							echo"<p style=\"margin-top:10px\">Shop-$map_product->shopName</p>";
							echo'<div class="col-md-3 col-sm-3 col-xs-12">';
							/* echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"mappit($map_product->productsID)\">Mapp it</a>"; */
							echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"inactiveproduct($map_product->productsID)\">Inactive</a>";
							echo'</div>';
						echo'</div>';	
					echo'</div>';
				echo'</div>';
				}
				}else{
					if($keyword =='keyword'){
						$productName=str_replace(","," ",$productName);
			$map_products1=$this->Product_model->map_product4(array('t1.categoriesID'=>$categoryID,'t5.shopID'=>1),$productName,1);
					}else{
					$map_products1=$this->Product_model->map_product3($categoryID,$productName,$FetchNames[0]->productName,$FetchNames[0]->productBrand,1);}
					if(!empty($map_products1)){
					foreach($map_products1 as $map_product){
					echo"<div class=\"col-md-12\" id=\"$map_product->productsID\">";	
						echo'<div class="thumbnail">';
							echo'<div class="image view view-first">';
								echo"<img style=\"width: 100%; height:150px; display: block;\" src=$map_product->imageName alt=\"image\" />";
							echo'</div>';
							echo"<label><input type=\"checkbox\" name=\"parent\" id=\"parent\" value=\"$map_product->productsID\" class=\"cbr parent1 $map_product->productsID\">Parent</label>";
							echo"<label><input type=\"checkbox\" name=\"child\" id=\"child\" value=\"$map_product->productsID\" class=\"cbr child $map_product->productsID\">Child</label>";
							echo'<div class="caption">';
								echo"<p>$map_product->productName</p>";
								echo"<p style=\"margin-top:10px\">Price-$map_product->productPrice</p>";
								echo"<p style=\"margin-top:10px\">Shop-$map_product->shopName</p>";
								echo'<div class="col-md-3 col-sm-3 col-xs-12">';
								/* echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"mappit($map_product->productsID)\">Mapp it</a>"; */
								echo"<a class=\"btn btn-small btn-danger show-tooltip\" style=\"display: initial  !important;\" onclick=\"inactiveproduct($map_product->productsID)\">Inactive</a>";
								echo'</div>';
							echo'</div>';	
						echo'</div>';
					echo'</div>';
					}
					}else{
						echo"No product found!!";
					}
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
				echo"<div class=\"col-md-12\">";	
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
				
			$filter=array('ProductsID'=>$childproductID);
			$productshopdata=$this->Product_model->get_data('s4k_product_price',$filter);
			
			$parentfilter=array('ProductsID'=>$parentProductID);
			$parentproductshopdata=$this->Product_model->get_data('s4k_product_price_map',$parentfilter);
			
			if(!empty($productshopdata) && !empty($parentproductshopdata)){	
				$data=array('parentProductID'=>$parentproductshopdata[0]->shopProductID,'childProductID'=>$productshopdata[0]->shopProductID,'parentShopID'=>$parentproductshopdata[0]->shopID,'childShopID'=>$productshopdata[0]->shopID);
				$this->db->insert('s4k_product_mapping',$data);	
				$updatefilter=array('shopProductID'=>$productshopdata[0]->shopProductID,'shopID'=>$productshopdata[0]->shopID);
				$this->Product_model->update('s4k_product_status',array('mapp'=>'Mapped'),$updatefilter);	
			}
			
			echo"success";
		}else{
			echo"error Parent product or child product is missing. please try again!!";
		}
		
	}
	
	public function mapp_parent_to_child()
	{
		$parentProductID=$this->input->post('productID');
		$childproductID=$this->input->post('childproductID');
		if(!empty($parentProductID && $childproductID )){ 
				
			$productshopdata=$this->Product_model->get_data_parent('s4k_product_price',$childproductID);
			
			$parentproductshopdata=$this->Product_model->get_data_parent('s4k_product_price',$parentProductID);
			
			if(!empty($productshopdata) && !empty($parentproductshopdata)){	
			
				foreach($productshopdata as $productshopdatas){
				$data=array('parentProductID'=>$parentproductshopdata[0]->shopProductID,'childProductID'=>$productshopdatas->shopProductID,'parentShopID'=>$parentproductshopdata[0]->shopID,'childShopID'=>$productshopdatas->shopID);
				$this->db->insert('s4k_product_mapping',$data);	
				$updatefilter=array('shopProductID'=>$productshopdatas->shopProductID,'shopID'=>$productshopdatas->shopID);
				if($productshopdatas->shopID==1){ $up=array('mapp'=>'Mapped','liveStatus'=>'No');}else{$up=array('mapp'=>'Mapped');}
				$this->Product_model->update('s4k_product_status',$up,$updatefilter);
				}

				if(!empty($parentProductID)){
				
					$productID=$parentProductID;				
				$productdata=$this->Product_model->get_product_full_data(array('t1.productsID'=>$productID));
				if(!empty($productdata)){
					if($productdata[0]->shopID !=1){
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
								$this->Product_model->update('s4k_product_status',array('liveStatus'=>'Yes'),array('shopProductID'=>$productdata[0]->shopProductID,'shopID'=>$productdata[0]->shopID));
					}
				}
			}
			}
			
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
			$filter=array('ProductsID'=>$productID);
			$productshopdata=$this->Product_model->get_data('s4k_product_price',$filter);
			if(!empty($productshopdata)){			
			$updatefilter=array('shopProductID'=>$productshopdata[0]->shopProductID,'shopID'=>$productshopdata[0]->shopID);
			$this->Product_model->update('s4k_product_status',array('mapp'=>'Unmapped'),$updatefilter);	
			}
			//$this->Product_model->update('s4k_products',array('mapp'=>'Unmapped'),array('productsID'=>$productID));
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
