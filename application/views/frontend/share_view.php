<head>
<title>Searchb4kharch</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
<link rel="stylesheet" href="<?=base_url();?>frontend/css/fonts/linecons/css/linecons.css">
<link rel="stylesheet" href="<?=base_url();?>frontend/css/fonts/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url();?>frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url();?>frontend/css/xenon-core.css">
<link rel="stylesheet" href="<?=base_url();?>frontend/css/xenon-forms.css">
<link rel="stylesheet" href="<?=base_url();?>frontend/css/xenon-components.css">
<link rel="stylesheet" href="<?=base_url();?>frontend/css/xenon-skins.css">
<link rel="stylesheet" href="<?=base_url();?>frontend/css/custom.css">
<link rel="shortcut icon" href="<?=base_url();?>frontend/images/SEARCHB4KHARCH(2).png">
<script src="<?=base_url();?>frontend/js/jquery-1.11.1.min.js"></script>



</head>
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
						 <?php $price1=$price=0;if(!empty($othershopprices)){  $keys=array_search(min(array_column($othershopprices,'productPrice')), array_column($othershopprices,'productPrice'));
						
										$price= $othershopprices[$keys]['productPrice']; 
										print_r($price);die;
										//$price=min(array_column($othershopprices,'productPrice'));
									if($othershopprices[$keys]['shopID']==3){
										$price=(int)$price;
										$price=substr("$price",0,-2); 
										$price=number_format($price, 2, '.',''); 
										}else{ 
										$price=number_format($price, 2, '.',''); 
										}
									}
										$price1=number_format($products[0]->productPrice, 2, '.','');
										if($price1 !=0 && $price !=0){
											$finalprice=min($price1,$price);
										}else{
											if($price !=0){
												$finalprice=$price;
											}else{
												$finalprice=$price1;
											}
										}
									?>
						<p>Lowest Price: <br><span>Rs <?=isset($finalprice)?$finalprice:''?></span></p>
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
