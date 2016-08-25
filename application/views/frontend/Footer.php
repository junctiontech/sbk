<div class="modal fade" id="modal-6">
	<div class="modal-dialog">
		<div class="modal-content">	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Notify Me</h4>
			</div>		
			<div class="modal-body">
				<div class="panel-body">
					<form role="form" class="validate form-horizontal" method="post" action="<?=base_url();?>Landingpage/notify">
						<div class="form-group">
							<strong>When a new deal arrives for the following CATEGORY:-</strong>						
							<?php if(!empty($usernotify)) {		
	if(!empty($usernotify[0]->categoryName)){ $notifycatename = explode(',', $usernotify[0]->categoryName);}
	if(!empty($usernotify[0]->store)){ $sotes = explode(',',$usernotify[0]->store);}
	if(!empty($usernotify[0]->percent)){ $percent =explode(',',$usernotify[0]->percent);}															  
} ?>		
							<p>		
								<label class="checkbox-inline">
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Electronics', $notifycatename); if($notifycatename[$keys]=='Electronics') echo 'checked'; }?> value="Electronics" >
									Electronics											
								</label>											
								<label class="checkbox-inline">											
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Apparels', $notifycatename); if($notifycatename[$keys]=='Apparels') echo 'checked'; }?> value="Apparels">
									Apparels										
								</label>										
								<label class="checkbox-inline">											
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Mobiles', $notifycatename); if($notifycatename[$keys]=='Mobiles') echo 'checked'; }?> value="Mobiles">
									Mobiles											
								</label>											
								<label class="checkbox-inline">											
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){$keys=array_search ('AirConditioners',$notifycatename);if($notifycatename[$keys]=='AirConditioners') echo 'checked'; }?> value="AirConditioners">
									Air Conditioners 											
								</label>										
								<label class="checkbox-inline">											
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Flights',$notifycatename); if($notifycatename[$keys]=='Flights') echo 'checked'; }?> value="Flights">
									Flights											
								</label>											
								<label class="checkbox-inline">											
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Hotels', $notifycatename); if($notifycatename[$keys]=='Hotels') echo 'checked'; }?>  value="Hotels">
									Hotels										
								</label>										
								<label class="checkbox-inline">											
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Health&Fitness', $notifycatename); if($notifycatename[$keys]=='Health&Fitness') echo 'checked'; }?> value="Health&Fitness">
									Health & Fitness										
								</label>										
								<label class="checkbox-inline">											
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Accessories', $notifycatename); if($notifycatename[$keys]=='Accessories') echo 'checked'; }?> value="Accessories">
									Accessories											
								</label>											
								<label class="checkbox-inline">											
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Laptops', $notifycatename); if($notifycatename[$keys]=='Laptops') echo 'checked'; }?> value="Laptops">
									Laptops										
								</label>										
								<label class="checkbox-inline">
									<input type="checkbox" name="category[]" <?php if(!empty($notifycatename)){ $keys=array_search ('Appliances', $notifycatename); if($notifycatename[$keys]=='Appliances') echo 'checked'; }?> value="Appliances">
									Appliances										
								</label>
							</p>	
						</div>	
						<div class="form-group-separator"></div>
						<div class="form-group">
							<strong>When a new deal arrives for the following STORE:-</strong>
							<p>	
								<label class="checkbox-inline">									
									<input type="checkbox" name="store[]" <?php if(!empty($sotes)){ $keys=array_search ('Amazon', $sotes); if($sotes[$keys]=='Amazon') echo 'checked'; }?> value="Amazon">
									Amazon									
								</label>									
								<label class="checkbox-inline">									
									<input type="checkbox" name="store[]" <?php if(!empty($sotes)){ $keys=array_search ('Flipkart', $sotes); if($sotes[$keys]=='Flipkart') echo 'checked'; }?> value="Flipkart">
									Flipkart										
								</label>										
								<label class="checkbox-inline">										
									<input type="checkbox" name="store[]" <?php if(!empty($sotes)){ $keys=array_search ('Snapdeal', $sotes); if($sotes[$keys]=='Snapdeal') echo 'checked'; }?> value="Snapdeal">
									Snapdeal										
								</label>										
								<label class="checkbox-inline">										
									<input type="checkbox" name="store[]" <?php if(!empty($sotes)){ $keys=array_search ('Makemytrip', $sotes); if($sotes[$keys]=='Makemytrip') echo 'checked'; }?> value="Makemytrip">
									Makemytrip 										
								</label>										
								<label class="checkbox-inline">										
									<input type="checkbox" name="store[]" <?php if(!empty($sotes)){ $keys=array_search ('Homeshop18', $sotes); if($sotes[$keys]=='Homeshop18') echo 'checked'; }?> value="Homeshop18">
									Homeshop18										
								</label>										
								<label class="checkbox-inline">											
									<input type="checkbox" name="store[]" <?php if(!empty($sotes)){ $keys=array_search ('ShopCJ', $sotes); if($sotes[$keys]=='ShopCJ') echo 'checked'; }?> value="ShopCJ">
									ShopCJ											
								</label>										
								<label class="checkbox-inline">											
									<input type="checkbox" name="store[]" <?php if(!empty($sotes)){ $keys=array_search ('Limeroad', $sotes); if($sotes[$keys]=='Limeroad') echo 'checked'; }?> value="Limeroad">
									Limeroad
								</label>	
							</p>	
						</div>								
						<div class="form-group-separator"></div>								
						<div class="form-group">	
							<strong>When a new deal arrives of the following %:-</strong>
							<p>										
								<label class="checkbox-inline">
									<input type="checkbox" name="percent[]" <?php if(!empty($percent)){ $keys=array_search ('10%OFF', $percent); if($percent[$keys]=='10%OFF') echo 'checked'; }?> value="10%OFF">
									10% OFF 										
								</label>										
								<label class="checkbox-inline">										
									<input type="checkbox" name="percent[]" <?php if(!empty($percent)){ $keys=array_search ('25%OFF', $percent); if($percent[$keys]=='25%OFF') echo 'checked'; }?> value="25%OFF">										
									25% OFF										
								</label>										
								<label class="checkbox-inline">										
									<input type="checkbox" name="percent[]" <?php if(!empty($percent)){ $keys=array_search ('40%OFF', $percent); if($percent[$keys]=='40%OFF') echo 'checked'; }?> value="40%OFF">											
									40% OFF 											
								</label>										
								<label class="checkbox-inline">
									<input type="checkbox" name="percent[]" <?php if(!empty($percent)){ $keys=array_search ('50%OFF', $percent); if($percent[$keys]=='50%OFF') echo 'checked'; }?> value="50%OFF">											
									50% OFF										
								</label>	 
							</p>	
						</div>								
						<div class="form-group-separator"></div>							
						<?php if (empty($userinfos)) { ?>							
						<div class="form-group">								
							<label class="col-md-2">Enter your email:</label>									
								
							<div class="col-md-4">
								<input type="email" class="form-control" name="email" placeholder="Enter your email" data-validate="required" data-message-required="Please Enter your email" />
							</div>								
						</div>							
						<?php } ?>								
						<div class="modal-footer">								
							<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>								
							<button type="submit" class="btn btn-success">Notify</button>							
						</div>	
					</form>	
				</div>				
			</div>				
		</div>			
	</div>	
</div>
<div class="footer">   	  
	<div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4 span_1_of_4w">					
					<!--<h4>Information</h4>-->						
					<ul class="marker_none">						
						<li><a href="<?=base_url();?>Landingpage/Aboutus.html"><span>About Us</span></a></li>					
						<!--<li><a href="javascript:;"><span>Services (coming soon)</span></a></li>						
<li><a href="javascript:;"><span>Advanced Search</span></a></li>
<li><a href="javascript:;"><span>Contact Us</span></a></li>-->
					</ul>				
			 </div>	
			 <div class="col_1_of_4 span_1_of_4 span_1_of_4w">
				 <!--<h4>My account</h4>-->
				 <ul class="marker_none"><li><a href="<?=base_url();?>Landingpage/Contactus.html"><span>Contact Us</span></a></li>
					 <!--	<?php if(!empty($userinfos)){ ?>
<li><a href="<?=base_url();?>User/Dashboard.html">Dashboard</a></li>
<li><a href="<?=base_url();?>User/Mywishlist.html">My Wishlist</a></li>
<?php }else{ ?>
<li><a href="<?=base_url();?>Login.html">Sign In</a></li>						
<li><a href="<?=base_url();?>Login.html">My Wishlist</a></li>							
<?php } ?>						
<li><a href="javascript:;">Help</a></li>-->						
				 </ul> 				
			 </div>				
			 <div class="col_1_of_4 span_1_of_4 social-icons">					
				 <!--<h4>Contact</h4>					
<ul class="marker_none">						
<li><span>8817507639</span></li>						
<li><span>9644201541</span></li>					
</ul>-->				
				 <!--	<div class="social-icons">				 			
<h4>Follow Us</h4>-->					   		
				 <ul>							
					 <a href="https://www.facebook.com/SEARCHB4KHARCH/" target="_blank"><li class="facebook"></li></a>							
					 <!--  <a href="javascript:;" target="_blank"> <li class="twitter"></li></a>-->							   
					 <a href="https://www.google.com/+Searchb4kharch" target="_blank"><li class="googleplus"> </li></a>							     
					 <!--<a href="javascript:;" target="_blank">									
						 <li class="contact tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="info@searchb4kharch.com" ></li>
					 </a>   -->
					 <div class="clear"></div>						
				 </ul>   	 					
				 <!--</div>-->	
			 </div>	
			 <!-- <div class="col_1_of_4 span_1_of_4">
<h4>Language</h4>- 						
<ul>							
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
</ul>		
</div>-->
			 <div class="copy_right">			
				 <p>Searchb4kharch © All rights Reserved | Design by  <a target="_blank" href="http://junctiontech.in">Junctiontech</a> </p>		  
			 </div>    
		</div>   
	</div> 
</div>
<a href="javascript:;" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>   
<link href="<?=base_url();?>frontend/css/flexslider.css" rel='stylesheet' type='text/css' />			
<script defer src="<?=base_url();?>frontend/js/jquery.flexslider.js"></script>				
<script type="text/javascript">	
	$(window).load(function(){						
		$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
				$('body').removeClass('loading');							
			}							
		});						
	});				
	$(document).ready(function () {						
		$('.datepicker').datepicker({						
			format: "yyyy-mm-dd",							
			autoclose: true,							
			startDate: new Date()							
		});					
	});					
</script>						
<script>
	$(document).ready(function(){
		$(document).on('keyup', '#search', function() {	
			var placekey =this.value;
			if(placekey !=='')
			{
				$.ajax({
					type: "POST",				
					url: base_url+"Landingpage/getautosuggestproduct",				
					data:{placekey:placekey},
					cache: false,
					success: function(html)
					{ 
						$("#searchdata").html('');					
						$("#searchdata").html(html);					
					}				
				});			
			}	
			return false; 
		});	
	});  
</script>							
<script src="<?=base_url();?>frontend/js/sb4k.js"></script>						
<script src="<?=base_url();?>frontend/js/Filter_product.js"></script>						
<!--	<script  src="<?=base_url();?>admin/js/moment.min2.js"></script>-->						
<!--<script  src="<?=base_url();?>frontend/js/datepicker/bootstrap-datepicker.js"></script>-->						
<link rel="stylesheet" href="<?=base_url();?>frontend/js/daterangepicker/daterangepicker-bs3.css">						
<link rel="stylesheet" href="<?=base_url();?>frontend/js/select2/select2.css">						
<link rel="stylesheet" href="<?=base_url();?>frontend/js/select2/select2-bootstrap.css">							
<link rel="stylesheet" href="<?=base_url();?>frontend/js/multiselect/css/multi-select.css">						
<!-- Imported scripts on this page daterangepicker-->						
<script src="<?=base_url();?>frontend/js/daterangepicker/daterangepicker.js"></script>							
<script src="<?=base_url();?>frontend/js/datepicker/bootstrap-datepicker.js"></script>						
<!--<script src="<?=base_url();?>frontend/js/timepicker/bootstrap-timepicker.min.js"></script>						
<script src="<?=base_url();?>frontend/js/colorpicker/bootstrap-colorpicker.min.js"></script>-->								
<script src="<?=base_url();?>frontend/js/select2/select2.min.js"></script>							
<!--<script src="<?=base_url();?>frontend/js/jquery-ui/jquery-ui.min.js"></script>							
<script src="<?=base_url();?>frontend/js/selectboxit/jquery.selectBoxIt.min.js"></script>  							
<script src="<?=base_url();?>frontend/js/tagsinput/bootstrap-tagsinput.min.js"></script> 							
<script src="<?=base_url();?>frontend/js/typeahead.bundle.js"></script>							
<script src="<?=base_url();?>frontend/js/handlebars.min.js"></script>-->							
<script src="<?=base_url();?>frontend/js/multiselect/js/jquery.multi-select.js"></script>
<script src="<?=base_url();?>frontend/js/jquery-validate/jquery.validate.min.js"></script>
<script src="<?=base_url();?>frontend/js/bootstrap.min.js"></script>							
<script src="<?=base_url();?>frontend/js/TweenMax.min.js"></script>							
<script src="<?=base_url();?>frontend/js/resizeable.js"></script>							
<script src="<?=base_url();?>frontend/js/joinable.js"></script>							
<script src="<?=base_url();?>frontend/js/xenon-api.js"></script>							
<script src="<?=base_url();?>frontend/js/xenon-toggles.js"></script>							
<!-- JavaScripts initializations and stuff -->							
<script src="<?=base_url();?>frontend/js/xenon-custom.js"></script>
</body>

</html>
