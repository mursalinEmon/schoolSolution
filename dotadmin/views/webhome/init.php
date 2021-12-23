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
        <header id="header" class="header-dark">
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
                                        <!-- <li class="cart-overview">
                                            <a href="#" class="row">
                                                <div class="col-4 pr-0 cart-img">
                                                    <img src="uploads/shop-31.jpg" alt="">
                                                </div>
                                                <div class="col-8 cart-details">
                                                    <span class="title">Leather Wallet</span>
                                                    <span class="price">$49</span>
                                                    <span class="qty">Quantity - 3</span>
                                                    <div class="cart-remove"><i class="icon-close"></i></div>
                                                </div>
                                            </a>
                                        </li> -->
                                        <li class="row align-items-center">
                                            <div class="col-6">
                                                <a href="<?php echo URL; ?>products/cartdetail" class="btn btn-dark text-white text-center">Checkout</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <p class="font-dosis font-20 m-0">Total : BDT 0</p>
                                            </div>
                                        </li>
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
        <!-- Start Slider Section -->
        <div id="slider" class="slider-dark slider-colored">
            <div class="flexslider slider-wrapper">
                <ul class="slides">
                    <li>
                        <div class="slider-backgroung-image" style="background-image: url(<?php echo URL;?>/public/images/website/teamunited.jpeg);">
                            <div class="layer-stretch">
                                <div class="slider-info">
                                    <h1>UNITED ASSOCIATES</h1>
                                    <p class="animated fadeInDown">Where dream comes true.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </li> 
                    <li>
                        <div class="slider-backgroung-image" style="background-image: url(<?php echo URL;?>/public/images/website/afa_2019.jpeg);">
                            <div class="layer-stretch">
                                <div class="slider-info">
                                    <h1>UNITED ASSOCIATES</h1>
                                    <p class="animated fadeInDown">Where dream comes true.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div><!-- End Slider Section -->
        <!-- Start Service Section -->
        <div class="service">
            <div class="layer-stretch">
                <div class="layer-wrapper pb-2">
                <div class="layer-ttl"><img src="<?php echo URL;?>/public/images/website/united_associates_logo.png" height="80" alt=""></div>
                    <div class="layer-ttl"><h4>Our <span class="text-primary">Mission</span></h4></div>
                    <p class="layer-sub-ttl">We are committed to render services to the customers on demand through online in making delivery of the products to their utmost satisfaction. We are confident that customers will be delighted to have our contractual quality products and services in time. The main goal of the company is customer satisfaction is our main strength. We focused our mission divided into three consecutive terms. These are—</p>
                    <div class="row pt-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="service-card service-card-2">
                                <div class="tbl-cell">
                                    <div class="service-icon"><i class="ti-desktop text-primary"></i></div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="service-heading">Short term (Within 31st December, 2017 )</div>
                                    <div class="service-body">
                                        <p>
                                            <ul>
                                            <li>Targeted to be online sales partner or e-distributor with at least 100(hundred) renowned companies in Bangladesh.</li>
                                            <li>Establish ABL retailer care centre in every divisional city.</li>
                                            <li>Ensure home delivery services in every divisional city including Dhaka.</li>
                                            <li>Create at least 10,000 (Ten Thousand) regular customers those who will purchase all essential goods from ABL.</li>
                                            </ul>
                                        </p>
                                        <!-- <a href="#" class="link-icon"><span>View More</span><i class="ti-angle-double-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="service-card service-card-2">
                                <div class="tbl-cell">
                                    <div class="service-icon"><i class="ti-gallery text-success"></i></div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="service-heading">Midterm (Within 31st December, 2019)</div>
                                    <div class="service-body">
                                    <p>
                                            <ul>
                                            <li>Ensure to be online sales partner or e-distributor with at least 1000 (one thousand) renowned companies both in home and abroad.</li>
                                            <li>Establish ABL retailer care centre in every district city of the company.</li>
                                            <li>Ensure for home delivery services in every district city. [Minimum 1000 Taka Per order]</li>
                                            <li>Create at least 100,000 (one hundred thousand) regular customers those who will purchase all essential commodities from ABL.</li>
                                            </ul>
                                        </p>
                                        <!-- <a href="#" class="link-icon"><span>View More</span><i class="ti-angle-double-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 col-lg-4">
                            <div class="service-card service-card-2">
                                <div class="tbl-cell">
                                    <div class="service-icon"><i class="ti-mobile text-secondary"></i></div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="service-heading">Responsive Design</div>
                                    <div class="service-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
                                        <a href="#" class="link-icon"><span>View More</span><i class="ti-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-6 col-lg-4">
                            <div class="service-card service-card-2">
                                <div class="tbl-cell">
                                    <div class="service-icon"><i class="icon-people text-info"></i></div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="service-heading">Long-term (Within 31st December, 2024)</div>
                                    <div class="service-body">
                                        <p>
                                        <ul>
                                            <li>Ensure to be online sales partner or e-distributor with at least 10,000 (Ten Thousand) well reputed companies both in home and abroad.</li>
                                            <li>Establish ABL e-shop in every district city of the company.</li>
                                            <li>Ensure home delivery services in every town of the country.</li>
                                            <li>Create at least 10,000000 (Ten Million) regular customers those who will purchase all essential commodities from ABL.</li>
                                        </ul>
                                        </p>
                                        <!-- <a href="#" class="link-icon"><span>View More</span><i class="ti-angle-double-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 col-lg-4">
                            <div class="service-card service-card-2">
                                <div class="tbl-cell">
                                    <div class="service-icon"><i class="ti-ruler-pencil text-warning"></i></div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="service-heading">Clean Code</div>
                                    <div class="service-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
                                        <a href="#" class="link-icon"><span>View More</span><i class="ti-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="service-card service-card-2">
                                <div class="tbl-cell">
                                    <div class="service-icon"><i class="ti-pencil-alt text-danger"></i></div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="service-heading">Easy to Customize</div>
                                    <div class="service-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
                                        <a href="#" class="link-icon"><span>View More</span><i class="ti-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div><!-- End of Service Section -->
        <!-- Start About Section -->
        <div class="about">
            <div class="layer-stretch">
                <div class="layer-wrapper">
                    <div class="layer-ttl"><h4><span class="text-primary">About</span> Us</h4></div>
                    <div class="layer-sub-ttl">
                        
                    </div>
                    <div class="row pt-4">
                        
                        <div class="col-md-12">
                            <!-- <div class="about-container"> -->
                                <!-- <p class="paragraph-black layer-sub-ttl">Content will be here</p> -->
                                <div class="action-content">
                                <p>
                                Many online-based e-commerce platform are spreading in Bangladesh. It is a global demand of the people. A lot of companies have made a great place in the market with great confidence. On the others hand, a big charge against some companies. This is the current situation when Amarbazar Ltd. (ABL) exposed its journey in early 2017. It has advanced with a new dream by a group of young entrepreneur. It is a government registered private limited company under the commerce ministry. It’s trade license No. 03-073514 (Dhaka South City Corporation). Fundamentally there is no different than any other business company. It is a drop shipping store of branded contractual products. Amarbazar Ltd believe in high-quality products and exceptional customer service. It thoroughly check-up the quality of every goods, but deals with only reliable suppliers which most affordable prices. We packaging with care 100% genuine products in our won station. That is why Amarbarzar have a huge number of satisfied customer group. We respond to customers all over Bangladesh. Amarbazar respond to customer all over Bangladesh. So Amarbazar’s customers have become part of this family day by day. It is important to note that in every division, district, important upazilla and thana level of Bangladesh more than 1,50,000 (One Hundred Fifty Thousand) potential customers have been registered to purchase all essential products from Amarbazar Ltd. (ABL).
                                </p>
                                <p>
                                No doubt, interests of customers are always the topmost priority for Amarbazar. We make it easy to find exactly what a customer is looking for. It does not specialize in any specific category. A customer can buy items in our site more than 20 different categories. We have a nice looking website. Every day adding new products on our site. The vast range of products includes Electrical & Electronics, Home Appliance, Consumer Foods, Baby Foods, Grocery, Beverage, Cosmetics, Fashionable Items, Furniture, Home Decors, IT products, Communication Products, Vehicle, Jewelry etc. & what not! It is our dream that Amarbazar Ltd, will be the largest online marketplace tomorrow not only in Bangladesh, also Asia. It is most information that when a customer purchases at list products of 3000 Taka plus, Amarbazar will send it to customer destination at our own expense with a very short time.
                                </p>
                                <p>
                                Amarbazar Ltd. have accommodated more than 35,00 products from listed companies. Considering the needs of the customer groups under the current scenario, ABL has already signed contract as an e-distributor on-line partnership with the following companies.
                                </p>
                                </div>
                                <!-- <div class="skills mt-3">
                                    <p class="font-14">Web Design<span class="badge badge-primary badge-pill float-right">85%</span></p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skills mt-3">
                                    <p class="font-14">Web Development<span class="badge badge-success badge-pill float-right">90%</span></p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skills mt-3">
                                    <p class="font-14">Mobile App Development <span class="badge badge-secondary badge-pill float-right">95%</span></p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="skills mt-3">
                                    <p class="font-14">Photography <span class="badge badge-dark badge-pill float-right">80%</span></p>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End of About Section -->
        <!-- Start Portfolio Section -->
        <div class="portfolio">
            <div class="layer-stretch">
                <div class="layer-wrapper pb-20">
                    <div class="layer-ttl"><h4>Our <span class="text-primary">Achievers</span></h4></div>
                    <div class="layer-sub-ttl">We always grateful to our achievers</div>
                    <div class="portfolio-header text-center pt-4">
                        <button class="portfolio-filter active" data-filter="all">ALL</button>
                        <button class="portfolio-filter" data-filter="dmp">DMP</button>
                        <button class="portfolio-filter" data-filter="rmp">RMP</button>
                        <button class="portfolio-filter" data-filter="amp">AMP</button>                        
                    </div>
                    <div class="portfolio-wrapper">
                        <ul class="row">
                        <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter dmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/dmp/ashraful_amin.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">DMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a href="<?php echo URL;?>/public/images/website/dmp/ashraful_amin.jpg" class="portfolio-gallery" title="Md. Ashraful Amin"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Md. Ashraful Amin</p>
                                    </figcaption>
                                </figure>
                            </li>
                        <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter rmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/rmp/babul.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">RMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a href="<?php echo URL;?>/public/images/website/rmp/babul.jpg" class="portfolio-gallery" title="Abdul Hannan Babul"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Abdul Hannan Babul</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter rmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/rmp/mourshed.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">RMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/rmp/mourshed.jpg" class="portfolio-gallery" title="Md Shahidul Islam Palash"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Md Shahidul Islam Palash</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter rmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/rmp/ahmed.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">RMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/rmp/ahmed.jpg" class="portfolio-gallery" title="Kamal Ahmed"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Kamal Ahmed</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter rmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/rmp/poltu.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">RMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a href="<?php echo URL;?>/public/images/website/rmp/poltu.jpg" class="portfolio-gallery" title="Sultan Ahmed"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Sultan Ahmed</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter rmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/rmp/babu.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">RMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/rmp/babu.jpg" class="portfolio-gallery" title="Shohidul Hoque"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Shohidul Hoque</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter rmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/rmp/tajul.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">RMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/rmp/tajul.jpg" class="portfolio-gallery" title="Tajul Islam"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Tajul Islam</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter rmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/rmp/rubel.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">RMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/rmp/rubel.jpg" class="portfolio-gallery" title="Rubel ahmed"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Rubel ahmed</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter rmp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/rmp/biplob.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">RMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/rmp/biplob.jpg" class="portfolio-gallery" title="Nazmul Hasan Biplob"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Nazmul Hasan Biplob</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/alam2.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a href="<?php echo URL;?>/public/images/website/amp/alam2.jpg" class="portfolio-gallery" title="Jahangir Alam"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Jahangir Alam</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/rahman.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/amp/rahman.jpg" class="portfolio-gallery" title="Mohammad Sayeedur Rahman"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Mohammad Sayeedur Rahman</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/palash.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/amp/palash.jpg" class="portfolio-gallery" title="Md Shahidul Islam Palash"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Md Shahidul Islam Palash</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/riad.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                            
                                            <a  href="<?php echo URL;?>/public/images/website/amp/riad.jpg" class="portfolio-gallery" title="Kamrul Hasan Riad"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Kamrul Hasan Riad</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/hasnat.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                           
                                            <a  href="<?php echo URL;?>/public/images/website/amp/hasnat.jpg" class="portfolio-gallery" title="Md Abul Hasnat"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Md Abul Hasnat</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/mamun.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                            <a href="#"><i class="icon-heart"></i></a>
                                            <a href="#"><i class="icon-basket-loaded"></i></a>
                                            <a  href="<?php echo URL;?>/public/images/website/amp/mamun.jpg" class="portfolio-gallery" title="Saifullah Al Mamun"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Saifullah Al Mamun</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/shilpi.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                            <a href="#"><i class="icon-heart"></i></a>
                                            <a href="#"><i class="icon-basket-loaded"></i></a>
                                            <a  href="<?php echo URL;?>/public/images/website/amp/shilpi.jpg" class="portfolio-gallery" title="Mst. Shilpi Akter"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Mst. Shilpi Akter</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/keya.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                            <a href="#"><i class="icon-heart"></i></a>
                                            <a href="#"><i class="icon-basket-loaded"></i></a>
                                            <a  href="<?php echo URL;?>/public/images/website/amp/keya.jpg" class="portfolio-gallery" title="Mst Kamrunnahar Keya"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">Mst Kamrunnahar Keya</p>
                                    </figcaption>
                                </figure>
                            </li>
                            <li class="col-sm-6 col-md-6 col-lg-4 portfolio-img filter amp">
                                <figure class="effect-zoe">
                                    <img src="<?php echo URL;?>/public/images/website/amp/taju.jpg" alt=""/>
                                    <figcaption>
                                        <p class="title">AMP <span></span></p>
                                        <p class="icon">
                                            <a href="#"><i class="icon-heart"></i></a>
                                            <a href="#"><i class="icon-basket-loaded"></i></a>
                                            <a  href="<?php echo URL;?>/public/images/website/amp/taju.jpg" class="portfolio-gallery" title="ATM Mofizul Islam Tazu"><i class="icon-size-fullscreen"></i></a>
                                        </p>
                                        <p class="description">ATM Mofizul Islam Tazu</p>
                                    </figcaption>
                                </figure>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- End of Portfolio Section -->
        <!-- Start Team Section -->
        <!-- <div class="team">
            <div class="layer-stretch">
                <div class="layer-wrapper pb-20">
                    <div class="layer-ttl"><h4>Our <span class="text-primary">Creative</span> Team</h4></div>
                    <div class="layer-sub-ttl">There are some things money can't buy. For everything else, there's MasterCard.</div>
                    <div class="row pt-4">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="team-block">
                                <div class="team-img">
                                    <img src="uploads/team-1.jpg" alt="">
                                    <div class="team-description">
                                        <div>
                                            <span>I am Co-Founder</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quos, consectetur quidem, delectus labore laboriosam est distinctio assumenda id a magnam excepturi...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-details">
                                    <h3>Ron Snow</h3>
                                    <p>Co-Founder</p>
                                </div>
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                        <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                        <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="team-block">
                                <div class="team-img">
                                    <img src="uploads/team-2.jpg" alt="">
                                    <div class="team-description">
                                        <div>
                                            <span>I am Lead Desinger</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quos, consectetur quidem, delectus labore laboriosam est distinctio assumenda id a magnam excepturi...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-details">
                                    <h3>Sheldon Logo</h3>
                                    <p>Desinger</p>
                                </div>
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                        <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                        <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="team-block">
                                <div class="team-img">
                                    <img src="uploads/team-3.jpg" alt="">
                                    <div class="team-description">
                                        <div>
                                            <span>I am Lead Developer</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quos, consectetur quidem, delectus labore laboriosam est distinctio assumenda id a magnam excepturi...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-details">
                                    <h3>Daniel Lewis</h3>
                                    <p>Developer</p>
                                </div>
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                        <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                        <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="team-block">
                                <div class="team-img">
                                    <img src="uploads/team-4.jpg" alt="">
                                    <div class="team-description">
                                        <div>
                                            <span>I am Business Analyst</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quos, consectetur quidem, delectus labore laboriosam est distinctio assumenda id a magnam excepturi...</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-details">
                                    <h3>Cheri Aria</h3>
                                    <p>Analyst</p>
                                </div>
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                        <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                        <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>End of Team Section -->
        <!-- Start Action Section -->
        <!-- <div class="action">
            <div class="layer-stretch">
                <div class="layer-wrapper text-center">
                    <div class="layer-ttl"><h4>We design <span class="text-primary">delightful</span> digital experiences</h4></div>
                    <div class="action-content">Read more about what we do and our philosophy of design. Judge for yourself The work and results we’ve achieved for other clients, and meet our highly experienced Team who just love to design, develop and deploy. Tell Us Your Story</div>
                    <a href="#" class="btn btn-outline btn-primary btn-pill btn-outline-2x btn-lg mt-3">Tell Us Your Story</a>
                </div>
            </div>
        </div>End of Action Section -->
        <!-- Start Blog Section -->
        <!-- <div class="blog">
            <div class="layer-stretch">
                <div class="layer-wrapper pb-3">
                    <div class="layer-ttl"><h4>Our <span class="text-primary">Blog</span></h4></div>
                    <div class="layer-sub-ttl">Would you like to see more?</div>
                    <div class="row pt-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-card">
                                <img src="uploads/blog-1.jpg" alt="">
                                <div>
                                    <h4><a href="">iPhone X in Market</a></h4>
                                    <div class="blog-meta">
                                        <p><i class="icon-user"></i><span>Admin</span></p>
                                        <p><i class="icon-clock"></i><span>24 Jul</span></p>
                                        <p><i class="icon-bubble"></i><span>29</span></p>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa fuga officia, sint omnis corporis adipisci reprehenderit...</p>
                                    <a href="#"><span>Read More</span><i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-card">
                                <img src="uploads/blog-2.jpg" alt="">
                                <div>
                                    <h4><a href="">Creative Zone</a></h4>
                                    <div class="blog-meta">
                                        <p><i class="icon-user"></i><span>Admin</span></p>
                                        <p><i class="icon-clock"></i><span>24 Jul</span></p>
                                        <p><i class="icon-bubble"></i><span>29</span></p>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa fuga officia, sint omnis corporis adipisci reprehenderit...</p>
                                    <a href="#"><span>Read More</span><i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-card">
                                <img src="uploads/blog-3.jpg" alt="">
                                <div>
                                    <h4><a href="">Getting Bored. Try This.</a></h4>
                                    <div class="blog-meta">
                                        <p><i class="icon-user"></i><span>Admin</span></p>
                                        <p><i class="icon-clock"></i><span>24 Jul</span></p>
                                        <p><i class="icon-bubble"></i><span>29</span></p>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa fuga officia, sint omnis corporis adipisci reprehenderit...</p>
                                    <a href="#"><span>Read More</span><i class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>End of Blog Section -->
        <!-- Start Funfacts Section -->
        <div class="funfacts">
            <div class="layer-stretch text-center">
                <div class="layer-wrapper">
                    <div class="layer-ttl"><h4>Important <span class="text-primary">Facts About</span> Us</h4></div>
                    <!-- <div class="layer-sub-ttl">Separated they live in Bookmarksgrove right at the coast of the Semantics</div> -->
                    <div class="row align-items-center pt-4">
                        <div class="col-md-7">
                            <div class="counter-block">
                                <i class="icon-people"></i>
                                <h4><span class="counter">8420301</span></h4>
                                <span>Total Members</span>
                            </div>
                            <div class="counter-block">
                                <i class="icon-cup"></i>
                                <h4><span class="counter">192</span></h4>
                                <span>Total Achivers</span>
                            </div>
                            <div class="counter-block">
                                <i class="icon-screen-desktop"></i>
                                <h4><span class="counter">94</span></h4>
                                <span>Total Office</span>
                            </div>
                            <div class="counter-block">
                                <i class="icon-basket-loaded"></i>
                                <h4><span class="counter">98</span></h4>
                                <span>Delivery Point</span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="testimonial">
                                <div class="testimonial-container owl-carousel owl-theme theme-owl-dot">
                                    <div class="testimonial-block">
                                        <div class="testimonial-detail">
                                            <i class="fa fa-quote-right"></i>
                                            <p>"YOU DREAM. WE MAKE IT HAPPEN."</p>
                                        </div>
                                        <div class="testimonial-img">
                                            <img src="<?php echo URL;?>/public/images/website/dmp/ashraful_amin.jpg" alt="">
                                            <span>MD ASHRAFUL AMIN</span>
                                            <p>DMD At Amarbazar Limited</p>
                                        </div>
                                    </div>
                                    <!-- <div class="testimonial-block">
                                        <div class="testimonial-detail">
                                            <i class="fa fa-quote-right"></i>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem laborum error culpa, et corporis eaque reiciendis autem.</p>
                                        </div>
                                        <div class="testimonial-img">
                                            <img src="uploads/team-1.jpg" alt="">
                                            <span>Mr. XXXXX</span>
                                            <p>CEO At ABL</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End of Funfacts Section -->
        <!-- Start Footer Section -->
       