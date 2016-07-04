<div class="clear"></div>
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12">
<div class="hotel_panal">
 <form method="get" action="<?=base_url();?>Hotel.html" class="form-horizontal form-label-left">
 <div class=" ">
              <div class="hotel"style="padding-bottom: 25px;">
                <h2>Search Hotal</h2>
              </div>
			  
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 hotel">Where</label>
				<div class="col-md-12 col-sm-12 col-xs-12">
                  <select id="placeID" class="select3_group form-control" name="where" >
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
<label class="col-md-5 col-sm-5 col-xs-12 hotel">Check In</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<fieldset>
<div class="control-group">
<div class="controls">
<div class="col-md-12 xdisplay_inputx form-group has-feedback">
<input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="Check In" aria-describedby="inputSuccess2Status" name="checkIn">
<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(success)</span> </div>
</div>
</div>
</fieldset>
</div>
</div>
<div class="form-group">
<label class="col-md-5 col-sm-5 col-xs-12 hotel">Check Out</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<fieldset>
<div class="control-group">
<div class="controls">
<div class="col-md-12 xdisplay_inputx form-group has-feedback">
<input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Check Out" aria-describedby="inputSuccess2Status" name="checkOut">
<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(success)</span> </div>
</div>
</div>
</fieldset>
</div>
</div>
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 hotel">Guests</label>
             
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
                <label class="col-md-3 col-sm-3 col-xs-12 hotel">Rooms</label>
             
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
            	 </div>
</form>
</div>
</div>

<?php if(!empty($getHotelsDetail)){
	foreach($getHotelsDetail['hotels'] as $hotelDetail){
?>

<div class="col-md-8 col-sm-8 col-xs-12"> 
<div class="col-md-2 sc_hotel">
<?php foreach($hotelDetail['images'] as $key=>$images){ ?>
<img style="width: 111px; height: 111px;" src="http://d16eaqi26omzol.cloudfront.net/available<?=$key?>mf.jpg">
<?php break; } ?>
</div>
<div class="col-md-10 sc_hotel"><h2><a href="javascript:;"><?=$hotelDetail['name']?> </a><small> <?=$hotelDetail['star_rating']?></small></h2>
<div><p><?=$hotelDetail['address']?></p></div>
<div class="col-md-8  ">
<table style="width:100%">
<?php //$keys=(array_keys(array_column($getHotelsDetail['hotels_prices'], 'id'), $hotelDetail['hotel_id']));

$keys = array_search($hotelDetail['hotel_id'], array_column($getHotelsDetail['hotels_prices'], 'id'));
//print_r($keys);die;
foreach($getHotelsDetail['hotels_prices'][$keys]['agent_prices'] as $agents){
	
	$agentkeys = array_search($agents['id'], array_column($getHotelsDetail['agents'], 'id'));
	?>
<tr>
<td><image src="<?=isset($getHotelsDetail['agents'][$agentkeys]['image_url'])?$getHotelsDetail['agents'][$agentkeys]['image_url']:''?>"></td>
<td><?=isset($agents['room_offers'][0]['rooms'][0]['type'])?$agents['room_offers'][0]['rooms'][0]['type']:''?></td>
<td style="text-align:right">Rs: <?=$agents['price_total']?></td>
<td><small>Available room: <?=isset($agents['available_rooms'])?$agents['available_rooms']:''?></small></td>
<td><a href="<?=$agents['booking_deeplink']?>" target="_blank">View Deals</a></td>
</tr>
<?php } ?>
</table>
</div>

<div class="clear"></div>
</div> 
</div>

<?php } } ?>

</div><div class="clear"></div>
<script>
        	
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
                calender_style: "picker_1",
				format: "YYYY-MM-DD"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal4').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1",
				format: "YYYY-MM-DD"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });

		
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
 
        $(document).ready(function () {
            $('#reservation').daterangepicker(null, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
		
		<!-- enable return trip -->
		 function enableButton2() {
            document.getElementById("button2").disabled = false;
        }
		
	

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
	  
				$(document).on('keyup', '.select2-search__field', function() {
				getplaceID(this.value);
				});
		});
    </script>
