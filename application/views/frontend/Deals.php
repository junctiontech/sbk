
<div class="page-container">
	<div class="sidebar-menu toggle-others fixed">
		<div class="sidebar-menu-inner">
        
			<div class="col-xs-0">
		    <div class="to_do black">		
					<div style="font-weight: bold; padding: 10px;">Top Deals</div>
                        <?php if(!empty($dealsgategorys)){ ?>
							<ul id="main-menu" class="main-menu">
<?php	foreach($dealsgategorys as $dealsgategory){?>
						<li>
                            <a href="<?=base_url();?>Landingpage/Deals/<?=str_replace(' ','_',$dealsgategory->category)?>.html"><?=ucwords($dealsgategory->category)?></a>
                   <li>
						<?php } ?>
</ul>
<?php } ?>                                        
			</div>
			</div>
		 
		</div>
		 
	</div>
	<div class="delas_hedden">
		<div class="panel panel-default collapsed"><!-- Add class "collapsed" to minimize the panel -->							
							<div class="panel-options">								
								<a href="#" data-toggle="panel">
									<span class="btn btn-success collapse-icon">Top Deals</span>						 
								</a>								
							</div>												
						<div class="panel-body colspandeal row1">
							<div class="scrollable ps-container ps-active-y">
									<?php if(!empty($dealsgategorys)){foreach($dealsgategorys as $dealsgategory){?>
						<div class="deal_htr">
                            <a href="<?=base_url();?>Landingpage/Deals/<?=str_replace(' ','_',$dealsgategory->category)?>.html"><?=ucwords($dealsgategory->category)?></a>
                    </div>
						<?php } } ?>  		
						</div>
			</div>
					</div>	<div class="clear"></div>	
			</div>
	<div class="main-content">
	<div class="page-loading-overlay">
				<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
			</div>
	<div class="col-md-10 col-sm-10 col-xs-12 pageno-fixed">
			 
				<div class="page-no" style="margin-top:0%">
    			<?php if (!empty($totalresult)) { ?>
					<p>Total Result:<?php echo isset($totalresult)?$totalresult:'';?> </p><p>Result Pages:<?php echo isset($pagination)?$pagination:'';?></p>
    			<?php } ?>
				</div>
      
			</div>		
		
			
		<div class="col-md-12 col-sm-12 col-xs-12" style=margin-top:2%;>
		 <?php if(!empty($dealsdata))
					
				{ foreach($dealsdata as $deal){?>
				<div class="grid_1_of_4 deal_1_of_3">
					<div><img src="<?=$deal->url;?>" alt="" /> </div>
					 <p class="deal"><?=$deal->offer_name;?>+<?=$deal->coupon_description;?>+<?=$deal->coupon_title;?></p>
					 <p class="deal_coupon"><a onclick="window.open('<?=$deal->link;?>','_blank');" href="javascript:;">View More</a></p>							 
					 <p class="deal_coupon">Coupn Code : <?=$deal->coupon_code;?></p>
					<div class="deal_coupon"><small>Coupon Expiry : <?=$deal->coupon_expiry;?></small><Small>added : <?=$deal->added;?></small></div>
					<div class="btn btn-round btn-success deal"><span><a onclick="window.open('<?=$deal->link;?>','_blank');"  href="javascript:;" class="">Get Deal</a></span></div>
				</div>	
			
		  <?php } } else { ?>
		  <div class="clear"></div>
			 <div class="col-md-6 col-sm-6 col-xs-12">
		   <!-- FlexSlider -->
              <section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					
					<?php //if(!empty($deals)){ foreach($deals as $deal){ 
					$i1=''; for($start1=0;$start1<=15;$start1++){ ?>
						<li >
							<div id="vcm1950NUgewdp<?=$i1?>"></div>
							<script src="http://tracking.vcommission.com/aff_ad?campaign_id=1950&aff_id=48478&format=javascript&format=js&divid=vcm1950NUgewdp<?=$i1?>" type="text/javascript"></script>
							<noscript><iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=1950&aaaff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="300" height="250"></iframe></noscript>
						</li>
					<?php // } } 
					$i1++; } ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
			 <div class="col-md-6 col-sm-6 col-xs-12">
		   <!-- FlexSlider Secound -->
              <section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					
					<?php //if(!empty($deals)){ foreach($deals as $deal){ 
					$i=''; for($start=0;$start<=15;$start++){ ?>
						<li >
							<div id="vcm1950NUgewd<?=$i?>"></div>
							<script src="http://tracking.vcommission.com/aff_ad?campaign_id=01950&aff_id=48478&format=javascript&format=js&divid=vcm1950NUgewd<?=$i?>" type="text/javascript"></script>
							<noscript><iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=1950&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="300" height="250"></iframe></noscript>
						</li>
					<?php // } } 
					$i++; } ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>		

 
		  <?php }?>
		
		
		
		</div>
	</div>
</div><div class="clear"></div>

<script type="text/javascript">
								
								$(window).load(function(){
								  $('.flexslider1').flexslider({
									animation: "slide1",
									start: function(slider1){
									  $('body').removeClass('loading');
									}
								  });
								});
							  </script>