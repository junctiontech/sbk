<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
<h4 class="modal-title" id="myModalLabel">Add Inventory</h4>
</div>
<form method="post"  action="<?=base_url ();?>Categories/brand_Add" class="form-horizontal form-label-left">
<?php  if(!empty($brandID)){?>
<input type="hidden" name="brandID" value="<?php echo isset($brand[0]->brandID)?$brand[0]->brandID:'';?>">
<?php }?>
<div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Brand Name<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="brandName" type="text" required="required" value="<?php echo isset($brand[0]->brandName)?$brand[0]->brandName:'';?> ">
     </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Category Name</label>
   <div class="col-md-8 col-sm-4 col-xs-12">
<select class="form-control" name="categoriesID">
<option value=" ">Choose option</option>
<?php foreach($brand_name as $data) {?>
<option value="<?=$data->categoriesID ; ?>" <?php if (!empty($brand[0]->categoriesID)){
	if ($brand[0]->categoriesID == $data->categoriesID)
	{
		echo 'selected';
	}
}?>><?=$data->categoryName; ?></option>
<?php } ?>
 </select>
</div>
</div>
  </div>  
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Brand Key<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="brandKey" type="text" required="required" value="<?php echo isset($brand[0]->brandKey)?$brand[0]->brandKey:'';?>">
     </div>
  </div>
<div class="item form-group">
<label class="control-label col-md-2 col-sm-10 col-xs-12">Brand Status </label>
<div class="col-md-8 col-sm-4 col-xs-12">
<select class="form-control" name="brandStatus">
<option value="Active" <?php if(!empty($brand[0]->brandStatus))
{
	if ($brand[0]->brandStatus == 'Active' )
	{
		echo 'selected';
	}
}?>>Active</option>
 <option value="Inactive" <?php if (!empty ($brand[0]->brandStatus))
								{
										if ($brand[0]->brandStatus == 'Inactive')
												{
													echo 'selected' ; 
												}
								} ?>>Inactive</option>
<option value="Deleted" <?php if(!empty($brand[0]->brandStatus))
{
	if ($brand[0]->brandStatus=='Deleted')
	{
		echo 'selected';
	}
}?>>Deleted</option>
 </select>
</div>
</div>
  
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Brand Sort Order<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="brandSortOrder" type="text" required="required" value="<?php echo isset($brand[0]->brandSortOrder)?$brand[0]->brandSortOrder:'';?> ">
     </div>
  </div>  
 <div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
<script>
$(document).on('hidden.bs.modal', function (e) {
		var target = $(e.target);
        target.removeData('bs.modal')
              .find(".modal-content").html('');
    });
</script>
