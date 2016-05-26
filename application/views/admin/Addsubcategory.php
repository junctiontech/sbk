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
							<span class="section">Add Sub Categories</span>
                                <div class="x_content">
								  <form class="form-horizontal form-label-left" novalidate method="POST" action="<?=base_url();?>Subcategories/Add_subcategory" >
								<?php  if(!empty($subCategoriesID)){?>
								<input type="hidden" name="subCategoriesID" value="<?php echo isset($query[0]->subCategoriesID)?$query[0]->subCategoriesID:'';?>">
										<?php }?>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Categories</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" id ="categoriesID" onchange="Get_categoryurl(this.value)" name="fildname">
												<option value=" ">Choose option</option>
												<?php foreach ($category as $data) { ?>
                                                    <option value="<?=$data->categoriesID ; ?>" <?php if (!empty ($query[0]->categoriesID))
															{
															 if ($query[0]->categoriesID == $data->categoriesID)
																{
																	echo 'Selected' ;
																}
															} ?>><?=$data->categoryName ;?></option>
												<?php } ?>
                                                   </select>
                                            </div>
                                        </div>	
										<div class="item form-group">
                                            <label for="CategoryToShop" class="control-label col-md-3 col-sm-3 col-xs-12">Category In Shop</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" multiple  id="mySelect" name="categoryToShopIDs[]" >
												<?php if (!empty($Data)){ foreach ($Data as $dt){	?>
													<option value="<?=$dt->categoryToShopID?>" <?php if (!empty ($query[0]->categoryToShopID))
															{
															 if ($query[0]->categoryToShopID == $dt->categoryToShopID)
																{
																	echo 'Selected' ;
																}
															} ?>><?=$dt->categoryUrl;?></option>
												<?php } } ?>
												</select>
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label for="categoryName" class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category Name <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input  class="form-control col-md-7 col-xs-12"  name="subCategoryName" type="text" required="required" value="<?php echo isset($query[0]->subCategoryName)?$query[0]->subCategoryName:'';?>">
                                            </div>
                                        </div>
										 <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Categories Sort Order <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <input  class="form-control col-md-7 col-xs-12"  name="subCategoriesSortOrder" type="text" required="required" value="<?php echo isset($query[0]->subCategoriesSortOrder)?$query[0]->subCategoriesSortOrder:'';?>">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Categories Status </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="subCategoriesStatus">
                                                    <option value="Active"<?php if(!empty($query[0]->subCategoriesStatus)){
														if ($query[0]->subCategoriesStatus == 'Active' )
														{
															echo 'selected';
														}
													}?>>Active</option>
                                                    <option value="Inactive"<?php if(!empty($query[0]->subCategoriesStatus)){
														if ($query[0]->subCategoriesStatus == 'Inactive' )
														{
															echo 'selected';
														}
													}?> >Inactive</option>
                                                    <option value="Deleted" <?php if(!empty($query[0]->subCategoriesStatus)){
														if ($query[0]->subCategoriesStatus == 'Deleted' )
														{
															echo 'selected';
														}
													}?> >Deleted</option>
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
				  
<script>
$(document).on('hidden.bs.modal', function (e) {
		var target = $(e.target);
        target.removeData('bs.modal')
              .find(".modal-content").html('');
    });
</script>