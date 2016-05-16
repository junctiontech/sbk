
<div class="message" style="margin-top:90px">
<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
</div>
<form role="form" class="form-horizontal form-label-left" novalidate  method="post" action="<?=base_url();?>product/map_product">
	  <div class="well" style="overflow: auto">
			
			
			<div class="form-group">
			<div class="row"  style="margin-top:20px">
			<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Select Category </label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<select class="select2_group form-control" id="select" class="required" name="categoriesID" onchange="search_product()">
				  <option value="">Category</option>
			
				<?php foreach($category as $categoryshow){?>
					<option value="<?=isset($categoryshow->categoriesID) ?$categoryshow->categoriesID:''?>"
					
					<?php {if(!empty($id[0]->categoryName))
											{  if($id[0]->categoryName==$categoryshow->categoryName)	
											{  echo"selected"; }   }?>>
					<?=isset($categoryshow->categoryName)?$categoryshow->categoryName:''?>
					</option>
				<?php }}?>
				</select>
			</div>
			</div>
			<div class="row" style="margin-top:20px">
			<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Product name </label>
			<div class="col-md-6 col-sm-6 col-xs-12 content">
			<select id="productName" class="select2_group form-control" name="productName" >
				<option value="">Select</option>
				<?php { 
				if(!empty($Fetch_ProductName))
				{
				foreach($Fetch_ProductName as $Fetch_ProductName) 	
				{?>
					<option value="<?=isset($Fetch_ProductName->productsID) ?$Fetch_ProductName->productsID:''?>"><?=isset($Fetch_ProductName->productName)?$Fetch_ProductName->productName:''?>				
					</option>
					
				<?php }}}?>
					
			</select>

			</div>
			</div>
			
           <?php if(!empty($mappedproduct)){?>
			   
			<div class="col-md-8 col-sm-8 col-xs-12">
				<button  id="submit" name="submit" type="submit" class="btn btn-success" formaction="<?=base_url();?>product/mapped_product" style="margin-top:20px;float:right">Map Product</button>
			</div>
			
			<div class="col-md-1 col-sm-1 col-xs-12">
				<button  id="submit" name="submit" type="submit" class="btn btn-success"  style="margin-top:20px;float:right">Search</button>
			</div>
		   <?php }?>
		   
		    <?php if(empty($mappedproduct)){?>
			<div class="col-md-9 col-sm-9 col-xs-12">
				<button  id="submit" name="submit" type="submit" class="btn btn-success" style="margin-top:20px;float:right">Search</button>
			</div>
			<?php }?>
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
		
		
		    <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Product List </h3>
                        </div>


                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Category Name</h2>
                                 	
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								    <div class="row">
									<div class="checkbox">
									<label>
										<input type="checkbox"  value="" id="selectall" onclick="selectAll(this)"> Select All </input>
									</label>
                                     </div>
                                

                                   <?php if(!empty($mappedproduct)){?>
										<?php foreach($mappedproduct as $products){?>	
                                        <div class="col-md-55">
										
                                            <div class="thumbnail">
                                                <div class="image view view-first">
                                                    <img style="width: 100%; height:150px; display: block;" src="<?=isset($products->imageName)?$products->imageName:''?>" alt="image" />

                                                </div>
                                                <div class="caption">
                                                    <p><?=isset($products->productName)?$products->productName:''?></p>
													  <p style="margin-top:10px">Price-<?=isset($products->productPrice)?$products->productPrice:''?></p>
												
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
				</form>