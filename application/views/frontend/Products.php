</div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
		<div class="back-links">
    		<p><a href="<?=base_url();?>">Home</a> >> <?=isset($categorykey)?$categorykey:''?> </p>
    	    </div>
    		<div class="heading">
    		<h3> Price List</h3>
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
    				<li><a href="#">1</a></li>
    				<li class="active"><a href="#">2</a></li>
    				<li><a href="#">3</a></li>
    				<li>[<a href="#"> Next>>></a >]</li>
    				</ul></p>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <div class="filter_panel">
		  <h3>Refine Your Search</h3>
		  <hr>
		  <div class="Price">
		  <h3> Price</h3>

		  </div>
		   <div class="checkbox chk">
					<label>
						<input type="checkbox" value="">Rs 5000-Rs 10000
					</label>
					<label>
						<input type="checkbox" value=""> Rs 10000-Rs 20000
					</label>
					<label>
						<input type="checkbox" value=""> Rs 20000-Rs 30000
					</label>
					<label>
						<input type="checkbox" value=""> Rs 30000-Rs 50000
					</label>
					<label>
						<input type="checkbox" value=""> Rs 50000-Rs 75000
					</label>
					<label>
						<input type="checkbox" value=""> Rs 75000-Rs 100000
					</label>
					
					</div>
			<hr>
			<div class="price">
			<h3>Brand</h3>
			<div class="chk">
			<input type="text" name="brand" placeholder="Brand">
			</div>
			</div>
			<hr>
		<div class="Price">
		  <h3> Type</h3>

		  </div>
		   <div class="checkbox chk">
					<label>
						<input type="checkbox" value="">LED
					</label>
					<label>
						<input type="checkbox" value=""> PLASMA
					</label>
					<label>
						<input type="checkbox" value=""> OLED
					</label>
				
					
					</div>
		  
		  	<div class="Price">
		  <h3> Features</h3>

		  </div>
		   <div class="checkbox chk">
					<label>
						<input type="checkbox" value="">3D
					</label>
					<label>
						<input type="checkbox" value=""> SMART
					</label>
					<label>
						<input type="checkbox" value=""> CURVED
					</label>
				
					
					</div>
		 
		  	<div class="Price">
		  <h3> Display</h3>

		  </div>
		   <div class="checkbox chk">
					<label>
						<input type="checkbox" value="">HD
					</label>
					<label>
						<input type="checkbox" value="">FULL HD
					</label>
					<label>
						<input type="checkbox" value="1"> 4K ultra HD
					</label>
				
					
					</div>
</div>
		  <div class="product_panel">
		   <?php if(!empty($products)){ foreach($products as $product){?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>" alt="" /></a>
					 <h2><?=$product->productName?> </h2>
					
					 <p><span class="price"><?=$product->productPrice?></span></p>

					
					  <div class="button" ><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" /> <?php if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php } ?></span> </div>
				     <div class="button" ><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>">Details</a></span></div>

					 <div class="checkbox">
					<label>
						<input type="checkbox" value=""> Add to Compare
					</label>
					</div>

				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
			</div>
			
			
    </div>
 </div>
</div>
   
