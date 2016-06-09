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
<div class="col-sm-6 col-md-6 col-xs-6 form_content">
<div class="" role="main">
                <div class="">                   
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
<p>My Wishlist</p>
<table class="table table-striped responsive-utilities jambo_table">
			<thead>
				<tr class="headings">
					<th>Product Image</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>Shop Name</th>
					<th>Buy NOw</th>
					<th class=" "><span class="nobr">Action</span></th>					
				</tr>
			</thead>
			 <tbody>
			<?php foreach ($userwishlist as $wishlist) {?>
				<tr class="even pointer">
				   <td><img src="<?=$wishlist->imageName;?>" style="height:26%;width:100%" alt=""></td>
				   <td><?php echo $wishlist->productName ; ?></td>
				   <td><?php echo $wishlist->productPrice ; ?></td>
				   <td><?php echo $wishlist->shopName ; ?></td>	
				   <td><span><a target="_blank" href="<?=$wishlist->productShopUrl;?>">Buy NOw</a></span></td>
				   <td><a href="<?=base_url();?>User/delete_wishlist/<?php echo $wishlist->userWishListID ;?>">Delete</a></td>										   
				</tr>
			<?php } ?>
		   </tbody>
</table>
</div><div class="clear"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

