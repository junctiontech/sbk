<div class="page-container">	
	<div class="main-content">
		<div class="page-loading-overlay">	
			<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-xs-12 form_content ">
				<!-- Alert section For Message-->
				<?php  if($this->session->flashdata('message_type')=='success') {  ?>
				<div class="alert alert-success alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>               
					<strong><?=$this->session->flashdata('message')?></strong>  </div>		
				<?php } if($this->session->flashdata('message_type')=='error') { ?>		
				<div class="alert alert-danger alert-dismissible fade in" role="alert">               
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>               
					<strong><?=$this->session->flashdata('message')?></strong>  </div>
				<?php } if($this->session->flashdata('category_error_login')) { ?>
				<div class="row" >
					<div class="alert alert-danger" >
						<strong><?=$this->session->flashdata('category_error_login')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
					</div>
				</div>
				<?php }?>
				<!-- Alert section End-->
			</div>
		</div>
		<div class="row">			
			<div class="col-md-6 col-sm-6 col-xs-12">				
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" id="form1" method="post" action="<?=base_url();?>/Landingpage/contactus_mail" class="validate form-horizontal form-label-left">						
							<div class="form-group">
								<div class="col-md-3 col-sm-3 col-xs-2 decoration"></div>
								<div class="col-md-6 col-sm-6 col-xs-8 contact">
									<label>HOW SHALL WE CALL YOU </label>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-2 decoration"></div>								
								<input type="text" class="form-control" name="name" data-validate="required" data-message-required="Please Type your name" placeholder="Type your name here." />						
							</div>						
							<div class="form-group">							
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>						
								<div class="col-md-4 col-sm-4 col-xs-6 contact"  >						
									<label>SHARE YOUR EMAIL</label>						
								</div>							
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>							
								<input type="text" class="form-control" name="email" data-validate="required" data-message-required="Please Type your email" placeholder="We will keep if Safe. We promise!" />						
							</div>
							<div class="form-group">
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>
								<div class="col-md-4 col-sm-4 col-xs-6 contact"  >
									<label>WE'RE ALL EARS!</label>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>
								<textarea class="form-control" style="height: 230px;" data-validate="required" data-message-required="Please Type your information" name="sharetaxt" placeholder="Share with us any information that might help us to respond to your request."></textarea>
							</div>
							<div class="form-group">
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div>
								<div class="col-md-4 col-sm-4 col-xs-6 contact">
									<button type="submit" class="btn btn-success">Send Message</button>	
								</div>
								<div class="col-md-4 col-sm-4 col-xs-3 decoration"></div></div>
						</form>
					</div>
				</div>
			</div>		 
			<div class="col-md-6 col-sm-6 col-xs-12"> 
				<div class="panel panel-default">
					<div class="panel-body form-group">
						 <div id="googleMap" class="map"></div>
						<div class="panel-heading"  style="border-bottom: 1px solid #1a1717;">							
							<div class="panel-title">							
								GET IN TOUCH TO GET THE BALL TOLLIBNG 						
							</div>												
						</div>	
						<p style="border-bottom: 2px dotted #cc1c1c;margin: 7px;"></p>
						<p>
							Got an awesome idea? for a FREE proposal and analysis of your needs, please shot us an email at <b style="color:red;">info@searchb4kharch.com.</b> We'll contact you shortly!
						</p>
						<p style="border-bottom: 2px dotted #cc1c1c;margin: 7px;"></p>
						<div class="col-md-6 col-sm-6">
							<div class="fa-hover">
								<img src="<?=base_url();?>frontend/images/map-marker-icon.png"/> <span><b>Code quest</b><p class="contactadd">Kotra Sultanbad Rd, Bhopal, Madhya Pradesh 462003</p></span>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">						
							<div class="   ">
								<img src="<?=base_url();?>frontend/images/tellyphone.png"/><span>9753573686</span>
							</div>							
							<div class=" ">
								<img style="margin-left: 5px;" src="<?=base_url();?>frontend/images/massege.png"/><span style="margin-left: 6px;">info@searchb4kharch.com</span>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div><div class="clear"></div>
	</div>	
</div>
<div class="clear"></div>  
<script
		src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFsE-tTxY9qgQfwQz_kvuGRn6F3Z1Q94U&callback=initMap">
</script>
<script>
function initialize() {	
	 var myLatLng = {lat:23.2197853, lng:77.3883894};
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 15,
          center: myLatLng
        });
        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });	
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>