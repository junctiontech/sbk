<style type="text/css">
        #myTable span {
    background: none repeat scroll 0 0 #e74c3c;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
    padding: 5px 7px;
    text-align: center;
}
      
	 #loading-indicator { 
  left: 0;
  margin-top: 300px;
  bottom: 0;
  right: 0;
  background: white;
  z-index: 10000;
  zoom: 1;
  filter: alpha(opacity=100);
  -webkit-opacity: 1;
  -moz-opacity: 1;
  opacity: 1;
  -webkit-transition: all 800ms ease-in-out;
  -moz-transition: all 800ms ease-in-out;
  -o-transition: all 800ms ease-in-out;
  transition: all 800ms ease-in-out;
     }   
        </style>
<!-- page content -->
  
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Create inventory</h3>
          </div>
          <div class="title_right">
            <div class="input-group pull-right"> 
             <button href="<?=base_url();?>Inventory/Loadinventorymodal" type="button" class="btn btn-success taright" data-toggle="modal" data-target=".bs-example-modal-lg">Add Inventory</button> 
            
            <!-- <a id="menu_toggle2"><button class="btn btn-primary" type="button">Full Screen</button></a>-->
            </div>
          </div>
          
          <!--pop up start-->
          
          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		  
                <div class="modal-dialog modal-lg">
                  <div class="modal-content ">
                    
                    
                  </div>
                </div>
              </div>
              
           <!--pop up end-->    
              
              
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
                <h2>Inventory list</h2>
                
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                  <thead>
                    <tr>
                      <th>Inventory Name</th>
                      <th>Max Quantity</th>
                      <th>Created On</th>
					   <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
				  <?php foreach($inventries as $inventory){?>
                    <tr>
                      <td><?=isset($inventory->inventoryName)?$inventory->inventoryName:''?></td>
                      <td><?=isset($inventory->maxQuantity)?$inventory->maxQuantity:''?></td>
                      <td><?=isset($inventory->createdOn)?$inventory->createdOn:''?></td>
                      <td class=" last"><a href="<?=base_url();?>Inventory/Loadinventorymodal/<?=isset($inventory->inventoryMasterID)?$inventory->inventoryMasterID:''?>" data-toggle="modal" data-target=".bs-example-modal-lg">View</a></td>
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




//validation start..........................................................................

function checkvalidation(){
	
	if(document.getElementById('inventoryid').value == "" )
    	{
    			 document.getElementById('inventoryid').focus() ;
				 document.getElementById('inventoryid').placeholder="Please select Inventory!" ;
				 document.getElementById('inventoryid').setAttribute('class',' form-control  parsley-error') ;
				 return false;
    	}
		
		if(document.getElementById('inventoryunit').value == "" )
    	{
    			 document.getElementById('inventoryunit').focus() ;
				 document.getElementById('inventoryunit').placeholder="Please select Unit" ;
				 document.getElementById('inventoryunit').setAttribute('class',' form-control parsley-error') ;
				 return false;
    	}
		
		if(document.getElementById('maxquan').value == "" )
    	{
    			 document.getElementById('maxquan').focus() ;
				 document.getElementById('maxquan').placeholder="Please Provide Quantity" ;
				 document.getElementById('maxquan').setAttribute('class',' form-control parsley-error') ;
				 return false;
    	}
		if(document.getElementById('overid').value == "" )
    	{
    			 document.getElementById('overid').focus() ;
				 document.getElementById('overid').placeholder="Please Select Overdrawing" ;
				 document.getElementById('overid').setAttribute('class',' form-control parsley-error') ;
				 return false;
    	}
		if(document.getElementById('cityid').value == "" )
    	{
    			 document.getElementById('cityid').focus() ;
				 document.getElementById('cityid').placeholder="Please select City" ;
				 document.getElementById('cityid').setAttribute('class',' form-control parsley-error') ;
				 return false;
    	}
		
	return( true );
	
}

function fill(){
	
	if(document.getElementById('inventoryid').value != "" )
    	{
    			 document.getElementById('inventoryidmes').setAttribute('class','required fa fa-check') ;
				 document.getElementById('inventoryidmes').style.color='green' ;
				 document.getElementById('inventoryid').setAttribute('class',' form-control ') ;
    	}
		
		if(document.getElementById('inventoryunit').value != "" )
    	{
    			  document.getElementById('inventoryunitmes').setAttribute('class','required fa fa-check') ;
				  document.getElementById('inventoryunitmes').style.color='green';
				  document.getElementById('inventoryunit').setAttribute('class',' form-control ') ;
    	}
		if(document.getElementById('maxquan').value != "" )
    	{
    			  document.getElementById('maxquanmes').setAttribute('class','required fa fa-check') ;
				  document.getElementById('maxquanmes').style.color='green';
				  document.getElementById('maxquan').setAttribute('class',' form-control ') ;
    	}
		if(document.getElementById('overid').value != "" )
    	{
    			  document.getElementById('overidmes').setAttribute('class','required fa fa-check') ;
				  document.getElementById('overidmes').style.color='green';
				  document.getElementById('overid').setAttribute('class',' form-control ') ;
    	}
		if(document.getElementById('cityid').value != "" )
    	{
    			  document.getElementById('cityidmes').setAttribute('class','required fa fa-check') ;
				  document.getElementById('cityidmes').style.color='green';
				  document.getElementById('cityid').setAttribute('class',' form-control ') ;
    	}
}
	




    </script> 
