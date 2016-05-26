<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
<h4 class="modal-title" id="myModalLabel">Add Api</h4>
</div>
<form method="post"  action="<?=base_url();?>Setting/insertapi" class="form-horizontal form-label-left">
<?php if (!empty($fatch)) { ?>
<input type="hidden" name="apiID" value="<?php echo isset ($fatch[0]->apiID)?$fatch[0]->apiID:'';?>">
<?php }?>
<div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Api Name <span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="apiName" type="text" required="required" value="<?php echo isset ($fatch[0]->apiName)?$fatch[0]->apiName:'';?>">
     </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">App ID<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="appID" type="text" required="required" value="<?php echo isset($fatch[0]->appID)?$fatch[0]->appID:'';?>">
     </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">App Secreat ID<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="appSecreatID" type="text" required="required" value="<?php echo isset($fatch[0]->appSecreatID)?$fatch[0]->appSecreatID:'';?>">
     </div>
  </div>
<div class="item form-group">
<label class="control-label col-md-2 col-sm-10 col-xs-12">Status </label>
<div class="col-md-8 col-sm-4 col-xs-12">
<select class="form-control" name="Status">
<option value="Active" <?php if (!empty($fatch[0]->Status))
{
	if ($fatch[0]->Status == 'Active')
	{
		echo 'selected';
	}
}?> >Active</option>
 <option value="Inactive" <?php if (!empty($fatch[0]->Status))
 {
	 if ($fatch[0]->Status == 'Inactive')
	 {
		 echo 'selected';
	 }		 
 }?> >Inactive</option>
<option value="Deleted" <?php if (!empty($fatch[0]->Status))
{
	if ($fatch[0]->Status == 'Deleted')
	{
		echo 'selected';
	}
}?> >Deleted</option>
 </select>
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