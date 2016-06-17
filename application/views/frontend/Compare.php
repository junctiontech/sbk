</div>
 <div class="main">
    <div class="content">
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
			<div class="col-md-2 col-sm-2 col-lg-2" style="margin-top:350px">
				<div class="x_content">
							<?php 
							 if(!empty($compareproduct_info)){ foreach($compareproduct_info as $compareinfo ){?>
                             <table class="table ">
                                    
                              <tbody>
                                  <tr>
									<td style="background-color:#ededed"><?=isset ($compareinfo->productAttributeLable) ?$compareinfo->productAttributeLable:''?></td>
								  </tr>
							  </tbody>
							  </table>
							 <?php  }}?>                       
                               
				</div>
			</div>
				
			<div class="col-md-9 col-sm-9 col-lg-9 " >
					<?php if(!empty($compareproduct)){ foreach($compareproduct as $product){ ?>
						<div class="col-md-2 col-sm-2 col-lg-2 " >
							<div class="comparegrid_1_of_4 compareimages_1_of_4 ">
								<img src="<?=$product->imageName?>" alt="" /></img>
							<div class="compare_product_name">
								<p><?=$product->productName?> </p>
							</div>
							<div class="compare_product_price">
								<p><span class="price"><?=$product->productPrice?></span></p>
							</div>
							</div>
				  <?php	$categoryinfo=($product->categoriesID);
						$compareproduct=($product->productsID); 
				
					$product_attributeinfo=$this->Landingpage_model->product_attribute($compareproduct,$categoryinfo)?>
							
					<table class="table " style="width:170px; ">
                                    
							<tbody>
                            <?php foreach($compareproduct_info as $data1){ ?>
							<tr>
							<?php
							
							 $keys=(array_keys(array_column($product_attributeinfo, 'AttributeID'), $data1->AttributeID));
							
							if($keys || $keys==0){
							
							$keys = array_search($data1->AttributeID, array_column($product_attributeinfo , 'AttributeID'));
							
							?> 			
				 
							<td><?= isset ($product_attributeinfo[$keys]['productAttributeValue']) ?$product_attributeinfo[$keys]['productAttributeValue']:''?></td>
											
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
   