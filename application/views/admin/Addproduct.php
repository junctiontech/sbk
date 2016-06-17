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
									<select class="form-control" id="select" class="required" onchange="chooseattribute()" name="categoriesID">
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
							
							<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-3">Product Attribute Label <span id=""  aria-hidden="true"></span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-9 field_wrapper">
										<div>
										<div class="col-md-3 col-sm-3 col-xs-3">
										<select class="form-control" id="productAttributeLabel0" class="required"  name="productAttributeLabel[]">
												<option value="">Choose option</option>
										</select>
										</div>
										
										<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" placeholder="Value"  name="productAttributeValue[]" value=""/>
										</div>
										<a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?=base_url();?>admin/images/add-icon.png" /></a>
										</div>
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
									<input id="" type="text" name="productShopUrl" required="required" Placeholder="Product shop url" class=" form-control col-md-7 col-xs-12">
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

<script type="text/javascript">
var next=1;
$(document).ready(function(){
	
	var maxField = 10; 
	var addButton = $('.add_button'); 
	var wrapper = $('.field_wrapper'); 

	
	var x=0;
	$(document).on('click', '.add_button', function() { 
	 var fieldHTML ='<div><div class="col-md-3 col-sm-3 col-xs-3"><select class="form-control" id="productAttributeLabel'+next+'" class="required"  name="productAttributeLabel[]"></select></div><div class="col-md-3 col-sm-3 col-xs-3"><input type="text" class="form-control" placeholder="Value"  name="productAttributeValue[]" value=""/></div><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?=base_url();?>admin/images/remove-icon.png" style="margin-top:20px"/></a></div>';
				if(x < maxField){ 
			x++; 
		
		next=next++;
		
			$('.field_wrapper').append(fieldHTML); 
	
			}
			
		chooseattribute(x);	
			
		});
		
	
	$(document).on('click', '.remove_button', function(e){ 
		e.preventDefault();
		$(this).parent('div').remove(); 
		x--; 
	});
	
});

</script>

	

	
        
                    