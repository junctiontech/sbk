<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
<h4 class="modal-title" id="myModalLabel">Add Shop</h4>
</div>
<form method="post"  action="<?=base_url ();?>Setting/shop_Add" class="form-horizontal form-label-left" enctype="multipart/form-data">
<?php  if(!empty($shopID)){?>
<input type="hidden" name="shopID" value="<?php echo isset($shopdata[0]->shopID)?$shopdata[0]->shopID:'';?>">
<?php }?>
<?php if (!empty($shopdata)){ ?>
<input type="hidden" name="oldvalue" value ="<?php echo isset ($shopdata[0]->shop_image)?$shopdata[0]->shop_image:'';?>" >
<?php } ?> 
<div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Shop Name<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="shopName" type="text" required="required" value="<?php echo isset($shopdata[0]->shopName)?$shopdata[0]->shopName:'';?> ">
     </div>
  </div>
  
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Shop Url <span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="shopUrl" type="text" required="required" value="<?php echo isset($shopdata[0]->shopUrl)?$shopdata[0]->shopUrl:'';?>">
     </div>
  </div>
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Shop Api Url <span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="shopApiUrl" type="text" required="required" value="<?php echo isset($shopdata[0]->shopApiUrl)?$shopdata[0]->shopApiUrl:'';?> ">
     </div>
  </div>
  
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Shop Api Key<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="shopApiKey" type="text" required="required" value="<?php echo isset($shopdata[0]->shopApiKey)?$shopdata[0]->shopApiKey:'';?> ">
     </div>
  </div>
  <div class="item form-group">
   <label for="categoryName" class="control-label col-md-2 col-sm-10 col-xs-12">Shop Api Token <span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="shopApiToken" type="text" required="required" value="<?php echo isset($shopdata[0]->shopApiToken)?$shopdata[0]->shopApiToken:'';?> ">
     </div>
  </div>
  
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Shop Sort Order<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="shopSortOrder" type="text" required="required" value="<?php echo isset($shopdata[0]->shopSortOrder)?$shopdata[0]->shopSortOrder:'';?>">
     </div>
  </div>
 <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Shop Image</label>
    <div class="col-md-8 col-sm-4 col-xs-12" align="center" >
		<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img id="shop_image" src="<?=base_url();?>./uploads/images/shopimages/<?php echo isset($shopdata[0]->shop_image)?$shopdata[0]->shop_image:'';?>"></div>
       <input onchange="readURL(this);" class="form-control col-md-6 col-xs-12"  name="shop_image" type="file"/>
     </div>
  </div>
  
<div class="item form-group">
<label class="control-label col-md-2 col-sm-10 col-xs-12">Shop Status </label>
<div class="col-md-8 col-sm-4 col-xs-12">
<select class="form-control" name="shopStatus">
<option value="Active" <?php if(!empty($shopdata[0]->shopStatus))
{
	if ($shopdata[0]->shopStatus == 'Active' )
	{
		echo 'selected';
	}
}?>>Active</option>
 <option value="Inactive" <?php if (!empty ($shopdata[0]->shopStatus))
								{
										if ($shopdata[0]->shopStatus == 'Inactive')
												{
													echo 'selected' ; 
												}
								} ?>>Inactive</option>
<option value="Deleted" <?php if(!empty($shopdata[0]->shopStatus))
{
	if ($shopdata[0]->shopStatus=='Deleted')
	{
		echo 'selected';
	}
}?>>Deleted</option>
 </select>
</div>
</div>
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Shop key<span class="required">*</span></label>
    <div class="col-md-8 col-sm-4 col-xs-12">
       <input  class="form-control col-md-6 col-xs-12"  name="shopkey" type="text" required="required" value="<?php echo isset($shopdata[0]->shopkey)?$shopdata[0]->shopkey:'';?>">
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
	
	   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('#shop_image').attr('src', e.target.result);
       }
        reader.readAsDataURL(input.files[0]);
       }
    }
	</script>

					
		