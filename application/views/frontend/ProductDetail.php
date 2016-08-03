 <div class="page-container">	
	 <div class="main-content">	
		 <div class="page-loading-overlay">			
			 <div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>			
		 </div>	 
		 <div class="col-sm-12 col-md-12 col-xs-12 form_content ">
 <!-- Alert section For Message-->
		 <?php  if($this->session->flashdata('message_type')=='success') {  ?>
		  <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><?=$this->session->flashdata('message')?></strong>  </div>
		 <?php } if($this->session->flashdata('message_type')=='error') { ?>
		 <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><?=$this->session->flashdata('message')?></strong>  </div>
		 <?php } if($this->session->flashdata('category_error_login')) { ?>
<div class="row" >
<div class="alert alert-danger" >
<strong><?=$this->session->flashdata('category_error_login')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
</div>
</div>
<?php }?>
		 <!-- Alert section End-->
 
</div>
		 <div class="row" >	 
			 <div class="col-md-10">		
				 <div class="content_top">    	
					 <div class="back-links">    	
						 <p><a href="<?=base_url();?>">Home</a> >> <a href="<?=isset($backurl)?$backurl:''?>"><?=isset($categorykey)?$categorykey:''?> </a></p>    	   
					 </div>					
					 <div class="clear"></div>					
					 <h2  style="font-size:18px;color:red"><?=isset($products[0]->productName)?$products[0]->productName:''?></h2>    	
				 </div>
				 	 <div class="col-md-12 col-sm-12 col-xs-12">		
				 <div  class="col-md-4 grid images_3_of_2 pro_img">	
			 
					 <img  src="<?=isset($products[0]->imageName)?$products[0]->imageName:''?>" alt="<?=isset($products[0]->productImageAltTag)?$products[0]->productImageAltTag:''?>"  />
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
							 <?php //print_r($products[0]->shopID); die;							
	if (!empty($othershopprices)){	
	$keys=(array_keys(array_column($othershopprices, 'shopID'), $shopimage->shopID));
	if($keys || $keys==0 ){
		$keys = array_search($shopimage->shopID, array_column($othershopprices , 'shopID'));
		if($othershopprices[$keys]['shopID']==3){ $pricemore=(int)$othershopprices[$keys]['productPrice']; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=isset($othershopprices[$keys]['productPrice'])?$othershopprices[$keys]['productPrice']:'';}?>
							 <p>Price: <br><span><?=number_format($pricemore,2)?></span></p>
							 <a target="_blank" style="color:white;" href="<?=isset($othershopprices[$keys]['productShopUrl'])?$othershopprices[$keys]['productShopUrl']:''?>"><div class="btn btn-black">	
								 <span >Buy now</span>
								 </div>
							 </a>
							 <?php } else { if($shopimage->shopID==$products[0]->shopID) { 
		if($products[0]->shopID==3){ $pricemore=(int)$products[0]->productPrice; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=$products[0]->productPrice;}	
							
							 ?>	
							 <p>Lowest Price: <br><span><?=number_format($pricemore,2)?></span></p>	
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
							 <p>Lowest Price: <br><span><?=number_format($pricemore,2)?></span></p>
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
					 
					 <?php
                    $title=urlencode($products[0]->productName);
                    $url=urlencode("http://".$_SERVER['HTTP_HOST'].'/Landingpage/shareproduct/'.$categoryval.'/'.$sbkProductID.'/'.$productkey.'.html');
                    $image=urlencode($products[0]->imageName);
                ?>
					 <script >
  window.___gcfg = {
    parsetags: 'onload'
  };
</script>
<script src="https://apis.google.com/js/client:platform.js" async defer></script>
					 <div class="share">
						 <p>Share Product :</p>
						 <ul>
							 <!--<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/youtube.png" alt=""></a></li>-->
							 <li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/facebook.png" alt="" id="shareBtn"></a></li>
							 <li><a href="javascript:;"
								  class="g-interactivepost"
								  data-contenturl="http://<?=$_SERVER['HTTP_HOST']?>/Landingpage/shareproduct/<?=$categoryval?>/<?=$sbkProductID?>/<?=$productkey?>.html"
								  data-contentdeeplinkid="http://<?=$_SERVER['HTTP_HOST']?><?=$_SERVER['REQUEST_URI']?>"
								  data-clientid="1099405938736-82mgohcv3vc4cn0p8i1028vti6k0mpni.apps.googleusercontent.com"
								  data-cookiepolicy="single_host_origin"
								  data-prefilltext="Hi, I have just found my <?=isset($products[0]->productName)?$products[0]->productName:''?> on www.searchb4kharch.com"
								  data-calltoactionurl="http://<?=$_SERVER['HTTP_HOST']?><?=$_SERVER['REQUEST_URI']?>"
								  data-calltoactionlabel="BUY"
								  data-calltoactiondeeplinkid="http://<?=$_SERVER['HTTP_HOST']?><?=$_SERVER['REQUEST_URI']?>">
								 <img
								  src="<?=base_url();?>frontend/images/gplus.png" alt="Share on Google+"/>
								</a></li>
						
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
										<?php 
		foreach($attributebyproducts as $attributebyproduct){?>
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
								 <h2>Similar Product</h2>
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
									 <p><img style="height:30px" src="<?=base_url();?>frontend/images/<?=$similarproducted->shop_image?>"><span class="price">Rs. <?=number_format($similarproducted->productPrice,2)?></span></p>
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
				 <div class="product-tags">
					 <h2>Product Tags</h2>
					 <h4>Add Your Tags:</h4>
					 <div class="input-box">
						 <input type="text" value="" />
					 </div>
					 <div class="button"><span><a href="javascript:;">Add Tags</a></span></div>
					


                <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)">
                    Share our Facebook page!
                </a>
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

<script type="text/javascript" src="//connect.facebook.net/en_US/sdk.js"></script>
<script>

document.getElementById('shareBtn').onclick = function() {
  
  
  FB.api('/me/feed', 'post',
        {
            message     : "I love thinkdiff.net for facebook app development tutorials",
            link        : 'http://ithinkdiff.net',
            picture     : 'http://thinkdiff.net/iphone/lucky7_ios.jpg',
            name        : 'iOS Apps & Games',
            description : 'Checkout iOS apps and games from iThinkdiff.net. I found some of them are just awesome!'
 
        },
        function(response) {
           
 
            if (!response || response.error) {
                alert('Error occured');
            } else {
                alert('Post ID: ' + response.id);
            }
        });
}
</script>