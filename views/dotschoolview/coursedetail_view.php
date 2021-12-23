<?php if(count($this->coursedetail)>0){?>
<section class="course-detail margin-bottom-110px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="course-detail-content-wrap margin-top-100px">
                    <div class="post-overview-card margin-bottom-50px">
                        <h3 class="widget-title">What you'll learn?</h3>
                        <ul class="list-items mt-3">
                            <!-- <?php $dom = new DomDocument();
                                @ $dom->loadHTML($this->coursedetail[0]["xlearning"]);

                                $lis = $dom->getElementsByTagName('li');
                                foreach( $lis as $li ) { ?>
                                    <li><i class="la la-check-circle"></i> <?php echo $li->textContent;?></li>
                                <?php  }?> -->
                            
                            
                        </ul>
                    </div><!-- end post-overview-card -->
                    <div class="requirement-wrap margin-bottom-40px">
                        <!-- <h3 class="widget-title">Amarbazar BV: <?php //echo $this->coursedetail[0]["xpoint"];?></h3>             -->
                        <!-- <h3 class="widget-title">Requirements</h3>
                        <ul class="list-items mt-3">
                            <li><?php //echo $this->coursedetail[0]["xminrequirement"];?></li>
                            
                        </ul> -->
                    </div><!-- end requirement-wrap -->
                    <div class="description-wrap margin-bottom-40px">
                        <h3 class="widget-title">Description</h3>
                        <p class="mb-2 mt-3">
                        <?php echo $this->coursedetail[0]["xcoursedesc"];?>
                        </p>
                        
                        
                    </div><!-- end description-wrap -->
                    <div class="requirement-wrap margin-bottom-30px">
                        <h3 class="widget-title">Who this course is for:</h3>
                        <ul class="list-items mt-3 mb-3">
                            <li><?php echo $this->coursedetail[0]["xskillevel"];?></li>
                            
                        </ul>
                    </div><!-- end requirement-wrap -->
                    
                    <?php if(count($this->teacherdt)>0){ ?>
                    <div class="section-block"></div>
                    <div class="instructor-wrap padding-top-50px padding-bottom-45px">
                        <h3 class="widget-title">About the instructor</h3>
                        <div class="instructor-content margin-top-30px d-flex">
                            <div class="instructor-img">
                                <a href="teacher-detail.html" class="instructor__avatar">
                                    <img src="<?php echo TEACHER_IMAGE_LOCATION.$this->teacherdt[0]["xteacher"]?>.jpg" alt="">
                                </a>
                                <ul class="list-items">
                                    <li><span class="la la-star"></span> 4.6 Instructor Rating</li>
                                    
                                </ul>
                            </div><!-- end instructor-img -->
                            <div class="instructor-details">
                                <div class="instructor-titles">
                                    <h3 class="widget-title"><a href="teacher-detail.html"><?php echo $this->teacherdt[0]["xteachername"]?></a></h3>
                                    <p class="instructor__subtitle"><?php echo $this->teacherdt[0]["xexperience"]?></p>
                                    <!-- <p class="instructor__meta">Digital marketer and writer. Lover of details.</p> -->
                                </div><!-- end instructor-titles -->
                                <div class="instructor-desc">
                                    <p><?php echo $this->teacherdt[0]["xowndesc"]?></p>
                                    
                                </div><!-- end instructor-desc -->
                            </div><!-- end instructor-details -->
                        </div><!-- end instructor-content -->
                    </div><!-- end instructor-wrap -->
                    <?php } ?>
                    
                </div><!-- end course-detail-content-wrap -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar-component">
                    <div class="sidebar">
                        <div class="sidebar-widget sidebar-preview">
                           <div class="sidebar-preview-titles">
                               <h3 class="widget-title">Preview this course</h3>
                               <span class="section-divider"></span>
                           </div>
                            <div class="preview-video-and-details">
                                <div class="preview-course-video">
                                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target=".preview-modal-form">
                                        <img src="<?php echo URL;?>assets/images/courses/1.jpg" alt="course-img">
                                        <div class="play-button">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="-307.4 338.8 91.8 91.8" style=" enable-background:new -307.4 338.8 91.8 91.8;" xml:space="preserve">
                                                   <style type="text/css">
                                                       .st0{opacity:0.6;fill:#000000;border-radius: 100px;enable-background:new;}
                                                       .st1{fill:#FFFFFF;}
                                                   </style>
                                                <g>
                                                    <circle class="st0" cx="-261.5" cy="384.7" r="45.9"/><path class="st1" d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </a> -->
                                    <!-- <iframe src="https://player.vimeo.com/video/520512791" width="347" height="250" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe> -->
									<img class="img-whp" src="assets/images/courses/<?php echo $val['xitemcode'];?>.jpg" alt="t1.jpg">

                                </div>
                                <div class="preview-course-content">
                                    <p class="preview-course__price d-flex align-items-center">
                                        <span class="price-current">BDT <?php echo $this->coursedetail[0]["xprice"];?></span>
                                        <!-- <span class="price-before">$104.99</span>
                                        <span class="price-discount">24% off</span> -->
                                    </p>
                                    <!-- <p class="preview-price-discount__text">
                                        <span class="discount-left__text-text">4 days</span> left at this price!
                                    </p> -->
                                    <div class="buy-course-btn mb-3 text-center">
                                        <a href="javascript:void(0)" onClick="addtocart('<?php echo $this->coursedetail[0]['xitemcode'];?>')" class="theme-btn w-100 mb-3">Add To Cart</a>
                                       
                                    </div>
                                    <!-- end preview-course-incentives -->
                                </div><!-- end preview-course-content -->
                            </div><!-- end preview-video-and-details -->
                        </div><!-- end sidebar-widget -->
                        
                        <div class="sidebar-widget category-widget">
                            <h3 class="widget-title">Categories</h3>
                            <span class="section-divider"></span>
                            <ul class="list-items">
                                <?php foreach ($this->category as $key=>$value){?>
                                <li><a href="#"> <?php echo $value['xcat']; ?></a></li>
                                <?php } ?>
                            </ul>
                        </div><!-- end sidebar-widget -->
                        
                    </div><!-- end sidebar -->
                </div><!-- end sidebar-component -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end course-detail -->
<!--======================================
        END COURSE DETAIL
======================================-->
<?php } else {?>

    <section class="course-detail margin-bottom-110px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course-detail-content-wrap margin-top-100px">
                        <div class="post-overview-card margin-bottom-50px">
                            No Course Found
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
<?php }?>