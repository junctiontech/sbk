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
				<h2>Map Categories</h2>
				<div class="clearfix"></div>
			</div>     
			<div class="x_content">
				<form class="form-horizontal form-label-left" novalidate method="POST" action="<?=base_url();?>Categories/Map_Update" > 
					<?php if (!empty($categoriesID)) { ?>
					<input type="hidden" name="categoriesID" value="<?php echo isset($map[0]->categoriesID)?$map[0]->categoriesID:'';?>">
					<?php } ?>
					<div class="item form-group">
						<label for="find" class="control-label col-md-3 col-sm-3 col-xs-12">Category Name</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" id="categoriesID" onchange="Categories_Map(this.value)" name ="findname" >
								<option>Choose option</option>
								<?php foreach($categories as $name){ ?>
								<option value="<?=$name->categoriesID ;?>" 
										<?php if (!empty ($map[0]->categoriesID)){if ($map[0]->categoriesID == $name->categoriesID){	echo 'Selected' ;} } ?>>
									<?=$name->categoryName ;?></option>													
								<?php } ?>      
							</select> 
						</div>     
					</div>		
					<div class="item form-group">
						<label for="CategoryToShop" class="control-label col-md-3 col-sm-3 col-xs-12">Category In Shop</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" multiple  id="mySelect" name="categoryToShopIDs[]" >
								<?php if(!empty($min)){ foreach($min as $rt) { ?>
								<option value="<?=$rt->categoryToShopID?>" 
										<?php if(!empty($categoriestoshopID)){if($categoriestoshopID==$rt->categoryToShopID){ echo"selected";}}?>>
									<?=$rt->categoryUrl ;?></option>
								<?php } } ?>
							</select>    
						</div>    
					</div>	
					<div class="item form-group" align ="center">
						<button type="submit" class="btn btn-round btn-success">Map</button>
					</div>	
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Map Categories List</h2>
								<div class="clearfix"></div>  
							</div>
							<div class="x_content">   
								<table id="example" class="table table-striped responsive-utilities jambo_table">
									<thead>
										<tr class="headings">
											<th>Category Name</th>
                                            <th>Categories In Shop </th>
											<th>Shop Name</th>
											<th class=" "><span class="nobr">Action</span></th>
										</tr>
                                    </thead>
									<tbody>
										<?php foreach($tablefetch as $data) { ?> 
                                        <tr class="even pointer">
											<td class="a-right a-right "><?php echo $data->categoryName ;?></td>
                                            <td class=" "><?php echo $data->categoryUrl ; ?></td>
											<td class=" "><?php echo $data->shopName ;?></td>
                                            <td class=" "><a href="<?=base_url();?>Categories/MapCategories/<?php echo $data->categoryToShopID; ?>">Edit</a></td>
										</tr>
										<?php } ?>                                                                                 
									</tbody>
                                </table>
							</div>
						</div>
					</div> 
				</form>
			</div>
		</div>     
	</div> 	
</div>
<div class="clearfix"></div>	  
		
<script>
	var asInitVals = new Array();
	$(document).ready(function () {
		var oTable = $('#example').dataTable({
			"oLanguage": {
				"sSearch": "Search all columns:"
			}, 
			"aoColumnDefs": [
				{
					'bSortable': false,                     
					'aTargets': [0]                     
				} //disables sorting for column one            
			],                  
			'iDisplayLength': 12,                
			"sPaginationType": "full_numbers",              
			"dom": 'T<"clear">lfrtip',   
		});              
		$("tfoot input").keyup(function () {             
			/* Filter on the column based on the index of this element's parent <th> */               
			oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));           
		});             
		$("tfoot input").each(function (i) {           
			asInitVals[i] = this.value;            
		});            
		$("tfoot input").focus(function () {               
			if (this.className == "search_init") {               
				this.className = "";             
				this.value = "";             
			}           
		});            
		$("tfoot input").blur(function (i) {             
			if (this.value == "") {               
				this.className = "search_init";               
				this.value = asInitVals[$("tfoot input").index(this)];               
			}              
		});          
	});					
</script>