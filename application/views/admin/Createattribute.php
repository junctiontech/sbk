<div class="message" style="margin-top:90px">
<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
</div>

<script type="text/javascript">
$(document).ready(function(){
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?=base_url();?>admin/images/remove-icon.png" style="margin-top:20px"/></a></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>

</head>
<body>
 
 <div class="well" style="overflow: auto">
								
								
								<form role="form" class="form-horizontal form-label-left" novalidate  method="post" action="<?=base_url();?>product/create_attribute">
								
                                <div class="form-group">
								<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Select Category to show product</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" id="select" class="required" name="categoriesID">
									  <option value="">Category</option>
									
									
									<?php foreach($category as $categoryshow){?>
										<option value="<?=isset($categoryshow->categoriesID) ?$categoryshow->categoriesID:''?>"
										
										<?php {if(!empty($id[0]->categoryName))
											{  if($id[0]->categoryName==$categoryshow->categoryName)	
											{  echo"selected"; }   }?>>
										
										<?=isset($categoryshow->categoryName)?$categoryshow->categoryName:''?>
										</option>
										<?php }}?>
									</select>
								</div>
								</div>
								
								<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" style="margin-top:15px">Attribute Lable</label>
								<div class="col-md-5 col-sm-5 col-xs-12 ">
								<div class="field_wrapper">
								<div>
								<input type="text" style="height:20px; vertical-align:top; margin-top:20px;" name="field_name[]" value=""/>
								<a href="javascript:void(0);" class="add_button" title="Add field"><img src="<?=base_url();?>admin/images/add-icon.png" style="margin-top:20px"/></a>
								</div>
								</div>
								<button  id="submit" name="" type="submit" class="btn btn-success">Submit</button>
								</div>
								</div>
							</div>
						
							</form>
                          </div>
						  </body>