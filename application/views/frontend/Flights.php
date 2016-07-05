<div class="clear"></div>
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-12">
<div class="flight">
 <form method="get" action="<?=base_url();?>Landingpage/Flights.html" class="form-horizontal form-label-left">
<div class="">
<div class="hotel"style="padding-bottom: 25px;">
<h2>Search Flights</h2>
</div>

			<div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 hotel">From</label>
				<div class="col-md-12 col-sm-12 col-xs-12">
                  <select id="fromID" class="select3_group form-control" name="from" >
					<option value="" >From</option>
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

			<div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 hotel">To</label>
				<div class="col-md-12 col-sm-12 col-xs-12">
                  <select id="toID" class="select2_single form-control" name="to" >
					<option value="" >To</option>
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

<div class="form-group">
<label class="col-md-2 col-sm-2 col-xs-12 hotel">Departure</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<fieldset>
<div class="control-group">
<div class="controls">
<div class="col-md-12 xdisplay_inputx form-group has-feedback">
<input type="text" class="form-control has-feedback-left" id="single_cal3" name="departure" placeholder="Departure Date" aria-describedby="inputSuccess2Status">
<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(success)</span> </div>
</div>
</div>
</fieldset>
</div>
</div>
<div class="form-group">
<label class="col-md-2 col-sm-2 col-xs-12 hotel">Return</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<fieldset>
<div class="control-group">
<div class="controls">
<div class="col-md-12 xdisplay_inputx form-group has-feedback">
<input type="text" class="form-control has-feedback-left" id="single_cal4" name="return" placeholder="Return Date" aria-describedby="inputSuccess2Status">
<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span> <span id="inputSuccess2Status" class="sr-only">(success)</span> </div>
</div>
</div>
</fieldset>
</div>
</div>
<div class="form-group">
<label class="col-md-2 col-sm-2 col-xs-12 hotel">Class </label>
<div class="col-md-9 col-sm-9 col-xs-12">
<select class="form-control" name="class">
<option value="Economy">Economy</option>
<option value="PremiumEconomy">Premium Economy</option>
<option value="Business">Business</option>
<option value="First">First</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-md-2 col-sm-2 col-xs-12 hotel">Adults </label>
<div class="col-md-9 col-sm-9 col-xs-12">
<select class="form-control" name="adults">
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
<button type="submit" style="width:100%;margin-top: 15px;" class="btn btn-success">Search</button>
</div>
</form>
</div>
</div>
<div class="col-md-8 col-sm-8 col-xs-12"> 
<div class="col-md-2 sc_hotel"><img style="width: 111px; height: 111px;" src="<?=base_url();?>frontend/images/preview-img3.jpg"></div>
<div class="col-md-10 sc_hotel"><h2><a href="#">flight Name </a><small>Star</small></h2>
<div><p>Hotel Address</p></div>
<div class="col-md-8  ">
<table style="width:100%">
<tr>
<td><a href="#"><p>roms</p><p>rooms</p></a></td>
<td style="text-align:right"><p>4000</p><small>1 rooms left</small></td>
</tr>
<tr>
<td><a href="#"><p>roms</p><p>rooms</p></a></td>
<td style="text-align:right"><p>4000</p><small>1 rooms left</small></td>
</tr>
</table>
</div>
<div class="col-md-4 hc_sri_result_promotedDeal"><p class="price">4500</P>
<small>for time</small><br>
<button type="submit" class="btn btn-success">View Hotel</button>
</div>
<div class="clear"></div>
</div> 
</div>
</div><div class="clear"></div>
  <script>
            $(document).ready(function () {
                $(".select2_single").select2({
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
        	
        $(document).ready(function () {
            $('#single_cal1').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1",
				format: "YYYY-MM-DD"
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
            $('#single_cal2').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_1",
				format: "YYYY-MM-DD"
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
		{ // alert(html);
		$("#fromID").html(html);
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
		{ // alert(html);
		$("#toID").html(html);
		}
		});
	}
	return false;  	  
}
		
		
		$(document).ready(function(){
	  
				$(document).on('keyup', '.select3_group,.select2-search__field', function() {
				fromID(this.value);
				});
				
				$(document).on('keyup', '.select2_single,.select2-search__field', function() {
				toID(this.value);
				});
		});
    </script>
