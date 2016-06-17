<div class="Deal_filter">				
    <div class="to_do">		
					<div style="font-weight: bold; padding: 10px;">Top Deals</div>
                        <?php if(!empty($dealsgategorys)){foreach($dealsgategorys as $dealsgategory){?>
						<div class="deal_htr">
                            <a href="<?=base_url();?>Landingpage/Deals/<?=str_replace(' ','_',$dealsgategory->category)?>.html"><?=ucwords($dealsgategory->category)?></a>
                        </div>
						<?php } } ?>                                        
     </div>  
                                         
            </div>
<div class="Deal_panel">
<div class="clear"></div>	 
	<!--<a href="http://tracking.vcommission.com/aff_c?offer_id=232&aff_id=48478&file_id=94922" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/232/Nykaa_Upto30OffMenStore_160x600.jpg" width="200" height="900" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=232&file_id=94922&aff_id=48478" width="1" height="1" /><div class="product_panel">			
		-->   
		   <?php if(!empty($dealsdata)){ foreach($dealsdata as $deal){?>
				<div class="grid_1_of_4 deal_1_of_3">
					<div><img src="<?=$deal->url;?>" alt="" /> </div>
					 <p class="deal"><?=$deal->offer_name;?>+<?=$deal->coupon_description;?>+<?=$deal->coupon_title;?></p>
					 <p class="deal_coupon"><a onclick="window.open('<?=$deal->link;?>','_blank');" href="javascript:;">View More</a></p>							 
					 <p class="deal_coupon">Coupn Code : <?=$deal->coupon_code;?></p>
					<div class="deal_coupon"><small>Coupon Expiry : <?=$deal->coupon_expiry;?></small>    <Small>added : <?=$deal->added;?></small></div>
					<div class="btn btn-round btn-success deal"><span><a onclick="window.open('<?=$deal->link;?>','_blank');"  href="javascript:;" class="">Get Deal</a></span></div>
				</div>			
		  <?php } } else { ?>
<div class="Deal_panel">	 
		   <!-- FlexSlider -->
              <section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					
					<?php if(!empty($deals)){ foreach($deals as $deal){ ?>
						<li>
						<div class="listview_1_of_2 images_1_of_2" style="
    width: 765px;
    float: right;
    display: block;
">
						 <a href="<?=$deal->link?>" target="_blank">
					<div class="listimg listimg_2_of_1">
						 <img src="<?=$deal->url?>" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h2><?=$deal->offer_name?></h2>
						  <p><h2><?=$deal->coupon_code?></h2></br>
						  <?=$deal->coupon_title?></p>
					</div>
					</a>
					</div>
				</li>
					<?php } } ?>	
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>

		  <?php }?>
			</div>	
<div class="clear"></div>

<a href="http://tracking.vcommission.com/aff_c?offer_id=232&aff_id=48478&file_id=93978" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/232/Nykaa_Upto40Off_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=232&file_id=93978&aff_id=48478" width="1" height="1" />




<!-- <a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=95080" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_Upto40PLUSExtra30OffOnPurchaseOfRs1299_160x600.jpg" width="160" height="600" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=95080&aff_id=48478&url_id=2442" width="1" height="1" />
		 -->
