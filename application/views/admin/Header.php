<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Searchb4kharch</title>

    <!-- Bootstrap core CSS -->

    <link href="<?=base_url();?>admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base_url();?>admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url();?>admin/css/animate.min.css" rel="stylesheet">
	<link href="<?=base_url();?>admin/css/sbk.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="<?=base_url();?>admin/css/custom.css" rel="stylesheet">
    <link href="<?=base_url();?>admin/css/icheck/flat/green.css" rel="stylesheet">

	<!-- select2 -->
    <link href="<?=base_url();?>admin/css/select/select2.min.css" rel="stylesheet">

    <script src="<?=base_url();?>admin/js/jquery.min.js"></script>
<link rel="shortcut icon" href="<?=base_url();?>frontend/images/sb4k.png">
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?=base_url();?>Dashboard" class="site_title">Searchb4kharch<!-- <img src="<?=base_url();?>admin/images/searchb4kharch.png" alt="" />--> </a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info 
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?=base_url();?>admin/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Anthony Fernando</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-th"></i>Categories<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url();?>Categories.html">View category</a></li>
                                        <li><a href="<?=base_url () ;?>Categories/AddCategories.html">Create category</a></li>
										<li><a href="<?=base_url () ; ?>Categories/MapCategories.html">Map category</a></li>
										<li><a href="<?=base_url(); ?>Categories/Brand.html">Brand</a></li>
										<li><a href="<?=base_url(); ?>Categories/Filter.html">Create & view filter</a></li>
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-list"></i>Manage product<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url();?>Product.html">View product</a></li>
                                        <li><a href="<?=base_url();?>Product/Addproduct.html">Create product</a></li>
										<li><a href="<?=base_url();?>Product/MappProduct.html">Map product</a></li>
										<li><a href="<?=base_url();?>Product/create_attribute">Create Attribute</a></li>
                                    </ul>
                                </li>
								
								 <li><a><i class="fa fa-list"></i>Manage inventory<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url();?>Inventory.html">Inventory consumption</a></li>
                                        <li><a href="<?=base_url();?>Inventory/Createinventory.html">Create inventory</a></li>
										
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-list"></i>Shop<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url();?>Setting">View Shop</a></li>
										<li><a href="<?=base_url();?>setting/Apiinfo">Api Info</a></li>
                                    </ul>
                                </li>
								<li><a><i class="fa fa-list"></i>Sub Category<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href ="<?=base_url();?>Subcategories">SubCategory</a></li>
										<li><a href ="<?=base_url();?>Subcategories/Addsubcategory">Add Sub Categories</a></li>
                                    </ul>
                                </li>
								<li><a><i class="fa fa-list"></i>User Wishlist<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href ="<?=base_url();?>Userwishlist">User Wishlist</a></li>						
                                    </ul>
                                </li>
								<li><a><i class="fa fa-list"></i>Manage Hotel<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href ="<?=base_url ();?>Hotels" >View Hotel</a></li>
										<li><a href ="<?=base_url ();?>Hotels/Addhotel" >Create Hotel</a></li>
                                    </ul>
                                </li>
								<li><a><i class="fa fa-list"></i>Manage Flight<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url ();?>Flights">View Flights</a></li>						
                                    </ul>
                                </li>
								<li><a><i class="fa fa-list"></i>Manage Gift<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url () ;?>Gifts">View Gifts</a></li>
										<li><a href="<?=base_url () ;?>Gifts/Addgift">Create Gifts</a></li>	
                                    </ul>
                                </li>
								<li><a><i class="fa fa-list"></i>Manage Deal<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?=base_url () ;?>Deals">View Deal</a></li>	
										 <li><a href="<?=base_url () ;?>Deals/Inventorydeal">Inventory Deal Consumption</a></li>
										<li><a href="<?=base_url();?>Deals/Inventorydealview">Create Inventory Deal</a></li>
                                    </ul>
                                </li>
                               
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img <?php if(!empty($userinfo['userProfileImage'])){ ?> src="<?=base_url();?>admin/adminimage/<?=$userinfo['userProfileImage']?>" <?php }else{ ?> src="<?=base_url();?>admin/images/img.jpg" <?php } ?>alt="">hello <?php  if(!empty($userinfo['userFirstName'])){ echo ucwords($userinfo['userFirstName']);}?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    
                                    
                                    
                                    <li><a href="<?=base_url();?>Admin/Logout.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    
                                    
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="<?=base_url();?>admin/images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>hello admin</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->
<!-- page content start and Closed in footer.php -->
            <div class="right_col" role="main">
