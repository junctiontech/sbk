<div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                      <h4 class="modal-title" id="myModalLabel">Add Inventory</h4>
                    </div>
					
					<form method="post" onsubmit="return(checkvalidation())" action="<?=base_url();?>Inventory/Insertinventryconsumption" class="form-horizontal form-label-left">
					<input type="hidden" readonly name="inventoryConsumptionID" value="<?=isset($inventory[0]->inventoryConsumptionID)?$inventory[0]->inventoryConsumptionID:''?>">
<div class="modal-body">

<div class="x_content">
 
            <div class="row">
                                    
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Inventory Name <span id="inventoryidmes"  aria-hidden="true"></span></label>
						<div class="col-md-10 col-sm-10 col-xs-12">
						  <select  id="inventoryid" class="select2_group form-control" name="inventoryMasterID">
							<option value="">Select Name</option>
						   <?php  foreach($inventorytypes as $inventorytype){?>
							<option <?php if(!empty($inventory[0]->inventoryMasterID)){ if($inventory[0]->inventoryMasterID==$inventorytype->inventoryMasterID){ echo"selected"; } } ?> value="<?=isset($inventorytype->inventoryMasterID)?$inventorytype->inventoryMasterID:''?>" ><?=isset($inventorytype->inventoryName)?$inventorytype->inventoryName:''?></option>
							<?php } ?>
						  </select>
						</div>
					</div>
				  
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Category Name <span id="categorynamemes"  aria-hidden="true"></span></label>
						<!--get_products_by_cat(this.value);-->
						<div class="col-md-10 col-sm-10 col-xs-12">
						  <select onchange="" id="select" class="select2_group form-control" name="">
							<option value="">Select Name</option>
						   <?php  foreach($categories as $category){?>
							<option <?php if(!empty($inventory[0]->categoriesID)){ if($inventory[0]->categoriesID==$category->categoriesID){ echo"selected"; } } ?> value="<?=isset($category->categoriesID)?$category->categoriesID:''?>" ><?=isset($category->categoryName)?$category->categoryName:''?></option>
							<?php } ?>
						  </select>
						</div>
					</div>
                                    
					<div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Product Name<span id="inventoryunitmes"  aria-hidden="true"></span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select  id="productName"  name="productID" class="select2_group form-control">
									<option value=''>Select product</option>
                                    <?php  foreach($products as $product){?>
							<option <?php if(!empty($inventory[0]->productID)){ if($inventory[0]->productID==$product->productsID){ echo"selected"; } } ?> value="<?=isset($product->productsID)?$product->productsID:''?>" ><?=isset($product->productName)?$product->productName:''?></option>
							<?php } ?>
                                    </select>
                                    </div>
                    </div>
                                    
                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Sort Order<span id="maxquanmes"  aria-hidden="true"></span></label>
                                   
                                   <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select  id="maxquan" name="sortoder" class="select2_group form-control">
                                    <option <?php if(!empty($inventory[0]->sortOrder)){ if($inventory[0]->sortOrder==1){ echo"selected"; } } ?>value="1">1</option>
                                    <option <?php if(!empty($inventory[0]->sortOrder)){ if($inventory[0]->sortOrder==2){ echo"selected"; } } ?>value="2">2</option>
									<option <?php if(!empty($inventory[0]->sortOrder)){ if($inventory[0]->sortOrder==3){ echo"selected"; } } ?>value="3">3</option>
									<option <?php if(!empty($inventory[0]->sortOrder)){ if($inventory[0]->sortOrder==4){ echo"selected"; } } ?>value="4">4</option>
									<option <?php if(!empty($inventory[0]->sortOrder)){ if($inventory[0]->sortOrder==5){ echo"selected"; } } ?>value="5">5</option>
                                    </select>
                                    </div>
                    </div>
                                    
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status<span id="overidmes"  aria-hidden="true"></span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select  id="overid" name="status" class="select2_group form-control">
                                    <option <?php if(!empty($inventory[0]->Status)){ if($inventory[0]->Status=='Active'){ echo"selected"; } } ?>value="Active">Active</option>
                                    <option <?php if(!empty($inventory[0]->Status)){ if($inventory[0]->Status=='Inactive'){ echo"selected"; } } ?>value="Inactive">Inactive</option>
                                    </select>
                                    </div>
                                    </div>
                                    
                    <div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Baner Image<span id="cityidmes"  aria-hidden="true"></span></label>
						<div class="col-md-10 col-sm-10 col-xs-12">
						  <select  id="" class="select2_group form-control" name="banerimage">
							<option value=""></option>
						   <?php foreach($cities as $cities){?>
							<option value="<?=isset($cities->cityID)?$cities->cityID:''?>" ><?=isset($cities->cityName)?$cities->cityName:''?></option>
							<?php } ?>
						  </select>
						</div>
                    </div>
                                    
            </div>
        </div>
	</div>
                    <div class="clearfix"></div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       <input type="submit" class="btn btn-primary" value="Save changes" name="submit"/>
                    </div>
					</form>
					
					
		