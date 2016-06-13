<!DOCTYPE HTML>
<head>
<title>Searchb4kharch</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?=base_url();?>admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url();?>frontend/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?=base_url();?>frontend/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?=base_url();?>frontend/css/frontend.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?=base_url();?>frontend/css/custom.css" rel="stylesheet" type="text/css" media="all"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="<?=base_url();?>frontend/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?=base_url();?>frontend/js/nav.js"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/move-top.js"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/easing.js"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/nav-hover.js"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/jquery.inputmask.js"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/validator.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="<?=base_url();?>frontend/images/SEARCHB4KHARCH(2).png">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
<!-- TradeDoubler site verification 2851632 -->
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="header_top">
			<div class="logo">
				<a href="<?=base_url();?>"><img src="<?=base_url();?>frontend/images/SEARCHB4KHARCH1.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box ">
				    <form action="<?=base_url();?>Landingpage/Product/search" method="get">
					<!--onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"  -->
				    	<input type="text" placeholder="Search.. Shop.. Earn" Value="<?=isset($searchq)?$searchq:''?>" name="q" ><input type="hidden" name="c" value="all"/><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
					<?php if(!empty($userinfos)){ ?>
						<a href="<?=base_url();?>User/Mywishlist.html" title="View my shopping cart" rel="nofollow">
							<strong class="opencart"> </strong>
							
								<span class="cart_title">wishlist <?=isset($whislist)?$whislist:'0'?></span>
							</a>
					<?php }else{ ?>
					<a href="<?=base_url();?>Login.html" title="View my shopping cart" rel="nofollow">
							<strong class="opencart"> </strong>
								<span class="cart_title">wishlist</span>
							</a>
					<?php } ?>
						</div>
			      </div>
	   
			 <div class="login">
			 <?php if(!empty($userinfos)){ ?>
		   	   <span><a href="<?=base_url();?>User/Dashboard.html" style="color:black">Hi <?=isset($userinfos['userFirstName'])?$userinfos['userFirstName']:''?></a></span>
			 <?php }else{ ?>
			 <span><a href="<?=base_url();?>Login.html" style="color:black">SignUp/Login</a></span>
			 <?php } ?>
		   </div>
		    <?php if(!empty($userinfos)){ ?>
		   <div class="login">
			<span><a href="<?=base_url();?>Login/Logout.html" style="color:black">Logout</a></span>
			</div>
			 <?php } ?>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
	<div class="menu">
	  <ul id="dc_mega-menu-orange" class="dc_mm-orange">
	
	<li><a href="<?=base_url();?>Landingpage/Deals">Deals</a>
   <!-- <ul>
	<?php if(!empty($dealsgategorys)){foreach($dealsgategorys as $dealsgategory){?>
      <li><a href="<?=base_url();?>Landingpage/Deals/<?=str_replace(' ','_',$dealsgategory->category)?>.html"><?=ucwords($dealsgategory->category)?></a>
        <ul>
          
          
        </ul>
      </li>
	<?php } }?>
    </ul>-->
  </li>
  
  <li class="staticcs"><a href="javascript:;">Buy >></a>
    
  </li>
		
    <li><a href="javascript:;">Products</a>
    <ul>
	<?php foreach($categories as $category){?>
      <li><a href="<?=base_url();?>Landingpage/Product/<?=$category->categoriesUrlKey?>.html"><?=ucwords($category->categoryName)?></a>
        <ul>
          
          
        </ul>
      </li>
	<?php } ?>
    </ul>
  </li>
  <li><a href="javascript:;">Top Brands</a>
    <ul>
	<?php foreach($topbrands as $topbrand){?>
      <li><a href="<?=base_url();?>Landingpage/Product/<?=$topbrand->categoriesUrlKey?>/<?=$topbrand->brandKey?>.html?b=b"><?=ucwords($topbrand->brandName)?></a>
        <ul>
          
          
        </ul>
      </li>
	<?php } ?>
    </ul>
  </li>
  <li><a href="javascript:;">Services (coming soon)</a>
    
  </li>
  
  <li class="staticcs"><a href="javascript:;">Book >></a>
    
  </li>
  
  <li><a href="javascript:;">Flights</a></li>
   
 <li><a href="javascript:;">Hotels</a></li>
  <div class="clear"></div>
</ul>
</div>
