
<!DOCTYPE html>
<html lang="en">


<head>
    
    <!-- Basic page needs
	============================================ -->
	<title>Market </title>
	
<meta charset="utf-8">
    <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
   
	<!-- Mobile specific metas
	============================================ -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<!-- Favicon
	============================================ -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/public/ico/favicon.png">
	
	<!-- Google web fonts
	============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
    <!-- Libs CSS
	============================================ -->
 	<?php echo link_tag('assets/public/css/bootstrap/css/bootstrap.min.css','stylesheet'); ?>
 	 <!-- <link rel="stylesheet" href=""> -->
 	<?php echo link_tag('assets/public/css/font-awesome/css/font-awesome.min.css','stylesheet'); ?>
	<!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/js/datetimepicker/bootstrap-datetimepicker.min.css','stylesheet'); ?>
	<!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/js/owl-carousel/owl.carousel.css','stylesheet'); ?>
    <!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/css/themecss/lib.css','stylesheet'); ?>
	<!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/js/jquery-ui/jquery-ui.min.css','stylesheet'); ?>
	<!-- <link href="" rel="stylesheet"> -->
	
	<!-- Theme CSS
	============================================ -->
 	<?php echo link_tag('assets/public/css/themecss/so_megamenu.css','stylesheet'); ?>
   	<!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/css/themecss/so-categories.css','stylesheet'); ?>
    <!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/css/themecss/so-listing-tabs.css','stylesheet'); ?>
	<!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/css/header6.css','stylesheet'); ?>
	<!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/css/footer3.css','stylesheet'); ?>
	<!-- <link href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/css/home6.css','stylesheet'); ?>
	<!-- <link id="color_scheme" href="" rel="stylesheet"> -->
 	<?php echo link_tag('assets/public/css/responsive.css','stylesheet'); ?>
	
	<!-- <link href="" rel="stylesheet"> -->
	

</head>
<body class="common-home res layout-home6">

    <div id="wrapper" class="wrapper-full ">

	
	<!-- Preloading Screen -->
	<div class="ip-header">
		<h1 class="ip-logo">
			<a href="index.html">
				<img src="<?php echo base_url(); ?>assets/public/image/demo/logos/theme_logo.png" alt="SW Shoppy">
			</a>
		</h1>
		<div class="ip-loader">
			<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
				<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"></path>
				<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" style="stroke-dashoffset: 0; stroke-dasharray: 192.617;"></path>
			</svg>
		</div>
	</div>
	<!-- End Preloading Screen -->
	
	<!-- Header Container  -->
	<header id="header" class="variantleft type_6">
		
		<!-- Header Top -->
		<div class="header-top compact-hidden">
			<div class="container">
				<div class="row">
					<div class="header-top-left form-inline col-sm-5 col-xs-12 compact-hidden">
						
					</div>
					<div class="header-top-right collapsed-block text-right  col-sm-7 col-xs-12 compact-hidden">
						<h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
						<div class="tabBlock" id="TabBlock-1">
							<ul class="top-link list-inline">
								<li class="account" id="my_account"><a href="my-account.html" title="My Account" class="btn btn-xs dropdown-toggle" > <i class="fa fa-user" ></i> My Account </a></li>
								<li class="wishlist"><a href="wishlist.html" class="top-link-wishlist" title="wishlist"><i class="fa fa-heart" ></i> My Wish List</a></li>
								<li class="checkout"><a href="checkout.html" class="top-link-checkout" title="Checkout"><i class="fa fa-check-square-o" ></i> Checkout</a></li>
								<li class="signin"><a href="login.html" class="top-link-checkout" title="login"><i class="fa fa-lock" ></i> Sign In</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //Header Top -->

		<!-- Header center -->
		<div class="header-center">
			<div class="container">
				<div class="row">
					<!-- Logo -->
					<div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
						<a href="index.html"><img src="<?php echo base_url(); ?>assets/public/image/demo/logos/logo.png" title="Your Store" alt="Your Store"></a>
					</div>
					<!-- //end Logo -->
					
					<!-- Search -->
					<div id="sosearchpro" class="col-md-5 col-sm-7 search-pro">
						<form method="GET" action="#/templates/html/market/index.html">
							<div id="search0" class="search input-group">
								<div class="select_category filter_type icon-select">
									<select class="no-border" name="category_id">
										<option value="">All Categories</option>
									<?php if(isset($category_search_left)): ?>
										<?php foreach ($category_search_left as $category) : ?>
												<?php echo $category; ?>
										<?php endforeach; ?>
									<?php endif; ?>		
									</select>
								</div>

								<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Enter keywords to search..." name="search">
								<span class="input-group-btn">
								<button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
								</span>
							</div>
							<input type="hidden" name="route" value="product/search">
						</form>
					</div>
					<!-- //Search -->
					
					<!-- Main Menu -->
					<div class="phone-contact col-md-2  hidden-md hidden-sm hidden-xs">
							<div class="inner-info">
								<strong>Call us Now:</strong><br>
								<span>Toll free:  +91-9555457807</span>
							</div>
					</div>
					<!-- //Main Menu -->

					<!-- Shopping Cart -->
					<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 shopping_cart pull-right">
						<!--cart-->
						<div id="cart" class="btn-group btn-shopping-cart">
							<a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
								<div class="shopcart">
									<span class="handle pull-left"></span>
									<span class="title">Shopping Cart</span>
									<p class="text-shopping-cart cart-total-full">2 item(s) - Rs.1,262.00 </p>
								</div>
							</a>

							<ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
								<li>
									<table class="table table-striped">
										<tbody>
											<tr>
												<td class="text-center" style="width:70px">
													<a href="product.html"> <img src="<?php echo base_url(); ?>assets/public/image/demo/shop/product/resize/2.jpg" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview"> </a>
												</td>
												<td class="text-left"> <a class="cart_product_name" href="product.html">Filet Mign</a> </td>
												<td class="text-center"> x1 </td>
												<td class="text-center"> Rs.1,202.00 </td>
												<td class="text-right">
													<a href="product.html" class="fa fa-edit"></a>
												</td>
												<td class="text-right">
													<a onClick="cart.remove('2');" class="fa fa-times fa-delete"></a>
												</td>
											</tr>
											<tr>
												<td class="text-center" style="width:70px">
													<a href="product.html"> <img src="<?php echo base_url(); ?>assets/public/image/demo/shop/product/resize/3.jpg" style="width:70px" alt="Canon EOS 5D" title="Canon EOS 5D" class="preview"> </a>
												</td>
												<td class="text-left"> <a class="cart_product_name" href="product.html">Canon EOS 5D</a> </td>
												<td class="text-center"> x1 </td>
												<td class="text-center"> Rs.60.00 </td>
												<td class="text-right">
													<a href="product.html" class="fa fa-edit"></a>
												</td>
												<td class="text-right">
													<a onClick="cart.remove('1');" class="fa fa-times fa-delete"></a>
												</td>
											</tr>
										</tbody>
									</table>
								</li>
								<li>
									<div>
										<table class="table table-bordered">
											<tbody>
												<tr>
													<td class="text-left"><strong>Sub-Total</strong>
													</td>
													<td class="text-right">Rs.1,060.00</td>
												</tr>
												<tr>
													<td class="text-left"><strong>Eco Tax (-2.00)</strong>
													</td>
													<td class="text-right">Rs.2.00</td>
												</tr>
												<tr>
													<td class="text-left"><strong>VAT (20%)</strong>
													</td>
													<td class="text-right">Rs.200.00</td>
												</tr>
												<tr>
													<td class="text-left"><strong>Total</strong>
													</td>
													<td class="text-right">Rs.1,262.00</td>
												</tr>
											</tbody>
										</table>
										<p class="text-right"> <a class="btn view-cart" href="cart.html"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.html"><i class="fa fa-share"></i>Checkout</a> </p>
									</div>
								</li>
							</ul>
						</div>
						<!--//cart-->
					</div>
					<!-- //Shopping Cart -->
				</div>

			</div>
		</div>
		<!-- //Header center -->

		<!-- Header Bottom -->
		<div class="header-bottom compact-hidden">
		<div class="container">
			<div class="row">
				
				<div class="sidebar-menu col-md-3 col-sm-6 col-xs-12  ">
						<div class="responsive so-megamenu ">
							<div class="so-vertical-menu no-gutter compact-hidden">
								<nav class="navbar-default">
									<div class="container-megamenu vertical">
										<div id="menuHeading">
											<div class="megamenuToogle-wrapper">
												<div class="megamenuToogle-pattern">
													<div class="container">
														<div>
															<span></span>
															<span></span>
															<span></span>
														</div>
														All Categories							
													</div>
												</div>
											</div>
										</div>
										<div class="navbar-header">
											<button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt">
											
											</button>
											All Categories		
										</div>
										<div class="vertical-wrapper" style="display: none;">
											<span id="remove-verticalmenu" class="fa fa-times"></span>
											<div class="megamenu-pattern">
												<div class="container">
													<ul class="megamenu">
															<?php if(count($categories)): ?>
																
															<?php foreach($categories as $category):  ?>
															<li class="item-vertical style1 with-sub-menu hover">
																<p class="close-menu"></p>
																<?php if($category['parent_id']==0): ?>
																
																<a href="#" class="clearfix">
																	<!-- <img src="<?php //echo base_url(); ?>assets/public/image/theme/icons/9.png" alt="icon"> -->
																	<span><?php echo $category['name']; ?></span>
																	<b class="caret"></b>
																</a>
																<?php endif; ?>
																<div class="sub-menu" data-subwidth="100" style="width: 900px; display: none; right: 0px;">
																	<div class="content" style="display: none;">
																		<div class="row">
																			<div class="col-sm-12">
																				<div class="row">
																				<?php foreach ($categories as $sub_cat) : ?>
																						
																					<?php if($sub_cat['parent_id']==$category['id']):  ?>
																						<div class="col-md-4 static-menu">
																							<div class="menu">
																								<ul>
																									
																									<li>
																										<a href="#" class="main-menu"><?php echo $sub_cat['name']; ?></a>
																									
																										<ul>
																										<?php foreach ($categories as $child) : ?>
																											<?php if($child['parent_id']==$sub_cat['id']): ?>

																											<li><a href="#"><?php echo $child['name']; ?></a></li>
																											<?php endif; ?>
																										<?php endforeach; ?>
																											
																									
																										</ul>
																									
																									</li>
																								
																								</ul>
																							</div>
																						</div>
																					<?php endif; ?>
																			   <?php endforeach; ?>

																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</li>
														<?php endforeach; ?>

														<?php endif; ?>
														
														</ul>
													</div>
												</div>
											</div>
										</div>
									</nav>
							</div>
						</div>

					</div>

					
					<!-- Main menu -->
					<div class="megamenu-hori col-md-9 col-sm-6 col-xs-12 ">
						<div class="responsive so-megamenu ">
								<nav class="navbar-default">
									<div class=" container-megamenu  horizontal">
										<div class="navbar-header">
											<button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
											Navigation		
										</div>
										
										<div class="megamenu-wrapper">
											<span id="remove-megamenu" class="fa fa-times"></span>
											<div class="megamenu-pattern">
												<div class="container">
													<ul class="megamenu " data-transition="slide" data-animationtime="250">
														
														<?php if(isset($categories)): ?>
															<?php foreach ($categories as $category): ?>
															<li class="with-sub-menu hover">
																<?php if($category['parent_id']==0): ?>
																<p class="close-menu"></p>
																<a href="#" class="clearfix">
																	<strong><?php echo ucwords($category['name']); ?></strong>
																	<!-- <img class="label-hot" src="<?php //echo base_url(); ?>assets/public/image/theme/icons/hot-icon.png" alt="icon items"> -->
																	<b class="caret"></b>
																</a>
																<?php endif; ?>
																<div class="sub-menu" style="width: 100%; right: auto;">
																	<div class="content" >
																		<div class="row">
																			<?php foreach($categories as $child): ?>
																			<?php if($child['parent_id']==$category['id']): ?>
																			<div class="col-md-3">
																				<div class="column">
																					
																					<a href="#" class="title-submenu"><?php echo ucwords($child['name']); ?></a>
																					
																					<div>

																						<ul class="row-list">
																							<?php foreach ($categories as $sub) : ?>
																								<?php if($sub['parent_id']==$child['id']): ?>
																							<li><a href="#"><?php echo ucwords($sub['name']); ?></a></li>
																								<?php endif; ?>		
																							<?php endforeach; ?>
																							
																						</ul>
																						
																					</div>
																				</div>
																			</div>
																			<?php endif; ?>
																		<?php endforeach; ?>
														
																		</div>
																	</div>
																</div>
															</li>
														<?php endforeach; ?>
													<?php endif; ?>
														
														
														
													</ul>
													
												</div>
											</div>
										</div>
									</div>
								</nav>
							</div>
						</div>
					<!-- //end Main menu -->
					
				</div>
			</div>

		</div>

	<!-- Navbar switcher -->
	<!-- //end Navbar switcher -->
	</header>
	<!-- //Header Container  -->
	