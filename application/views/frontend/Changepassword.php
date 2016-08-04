<div class="page-loading-overlay">
				
	<div class="loader-2"><img src="<?=base_url();?>frontend/images/search-animated-icon.gif" style="width:200px;height:200px"></div>
			
</div>
<div class="col-sm-9 col-md-9 col-xs-12 form_content ">
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
 

	<div class="col-md-12 col-sm-12 col-xs-12 form_content">
  					
				 
					 
						<div class="panel-body">
							<p align="center">Change Password</p>
							<form role="form" class="form-horizontal"  method="post" action="<?=base_url ();?>User/updatepssword">								
								<div class="form-group">
									<label class=" col-sm-3 col-xs-6 col-sm-3 control-label">Old Password</label>
									
									<div class="col-sm-6 col-md-6 col-xs-12">
										<input type="password" name="pass" class="form-control" placeholder="Old Password">
									</div>
								</div>	
								<div class="form-group">
									<label class="col-sm-3 col-md-3 col-xs-6 control-label">New Password</label>
									
									<div class="col-sm-6 col-md-6 col-xs-12">
										<input type="password" name="password" class="form-control" placeholder="New Password">
									</div>
								</div>	
								<div class="form-group">
									<label class="col-sm-3 col-md-3 col-xs-7 control-label">Confirm Password</label>
									
									<div class="col-sm-6 col-md-6 col-xs-12">
										<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
										

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
</div>
</div>
</div>
</div><div class="clear"></div>