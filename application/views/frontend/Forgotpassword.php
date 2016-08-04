<div class="page-container">
	<div class="main-content">
		<div class="page-loading-overlay">
			<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
		</div>	
		<div class="row">
			<div calss="col-md-2 col-sm-2 col-xs-12"></div>
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="panel-body form_content">			
					<p align="center">Forgot Password?</p>			
					<form role="form" class="validate form-horizontal" onsubmit="return match_otp()"   method="post" action="<?=base_url();?>Login/reset_password">			
						<div class="form-group">					
							<label class="col-sm-4 col-md-4 col-xs-6 control-label">Enter your email</label>				
							<div class="col-sm-6 col-md-6 col-xs-12">					
								<input type="text" class="form-control"id ="Email" onchange="Match_email(this.value)" name="email" data-validate="required" data-message-required="Please Enter your email" placeholder="Please Enter your email" />
								<span style="color:red; display:inline-block" id="lekhpal"></span>			
							</div>				
						</div>	
						<div class="form-group">					
							<label class="col-sm-4 col-md-4 col-xs-6 control-label">Enter Your OTP Code</label>				
							<div class="col-sm-6 col-md-6 col-xs-12">								
								<input type="text" class="form-control"id ="otp" onchange="match_otp(this.value)" name="otp" placeholder="Enter Your OTP Code" />
								<span style="color:red; display:inline-block" id="otperror"></span>
							</div>				
						</div>							
						<div class="form-group">					
							<label class="col-sm-4 col-md-4 col-xs-6 control-label">New Password</label>				
							<div class="col-sm-6 col-md-6 col-xs-12">					
								<input type="password" name="password" class="form-control" placeholder="New Password" data-validate="required" data-message-required="Please Enter your new password" >					
							</div>				
						</div>	
						
						<div class="form-group">				
							<label class="col-sm-4 col-md-4 col-xs-7 control-label">Confirm Password</label>				
							<div class="col-sm-4 col-md-6 col-xs-12">						
								<input type="password" class="form-control" name="password2" placeholder="Confirm Password" data-validate="required" data-message-required="Please Enter your confirm password" >				
							</div>					
						</div>				
						<div class="form-group"> 				
							<div class="col-md-6 col-md-offset-5"> 
								<button type="submit" class="btn btn-success" >Change Password</button> 
							</div>  
						</div>		
					</form>			
				</div>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-12"></div>
		</div>
	</div>
</div>
<div class="clear"></div>