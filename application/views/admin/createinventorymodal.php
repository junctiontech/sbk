<div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                      <h4 class="modal-title" id="myModalLabel">Create Inventory</h4>
                    </div>
					
					<form method="post" onsubmit="return(checkvalidation())" action="<?=base_url();?>Inventory/Insertinventory" class="form-horizontal form-label-left">
					<input type="hidden" readonly name="inventoryMasterID" value="<?=isset($inventory[0]->inventoryMasterID)?$inventory[0]->inventoryMasterID:''?>">
<div class="modal-body">

<div class="x_content">
 
            <div class="row">
                                    
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Inventory Name <span id="inventoryidmes"  aria-hidden="true"></span></label>
						<div class="col-md-10 col-sm-10 col-xs-12">
						  <select onchange="fill();" id="inventoryid" class="select2_group form-control" name="inventoryID">
							<option value="">Select Name</option>
						   <?php  foreach($inventorytypes as $inventorytype){ ?>
							<option <?php if(!empty($inventory[0]->inventoryTypeID)){ if($inventory[0]->inventoryTypeID==$inventorytype->inventoryTypeID){ echo"selected"; } } ?> value="<?=isset($inventorytype->inventoryTypeID)?$inventorytype->inventoryTypeID:''?>" ><?=isset($inventorytype->inventoryName)?$inventorytype->inventoryName:''?></option>
							<?php } ?>
						  </select>
						</div>
					</div>
				  
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Max Quantity <span id="categorynamemes"  aria-hidden="true"></span></label>
						<div class="col-md-10 col-sm-10 col-xs-12">
						  <input type="text" name="maxquantity" value="<?=isset($inventory[0]->maxQuantity)?$inventory[0]->maxQuantity:''?>" class="form-control" placeholder="max quantity">
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
				
				fill();
            });
        </script> 