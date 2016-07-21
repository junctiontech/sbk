 <div class="page-container">
	<div class="main-content">
	 <div class="row">
	 <div class="col-md-12">
		<div class="content_top">
    		<div class="back-links">
    		<p><a href="<?=base_url();?>">Home</a> >> <a href="<?=isset($backurl)?$backurl:''?>"><?=isset($categorykey)?$categorykey:''?> </a></p>
			
    	    </div>
    		
    		
    		<div class="clear"></div>
			<h2 style="font-size:18px;color:red"><?=isset($products[0]->productName)?$products[0]->productName:''?></h2>
    	</div>
		</div>
		</div>
		    	<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-12">	
								
					<div class="col-md-4 grid images_3_of_2 pro_img">
					
						<img src="<?=isset($products[0]->imageName)?$products[0]->imageName:''?>" alt="<?=isset($products[0]->productImageAltTag)?$products[0]->productImageAltTag:''?>"  />
					</div><!--style="height:250px;width:75%"-->
				<div class="desc span_3_of_2">
					<div class="col-md-10 col-sm-10 col-xs-10">
						<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="<?=base_url();?>frontend/images/<?=isset($products[0]->shop_image)?$products[0]->shop_image:''?>"><p>Lowest Price: <br><span><?=number_format(isset($products[0]->productPrice)?$products[0]->productPrice:'',2)?></span></p><div class="button" ><span ><a target="_blank" href="<?=isset($products[0]->productShopUrl)?$products[0]->productShopUrl:''?>">Buy now</a></span></div>
						</div>
					<?php if(!empty($othershopprices)){ ?>
					
					<?php foreach($othershopprices as $othershopprice){ 
					if($othershopprice->shopID==3){ $pricemore=(int)$othershopprice->productPrice; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=isset($othershopprice->productPrice)?$othershopprice->productPrice:'';}?>
							<div class="col-md-4 col-sm-4 col-xs-12">
					<img src="<?=base_url();?>frontend/images/<?=isset($othershopprice->shop_image)?$othershopprice->shop_image:''?>"><p>Price: <br><span><?=number_format($pricemore,2)?></span></p><div class="button" ><span ><a target="_blank" href="<?=isset($othershopprice->productShopUrl)?$othershopprice->productShopUrl:''?>">Buy now</a></span>
								</div>
					</div>
					<?php } ?>
					
					<?php } ?>
					
					</div>
					
					<!--<p style="margin-top:70px"><?=isset($products[0]->productDescription)?$products[0]->productDescription:''?></p>	-->
			<div class="clear"></div>
					<div class="share">
						<p>Share Product :</p>
						<ul>
					    	<!--<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/youtube.png" alt=""></a></li>-->
					    	<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/facebook.png" alt=""></a></li>
					    	<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/gplus.png" alt=""></a></li>
					    	<!--<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/linkedin.png" alt=""></a></li>-->
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
					  <?php } ?></span></div>
				
			</div>
		 
			
			<div class="product-desc">
			<h2>Product Feature</h2>
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
	    </div>	
<a href="http://tracking.vcommission.com/aff_c?offer_id=480&aff_id=48478&file_id=88882&file_id=79365" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/480/Zovi_CPS_Tees_160x600.jpg" width="160" height="600" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=480&file_id=79365&aff_id=48478&file_id=88882" width="1" height="1" />		
	</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="span_3_of_1">
					<h2>Similar Product</h2>
					
					<div class="section group">
		   <?php if(!empty($similarproduct)){ foreach($similarproduct as $similarproducted){?>
				<div class="grid_1_of_4 similar_images_1_of_4">
					 <a href="<?=base_url();?>Landingpage/Product/<?=$similarproducted->categoriesUrlKey?>/<?=$similarproducted->sb4kProductID?>/<?=$similarproducted->productsUrlKey?>.html"><img src="<?=$similarproducted->imageName?>" alt="" /></a>
					 <h2><?=$similarproducted->productName?> </h2>					
					 <p><span class="price"><?=number_format($similarproducted->productPrice,2)?></span></p>					     
				</div>
			
		  <?php } }else{ echo"No product Found!!";}?> 
						</div> 
	 <div class="clear"></div>
			<div class=" col-md-11 col-sm-11 col-xs-11 item">
		  <a href="http://tracking.vcommission.com/aff_c?offer_id=480&aff_id=48478&file_id=79367&file_id=79367" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/480/Zovi_CPS_Tees_300x250.jpg" width="235" height="250" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=480&file_id=79367&aff_id=48478&file_id=79367" width="1" height="1" />
			</div>
			 
			</div>	<div class="clear"></div>
    				
    				
      				 
 				</div>
 		</div>
</div>
</div><div class="clear"></div>
