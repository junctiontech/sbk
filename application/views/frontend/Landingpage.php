<div class="page-container">
	<div class="main-content">
		<div class="row">
								 <!-- FlexSlider -->
			<div class="col-md-6 col-xs-12">		  
              <section class="slider">
				  <div class="flexslider">
					<ul class="slides">					
					<?php if(!empty($deals)){ foreach($deals as $deal){ ?>
						<li>
							<div class="listview_1_of_2 images_1_of_2" style="width: 606px;float: left;display: block;">
								<a href="<?=$deal->link?>" target="_blank">
								<div class="listimg listimg_2_of_1">
									<img src="<?=$deal->url?>" alt="" />
								</div>
								<div class="text list_2_of_1">
									<h2><?=$deal->offer_name?></h2>
									<span><h2><?=$deal->coupon_code?></h2><br>
									<?=$deal->coupon_title?></span>
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
			<div class="col-md-6 col-sm-6 col-xs-12">
			 
 
 
  <div class="hotel_panal white">
   
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Search Hotal</a> </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Flights</a> </li>

        </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
			

		   <form method="post" class="form-horizontal form-label-left">
		   		<h2>Search Hotal</h2>
             
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 white">Where?</label>
             
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="text" class="form-control" value=" ">
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="col-md-6"><p class="white">Check In</p>
                 <div class="input-group">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="Check In">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
                </div>
				                <div class="col-md-6"><p class="white">Check Out</p>
                         <div class="input-group">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="Check Out">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
                                        </div> 
</div>
			   

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6"><p class="white">Guests</p>
<select class="form-control" name="Status">
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 <option value="6">6</option>
 <option value="7">7</option>
 <option value="8">8</option>
 <option value="9">9</option>
<option value="10">10</option>
 </select>
	 </div> 
 				<div class="col-md-6"><p class="white">Rooms</p>
                  
                   
                      
                       

<select class="form-control" name="Status">
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 <option value="6">6</option>
 <option value="7">7</option>
 <option value="8">8</option>
 <option value="9">9</option>
<option value="10">10</option>
 </select>

                      
                    
                   
                </div>
</div>

				
				 
              <button type="submit" style="width:100%;margin-top: 15px;" class="btn btn-success">Search</button>
            	 
			</form>
		
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
             <form method="post" class="form-horizontal form-label-left">
		   		   
              
                <h2>Search Flights</h2>
             
			  <div class="form-group">
			  <div class="col-md-5">
			  <input type="radio" class="flat" name="radio"/> One Way
			  
			  </div>
			  <div class="col-md-5">
			  <input type="radio" class="flat" name="radio"/> Round Trip 
			  </div>
			  </div>
              <div class="form-group">
                <label class="col-md-2 col-sm-2 col-xs-12  ">From</label>
             
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="text" class="form-control" value=" ">
                </div>
				 <label class="col-md-1 col-sm-1 col-xs-12  ">To</label>
				                 <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="text" class="form-control" value=" ">
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="col-md-6"><span class=" ">Departure</span>
                  <div class="input-group">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="Departure Date">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
                </div>
				                <div class="col-md-6"><p class="white"> Return</p>
                         <div class="input-group">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="Return Date">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
                                        </div> 
</div>	   

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6"><p class="white">Class</p>
                  
                    <select class="form-control" name="Status">
 <option value="1">Economy</option>
 <option value="2">Premium Economy</option>
 <option value="3">Business</option> 
 </select>
</div>
				 </div>

				
				 
              <button type="submit" style="width:100%;margin-top: 0px;" class="btn btn-success">Search</button>
            	
			</form>
          </div>         
        </div>
      </div>
   
  </div>
 
<div class="clear"></div>
 
	  
			
			</div>
			
		</div>
	 
	<div class="clear"></div>
	
	 
 
   
	<div class="content_top">
    		<div class="heading">
    		<h3>Top Products</h3>
    		</div>    	
    		<div class="clear"></div>
    	</div>
		<div class="section group">
		   <?php if(!empty($lshproduct)){ foreach($lshproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4 ">
				
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt=""  /></a>
				

					 <h2><?=$product->productName?> <?=isset($product->attr)?$product->attr:''?></h2>
					
					 <p><span class=""><?=$product->productPrice?></span></p>
					 <!-- <div class="button" ><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" />
					  <?php /*if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php }*/ ?>
					  </span> </div>-->
				   <!--  <div class="button" ><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" >Details</a></span></div>-->
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
		
		<div class="clear"></div>
		
		
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    	
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		   <?php if(!empty($featureproduct)){ foreach($featureproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4 ">
				
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt=""  /></a>
				

					 <h2><?=$product->productName?> <?=isset($product->attr)?$product->attr:''?></h2>
					
					 <p><span class=""><?=$product->productPrice?></span></p>
					 <!-- <div class="button" ><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" />
					  <?php /*if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php }*/ ?>
					  </span> </div>-->
				   <!--  <div class="button" ><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" >Details</a></span></div>-->
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
			<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=83075" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_AnniversarySale_Minimum40OFF_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=83075&aff_id=48478&url_id=2442" width="1" height="1" />
	
			<div class="content_top">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>    	
    		<div class="clear"></div>
    	</div>
			<div class="section group">
		   <?php if(!empty($newproduct)){ foreach($newproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4 ">
					
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt="" /></a>
				
					 <h2><?=$product->productName?> <?=isset($product->attr)?$product->attr:''?></h2>
					
					 <p><span class=""><?=$product->productPrice?></span></p>
					 
					 <!-- <div class="button"><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" />
					  <?php /* if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php } */?>
					  </span> </div>
				   <!--  <div class="button" style="width:100%"><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>">Details</a></span></div>-->
				
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
		 
    
 
</div>
</div><div class="clear"></div>
<!-- Javascript Ad Tag: 1862 -->
<div id="vcm1862d7dBsn"></div>
<script src="http://tracking.vcommission.com/aff_ad?campaign_id=1862&aff_id=48478&format=javascript&format=js&divid=vcm1862d7dBsn" type="text/javascript"></script>
<noscript><iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=1862&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="1000" height="90"></iframe></noscript>
<!-- // End Ad Tag -->
<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=83075" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_AnniversarySale_Minimum40OFF_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=83075&aff_id=48478&url_id=2442" width="1" height="1" />


 
	