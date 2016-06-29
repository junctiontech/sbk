
<div class="message" style="margin-top:90px">
<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
</div>
                          <div class="well" style="overflow: auto">
								
								
								<form role="form" class="form-horizontal form-label-left" novalidate  method="get" action="<?=base_url();?>product/fetch_product">
								
                                <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Select Category to show product</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" id="select" class="required" name="categoriesID">
									  <option value="">Category</option>
									
									
									<?php foreach($category as $categoryshow){?>
										<option value="<?=isset($categoryshow->categoriesID) ?$categoryshow->categoriesID:''?>"
										
										<?php {if(!empty($categoriesID))
											{  if($categoriesID==$categoryshow->categoriesID)	
											{  echo"selected"; }   }?>>
										
										<?=isset($categoryshow->categoryName)?$categoryshow->categoryName:''?>
										</option>
										<?php }}?>
									</select>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-12">
									<button  id="submit" name="" type="submit" class="btn btn-success">Search</button>
								</div>
								
							</div>
						
							</form>
                          </div>


                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Product List </h3>
							
                        </div>
	
						 <div class="title_right">
                           <div class="dypagination">
               
										<?php echo isset($pagination)?$pagination:'';?>
										<style>
										.dypagination{margin:10px;text-align:right}
										.dypagination ul{}
										.dypagination ul li{text-align:center;list-style:none;list-style-image:none;margin-right:4px;display:inline-block}
										.dypagination ul li a{display:inline-block;background:#DDDDDD;padding:6px 9px;color:#666;font-size:13px;text-decoration:none}
										.dypagination ul li a.active{background:#670099;color:#FFF}				
										.dypagination ul li:last-child{margin-right:0}               
										
										</style>
									   </div>
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                
                                <div class="x_content">

                                    <div class="row">

                                   <?php if(!empty($products)){?>
										<?php foreach($products as $products){?>	
                                        <div class="col-md-55">
										
                                            <div class="thumbnail">
                                                <div class="image view view-first">
                                                    <img style="width: 100%; height:150px; display: block;" src="<?=isset($products->imageName)?$products->imageName:''?>" alt="image" />
                                                  <div class="mask">
						
                                                           <div class="tools tools-bottom">
                                                           
                                                            <a href="<?=base_url();?>Product/edit/<?=isset($products->productsID)?$products->productsID:''?>"><i class="fa fa-pencil"></i></a>
															
                                                            <a href="<?=base_url();?>Product/delete/<?=isset($products->categoriesID)?$products->categoriesID:''?>/<?=isset($products->productsID)?$products->productsID:''?>"><i class="fa fa-times"></i></a>
                                                        </div>
														</div>
                                                </div>
                                                <div class="caption">
                                                    <p><?=isset($products->productName)?$products->productName:''?></p>
													  <p style="margin-top:10px">Price-<?=isset($products->productPrice)?$products->productPrice:''?></p>
													  
													<?php if(($products->productsStatus)=='Active'){?>
													
													<div class="col-md-3 col-sm-3 col-xs-12">
														<a class="btn btn-small btn-danger show-tooltip" href="<?php echo base_url();?>Product/update/<?=isset($products->categoriesID)?$products->categoriesID:''?>/inactive/<?=isset($products->productsID)?$products->productsID:''?>">Inactive</a>
													</div>
													
													<?php }else{ ?>
													  
													  <div class="col-md-3 col-sm-3 col-xs-12">
													<a class="btn btn-small btn-primary show-tooltip" name="status" value="Active" href="<?php echo base_url();?>Product/update/<?=isset($products->categoriesID)?$products->categoriesID:''?>/active/<?=isset($products->productsID)?$products->productsID:''?>">Active</a>
													</div>
														 <?php  } ?>
                                                </div>
                                            </div>
											
                                        </div>
										
										<?php }?>
										<div class="dypagination">
               
										<?php echo isset($pagination)?$pagination:'';?>
										<style>
										.dypagination{margin:10px;text-align:right}
										.dypagination ul{}
										.dypagination ul li{text-align:center;list-style:none;list-style-image:none;margin-right:4px;display:inline-block}
										.dypagination ul li a{display:inline-block;background:#DDDDDD;padding:6px 9px;color:#666;font-size:13px;text-decoration:none}
										.dypagination ul li a.active{background:#670099;color:#FFF}				
										.dypagination ul li:last-child{margin-right:0}               
										
										</style>
									   </div>
										<?php }else{ ?>
									
								
											 <div class="col-sm-12 col-md-6 col-lg-6">
											 <p>No products available</p>
											 </div>
									<?php	}
									?>							  
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>