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
<style>#toTop1 {
    display: none;
    text-decoration: none;
    position: fixed;
    bottom: 100px;
    right: 0px;
    overflow: hidden;
   
    border: none;
    
   
}

#toTopHover1 {
   
    display: block;
    overflow: hidden;
    float: right;
    opacity: 0;
    -moz-opacity: 0;
    
}
</style> 
<div class="row">
	<form role="form" class="form-horizontal form-label-left" novalidate  method="post" action="<?=base_url();?>product/map_product">	 
		<div class="col-md-8" style="overflow: auto">
			<div class="form-group">
				<div class="row"  style="margin-top:20px">			
					<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Select Category </label>			
					<div class="col-md-6 col-sm-6 col-xs-12">				
						<select class="select2_group form-control" id="select" onchange="refresh_data();" class="required" name="categoriesID" ><!--onchange="search_product()"-->				
							<option value="">Category</option>
							<?php foreach($category as $categoryshow){?>				
							<option value="<?=isset($categoryshow->categoriesID) ?$categoryshow->categoriesID:''?>"	
									<?php {if(!empty($id[0]->categoryName)){  if($id[0]->categoryName==$categoryshow->categoryName)	{  echo"selected"; }   }?>><?=isset($categoryshow->categoryName)?$categoryshow->categoryName:''?></option>				
							<?php }}?>				
						</select>			
					</div>			
				</div>
				<div class="row"  style="margin-top:20px">			
					<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label"></label>					
					<div class="col-md-6 col-sm-6 col-xs-12 content">					
						<div class="form-block">						
							<label>							
								<input type="checkbox" name="unmapped" id="unmapped" checked value="unmapped" class="cbr">							
								Unmapped only							
							</label>							
							<br />						
						</div>					
					</div>			
				</div>			
				<div class="row" style="margin-top:20px">			
					<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Product name </label>			
					<div class="col-md-6 col-sm-6 col-xs-12 content">		
						<select id="productName" class="select2_group form-control" onchange="getProductToMapp(this.value);getproductimage(this.value);addkeywords();getMappedProduct(this.value);getProductToMappSnapdeal(this.value);" name="productName" ><!--getProductToMapp(this.value);getProductToMappSnapdeal(this.value)-->			
							<option value="" >Select</option>			
							<?php { if(!empty($Fetch_ProductName)){	foreach($Fetch_ProductName as $Fetch_ProductMap) {?>					
							<option selected value="<?=isset($Fetch_ProductMap->productsID) ?$Fetch_ProductMap->productsID:''?>"><?=isset($Fetch_ProductMap->productName)?$Fetch_ProductMap->productName:''?> <?=isset($Fetch_ProductMap->attr)?$Fetch_ProductMap->attr:''?></option>
							<?php }}}?>		
						</select>		
					</div>			
				</div>			
				<div class="row searchhidden"  style="margin-top:20px">			
				</div>          
				<?php if(!empty($mappedproduct)){?>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<button  id="submit" name="submit" type="submit" class="btn btn-success" formaction="<?=base_url();?>product/mapped_product" style="margin-top:20px;float:right">Map Product</button>
				</div>	
				<div class="col-md-1 col-sm-1 col-xs-12">
					<button  id="submit" name="submit" type="submit" class="btn btn-success"  style="margin-top:20px;float:right">Search</button>
				</div>		  
				<?php }?>
				<?php if(!empty($mappedproduct)){?>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<button  id="submit" name="submit" type="submit" class="btn btn-success" style="margin-top:20px;float:right">Search</button>			
				</div>		
				<?php }?>		
			</div>
		</div>		
		<div id="content-anchor"></div>
		<div class="col-md-2" style="float:left" id="showimage">					
			<?php if(!empty($Fetch_ProductName)){ foreach($Fetch_ProductName as $Fetch_ProductMap) { ?>						
			<div class="thumbnail">                         
				<div class="image view view-first">                            
					<img style="width: 100%; height:150px; display: block;" src="<?=isset($Fetch_ProductMap->imageName)?$Fetch_ProductMap->imageName:''?>" alt="image" />								
				</div>                                 
				<div class="caption">                                   
					<p><?=isset($Fetch_ProductMap->productName)?$Fetch_ProductMap->productName:''?></p>									
					<p style="margin-top:10px">Price-<?=isset($Fetch_ProductMap->productPrice)?$Fetch_ProductMap->productPrice:''?></p>										
					<p style="margin-top:10px">Shop-<?=isset($Fetch_ProductMap->shopName)?$Fetch_ProductMap->shopName:''?></p>								
					<p style="margin-top:10px"><?=isset($Fetch_ProductMap->attr)?$Fetch_ProductMap->attr:''?></p>									
				</div>		
			</div>	 	
			<?php } } ?>                         
		</div>
		</div>		
	<script>          
		$(document).ready(function () {            
			$(".select2_single").select2({                
				placeholder: "Select a state",                
				allowClear: true               
			});              
			$(".select2_group").select2({});              
			$(".select2_multiple").select2({                
				maximumSelectionLength: 4,                
				placeholder: "With Max Selection limit 4",                
				allowClear: true              
			});           
		});       
	</script>    
	<div class="row">                      
		<div class="col-md-4">                    
			<div class="x_panel">                       
				<div class="x_title">                          
					<h2 id="dynamicheading">Mapped product</h2>
					<div class="clearfix"></div>                             
				</div>                               
				<div class="x_content">								
					<div class="row">								
						<div id="mappedproduct">                                
							<?php if(!empty($fetch_productmapped)){?>									
							<?php foreach($fetch_productmapped as $fetch_product){?>                                    
							<div class="col-md-12">											
								<div class="thumbnail" style="height: auto !important;">                                            
									<div class="image view view-first">                                              
										<img style="width: 100%; height:150px; display: block;" src="<?=isset($fetch_product->imageName)?$fetch_product->imageName:''?>" alt="image" />												
									</div>                                              
									<div class="caption">                                              
										<p><?=isset($fetch_product->productName)?$fetch_product->productName:''?></p>												
										<p style="margin-top:10px">Price-<?=isset($fetch_product->productPrice)?$fetch_product->productPrice:''?></p>												
										<p style="margin-top:10px">Shop-<?=isset($fetch_product->shopName)?$fetch_product->shopName:''?></p>												
									</div>                                          
								</div>                                       
							</div>								  
							<?php }} ?>								
						</div>                                   
					</div>                              
				</div>                           
			</div>                      
		</div>    
		<div class="col-md-4">                          
			<div class="x_panel">                           
				<div class="x_title">                             
					<h2>Amazone unmapped product</h2>
					<div class="clearfix"></div>
				</div>                             
				<div class="x_content">							
					<div class="row">
						<div id="unmappedproduct">                                 
							<?php if(!empty($mappedproduct)){?>									
							<?php foreach($mappedproduct as $products){?>                                      
							<div class="col-md-12">
								<div class="thumbnail" style="height: auto !important;">                                          
									<div class="image view view-first">                                             
										<img style="width: 100%; height:150px; display: block;" src="<?=isset($products->imageName)?$products->imageName:''?>" alt="image" />                                             
									</div>                                             
									<div class="caption">                                              
										<p><?=isset($products->productName)?$products->productName:''?></p>												
										<p style="margin-top:10px">Price-<?=isset($products->productPrice)?$products->productPrice:''?></p>												
										<p style="margin-top:10px">Shop-<?=isset($products->shopName)?$products->shopName:''?></p>
										<div class="checkbox">                                                
											<label>                                                  
												<input type="checkbox" value="<?=isset($products->productsID)?$products->productsID:''?>" name="mapped_value[]"> Select to Mapp Product                                                    
											</label>                                               
										</div> 
									</div>                                         
								</div>                                      
							</div>								
							<?php }} ?>
						</div>                                 
					</div>                             
				</div>                          
			</div>                       
		</div>	
		<div class="col-md-4">                            
			<div class="x_panel">                           
				<div class="x_title">
					<h2>Snapdeal unmapped product</h2>                                 
					<div class="clearfix"></div>                              
				</div>                              
				<div class="x_content">								  
					<div class="row">
						<div id="unmappedproductsnapdeal">                                  
							<?php if(!empty($mappedproduct)){?>									
							<?php foreach($mappedproduct as $products){?>	                                      
							<div class="col-md-12">
								<div class="thumbnail" style="height: auto !important;">                                        
									<div class="image view view-first">                                         
										<img style="width: 100%; height:150px; display: block;" src="<?=isset($products->imageName)?$products->imageName:''?>" alt="image" />
									</div>                                            
									<div class="caption">                                               
										<p><?=isset($products->productName)?$products->productName:''?></p>											
										<p style="margin-top:10px">Price-<?=isset($products->productPrice)?$products->productPrice:''?></p>												
										<p style="margin-top:10px">Shop-<?=isset($products->shopName)?$products->shopName:''?></p>											
										<div class="checkbox">                                               
											<label>                                                
												<input type="checkbox" value="<?=isset($products->productsID)?$products->productsID:''?>" name="mapped_value[]"> Select to Mapp Product </input>                                               
											</label>
									</div>  
								</div>                                          
							</div>                                  
						</div>								 
						<?php }} ?>							
					</div>                              
				</div>                            
			</div>                       
		</div>     
	</div>
</div>				  
<a href="javasccript:;" id="toTop1" class="btn btn-success btn-single" onclick="mapp_parent_to_child();" style="margin-top: 170px;">Mapp it</a>			
</form>			
<script>
            function onAddTag(tag) {
						var keyword=$("input[name=filtersearch]").val();
						getProductToMapp(keyword,'keyword');
						search_flipkart(keyword,'keyword');
						getProductToMappSnapdeal(keyword,'keyword'); 
            }

            function onRemoveTag(tag) {
						var keyword=$("input[name=filtersearch]").val();
						getProductToMapp(keyword,'keyword');
						search_flipkart(keyword,'keyword');
						getProductToMappSnapdeal(keyword,'keyword'); 
            }

            function onChangeTag(input, tag) {
						var keyword=$("input[name=filtersearch]").val();
						getProductToMapp(keyword,'keyword');
						search_flipkart(keyword,'keyword');
						getProductToMappSnapdeal(keyword,'keyword'); 
            }

            function sticky_relocate() {    
				var window_top = $(window).scrollTop();    
				var div_top = $('#content-anchor').offset().top;    
				if (window_top > div_top) {        
					$('#sticky').addClass('fixedmapprodu');    
				} else {       
					$('#sticky').removeClass('fixedmapprodu');   
				}  
			}  
	$(function () {    
		$(window).scroll(sticky_relocate);    
		sticky_relocate();  
	});
	
	
			
			$(document).ready(function(){
	  
				$(document).on('keyup', '.select2-search__field', function() { 
				
				search_product(this.value);
				});
				
				$(document).on('click', '.parent', function() { 
				
					if($(this).prop('checked') == true) { 
					
						//$('.parent').removeAttr('checked');
						//$('.parent').attr('checked',false);
						//$('.parent').attr('checked',true);
						//$(this).attr('checked','checked');
						search_flipkart(this.value);
						$('#toTop1').css('display','block');
						$('.map').css('display','none');
					}
				
				});
				
				$(document).on('change', '.parent1', function() { 
			
					if($(this).prop('checked') == true) { 
						getproductimage(this.value,'parent');
						$('#toTop1').css('display','block');
					}
				});
				
				/* $(document).on('click', '#toTop1', function() { 
					mapp_parent_to_child();
				}); */
				
			});
        </script>				
<script src="<?=base_url()?>admin/js/tags/jquery.tagsinput.min.js"></script>