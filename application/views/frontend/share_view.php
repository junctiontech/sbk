<div class="page-container">	
	<div class="main-content">	
		<div class="row" >	 
			<div class="col-md-10">		
				<div class="content_top">    	
					<div class="clear"></div>					
					 <h2  style="font-size:18px;color:red"><?=isset($products[0]->productName)?$products[0]->productName:''?></h2>    	
				 </div>
				 <div class="col-md-12 col-sm-12 col-xs-12">		
					<div  class="col-md-4 grid images_3_of_2 pro_img">	
						<img  src="<?=isset($products[0]->imageName)?$products[0]->imageName:''?>" alt="<?=isset($products[0]->productImageAltTag)?$products[0]->productImageAltTag:''?>"  />
					</div><!--style="height:250px;width:75%"-->				
				 <div class="desc span_3_of_2">					
					 <div class="col-md-12 col-sm-12 col-xs-12">
						<!--<div class="col-md-4 col-sm-4 col-xs-12">
						<img src="<?=base_url();?>frontend/images/<?=isset($products[0]->shop_image)?$products[0]->shop_image:''?>"><p>Lowest Price: <br><span><?=number_format(isset($products[0]->productPrice)?$products[0]->productPrice:'',2)?></span></p><div class="button" ><span ><a target="_blank" href="<?=isset($products[0]->productShopUrl)?$products[0]->productShopUrl:''?>">Buy now</a></span></div>
						</div>-->					
						 <?php if(!empty($shopimages)){ ?>					
						 <?php foreach($shopimages as $shopimage){ ?>					
						 <div class="col-md-4 col-sm-4 col-xs-4">	
							 <img src="<?=base_url();?>frontend/images/<?=isset($shopimage->shop_image)?$shopimage->shop_image:''?>">
							 <?php //print_r($products[0]->shopID); die;							
	if (!empty($othershopprices)){	
	$keys=(array_keys(array_column($othershopprices, 'shopID'), $shopimage->shopID));
	if($keys || $keys==0 ){
		$keys = array_search($shopimage->shopID, array_column($othershopprices , 'shopID'));
		if($othershopprices[$keys]['shopID']==3){ $pricemore=(int)$othershopprices[$keys]['productPrice']; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=isset($othershopprices[$keys]['productPrice'])?$othershopprices[$keys]['productPrice']:'';}?>
							 <p>Price: <br><span><?=number_format($pricemore,2)?></span></p>
							 <a target="_blank" style="color:white;" href="<?=isset($othershopprices[$keys]['productShopUrl'])?$othershopprices[$keys]['productShopUrl']:''?>"><div class="btn btn-black">	
								 <span >Buy now</span>
								 </div>
							 </a>
							 <?php } else { if($shopimage->shopID==$products[0]->shopID) { 
		if($products[0]->shopID==3){ $pricemore=(int)$products[0]->productPrice; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=$products[0]->productPrice;}	
							
							 ?>	
							 <p>Lowest Price: <br><span><?=number_format($pricemore,2)?></span></p>	
							 <a target="_blank" style="color:white;" href="<?=isset($products[0]->productShopUrl)?$products[0]->productShopUrl:''?>"><div class="btn btn-black">
								 <span >Buy now</span>								
							</div>
							 </a>
							 <?php } else{ ?>
							 <p>Price: <br><span>Not Available</span></p>
							 <div>
								 <span ><a  class="btn btn-gray">Buy now</a></span>
							 </div>
							 <?php } } ?>
							 <?php } else { if($shopimage->shopID==$products[0]->shopID) { 
	if($products[0]->shopID==3){ $pricemore=(int)$products[0]->productPrice; $pricemore=substr("$pricemore",0,-2); $pricemore=number_format($pricemore, 2, '.',''); }else{ $pricemore=$products[0]->productPrice;}						
							
							 ?>		
							 <p>Lowest Price: <br><span><?=number_format($pricemore,2)?></span></p>
							 <a target="_blank" style="color:white;" href="<?=isset($products[0]->productShopUrl)?$products[0]->productShopUrl:''?>"><div class="btn btn-black">
								 <span >Buy now</span>
								 </div>
							 </a> 
							 <?php } else{ ?>
							 <p>Price: <br><span>Not Available</span></p>
							 <div>	
								 <span ><a  class="btn btn-gray">Buy now</a></span>	
							 </div>
							 <?php } } ?>
						 </div>	
						 <?php }  } ?>
					 </div>
					 <!--<p style="margin-top:70px"><?=isset($products[0]->productDescription)?$products[0]->productDescription:''?></p>	-->
					 <div class="clear"></div>
				</div>
			</div>
			 </div>
		</div>		   
	</div>
</div>
<div class="clear"></div>
