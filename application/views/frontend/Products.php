<div class="page-container">	
  <div class="main-content">   
    <div class="compare_product" id="compare">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default comepare_bgc">					 
						<div class="panel-body">	
							
								<form role="form" class="form-horizontal"  method="post" action="<?=base_url();?>Landingpage/compare">
                  <div class="col-md-2 col-sm-2 col-xs-0"></div>
                  <div class="col-sm-2">
										<div class="form-group">
											<label class="control-label ">Product 1</label>									
											<div class="col-sm-12" id="productName1">
												<!--<input type="text" class="form-control" id="productName1" name="productName1" value=" " placeholder="Placeholder">-->
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Product 2</label>									
											<div class="col-sm-12" id="productName2">
												<!--<input type="text" class="form-control" id="productName2" placeholder="Placeholder">-->
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Product 3</label>									
											<div class="col-sm-12" id="productName3">
												<!--<input type="text" class="form-control" id="productName3" placeholder="Placeholder">-->
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Product 4</label>									
											<div class="col-sm-12" id="productName4">
												<!--<input type="text" class="form-control" id="productName4" placeholder="Placeholder">-->
											</div>
										</div>	
									</div>	
									<div class="col-md-2">
										<div class="form-group">									 
											<button type="submit" class="btn btn-success btn-single" style="margin-top: 20px;">Compare</button>
										</div>
									</div>
									<div class="form-group-separator"></div>
								</form>	
							</div>
						</div>
			</div>
		</div>
	</div>
	   <div class="col-md-12 col-sm-12 col-xs-12">
		  <div class="page-no">
    			<p>Total Result:<?php echo isset($totalresult)?$totalresult:'';?> </p><p>Result Pages:<?php echo isset($pagination)?$pagination:'';?></p>
    		</div>
       </div>
	  
	  
 
		<div class="row">
			 
      <div class="col-md-2 col-sm-2 col-xs-12">
        <p>Refine Your Search</p>
        <hr>
        <?php if(!empty($filters)){  foreach($filters as $filter){ ?>
        <div class="Price">
          <p>
            <?=isset($filter->groupName)?$filter->groupName:''?>
          </p>
        </div>
        <?php if($filter->filterGroupID){
				$filteratt=$this->Landingpage_model->get_grpatt($filter->filterGroupID);
				if($filteratt){ ?>
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
        <a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=95080" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_Upto40PLUSExtra30OffOnPurchaseOfRs1299_160x600.jpg" width="160" height="600" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=95080&aff_id=48478&url_id=2442" width="1" height="1" /> 
		</div>
      <div class="col-md-8 col-sm-8 col-xs-12" id="mySelect">
         <div class="row"> <?php if(!empty($products)){ foreach($products as $product){?>
		
			 
        <div class="grid_1_of_4 images_1_of_4">
				<div class="imageheightfix">
		<a href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=isset($product->productsUrlKey)?$product->productsUrlKey:'new'?>.html"><img src="<?=$product->imageName?>" alt="" /></a>
			</div>
					<h2>
            <?=$product->productName?>
            <?=isset($product->attr)?$product->attr:''?>
          </h2>
          <p><span class="price">Rs. 
            <?=$product->productPrice?>
            </span></p>           
          <div class="checkbox">
            <label>
              <input type="checkbox" value="<?=$product->productsID?>" class="chkcount" name="productid" onchange="compare_product(this.value)">
              Compare </label>
			  <lable class="wishlist"> 
				<?php if(!empty($userinfos)){ if(in_array($product->productsID,$whislistproduct)==false){ ?>
					  <a href="<?=base_url();?>User/AddToWishList/<?=$product->productsID?>.html" class="fa fa-shopping-cart"></a>
					  <?php } }else{ ?>
					  <a href="<?=base_url();?>Login.html?return=true" class="fa fa-shopping-cart"></a>
					  <?php }?></lable>
          </div>
        </div>
	
        <?php } }else{ echo"No product Found!!";}?>
		</div>	  </div>
		<div class="col-md-2 col-sm-2 col-xs-12" >
        <a href="http://tracking.vcommission.com/aff_c?offer_id=126&aff_id=48478&url_id=2442&file_id=95080" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/126/Jabong_Upto40PLUSExtra30OffOnPurchaseOfRs1299_160x600.jpg" width="160" height="600" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=126&file_id=95080&aff_id=48478&url_id=2442" width="1" height="1" /> <a href="http://tracking.vcommission.com/aff_c?offer_id=480&aff_id=48478&file_id=88882&file_id=79365" target="_blank"><img src="http://media.vcommission.com/brand/files/vcm/480/Zovi_CPS_Tees_160x600.jpg" width="160" height="600" border="0" /></a><img src="http://tracking.vcommission.com/aff_i?offer_id=480&file_id=79365&aff_id=48478&file_id=88882" width="1" height="1" />
        <!-- Javascript Ad Tag: 534  
        <div id="vcm534aHsffu"></div>
        <script src="http://tracking.vcommission.com/aff_ad?campaign_id=534&aff_id=48478&format=javascript&format=js&divid=vcm534aHsffu" type="text/javascript"></script>
        <iframe src="http://tracking.vcommission.com/aff_ad?campaign_id=534&aff_id=48478&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="728" height="90"></iframe>
        <!-- // End Ad Tag -->
      </div>
	 
				</div>
	 
    </div>
  </div> 
<div class="clear"></div>
