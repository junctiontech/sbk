<div class="page-container">
	<div class="main-content">
	<div class="page-loading-overlay">
				<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
			</div> 
		<?php if (!empty($flightFinalArray)) { ?>
		<div class="row">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="flightsearchfixd">
				<div class="flight">
					<form method="get" onsubmit="return(checkfrom());return(checkto())"  action="<?=base_url();?>Landingpage/Flights.html" class="validate form-horizontal form-label-left">
						<div class="white"style="padding-bottom: 25px;">
							<h2>Search Flights</h2>
						</div>
						  <div class="col-md-6 col-sm-6 col-xs-6">
					  <div class="form-group white">								
						  <div class="col-md-12">									
							  <input type="radio" onclick="myFunction()" checked id="oneway" class="flat" name="radio"/>								
							  One Way 								
						  </div>								
				  
					  </div>
				  </div>
				  <div class="col-md-6 col-sm-6 col-xs-6">
					  <div class="form-group white">					  
						  <div class="col-md-12">						  
							  <input type="radio" onclick="myFunction()" id="Returntrip"class="flat" name="radio"/>						 
							  Return Trip					  						 
						  </div>
					  </div>
				  </div>
							
						<div class="hotel_panal1">
						<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="col-md-4 col-sm-4 col-xs-12 white">From </label>
							<div class="col-md-8 col-sm-8 col-xs-12">

								<input type="text" id="from" autocomplete="off" onchange="checkfrom()" list="fromdata" name="from" placeholder="City or Airport" data-validate="required" class="form-control" data-message-required="please enter City or Airport" value="<?=isset($from)?$from:''?>">
								<span id="fromrequired" style="color:red" ></span>
								<datalist id="fromdata"><option value="<?=isset($from)?$from:''?>"></datalist>
							</div>
						</div>	
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="col-md-4 col-sm-4 col-xs-12 white">To</label>
							<div class="col-md-8 col-sm-8 col-xs-12">

								<input type="text" id="to" autocomplete="off" list="todata" onchange="checkto()" class="form-control" name="to" placeholder="City or Airport" data-validate="required" class="form-control" data-message-required="please enter City or Airport" value="<?=isset($to)?$to:''?>">
						<span id="torequired" style="color:red" ></span>
				  <datalist id="todata"><option value="<?=isset($to)?$to:''?>"></datalist>

							</div>
						</div>
						</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="col-md-4 col-sm-4 col-xs-12 white">Departure</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<div class="input-group">
											<input type="text" name="departure" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Departure Date" data-validate="required" class="form-control" data-message-required=" " value="<?=isset($departure)?$departure:''?>">
											
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
											<input type="text" name="return" disabled id="return" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Return Date" value="<?=isset($return)?$return:''?>">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
</div>
						</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="col-md-4 col-sm-4 col-xs-12 white">Class </label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control" name="class">
									<option value="Economy" <?php if(!empty($class)){ if($class=='Economy'){ echo"selected";} } ?>>Economy</option>
									<option value="premiumEconomy" <?php if(!empty($class)){ if($class=='premiumEconomy'){ echo"selected";} } ?>>Premium Economy</option>
									<option value="Business" <?php if(!empty($class)){ if($class=='Business'){ echo"selected";} } ?>>Business</option>
									<option value="First" <?php if(!empty($class)){ if($class=='First'){ echo"selected";} } ?>>First</option>
								</select>
							</div>
						</div>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
<label class="col-md-4 col-sm-4 col-xs-12 white">Adults </label>
<div class="col-md-8 col-sm-8 col-xs-12">
<select required class="form-control" name="adults">
<option value="1" <?php if(!empty($adult)){ if($adult==1){ echo"selected";} } ?>>1</option>
<option value="2" <?php if(!empty($adult)){ if($adult==2){ echo"selected";} } ?>>2</option>
<option value="3" <?php if(!empty($adult)){ if($adult==3){ echo"selected";} } ?>>3</option>
<option value="4" <?php if(!empty($adult)){ if($adult==4){ echo"selected";} } ?>>4</option>
<option value="5" <?php if(!empty($adult)){ if($adult==5){ echo"selected";} } ?>>5</option>
<option value="6" <?php if(!empty($adult)){ if($adult==6){ echo"selected";} } ?>>6</option>
<option value="7" <?php if(!empty($adult)){ if($adult==7){ echo"selected";} } ?>>7</option>
<option value="8" <?php if(!empty($adult)){ if($adult==8){ echo"selected";} } ?>>8</option>

</select>
</div>
</div>
							</div>
						<button type="submit" style="width:100%;margin-top: 15px;" class="btn btn-success">Search</button>
							</div>
					</form>
				</div>
				</div>
			</div>	 
			<div class="col-md-8 col-sm-8 col-xs-12 ">
				
				<?php foreach ($flightFinalArray as $flightFinalArrays) { ?>
				
				<div class="row hotel_p">
					<div class="col-md-2 col-xs-12 col-sm-2">				
						<div class="airline">
							<img class="tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$flightFinalArrays['flight'][0]['Name']?>" src="<?=$flightFinalArrays ['flight'][0]['ImageUrl']?>">
						</div>
					</div>					
					<div class="col-md-2 col-xs-4 col-sm-2 right">					
						<span class="time"><?=$flightFinalArrays['Departure']?></span><br>					
						<span><?=$flightFinalArrays['OriginStation']['Name']?></span>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-4 conten">					
						<span><?=$flightFinalArrays['Duration']?></span>					
						<ul>						
							<li class="Stop_line"></li>					
						</ul>					
						<div>
							<span><?php if (is_array($flightFinalArrays['Stops'])) { echo $flightFinalArrays['Stops']['stopNo']; echo" "; 
																				 foreach ($flightFinalArrays['Stops']['stopName']
						as $stopName) {echo $stopName ['Name']; echo" "; echo $stopName['Code'];
									   echo" ";} } else{echo "Non Sotp";}
						?></span>
						</div>
					</div>					
					<div class="col-md-2 col-sm-2 col-xs-4">	
						<span class="time"><?=$flightFinalArrays['Arrival']?></span><br>
						<span><?=$flightFinalArrays['DestinationStation']['Name']?></span>
					</div>					
					<div class="col-md-3 col-xs-12 col-sm-2 air_linecontener">				
						<div class="conten">							
							<image class="image" src="<?=$flightFinalArrays['priceAndAgent'][0]['AgentsImage']?>"/>				
						</div>				
						<div class="airlineprice">							
								<span>Rs: <?=$flightFinalArrays['priceAndAgent'][0]['Price']?></span>							
						</div>				
						<div class="conten">
							<a target="_blank" href="<?=$flightFinalArrays['priceAndAgent'][0]['DeeplinkUrl']?>" class="btn btn-success">View Deals</a>
						</div>				
					</div>	
					
					<div class="col-md-12 col-xs-12 col-sm-12">						
						<div class="panel panel-default collapsed"><!-- Add class "collapsed" to minimize the panel -->							
							<div class="panel-options">								
								<a href="#" data-toggle="panel">
									<span class="btn btn-success collapse-icon">View More Deals</span>						 
								</a>								
							</div>												
						<div class="panel-body row1">
							<?php foreach ($flightFinalArrays['priceAndAgent'] as $priceAndAgent) { ?>
							
							<div class="col-md-5 col-xs-5 col-sm-5"><a class="conten1" target="_blank" href="<?=$priceAndAgent['DeeplinkUrl']?>"><?=$priceAndAgent['AgentsName']?></a></div>
							<div class="col-md-3 col-xs-0 col-sm-3"><small><image src="<?=$priceAndAgent['AgentsImage']?>"/></small></div>
							<div class="col-md-2 col-xs-4 col-sm-2"><span class="conten1">Rs: <?=$priceAndAgent['Price']?></span></div>
							<div class="col-md-2 col-xs-3 col-sm-2"><a target="_blank" href="<?=$priceAndAgent['DeeplinkUrl']?>" class="btn btn-success">View Deals</a></div>
							<?php } ?>							
						</div>
					</div>	<div class="clear"></div>				
				</div>
					<div class="clear"></div>
		
				</div>
				<?php } ?>
			</div>
	<div class="clear"></div>
		</div>
		<?php } else { ?>
		<div class="Mainflight">
		<div class="row">
		 
		<div class="col-md-2 col-sm-2 col-xs-12"></div>
		<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="flight1">
					<form method="get" onsubmit="return(checkfrom());return(checkto())" action="<?=base_url();?>Landingpage/Flights.html" class="validate form-horizontal form-label-left">
						<div class="white"style="padding-bottom: 25px;">
							<h2>Search Flights</h2>
						</div>
							  
						<div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="col-md-4 col-sm-4 col-xs-12 white">From</label>
             
                <div class="col-md-8 col-sm-8 col-xs-12">

                  <input type="text" id="from" list="fromdata" autocomplete="off" class="form-control" onchange="checkfrom()"  name="from" placeholder="City or Airport" data-validate="required" data-message-required="please enter City or Airport" value="<?=isset($from)?$from:''?>">
				  <span id="fromrequired" style="color:red" ></span>
				  <datalist id="fromdata"><option value="<?=isset($from)?$from:''?>"></datalist>

                </div>
							</div>
							</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
				  
				 <label class="col-md-4 col-sm-4 col-xs-12 white">To</label>
				                 <div class="col-md-8 col-sm-8 col-xs-12">

                 <input type="text" id="to" list="todata" class="form-control" autocomplete="off" onchange="checkto()" name="to" placeholder="City or Airport" data-validate="required" data-message-required="please enter City or Airport" value="<?=isset($to)?$to:''?>">
				 <span id="torequired" style="color:red" ></span>
				  <datalist id="todata"><option value="<?=isset($to)?$to:''?>"></datalist>
				 

                </div>
							</div>
              </div>
						
						
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
                
					<label class="col-md-4 col-sm-4 col-xs-12 white">Departure</label>
             
                
					<div class="col-md-8 col-sm-8 col-xs-12">
                
						<div class="input-group">
											
							<input type="text" name="departure" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Departure Date" data-validate="required" data-message-required=" " value="<?=isset($departure)?$departure:''?>">
											
											
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
											
										<input type="text" name="return" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Return Date" value="<?=isset($return)?$return:''?>">
											
											
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
									<option value="Economy" <?php if(!empty($class)){ if($class=='Economy'){ echo"selected";} } ?>>Economy</option>
									<option value="premiumEconomy" <?php if(!empty($class)){ if($class=='premiumEconomy'){ echo"selected";} } ?>>Premium Economy</option>
									<option value="Business" <?php if(!empty($class)){ if($class=='Business'){ echo"selected";} } ?>>Business</option>
									<option value="First" <?php if(!empty($class)){ if($class=='First'){ echo"selected";} } ?>>First</option>
								</select>
                </div>
							</div></div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
				 <label class="col-md-4 col-sm-4 col-xs-12 white">Adults</label>
				                 <div class="col-md-8 col-sm-8 col-xs-12">
                 <select class="form-control" name="adults">
<option value="1" <?php if(!empty($adult)){ if($adult==1){ echo"selected";} } ?>>1</option>
<option value="2" <?php if(!empty($adult)){ if($adult==2){ echo"selected";} } ?>>2</option>
<option value="3" <?php if(!empty($adult)){ if($adult==3){ echo"selected";} } ?>>3</option>
<option value="4" <?php if(!empty($adult)){ if($adult==4){ echo"selected";} } ?>>4</option>
<option value="5" <?php if(!empty($adult)){ if($adult==5){ echo"selected";} } ?>>5</option>
<option value="6" <?php if(!empty($adult)){ if($adult==6){ echo"selected";} } ?>>6</option>
<option value="7" <?php if(!empty($adult)){ if($adult==7){ echo"selected";} } ?>>7</option>
<option value="8" <?php if(!empty($adult)){ if($adult==8){ echo"selected";} } ?>>8</option>

</select>
                </div>
                </div>
						</div>
 


				
				 
              <button type="submit" style="width:100%;margin-top:20px;" class="btn btn-success">Search</button>
            	
					</form>
				</div>
			</div>
		<div class="col-md-2 col-sm-2 col-xs-12"></div>
			</div>
		</div>
		
<?php } ?>
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
				
				$(document).on('click', '.fromID', function() {
				alert(this.value);
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
			  alert('Please select a valid code from list');
			  // $("#fromrequired").html('Please select a valid code from list');
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
			alert('Please select a valid code from list');
			//$("#torequired").html('Please select a valid code from list');
			return false;
			}
			}
	
    </script>

