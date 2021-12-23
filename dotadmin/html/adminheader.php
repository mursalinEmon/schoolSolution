<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dot School solution</title>
    <link rel="icon" type="image/x-icon" href="<?php echo URL; ?>public/images/biz/DOT-SCHOOL-SOLUTION-PNG.png">
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
        <div id="main-wrapper" class="menu-fixed page-hdr-fixed page-ftr-fixed">
            <!-- Menu Wrapper -->
            <div class="menu-wrapper">
                <div class="menu">
                    <!-- Menu Container -->
                    <ul> 
                    <?php if (Session::get('slogintype') == "Admin"){ ?>
                        <li class="menu-title">Main</li>
                        <li class="has-sub" id="dashboard">
                            <a><i class="icon-screen-desktop"></i><span>Dashboard</span><i class="arrow"></i></a></i></a>
                            <ul class="sub-menu">
                                <li id="showdashboard">
                                    <a href="<?php echo URL; ?>mainmenu"><span>Show Dashboard</span></a>
                                </li>                                
                            </ul>
                        </li>                       
                        <li class="menu-title">Operations</li>
                           <li class="has-sub" id="mnuablexpress">
                               <a><i class="far fa-sun"></i><span>Core Settings</span><i class="arrow"></i></a>
                               <ul class="sub-menu">
                                   <!-- <li id="subvebusettings">
                                       <a href="<?php echo URL; ?>venusettings"><span>Venu Settings</span></a>
                                       
                                   </li>   -->
                                   <!-- <li id="subcoursesettings">
                                       
                                       <a href="<?php echo URL; ?>coursesettings"><span>Course Settings</span></a>
                                       
                                   </li>   -->
                                   <li id="subtrainersettings">
                                       
                                       
                                       <a href="<?php echo URL; ?>trainersettings"><span>Trainer Settings</span></a>
                                      
                                   </li> 
                                   <li id="subusersettings">
                                       
                                       
                                       <a href="<?php echo URL; ?>manageuser"><span>User Settings</span></a>
                                   </li>
                                   <li id="subconfirmsale">
                                       <a href="<?php echo URL; ?>confirmsale"><span>Sales Confirm</span></a>
                                   </li>
                                   <li id="subregotp">
                                       <a href="<?php echo URL; ?>regotp"><span>Registration OTP</span></a>
                                   </li>
                                   
                                </ul>
                        </li>
                      
                        
                       
                            <li class="menu-title">Student Operations</li>
                                <li class="has-sub" id="mnugroups">
                                <a><i class="far fa-sun"></i><span>Student Settings</span><i class="arrow"></i></a>
                                <ul class="sub-menu">
                                   <li id="registerstudent">

                                       <a href="<?php echo URL; ?>studentregister"><span>Register Student</span></a>
                                      
                                   </li>
                                   <li id="enrollstudent">

                                       <a href="<?php echo URL; ?>studentenroll"><span>Enroll Student</span></a>
                                      
                                   </li>
                                   
                                </ul>
                        </li>

                        

                        <li class="menu-title">Class Operations</li>
                        <li class="has-sub" id="mnugroups">
                                <a><i class="far fa-sun"></i><span>Class Settings</span><i class="arrow"></i></a>
                                <ul class="sub-menu">
                                   <li id="subscheduleclass">

                                       <a href="<?php echo URL; ?>scheduleclass"><span>Create Class Schedule</span></a>
                                      
                                   </li>
                                   
                                </ul>
                        </li>
                        <?php } ?>
                        
                        <?php if (Session::get('slogintype') == "Teacher"){ ?>

                        

                        <li class="menu-title">Homework Operations</li>
                        <li class="has-sub" id="mnugroups">
                                <a><i class="far fa-sun"></i><span>Homework Settings</span><i class="arrow"></i></a>
                                <ul class="sub-menu">
                                
                                   <li id="subhwquestion">

                                       <a href="<?php echo URL; ?>hwquestion"><span>Homework Question</span></a>
                                      
                                   </li>
                                   <li id="subhwevaluate">

                                       <a href="<?php echo URL; ?>hwevaluate"><span>Homework Evaluation</span></a>
                                      
                                   </li>
                                </ul>
                        </li>
                        <li class="has-sub" id="mnusupport">
                                <a><i class="fa fa-eye"></i><span>Student Support</span><i class="arrow"></i></a>
                                <ul class="sub-menu">
                                    <li id="substudymaterial">
    
                                       <a href="<?php echo URL; ?>studymaterial"><span>Create Study Material</span></a>
                                      
                                   </li>
                                   <li id="subsupanswer">
    
                                       <a href="<?php echo URL; ?>supanswer"><span>Support Answer</span></a>
                                      
                                   </li>
                                </ul>
                        </li>
                        <?php } ?>
    
                        <li class="menu-title">Notice Operations</li>
                        <li class="has-sub" id="mnunotice">
                            <a><i class="far fa-sun"></i><span>Notice Settings</span><i class="arrow"></i></a>
                            <ul class="sub-menu">
                                <li id="subnoticecreate">
                                    <a href="<?php echo URL; ?>noticecreate"><span>Create Notice</span></a>
                                </li>
                                <li id="substudymaterialview">
                                    <a href="<?php echo URL; ?>studymaterialview"><span>View Study Material</span></a>
                                </li>
                                   
                            </ul>
                        </li>  

                        <li class="menu-title">Exam Operations</li>
                        <li class="has-sub" id="mnuexam">
                            <a><i class="far fa-sun"></i><span>Exam Settings</span><i class="arrow"></i></a>
                            <ul class="sub-menu">
                                <li id="subexamcreate">
                                    <a href="<?php echo URL; ?>examcreate"><span>Create Exam</span></a>
                                </li>
                                <li id="subquestioncreate">
                                    <a href="<?php echo URL; ?>questioncreate"><span>Create Question</span></a>
                                </li>
                                <li id="subexamassign">
                                    <a href="<?php echo URL; ?>examassign"><span>Exam Assign</span></a>
                                </li>
                                <li id="subexamevaluate">
                                    <a href="<?php echo URL; ?>examevaluate"><span>Exam Evaluation</span></a>
                                </li>
                                   
                            </ul>
                        </li>  
                            
                            
                        <!-- <li class="menu-title">Delivery</li>
                            <li class="has-sub" id="trunsactions">
                                <a><i class="icon-layers"></i><span>Pass Delivery</span><i class="arrow"></i></a>
                                <ul class="sub-menu">
                                   
                                    <li id="corppos">
                                        <a href="<?php echo URL; ?>trainingpass"><span>Training Pass Delivery</span></a>
                                    </li>   
                                                                
                                </ul>
                            </li>

                            
                            <li class="has-sub" id="mnuaccounting">
                                <a><i class="icon-layers"></i><span>Reports</span><i class="arrow"></i></a>
                                <ul class="sub-menu">
                                    <li id="subcomledger">
                                        <a href="<?php echo URL; ?>trainingreport"><span>Training Wise Report</span></a>
                                        <a href="<?php echo URL; ?>venubill"><span>Venu Bill</span></a>
                                        <a href="<?php echo URL; ?>trainerbill"><span>Trainer Bill</span></a>
                                    </li>   
                                                         
                                </ul>
                            </li> -->
                        
                    </ul>
                </div>
            </div>
            <!-- Page header -->
            <div class="page-hdr">
                <div class="row align-items-center">
                    <div class="col-4 col-md-7 page-hdr-left">
                        <!-- Logo Container -->
                        <div id="logo">
                            <div class="tbl-cell logo-icon">
                                <a href="/"><img src="<?php echo URL; ?>public/images/biz/DOT-SCHOOL-SOLUTION-LOGO.jpg" alt=""></a>
                            </div>
                            <div class="tbl-cell logo">
                                <a href="/"><img  src="<?php echo URL; ?>public/images/biz/DOT-SCHOOL-SOLUTION-LOGO.jpg"></a>
                            </div>
                        </div>
                        <div class="page-menu menu-icon">
                            <a class="animated menu-close"><i class="far fa-hand-point-left"></i></a>
                        </div>
                        <div class="page-menu page-fullscreen">
                            <a><i class="fas fa-expand"></i></a>
                        </div>
                        <div class="page-search">
                            <h3><?php echo Session::get('sbizlong') ?><sup> [<?php echo Session::get('sbizid') ?>]</sup></h3>
                        </div>
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
                                                
                                                <li><a href="<?php echo URL;?>retailerprofile"><i class="icon-user"></i><span>My Profile</span></a></li>
                                               
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
                            <div class="page-menu" style="color: white;">
                            <h3><?php echo Session::get('sbizlong') ?></h3>
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