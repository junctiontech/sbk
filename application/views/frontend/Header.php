<!DOCTYPE HTML>
<head>
<title>Searchb4kharch</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?=base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?=base_url();?>css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="<?=base_url();?>js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url();?>js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?=base_url();?>js/nav.js"></script>
<script type="text/javascript" src="<?=base_url();?>js/move-top.js"></script>
<script type="text/javascript" src="<?=base_url();?>js/easing.js"></script>
<script type="text/javascript" src="<?=base_url();?>js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
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
				<a href="<?=base_url();?>"><img src="<?=base_url();?>images/searchb4kharch.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="javascript:;" title="View my shopping cart" rel="nofollow">
							<strong class="opencart"> </strong>
								<span class="cart_title">Cart</span>
									<span class="no_product">(empty)</span>
							</a>
						</div>
			      </div>
	    <div class="languages" title="language">
	    	<div id="language" class="wrapper-dropdown" tabindex="1">EN
						<strong class="opencart"> </strong>
						<ul class="dropdown languges">					
							 <li>
							 	<a href="javascript:;" title="Français">
									<span><img src="<?=base_url();?>images/gb.png" alt="en" width="26" height="26"></span><span class="lang">English</span>
								</a>
							 </li>
								<li>
									<a href="javascript:;" title="Français">
										<span><img src="<?=base_url();?>images/au.png" alt="fr" width="26" height="26"></span><span class="lang">Français</span>
									</a>
								</li>
						<li>
							<a href="javascript:;" title="Español">
								<span><img src="<?=base_url();?>images/bm.png" alt="es" width="26" height="26"></span><span class="lang">Español</span>
							</a>
						</li>
								<li>
									<a href="javascript:;" title="Deutsch">
										<span><img src="<?=base_url();?>images/ck.png" alt="de" width="26" height="26"></span><span class="lang">Deutsch</span>
									</a>
								</li>
						<li>
							<a href="javascript:;" title="Russian">
								<span><img src="<?=base_url();?>images/cu.png" alt="ru" width="26" height="26"></span><span class="lang">Russian</span>
							</a>
						</li>					
				   </ul>
		     </div>
		     <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#language') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown').removeClass('active');
				});

			});

		</script>
		 </div>
			<div class="currency" title="currency">
					<div id="currency" class="wrapper-dropdown" tabindex="1">$
						<strong class="opencart"> </strong>
						<ul class="dropdown">
							<li><a href="javascript:;"><span>$</span>Dollar</a></li>
							<li><a href="javascript:;"><span>€</span>Euro</a></li>
						</ul>
					</div>
					 <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#currency') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown').removeClass('active');
				});

			});

		</script>
   </div>
		   <div class="login">
		   	   <span><a href="javascript:;"><img src="<?=base_url();?>images/login.png" alt="" title="login"/></a></span>
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
      <li><a href="javascript:;">Mobile Phones</a>
        <ul>
          <li><a href="javascript:;">Product 1</a></li>
          <li><a href="javascript:;">Product 2</a></li>
          
        </ul>
      </li>
      <li><a href="javascript:;">Desktop</a>
        <ul>
          <li><a href="javascript:;">Product 1</a></li>
          <li><a href="javascript:;">Product 2</a></li>
          </ul>
      </li>
      <li><a href="javascript:;">Laptop</a>
        <ul>
          <li><a href="javascript:;">Product 10</a></li>
          <li><a href="javascript:;">Product 11</a></li>
          <li><a href="javascript:;">Product 12</a></li>
          <li><a href="javascript:;">Product 13</a></li>
        </ul>
      </li>
      <li><a href="javascript:;">Accessories</a>
        <ul>
          <li><a href="javascript:;">Product 14</a></li>
          <li><a href="javascript:;">Product 15</a></li>
        </ul>
      </li>
      <li><a href="javascript:;">Software</a>
        <ul>
          <li><a href="javascript:;">Product 16</a></li>
          <li><a href="javascript:;">Product 17</a></li>
          <li><a href="javascript:;">Product 18</a></li>
          <li><a href="javascript:;">Product 19</a></li>
        </ul>
      </li>
       <li><a href="javascript:;">Sports & Fitness</a>
        <ul>
          <li><a href="javascript:;">Product 16</a></li>
          <li><a href="javascript:;">Product 17</a></li>
          <li><a href="javascript:;">Product 18</a></li>
          <li><a href="javascript:;">Product 19</a></li>
        </ul>
      </li>
       <li><a href="javascript:;">Footwear</a>
        <ul>
          <li><a href="javascript:;">Product 16</a></li>
          <li><a href="javascript:;">Product 17</a></li>
          <li><a href="javascript:;">Product 18</a></li>
          <li><a href="javascript:;">Product 19</a></li>
        </ul>
      </li>
       <li><a href="javascript:;">Jewellery</a>
        <ul>
          <li><a href="javascript:;">Product 16</a></li>
          <li><a href="javascript:;">Product 17</a></li>
          <li><a href="javascript:;">Product 18</a></li>
          <li><a href="javascript:;">Product 19</a></li>
        </ul>
      </li>
       <li><a href="javascript:;">Clothing</a>
        <ul>
          <li><a href="javascript:;">Product 16</a></li>
          <li><a href="javascript:;">Product 17</a></li>
          <li><a href="javascript:;">Product 18</a></li>
          <li><a href="javascript:;">Product 19</a></li>
        </ul>
      </li>
       <li><a href="javascript:;">Home Decor & Kitchen</a>
        <ul>
          <li><a href="javascript:;">Product 16</a></li>
          <li><a href="javascript:;">Product 17</a></li>
          <li><a href="javascript:;">Product 18</a></li>
          <li><a href="javascript:;">Product 19</a></li>
        </ul>
      </li>
       <li><a href="javascript:;">Beauty & Healthcare</a>
        <ul>
          <li><a href="javascript:;">Product 16</a></li>
          <li><a href="javascript:;">Product 17</a></li>
          <li><a href="javascript:;">Product 18</a></li>
          <li><a href="javascript:;">Product 19</a></li>
        </ul>
      </li>
       <li><a href="javascript:;">Toys, Kids & Babies</a>
        <ul>
          <li><a href="javascript:;">Product 16</a></li>
          <li><a href="javascript:;">Product 17</a></li>
          <li><a href="javascript:;">Product 18</a></li>
          <li><a href="javascript:;">Product 19</a></li>
        </ul>
      </li>
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
