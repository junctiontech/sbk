<!DOCTYPE html>
<html lang="en">
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
<body id="body" onload="bodyload(this.id);" class="page-body">

	
	<nav class="navbar horizontal-menu navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
			<div class="nav navbar-mobile">
			
			
				<div class="mobile-menu-toggle">					 					
					<a href="#" data-toggle="mobile-menu-horizontal">
						<i class="fa-bars"></i>
					</a>
				</div>
				
			</div>
			
			<div class="navbar-mobile-clear"></div>
			
			
			
			<!-- main menu -->
					
			<ul class="navbar-nav  hidden-xs">
				<li>
					<a href="<?=base_url();?>">
						<i class="fa fa-home"></i>
						 
					</a>
					</li>
				<li>
					<a href=" ">
						<i class=" fa fa-bell-o"></i>
						 
					</a>
					</li>
				<li>
					<a href=" ">
 
						<span class="title">Searcheela#<span><img style="max-width: 37%;"border="0" src="http://cc.amazingcounters.com/counter.php?i=3204024&c=9612385" alt="searchb4kharch.com"></span></span>
					</a>
					</li>
			 
			</ul>
					
			
			
			<ul class="nav nav-userinfo white navbar-right">
				
				<li>					
					<a href="#">
						<i class="android"></i>
					<!--	<span class="badge badge-green">15</span>-->
					</a>					
				</li>			
				<li>
					<?php if(!empty($userinfos)){ ?>
						<a class="notification-icon notification-icon-messages" href="<?=base_url();?>User/Mywishlist.html" title="View my shopping cart" rel="nofollow"><i class="fa-shopping-cart"></i>
							
							<span class="badge badge-purple"><?=isset($whislist)?$whislist:'0'?></span>
							</a>
					<?php }else{ ?>
					<a href="<?=base_url();?>Login.html" title="View my shopping cart" rel="nofollow">							 
								<span class="fa fa-shopping-cart white"></span>
							</a>
					<?php } ?>	
				</li>
		
				<li>					
						<?php if(!empty($userinfos)){ ?>
							<a href="<?=base_url();?>User/Dashboard.html">
								<span class="white">Hi <?=isset($userinfos['userFirstName'])?$userinfos['userFirstName']:''?></span>
								<i class="fa-link-ext"></i>
							</a>
						<?php }else{ ?>
							<a href="<?=base_url();?>Login.html">
								<span class="white">Login</span>
								<i class="fa-link-ext"></i>
							</a>
						<?php } ?>
				</li> 
						<?php if(!empty($userinfos)){ ?>			
				<li>
						<a href="<?=base_url();?>Login/Logout.html">
								<span class="white">Logout</span>
								<i class="fa-link-ext"></i>
						</a>
				</li>
					<?php } ?> 
				
			</ul>
	
		 
			 <div class="clear"></div>
		 
<div class="row">
	  <div class="col-md-3 col-sm-4 col-xs-12">
			<div class=" ">
				<a href="<?=base_url();?>"><img src="<?=base_url();?>frontend/images/pngtransparent (2).png" alt="" /></a>
			</div>
			</div>
			<div class="col-md-9 col-sm-8 col-xs-12">
			  <div class="header_top_right">
			    <div class="search_box ">
				    <form action="<?=base_url();?>Landingpage/Product/search" method="get">
					<!--onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"  -->
				    	<input type="text" placeholder="Search.. Shop.. Earn" Value="<?=isset($searchq)?$searchq:''?>" name="q" ><input type="hidden" name="c" value="all"/><input type="submit" value="SEARCH">
				    </form>
			    </div>
				</div>
 
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 
		
		</div>
		
		 
 
			<ul class="navbar-nav">
	<li><a href="<?=base_url();?>Landingpage/Deals">Deals</a>
   
  </li>
  
<?php foreach($categories as $category){?>  
    <li>   
	
      <a href="<?=base_url();?>Landingpage/Product/<?=$category->categoriesUrlKey?>.html"><?=ucwords($category->categoryName)?></a>        
  
  </li>
  	<?php } ?>
  

  
  <!--<li><a href="<?=base_url();?>Landingpage/Flights.html">Flights</a></li>
   
 <li><a href="<?=base_url();?>Hotel.html" >Hotels</a></li>-->
 
  <div class="clear"></div>
			 
			</ul>
		
		
		
	 
		</div>
	</nav>
	
	