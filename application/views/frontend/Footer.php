<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul class="marker_none">
						<li><a href="javascript:;">About Us</a></li>
						<li><a href="javascript:;"><span>Services (coming soon)</span></a></li>
						<li><a href="javascript:;"><span>Advanced Search</span></a></li>						
						<li><a href="javascript:;"><span>Contact Us</span></a></li>
						</ul>
					</div>
				
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul class="marker_none">
							<?php if(!empty($userinfos)){ ?>
							<li><a href="<?=base_url();?>User/Dashboard.html">Dashboard</a></li>
							<li><a href="<?=base_url();?>User/Mywishlist.html">My Wishlist</a></li>
							<?php }else{ ?>
							<li><a href="<?=base_url();?>Login.html">Sign In</a></li>
							<li><a href="<?=base_url();?>Login.html">My Wishlist</a></li>
								<?php } ?>
							<li><a href="javascript:;">Help</a></li>
						</ul> 
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul class="marker_none">
							<li><span>8817507639</span></li>
							<li><span>9644201541</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="javascript:;" target="_blank"> </a></li>
							      <li class="twitter"><a href="javascript:;" target="_blank"> </a></li>
							      <li class="googleplus"><a href="javascript:;" target="_blank"> </a></li>
							      <li class="contact"><a href="javascript:;" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
						
				</div>
				<!-- <div class="col_1_of_4 span_1_of_4">
					<h4>Visitor Counter</h4>
						<ul class="marker_none">
							<li><span><img border="0" src="http://cc.amazingcounters.com/counter.php?i=3204024&c=9612385" alt="searchb4kharch.com"></span></li>
							<!--<li><span><img src="http://hitwebcounter.com/counter/counter.php?page=6417236&style=0006&nbdigits=9&type=ip&initCount=100000" title="www.hitwebcounter.com" Alt="searchb4kharch.com"   border="0" ></span></li>
							<li><span><img src="http://www.e-zeeinternet.com/count.php?page=1148951&style=links&nbdigits=9" alt="searchb4kharch.com" border="0" ></span></li>
					 </ul>
						
						
				</div> -->
				<div class="col_1_of_4 span_1_of_4">
					<h4>Language</h4>
						<ul>
							<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
						</ul>
						
						
				</div>
			</div>
			<div class="copy_right">
				<p>Searchb4kharch © All rights Reseverd | Design by  <a target="_blank" href="http://junctiontech.in">Junctiontech</a> </p>
				<!-- SmallSeoTools Code START 
				<a href="http://smallseotools.com/visitor-hit-counter/" target="_blank" title="Web Counter">
				<img src="http://smallseotools.com/counterDisplay?code=&style=0001&pad=9&type=page&initCount=1"  title="Web Counter" Alt="Web Counter" border="0">
				</a>
				<!-- SmallSeoTools Code END -->

				<!-- hitwebcounter Code START 
				<a href="http://www.hitwebcounter.com" target="_blank">
				<img src="http://hitwebcounter.com/counter/counter.php?page=6417236&style=0006&nbdigits=9&type=ip&initCount=100000" title="www.hitwebcounter.com" Alt="www.hitwebcounter.com"   border="0" >
				</a>                                        <br/>
				<!-- hitwebcounter.com <a href="http://www.hitwebcounter.com" title="This Website Visits" 
														target="_blank" style="font-family: Geneva, Arial, Helvetica; 
														font-size: 9px; color: #76766B; text-decoration: none ;"><strong>This Website Visits                                        </strong>
														</a>   -->
                            
							
				<!-- Counter Code START <a href="http://www.e-zeeinternet.com/" target="_blank"><img src="http://www.e-zeeinternet.com/count.php?page=1148951&style=links&nbdigits=9" alt="Web Counter" border="0" ></a><br><a href="http://www.e-zeeinternet.com/" title="Web Counter" target="_blank" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 10px; color: #000000; text-decoration: none;">Web Counter</a><!-- Counter Code END -->
							
				<!--<div align="center"><a href="http://www.amazingcounters.com"><img border="0" src="http://cc.amazingcounters.com/counter.php?i=3204024&c=9612385" alt="AmazingCounters.com"></a></div>-->
				
		 	<script>
  /* (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79002684-1', 'auto');
  ga('send', 'pageview');
 */
</script>
		   </div>
     </div>
    </div>
  <!--  <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script> -->
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
							  </script>
							   <script src="<?=base_url();?>frontend/js/sb4k.js"></script>
								<script src="<?=base_url();?>frontend/js/Filter_product.js"></script>
							<!--	<script  src="<?=base_url();?>admin/js/moment.min2.js"></script>-->
								<!--<script  src="<?=base_url();?>frontend/js/datepicker/bootstrap-datepicker.js"></script>-->
								<link rel="stylesheet" href="<?=base_url();?>frontend/js/daterangepicker/daterangepicker-bs3.css">
								<link rel="stylesheet" href="<?=base_url();?>frontend/js/select2/select2.css">
								<link rel="stylesheet" href="<?=base_url();?>frontend/js/select2/select2-bootstrap.css">
								<link rel="stylesheet" href="<?=base_url();?>frontend/js/multiselect/css/multi-select.css">
							<!-- Imported scripts on this page -->
								<script src="<?=base_url();?>frontend/js/daterangepicker/daterangepicker.js"></script>
								<script src="<?=base_url();?>frontend/js/datepicker/bootstrap-datepicker.js"></script>
								<script src="<?=base_url();?>frontend/js/timepicker/bootstrap-timepicker.min.js"></script>
								<script src="<?=base_url();?>frontend/js/colorpicker/bootstrap-colorpicker.min.js"></script>
								<script src="<?=base_url();?>frontend/js/select2/select2.min.js"></script>
								<script src="<?=base_url();?>frontend/js/jquery-ui/jquery-ui.min.js"></script>
								<script src="<?=base_url();?>frontend/js/selectboxit/jquery.selectBoxIt.min.js"></script>
 								<script src="<?=base_url();?>frontend/js/tagsinput/bootstrap-tagsinput.min.js"></script>
 								<script src="<?=base_url();?>frontend/js/typeahead.bundle.js"></script>
								<script src="<?=base_url();?>frontend/js/handlebars.min.js"></script>

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
