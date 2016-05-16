<div class="message" style="margin-top:90px">
<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
</div>
                       
	<div class="">
	
		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Create products </h2>
					 
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<form role="form" class="form-horizontal form-label-left" novalidate  method="post" action="<?=base_url();?>product/insert_product">
						
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Product Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="productName" placeholder="Product name" required="required" type="text">
								</div>
							</div>
							
							  <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Category<span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" id="select" class="required" name="categoriesID">
									  <option value="">Choose option</option>
									
									<?php foreach($category as $categoryshow){?>
									  
										<option value="<?=isset($categoryshow->categoriesID) ?$categoryshow->categoriesID:''?>"><?=isset($categoryshow->categoryName)?$categoryshow->categoryName:''?>
										</option>
									<?php }?>
									</select>
								</div>
							</div>
							
							 

							  <div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Product Description <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12" data-validate-words="2" name="productDescription" placeholder="Product description" required="required" type="text">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Product Url<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="productsUrlKey" placeholder="Product url" required="required" type="text">
								</div>
							</div>
						  

							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="number">Product sort order <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="number" id="num" name="productsSortOrder" min="1"  required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="website">Product status <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="radio">
										<label>
											<input type="radio" class="flat" required="required" checked value="Active" name="productsStatus"> Active 
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="flat" required="required" value="Inactive" name="productsStatus"> Inactive
										</label>
									</div>
								
								</div>
							</div>
							
							<div class="item form-group">
								<input type="hidden" name="count" value="1" />
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Product Attribute Label <span class="required">*</span>
							</label>
						
							<div id="field1">
								<div class="col-md-3 col-sm-3 col-xs-12" >
					
									<input autocomplete="off" class="form-control col-md-5 col-xs-12" id="field" name="productAttributeLabel[]" type="text" placeholder="Label" required="required"  data-items="8"/>
									
							
								</div>
								
								<div class="col-md-3 col-sm-3 col-xs-12" >
					
									<input autocomplete="off" class="form-control col-md-5 col-xs-12" id="field" name="productAttributeValue[]" type="text" placeholder="value" required="required"  data-items="8"/>
							
								</div>
								
								</div>
						
								<div class="col-md-3 col-sm-3 col-xs-12" id="field">
								<button id="b1" class="btn add-more" type="button">+</button>
								</div>
							</div>
							

							
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Product image <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="text" name="imageName" required="required" placeholder="image url" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							 <div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Product image Title<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="text" name="productImageTitle" required="required" placeholder="Product image title" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							 <div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="image_tag">Product image Alt Tag <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="text" name="productImageAltTag"  required="required" placeholder="Product image Alt Tag" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
						
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="Image_status">Product Image status <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="radio">
										<label>
											<input type="radio" class="flat" required="required" checked value="Active" name="imageStatus"> Active 
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="flat" required="required" value="Inactive" name="imageStatus"> Inactive
										</label>
									</div>
								
								</div>
							</div>
							
							 <div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="website">Must be default image<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="radio">
										<label>
											<input type="radio" class="flat" required="required" checked value="Yes" name="isDefault"> Yes
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="flat" required="required" value="No" name="isDefault"> No
										</label>
									</div>
								
								</div>
							</div>
							
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="occupation">Product price <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="text" name="productPrice" required="required" Placeholder=" Price" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Shop Name</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									 <select class="form-control" required="required" name="shopID">
									  <option value="">Choose option</option>
									
									<?php foreach($shop as $shopshow){?>
									  
										<option value="<?=isset($shopshow->shopID) ?$shopshow->shopID:''?>"><?=isset($shopshow->shopName)?$shopshow->shopName:''?>
										</option>
									<?php }?>
									</select>
								</div>
							</div>
								<div class="item form-group form-label">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="Shop_url">Product Shop Url<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="occupation" type="text" name="productShopUrl" required="required" Placeholder="Product shop url" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
							
									<button  id="submit" name="submit" type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>



	
        
                    