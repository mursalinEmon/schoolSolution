<section class="team-area padding-top-120px padding-bottom-110px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h5 class="section__meta">expert people</h5>
                    <h2 class="section__title">Meet Our Expert Instructors</h2>
                    <span class="section-divider"></span>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row margin-top-28px">
            <?php foreach($this->teachers as $key=>$val){?>
            <div class="col-lg-4 column-td-half">
                <div class="team-item">
                    <div class="team-img-box">
                    <?php if(file_exists("./assets/images/teachers/".$val['xteacher'].".jpg")){ ?>
                        <img src="<?php echo TEACHER_IMAGE_LOCATION.$val['xteacher']; ?>.jpg" alt="">
                    <?php }else{ ?>
                            <img src="<?php echo URL;?>public/images/theme/noimage.jpeg" alt="noimage">
                    <?php } ?>
                        <ul class="social-profile">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="team-detail">
                        <h3 class="team__title"><a href="teacher-detail.html"><?php echo $val['xteachername'] ?></a></h3>
                        <p class="team__meta">Facilitator, Experts in</p>
                        <p class="team__text">
                        <?php echo $val['xexpartarea']; ?>
                        </p>
                        <a href="<?php echo URL;?>teacher/viewprofile/<?php echo $val['xteachername'];?>" class="theme-btn">view profile</a>
                    </div>
                </div><!-- end team-item -->
            </div><!-- end col-lg-4 -->
            <?php } ?>
            
        </div><!-- end row -->
        
    </div><!-- end container -->
</section><!-- end team-area -->
