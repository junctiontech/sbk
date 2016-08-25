<div class="page-container">	
	<div class="main-content">	
		<div class="col-sm-12 col-md-12 col-xs-12 form_content ">		
			<!-- Alert section For Message-->				
			<?php  if($this->session->flashdata('message_type')=='success') {  ?>			
			<div class="alert alert-success alert-dismissible fade in" role="alert"> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>  
				<strong><?=$this->session->flashdata('message')?></strong>  </div>	
			<?php } if($this->session->flashdata('message_type')=='error') { ?>
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
				<strong><?=$this->session->flashdata('message')?></strong>  </div>
			<?php } if($this->session->flashdata('category_error_login')) { ?>
			<div class="row" >
				<div class="alert alert-danger" >
					<strong><?=$this->session->flashdata('category_error_login')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
				</div>		
			</div>		
			<?php }?>
			<!-- Alert section End-->
		</div>		
		<div class="page-loading-overlay">
			<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>		
		</div> 
		<div class="content_top">
			<div class="back-links">
				<p><a href="<?=base_url();?>">Home</a> >><a href="<?=$_SERVER['HTTP_REFERER']?>"> Back</a> </p> 
			</div>   
			<div class="heading">
				<h3> Compare </h3>
			</div> 
			<div class="clear"></div>
		</div>	
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">					
				<div style="top: 20px;" class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">					
					<table cellspacing="0" class="table-bordered table-striped table-small-font">					
						<thead>						
							<tr>						
								<td>
									<div style="width:265px;text-align:center;">
										<h3>Features</h3>									
									</div>
								</td> 
								<?php if(!empty($compareproduct)){ foreach($compareproduct as $product){ ?>	
								<td>		
									<div style="width:265px;text-align:center; margin-top: 10px;">
										<div class="imageheightfix">
											<img src="<?=$product->imageName?>" alt="" />
										</div>	
										<div class="compare_product_name">
											<p><?=$product->productName?> </p>	
										</div>
										<div class="compare_product_price">	
											<p>
												<span class="price">Rs. <?=number_format($product->productPrice,2)?></span><br>
												<img style="height:30px" src="<?=base_url();?>frontend/images/<?=$product->shop_image?>">
											</p>
										</div>	
										<a style="color:white" href="<?=base_url();?>Landingpage/Product/<?=$product->categoriesUrlKey?>/<?=$product->sb4kProductID?>/<?=isset($product->productsUrlKey)?$product->productsUrlKey:'new'?>.html">
											<div  class="btn btn-black">
												<span>Buy Now</span>
											</div>
										</a>	
									</div>											
								</td>												
								<?php }} ?>										
							</tr>										
						</thead>										
						<tbody>										
							<tr>			
								<td>			
									<?php if(!empty($compareproduct_info)){ ?>
									<table class="table"> 
										<tbody>			
											<?php foreach($compareproduct_info as $compareinfo ){?>
											<tr>				
												<td style="background-color:#ededed"><P  class="heddine1" >
													<?php if(!empty($compareinfo->productAttributeLable))
															{
																echo isset($compareinfo->productAttributeLable)?$compareinfo->productAttributeLable:'';	
															}
															else
															{
																echo "Other";
															}?>		
													</P>		
												</td>	
											</tr>		
											<?php } ?>
										</tbody>	
									</table>
									<?php  }?>
								</td>	
								<?php if(!empty($compareproduct)){ foreach($compareproduct as $product) { ?>
								<td>		
									<?php $compareproduct=($product->productsID); $product_attributeinfo=$this->Landingpage_model->product_attribute($compareproduct); ?>
									<table class="table">
										<tbody> 	
											<?php foreach($compareproduct_info as $data1){ ?>
											<tr>		
												<?php $keys=(array_keys(array_column($product_attributeinfo, 'productAttributeLable'), $data1->productAttributeLable));	 if($keys || $keys==0 ){  $keys = array_search($data1->productAttributeLable, array_column($product_attributeinfo , 'productAttributeLable')); ?>													
												<td>															
													<p class="heddine"><?= strip_tags(isset($product_attributeinfo[$keys]['productAttributeValue'])?$product_attributeinfo[$keys]['productAttributeValue']:'');?></p>															
												</td>		
												<?php }else{ ?>
												<td style="background-color:white"><p class="heddine1">NO</p></td>
												<?php } ?>
											</tr>		
											<?php } ?>	
										</tbody>	
									</table>
								</td>	
								<?php }}?>
							</tr>	
						</tbody>	
					</table>	
				</div>
			</div>	
		</div> 
	</div>
</div>
<div class="clear"></div>