</div>
 <div class="main">
    <div class="content">
    	<div class="content_top">
		<div class="back-links">
    		<p><a href="<?=base_url();?>">Home</a> >> <?=isset($categorykey)?$categorykey:''?> </p>
    	    </div>
    		<div class="heading">
    		<h3> Compare </h3>
    		</div>
    		
    		<div class="clear"></div>
    	</div>
		
		    <div class="section group">
		
		  <div class="product_panel">
		   <?php if(!empty($compareproduct)){ foreach($compareproduct as $product){?>
		   
				<div class="grid_1_of_4 images_1_of_4 ">
					 <img src="<?=$product->imageName?>" alt="" /></img>
					 <h2><?=$product->productName?> </h2>
					
					 <p><span class="price"><?=$product->productPrice?></span></p>

			</div>
		
			

				 <?php { $attribute=$this->Landingpage_model->attribute($product->productsID);?>
				<?php foreach($attribute as $productattribute){?>
				<!--<table class="table table-striped">
	
								<tbody>
										<tr>
				<td><?= isset ($productattribute->productAttributeLable) ?$productattribute->productAttributeLable:''?></td>
				<td><?= isset ($productattribute->productAttributeValue) ?$productattribute->productAttributeValue:''?></td>
				
			</tr>
			
		</tbody>
	</table>-->

		   <?php } }}}?>

	</div>		
			
<!--
                            <div class="x_panel comparetable">
                                <div class="x_title">
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
								<?php if(!empty($attribute)){ foreach($attribute as $productattribute){?>
                                    <table class="table table-striped">
                                    
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?= isset ($productattribute->productAttributeLable) ?$productattribute->productAttributeLable:''?></th>
                                                <td><?= isset ($productattribute->productAttributeValue) ?$productattribute->productAttributeValue:''?></td>
                                                
                                            </tr>
                                            
                                        </tbody>
                                    </table>
								<?php  }}?>
                                </div>
                            </div>
                        </div>-->
			
			
			
			</div>
			
			
    </div>
 </div>
</div>
   