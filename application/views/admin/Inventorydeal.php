<div class="x_title">
    <h2>Inventory Deals Consumption</h2>                                    
		<div align="right">
			<button href="<?=base_Url();?>Deals/AddInventorydeal" type="button" class="btn btn-success taright" data-toggle="modal" data-target=".bs-example-modal-lg">Add Inventory Deals</button> 
		</div>
</div>


<div class="clearfix"></div>
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



  <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Inventory Deals</h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                  <thead>
                    <tr>
                      <th>Inventory Deals Name</th>
                      <th>Deals Name</th>
                      <th>Sort order</th>
                      <th>Status</th>
                       <th>Created On</th>
					   <th>Action</th>                      
                    </tr>
                  </thead>
                  <tbody>
				 <?php foreach($newdeals as $newdeal){?>
                    <tr>
                      <td><?=isset($newdeal->inventoryDealName)?$newdeal->inventoryDealName:''?></td>
                      <td><?=isset($newdeal->coupon_title)?$newdeal->coupon_title:''?></td>
                      <td><?=isset($newdeal->sortOrder)?$newdeal->sortOrder:''?></td>
                      <td><?=isset($newdeal->status)?$newdeal->status:''?></td>
                      <td><?=isset($newdeal->createdOn)?$newdeal->createdOn:''?></td>
					   <td class=" last"><a href="<?=base_Url();?>Deals/AddInventorydeal/<?=isset($newdeal->dealConsumptionID)?$newdeal->dealConsumptionID:''?>" data-toggle="modal" data-target=".bs-example-modal-lg">View</a></td>
                    </tr>
				  <?php  } ?>
                   
                </tbody>
                </table>
              </div>              
            </div>                  
          </div>    
        </div>
      </div>
      <!-- /page content -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">		  
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">                   
        </div>
    </div>
</div>
<script>
$(document).on('hidden.bs.modal', function (e) {
		var target = $(e.target);
        target.removeData('bs.modal')
              .find(".modal-content").html('');
    });
</script>