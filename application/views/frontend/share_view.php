<div class="page-container">	
	<div class="main-content">	
		<div class="row" >	 
			<div class="col-md-10">		
				<div class="col-md-12 col-sm-12 col-xs-12">		
					<div  class="col-md-4 grid images_3_of_2 pro_img">	
						<img  src="<?=isset($products[0]->imageName)?$products[0]->imageName:''?>" alt="<?=isset($products[0]->productImageAltTag)?$products[0]->productImageAltTag:''?>"  />
					</div>			
				 <div class="desc span_3_of_2">					
					 <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-4 col-sm-4 col-xs-12">
						 <?php if(!empty($othershopprices)){ $keys=array_keys($othershopprices, min($othershopprices));
									$price= min($othershopprices); 
									if($othershopprices[$keys]['shopID']==3){ $price=(int)$othershopprices[$keys]['productPrice']; $price=substr("$price",0,-2); $price=number_format($pricemore, 2, '.',''); }else{ $price=number_format($pricemore, 2, '.','');}
									}else{
										$price=number_format($products[0]->productPrice, 2, '.','');
									}?>
						<p>Lowest Price: <br><span><?=isset($price)?$price:''?></span></p>
						</div>					
					 </div>
					 <div class="clear"></div>
				</div>
			</div>
			 </div>
		</div>		   
	</div>
</div>
<div class="clear"></div>
