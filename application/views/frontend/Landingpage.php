<div class="page-container">
	<div class="main-content">
		<div class="row">
								 <!-- FlexSlider -->
			<div class="col-md-6 col-sm-6 col-xs-12">		  
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
			 
 
 

  <div style="height:415px" class="hotel_panal white">

      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Search Hotal</a> </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Flights</a> </li>

        </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
			


		   <form method="get" action="<?=base_url();?>Hotel.html" class="validate form-horizontal form-label-left">

		   		<h2>Search Hotal</h2>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 col-xs-12 white">Where</label>
                             <div class="col-md-12 col-sm-12 col-xs-12">

								<select id="placeID" class="select3_group form-control" name="where" data-validate="required" data-message-required="Enter Search Where" >
								<option value="" >Where</option>
										<?php { 
												if(!empty($Fetch_ProductName))
													{
														foreach($Fetch_ProductName as $Fetch_ProductMap) 	
													{?>
										<option selected value="<?=isset($Fetch_ProductMap->productsID) ?$Fetch_ProductMap->productsID:''?>"><?=isset($Fetch_ProductMap->productName)?$Fetch_ProductMap->productName:''?> </option>
							
										<?php }}}?>
								</select>
							</div>
					</div>
              <div class="col-md-12 col-sm-12 col-xs-12">

				<div class="col-md-6 padding form-group"><p class="white">Check In</p>
					<div class="input-group ">
						<input type="text" name="checkIn" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Check In" data-validate="required" data-message-required=" ">

						<div class="input-group-addon">
						<a href="#"><i class="linecons-calendar"></i></a>
					</div>
										</div>
                </div>
				                <div class="col-md-6 padding form-group"><p class="white">Check Out</p>
                        <div class="input-group">
											<input type="text" name="checkOut" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Check Out" data-validate="required" data-message-required=" ">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
                                        </div> 
</div>
			   

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6"><p class="white">Guests</p>
<select class="form-control" name="noOfGuests">
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
                  
                   
                      
                       

<select class="form-control" name="noOfRoom">
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

				
				 
              <button type="submit" style="width:100%;margin-top:20px;" class="btn btn-success">Search</button>
            	 
			</form>
		
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

             <form  method="get" action="<?=base_url();?>Landingpage/Flights.html" class="validate form-horizontal form-label-left">             

                <h2>Search Flights</h2>		  
              <div class="form-group">
                <label class="col-md-2 col-sm-2 col-xs-12  ">From</label>
             
                <div class="col-md-4 col-sm-4 col-xs-12">
                  <input type="text" id="from" list="fromdata" class="form-control" name="from" placeholder="Type here.." data-validate="required" data-message-required="Enter Search Where" >
				  <datalist id="fromdata"></datalist>
                </div>
				 <label class="col-md-1 col-sm-1 col-xs-12  ">To</label>
				                 <div class="col-md-4 col-sm-4 col-xs-12">
                 <input type="text" id="to" list="todata" class="form-control" name="to" placeholder="Type here.." data-validate="required" data-message-required="Enter Search Where" >
				  <datalist id="todata"></datalist>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="col-md-6"><span class=" ">Departure</span>
                  <div class="input-group padding form-group">
											<input type="text" name="departure" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Departure Date" data-validate="required" data-message-required=" ">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
                </div>
				            <div class="col-md-6"><p class="white"> Return</p>
                         <div class="input-group">
											<input type="text" name="return" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Return Date">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
                                        </div> 
</div>	   

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6"><p class="white">Class</p>
                  
                   <select class="form-control" name="class">
									<option value="Economy">Economy</option>
									<option value="premiumEconomy">Premium Economy</option>
									<option value="Business">Business</option>
									<option value="First">First</option>
								</select>
</div>
<div class="form-group">
<label class="col-md-2 col-sm-2 col-xs-12 white">Adults </label>
<div class="col-md-6 col-sm-6 col-xs-12">
<select required class="form-control" name="adults">
<option select value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>

</select>
</div>
</div>
				 </div>

				
				 
              <button type="submit" style="width:100%;margin-top:20px;" class="btn btn-success">Search</button>
            	
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

 <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select3_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>

 <script>
function getplaceID(placekey)
{ 
	var placekey =placekey;
	if(placekey !=='')
	{
		$.ajax({
		type: "POST",
		url: base_url+"Hotel/getplaceID",
		data:{placekey:placekey},
		cache: false,
		success: function(html)
		{ // alert(html);
		$("#placeID").html(html);
		}
		});
	}
	return false;  	  
}		
		$(document).ready(function(){
	  
				$(document).on('keyup', '.select2-input', function() {
					
				getplaceID(this.value);
				});
		});
    </script>
	<script>
function fromID(placekey)
		{ 
			var placekey =placekey;
			if(placekey !=='')
			{
				$.ajax({
				type: "POST",
				url: base_url+"Flights/getplaceID",
				data:{placekey:placekey},
				cache: false,
				success: function(html)
				{ 
					 $("#fromdata").html(html);
					
				}
				});
			}
			return false;  	  
		}

		function toID(placekey)
		{ 
			var placekey =placekey;
			if(placekey !=='')
			{
				$.ajax({
				type: "POST",
				url: base_url+"Flights/getplaceID",
				data:{placekey:placekey},
				cache: false,
				success: function(html)
				{ 
				$("#todata").html(html);
				}
				});
			}
			return false;  	  
		}
		
		$(document).ready(function(){
	  
				$(document).on('keyup', '#from', function() {
				fromID(this.value);
				});
				
				$(document).on('keyup', '#to', function() {
				toID(this.value);
				});
		 })
    </script>
	