<div class="page-container">	
	 <div class="main-content">	
		 <div class="col-sm-12 col-md-12 col-xs-12 form_content ">
			 <!-- Alert section For Message-->		
			 <?php  if($this->session->flashdata('message_type')=='success') {  ?>		 
			 <div class="alert alert-success alert-dismissible fade in" role="alert">            
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span> </button>                
				 <strong><?=$this->session->flashdata('message')?></strong>  </div>		
			 <?php } if($this->session->flashdata('message_type')=='error') { ?>		
			 <div class="alert alert-danger alert-dismissible fade in" role="alert">        
				 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span> </button>           
				 <strong><?=$this->session->flashdata('message')?></strong>  </div>		
			 <?php } if($this->session->flashdata('category_error_login')) { ?>
			 <div class="row" >
				 <div class="alert alert-danger" >
					 <strong><?=$this->session->flashdata('category_error_login')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
				 </div>
			 </div>
			 <?php }?>		
			 <!-- Alert section End-->
			 <?php $price1=$price=0;if(!empty($othershopprices)){
	foreach($othershopprices as $othershopprice){
		if($othershopprice['shopID']==3){								
			$priceint=(int)$othershopprice['productPrice'];								
			$priceval[]=substr("$priceint",0,-2);							
		}else{							
			$priceval[]=$othershopprice['productPrice'];							
		}							
	}							
	$price=number_format(min($priceval), 2, '.',''); 
}									
			 $price1=number_format($products[0]->productPrice, 2, '.','');
			 if($price1 !=0 && $price !=0){									
				 $finalprice=min($price1,$price);									
			 }else{										
				 if($price !=0){										
					 $finalprice=$price;										
				 }else{											
					 $finalprice=$price1;										
				 }									
			 }
			 ?>
		 </div>		
		 <div class="row" >	 			 
			 <div class="col-md-10">
				 <div class="content_top" style="background-color:white;"> 
					 <div class="back-links">
						 <p><a href="<?=base_url();?>">Home</a> >> <a href="<?=isset($backurl)?$backurl:''?>"><?=isset($categorykey)?$categorykey:''?> </a></p> 					
					 </div>	
					 <div class="clear"></div>	
					 <h2  style="font-size:18px;color:red"><?=isset($products[0]->productName)?$products[0]->productName:''?></h2> 
				 </div>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					 <div  class="col-md-4 grid images_3_of_2 pro_img">	
						 <img itemprop="image" src="<?=isset($products[0]->imageName)?$products[0]->imageName:''?>" alt="<?=isset($products[0]->productImageAltTag)?$products[0]->productImageAltTag:''?>"  />				
					 </div><!--style="height:250px;width:75%"-->
					 <div class="desc span_3_of_2">	
						 <div class="col-md-12 col-sm-12 col-xs-12">
						<!--<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="<?=base_url();?>frontend/images/<?=isset($products[0]->shop_image)?$products[0]->shop_image:''?>"><p>Lowest Price: <br><span><?=number_format(isset($products[0]->productPrice)?$products[0]->productPrice:'',2)?></span></p><div class="button" ><span ><a target="_blank" href="<?=isset($products[0]->productShopUrl)?$products[0]->productShopUrl:''?>">Buy now</a></span></div>
						</div>-->	
							 <?php if(!empty($shopimages)){ ?>
							 <?php foreach($shopimages as $shopimage){ ?>	
							 <div class="col-md-4 col-sm-4 col-xs-4">
								 <img src="<?=base_url();?>frontend/images/<?=isset($shopimage->shop_image)?$shopimage->shop_image:''?>">							
								 <?php if (!empty($othershopprices)){$keys=(array_keys(array_column($othershopprices, 'shopID'), $shopimage->shopID));
																	 if($keys || $keys==0 ){		
																		 $keys = array_search($shopimage->shopID, array_column($othershopprices , 'shopID'));		
																		 if($othershopprices[$keys]['shopID']==3){ $pricemore=(int)$othershopprices[$keys]['productPrice']; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=isset($othershopprices[$keys]['productPrice'])?$othershopprices[$keys]['productPrice']:'';}?>							
								 <p><?php if(number_format($finalprice,2)==number_format($pricemore,2)){echo"Lowest ";}?>Price: <br><span><?php if($pricemore !=0){?>Rs. <?=number_format($pricemore,2)?><?php }else{ echo"coming soon"; }?></span></p>							
								 <a target="_blank" style="color:white;" href="<?=isset($othershopprices[$keys]['productShopUrl'])?$othershopprices[$keys]['productShopUrl']:''?>"><div class="btn btn-black">									
									 <span >Buy now</span>								
									 </div>							
								 </a>							
								 <?php } else { if($shopimage->shopID==$products[0]->shopID) { 		
																		 if($products[0]->shopID==3){ $pricemore=(int)$products[0]->productPrice; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=$products[0]->productPrice;}								
								 ?>								
								 <p><?php if(number_format($finalprice,2)==number_format($pricemore,2)){echo"Lowest ";}?>Price: <br><span><?php if($pricemore !=0){?>Rs. <?=number_format($pricemore,2)?><?php }else{ echo"coming soon"; }?></span></p>							
								 <a target="_blank" style="color:white;" href="<?=isset($products[0]->productShopUrl)?$products[0]->productShopUrl:''?>"><div class="btn btn-black">							
									 <span >Buy now</span>
									 </div>
								 </a>							
								 <?php } else{ ?>							
								 <p>Price: <br><span>Not Available</span></p>							
								 <div>								
									 <span ><a  class="btn btn-gray">Buy now</a></span>							
								 </div>							
								 <?php } } ?>							
								 <?php } else { if($shopimage->shopID==$products[0]->shopID) { 	
	if($products[0]->shopID==3){ $pricemore=(int)$products[0]->productPrice; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=$products[0]->productPrice;}
								 ?>							
								 <p><?php if(number_format($finalprice,2)==number_format($pricemore,2)){echo"Lowest ";}?>Price: <br><span><?php if($pricemore !=0){?>Rs. <?=number_format($pricemore,2)?><?php }else{ echo"coming soon"; }?></span></p>							
								 <a target="_blank" style="color:white;" href="<?=isset($products[0]->productShopUrl)?$products[0]->productShopUrl:''?>"><div class="btn btn-black">								
									 <span >Buy now</span>
									 </div>
								 </a> 							
								 <?php } else{ ?>							
								 <p>Price: <br><span>Not Available</span></p>							
								 <div>								
									 <span ><a  class="btn btn-gray">Buy now</a></span>								
								 </div>							
								 <?php } } ?>						
							 </div>							
							 <?php }  } ?>					
						 </div>					
						 <!--<p style="margin-top:70px"><?=isset($products[0]->productDescription)?$products[0]->productDescription:''?></p>	-->					
						 <div class="clear"></div>
						 <div class="share">						
							 <p>To earn RuPoints on your shopping, BUY NOW</p>
						 </div>
						 <div class="share">
							 <p>Share Product :</p>						
							 <ul>							
								 <!--<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/youtube.png" alt=""></a></li>-->							
								 <li><a href="javascript:;" onclick="share(); return false;"><img  src="<?=base_url();?>frontend/images/facebook.png" alt="" id="shareBtn"></a></li>						
								 <li> <a href="javascript:;" class="g-plusone"   ></a></li>						
							 </ul>					 
						 </div>					
						 <div class="add-cart">						
							 <div class="rating">						
								 <p>Rating:<img src="<?=base_url();?>frontend/images/rating.png"><span>[3 of 5 Stars]</span></p>						
							 </div>						
							 <div class="clear"></div>					
						 </div>					
						 <div style="padding-top:45px" class="button"><span><?php if(!empty($userinfos)) { if(in_array(isset($products[0]->productsID)?$products[0]->productsID:'',$whislistproduct)==false){?>					
							 <a href="<?=base_url();?>User/AddToWishList/<?=isset($products[0]->productsID)?$products[0]->productsID:''?>.html" class="cart-button">Add to wishlists</a>					
							 <?php } }else{ ?>						
							 <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>						
							 <?php } ?></span>					
						 </div>				
					 </div>				
					 <div class="product-desc">					
						 <h2>Product Features</h2>					
						 <div class="row">					
							 <?php foreach($attributegroups as $attributegroup){	
	$attributebyproducts=$this->Landingpage_model->get_attribute_by_product($attributegroup->AttributeID,$products[0]->productsID); 	
	if(!empty($attributebyproducts)){ ?> 						
							 <div class="row">						
								 <div class="col-md-12">							
									 <div class="panel panel-default">								
										 <div class="panel-body">									
											 <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">										
												 <table cellspacing="0" class="table table-small-font table-bordered table-striped">											
													 <tbody>												
														 <tr style="background-color: rgba(142, 142, 142, 0.24);">												
															 <td><?=$attributegroup->productAttributeLable?></td>												
														 </tr>												
													 </tbody>											
												 </table>										
											 </div>										
										 </div>								
									 </div>							
								 </div>						
							 </div>						
							 <div class="row">							
								 <div class="col-md-12">								
									 <div class="panel panel-default">								
										 <div class="panel-body">									
											 <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">										
												 <table cellspacing="0" class="table table-small-font table-bordered table-striped">												
													 <tbody>										
														 <?php foreach($attributebyproducts as $attributebyproduct){?>													
														 <tr>														
															 <th scope="row"><?=$attributebyproduct->productAttributeLable?></th>														 
															 <td><?=$attributebyproduct->productAttributeValue?></td>													
														 </tr>													
														 <?php }?>												
													 </tbody>											
												 </table>										
											 </div>										
										 </div>								
									 </div>							
								 </div>						
							 </div>						
							 <?php } }?>					
						 </div>				
					 </div>	
					 <div class="product-desc">
						 <h2>Recommended  Product</h2>						
					 </div>						
					 <div class="row">						
						 <div class="col-md-12">							
							 <div class="panel panel-default">								
								 <div class="panel-body">								
									 <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">									
										 <table cellspacing="0" class="table table-small-font  ">										
											 <tbody>
												 <tr>											
													 <?php if(!empty($similarproduct)){ foreach($similarproduct as $similarproducted){?>												
													 <td>  <div class="section group">								
														 <a href="<?=base_url();?>Landingpage/Product/<?=$similarproducted->categoriesUrlKey?>/<?=$similarproducted->sb4kProductID?>/<?=$similarproducted->productsUrlKey?>.html">								
															 <div class="grid_1_of_4 images_1_of_4 imageswidth">									
																 <img src="<?=$similarproducted->imageName?>" alt="" />	
																 <h2><?=$similarproducted->productName?> </h2>										
																 <p>										
																	 <span class="price">Rs. <?=number_format($similarproducted->productPrice,2)?></span><br>									
																	 <img style="height:30px" src="<?=base_url();?>frontend/images/<?=$similarproducted->shop_image?>">									
																 </p>								
															 </div>								
														 </a>							
														 </div> </td><?php } }else{ ?> 													
													 <td>No product Found!!</td>												
													 <?php }?>												
												 </tr>
											 </tbody>											
										 </table>										
									 </div>										
								 </div>								
							 </div>							
						 </div>						 
					 </div>
					 <!-- <div class="col-md-12 col-sm-12 col-xs-12">
					 <div class="table-responsive">
						 <div class="span_3_of_1">
							 <div class="product-desc">
								 <h2>Similar Product</h2>
							 </div>
							 <div>
							 <div class="section group">
								 <?php if(!empty($similarproduct)){ foreach($similarproduct as $similarproducted){?>
								 <div class="grid_1_of_4 images_1_of_4">
									 <a href="<?=base_url();?>Landingpage/Product/<?=$similarproducted->categoriesUrlKey?>/<?=$similarproducted->sb4kProductID?>/<?=$similarproducted->productsUrlKey?>.html"><img src="<?=$similarproducted->imageName?>" alt="" /></a>
					
 
									 <h2><?=$similarproducted->productName?> </h2>	
									 <p><span class="price">Rs. <?=number_format($similarproducted->productPrice,2)?></span></p>
								 </div>
								 <?php } }else{ echo"No product Found!!";}?> 
							 </div> 
						 </div>
							 <div class="clear"></div>
						 </div>	
					 </div>
					 <div class="clear"></div> 
				 </div>-->				
					 <div class="product-desc">					
						 <h2>Product Details</h2>					
						 <p><?=isset($products[0]->productDescription)?$products[0]->productDescription:''?>.</p>				
					 </div>	
				 </div>		
			 </div>			 
			 <div class="col-md-2 col-sm-2 col-xs-0">				 
				 <div class="fixedright" style="margin-top:-1%;">				
					 <a href="http://tracking.vcommission.com/aff_c?offer_id=480&aff_id=48478&file_id=88882&file_id=79365" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/480/Zovi_CPS_Tees_160x600.jpg" width="160" height="600" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=480&file_id=79365&aff_id=48478&file_id=88882" width="1" height="1" />			
				 </div>			
				 <div class="clear"></div>			
			 </div>	
		 </div>		
	</div>
</div>
<div class="clear"></div>
<h1 style="display:none" itemprop="name"  >Hi, I have just found my <?=isset($products[0]->productName)?$products[0]->productName:''?> <?php if($finalprice !=0){?>at lowest price Rs <?=isset($finalprice)?$finalprice:''?><?php }else{ echo"coming soon"; }?> on www.searchb4kharch.com</h1>
<p style="display:none" itemprop="description"  >Hi, I have just found my <?=isset($products[0]->productName)?$products[0]->productName:''?> at lowest price Rs <?=isset($finalprice)?$finalprice:''?> on www.searchb4kharch.com</p>
<script src="https://apis.google.com/js/client:platform.js" async defer></script>	
<script src="https://connect.facebook.net/en_US/all.js" async defer></script>
<script type="text/javascript">        
	var button;       
	var userInfo;
	window.fbAsyncInit = function() {         
		FB.init({ appId: '987149988019793',            
				 status: true,            
				 cookie: true,           
				 xfbml: true,         
				 oauth: true});		
	};         
	function share(){ 
		FB.ui(			
			{					
				redirect_uri:'http://<?=$_SERVER['HTTP_HOST']?><?=$_SERVER['REQUEST_URI']?>',					
				//display: 'popup',						
				method: 'stream.share',						
				u: 'http://<?=$_SERVER['HTTP_HOST']?><?=$_SERVER['REQUEST_URI']?>',					
				picture     : '<?=isset($products[0]->imageName)?$products[0]->imageName:''?>',				
				description : 'Hi, I have just found my <?=isset($products[0]->productName)?$products[0]->productName:''?> <?php if($finalprice !=0){?>at lowest price Rs <?=isset($finalprice)?$finalprice:''?><?php }else{ echo"coming soon"; }?> on www.searchb4kharch.com'				
			},function(response) {				
				if (response && !response.error_message) {				
					console.log(response);	
				} else {				
					console.log(response);	
				}				
			}			
		);	
	}	
</script>