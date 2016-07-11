<div class="page-container">
	<div class="main-content">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="flight">
					<form method="get" action="<?=base_url();?>Landingpage/Flights.html" class="validate form-horizontal form-label-left">
						<div class="white"style="padding-bottom: 25px;">
							<h2>Search Flights</h2>
						</div>
					<!--<div class="col-md-12">
							<div class="form-group white">
								<div class="col-md-5">
									<input type="radio" class="flat" name="radio"/>
									One Way 
								</div>
								<div class="col-md-5">
									<input type="radio" class="flat" name="radio"/>
									Round Trip
								</div>
							</div>
						</div>-->
						<div class="form-group">
							<label class="col-md-5 col-sm-5 col-xs-12 white">From </label>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<input type="text" id="from" list="fromdata" name="from" placeholder="Type here.." data-validate="required" class="form-control" data-message-required="Type here..">
				  <datalist id="fromdata"></datalist>
							</div>
						</div>							
						<div class="form-group">
							<label class="col-md-5 col-sm-5 col-xs-12 white">To</label>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<input type="text" id="to" list="todata" class="form-control" name="to" placeholder="Type here.." data-validate="required" class="form-control" data-message-required="Type here..">
				  <datalist id="todata"></datalist>

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-5 col-sm-5 col-xs-12 white">Departure</label>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="input-group">
											<input type="text" name="departure" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Departure Date" data-validate="required" class="form-control" data-message-required=" ">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
							</div>
						</div>
					<div class="form-group">
							<label class="col-md-5 col-sm-5 col-xs-12 white">Return</label>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="input-group">
											<input type="text" name="return" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Return Date">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
</div>
						</div>
						<div class="form-group">
							<label class="col-md-5 col-sm-5 col-xs-12 white">Class </label>
							<div class="col-md-12 col-sm-12 col-xs-12">
								<select class="form-control" name="class">
									<option value="1">Economy</option>
									<option value="2">Premium Economy</option>
									<option value="3">Business</option>
								</select>
							</div>
						</div>
						<div class="form-group">
<label class="col-md-5 col-sm-5 col-xs-12 white">Adults </label>
<div class="col-md-12 col-sm-12 col-xs-12">
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
						<button type="submit" style="width:100%;margin-top: 15px;" class="btn btn-success">Search</button>
					</form>
				</div>
			</div>
			
			
			
			
			
			<div class="col-md-8 col-sm-6 col-xs-12">
			<div class="col-md-2">
				<div class="hotel_image"><a href="">
					 
						<img src="<?=base_url();?>frontend/images/airline.jpeg">		
					 
					</a>
					</div>
					</div>
					<div class="col-md-2">
					<span>21:55</span></br>
					<span>BHO</span>
					</div>
					<div class="col-md-4">
					<span>1 40 hr</span>
					<ul>
						<li>----------------------------------></li>
					</ul>
					<div><span>Direct</span></div>
					</div>
					<div class="col-md-2">	<span>21:55</span></br>
					<span>BHO</span></div>
					<div class="col-md-2">
					<div><span>14 deals from</span>
					<div><a><span>₹ 4,479</span></a></div></div>
					<div>Select</div>
					</div>
			
			</div>
		</div> 
	</div>
</div>
<div class="clear"></div>
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

