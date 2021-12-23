<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dot School Solution</title>
    <link rel="icon" type="image/x-icon" href="<?php echo URL; ?>assets/images/DOT-SCHOOL-SOLUTION-PNG.png">
    <!-- Switcher CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/switchery/switchery.min.css" />
    <!-- editor -->
    

    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/sweetalert/sweetalert.css" />
    <!-- Date time picker -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/pickadate/default.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/pickadate/default.date.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/pickadate/default.time.css" />
    <!-- Daterangepicker CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/daterangepicker/daterangepicker.css" />
    <!-- Morris CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/morris/morris.css" />
    
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/datatable/datatables.min.css" />
    
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/assets/plugin/dropzone/dropzone.min.css" />
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_admin/dist/css/style.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
    
</head>
<body>

    <div class="loader-wrapper">
        <div class="loader spinner-3">
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
            <div class="bg-primary"></div>
        </div>
    </div>
    
    <div class="wrapper">
        <!-- Main Container -->
        <div id="main-wrapper"  class="menu-fixed page-hdr-fixed page-ftr-fixed">
            <!-- Menu Wrapper -->
            <div class="menu-wrapper" style="background-color:#fff;">
                <div class="menu">
                    <!-- Menu Container -->
                    <ul> 
                        <li class="menu-title" style="color:#ffffff;">Main</li>
                        <li class="has-sub" id="dashboard">
                            <a style="color:#000000;"><i class="icon-screen-desktop"></i><span>Dashboard</span></i></a>
                            <ul class="sub-menu" style="background-color:#01aef3;">
                                <li id="showdashboard">
                                    <a style="color:#000000;" href="<?php echo URL; ?>dashboard"><span>Show Dashboard</span></a>
                                </li>                                
                            </ul>
                        </li>                       
                        <li class="menu-title" style="color:#ffffff;">Operations</li>
                        <li class="has-sub" id="mnuclass">
                               <a style="color:#000000;"><i class="far fa-sun"></i><span>Class Operation</span><i class="arrow"></i></a>
                               <ul class="sub-menu" style="background-color:#01aef3;">

                                   <li id="substujoinclass">
                                       <a style="color:#000000;" href="<?php echo URL; ?>stujoinclass"><span>Join Class</span></a>
                                   </li>

                                   <li id="subhwsubmit">
                                       <a style="color:#000000;" href="<?php echo URL; ?>hwsubmit"><span>Homework Submit</span></a>
                                   </li>
                                   <li id="stuexam">
                                       <a style="color:#000000;" href="<?php echo URL; ?>stuexam"><span>Exams</span></a>
                                   </li>
                                   
                                </ul>
                        </li>
                        <li class="has-sub" id="mnusupport">
                               <a style="color:#000000;"><i class="far fa-sun" aria-hidden="true"></i><span>Support</span><i class="arrow"></i></a>
                               <ul class="sub-menu" style="background-color:#01aef3;">
                                   
                                   <li id="substunoticeview">
                                       <a style="color:#000000;" href="<?php echo URL; ?>stunoticeview"><span>Notice</span></a>
                                   </li>
                                   
                                   <li id="subsupquestion">
                                    <a style="color:#000000;" href="<?php echo URL; ?>supquestion"><span>Ask A Question</span></a>
                                   </li>
                                   
                                   <li id="substudymaterialview">
                                    <a style="color:#000000;" href="<?php echo URL; ?>studymaterialview"><span>View Study Material</span></a>
                                   </li>
                                   
                                </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <!-- Page header -->
            <div class="page-hdr" style="background-color:#fd8e18;">
                <div class="row align-items-center">
                    <div class="col-4 col-md-7 page-hdr-left">
                        <!-- Logo Container -->
                        <div id="logo" style="background-color:#01aef3;">
                            <div class="tbl-cell logo-icon">
                                <a href="<?php echo URL?>"><img src="<?php echo URL; ?>assets/images/DOT-SCHOOL-SOLUTION-LOGO.jpg" alt=""></a>
                            </div>
                            <div class="tbl-cell logo">
                                <a href="<?php echo URL?>"><img  src="<?php echo URL; ?>assets/images/DOT-SCHOOL-SOLUTION-LOGO.jpg"></a>
                            </div>
                        </div>
                        <div class="page-menu menu-icon">
                            <a style="color:#ffffff;" class="animated menu-close"><i class="far fa-hand-point-left"></i></a>
                        </div>
                        <div class="page-menu page-fullscreen">
                            <a style="color:#ffffff;"><i class="fas fa-expand"></i></a>
                        </div>
                        <!-- <div class="page-search">
                            <input type="text" placeholder="Search your key....">
                        </div> -->
                    </div>
                    <div class="col-8 col-md-5 page-hdr-right">
                        <div class="page-hdr-desktop">
                            <div class="page-menu menu-dropdown-wrapper menu-user">
                                <a class="user-link">
                                    <span class="tbl-cell user-name pr-3 text-primary"><span class="pl-2"><?php echo Session::get('susername');?></span></span>
                                    <?php if(file_exists(USER_IMAGE_LOCATION.Session::get('suser').".jpg")){ ?>
                                    <span class="tbl-cell avatar"><img src="<?php echo USER_IMAGE_LOCATION.Session::get('suser'); ?>.jpg" alt=""></span>
                                       <?php } else{?> 
                                    <span class="tbl-cell avatar"><img src="<?php echo URL; ?>asset_admin/uploads/author-4.jpg" alt=""></span>
                                    <?php }?>
                                </a>
                                <div class="menu-dropdown menu-dropdown-right menu-dropdown-push-right">
                                    <div class="arrow arrow-right"></div> 
                                    <div class="menu-dropdown-inner">
                                        <div class="menu-dropdown-head pb-3">
                                            <div class="tbl-cell">
                                                <img src="<?php echo URL; ?>asset_admin/uploads/author-1.jpg" alt="">
                                                <!-- <i class="fa fa-user-circle"></i> -->
                                            </div>
                                            <div class="tbl-cell pl-2 text-left">
                                                <p class="m-0 font-18"><?php echo Session::get('susername');?></p>
                                                <p class="m-0 font-14">User</p>
                                            </div>
                                        </div>
                                        
                                        <div class="menu-dropdown-body">
                                            <ul class="menu-nav">
                                                
                                                <li><a href="<?php echo URL;?>studentprofile"><i class="icon-user"></i><span>My Profile</span></a></li>
                                               
                                            </ul>
                                        </div>
                                        <div class="menu-dropdown-footer text-right">
                                        <a href="<?php echo URL.'mainmenu/logout'; ?>" class="btn btn-outline btn-primary btn-pill btn-outline-2x font-12 btn-sm">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="page-menu menu-dropdown-wrapper menu-notification">
                                <a><i class="icon-bell"></i><span class="notification">20</span></a>
                                <div class="menu-dropdown menu-dropdown-right menu-dropdown-push-right">
                                    <div class="arrow arrow-right"></div> 
                                    <div class="menu-dropdown-inner">
                                        <div class="menu-dropdown-head">Notification</div>
                                        <div class="menu-dropdown-body">
                                            <ul class="timeline m-0">
                                                <li>
                                                    <a href="" target="_blank" class="timeline-container">
                                                        <div class="arrow"></div>
                                                        <div class="description">Wallet Adddes </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="" target="_blank" class="timeline-container">
                                                        <div class="arrow"></div>
                                                        <div class="description">Coin Transferred from BTC<span class="badge badge-danger badge-pill badge-sm">Unpaid</span></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="" target="_blank" class="timeline-container">
                                                        <div class="arrow"></div>
                                                        <div class="description">BTC bought</div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="" target="_blank" class="timeline-container">
                                                        <div class="arrow"></div>
                                                        <div class="description">Server Restarted <span class="badge badge-success badge-pill badge-sm">Resolved</span></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="" target="_blank" class="timeline-container">
                                                        <div class="arrow"></div>
                                                        <div class="description">New order received</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="page-menu menu-dropdown-wrapper menu-quick-links">
                                <a><i class="icon-grid"></i></a>
                                <div class="menu-dropdown menu-dropdown-right menu-dropdown-push-right">
                                    <div class="arrow arrow-right"></div> 
                                    <div class="menu-dropdown-inner">
                                        <div class="menu-dropdown-head">Quick Links</div>
                                        <div class="menu-dropdown-body p-0">
                                            <div class="row m-0 box">
                                                <div class="col-6 p-0 box">
                                                    <a href="">
                                                        <i class="icon-emotsmile"></i>
                                                        <span>New Contact</span>
                                                    </a>
                                                </div>
                                                <div class="col-6 p-0 box">
                                                    <a href="">
                                                        <i class="icon-docs"></i>
                                                        <span>New Invoice</span>
                                                    </a>
                                                </div>
                                                <div class="col-6 p-0 box">
                                                    <a href="">
                                                        <i class="icon-calculator"></i>
                                                        <span>New Quote</span>
                                                    </a>
                                                </div>
                                                <div class="col-6 p-0 box">
                                                    <a href="">
                                                        <i class="icon-rocket"></i>
                                                        <span>New Expense</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="page-menu">
                                <a class="open-sidebar-right"><i class="icon-settings"></i><span></span></a>
                            </div> -->
                        </div>
                        <div class="page-hdr-mobile">
                            <div class="page-menu open-mobile-search">
                                <a href="#"><i class="icon-magnifier"></i></a>
                            </div>
                            <div class="page-menu open-left-menu">
                                <a href="#"><i class="icon-menu"></i></a>
                            </div>
                            <div class="page-menu oepn-page-menu-desktop">
                                <a href="#"><i class="icon-options-vertical"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>