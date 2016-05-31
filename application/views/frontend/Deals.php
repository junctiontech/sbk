<div class="col-sm-12 col-md-12 col-xs-12 form_content">
<div class="clear"></div>	 
	<a href="http://tracking.vcommission.com/aff_c?offer_id=232&aff_id=48478&file_id=94922" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/232/Nykaa_Upto30OffMenStore_160x600.jpg" width="200" height="900" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=232&file_id=94922&aff_id=48478" width="1" height="1" /><div class="product_panel">			
		   <?php if(!empty($dealsdata)){ foreach($dealsdata as $deal){?>
				<div class="grid_1_of_4 deal_1_of_3">
					<div><img src="<?=$deal->url;?>" alt="" /> </div>
					 <p class="deal"><?=$deal->offer_name;?>+<?=$deal->coupon_description;?>+<?=$deal->coupon_title;?></p>
					 <p class="deal_coupon"><a onclick="window.open('<?=$deal->link;?>','_blank');" href="javascript:;">View More</a></p>							 
					 <p class="deal_coupon">Coupn Code : <?=$deal->coupon_code;?></p>
					<div class="deal_coupon"><small>Coupon Expiry : <?=$deal->coupon_expiry;?></small>    <Small>added : <?=$deal->added;?></small></div>
					<div class="btn btn-round btn-success deal"><span><a onclick="window.open('<?=$deal->link;?>','_blank');"  href="javascript:;" class="">Get Deal</a></span></div>
				</div>			
		  <?php } }else{ echo"No Deal Found!!";}?>
			</div></div>	
<div class="clear"></div>

<a href="http://tracking.vcommission.com/aff_c?offer_id=232&aff_id=48478&file_id=93978" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/232/Nykaa_Upto40Off_468x60.jpg" width="1500" height="90" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=232&file_id=93978&aff_id=48478" width="1" height="1" />