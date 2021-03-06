<div class="page-container">	
	<div class="sidebar-menu toggle-others fixed">
		<div class="sidebar-menu-inner">       
			<div class="leftmargin col-xs-0">			
				<?php if(!empty($filters)) { ?>
				<p>Refine Your Search</p> 
				<hr>
				<?php if(!empty($filters)){  foreach($filters as $filter){ ?>
				<div class="Price">
					<p><?=isset($filter->groupName)?$filter->groupName:''?></p>
				</div>
				<?php if($filter->filterGroupID){
	$filteratt=$this->Landingpage_model->get_grpatt($filter->filterGroupID);
	if($filteratt){ 
				?>
				<div class="checkbox chk">
					<?php foreach($filteratt as $filteratts){ ?>
					<label>
						<input type="hidden" onchange="Filter_product(this.value)" id="categoriesID" value="<?=isset($filter->categoriesID)?$filter->categoriesID:''?>">
						<input onchange="Filter_product(this.value)" class="count" type="checkbox" value="<?=isset($filteratts->name)?$filteratts->name:''?>-<?=isset($filteratts->value)?$filteratts->value:''?>">
						<?=isset($filteratts->lable)?$filteratts->lable:''?>
					</label>
					<?php } ?>
				</div>
				<?php }}else{ ?>
				<p>No Attribute Define For This Filter</p>
				<?php } ?>
				<hr>
				<?php } }else{ ?>
				<p>No Filter Found For This Category</p>
				<?php } ?>
				<?php } else { ?>
				<div style="font-weight: bold; padding: 10px;">Refine Your Search</div>			
				<ul id="main-menu" class="main-menu">
				 <?php foreach($categories as $category){?>  					
					<li>
						<a href="<?=base_url();?>Landingpage/Product/<?=$category->categoriesUrlKey?>.html"><?=ucwords($category->categoryName)?></a> 						
					<li>
				<?php } } ?>
				 </ul>
			</div>				
		</div>
	</div>
	<div class="main-content"> 
		<div class="page-loading-overlay">
			<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
		</div>
		<div class="row">
			<div class="col-md-10 col-sm-10 col-xs-12 pageno-fixed">
			<p><a href="<?=base_url();?>">Home</a> >> <?=isset($categorykey)?$categorykey:''?> </p>
				<div class="page-no">    			
					<p>Total Result:<?php echo isset($totalresult)?$totalresult:'';?> </p><?php if(!empty($pagination)) { ?><p>Result Pages:<?php echo isset($pagination)?$pagination:'';?></p><?php } ?>    		
				</div>      
			</div>			
		</div>		
		<div class="clear"></div>
		<div class="row">
			<div style="display:none;" class="col-xs-12 filter">
				<div class="panel panel-default collapsed"><!-- Add class "collapsed" to minimize the panel -->	
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="btn btn-success collapse-icon">Refine Your Search</span>
						</a>
					</div>	
					<div class="panel-body">	
					<?php if(!empty($filters)){ ?>
						<p>Refine Your Search</p> 				
						<hr>				
						<?php if(!empty($filters)){  foreach($filters as $filter){ ?>
						<div class="Price">					
							<p><?=isset($filter->groupName)?$filter->groupName:''?></p>
						</div>				
						<?php if($filter->filterGroupID){
	$filteratt=$this->Landingpage_model->get_grpatt($filter->filterGroupID);if($filteratt){ ?>
						<div class="checkbox chk">					
							<?php foreach($filteratt as $filteratts){ ?>					
							<label>						
								<input type="hidden" onchange="Filter_product(this.value)" id="categoriesID" value="<?=isset($filter->categoriesID)?$filter->categoriesID:''?>">						
								<input onchange="Filter_product(this.value)" class="count" type="checkbox" value="<?=isset($filteratts->name)?$filteratts->name:''?>-<?=isset($filteratts->value)?$filteratts->value:''?>">						
								<?=isset($filteratts->lable)?$filteratts->lable:''?>				
							</label>				
							<?php } ?>				
						</div>				
						<?php }}else{ ?>				
						<p>No Attribute Define For This Filter</p>				
						<?php } ?>				
						<hr>				
						<?php } }else{ ?>				
						<p>No Filter Found For This Category</p>				
						<?php } ?>	
				<?php } else { ?>						 		
				<ul id="main-menu" class="main-menu" style="margin-top:-7%;">
				 <?php foreach($categories as $category){?>  					
					<li>
						<a href="<?=base_url();?>Landingpage/Product/<?=$category->categoriesUrlKey?>.html"><?=ucwords($category->categoryName)?></a> 						
					<li>
				<?php } } ?>
				 </ul>
						
						</div>
					</div>	<div class="clear"></div>				
				</div>	
			<div class="col-md-10 col-sm-10 col-xs-12" style="margin-top: 2%;" id="mySelect">        
				<?php if(!empty($products)){ foreach($products as $product){ ?>
		         <div class="grid_1_of_4 images_1_of_4">
				 <a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?php if($product->productsUrlKey){ echo$product->productsUrlKey; }else{ echo'new'; } ?>.html">
				<div class="imageheightfix">	
					<img src="<?=$product->imageName?>" alt="" />		
					 </div>				
					 <h2><?=$product->productName?><?=isset($product->attr)?$product->attr:''?></h2>        
					 <p><span class="price">			
						 <?php if($product->productPrice && $product->productPrice !=0){?>Rs.            
						 <?=number_format($product->productPrice,2)?><?php }else{ echo"coming soon"; }?>           
						 </span><br>			
						 <img style="height:30px" src="<?=base_url();?>frontend/images/<?=$product->shop_image?>">			
					 </p> 					
					 </a>
					 <div class="checkbox">         
						 <label>            
							 <input type="checkbox" value="<?=$product->productsID?>" class="chkcount" name="productid" onchange="compare_product(this.value)">            
							 Compare </label>			
						 <label class="wishlist"> 			
							 <?php if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>					
							 <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="fa fa-shopping-cart"></a>					
							 <?php } }else{ ?>					
							 <a href="<?=base_url();?>Login.html?return=true" class="fa fa-shopping-cart"></a>					
							 <?php }?>
						 </label>        
					 </div>       
				</div>	
        <?php } }else{ echo"No product Found!!";}?>
		</div>	 
	
		<div class="col-md-2 col-sm-2 col-xs-0" >
			<div class="fixedright">
				<div class="">
					<div class="">
				<a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=95080" target="_blank">
					<img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_Upto40PLUSExtra30OffOnPurchaseOfRs1299_160x600.jpg" width="160" height="600" border="0" />
				</a>	
						<div class="clear"></div>
					</div>
				</div>
			</div>
				<!-- Javascript Ad Tag: 534  
        				<div id="vcm534aHsffu"></div>
        					<script src="http://tracking.vcommission.com/aff_ad?campaign_id=534&aff_id=48478&format=javascript&format=js&divid=vcm534aHsffu" type="text/javascript"></script>
        					<iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=534&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="728" height="90"></iframe>
        		<!-- // End Ad Tag -->
      
		</div>
			 </div>
		<div class="compare_product comp_btn_fixed" id="compare">

		<div class="row">
			<div class="col-sm-12">
				<div class="panel-default comepare_bgc">					 
						<div class="panel-body">
							<form role="form" class="form-horizontal" onsubmit="return submit_compare()" method="post" action="<?=base_url();?>Landingpage/compare">
               
								<div class="compeyarhidden">
					
									<div class="col-md-2 col-sm-2 col-xs-2"></div>                  
									<div class="col-sm-2" id="productName">
									
									</div>
										
									</div>
									<div class="col-md-2">
										<div class="form-group">									 
											<button type="submit" class="btn btn-success btn-single fixedright" style=" ">Compare</button>
										</div>
									</div>
									<div class="form-group-separator"></div>
								</form>	
							</div>
						</div>
			</div>
		</div>
	</div>
		

 
			 
    

	
</div>
</div>
<div class="clear"></div>
