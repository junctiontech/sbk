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
                                    <h2>User Wishlist</h2>                                  
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Wishlist</th>
                                                <th class=" "><span class="nobr">Action</span></th>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
										<!-- <?php foreach ($user as $list) {?>
                                            <tr class="even pointer">
                                               <td><?php echo $list->userFirstName ; ?></td>
											   <td><?php echo $list->userEmail ; ?></td>
											   <td><?php echo $list->userEmail ; ?></td>
											   <td><a href =" " >Edit</a> / <a href =" ">Delete<a/></td>
                                            </tr>
										<?php } ?> -->
                                       </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
			</div><div class="clearfix"></div>
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