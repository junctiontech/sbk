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
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });

        /* FOR DEMO ONLY */
        $('#vfields').change(function () {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function () {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    
	</script>