<div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> </button>
                      <h4 class="modal-title" id="myModalLabel">Create Inventory Deal</h4>
                    </div>
					
					<form name="form" onsubmit="return checkvalidation()" method="post" action="<?=base_url ();?>Deals/InventoryAdddeal" class="form-horizontal form-label-left">
					<?php if (!empty($inventorydealupd)) { ?>
					<input type="hidden" name="dealMasterID" value="<?php echo $inventorydealupd[0]->dealMasterID ;?>">
					<?php } ?>
<div class="modal-body">

<div class="x_content">
 
            <div class="row">
                                    
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Inventory Deal Name <span aria-hidden="true"></span></label>
						<div class="col-md-10 col-sm-10 col-xs-12">
						  <select onchange="put();" class="form-control" id="dealtypeids" name="dealTypeID">
							<option value="">Select Name</option>
								<?php if(!empty($inventorydealtype)) { foreach($inventorydealtype as $dealtype) {?>
							<option <?php if (!empty($inventorydealupd[0]->dealTypeID))
						{ 
						if ($inventorydealupd[0]->dealTypeID ==$dealtype->dealTypeID)
						{
							echo "selected";
						}
						} ?>   value="<?=isset($dealtype->dealTypeID)?$dealtype->dealTypeID:''?>" ><?=isset($dealtype->inventoryDealName)?$dealtype->inventoryDealName:''?></option>						
								<?php } }?>
						  </select>
						</div>
					</div>
				  
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Max Quantity <span id="id2" aria-hidden="true"></span></label>
						<div class="col-md-10 col-sm-10 col-xs-12">
						  <input onchange="put();" type="text" id="id" name="maxquantity" value="<?=isset($inventorydealupd[0]->maxQuantity)?$inventorydealupd[0]->maxQuantity:''?>" class="form-control" placeholder="max quantity">
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
function checkvalidation(){
	
	if(document.getElementById('dealtypeids').value == "" )
    	{
    			 document.getElementById('dealtypeids').focus() ;
				 document.getElementById('dealtypeids').placeholder="Please select Inventory!" ;
				 document.getElementById('dealtypeids').setAttribute('class',' form-control  parsley-error') ;
				 return false;
    	}
if(document.getElementById('id').value == "")
{
	document.getElementById('id2').focus();
	document.getElementById('id2').placeholder="please Provide Quantity";
	document.getElementById('id').setAttribute('class','form-control parsley-error');
	return false;
}
}
function put(){
	if(document.getElementById('dealtypeids').value != "")
	{
		document.getElementById('dealtypeids').setAttribute('class','form-control')
	}
	if(document.getElementById('id').value != "")
	{		
    	/* document.getElementById('id2').setAttribute('class','required') ;
		document.getElementById('id2').style.color='green' ; */
		document.getElementById('id').setAttribute('class',' form-control ')
    	
	}
}
                         
        </script> 