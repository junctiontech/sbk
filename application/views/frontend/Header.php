<!DOCTYPE HTML>
<head>
<title>Searchb4kharch</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?=base_url();?>frontend/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?=base_url();?>frontend/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="<?=base_url();?>frontend/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?=base_url();?>frontend/js/nav.js"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/move-top.js"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/easing.js"></script>
<script type="text/javascript" src="<?=base_url();?>frontend/js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="<?=base_url();?>frontend/images/sb4k.png">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="header_top">
			<div class="logo">
				<a href="<?=base_url();?>"><img src="<?=base_url();?>frontend/images/searchb4kharch.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box ">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="javascript:;" title="View my shopping cart" rel="nofollow">
							<strong class="opencart"> </strong>
								<span class="cart_title">Cart</span>
									
							</a>
						</div>
			      </div>
	   
			
		   <div class="login">
		   	   <span><a href="javascript:;"><img src="<?=base_url();?>frontend/images/login.png" alt="" title="login"/></a></span>
		   </div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
	<div class="menu">
	  <ul id="dc_mega-menu-orange" class="dc_mm-orange">
		 <li><a href="<?=base_url();?>">Home</a></li>
    <li><a href="javascript:;">Products</a>
    <ul>
	<?php foreach($categories as $category){?>
      <li><a href="javascript:;"><?=$category->categoryName?></a>
        <ul>
          <li><a href="javascript:;">Product 1</a></li>
          <li><a href="javascript:;">Product 2</a></li>
          
        </ul>
      </li>
	<?php } ?>
    </ul>
  </li>
  <li><a href="javascript:;">Top Brands</a>
    <ul>
      <li><a href="javascript:;">Brand Name 1</a></li>
      <li><a href="javascript:;">Brand Name 2</a></li>
      <li><a href="javascript:;">Brand Name 3</a></li>
     
    </ul>
  </li>
  <li><a href="javascript:;">Services</a>
    <ul>
      <li><a href="javascript:;">Service 1</a>
        <ul>
          <li><a href="javascript:;">Service Detail A</a></li>
          <li><a href="javascript:;">Service Detail B</a></li>
        </ul>
      </li>
      <li><a href="javascript:;">Service 2</a>
        <ul>
          <li><a href="javascript:;">Service Detail C</a></li>
        </ul>
      </li>
      <li><a href="javascript:;">Service 3</a>
        <ul>
          <li><a href="javascript:;">Service Detail D</a></li>
          <li><a href="javascript:;">Service Detail E</a></li>
          <li><a href="javascript:;">Service Detail F</a></li>
        </ul>
      </li>
      <li><a href="javascript:;">Service 4</a></li>
    </ul>
  </li>
  <li><a href="javascript:;">About</a></li>
   <li><a href="javascript:;">Delivery</a></li>
  <li><a href="javascript:;">FAQS</a></li>
  <li><a href="javascript:;">Contact</a> </li>
  <div class="clear"></div>
</ul>
</div>
