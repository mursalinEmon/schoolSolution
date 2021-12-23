<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dotademy</title>

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
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/fancybox.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/jquery.filer.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/tooltipster.bundle.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/jqvmap.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/toast.css">
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
<header class="header-menu-area dashboard-header">
    <div class="header-menu-content dashboard-menu-content">
        <div class="container-fluid">
            <div class="main-menu-content">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-box">
                            <!-- <a href="index.html" class="logo"><img height="40" width="150" src="<?php //echo URL;?>assets/images/Smind-Logo.png" alt="logo"></a> -->
                            <h2><strong>DOTADEMY</strong></h2>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div>
                        </div>
                    </div><!-- end col-lg-2 -->
                    <div class="col-lg-10">
                        <div class="menu-wrapper">
                            <div class="contact-form-action mr-auto">
                                
                                    <div class="input-box">
                                        <!-- <div class="form-group">
                                            <input class="form-control" type="text" name="search" placeholder="Search for anything">
                                            <span class="la la-search search-icon"></span>
                                        </div> -->
                                    </div><!-- end input-box -->
                                
                            </div><!-- end contact-form-action -->
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                    <a href="<?php echo URL; ?>">Home</a>
                                        
                                    </li>
                                    <li>
                                    <a href="<?php echo URL;?>courses">courses</a>
                                        
                                    </li>
                                    
                                    <li>
                                    <a href="<?php echo URL;?>teacher/allteachers">Teachers</a>
                                        
                                    </li>
                                   
                                    <li><a href="<?php echo URL;?>contact">contact</a></li>
                                </ul><!-- end ul -->
                            </nav><!-- end main-menu -->
                            <div class="logo-right-button d-flex align-items-center">
                                <div class="header-action-button d-flex align-items-center">
                                    <div class="notification-wrap d-flex align-items-center">
                                        <div class="notification-item mr-3">
                                            <div class="dropdown">
                                                <button class="notification-btn dropdown-toggle" type="button" id="notificationDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="la la-bell"></i>
                                                    <span class="quantity">1</span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="notificationDropdownMenu">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__title">
                                                            <h4 class="widget-title">Notifications</h4>
                                                        </div><!-- end mess__title -->
                                                        <div class="mess__body">
                                                            <a href="dashboard.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="icon-element bg-color-1 text-white">
                                                                        <i class="la la-bolt"></i>
                                                                    </div>
                                                                    <div class="content">
                                                                        <span class="time">1 hour ago</span>
                                                                        <p class="text">Course will be start very soon!</p>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            
                                                        </div><!-- end mess__body -->
                                                        <div class="btn-box p-2 text-center">
                                                            <a href="dashboard.html">Show All Notifications</a>
                                                        </div><!-- end btn-box -->
                                                    </div><!-- end mess-dropdown -->
                                                </div><!-- end dropdown-menu -->
                                            </div><!-- end dropdown -->
                                        </div>
                                        <div class="notification-item mr-3">
                                            <div class="dropdown">
                                                <button class="notification-btn dropdown-toggle" type="button" id="messageDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="la la-envelope"></i>
                                                    <span class="quantity">1</span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="messageDropdownMenu">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__title">
                                                            <h4 class="widget-title">Messages</h4>
                                                        </div><!-- end mess__title -->
                                                        <div class="mess__body">
                                                            
                                                            <a href="dashboard-message.html" class="d-block">
                                                                <div class="mess__item">
                                                                    <div class="avatar dot-status online-status">
                                                                        <img src="<?php echo URL;?>public/images/theme/noimage.jpeg" alt="Team img">
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="widget-title">Dotademy</h4>
                                                                        <p class="text">Please complete your profile.</p>
                                                                        <span class="time">2 days ago</span>
                                                                    </div>
                                                                </div><!-- end mess__item -->
                                                            </a>
                                                            
                                                            
                                                            
                                                        </div><!-- end mess__body -->
                                                        <div class="btn-box p-2 text-center">
                                                            <a href="dashboard-message.html">Show All Message</a>
                                                        </div><!-- end btn-box -->
                                                    </div><!-- end mess-dropdown -->
                                                </div><!-- end dropdown-menu -->
                                            </div><!-- end dropdown -->
                                        </div>
                                    </div>
                                    <div class="user-action-wrap">
                                        <div class="notification-item user-action-item">
                                            <div class="dropdown">
                                                <button class="notification-btn dot-status online-status dropdown-toggle" type="button" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php if(file_exists("./assets/images/teachers/".$this->teacherid.".jpg")){ ?>
                                                    <img src="<?php echo URL;?>assets/images/teachers/<?php echo $this->teacherid; ?>.jpg" alt="noimage">
                                                    <?php }else{ ?>
                                                        <img src="<?php echo URL;?>public/images/theme/noimage.jpeg" alt="noimage">
                                                    <?php }?>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="userDropdownMenu">
                                                    <div class="mess-dropdown">
                                                        <div class="mess__title d-flex align-items-center">
                                                            <div class="image">
                                                                <a href="#">
                                                                <?php if(file_exists("./assets/images/teachers/".$this->teacherid.".jpg")){ ?>
                                                                <img src="<?php echo URL;?>assets/images/teachers/<?php echo $this->teacherid; ?>.jpg" alt="noimage">
                                                                <?php }else{ ?>
                                                                    <img src="<?php echo URL;?>public/images/theme/noimage.jpeg" alt="noimage">
                                                                <?php }?>
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <h4 class="widget-title font-size-16">
                                                                    <a href="#" class="text-white">
                                                                        <?php echo $this->teachername;?>
                                                                    </a>
                                                                </h4>
                                                                <span class="email"><?php echo $this->mail;?></span>
                                                            </div>
                                                        </div><!-- end mess__title -->
                                                        <div class="mess__body">
                                                            <ul class="list-items">
                                                                
                                                                
                                                                <li class="mb-0">
                                                                    <a href="<?php echo URL;?>facdashboard/editprofile" class="d-block">
                                                                        <i class="la la-edit"></i> Edit Profile
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                                
                                                                <li class="mb-0">
                                                                    <a href="<?php echo URL;?>facdashboard/logout" class="d-block">
                                                                        <i class="la la-power-off"></i> Logout
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <div class="section-block mt-2 mb-2"></div>
                                                                </li>
                                                                <li>
                                                                    <div class="business-content">
                                                                        <a href="#">
                                                                            <span class="widget-title font-size-18 d-block">Dotademy</span>
                                                                            <span class="line-height-24 d-block primary-color-3 font-size-14">Secure your future</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div><!-- end mess__body -->
                                                    </div><!-- end mess-dropdown -->
                                                </div><!-- end dropdown-menu -->
                                            </div><!-- end dropdown -->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end logo-right-button -->
                            <div class="user-nav-container">
                                <div class="humburger-menu">
                                    <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
                                </div><!-- end humburger-menu -->
                                <div class="section-tab section-tab-2">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation">
                                            <a href="#notification-home" role="tab" data-toggle="tab" class="active" aria-selected="true">
                                                Notifications
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#message-home" role="tab" data-toggle="tab" aria-selected="false">
                                                Messages
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#account-home" role="tab" data-toggle="tab" aria-selected="false">
                                                Account
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="user-panel-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="notification-home" role="tabpanel">
                                            <div class="user-sidebar-item">
                                                <div class="mess-dropdown">
                                                    <div class="mess__body">
                                                        <a href="dashboard.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="icon-element bg-color-1 text-white">
                                                                    <i class="la la-bolt"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <span class="time">1 hour ago</span>
                                                                    <p class="text">Your Resume Updated!</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="dashboard.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="icon-element bg-color-2 text-white">
                                                                    <i class="la la-lock"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <span class="time">November 12, 2019</span>
                                                                    <p class="text">You changed password</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="dashboard.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="icon-element bg-color-3 text-white">
                                                                    <i class="la la-check-circle"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <span class="time">October 6, 2019</span>
                                                                    <p class="text">You applied for a job <span class="color-text">Front-end Developer</span></p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="dashboard.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="icon-element bg-color-4 text-white">
                                                                    <i class="la la-user"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <span class="time">Jun 12, 2019</span>
                                                                    <p class="text">Your account has been created successfully</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="dashboard.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="icon-element bg-color-5 text-white">
                                                                    <i class="la la-download"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <span class="time">May 12, 2019</span>
                                                                    <p class="text">Someone downloaded resume</p>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                    </div><!-- end mess__body -->
                                                    <div class="btn-box p-2 text-center">
                                                        <a href="dashboard.html">Show All Notifications</a>
                                                    </div><!-- end btn-box -->
                                                </div><!-- end mess-dropdown -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="message-home" role="tabpanel">
                                            <div class="user-sidebar-item">
                                                <div class="mess-dropdown">
                                                    <div class="mess__body">
                                                        <a href="dashboard-message.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="avatar dot-status">
                                                                    <img src="images/team7.jpg" alt="Team img">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="widget-title">Michelle Moreno</h4>
                                                                    <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                    <span class="time">5 min ago</span>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="dashboard-message.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="avatar dot-status online-status">
                                                                    <img src="images/team8.jpg" alt="Team img">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="widget-title">Alex Smith</h4>
                                                                    <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                    <span class="time">2 days ago</span>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="dashboard-message.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="avatar dot-status">
                                                                    <img src="images/team9.jpg" alt="Team img">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="widget-title">Michelle Moreno</h4>
                                                                    <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                    <span class="time">5 min ago</span>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="dashboard-message.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="avatar dot-status online-status">
                                                                    <img src="images/team7.jpg" alt="Team img">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="widget-title">Alex Smith</h4>
                                                                    <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                    <span class="time">2 days ago</span>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                        <a href="dashboard-message.html" class="d-block">
                                                            <div class="mess__item">
                                                                <div class="avatar dot-status">
                                                                    <img src="images/team8.jpg" alt="Team img">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="widget-title">Alex Smith</h4>
                                                                    <p class="text">Thanks for reaching out. I'm quite busy right now on many</p>
                                                                    <span class="time">2 days ago</span>
                                                                </div>
                                                            </div><!-- end mess__item -->
                                                        </a>
                                                    </div><!-- end mess__body -->
                                                    <div class="btn-box p-2 text-center">
                                                        <a href="dashboard-message.html">Show All Message</a>
                                                    </div><!-- end btn-box -->
                                                </div><!-- end mess-dropdown -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-home" role="tabpanel">
                                            <div class="user-sidebar-item user-action-item">
                                                <div class="mess-dropdown">
                                                    <div class="mess__title d-flex align-items-center">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="images/team7.jpg" alt="John Doe">
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <h4 class="widget-title font-size-16">
                                                                <a href="#" class="text-white">
                                                                    Alex Smith
                                                                </a>
                                                            </h4>
                                                            <span class="email">alexsmith@example.com</span>
                                                        </div>
                                                    </div><!-- end mess__title -->
                                                    <div class="mess__body">
                                                        <ul class="list-items">
                                                            <li class="mb-0">
                                                                <a href="my-courses.html" class="d-block">
                                                                    <i class="la la-file-video-o"></i> My courses
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="shopping-cart.html" class="d-block">
                                                                    <i class="la la-shopping-cart"></i> My cart
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="my-courses.html" class="d-block">
                                                                    <i class="la la-bookmark"></i> My wishlist
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <div class="section-block mt-2 mb-2"></div>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="dashboard.html" class="d-block">
                                                                    <span><i class="la la-bell"></i> Notifications</span>
                                                                    <span class="badge bg-info text-white ml-2 p-1">9+</span>
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="dashboard-message.html" class="d-block">
                                                                    <span><i class="la la-envelope"></i> Messages</span>
                                                                    <span class="badge bg-info text-white ml-2 p-1">12+</span>
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="dashboard-settings.html" class="d-block">
                                                                    <i class="la la-gear"></i> Settings
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="dashboard-purchase-history.html" class="d-block">
                                                                    <i class="la la-cart-plus"></i> Purchase history
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <div class="section-block mt-2 mb-2"></div>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="student-detail.html" class="d-block">
                                                                    <i class="la la-user"></i> Public Profile
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="dashboard-settings.html" class="d-block">
                                                                    <i class="la la-edit"></i> Edit Profile
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <div class="section-block mt-2 mb-2"></div>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="#" class="d-block">
                                                                    <i class="la la-question"></i> Help
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <a href="<?php echo URL?>facdashboard/logout" class="d-block">
                                                                    <i class="la la-power-off"></i> Logout
                                                                </a>
                                                            </li>
                                                            <li class="mb-0">
                                                                <div class="section-block mt-2 mb-2"></div>
                                                            </li>
                                                            <li>
                                                                <div class="business-content">
                                                                    <a href="#">
                                                                        
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div><!-- end mess__body -->
                                                </div><!-- end mess-dropdown -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">
    <div class="dashboard-sidebar">
        <div class="dashboard-nav-trigger">
            <div class="dashboard-nav-trigger-btn">
                <i class="la la-bars"></i> Dashboard Nav
            </div>
        </div>
        <div class="dashboard-nav-container">
            <div class="humburger-menu">
                <div class="humburger-menu-lines side-menu-close"></div><!-- end humburger-menu-lines -->
            </div><!-- end humburger-menu -->
            <div class="side-menu-wrap">
                <ul class="side-menu-ul">
                    <li id="nav1" class="sidenav__item page-active"><a href="<?php echo URL?>facdashboard"><i class="la la-dashboard"></i> Dashboard</a></li>
                    <li id="nav2" class="sidenav__item"><a href="<?php echo URL?>facdashboard/showprofile"><i class="la la-user"></i>My Profile</a></li>
                    <li id="nav3" class="sidenav__item"><a href="<?php echo URL?>facdashboard/showcourses"><i class="la la-file-video-o"></i>My Courses</a></li>
                    <li id="nav4" class="sidenav__item"><a href="<?php echo URL?>facdashboard/uploadcourse"><i class="la la-file-video-o"></i>Upload Course</a></li>
                    <!-- <li class="sidenav__item"><a href="dashboard-quiz.html"><i class="la la-bolt"></i>Quiz Attempts</a></li>
                    <li class="sidenav__item"><a href="dashboard-bookmark.html"><i class="la la-bookmark"></i>Bookmarks</a></li>
                    <li class="sidenav__item"><a href="dashboard-enrolled-courses.html"><i class="la la-graduation-cap"></i>Enrolled Courses</a></li>
                    <li class="sidenav__item"><a href="dashboard-message.html"><i class="la la-bell"></i>Message <span class="badge badge-info radius-rounded p-1 ml-1">2</span></a></li>
                    <li class="sidenav__item"><a href="dashboard-reviews.html"><i class="la la-star"></i>Reviews</a></li>
                    <li class="sidenav__item"><a href="dashboard-earnings.html"><i class="la la-dollar"></i>Earnings</a></li>
                    <li class="sidenav__item"><a href="dashboard-withdraw.html"><i class="la la-money"></i>Withdraw</a></li>
                    <li class="sidenav__item"><a href="dashboard-purchase-history.html"><i class="la la-shopping-cart"></i>Purchase History</a></li>
                    <li class="sidenav__item"><a href="dashboard-submit-course.html"><i class="la la-plus-circle"></i>Submit Course</a></li>
                    <li class="sidenav__item"><a href="dashboard-settings.html"><i class="la la-cog"></i>Settings</a></li> -->
                    <li id="nav4" class="sidenav__item"><a href="<?php echo URL?>facdashboard/logout"><i class="la la-power-off"></i> Logout</a></li>
                    <!-- <li class="sidenav__item"><a href="javascript:void(0)" data-toggle="modal" data-target=".account-delete-modal" ><i class="la la-trash"></i> Delete Account</a></li> -->
                </ul>
            </div><!-- end side-menu-wrap -->
        </div>
    </div><!-- end dashboard-sidebar -->
    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content dashboard-bread-content d-flex align-items-center justify-content-between">
                        <div class="user-bread-content d-flex align-items-center">
                            <div class="bread-img-wrap">           
                                          
                            <?php if(file_exists("assets/images/teachers/".$this->teacherid.".jpg")){ ?>
                                <img src="<?php echo URL; ?>assets/images/teachers/<?php echo $this->teacherid; ?>.jpg" alt="">
                                <?php }else{?>
                                    <img src="<?php echo URL; ?>public/images/theme/noimage.jpeg" alt="">
                                <?php }?>
                            </div>
                            <div class="section-heading">
                                <h2 class="section__title font-size-30">Hello, <?php echo $this->teachername?></h2>
                                
                            </div>
                        </div>
                        
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->