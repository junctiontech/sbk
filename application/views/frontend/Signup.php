<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 signup_form">
				<div class="x_panel">
			<div class="col-md-1 col-sm-1 col-lg-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-10 form_content">
				
						<h2 style="font-size:25px;color:purple;margin-left:60px;margin-top:50px">Signup Form</h2>
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
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="userDOB">Dob<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="date" name="userDOB" required="required" placeholder="Dob" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label" for="name">Mobno<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="name" type="number" name="userMobileNo" required="required" placeholder="Mobno" class=" form-control col-md-7 col-xs-12">
								</div>
							</div>
							
								
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
							
									<button  id="submit" name="submit" type="submit"style="background-color:black; color:white;border-color:black" class="btn btn-success">Submit</button>
									<a href="<?=base_url();?>Login/dashboard" style="background-color:black; color:white;border-color:black" class="btn btn-success">Dashboard</a>
								</div>
							</div>
						
						</form>

					</div>
				</div>
			</div>
		</div>