<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Title -->
    <title>United Associates</title>
    <link rel="icon" type="image/x-icon" href="./public/images/website/united_associates_logo.png">
    <!-- Meta Description Tag -->
    <meta name="Description" content="United Associates and its team">
    <!-- Favicon Icon -->
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
    <!-- Material Design Lite Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_website/assets/plugin/material/material.min.css" />
    <!-- Material Design Select Field Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_website/assets/plugin/material/mdl-selectfield.min.css">
    <!-- Animteheading Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_website/assets/plugin/animateheading/animateheading.min.css" />
    <!-- Owl Carousel Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_website/assets/plugin/owl_carousel/owl.carousel.min.css" />
    <!-- Animate Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_website/assets/plugin/animate/animate.min.css" />
    <!-- Magnific Popup Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_website/assets/plugin/magnific_popup/magnific-popup.min.css" />
    <!-- Flex Slider Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_website/assets/plugin/flexslider/flexslider.min.css" />
    <!-- Custom Main Stylesheet CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>asset_website/dist/css/style.css">
</head>
<body>
    <div class="wrapper">
        <!-- Start Header Section -->
        <header id="header" class="header-gradient">
            <div class="layer-stretch hdr">
                <div class="tbl animated fadeInDown">
                    <div class="tbl-row">
                        <!-- Start Header Logo Section -->
                        <div class="tbl-cell hdr-logo">
                            <a href="index.html" class="text-white"><h4><strong>UNITED ASSOCIATES</strong></h4></a>
                        </div><!-- End Header Logo Section -->
                        <div class="tbl-cell hdr-menu">
                            <!-- Start Menu Section -->
                            <ul class="menu">
                                <?php foreach ($this->menuitem as $key=>$value){?>
                                    <li class="menu-megamenu-li">
                                        <a href="<?php echo $value['link']?>" class="mdl-button mdl-js-button mdl-js-ripple-effect"><?php echo $value['menu']?></a>                                        
                                    </li>
                                <?php }?>
                                <li class="menu-megamenu-li">
                                    <a class="mdl-button mdl-js-button mdl-js-ripple-effect hdr-basket" href="#"><i class="fa fa-cart-plus"></i><span id="cart-count" class="cart-count">0</span></a>
                                    <ul class="menu-megamenu menu-cart" id="mcart">
                                        <li class="cart-overview">
                                            <a href="#" class="row">
                                                <div class="col-4 pr-0 cart-img">
                                                    <!-- <img src="uploads/shop-11.jpg" alt=""> -->Empty Cart
                                                </div>
                                                <!-- <div class="col-8 cart-details">
                                                    <span class="title">Canvas Backpack</span>
                                                    <span class="price">$39</span>
                                                    <span class="qty">Quantity - 3</span>
                                                    <div class="cart-remove"><i class="icon-close"></i></div>
                                                </div> -->
                                            </a>
                                        </li>
                                       
                                        <li class="row align-items-center">
                                        <div class="col-2 text-right">
                                               
                                            </div>
                                            <div class="col-8 text-right">
                                                <p class="font-dosis font-20 m-0">Total : BDT 0</p>
                                            </div>
                                        </li>
                                        <!-- <li class="row align-items-center">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-dark text-white text-center">Checkout</a>
                                            </div>
                                            
                                        </li> -->
                                    </ul>
                                </li>
                                
                                <li class="mobile-menu-close"><i class="fa fa-times"></i></li>
                            </ul><!-- End Menu Section -->
                            <div id="menu-bar"><a><i class="fa fa-bars"></i></a></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </header><!-- End Header Section -->
        <!-- Start Page Title Section -->
        <div class="page-ttl page-gradient">
            <div class="layer-stretch">
                <div class="page-ttl-container">
                <?php echo $this->bannertext;?>
                <?php echo $this->breadcrumb;?>
                </div>
            </div>
        </div><!-- End Page Title Section -->
        <!-- Start Page Section -->