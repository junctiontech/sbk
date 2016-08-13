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
<div class="message" style="margin-top:90px">
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
							<?php {if(!empty($categoriesID)){  if($categoriesID==$categoryshow->categoriesID){  echo"selected"; }   }?>>
										<?=isset($categoryshow->categoryName)?$categoryshow->categoryName:''?></option>
										<?php }}?>
				</select>	
			</div>			
			<div class="col-md-3 col-sm-3 col-xs-12">
				<button  id="submit" name="" type="submit" class="btn btn-success">Search</button>
			</div>		
		</div>			
	</form>            
</div>
<form class="form-horizontal"  method="post" action="<?=base_url();?>Product/updateSatusInactiveproduct">
	<div class="">
		<div class="page-title">                      
			<div class="title_left">                          
				<h3>Product List </h3>							
				<label style="display: inline-flex; vertical-align: middle;" class="">				
					<input type="checkbox" id="checkall"class="checkbox"/>				
					Check All			
				</label>							
				<button type="submit" name="status" value="Active" class="btn btn-success">Active</button> 							
				<button type="submit" name="status" value="Inactive" class="btn btn-success">Inactive</button>                       
			</div>		
			<div class="title_right">                         
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
									<div class="caption shrink">                                               
										<p><?=isset($products->productName)?$products->productName:''?></p>												
										<p style="margin-top:10px">Price-<?=isset($products->productPrice)?$products->productPrice:''?></p>
										<?php if(($products->productsStatus)=='Active'){?>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="col-md-6">											
												<a style="margin-left:-20px" class="btn btn-small btn-danger show-tooltip">Inactive</a>											
											</div>											
											<div class="col-md-6">										
												<input type="checkbox" style="margin-left:15px" class="checkbox" name="shopProductID[]" value="<?=isset($products->shopProductID)?$products->shopProductID:''?>">									
											</div>												
										</div>
										<?php }else{ ?>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="col-md-6">
												<a style="margin-left:-20px" class="btn btn-small btn-danger show-tooltip">Active</a>
											</div>
											<div class="col-md-6">
												<input type="checkbox" style="margin-left:15px" class="checkbox" name="shopProductID[]" value="<?=isset($products->shopProductID)?$products->shopProductID:''?>">									
											</div>
										</div>													
										<?php  } ?>                                               
									</div>                                         
								</div>
							</div>
							<?php }?>
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
							<?php	} ?>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</form>
<script>
	$('#checkall').click(function () {    
    $(':checkbox.checkbox').prop('checked', this.checked);    
 });	
</script>