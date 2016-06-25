<!--<div class="header_bottom_left">
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
						<?php /*if(!empty($userinfos)){ if(in_array($lshproducted->productsID,$whislistproduct)==false){?>
						<!-- <div class="button"><span><a href="<?=base_url();?>User/AddToWishList/<?=$lshproducted->productsID?>.html">Add to wishlists</a></span></div> -->
						<?php } }else{ ?>
						<!--<div class="button"><span><a href="<?=base_url();?>Login.html?return=true">Add to wishlists</a></span></div>-->
						<?php } */?>
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
		</div> -->
		
<div class="clear"></div>		  

			 <div class="header_bottom_left">
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
	 
	 <div class="header_bottom_right_images">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="hotel_panal">
    <div class="x_content">
      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Search Hotal</a> </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab"  aria-expanded="false">Flights</a> </li>

        </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
			
		   <div class="hotal">
		   <form method="post" class="form-horizontal form-label-left">
              <div style="padding-bottom: 25px;">
                <h2>Search Hotal</h2>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12">Where?</label>
             
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="text" class="form-control" value=" ">
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="col-md-5">Check In
                  <fieldset>
                    <div class="control-group">
                      <div class="controls">
                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="single_cal1" placeholder="Check In" aria-describedby="inputSuccess2Status">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> 
						  <span id="inputSuccess2Status" class="sr-only">(success)</span> </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
				                <div class="col-md-5"> Check Out
                         <fieldset>
                                                <div class="control-group">
                      <div class="controls">
                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                          <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="Check Out" aria-describedby="inputSuccess2Status">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> 
						  <span id="inputSuccess2Status" class="sr-only">(success)</span> </div>
                      </div>
                                                </div>
                                            </fieldset>
                                        </div> 
</div>	   

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-4">Guests
                  
                    <div class="control-group">
                      <div class="controls">
                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                         <div class="col-md-10 col-sm-4 col-xs-12">
<select class="form-control select_color" name="Status">
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
                    </div>
                   
                </div>



  .

</div>
 <div class="col-md-4">Rooms
                  
                    <div class="control-group">
                      <div class="controls">
                        <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                         <div class="col-md-10 col-sm-4 col-xs-12">
<select class="form-control select_color" name="Status">
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
                    </div>
                   
                </div>



  .

</div>
</div>
				
				 
              <button type="submit" style="width:100%;margin-top: 15px;" class="btn btn-success">Search</button>
            
			</form>
			</div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip</p>
          </div>         
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
</div>	 
	  </div><div class="clear"></div>
	  

	<!-- Javascript Ad Tag: 534 -->
<div id="vcm5342k0LkS"></div>
<script src="http://tracking.vcommission.com/aff_ad?campaign_id=534&aff_id=48478&format=javascript&format=js&divid=vcm5342k0LkS" type="text/javascript"></script>
<noscript><iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=534&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="1500" height="90"></iframe></noscript><div class="header_bottom">
 <div class="main">
    <div class="content">
	<div class="content_top">
    		<div class="heading">
    		<h3>Top Products</h3>
    		</div>    	
    		<div class="clear"></div>
    	</div>
		<div class="section group">
		   <?php if(!empty($lshproduct)){ foreach($lshproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4 ">
				
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt=""  /></a>
				

					 <h2><?=$product->productName?> </h2>
					
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
		
		
		
		
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    	<!--	<div class="sort">
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
    		</div>-->
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		   <?php if(!empty($featureproduct)){ foreach($featureproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4 ">
				
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt=""  /></a>
				

					 <h2><?=$product->productName?> </h2>
					
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
	
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    	<!--	<div class="sort">
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
    		</div>-->
    		<div class="clear"></div>
    	</div>
			<div class="section group">
		   <?php if(!empty($newproduct)){ foreach($newproduct as $product){?>
				<div class="grid_1_of_4 images_1_of_4 ">
					
					 <a target="_blank" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->productsUrlKey?>.html"><img src="<?=$product->imageName?>"  alt="" /></a>
				
					 <h2><?=$product->productName?> </h2>
					
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
 </div>
</div>
   

<!-- Javascript Ad Tag: 1862 -->
<div id="vcm1862d7dBsn"></div>
<script src="http://tracking.vcommission.com/aff_ad?campaign_id=1862&aff_id=48478&format=javascript&format=js&divid=vcm1862d7dBsn" type="text/javascript"></script>
<noscript><iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=1862&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="1000" height="90"></iframe></noscript>
<!-- // End Ad Tag -->
<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=83075" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_AnniversarySale_Minimum40OFF_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=83075&aff_id=48478&url_id=2442" width="1" height="1" />
	</div>	

<script>
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };

            $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange_right').daterangepicker(optionSet1, cb);

            $('#reportrange_right').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange_right').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange_right').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange_right').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });

            $('#options1').click(function () {
                $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
            });

            $('#options2').click(function () {
                $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
            });

            $('#destroy').click(function () {
                $('#reportrange_right').data('daterangepicker').remove();
            });

        });
 
 

	
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    
	
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal2').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal3').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_3"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal4').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });

		
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>
<!-- /datepicker -->
<script type="text/javascript">
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>
