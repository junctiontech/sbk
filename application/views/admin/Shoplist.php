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
                                    <h2>Shop List</h2>                                    
										<div align="right">
											<button href="<?=base_Url();?>Setting/Addshop" type="button" class="btn btn-success taright" data-toggle="modal" data-target=".bs-example-modal-lg">Add Shop</button> </div>
											</div>
												<div class="clearfix"></div>
													<div class="row">								
														<div class="x_content">
															<div style="overflow-x:auto; overflow-y:hidden;">
                              <table id="example" class="table table-striped responsive-utilities jambo_table">
									<thead>
                                            <tr class="headings">
                                                <th>Shop Url</th>
                                                <th>Shop Api Url</th>
												<th>Shop Api Key</th>
												<th>Shop Api Token</th>
												<th>Shop Name</th>
												<th>Shop Sort Order</th>
												<th>Shop Status</th>
												<th>Shop key</th>
												<th>Created On</th>
												<th class=" "><span class="nobr">Action</span></th>
											</tr>
                                        </thead>
                                  <tbody>
										<?php foreach ($shop as $data) {?>
                                            <tr class="even pointer">
                                                <td class="a-right a-right"><?php echo $data->shopUrl ; ?></td>
                                                <td><?php echo $data->shopApiUrl ; ?></td>
												<td><?php echo $data->shopApiKey ; ?></td>
												<td><?php echo $data->shopApiToken ; ?></td>
												<td><?php echo $data->shopName ; ?></td>
												<td><?php echo $data->shopSortOrder ; ?></td>
												<td><?php echo $data->shopStatus ; ?></td>
												<td><?php echo $data->shopkey ; ?></td>
												<td><?php echo $data->createdOn ; ?></td>
												<td class=" "><a data-toggle="modal" data-target=".bs-example-modal-lg" href ="<?=base_url();?>Setting/Addshop/<?php echo $data->shopID ; ?>">Edit</a> <a href="<?=base_url();?>Setting/delete_Shop/<?php echo $data->shopID; ?>">Delete</a></td>
											</tr>
										<?php } ?>                                                                               
                                   </tbody>
                                </table>
								</div>
						   </div>
						</div>
					</div>
				</div> 
			</div>
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
