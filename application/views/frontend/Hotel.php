<div class="page-container">
	<div class="main-content">
 		<div class="row">
		
<div class="col-md-4 col-sm-4 col-xs-12">
<div class="hotel_panal">
 <form method="get" action="<?=base_url();?>Hotel.html" class="validate form-horizontal form-label-left">
 
              <div class="white"style="padding-bottom: 25px;">
                <h2>Search Hotal</h2>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 white">Where</label>
             
                <div class="col-md-12 col-sm-12 col-xs-12">
                <select id="placeID" class="select3_group form-control" name="where" data-validate="required" data-message-required="type here.........." >
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
			  
<div class="form-group">
<label class="col-md-5 col-sm-5 col-xs-12 white">Check In</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="input-group">
											<input type="text" name="checkIn" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Check In" data-validate="required" data-message-required=" ">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>

</div>
</div>
<div class="form-group">
<label class="col-md-5 col-sm-5 col-xs-12 white">Check Out</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="input-group">
											<input type="text" name="checkOut" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Check Out" data-validate="required" data-message-required=" ">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
</div>
</div>
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 white">Guests?</label>
             
                <div class="col-md-12 col-sm-12 col-xs-12">
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
              </div>
			     <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 white">Rooms?</label>
             
                <div class="col-md-12 col-sm-12 col-xs-12">
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

				
				 
              <button type="submit" style="width:100%;margin-top: 15px;" class="btn btn-success">Search</button>
            	 
</form>
</div>
</div>

<?php if(!empty($getHotelsDetail)){?>
<div class="col-md-8 col-sm-8 col-xs-12">
<?php
	foreach($getHotelsDetail['hotels'] as $hotelDetail){
?>
			
				 <div class="hotel_p">
				<div class="row">			 
				<div class="col-md-3 col-sm-2 col-xs-12 hotel_view">
					<div class="hotel_image"><a href="">
					<?php foreach($hotelDetail['images'] as $key=>$images){ ?>
						<img src="http://d16eaqi26omzol.cloudfront.net/available<?=$key?>mf.jpg">
						<img class="hotel_layout_image" src="<?=base_url();?>frontend/images/preview-img3.jpg">
						<img class="hotel_layout_image" src="<?=base_url();?>frontend/images/preview-img3.jpg">
						<img class="hotel_layout_image" src="<?=base_url();?>frontend/images/preview-img3.jpg">
						<img class="hotel_layout_image" src="<?=base_url();?>frontend/images/preview-img3.jpg">
					<?php break; } ?>
					</a>
					</div>
				</div>
				<div class="col-md-9 col-xs-12 hotel_main">
					<div class="col-md-8">
						<a><h3 class="hotel_name"><?=$hotelDetail['name']?><small> <?=$hotelDetail['star_rating']?></small></h3></a>
						<button class="hotel_U map-trigger"><?=$hotelDetail['address']?></button>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<p class="hotel_review">Very good</p>
						<span class="hotel_count">Reviews: 122</span>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12"><P class="parking">parking</P></div>
					<div class="col-md-12 col-sm-12 col-xs-12 hotel_b">
					<?php //$keys=(array_keys(array_column($getHotelsDetail['hotels_prices'], 'id'), $hotelDetail['hotel_id']));

$keys = array_search($hotelDetail['hotel_id'], array_column($getHotelsDetail['hotels_prices'], 'id'));
//print_r($keys);die;
foreach($getHotelsDetail['hotels_prices'][$keys]['agent_prices'] as $agents){
	
	$agentkeys = array_search($agents['id'], array_column($getHotelsDetail['agents'], 'id'));
	?>
						<div class="col-md-3  col-sm-3 col-xs-3 deal_meta hotel_left"><img  style="width:100%; height:50px;" src="<?=isset($getHotelsDetail['agents'][$agentkeys]['image_url'])?$getHotelsDetail['agents'][$agentkeys]['image_url']:''?>"></div>
						<div class="col-md-4 col-sm-4 col-xs-4 deal_meta"><p class=""><?=isset($agents['room_offers'][0]['rooms'][0]['type'])?$agents['room_offers'][0]['rooms'][0]['type']:''?></p>
						<span class="hotel_brackfast">Breakfast included</span>
							<span class="hotel_co">Non refundable</span>
						</div>
					
					<div class="col-md-5 col-sm-5 col-xs-5">
						<div class="col-md-7   col-sm-7  col-xs-12 deal_meta"><p class="room_price">Rs: <?=$agents['price_total']?></p></div>
						<div class="col-md-5 col-sm-5 col-xs-5 deal_meta"><button class="btn btn-success"><a href="<?=$agents['booking_deeplink']?>" target="_blank">View Deals</a></button>
							<span class="massage">Available room: <?=isset($agents['available_rooms'])?$agents['available_rooms']:''?></span></div>
					</div>
					<?php } ?>
					</div>
					
				</div>
			</div>		
				</div>
				
		
		
		<?php } ?></div>
		<div class="clear"></div>
		<?php } ?>
	</div>
</div>
</div>

<div class="clear"></div>

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

