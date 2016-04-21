<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="javascript:;">About Us</a></li>
						<li><a href="javascript:;">Customer Service</a></li>
						<li><a href="javascript:;"><span>Advanced Search</span></a></li>
						<li><a href="javascript:;">Orders and Returns</a></li>
						<li><a href="javascript:;"><span>Contact Us</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="javascript:;">About Us</a></li>
						<li><a href="javascript:;">Customer Service</a></li>
						<li><a href="javascript:;">Privacy Policy</a></li>
						<li><a href="javascript:;"><span>Site Map</span></a></li>
						<li><a href="javascript:;"><span>Search Terms</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="javascript:;">Sign In</a></li>
							<li><a href="javascript:;">View Cart</a></li>
							<li><a href="javascript:;">My Wishlist</a></li>
							<li><a href="javascript:;">Track My Order</a></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>8817507639</span></li>
							<li><span>8817507639</span></li>
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
			</div>
			<div class="copy_right">
				<p>Searchb4kharch © All rights Reseverd | Design by  <a target="_blank" href="http://junctiontech.in">Junctiontech</a> </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
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
	</script>
    <a href="javascript:;" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="<?=base_url();?>frontend/css/flexslider.css" rel='stylesheet' type='text/css' />
							  <script defer src="<?=base_url();?>frontend/js/jquery.flexslider.js"></script>
							  <script type="text/javascript">
								$(function(){
								  SyntaxHighlighter.all();
								});
								$(window).load(function(){
								  $('.flexslider').flexslider({
									animation: "slide",
									start: function(slider){
									  $('body').removeClass('loading');
									}
								  });
								});
							  </script>
</body>
</html>