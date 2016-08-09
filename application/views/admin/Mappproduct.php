
<div class="message" style="margin-top:90px">
<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
</div>
 <div class="row">
<form role="form" class="form-horizontal form-label-left" novalidate  method="post" action="<?=base_url();?>product/map_product">
	  <div class="col-md-8" style="overflow: auto">
			
			
			<div class="form-group">
			<div class="row"  style="margin-top:20px">
			<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Select Category </label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<select class="select2_group form-control" id="select" class="required" name="categoriesID" ><!--onchange="search_product()"-->
				  <option value="">Category</option>
			
				<?php foreach($category as $categoryshow){?>
					<option value="<?=isset($categoryshow->categoriesID) ?$categoryshow->categoriesID:''?>"
					
					<?php {if(!empty($id[0]->categoryName))
											{  if($id[0]->categoryName==$categoryshow->categoryName)	
											{  echo"selected"; }   }?>>
					<?=isset($categoryshow->categoryName)?$categoryshow->categoryName:''?>
					</option>
				<?php }}?>
				</select>
			</div>
			</div>
			<div class="row" style="margin-top:20px">
			<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Product name </label>
			<div class="col-md-6 col-sm-6 col-xs-12 content">
			<select id="productName" class="select2_group form-control" onchange="getproductimage(this.value);getProductToMapp(this.value);getMappedProduct(this.value);getProductToMappSnapdeal(this.value)" name="productName" >
				<option value="" >Select</option>
				<?php { 
				if(!empty($Fetch_ProductName))
				{
				foreach($Fetch_ProductName as $Fetch_ProductMap) 	
				{?>
					<option selected value="<?=isset($Fetch_ProductMap->productsID) ?$Fetch_ProductMap->productsID:''?>"><?=isset($Fetch_ProductMap->productName)?$Fetch_ProductMap->productName:''?> <?=isset($Fetch_ProductMap->attr)?$Fetch_ProductMap->attr:''?>				
					</option>
					
				<?php }}}?>
					
			</select>

			</div>
			</div>
			
           <?php if(!empty($mappedproduct)){?>
			   
			<div class="col-md-8 col-sm-8 col-xs-12">
				<button  id="submit" name="submit" type="submit" class="btn btn-success" formaction="<?=base_url();?>product/mapped_product" style="margin-top:20px;float:right">Map Product</button>
			</div>
			
			<div class="col-md-1 col-sm-1 col-xs-12">
				<button  id="submit" name="submit" type="submit" class="btn btn-success"  style="margin-top:20px;float:right">Search</button>
			</div>
		   <?php }?>
		   
		    <?php if(!empty($mappedproduct)){?>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<button  id="submit" name="submit" type="submit" class="btn btn-success" style="margin-top:20px;float:right">Search</button>
			</div>
			<?php }?>
			</div>
		
			
	  </div>
	  	
							<div class="col-md-2" style="float:left" id="showimage">
							<?php if(!empty($Fetch_ProductName)){ foreach($Fetch_ProductName as $Fetch_ProductMap) { ?>
								<div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; height:150px; display: block;" src="<?=isset($Fetch_ProductMap->imageName)?$Fetch_ProductMap->imageName:''?>" alt="image" />
									</div>
                                    <div class="caption">
                                        <p><?=isset($Fetch_ProductMap->productName)?$Fetch_ProductMap->productName:''?></p>
										<p style="margin-top:10px">Price-<?=isset($Fetch_ProductMap->productPrice)?$Fetch_ProductMap->productPrice:''?></p>
										<p style="margin-top:10px">Shop-<?=isset($Fetch_ProductMap->shopName)?$Fetch_ProductMap->shopName:''?></p>
										<p style="margin-top:10px"><?=isset($Fetch_ProductMap->attr)?$Fetch_ProductMap->attr:''?></p>
									 </div>
								</div>	 
							<?php } } ?>		 
                            </div>
			
	  </div>

		<script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true
                });
            });
        </script>
		
		
		
				   
                   <div class="row">
                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Mapped product</h2>
                                 	
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								    <div class="row">
									<div id="mappedproduct">
                                   <?php if(!empty($fetch_productmapped)){?>
										<?php foreach($fetch_productmapped as $fetch_product){?>	
                                        <div class="col-md-12">
											<div class="thumbnail">
                                                <div class="image view view-first">
                                                    <img style="width: 100%; height:150px; display: block;" src="<?=isset($fetch_product->imageName)?$fetch_product->imageName:''?>" alt="image" />
												</div>
                                                <div class="caption">
                                                    <p><?=isset($fetch_product->productName)?$fetch_product->productName:''?></p>
													<p style="margin-top:10px">Price-<?=isset($fetch_product->productPrice)?$fetch_product->productPrice:''?></p>
													<p style="margin-top:10px">Shop-<?=isset($fetch_product->shopName)?$fetch_product->shopName:''?></p>
												</div>
                                            </div>
                                        </div>
								   <?php }} ?>

								</div>
                                    </div>

                                </div>
                            </div>
                        </div>

                
                
                 
                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Amazone unmapped product</h2>
                                 	
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								    <div class="row">
									
                                <div id="unmappedproduct">

                                   <?php if(!empty($mappedproduct)){?>
										<?php foreach($mappedproduct as $products){?>	
                                        <div class="col-md-12">
										
                                            <div class="thumbnail">
                                                <div class="image view view-first">
                                                    <img style="width: 100%; height:150px; display: block;" src="<?=isset($products->imageName)?$products->imageName:''?>" alt="image" />

                                                </div>
                                                <div class="caption">
                                                    <p><?=isset($products->productName)?$products->productName:''?></p>
													  <p style="margin-top:10px">Price-<?=isset($products->productPrice)?$products->productPrice:''?></p>
													  <p style="margin-top:10px">Shop-<?=isset($products->shopName)?$products->shopName:''?></p>
												
												<div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="<?=isset($products->productsID)?$products->productsID:''?>" name="mapped_value[]"> Select to Mapp Product  
                                                    </label>
                                                </div> 
													
                                                </div>
                                            </div>
                                        </div>
								   <?php }} ?>

								</div>
                                    </div>

                                </div>
                            </div>
                        </div>
						
						<div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Snapdeal unmapped product</h2>
                                 	
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								    <div class="row">
									
                                <div id="unmappedproductsnapdeal">

                                   <?php if(!empty($mappedproduct)){?>
										<?php foreach($mappedproduct as $products){?>	
                                        <div class="col-md-12">
										
                                            <div class="thumbnail">
                                                <div class="image view view-first">
                                                    <img style="width: 100%; height:150px; display: block;" src="<?=isset($products->imageName)?$products->imageName:''?>" alt="image" />

                                                </div>
                                                <div class="caption">
                                                    <p><?=isset($products->productName)?$products->productName:''?></p>
													  <p style="margin-top:10px">Price-<?=isset($products->productPrice)?$products->productPrice:''?></p>
													  <p style="margin-top:10px">Shop-<?=isset($products->shopName)?$products->shopName:''?></p>
												
												<div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="<?=isset($products->productsID)?$products->productsID:''?>" name="mapped_value[]"> Select to Mapp Product </input>
                                                    </label>
                                                </div> 
													
                                                </div>
                                            </div>
                                        </div>
								   <?php }} ?>

								</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                   
                </div>
				</form>