<div class="page-container">
	<div class="main-content">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" id="form1" method="post" class="form-horizontal form-label-left">						
							<div class="form-group">
								<div class="col-md-3 col-sm-3 col-xs-2 decoration"></div>
								<div class="col-md-6 col-sm-6 col-xs-8 contact">
									<label>HOW SHALL WE CALL YOU </label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-2 decoration"></div>								
								<input type="text" class="form-control" name="name" placeholder="Type your name here." />						
							</div>						
							<div class="form-group">							
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>						
								<div class="col-md-4 col-sm-4 col-xs-6 contact"  >						
									<label>SHARE YOUR EMAIL</label>						
								</div>							
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>							
								<input type="text" class="form-control" name="email" placeholder="We will keep if Safe. We promise!" />						
							</div>
							<div class="form-group">
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>
								<div class="col-md-4 col-sm-4 col-xs-6 contact"  >
									<label>WE'RE ALL EARS!</label>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>
								<textarea class="form-control" style="height: 200px;" placeholder="Share with us any information that might help us to respond to your request."></textarea>
							</div>
							<div class="form-group">
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>
								<div class="col-md-4 col-sm-4 col-xs-6 contact">
									<button type="submit" class="btn btn-success">Send massage</button>	
								</div>
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div></div>
						</form>
					</div>
				</div>
			</div>		 
			<div class="col-md-6 col-sm-6 col-xs-12"> 
				<div class="panel panel-default">				
					 				
					<div class="panel-body">
					
				<div id="googleMap" style="width:85%;height:350px;border-radius: 50%;left:40px"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
  <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFsE-tTxY9qgQfwQz_kvuGRn6F3Z1Q94U&callback=initMap"
  type="text/javascript"></script>-->

<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFsE-tTxY9qgQfwQz_kvuGRn6F3Z1Q94U&callback=initMap">
</script>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(23.1828376,77.4540313),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</script>
 