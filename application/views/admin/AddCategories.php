<div class="">
	<!-- Alert section For Message-->
		 <?php  if($this->session->flashdata('message_type')=='success') { ?>
		  <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><?=$this->session->flashdata('message')?></strong>  </div>
		 <?php } if($this->session->flashdata('message_type')=='error') { ?>
		 <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <strong><?=$this->session->flashdata('message')?></strong>  </div>
		 <?php } if($this->session->flashdata('category_error')) { ?>
<div class="row" >
<div class="alert alert-danger" >
<strong><?=$this->session->flashdata('category_error')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
</div>
</div>
<?php }?>
		 <!-- Alert section End-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                   
                                    <div class="clearfix"></div>
                                </div>
							
                                <div class="x_content">
								  <form class="form-horizontal form-label-left" novalidate method="POST" action="<?=base_url();?>Categories/Add_Categories" >
								  <?php  if(!empty($categoriesID)){?>
	
										<input type="hidden" name="categoriesID" value="<?php echo isset($query[0]->categoriesID)?$query[0]->categoriesID:'';?>">
										
										<?php }?>

                                        <span class="section">Add Categories</span>
										<!-- table content s4k_category_details -->
									
										<div class="item form-group">
                                            <label for="categoryName" class="control-label col-md-3 col-sm-3 col-xs-12">Category Name <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input  class="form-control col-md-7 col-xs-12"  name="categoryName" type="text" required="required" value="<?php echo isset($query[0]->categoryName)?$query[0]->categoryName:''; ?>">
                                            </div>
                                        </div>
										 <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoriesSortOrder">Categories Sort Order <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input  class="form-control col-md-7 col-xs-12"  name="categoriesSortOrder" type="text" required="required" value="<?php echo isset($query[0]->categoriesSortOrder)?$query[0]->categoriesSortOrder:'';?>">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label for="categoriesStatus" class="control-label col-md-3 col-sm-3 col-xs-12">Categories Status </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="categoriesStatus">
                                                    <option value="Active" <?php if (!empty ($query[0]->categoriesStatus))
																							{
																								if ($query[0]->categoriesStatus == 'Active')
																												{
																													echo 'Selected' ;
																												}
																							} ?>>Active</option>
                                                    <option value="Inactive" <?php if (!empty ($query[0]->categoriesStatus))
																							{
																								if ($query[0]->categoriesStatus == 'Inactive')
																												{
																													echo 'selected' ;
																												}
																							} ?>>Inactive</option>
                                                    <option value="Deleted" <?php if (!empty ($query[0]->categoriesStatus))
																							{
																								if ($query[0]->categoriesStatus == 'Deleted')
																									{
																										echo 'selected' ; 
																									}
																							} ?> >Deleted</option>
                                                   </select>
                                            </div>
                                        </div>
                                        <div class="form-group" align="center">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="reset" class="btn btn-primary">Cancel</button>
                                                <button id="send" type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </div>
									</div>
                                 </div>
                              <div class="ln_solid"></div>
                           </form>
					   </div>
                  </div>