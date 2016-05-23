	<div class="header_bottom">
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
						<div class="button"><span><a href="javascript:;">Add to wishlists</a></span></div>
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
						<li><img src="<?=base_url();?>frontend/images/1.jpg" alt=""/></li>
						<li><img src="<?=base_url();?>frontend/images/2.jpg" alt=""/></li>
						<li><img src="<?=base_url();?>frontend/images/3.jpg" alt=""/></li>
						<li><img src="<?=base_url();?>frontend/images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	
</div>
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
					  <div class="button" ><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" /><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" class="cart-button">Add to wishlists</a></span> </div>
				     <div class="button" ><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" >Details</a></span></div>
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
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
					 
					  <div class="button"><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" /><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?> " class="cart-button">Add to wishlist</a></span> </div>
				     <div class="button" style="width:100%"><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>">Details</a></span></div>
				
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
    </div>
 </div>
</div>
   

