</div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<p><a href="<?=base_url();?>">Home</a> >> <a href="./"><?=isset($categorykey)?$categorykey:''?> </a></p>
    	    </div>
    		
    		
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="<?=isset($products[0]->imageName)?$products[0]->imageName:''?>" alt="<?=isset($products[0]->productImageAltTag)?$products[0]->productImageAltTag:''?>" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?=isset($products[0]->productName)?$products[0]->productName:''?></h2>
					<p><?=isset($products[0]->productDescription)?$products[0]->productDescription:''?></p>					
					<div class="price">
						<p>Price: <span><?=isset($products[0]->productPrice)?$products[0]->productPrice:''?></span></p>
					</div>
					<div class="available">
						<p>Available Options :</p>
					<ul>
						<li>Color:
							<select>
							<option>Silver</option>
							<option>Black</option>
							<option>Dark Black</option>
							<option>Red</option>
						</select></li>
						<li>Size:<select>
							<option>Large</option>
							<option>Medium</option>
							<option>small</option>
							<option>Large</option>
							<option>small</option>
						</select></li>
						<li>Quality:<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select></li>
					</ul>
					</div>
					<div class="share">
						<p>Share Product :</p>
						<ul>
					    	<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/youtube.png" alt=""></a></li>
					    	<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/facebook.png" alt=""></a></li>
					    	<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/twitter.png" alt=""></a></li>
					    	<li><a href="javascript:;"><img src="<?=base_url();?>frontend/images/linkedin.png" alt=""></a></li>
			    		</ul>
					</div>
				<div class="add-cart">
					<div class="rating">
						<p>Rating:<img src="<?=base_url();?>frontend/images/rating.png"><span>[3 of 5 Stars]</span></p>
					</div>
					<div class="button" ><span ><a target="_blank" href="<?=isset($products[0]->productShopUrl)?$products[0]->productShopUrl:''?>">Buy now</a></span></div>
					<div style="padding-top:9px" class="button"><span><a href="javascript:;">Add to Cart</a></span></div>
					
					<div class="clear"></div>
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
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php foreach($categories as $category){?>
				      <li><a href="<?=base_url();?>Landingpage/Product/<?=$category->categoriesUrlKey?>"><?=$category->categoryName?></a></li>
				     <?php } ?>
    				</ul>
    				<div class="subscribe">
    					<h2>Newsletters Signup</h2>
    						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.......</p>
						    <div class="signup">
							    <form>
							    	<input type="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';"><input type="submit" value="Sign up">
							    </form>
						    </div>
      				</div>
      				 <div class="community-poll">
      				 	<h2>Community POll</h2>
      				 	<p>What is the main reason for you to purchase products online?</p>
      				 	<div class="poll">
      				 		<form>
      				 			<ul>
									<li>
									<input type="radio" name="vote" class="radio" value="1">
									<span class="label"><label>More convenient shipping and delivery </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="2">
									<span class="label"><label for="vote_2">Lower price</label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio"  value="3">
									<span class="label"><label for="vote_3">Bigger choice</label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio"  value="5">
									<span class="label"><label for="vote_5">Payments security </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="6">
									<span class="label"><label for="vote_6">30-day Money Back Guarantee </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="7">
									<span class="label"><label for="vote_7">Other.</label></span>
									</li>
									</ul>
      				 		</form>
      				 	</div>
      				 </div>
 				</div>
 		</div>
 	</div>
	</div>
</div>