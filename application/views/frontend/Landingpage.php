<div class="page-container">
	<div class="main-content">
	<center>
	<div class="page-loading-overlay">
				<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
				</div>
			</center>
		<div class="compare_product comp_btn_fixed" id="compare">

		<div class="row">
			<div class="col-sm-12">
				<div class="panel-default comepare_bgc">					 
						<div class="panel-body">	
							
				<form role="form" class="form-horizontal" onsubmit="return submit_compare()" method="post" action="<?=base_url();?>Landingpage/compare">
                <div class="compeyarhidden">  <div class="col-md-2 col-sm-2 col-xs-0"></div>
                  <div class="col-sm-2"  id="productName" >										
				</div>
					</div>
					<div class="col-md-2">
										<div class="form-group">									 
											<button type="submit" class="btn btn-success btn-single" style="margin-top: 170px;">Compare</button>
										</div>
									</div>
									
					<div class="form-group-separator"></div>
								
							</form>	
							
					</div>
						
				</div>
			</div>
		</div>
	</div>
	
		<div class="row">
								 <!-- FlexSlider -->
			<div class="col-md-6 col-sm-6 col-xs-12 hidden-xs">	
			
              <section class="slider">
				  <div class="flexslider">
					<ul class="slides">					
					<?php //if(!empty($deals)){ foreach($deals as $deal){ 
					$i=''; for($start=0;$start<=15;$start++){ ?>
						<li id="vcm1950NUgewd<?=$i?>">
							
							<script src="http://tracking.vcommission.com/aff_ad?campaign_id=1950&aff_id=48478&format=javascript&format=js&divid=vcm1950NUgewd<?=$i?>" type="text/javascript"></script>
							<noscript><iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=1950&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="300" height="250"></iframe></noscript>
						</li>
					<?php // } } 
					$i++; } ?>	
					  </ul>
				  </div>
	      </section> 
<!-- FlexSlider -->
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
			 
 
 

  <div style="" class="hotel_panal white">

      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
		  <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="true">Flights</a> </li>
          <li role="presentation" class=""><a href="<?=base_url();?>Hotel.html" id="home-tab" role="tab"  aria-expanded="false">Hotel</a> </li>
         </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">	<form method="get" action="<?=base_url();?>Landingpage/Flights.html" class="validate form-horizontal form-label-left">
						<div class="white">
							<h2>Search Flights</h2>
						</div>
			  				  <div class="col-md-6 col-sm-6 col-xs-12">
					  <div class="form-group white">								
						  <div class="col-md-12">									
							  <input type="radio" onclick="myFunction()" checked id="oneway" class="flat" name="radio"/>								
							  One Way 								
						  </div>								
				  
					  </div>
				  </div>
				  <div class="col-md-6 col-sm-6 col-xs-12">
					  <div class="form-group white">					  
						  <div class="col-md-12">						  
							  <input type="radio" onclick="myFunction()" id="Returntrip"class="flat" name="radio"/>						 
							  Return Trip					  						 
						  </div>
					  </div>
				  </div>
							  
						<div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 white">From</label>
             
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <input type="text" id="from" autocomplete="off" onchange="checkfrom()" list="fromdata" class="form-control" name="from" placeholder="City or Airport" data-validate="required" data-message-required="Enter Search Where" >
				  <span id="fromrequired" style="color:red" ></span>
				  <datalist id="fromdata"></datalist>
                </div>
							</div>
							</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
				  
				 <label class="col-md-4 col-sm-4 col-xs-12 white">To</label>
				                 <div class="col-md-8 col-sm-8 col-xs-12">
                 <input type="text" id="to" list="todata" onchange="checkto()" autocomplete="off" class="form-control" name="to" placeholder="City or Airport" data-validate="required" data-message-required="Enter Search Where" >
				 <span id="torequired" style="color:red" ></span>
				  <datalist id="todata"></datalist>
                </div>
							</div>
              </div>
						
						
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
                
					<label class="col-md-4 col-sm-4 col-xs-12 white">Departure</label>
             
                
					<div class="col-md-8 col-sm-8 col-xs-12">
                
						<div class="input-group">
											
							<input type="text" name="departure" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Departure Date" data-validate="required" data-message-required=" ">
											
											
							<div class="input-group-addon">
												
								<a href="#"><i class="linecons-calendar"></i></a>
											
							</div>
										
						</div>
               
					</div>
							
				</div>
						</div>
							
						<div class="col-md-6 col-sm-6 col-xs-12">
							
							<div class="form-group">
								
				 
								<label class="col-md-4 col-sm-4 col-xs-12 white">Return</label>
				                 
								<div class="col-md-8 col-sm-8 col-xs-12">
                
									<div class="input-group">
											
										<input type="text" name="return" disabled id="return"class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Return Date">
											
											
										<div class="input-group-addon">
											
											<a href="#"><i class="linecons-calendar"></i></a>
											
										</div>
										
									</div>
               
								</div>
               
							</div>
						
						</div>
						
						
						<div class="col-md-6 col-sm-6 col-xs-12">
						
              <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 white">Class</label>
             
                <div class="col-md-8 col-sm-8 col-xs-12">
                 <select class="form-control" name="class">
									<option value="Economy">Economy</option>
									<option value="premiumEconomy">Premium Economy</option>
									<option value="Business">Business</option>
									<option value="First">First</option>
						</select>
                </div>
							</div></div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
				 <label class="col-md-4 col-sm-4 col-xs-12 white">Adults</label>
				                 <div class="col-md-8 col-sm-8 col-xs-12">
                 <select class="form-control" name="adults">
<option  value="1">1</option>
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
 


				
				 
              <button type="submit" style="width:100%;" class="btn btn-success">Search</button>
            	
					</form>
          </div>  
		  
		  <div role="tabpanel" class="tab-pane fade " id="tab_content1" aria-labelledby="home-tab">
				<!-- <script src="https://www.hotelscombined.com/SearchBox/343862"></script>-->
			
		
          </div>
        </div>
      </div>
   
  </div>
 
<div class="clear"></div>
 
	  
			
			</div>
			
		</div>
	 
	<div class="clear"></div>
	
	
	<div class="content_top hidden-xs">
    		<div class="heading">
    		<h3>Search restaurant</h3>
    		</div>    	
    		<div class="clear"></div>
    	</div>
		<div class="section group hidden-xs">
		    <div class="widget_wrap" style="width:100%;height:400px;display:inline-block;"><iframe src="https://www.zomato.com/widgets/res_search_widget.php?city_id=26&theme=red&widgetType=custom&sort=popularity" style="position:relative;width:100%;height:100%;" border="0" frameborder="0"></iframe></div>
			
		</div>
		<div class="clear"></div>
	
	
   
	<div class="content_top hidden-xs">
    		<div class="heading">
    		<h3>Top Products</h3>
    		</div>    	
    		<div class="clear"></div>
    	</div>
		<div class="section group hidden-xs">
		   <?php if(!empty($lshproduct)){ foreach($lshproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4">
				<div class="imageheightfix">
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt=""  /></a>
				</div>

					 <h2><?=$product->productName?> <?=isset($product->attr)?$product->attr:''?></h2>
					
					 <p><span class="price">Rs. <?=number_format($product->productPrice,2)?></span></p>
					 <!-- <div class="button" ><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" />
					  <?php /*if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php }*/ ?>
					  </span> </div>-->
				   <!--  <div class="button" ><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" >Details</a></span></div>-->
			<div class="checkbox">
            <label>
              <input type="checkbox" value="<?=$product->productsID?>" class="chkcount" name="productid" onchange="compare_product(this.value)">
              Compare </label>
          
								  <lable class="wishlist"> 
					<?php if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="fa fa-shopping-cart"></a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="fa fa-shopping-cart"></a>
					  <?php }?> </lable>
					</div>
			</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
		
		<div class="clear"></div>
		
		
    	<div class="content_top hidden-xs">
    		<div class="heading">
    		<h3>Featured Products</h3>
    		</div>
    	
    		<div class="clear"></div>
    	</div>
	      <div class="section group hidden-xs">
		   <?php if(!empty($featureproduct)){ foreach($featureproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4">
					<div class="imageheightfix">
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt=""  /></a>
					</div>

					 <h2><?=$product->productName?> <?=isset($product->attr)?$product->attr:''?></h2>
					
					 <p><span class="price">Rs. <?=number_format($product->productPrice,2)?></span></p>
					 <!-- <div class="button" ><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" />
					  <?php /*if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php }*/ ?>
					  </span> </div>-->
				   <!--  <div class="button" ><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>" >Details</a></span></div>-->
				<div class="checkbox">
            <label>
              <input type="checkbox" value="<?=$product->productsID?>" class="chkcount" name="productid" onchange="compare_product(this.value)">
              Compare </label>
								  <lable class="wishlist"> 
					<?php if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="fa fa-shopping-cart"></a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="fa fa-shopping-cart"></a>
					  <?php }?></lable>
          </div>
			  </div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
		<div class="hidden-xs">
			<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=83075" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_AnniversarySale_Minimum40OFF_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=83075&aff_id=48478&url_id=2442" width="1" height="1" />
	</div>
			<div class="content_top hidden-xs">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>    	
    		<div class="clear"></div>
    	</div>
			<div class="section group hidden-xs">
		   <?php if(!empty($newproduct)){ foreach($newproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4">
						<div class="imageheightfix">
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt="" /></a>
					</div>
					 <h2><?=$product->productName?> <?=isset($product->attr)?$product->attr:''?></h2>
					
					 <p><span class="price">Rs. <?=number_format($product->productPrice,2)?></span></p>
					 
					 <!-- <div class="button"><span><img src="<?=base_url();?>frontend/images/cart.jpg" alt="" />
					  <?php /* if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="cart-button">Add to wishlists</a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="cart-button">Add to wishlists</a>
					  <?php } */?>
					  </span> </div>
				   <!--  <div class="button" style="width:100%"><span><a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>">Details</a></span></div>-->
				<div class="checkbox">
            <label>
              <input type="checkbox" value="<?=$product->productsID?>" class="chkcount" name="productid" onchange="compare_product(this.value)">
              Compare</label>
       
				<lable class="wishlist"> 					
					<?php if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="fa fa-shopping-cart"></a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="fa fa-shopping-cart"></a>
					  <?php }?>
					</lable>
				    </div>
				</div>
				
		  <?php } }else{ echo"No product Found!!";}?>
			</div>
		 
    
 
</div>
</div><div class="clear"></div>
<div class="hidden-xs">
			<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=83075" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_AnniversarySale_Minimum40OFF_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=83075&aff_id=48478&url_id=2442" width="1" height="1" />
	</div>

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
		{ 
		$("#placeID").empty().append(html);
		
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
		function myFunction() {
		if(document.getElementById('Returntrip').checked) {
     document.getElementById("return").disabled = false;
    }else if(document.getElementById('oneway').checked) {
      document.getElementById("return").disabled = true;
    }
		}
		
		
		function checkfrom(){
			var val=$("#from").val();

			var obj=$("#fromdata").find("option[value='"+val+"']")

			if(obj !=null && obj.length>0){
				$("#fromrequired").html('');
			return true; 
			}else{
			$("#from").val('');
			  document.getElementById('fromrequired').setAttribute('class',' required') ;
			   $("#fromrequired").html('Please select a valid code from list');
			return false;
			}
			}
			
			function checkto(){
			var val=$("#to").val();

			var obj=$("#todata").find("option[value='"+val+"']")

			if(obj !=null && obj.length>0){
				$("#torequired").html('');
			return true;
			}else{
			$("#to").val('');
			document.getElementById('torequired').setAttribute('class',' required') ;
			$("#torequired").html('Please select a valid code from list');
			return false;
			}
			}
		
    </script>
	
