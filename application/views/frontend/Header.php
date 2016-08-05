<!DOCTYPE html>
<html lang="en" >
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
<script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body id="body" onload="bodyload(this.id);" class="page-body" itemscope itemtype="http://schema.org/Product">
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
			<ul class="navbar-nav nav nav-userinfo  hidden-xs">
				<li>
					<a href="<?=base_url();?>" title="Go to home page">
						<i  class="fa fa-home"></i>						 
					</a>					
				</li>				
				<li class="middle-align">
					<a href="javascript:;" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" class="fa fa-bell-o"></a>
				</li>
				<li>
					<a href="javascript:;" title="You are searcheela no">
						<span class="title">You are Searcheela# <span><img style="max-width: 37%;"border="0" src="http://cc.amazingcounters.com/counter.php?i=3204024&c=9612385" alt="searchb4kharch.com"></span></span>
					</a>					
				</li>
				<li>
					<?php if(!empty($userinfos)){ ?>
					<a class="notification-icon notification-icon-messages" href="<?=base_url();?>User/Mywishlist.html" title="View my shopping cart" rel="nofollow">
						<i class="fa-shopping-cart"></i>
						<span class="badge badge-purple"><?=isset($whislist)?$whislist:'0'?></span>						
					</a>
					<?php }else{ ?>
					<a href="<?=base_url();?>Login.html" title="View my shopping cart" rel="nofollow">
						<span class="fa fa-shopping-cart white"></span>						
					</a>
					<?php } ?>	
				</li>			 
			</ul>			
			<ul class="nav nav-userinfo white navbar-right">
				<li>
					<a href="javascript:;" title="Download our android app">
						<i class="android"></i>
					<!--	<span class="badge badge-green">15</span>-->
					</a>					
				</li>
				<?php if(!empty($userinfos)) { ?>					
				<li class=" user-profile">
					<a href="javascript:;" title="Your profile image">
						<?php if (!empty($userinfos['userProfileImage'])) { ?>
						<img src="<?=base_url();?>./uploads/images/userProfileImage/<?=isset($userinfos['userProfileImage'])?$userinfos['userProfileImage']:''?>" alt=" " class="img-circle img-inline userpic-32" width="28" />
						<?php } else { ?>
						<img src="<?=base_url();?>frontend/images/user-1.png" alt=" " class="img-circle img-inline userpic-32" width="28" />
						<?php } ?>
					</a>
				 <?php } ?>
				<li>
					
						<?php if(!empty($userinfos)){ ?>
							<a href="<?=base_url();?>User/Dashboard.html" title="Go to dashboard">
								<span class="white">Hi <?=isset($userinfos['userFirstName'])?$userinfos['userFirstName']:''?></span>
								<i class="fa-link-ext"></i>
							</a>
						<?php }else{ ?>
							<a href="<?=base_url();?>Login.html" title="Login to your account">
								<span class="white">Login</span>
								<i class="fa-link-ext"></i>
							</a>
						<?php } ?>
				</li> 
						<?php if(!empty($userinfos)){ ?>			
				<li>
						<a href="<?=base_url();?>Login/Logout.html" title="Logout">
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
				<a href="<?=base_url();?>"><img class="logo1" src="<?=base_url();?>frontend/images/pngtransparent (2).png" alt="" /></a>
			</div>
			</div>
			<div class="col-md-9 col-sm-8 col-xs-12">
			  <div class="header_top_right">
			    <div class="search_box tooltip-primary" data-toggle="tooltip" data-placement="bottom" title="Hello, search through searchb4kharch android app to earn Rs.10 daily">
				    <form action="<?=base_url();?>Landingpage/Product/search" method="get">
					<!--onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"  -->
				    	<input type="text" placeholder="Search.. Shop.. Earn" id="search" list="searchdata" data-validate="required" data-message-required="Please enter more than two characters" autocomplete="off" Value="<?=isset($searchq)?$searchq:''?>" name="q" >
						<datalist id="searchdata"></datalist>
						<input type="hidden" name="c" value="all"/><input type="submit" value="SEARCH" >
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

	
