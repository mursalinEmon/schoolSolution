<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>DOTADEMY</title>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="images/favicon.png">

    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/line-awesome.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/fancybox.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/tooltipster.bundle.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/style.css">
    <!-- end inject -->
</head>
<body>

<!-- start cssload-loader -->
<div class="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
<header class="header-menu-area">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-widget">
                        <ul class="header-action-list">
                            <li><a href="#"><span class="la la-phone mr-2"></span>123-456-789</a> </li>
                            <li><a href="#"><span class="la la-envelope-o mr-2"></span>contact@aduca.com</a></li>
                        </ul>
                    </div><!-- end header-widget -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="header-widget d-flex align-items-center justify-content-end">
                        <div class="header-right-info">
                            <ul class="header-social-profile">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div><!-- end header-right-info -->
                        <div class="header-right-info">
                            <div class="shop-cart">
                                <ul>
                                    <li>
                                        <p class="shop-cart-btn d-flex align-items-center">
                                            <i class="la la-shopping-cart"></i>
                                            <span class="product-count ml-1">2</span>
                                        </p>
                                        <ul class="cart-dropdown-menu">
                                            <li>
                                                <a href="shopping-cart.html" class="cart-link">
                                                    <img src="<?php echo URL;?>assets/images/small-img.jpg" alt="product">
                                                </a>
                                                <p class="cart-info">
                                                    <a href="shopping-cart.html">
                                                        The Complete Financial Analyst Course 2019
                                                    </a>
                                                    <span class="cart__author">Josh Purdila</span>
                                                    <span class="cart__price">
                                                           $22.99 <span class="before-price">$55.99</span>
                                                    </span>
                                                </p>
                                            </li>
                                            <li>
                                                <a href="shopping-cart.html" class="cart-link">
                                                    <img src="<?php echo URL;?>assets/images/small-img.jpg" alt="product">
                                                </a>
                                                <p class="cart-info">
                                                    <a href="shopping-cart.html">
                                                        The Complete Financial Analyst Course 2019
                                                    </a>
                                                    <span class="cart__author">Josh Purdila</span>
                                                    <span class="cart__price">
                                                           $22.99 <span class="before-price">$55.99</span>
                                                    </span>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="cart-total">Total: $44.99<span class="before-price">$110.99</span></p>
                                            </li>
                                            <li>
                                                <a class="theme-btn w-100 text-center" href="shopping-cart.html">go to Cart</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- end shop-cart -->
                        </div><!-- end header-right-info -->
                        <div class="header-right-info">
                            <ul class="header-action-list">
                                <li><a href="login.html">Login</a></li>
                                <li>or</li>
                                <li><a href="sign-up.html">Register</a></li>
                            </ul>
                        </div><!-- end header-right-info -->
                    </div><!-- end header-widget -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-top -->
    <div class="header-menu-content">
        <div class="container-fluid">
            <div class="main-menu-content">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-box">
                            <a href="index.html" class="logo"><img src="<?php echo URL;?>assets/images/logo.png" alt="logo"></a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-10">
                        <div class="menu-wrapper">
                            <div class="menu-category">
                                <ul>
                                    <li>
                                        <a href="#"><i class="la la-th-large mr-1"></i>Categories</a>
                                        <ul class="cat-dropdown-menu">
                                            <li>
                                                <a href="course-grid.html">Development <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">All Development</a></li>
                                                    <li><a href="#">Web Development</a></li>
                                                    <li><a href="#">Mobile Apps</a></li>
                                                    <li><a href="#">Game Development</a></li>
                                                    <li><a href="#">Databases</a></li>
                                                    <li><a href="#">Programming Languages</a></li>
                                                    <li><a href="#">Software Testing</a></li>
                                                    <li><a href="#">Software Engineering</a></li>
                                                    <li><a href="#">E-Commerce</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="course-grid.html">business <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">All Business</a></li>
                                                    <li><a href="#">Finance</a></li>
                                                    <li><a href="#">Entrepreneurship</a></li>
                                                    <li><a href="#">Strategy</a></li>
                                                    <li><a href="#">Real Estate</a></li>
                                                    <li><a href="#">Home Business</a></li>
                                                    <li><a href="#">Communications</a></li>
                                                    <li><a href="#">Industry</a></li>
                                                    <li><a href="#">Other</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="course-grid.html">IT & Software <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">All IT & Software</a></li>
                                                    <li><a href="#">IT Certification</a></li>
                                                    <li><a href="#">Hardware</a></li>
                                                    <li><a href="#">Network & Security</a></li>
                                                    <li><a href="#">Operating Systems</a></li>
                                                    <li><a href="#">Other</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="course-grid.html">Finance & Accounting <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#"> All Finance & Accounting</a></li>
                                                    <li><a href="#">Accounting & Bookkeeping</a></li>
                                                    <li><a href="#">Cryptocurrency & Blockchain</a></li>
                                                    <li><a href="#">Economics</a></li>
                                                    <li><a href="#">Investing & Trading</a></li>
                                                    <li><a href="#">Other Finance & Economics</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="course-grid.html">design <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">All Design</a></li>
                                                    <li><a href="#">Graphic Design</a></li>
                                                    <li><a href="#">Web Design</a></li>
                                                    <li><a href="#">Design Tools</a></li>
                                                    <li><a href="#">3D & Animation</a></li>
                                                    <li><a href="#">User Experience</a></li>
                                                    <li><a href="#">Other</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="course-grid.html">Personal Development <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">All Personal Development</a></li>
                                                    <li><a href="#">Personal Transformation</a></li>
                                                    <li><a href="#">Productivity</a></li>
                                                    <li><a href="#">Leadership</a></li>
                                                    <li><a href="#">Personal Finance</a></li>
                                                    <li><a href="#">Career Development</a></li>
                                                    <li><a href="#">Parenting & Relationships</a></li>
                                                    <li><a href="#">Happiness</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="course-grid.html">Marketing <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">All Marketing</a></li>
                                                    <li><a href="#">Digital Marketing</a></li>
                                                    <li><a href="#">Search Engine Optimization</a></li>
                                                    <li><a href="#">Social Media Marketing</a></li>
                                                    <li><a href="#">Branding</a></li>
                                                    <li><a href="#">Video & Mobile Marketing</a></li>
                                                    <li><a href="#">Affiliate Marketing</a></li>
                                                    <li><a href="#">Growth Hacking</a></li>
                                                    <li><a href="#">Other</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="course-grid.html">Health & Fitness <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">All Health & Fitness</a></li>
                                                    <li><a href="#">Fitness</a></li>
                                                    <li><a href="#">Sports</a></li>
                                                    <li><a href="#">Dieting</a></li>
                                                    <li><a href="#">Self Defense</a></li>
                                                    <li><a href="#">Meditation</a></li>
                                                    <li><a href="#">Mental Health</a></li>
                                                    <li><a href="#">Yoga</a></li>
                                                    <li><a href="#">Dance</a></li>
                                                    <li><a href="#">Other</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="course-grid.html">Photography <i class="la la-angle-right"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">All Photography</a></li>
                                                    <li><a href="#">Digital Photography</a></li>
                                                    <li><a href="#">Photography Fundamentals</a></li>
                                                    <li><a href="#">Commercial Photography</a></li>
                                                    <li><a href="#">Video Design</a></li>
                                                    <li><a href="#">Photography Tools</a></li>
                                                    <li><a href="#">Other</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- end menu-category -->
                            <div class="contact-form-action">
                                <form method="post">
                                    <div class="input-box">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="search" placeholder="Search for anything">
                                            <span class="la la-search search-icon"></span>
                                        </div>
                                    </div><!-- end input-box -->
                                </form>
                            </div><!-- end contact-form-action -->
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="index.html">Home 01</a></li>
                                            <li><a href="home-2.html">Home 02</a></li>
                                            <li><a href="home-3.html">Home 03</a></li>
                                            <li><a href="home-rtl.html">Home RTL</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">courses</a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="course-grid.html">course grid</a></li>
                                            <li><a href="course-details.html">course details</a></li>
                                            <li><a href="lesson-details.html">lesson details</a></li>
                                            <li><a href="my-courses.html">My courses</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Student</a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="student-detail.html">student detail</a></li>
                                            <li><a href="student-quiz.html">take quiz</a> <span class="new-page-badge">New</span></li>
                                            <li><a href="student-quiz-results.html">quiz results</a> <span class="new-page-badge">New</span></li>
                                            <li><a href="student-quiz-result-details.html">quiz details</a> <span class="new-page-badge">New</span></li>
                                            <li><a href="student-quiz-result-details-2.html">quiz details 2</a> <span class="new-page-badge">New</span></li>
                                            <li><a href="student-path-assessment.html">Skill Assessment</a> <span class="new-page-badge">New</span></li>
                                            <li><a href="student-path-assessment-result.html">Skill result</a> <span class="new-page-badge">New</span></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">pages</a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="dashboard.html">dashboard</a></li>
                                            <li><a href="about.html">about</a></li>
                                            <li><a href="teachers.html">Teachers</a></li>
                                            <li><a href="teacher-detail.html">Teacher detail</a></li>
                                            <li><a href="become-a-teacher.html">become instructor</a></li>
                                            <li><a href="faq.html">FAQs</a></li>
                                            <li><a href="admission.html">admission</a></li>
                                            <li><a href="gallery.html">gallery</a></li>
                                            <li><a href="pricing-table.html">pricing tables</a></li>
                                            <li><a href="sign-up.html">sign-up</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="recover.html">recover</a></li>
                                            <li><a href="shopping-cart.html">cart</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="error.html">error 404 page</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">blog</a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="blog-full-width.html">blog full width </a></li>
                                            <li><a href="blog-grid.html">blog grid</a></li>
                                            <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                            <li><a href="blog-single.html">blog detail</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">contact</a></li>
                                </ul><!-- end ul -->
                            </nav><!-- end main-menu -->
                            <div class="logo-right-button">
                                <a href="admission.html" class="theme-btn">admission</a>
                            </div><!-- end logo-right-button -->
                        </div><!-- end menu-wrapper -->
                    </div><!-- end col-lg-10 -->
                </div><!-- end row -->
            </div>
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-content -->
</header><!-- end header-menu-area -->
<!--======================================
        END HEADER AREA
======================================-->