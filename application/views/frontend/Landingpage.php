<div class="header_bottom_left">
		<?php if(!empty($lshproduct)){ $i=0; foreach($lshproduct as $lshproducted){ 
		if($i==0){ ?>
			<div class="section group">
		<?php } ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$lshproducted->categoriesUrlKey?>/<?=$lshproducted->productsUrlKey?>.html"><img src="<?=$lshproducted->imageName?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?=$lshproducted->productName?> </h2>
						<p><span class="price"><?=$lshproducted->productPrice?></span></p>
						<?php if(!empty($userinfos)){ if(in_array($lshproducted->productsID,$whislistproduct)==false){?>
						<div class="button"><span><a href="<?=base_url();?>User/AddToWishList/<?=$lshproducted->productsID?>.html">Add to wishlists</a></span></div>
						<?php } }else{ ?>
						<div class="button"><span><a href="<?=base_url();?>Login.html?return=true">Add to wishlists</a></span></div>
						<?php } ?>
				   </div>
			   </div>			
				<?php  $i++;
            	if($i>1){ echo"</div>"; $i=0;}	} }else{?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="javascript:;"> <img src="<?=base_url();?>frontend/images/pic4.png" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p>Lorem ipsum dolor sit amet sed do eiusmod.</p>
						<div class="button"><span><a href="javascript:;">Add to wishlists</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="javascript:;"><img src="<?=base_url();?>frontend/images/pic3.png" alt="" / ></a>
						  
					</div>
					<div class="text list_2_of_1">
						  <h2>Sansung</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="javascript:;">Add to wishlists</a></span></div>
					</div>
				</div>
			</div>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="javascript:;"> <img src="<?=base_url();?>frontend/images/pic3.jpg" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						<div class="button"><span><a href="javascript:;">Add to wishlists</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="javascript:;"><img src="<?=base_url();?>frontend/images/pic1.png" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="javascript:;">Add to wishlists</a></span></div>
					</div>
				</div>
			</div>
			<?php } ?>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
              <section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					<?php if(!empty($deals)){ foreach($deals as $deal){ ?>
						<li>
						<div class="listview_1_of_2 images_1_of_2" style="
    width: 606px;
    float: left;
    display: block;
">
						 <a href="<?=$deal->link?>" target="_blank">
					<div class="listimg listimg_2_of_1">
						 <img src="<?=$deal->url?>" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h2><?=$deal->offer_name?></h2>
						  <p><h2><?=$deal->coupon_code?></h2></br>
						  <?=$deal->coupon_title?></p>
					</div>
					</a>
					</div>
				</li>
					<?php } } ?>	
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	
</div>
	<!-- Javascript Ad Tag: 534 -->
<div id="vcm5342k0LkS"></div>
<script src="http://tracking.vcommission.com/aff_ad?campaign_id=534&aff_id=48478&format=javascript&format=js&divid=vcm5342k0LkS" type="text/javascript"></script>
<noscript><iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=534&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="1500" height="90"></iframe></noscript><div class="header_bottom">
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="sort">
    		<p>Sort by:
    			<select>
    				<option>Lowest Price</option>
    				<option>Highest Price</option>
    				<option>Lowest Price</option>
    				<option>Lowest Price</option>
    				<option>Lowest Price</option>
    				<option>In Stock</option>  				   				
    			</select>
    		</p>
    		</div>
    		<div class="show">
    		<p>Show:
    			<select>
    				<option>4</option>
    				<option>8</option>
    				<option>12</option>
    				<option>16</option>
    				<option>20</option>
    				<option>In Stock</option>  				   				
    			</select>
    		</p>
    		</div>
    		<div class="page-no">
    			<p>Result Pages:<ul>
    				<li><a href="javascript:;">1</a></li>
    				<li class="active"><a href="javascript:;">2</a></li>
    				<li><a href="javascript:;">3</a></li>
    				<li>[<a href="javascript:;"> Next>>></a >]</li>
    				</ul></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		   <?php if(!empty($featureproduct)){ foreach($featureproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4 ">
				
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt=""  /></a>
				

					 <h2><?=$product->productName?> </h2>
					
					 <p><span class=""><?=$product->productPrice?></span></p>
					  <div class="button" ><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" />
					  <?php if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php } ?>
					  </span> </div>
				     <div class="button" ><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" >Details</a></span></div>
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
			<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=83075" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_AnniversarySale_Minimum40OFF_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=83075&aff_id=48478&url_id=2442" width="1" height="1" />
	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="sort">
    		<p>Sort by:
    			<select>
    				<option>Lowest Price</option>
    				<option>Highest Price</option>
    				<option>Lowest Price</option>
    				<option>Lowest Price</option>
    				<option>Lowest Price</option>
    				<option>In Stock</option>  				   				
    			</select>
    		</p>
    		</div>
    		<div class="show">
    		<p>Show:
    			<select>
    				<option>4</option>
    				<option>8</option>
    				<option>12</option>
    				<option>16</option>
    				<option>20</option>
    				<option>In Stock</option>  				   				
    			</select>
    		</p>
    		</div>
    		<div class="page-no">
    			<p>Result Pages:<ul>
    				<li><a href="javascript:;">1</a></li>
    				<li class="active"><a href="#">2</a></li>
    				<li><a href="javascript:;">3</a></li>
    				<li>[<a href="javascript:;"> Next>>></a >]</li>
    				</ul></p>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
		   <?php if(!empty($newproduct)){ foreach($newproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4 ">
					
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt="" /></a>
				
					 <h2><?=$product->productName?> </h2>
					
					 <p><span class=""><?=$product->productPrice?></span></p>
					 
					  <div class="button"><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" />
					  <?php if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php } ?>
					  </span> </div>
				     <div class="button" style="width:100%"><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>">Details</a></span></div>
				
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
    </div>
 </div>
</div>
   

<!-- Javascript Ad Tag: 1862 -->
<div id="vcm1862d7dBsn"></div>
<script src="http://tracking.vcommission.com/aff_ad?campaign_id=1862&aff_id=48478&format=javascript&format=js&divid=vcm1862d7dBsn" type="text/javascript"></script>
<noscript><iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=1862&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="1000" height="90"></iframe></noscript>
<!-- // End Ad Tag -->
<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=83075" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_AnniversarySale_Minimum40OFF_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=83075&aff_id=48478&url_id=2442" width="1" height="1" />
		

