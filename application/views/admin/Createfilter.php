
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
								
								
								<form role="form" class="form-horizontal form-label-left" novalidate  method="post" action="<?=base_url();?>Categories/Filter.html">
								
                                <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 form-label">Select Category </label>
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
									<button  id="submit" name="" type="submit" class="btn btn-success">Get</button>
								<button href="<?=base_url();?>Categories/createfiltermodel" type="button" class="btn btn-success taright" data-toggle="modal" data-target=".bs-example-modal-lg">Create Filter</button>
								</div>
								
							</div>
						
							</form>
							
                          </div>

<!--pop up start-->
          
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		  
                <div class="modal-dialog modal-lg">
                  <div class="modal-content ">
                    
                    
                  </div>
                </div>
              </div>
              
           <!--pop up end--> 
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><?=isset($categoriesID)?ucwords($categoriesID):''?> Filter List</h3>
                        </div>

                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                
                                <div class="x_content">

                                    <div class="row">

                                   <?php if(!empty($catfilters)){?>
									
                                         <table id="example" class="table table-striped responsive-utilities jambo_table">
                  <thead>
                    <tr>
                      <th>Group Name</th>
                      <th>Category Name</th>
                      <th>Sort order</th>
                      <th>Status</th>
                       <th>Filter Type</th>
					   <th>Config Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php foreach($catfilters as $catfilter){?>
                    <tr>
                      <td><?=isset($catfilter->groupName)?$catfilter->groupName:''?></td>
                      <td><?=isset($catfilter->categoryName)?$catfilter->categoryName:''?></td>
                      <td><?=isset($catfilter->sortOrder)?$catfilter->sortOrder:''?></td>
                      <td><?=isset($catfilter->filterStatus)?$catfilter->filterStatus:''?></td>
                      <td><?=isset($catfilter->filterType)?$catfilter->filterType:''?></td>
					  <?php $grpattr=$this->Categories_model->get_grpatt(isset($catfilter->filterGroupID)?$catfilter->filterGroupID:''); if(!empty($grpattr)){ foreach($grpattr as $config){ ?>
					  <td><?=isset($config->lable)?$config->lable:''?></td>
					  <?php } }else{?>
					  <td></td>
					  <?php } ?>
					   <td class=" last"><a href="<?=base_url();?>Categories/createfiltermodel/<?=isset($catfilter->filterGroupID)?$catfilter->filterGroupID:''?>" data-toggle="modal" data-target=".bs-example-modal-lg">Edit</a></td>
                    </tr>
				  <?php  } ?>
                   
                </tbody>
                </table>
										<?php }else{ ?>
									
								
											 <div class="col-sm-12 col-md-6 col-lg-6">
											 <p>No filters are available for this category!!!</p>
											 </div>
									<?php	}
									?>							  
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
<script type="text/javascript">
       $(document).on('hidden.bs.modal', function (e) {
		var target = $(e.target);
        target.removeData('bs.modal')
              .find(".modal-content").html('');
    });
	
	$(document).ajaxSend(function(event, request, settings) {
   $("#loader").fadeIn();
});

$(document).ajaxComplete(function(event, request, settings) {
    $("#loader").fadeOut();
});


</script>

<script type="text/javascript">
$(document).ready(function(){
	
	var maxField = 10; 
	var addButton = $('.add_button'); 
	var wrapper = $('.field_wrapper'); 
	
	var fieldHTML = '<div><div class="col-md-3 col-sm-3 col-xs-3"><input type="text" class="form-control" placeholder="Lable" name="lable[]" value=""/></div><div class="col-md-4 col-sm-4 col-xs-4"><input type="text" class="form-control" placeholder="Name" name="name[]" value=""/></div><div class="col-md-4 col-sm-4 col-xs-4"><input type="text" class="form-control" placeholder="Value"  name="value[]" value=""/></div><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?=base_url();?>admin/images/remove-icon.png" style="margin-top:20px"/></a></div>'; 
	var x = 1; 
	
	$(document).on('click', '.add_button', function() { 
				if(x < maxField){ 
			x++; 
			
			$('.field_wrapper').append(fieldHTML); 
			}
		});
		
	$(document).on('click', '.remove_button', function(e){ 
		e.preventDefault();
		$(this).parent('div').remove(); 
		x--; 
	});
	
});
</script>