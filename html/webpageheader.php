<?php
Session::init();
$logged = Session::get('loggedIn');
$teacherlogin = Session::get('teacherlogin');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="DBS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dot School Solutions</title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="<?php echo URL;?>assets/images/DOT-SCHOOL-SOLUTION-PNG.png">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/responsive.css">
    <!-- <link rel="stylesheet" href="<?php echo URL;?>assets/css/toast.css"> -->
    

    <!-- end inject -->
</head>
<body>
<div class="wrapper">
<!-- start cssload-loader -->
<div class="preloader"></div>
<!-- end cssload-loader -->

	<!-- Main Header Nav -->
	<header class="header-nav home2 style_one navbar-scrolltofixed main-menu" style="margin-right: 0px;height:70px;">
		<div class="container">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <!-- Responsive Menu Structure-->
		        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
		        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
		            <li class="last">
		                <a class="last" href="<?php echo URL;?>"><img style="height: 60px;padding-top: 0px!important;"  class="img-fluid" src="<?php echo URL?>assets/images/DOT-SCHOOL-SOLUTION-LOGO.jpg" alt="header-logo.png"></a>
		            </li>
		            <li>
		                <!-- <a href="<?php echo URL;?>"><span class="title">Home</span></a> -->
		                <!-- Level Two-->
	                	<!-- <ul>
		                    <li>
		                        <a href="#">Courses List</a>
		                        Level Three
		                        <ul>
		                            <li><a href="page-course-v1.html">Courses v1</a></li>
		                            <li><a href="page-course-v2.html">Courses v2</a></li>
		                            <li><a href="page-course-v3.html">Courses v3</a></li>
		                        </ul>
		                    </li>
		                    <li>
		                        <a href="#">Courses Single</a>
		                        Level Three
		                        <ul>
		                            <li><a href="page-course-single-v1.html">Single V1</a></li>
		                            <li><a href="page-course-single-v2.html">Single V2</a></li>
		                            <li><a href="page-course-single-v3.html">Single V3</a></li>
		                        </ul>
		                    </li>
                            <li><a href="page-instructors.html">Instructors</a></li>
		                    <li><a href="page-instructors-single.html">Instructor Single</a></li>
	                	</ul> -->
		            </li>
		            <li>
		                <!-- <a href="#"><span class="title">Privacy</span></a> -->
		                <!-- <ul>
		                    <li><a href="page-event.html">Event List</a></li>
		                    <li><a href="page-event-single.html">Event Single</a></li>
		                </ul> -->
		            </li>
		            <li>
		                <!-- <a href="#"><span class="title">Terms</span></a> -->
		                <!-- <ul>
				            <li>
				                <a href="#"><span class="title">Shop Pages</span></a>
				                <ul>
				                    <li><a href="page-shop.html">Shop</a></li>
				                    <li><a href="page-shop-single.html">Shop Single</a></li>
				                    <li><a href="page-shop-cart.html">Cart</a></li>
				                    <li><a href="page-shop-checkout.html">Checkout</a></li>
				                    <li><a href="page-shop-order.html">Order</a></li>
				                </ul>
				            </li>
				            <li>
				                <a href="#"><span class="title">User Admin</span></a>
				                <ul>
				                    <li><a href="page-dashboard.html">Dashboard</a></li>
				                    <li><a href="page-my-courses.html">My Courses</a></li>
				                    <li><a href="page-my-order.html">My Order</a></li>
				                    <li><a href="page-my-message.html">My Message</a></li>
				                    <li><a href="page-my-review.html">My Review</a></li>
				                    <li><a href="page-my-bookmarks.html">My Bookmarks</a></li>
				                    <li><a href="page-my-listing.html">My Listing</a></li>
				                    <li><a href="page-my-setting.html">My Setting</a></li>
		                        </ul>
				            </li>
		                    <li><a href="page-about.html">About Us</a></li>
		                    <li><a href="page-gallery.html">Gallery</a></li>
		                    <li><a href="page-faq.html">Faq</a></li>
		                    <li><a href="page-login.html">LogIn</a></li>
		                    <li><a href="page-register.html">Register</a></li>
		                    <li><a href="page-pricing.html">Membership</a></li>
		                    <li><a href="page-error.html">404 Page</a></li>
		                    <li><a href="page-terms.html">Terms and Conditions</a></li>
		                    <li><a href="page-become-instructor.html">Become an Instructor</a></li>
		                    <li><a href="page-ui-element.html">UI Elements</a></li>
		                </ul> -->
		            </li>
		            <!-- <li>
		                <a href="#"><span class="title">Blog</span></a>
		                <ul>
		                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
		                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
		                    <li><a href="page-blog-list.html">Blog List 3</a></li>
		                    <li><a href="page-blog-single.html">Single Post</a></li>
		                </ul>
		            </li> -->
		            <li class="last">
		                <!-- <a href="#"><span class="title">About Us</span></a> -->
		            </li>
				
		        </ul>
		        <ul class="sign_up_btn pull-right dn-smd mt20" style="margin-top: 10px;">
				
				
	                <!-- <li class="list-inline-item"><a href="#" class="btn btn-md"><i class="flaticon-megaphone"></i><span class="dn-md">Become an Instructor</span></a></li> -->
					<?php if($logged){?>

						<li class="list-inline-item" ><a style="padding-bottom: 7px;" href="<?php echo URL;?>dashboard" class="btn btn-md"><i class="flaticon-user"></i> <span class="dn-md">Dashboard</span></a></li> 
					<?php } else {?>

						<li class="list-inline-item" ><a style="padding-bottom: 7px;" href="<?php echo URL;?>studentlogin" class="btn btn-md"><i class="flaticon-user"></i> <span class="dn-md">Student Login</span></a></li><?php } ?>
	            </ul><!-- Button trigger modal -->
		    </nav>
		    <!-- End of Responsive Menu -->
		</div>
	</header>
	<!-- Modal -->
	<div class="sign_up_modal modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
	    		<ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="login_form">
							<form action="#">
								<div class="heading">
									<h3 class="text-center">Login to your account</h3>
									<p class="text-center">Don't have an account? <a class="text-thm" href="#">Sign Up!</a></p>
								</div>
								 <div class="form-group">
							    	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address">
								</div>
								<div class="form-group">
							    	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								</div>
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Remember me</label>
									<a class="tdu text-thm float-right" href="#">Forgot Password?</a>
								</div>
								<button type="submit" class="btn btn-log btn-block btn-thm2">Login</button>
								<hr>
								<div class="row mt40">
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
									</div>
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
									</div>
								</div>
							</form>
						</div>
				  	</div>
				  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="sign_up_form">
							<div class="heading">
								<h3 class="text-center">Create New Account</h3>
								<p class="text-center">Have an account? <a class="text-thm" href="#">Login</a></p>
							</div>
							<form action="#">
								<div class="form-group">
							    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Username">
								</div>
								 <div class="form-group">
							    	<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email Address">
								</div>
								<div class="form-group">
							    	<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
								</div>
								<div class="form-group">
							    	<input type="password" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password">
								</div>
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck2">
									<label class="form-check-label" for="exampleCheck2">Want to become an instructor?</label>
								</div>
								<button type="submit" class="btn btn-log btn-block btn-thm2">Register</button>
								<hr>
								<div class="row mt40">
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
									</div>
									<div class="col-lg">
										<button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
									</div>
								</div>
							</form>
						</div>
				  	</div>
				</div>
	    	</div>
	  	</div>
	</div>
</div>

<div id="page" class="stylehome1 home2 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="main_logo_home2">
		            <img class="nav_logo_img img-fluid float-left mt20" src="<?php echo URL?>assets/images/signature-logo.png" alt="header-logo.png" style="height:45px;">
		            <!-- <span>ABCL IT</span> -->
				</div>
				<ul class="menu_bar_home2">
					<li class="list-inline-item">
	                	<div class="search_overlay">
						  <a id="search-button-listener" class="mk-search-trigger mk-fullscreen-trigger" href="#">
						    <div id="search-button"><i class="flaticon-magnifying-glass"></i></div>
						  </a>
							<div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
							    <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="fa fa-times"></i></a>
							    <div id="mk-fullscreen-search-wrapper">
							      <form method="get" id="mk-fullscreen-searchform">
							        <input type="text" value="" placeholder="Search courses..." id="mk-fullscreen-search-input">
							        <i class="flaticon-magnifying-glass fullscreen-search-icon"><input value="" type="submit"></i>
							      </form>
							    </div>
							</div>
						</div>
					</li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div>
		<nav id="menu" class="stylehome1">
			<ul>
				<li>
					<a href="<?php echo URL;?>home"><span>Home</span></a>
	                <!-- <ul>
	                    <li><a href="index.html">Home 1</a></li>
	                    <li><a href="index2.html">Home 2</a></li>
	                    <li><a href="index3.html">Home 3</a></li>
	                    <li><a href="index4.html">Home 4</a></li>
	                    <li><a href="index5.html">Home 5</a></li>
	                    <li><a href="index6.html">Home - University</a></li>
	                    <li><a href="index7.html">Home College</a></li>
	                    <li><a href="index8.html">Home Kindergarten</a></li>
	                </ul> -->
				</li>
				<li>
				<a href="<?php echo URL;?>courses"><span>Courses</span></a>
					<!-- <ul>
						<li><span>Courses List</span>
							<ul>
	                            <li><a href="page-course-v1.html">Courses v1</a></li>
	                            <li><a href="page-course-v2.html">Courses v2</a></li>
	                            <li><a href="page-course-v3.html">Courses v3</a></li>
							</ul> -->
						<!-- </li> -->
						<!-- <li><span>Courses Single</span>
							<ul>
	                            <li><a href="page-course-single-v1.html">Single V1</a></li>
	                            <li><a href="page-course-single-v2.html">Single V2</a></li>
	                            <li><a href="page-course-single-v3.html">Single V3</a></li>
							</ul>
						</li> -->
                        <!-- <li><a href="page-instructors.html">Instructors</a></li>
		                <li><a href="page-instructors-single.html">Instructor Single</a></li> -->
					<!-- </ul> -->
				</li>
				<!-- <li><span>Events</span>
					<ul>
						<li><a href="page-event.html">Event List</a></li>
						<li><a href="page-event-single.html">Event Single</a></li>
					</ul>
				</li> -->
				<li style="color:#ffffff"><span>Privacy</span>
					<!-- <ul>
						<li><span>Shop Pages</span>
							<ul>
			                    <li><a href="page-shop.html">Shop</a></li>
			                    <li><a href="page-shop-single.html">Shop Single</a></li>
			                    <li><a href="page-shop-cart.html">Cart</a></li>
			                    <li><a href="page-shop-checkout.html">Checkout</a></li>
			                    <li><a href="page-shop-order.html">Order</a></li>
							</ul>
						</li>
						<li><span>User Admin</span>
							<ul>
								<li><a href="page-dashboard.html">Dashboard</a></li>
								<li><a href="page-my-courses.html">My Courses</a></li>
								<li><a href="page-my-order.html">My Order</a></li>
								<li><a href="page-my-message.html">My Message</a></li>
								<li><a href="page-my-review.html">My Review</a></li>
								<li><a href="page-my-bookmarks.html">My Bookmarks</a></li>
								<li><a href="page-my-listing.html">My Listing</a></li>
								<li><a href="page-my-setting.html">My Setting</a></li>
		                    </ul>
						</li>
		                <li><a href="page-about.html">About Us</a></li>
						<li><a href="page-gallery.html">Gallery</a></li>
						<li><a href="page-faq.html">Faq</a></li>
						<li><a href="page-login.html">LogIn</a></li>
						<li><a href="page-register.html">Register</a></li>
						<li><a href="page-pricing.html">Membership</a></li>
						<li><a href="page-error.html">404 Page</a></li>
						<li><a href="page-terms.html">Terms and Conditions</a></li>
						<li><a href="page-become-instructor.html">Become an Instructor</a></li>
						<li><a href="page-ui-element.html">UI Elements</a></li>
					</ul> -->
				</li>
				<li style="color:#ffffff"><span>Terms</span>
					<!-- <ul>
	                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
	                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
	                    <li><a href="page-blog-list.html">Blog List 3</a></li>
	                    <li><a href="page-blog-single.html">Single Post</a></li>
					</ul> -->
				</li>
				<li><a href="#">About Us</a></li>
				<li><a href="<?php echo URL;?>studentlogin"><span class="flaticon-user"></span> Login</a></li>
				<li><a href="<?php echo URL;?>student"><span class="flaticon-edit"></span> Register</a></li>
			</ul>
		</nav>
	</div>
<!--======================================
        END HEADER AREA
======================================-->

