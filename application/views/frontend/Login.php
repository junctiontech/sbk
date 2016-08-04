<div class="page-container">
	<div class="main-content"> 
		<div class="page-loading-overlay">
			<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
		</div>			
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-md-2 col-xs-12 col-sm-2"></div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<form class="form-horizontal form-label-left input_mask" action="<?=base_url()?>Login/Checked_login" method="post">
						<div class="col-md-12 col-sm-12 col-xs-12 first_label ">
							<h3>LOGIN</h3>
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
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12  ">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12 form-input ">
									<input type="text" class="form-log " id="inputSuccess2" placeholder="Enter email" name="useremail">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12 form-input">
									<input type="password" class="form-log" id="inputSuccess3" placeholder="Enter Password" name="password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 col-sm-4 col-xs-12 lg_button">
									<button type="submit" name="submit" value="submit" class="btn btn-success">LOGIN</button>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 lg_button ">								 
									<a href="javascript:;" onclick="jQuery('#modal-2').modal('show');"><p>Forgot Password?</p></a>
								</div>
							</div>
							<div class="sign">
								<p style="margin-bottom:10px;font-size:15px">New to SearchB4kharch.com</p>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<a href="<?=base_url();?>Login/signup.html" class="btn btn-success" role="button">SIGN UP</a>
								</div>
							</div>
						</div>
					</form>
					<div class="col-md-1 col-sm-1 col-xs-12 center">									
						<p>OR</p>								
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12 ">									  
					<div class="col-md-11 col-sm-11 col-xs-12 social">
						<?php if(!empty($facebookauthUrl))
								{
									echo '<a href="'.$facebookauthUrl.'"><img src="'.base_url().'frontend/images/facebook-login-button.png" alt=""/></a>';
								} 
						?>
					</div>										
					<div class="col-md-11 col-sm-11 col-xs-12 social">
								<?php
										if(!empty($googleauthUrl)) 
										{
											echo '<a href="'.$googleauthUrl.'"><img src="'.base_url().'frontend/images/goo_login.png" alt=""/></a>';
										}
						?>										
					</div>					
					<p style="font-size:15px">Recover your social account</p>					
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>
</div>
<div class="clear"></div>
<div class="modal fade custom-width" id="modal-2">
	<div class="modal-dialog" style="width: 60%;">		
		<div class="modal-content">				
			<div class="modal-header">				
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>				
				<h4 class="modal-title">Forgot Password?</h4>				
			</div>			
			<div class="modal-body">			
				<form role="form" onsubmit="return Match_email()" class="validate form-horizontal form-label-left input_mask" action="<?=base_url();?>/Landingpage/forgetpassword" method="post">			
				
					<div class="form-group">
							<label class="col-md-3 control-label">Enter your email:</label>
							<div class="col-md-4">	
							<input type="text" class="form-control"id ="Email" onchange="Match_email(this.value)" name="email" data-validate="required" data-message-required="Please Enter your email" placeholder="Please Enter your email" />
								<span style="color:red; display:inline-block" id="lekhpal"></span>
						</div>
						</div>
					<div id="Username"></div>
				
					<div class="modal-footer">					
						<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>				
						<button type="submit" class="btn btn-info">Send</button>				
					</div>				
				</form>			
			</div>	
		</div>		
	</div>	
</div>


