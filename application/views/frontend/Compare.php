<div class="page-container">
	<div class="main-content">
	<div class="page-loading-overlay">
				<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
			</div>
 <div class="content_top">
			<div class="back-links">
				<p><a href="<?=base_url();?>">Home</a> >> <?=isset($categorykey)?$categorykey:''?> </p>
    	    </div>
    		<div class="heading">
				<h3> Compare </h3>
    		</div>
    		
    		<div class="clear"></div>
    		
    	</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10">
			<?php if(!empty($compareproduct)){ foreach($compareproduct as $product){ ?>
						<div class="col-md-3 col-sm-3 col-lg-3 " >
							<div class="comparegrid_1_of_4 compareimages_1_of_4 ">
								<div class="imageheightfix">
									<img src="<?=$product->imageName?>" alt="" />
								</div>
								<div class="compare_product_name">
									<p><?=$product->productName?> </p>
								</div>
								<div class="compare_product_price">
									<p><span class="price">Rs. <?=number_format($product->productPrice,2)?></span></p>
								</div>
								<div  class="btn btn-black">
									<span><a style="color:white" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=isset($product->productsUrlKey)?$product->productsUrlKey:'new'?>.html">Buy Now</a></span>
							
								</div>
							</div>
				</div><?php } } ?>
			
			</div>
		</div>
	 
		<div class="row">
			
		<div class="col-md-2 col-sm-2 col-xs-12" style="font-size:13px;">
				<div class="x_content">
							<?php 
							 if(!empty($compareproduct_info)){ 
							
							 foreach($compareproduct_info as $compareinfo ){?>
                             <table class="table ">
                                    
                              <tbody>
                                  <tr>
									<td style="background-color:#ededed"><P  class="heddine1" ><?php 
									
									if(!empty($compareinfo->productAttributeLable)){
									echo isset($compareinfo->productAttributeLable)?$compareinfo->productAttributeLable:'';	
									}
									else{
										echo "Other";
									}
									
									?></P></td>
								  </tr>
							  </tbody>
							  </table>
							 <?php  }}?>                        
				</div>
			</div>	
			
				
				
				<div class="col-md-10 col-sm-10 col-xs-12">
				<?php if(!empty($compareproduct)){ foreach($compareproduct as $product){ ?>
						<div class="col-md-3 col-sm-3 col-lg-3 " >
							<!--<div class="comparegrid_1_of_4 compareimages_1_of_4 ">
								<img src="<?=$product->imageName?>" alt="" />
							<div class="compare_product_name">
								<p><?=$product->productName?> </p>
							</div>
							<div class="compare_product_price">
								<p><span class="price"><?=$product->productPrice?></span></p>
							</div>
							</div>-->
				  <?php	//$categoryinfo=($product->categoriesID);
						$compareproduct=($product->productsID); 
				
					$product_attributeinfo=$this->Landingpage_model->product_attribute($compareproduct);					
					?>
							
					<table class="table table-bordered" style="font-size:13px;">
                                    
							<tbody>
                            <?php foreach($compareproduct_info as $data1){ //print_r($compareproduct_info); ?>
							<tr>
							<?php
							//print_r($product_attributeinfo);print_r($data1->productAttributeID);die;
							 $keys=(array_keys(array_column($product_attributeinfo, 'productAttributeLable'), $data1->productAttributeLable));
							//print_r($keys); 
							if($keys || $keys==0 ){
							
							$keys = array_search($data1->productAttributeLable, array_column($product_attributeinfo , 'productAttributeLable'));
							
							?> 			
				 
							<td><P class="heddine"><?= strip_tags (isset($product_attributeinfo[$keys]['productAttributeValue'])?$product_attributeinfo[$keys]['productAttributeValue']:'');?><p></td>
									
							<?php }else{ ?>
							<td style="background-color:white"> NO</td>
							<?php } ?>
							</tr>
							<?php } ?>
		  
							</tbody>
					</table>
				  
				  
				  
						</div>
						<?php }}?>		
				
				
				
				</div>
			
			
			
		
		</div>
		
				 
</div>
</div>
<div class="clear"></div>


