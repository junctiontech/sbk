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
<div class="" role="main">
                <div class="">                   
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Api Information</h2>
                                  <div align="right">
											<button href="<?=base_Url();?>Setting/Addapi" type="button" class="btn btn-success taright" data-toggle="modal" data-target=".bs-example-modal-lg">Add Api</button> </div>
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>apiName</th>
                                                <th>appID</th>
                                                <th>appSecreatID</th>
                                                <th>Status</th>
												<th>createdOn</th>
                                                <th class=" "><span class="nobr">Action</span></th>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
										<?php foreach ($tableapi as $api) {?>
                                            <tr class="even pointer">
                                               <td><?php echo $api->apiName ; ?></td>
											   <td><?php echo $api->appID ; ?></td>
											   <td><?php echo $api->appSecreatID ; ?></td>
											   <td><?php echo $api->Status ; ?></td>
											   <td><?php echo $api->createdOn ; ?></td>
											   <td><a data-toggle="modal" data-target=".bs-example-modal-lg" href ="<?=base_Url (); ?>Setting/Addapi/<?php echo $api->apiID ; ?>" >Edit</a> / <a href ="<?=base_Url();?>Setting/Delete_api/<?php echo $api->apiID ; ?>">Delete<a/></td>
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