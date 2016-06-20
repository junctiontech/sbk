<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
<h4 class="modal-title" id="myModalLabel">Add Inventory Deal</h4>
</div>
<form method="post" onsubmit="return validationallfild()" action="<?=base_url ();?>Deals/Add_InventoryConsumption_deal" class="form-horizontal form-label-left">
<?php if (!empty($newfatch)){ ?>
<input type="hidden" name="dealConsumptionID" value="<?php echo $newfatch[0]->dealConsumptionID ;?>"/>
<?php }?>
  <div class="item form-group">
   <label class="control-label col-md-2 col-sm-10 col-xs-12">Inventory Deal Name</label>
   <div class="col-md-8 col-sm-4 col-xs-12">
<select onchange="fills();" id="dealmasterIds" class="form-control" name="dealMasterID">
<option value="">Select Name</option> 
<?php if(!empty($featuredealName)) { foreach($featuredealName as $featuredeal){ ?>
<option value="<?php echo $featuredeal->dealMasterID ; ?>" <?php if (!empty($newfatch)) { if ($newfatch[0]->dealMasterID==$featuredeal->dealMasterID){echo "selected";}}?>><?php echo $featuredeal->inventoryDealName;?></option>
<?php } }?>
 </select>
</div>
</div>  
<div class="item form-group">
<label class="control-label col-md-2 col-sm-10 col-xs-12">Deal Category Name</label>
<div class="col-md-8 col-sm-4 col-xs-12">
<select onclick="fills();" class="form-control" id="dealIDs" onchange="Deal_category(this.value)">
<option value="">select name</option>
<?php if(!empty($cetegorydeal)) { foreach ($cetegorydeal as $dealcategory) { ?>
<option <?php if(!empty($newfatch)) { if($newfatch[0]->category==$dealcategory->category){echo "selected";}}?>  value="<?php echo $dealcategory->dealID ;?>"><?php echo $dealcategory->category ?></option>
<?php } } ?>
 </select>
</div>
</div> 
<div class="item form-group">
<label class="control-label col-md-2 col-sm-10 col-xs-12">Deal Name</label>
<div class="col-md-8 col-sm-4 col-xs-12">
<select class="form-control" id="mydropdown" name="dealID">
<option value="">Select Name</option>
<?php if (!empty($categorydeal)) { foreach($categorydeal as $ct) { ?>
<option <?php if(!empty($newfatch)) { if($newfatch[0]->dealID==$ct->dealID){echo "selected";}}?> value="<?php echo $ct->dealID ;?>"><?php echo $ct->coupon_title ; ?></option>
<?php }}?>
 </select>
</div>
</div> 
<div class="item form-group">
<label class="control-label col-md-2 col-sm-10 col-xs-12">Sort Order</label>
<div class="col-md-8 col-sm-4 col-xs-12">
<select class="form-control" name="sortOrder">
	<option <?php if(!empty($newfatch)){ if($newfatch[0]->sortOrder==1){ echo"selected"; } } ?> value="1">1</option>
	<option <?php if(!empty($newfatch)){ if($newfatch[0]->sortOrder==2){ echo"selected"; } } ?> value="2">2</option>
	<option <?php if(!empty($newfatch)){ if($newfatch[0]->sortOrder==3){ echo"selected"; } } ?> value="3">3</option>
	<option <?php if(!empty($newfatch)){ if($newfatch[0]->sortOrder==4){ echo"selected"; } } ?> value="4">4</option>
	<option <?php if(!empty($newfatch)){ if($newfatch[0]->sortOrder==5){ echo"selected"; } } ?> value="5">5</option>
</select>
</div>
</div> 
<div class="item form-group">
<label class="control-label col-md-2 col-sm-10 col-xs-12">Status</label>
<div class="col-md-8 col-sm-4 col-xs-12">
<select class="form-control" name="status">
	<option <?php if(!empty($newfatch)){ if($newfatch[0]->Status=='Active'){ echo"selected"; } } ?> value="Active">Active</option>
	<option <?php if(!empty($newfatch)){ if ($newfatch[0]->Status=='Inactive'){echo "selected" ; } } ?> value="Inactive">Inactive</option>
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
//form validation.............
function validationallfild(){
	if(document.getElementById('dealmasterIds').value == "" )
    	{
    		document.getElementById('dealmasterIds').focus() ;				 
			document.getElementById('dealmasterIds').setAttribute('class',' form-control  parsley-error') ;
			return false;
    	}
	if(document.getElementById('dealIDs').value == "")
	{
		document.getElementById('dealIDs').focus();
		document.getElementById('dealIDs').setAttribute('class','form-control parsley-error');
		return false;
	}
}
function fills(){
	if(document.getElementById('dealmasterIds').value != "")
	{
		document.getElementById('dealmasterIds').setAttribute('class','form-control')
	}
	if(document.getElementById('dealIDs').value != "" )
	{
		document.getElementById('dealIDs').setAttribute('class','form-control')
	}
} 
</script>

