
<div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                      <h4 class="modal-title" id="myModalLabel">Create filter</h4>
                    </div>
					
					<form method="post"  action="<?=base_url();?>Categories/insertfilter" class="form-horizontal form-label-left">
					<input type="hidden" readonly name="filterGroupID" value="<?=isset($filtergroupdata[0]->filterGroupID)?$filtergroupdata[0]->filterGroupID:''?>">
<div class="modal-body">

<div class="x_content">
            <div class="row">                                    
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Category Name <span id="categorynamemes"  aria-hidden="true"></span></label>
						<div class="col-md-10 col-sm-10 col-xs-12">
						  <select onchange="fill();" id="categoryid" class="select2_group form-control" name="categoryid">
							<option value="">Select Name</option>
						   <?php  foreach($categories as $category){?>
							<option <?php if(!empty($filtergroupdata[0]->categoryID)){ if($filtergroupdata[0]->categoryID==$category->categoriesID){ echo "selected"; } } ?> value="<?=isset($category->categoriesID)?$category->categoriesID:''?>" ><?=isset($category->categoryName)?$category->categoryName:''?></option>
							<?php } ?>
						  </select>
						</div>
					</div>
                                    
					<div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Group Name<span id="inventoryunitmes"  aria-hidden="true"></span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" name="groupname" value="<?=isset($filtergroupdata[0]->groupName)?$filtergroupdata[0]->groupName:''?>" class="form-control" placeholder="Group Name">
                                            
                                    </div>
                    </div>
					
					<div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Sort Order<span id="maxquanmes"  aria-hidden="true"></span></label>
                                   
                                   <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select onchange="fill();" id="maxquan" name="sortoder" class="select2_group form-control">
                                    <option <?php if(!empty($filtergroupdata[0]->sortOrder)){ if($filtergroupdata[0]->sortOrder == 1){ echo "selected"; } } ?> value="1">1</option>
                                    <option <?php if(!empty($filtergroupdata[0]->sortOrder)){ if($filtergroupdata[0]->sortOrder == 2){ echo "selected"; } } ?> value="2">2</option>
									<option <?php if(!empty($filtergroupdata[0]->sortOrder)){ if($filtergroupdata[0]->sortOrder == 3){ echo "selected"; } } ?> value="3">3</option>
									<option <?php if(!empty($filtergroupdata[0]->sortOrder)){ if($filtergroupdata[0]->sortOrder == 4){ echo "selected"; } } ?> value="4">4</option>
									<option <?php if(!empty($filtergroupdata[0]->sortOrder)){ if($filtergroupdata[0]->sortOrder == 5){ echo "selected"; } } ?> value="5">5</option>
                                    </select>
                                    </div>
                    </div>
                                    
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status<span id="overidmes"  aria-hidden="true"></span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select onchange="fill();" id="overid" name="status" class="select2_group form-control">
                                    <option <?php if(!empty($filtergroupdata[0]->filterStatus)){ if($filtergroupdata[0]->filterStatus=='Active'){ echo"selected"; } } ?> value="Active">Active</option>
                                    <option <?php if(!empty($filtergroupdata[0]->filterStatus)){ if($filtergroupdata[0]->filterStatus=='Inactive'){ echo"selected"; } } ?> value="Inactive">Inactive</option>
                                    </select>
                                    </div>
                                    </div>
									
									<div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Filter Type<span id="overidmes"  aria-hidden="true"></span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                    <select onchange="fill();" id="overid" name="filtertype" class="select2_group form-control">
									<option value="">Select Type</option>
                                    <option <?php if(!empty($filtergroupdata[0]->filterType)){ if($filtergroupdata[0]->filterType == 'checkbox'){ echo "selected"; } } ?> value="checkbox">checkbox</option>
                                    <option <?php if(!empty($filtergroupdata[0]->filterType)){ if($filtergroupdata[0]->filterType == 'text'){ echo "selected"; } } ?> value="text">textbox</option>
									<option <?php if(!empty($filtergroupdata[0]->filterType)){ if($filtergroupdata[0]->filterType == 'select'){ echo "selected"; } } ?> value="select">drop down</option>
                                    </select>
                                    </div>
                                    </div>
									
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-2 col-xs-12">Config Type<span id="overidmes"  aria-hidden="true"></span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12 field_wrapper">
										<?php if(!empty($filtergroupvalue)) { foreach ($filtergroupvalue as $attributevalue) { ?>
										<div>
										<div class="col-md-3 col-sm-3 col-xs-3">
										<input type="text" class="form-control" placeholder="Lable" name="lable[]" value="<?=isset($attributevalue->lable)?$attributevalue->lable:''?>"/>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4">
										<input type="text" class="form-control" placeholder="Name" name="name[]" value="<?=isset($attributevalue->name)?$attributevalue->name:''?>"/>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-4">
										<input type="text" class="form-control" placeholder="Value"  name="value[]" value="<?=isset($attributevalue->value)?$attributevalue->value:''?>"/>
										</div>
										<a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?=base_url();?>admin/images/add-icon.png" /></a>
										</div>
										<?php } } ?>
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
		
		