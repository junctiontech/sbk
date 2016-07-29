
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
								<form id="demo-form2" action="<?=base_url();?>product/Viewproductbyfilter" method="get" data-parsley-validate class="form-group form-label-left clearfix">
									<div class="row">
										<div class="form-group col-xs-12 col-sm-3">
											<label class="control-label" for="first-name">Category</label>
											<select class="select2_group form-control" name="categoriesID">
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
										<div class="form-group col-xs-12 col-sm-3">
											<label class="control-label" for="first-name">Shop</label>
											<select class="select2_group form-control" name="shopID">
												<option value="">Shop</option>
												<?php foreach($shops as $shop){?>
												<option value="<?=isset($shop->shopID) ?$shop->shopID:''?>"
												<?php {if(!empty($shopID))
												{  if($shopID==$shop->shopID)	
												{  echo"selected"; }   }?>>
												<?=isset($shop->shopName)?$shop->shopName:''?>
												</option>
												<?php }}?>	
											</select>
										</div>
										<div class="form-group col-xs-12 col-sm-3">
											<label for="middle-name" class="control-label">Status</label>
											<select class="select2_group form-control" name="productStatus">
												<option value="">Status</option>
												<option value="Active" <?php if (!empty($productStatus)) {
													if ($productStatus == "Active") {
														echo"selected";
													}
												} ?>>Active</option>
												<option value="Inactive" <?php if (!empty($productStatus)) {
												if ($productStatus == "Inactive") {
													echo"selected";
												}
												} ?>>Inactive</option>
												<option value="Deleted" <?php if (!empty($productStatus)) {
												if ($productStatus == "Deleted") {
													echo"selected";
												}
												} ?>>Deleted</option>
											</select>
										</div>

										<div class="form-group col-xs-12 col-sm-3">
											<label class="control-label" for="first-name">Live product</label>
											<select class="select2_group form-control" name="liveStatus">
													<option value="">Live product</option>
													<option value="Yes" <?php if (!empty($liveStatus)) {
												if ($liveStatus == "Yes") {
													echo"selected";
												}
												} ?>>Yes</option>
															<option value="No" <?php if (!empty($liveStatus)) {
												if ($liveStatus == "No") {
													echo"selected";
												}
												} ?>>No</option>
											</select>
										</div>

										<div class="form-group col-xs-12 col-sm-3">
											<label class="control-label" for="first-name">Mapp</label>
											<select class="select2_group form-control" name="mapp">
														<option value="">Mapp</option>
														<option value="Mapped" <?php if (!empty($mapp)) {
															if ($mapp == "Mapped") {
																echo"selected";
															}
														} ?>>Mapped</option>
														<option value="Unmapped" <?php if (!empty($mapp)) {
														if ($mapp == "Unmapped") {
															echo"selected";
														}
													} ?>>Unmapped</option>
											</select>
										</div>
                               

                                <div class="form-group col-xs-12 col-sm-4 martop20">
                                    <button type="button" onclick="location.href = '<?= base_url(); ?>Product/Viewproductbyfilter.html'" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">Search</button>
								</div>
							</div>
						</form>
                          </div>


                <div class="">
                    <form class="form-horizontal"  method="post" action="<?=base_url();?>Product/moveToLive">
					<div class="page-title">
                        <div class="title_left">
                            <h3>Product List </h3> <button type="submit" class="btn btn-success">Move To Live</button>
                        </div>
						
                           
							
							<div class="dypagination">
               
										<?php echo isset($pagination)?$pagination:'';?> <?php echo isset($paginationPagedrop)?$paginationPagedrop:'';?>
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
<style type="text/css">
 .paginate {
 	font-family: Arial, Helvetica, sans-serif;
 	font-size: .9em;
 }
 
 a.paginate {
 	border: 1px solid #000080;
 	padding: 2px 6px 2px 6px;
 	text-decoration: none;
 	color: #000080;
 }
 
 
 a.paginate:hover {
 	background-color: #000080;
 	color: #FFF;
 	text-decoration: underline;
 }
 
 a.current {
 	border: 1px solid #000080;
 	font: bold .9em Arial,Helvetica,sans-serif;
 	padding: 2px 6px 2px 6px;
 	cursor: default;
 	background:#000080;
 	color: #FFF;
 	text-decoration: none;
 }
 
 span.inactive {
 	border: 1px solid #999;
 	font-family: Arial, Helvetica, sans-serif;
 	font-size: .9em;
 	padding: 2px 6px 2px 6px;
 	color: #999;
 	cursor: default;
 }
 
 table {
 	margin: 8px;
 }
 
 th {
 	font-family: Arial, Helvetica, sans-serif;
 	font-size: .9em;
 	background: #666;
 	color: #FFF;
 	padding: 2px 6px;
 	border-collapse: separate;
 	border: 1px solid #000;
 }
 
 td {
 	font-family: Arial, Helvetica, sans-serif;
 	font-size: .9em;
 	border: 1px solid #DDD;
 }
 </style>
 <script>
 function hilite(elem)
 {
 	elem.style.background = '#FFC';
 }
 
 function lowlite(elem)
 {
 	elem.style.background = '';
 }
 </script>
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
                                                  
                                                </div>
                                                <div class="caption shrink">
                                                    <p><?=isset($products->productName)?$products->productName:''?></p>
													  <p style="margin-top:10px">Price-<?=isset($products->productPrice)?$products->productPrice:''?></p>
													    <p style="margin-top:10px">shop-<?=isset($products->shopName)?$products->shopName:''?></p>
													  
													<?php if(($products->productsStatus)=='Active'){?>
													
													<div class="col-md-3 col-sm-3 col-xs-12">
														<a class="btn btn-small btn-danger show-tooltip" href="<?php echo base_url();?>Product/inactiveproduct/inactive/<?=isset($products->productsID)?$products->productsID:''?>?categoriesID=<?=isset($products->categoriesID)?$products->categoriesID:''?>">Inactive</a>
													</div>
													
													<?php }else{ ?>
													  
													  <div class="col-md-3 col-sm-3 col-xs-12">
													<a class="btn btn-small btn-primary show-tooltip" name="status" value="Active" href="<?php echo base_url();?>Product/inactiveproduct/active/<?=isset($products->productsID)?$products->productsID:''?>?categoriesID=<?=isset($products->categoriesID)?$products->categoriesID:''?>">Active</a>
													</div>
														 <?php  } ?>
                                                </div>
												
												 
												
                                            </div>
											<?php if($products->mapp=='Unmapped' && $products->liveStatus=='No'){ ?>
													<div class="col-md-9 col-sm-9 col-xs-12 checkbox">
														<label class="btn btn-primary "><input type="checkbox" class="checkbox " name="productsID[]" value="<?=isset($products->productsID)?$products->productsID:''?>">Move to live</label>
											
											</div>
													
          
											<?php } ?>
                                        </div>
										<?php }?>
										</form>
										<div class="dypagination">
               
										<?php echo isset($pagination)?$pagination:'';?> <?php echo isset($paginationPagedrop)?$paginationPagedrop:'';?>
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
