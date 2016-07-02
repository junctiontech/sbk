<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="javascript:;">About Us</a></li>
						<li><a href="javascript:;"><span>Services (coming soon)</span></a></li>
						<li><a href="javascript:;"><span>Advanced Search</span></a></li>						
						<li><a href="javascript:;"><span>Contact Us</span></a></li>
						</ul>
					</div>
				
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
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
						<ul>
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
				<div class="col_1_of_4 span_1_of_4">
					<h4>Visitor Counter</h4>
						<ul>
							<li><span><img border="0" src="http://cc.amazingcounters.com/counter.php?i=3204024&c=9612385" alt="searchb4kharch.com"></span></li>
							
						</ul>
						
						
				</div>
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
				
				<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79002684-1', 'auto');
  ga('send', 'pageview');

</script>
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
							  
							    <script src="<?=base_url();?>frontend/js/sb4k.js"></script>
								<script src="<?=base_url();?>frontend/js/Filter_product.js"></script>
								<script  src="<?=base_url();?>admin/js/moment.min2.js"></script>
								<script  src="<?=base_url();?>admin/js/datepicker/daterangepicker.js"></script>
								<script src="<?=base_url();?>admin/js/select/select2.full.js"></script>
</body>
</html>
