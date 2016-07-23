<div class="page-container">	
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
						
						<form role="form" class="form-horizontal form-label-left sign_up"   method="post" action="<?=base_url();?>Login/insert_user_info">
						
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">First Name<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="userFirstName" placeholder="First name" required="required" type="text">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Last Name<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="userLastName" placeholder="Last Name" required="required" type="text">
								</div>
							</div>
						  
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Email<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" class="form-control col-md-7 col-xs-12"  name="userEmail" placeholder="Last Name" required="required" type="text">
								</div>
							</div>
							 <div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Password<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="password" name="userPassword" required="required" placeholder="Password" class=" form-control col-md-7 col-xs-12">
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
									<input id="name" type="date" name="userDOB" required="required" placeholder="Date Of Birth" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Mobile No<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="number" name="userMobileNo" required="required" placeholder="Mobile No" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
								
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
							
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
