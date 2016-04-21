</div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
		<div class="back-links">
    		<p><a href="<?=base_url();?>">Home</a> </p>
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
		  <?php if(!empty($products)){ foreach($products as $product){?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>"><img src="<?=$product->imageName?>" alt="" /></a>
					 <h2><?=$product->productName?> </h2>
					
					 <p><span class="price"><?=$product->productPrice?></span></p>
					  <div class="button"><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" /><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" class="cart-button">Add to Cart</a></span> </div>
				     <div class="button"><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" class="details">Details</a></span></div>
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
			
			
    </div>
 </div>
</div>
   