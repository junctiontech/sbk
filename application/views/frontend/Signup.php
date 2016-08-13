<div class="page-container">	
<script src='https://www.google.com/recaptcha/api.js'></script>
  <div class="main-content"> 
  <div class="page-loading-overlay">
				<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
			</div>
  <!-- Alert section For Message-->
		 <?php  if($this->session->flashdata('message_type')=='success') {  ?>
		  <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><?=$this->session->flashdata('message')?></strong>  </div>
		 <?php } if($this->session->flashdata('message_type')=='error') { ?>
		 <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><?=$this->session->flashdata('message')?></strong>  </div>
		 <?php } if($this->session->flashdata('category_error_login')) { ?>
<div class="row" >
<div class="alert alert-danger" >
<strong><?=$this->session->flashdata('category_error_login')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
</div>
</div>
<?php }?>
		 <!-- Alert section End-->
<div class="row"> 
			<div class="col-md-1 col-sm-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-10 form_content">
				<div class="panel-body">
					 <p align="center">Signup Form</p>
						
						<form role="form" class="validate form-horizontal form-label-left sign_up" onsubmit="return(get_action())"    method="post" action="<?=base_url();?>Login/insert_user_info">
						
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">First Name<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="userFirstName" placeholder="First name" data-message-required="Please Enter Your First Name" data-validate="required" type="text">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Last Name<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="userLastName" placeholder="Last Name" data-message-required="Please Enter Your Last Name" data-validate="required" type="text">
								</div>
							</div>
						  
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Email<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="userEmail" data-message-required="Please Enter Your Email" placeholder="Email" data-validate="required" type="text">
								</div>
							</div>
							 <div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Password<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="password" name="userPassword" data-validate="required" placeholder="Password" data-message-required="Please Enter Your Password" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="Gender">Gender  <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="radio">
										<label>
											<input type="radio" class="flat" required="required" checked value="Male" name="userGender"> Male 
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" class="flat" required="required" value="Female" name="userGender"> Female
										</label>
									</div>
								
								</div>
							</div>
							
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="userDOB">Date Of Birth<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="input-group ">
								<input type="text" name="userDOB" class="form-control datepicker" data-format="yyyy-mm-dd" placeholder="Date Of Birth" data-validate="required" data-message-required=" ">							
								<div class="input-group-addon">
						
									<a href="#"><i class="linecons-calendar"></i></a>
					
								</div>
								
							</div>
                
						</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Mobile No<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="number" name="userMobileNo" data-validate="required" data-message-required="Please Enter Your Mobile Number" placeholder="Mobile No" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">   <span class="required"></span>
								</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="g-recaptcha" data-sitekey="6LfQWiYTAAAAAD7__GjeLW7habe9EmslR5tKEWrb" style=" "></div>
								<span id="captcha" style= "float:left;color:red;margin-top:10px"></span>
								</div>
							</div>
							
								
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
							<div class="col-sm-6 col-md-6 col-lg-6">
			
			
			</div>	
									<button  id="submit" name="submit" value="submit" type="submit" class="btn btn-success">Signup</button>
									
								</div>
							</div>
						
						</form>
</div>
					</div>
				</div>
			</div>
		</div>
		 <div class="clear"></div>
<script>
function get_action(form) {
	
    var v = grecaptcha.getResponse();
	
    if(v.length == 0)
    {	
        document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
        return false;
    }
    if(v.length != 0)
    {
        document.getElementById('captcha').innerHTML="Captcha completed";
        return true; 
    }
}
</script>