
<!-- Alert section For Message-->
<?php  if($this->session->flashdata('message_type')=='success') { ?>

<div class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
  <strong>
  <?=$this->session->flashdata('message')?>
  </strong> </div>
<?php } if($this->session->flashdata('message_type')=='error') { ?>
<div class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
  <strong>
  <?=$this->session->flashdata('message')?>
  </strong> </div>
<?php } if($this->session->flashdata('category_error')) { ?>
<div class="row" >
  <div class="alert alert-danger" > <strong>
    <?=$this->session->flashdata('category_error')?>
    </strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?> </div>
</div>
<?php }?>
<!-- Alert section End-->
<div class="col-sm-9 col-md-9 col-xs-12 form_content">             
	<div class="panel-body">
			 <p align="center">Personal Information</p>
              <!-- page content -->
                          <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?=base_url ();?>User/userprofileupdate" >
						<?php if (!empty($personal)){ ?>
								<input type="hidden" name="userID" value ="<?php echo isset ($personal[0]->userID)?$personal[0]->userID:'';?>" >
						<?php } ?> 

						<?php if (!empty($personal)){ ?>
								<input type="hidden" name="oldvalue" value ="<?php echo isset ($personal[0]->userProfileImage)?$personal[0]->userProfileImage:'';?>" >
						<?php } ?> 
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="userFirstName" type="text" value="<?php echo isset($personal[0]->userFirstName)?$personal[0]->userFirstName:'';?>">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" name="userLastName" type="text" value="<?php echo isset($personal[0]->userLastName)?$personal[0]->userLastName:'';?>">
                              </div>
                            </div>
                             <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="userDOB" value="<?php echo isset($personal[0]->userDOB)?$personal[0]->userDOB:'';?>" class="form-control" data-inputmask="'mask': '99/99/9999'">
                                                
                                            </div>
                                        </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Email </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" name="userEmail" class="form-control col-md-7 col-xs-12" value="<?php echo isset($personal[0]->userEmail)?$personal[0]->userEmail:'';?>">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile Number </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type=""  name="userMobileNo" class="form-control col-md-7 col-xs-12" value="<?php echo isset($personal[0]->userMobileNo)?$personal[0]->userMobileNo:'';?>">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="radio" class="flat" name="userGender" id="genderM" value="Male"
												<?php if(!empty($personal[0]->userGender))
																	{
																		if ($personal[0]->userGender=='Male')
																			{
																				echo 'checked';
																			}
																	}?>/>
                                Male
                                <input type="radio" class="flat" name="userGender" id="genderF" value="Female" 
												<?php if(!empty($personal[0]->userGender))
																	{
																		if ($personal[0]->userGender=='Female')
																			{
																				echo 'checked';
																			}
																	}?> />
                                Female </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea  name="userAddress" class="form-control col-md-7 col-xs-12"><?php echo isset ($personal[0]->userAddress)?$personal[0]->userAddress:'';?></textarea>
                              </div>
                            </div>
                           <div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Image</label>
									<div class="col-md-6 col-sm-6 col-xs-12" align="center" >
										<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img id="userProfile_Image" src="<?=base_url();?>./uploads/images/userProfileImage/<?=($personal[0]->userProfileImage)?$personal[0]->userProfileImage:'';?>"></div>
											<input type="file" name="userProfileImage" onchange="readURL(this);" class="form-control col-md-6 col-xs-12" >
									</div>
							</div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-md-offset-5">                                
                                <button type="submit" class="btn btn-success" >Save</button>
                              </div>
                            </div>
                          </form>
                         
                     
                    </div>
                  </div>
                
   
 
 		  
              <!-- /page content -->
           
 <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
$(document).on('hidden.bs.modal', function (e) {
		var target = $(e.target);
        target.removeData('bs.modal')
              .find(".modal-content").html('');
    });
	
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('#userProfile_Image').attr('src', e.target.result);
       }
        reader.readAsDataURL(input.files[0]);
       }
    }
    </script>          
</div>
</div>
</div><div class="clear"></div>