<section class="team-detail-area section-padding">
    <?php if(count($this->teacherdetail)>0){ ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="team-single-img">
                <?php if(file_exists("./assets/images/teachers/".$this->teacherdetail[0]['xteacher'].".jpg")){ ?>
                    <img src="<?php echo TEACHER_IMAGE_LOCATION.$this->teacherdetail[0]['xteacher'] ?>.jpg" alt="team image" class="team__img">
                <?php }else{ ?>
                    <img src="<?php echo URL;?>public/images/theme/noimage.jpeg" alt="noimage">
                <?php } ?>
                </div><!-- end team-single-img -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-8">
                <div class="team-single-wrap">
                    <div class="team-single-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="team-single-item">
                                    <h3 class="widget-title pb-3 font-size-20">Areas of Expertise</h3>
                                    <ul class="list-items">
                                    <?php echo $this->teacherdetail[0]['xexpartarea'] ?>
                                    </ul>
                                </div><!-- end team-single-item -->
                            </div><!-- end col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="team-single-item">
                                    <h3 class="widget-title pb-3 font-size-20">Education</h3>
                                    <ul class="list-items">
                                    <?php echo $this->teacherdetail[0]['xeducation'] ?>
                                    </ul>
                                </div><!-- end team-single-item -->
                            </div><!-- end col-lg-6 -->
                        </div><!-- end row-->
                    </div>
                    <div class="team-single-content padding-top-35px">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="team-single-item">
                                    <ul class="address-list">
                                        <li><a href="tel:+123-456-0975"><i class="la la-phone"></i> <?php echo $this->teacherdetail[0]['xmobile'] ?></a></li>
                                        <li><a href="mailto:example@gmail.com"><i class="la la-envelope-o"></i><?php echo $this->teacherdetail[0]['xemailaddr'] ?></a></li>
                                        
                                    </ul>
                                </div>
                            </div><!-- end col-lg-6 -->
                            <!-- <div class="col-lg-6">
                                <div class="team-single-item">
                                    <ul class="address-list">
                                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                    </ul>
                                </div>
                            </div>end col-lg-6 -->
                        </div><!-- end row-->
                    </div>
                    
                </div><!-- end team-single-wrap -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="about-tab-wrap padding-top-20px">
                    <div class="section-tab padding-bottom-30px">
                        <ul class="nav nav-tabs" role="tablist" id="review">
                            <li role="presentation">
                                <a href="#about-me" role="tab" data-toggle="tab" class="theme-btn active" aria-selected="true">
                                    About me
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#experience" role="tab" data-toggle="tab" class="theme-btn" aria-selected="false">
                                    Experience
                                </a>
                            </li>
                        </ul>
                    </div><!-- end section-tab -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="about-me">
                            <div class="pane-body">
                                <p class="pb-3">
                                <?php echo $this->teacherdetail[0]['xowndesc'] ?>
                                </p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="experience">
                            <div class="pane-body">
                                <p>
                                <?php echo $this->teacherdetail[0]['xexperience'] ?>
                                </p>
                            </div>
                        </div>
                    </div><!-- end tab-content -->
                </div><!-- end about-tab-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <?php } else {?>
        <div class="container">
            <div class="row">
                No Teacher detail found...
            </div>
        </div>
    <?php }?>
</section><!-- end team-detail-area -->
