<section class="contact-area padding-bottom-100px mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-1 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="la la-map-marker"></i>
                    </div>
                    <h3 class="info__title">Our Location</h3>
                    <p class="info__text mb-0"><?php echo $this->business[0]["bizadd1"];?></p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-2 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="la la-envelope"></i>
                    </div>
                    <h3 class="info__title">Email us</h3>
                    <p class="info__text mb-0">
                        <span class="d-block"><?php echo $this->business[0]["bizemail"];?></span>
                        <!-- <span class="d-block">rahad@edotschool.com</span> -->
                    </p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
             <div class="col-lg-4 column-td-half">
                <div class="info-box info-box-color-3 text-center">
                    <div class="hover-overlay"></div>
                    <div class="icon-element mx-auto">
                        <i class="la la-phone"></i>
                    </div>
                    <h3 class="info__title">Call us</h3>
                    <p class="info__text mb-0">                        
                        <span class="d-block">(+880) 2-830053</span>
                        
                    </p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
        <div class="contact-form-wrap pt-5">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading">
                        <p class="section__meta">get in touch</p>
                        <h2 class="section__title">Contact with us</h2>
                        <span class="section-divider"></span>
                        <p class="section__desc">
                            Please feel free to contact with us.
                            Our team will response in a very short time.
                        </p>
                        <ul class="social-profile">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div><!-- end section-heading -->
                </div><!-- end col-lg-5 -->
                <div class="col-lg-7">
                    <div class="contact-form-action">
                        <form method="POST" name="contactform" action="php/contact.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Your Name<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" placeholder="Your name">
                                            <span class="la la-user input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Your Email<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="email" name="email" placeholder="Your email">
                                            <span class="la la-envelope input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Phone Number<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="phone" placeholder="Phone number">
                                            <span class="la la-phone input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="input-box">
                                        <label class="label-text">Subject<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="subject" placeholder="Reason for contact">
                                            <span class="la la-book input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-6 -->
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <label class="label-text">Message<span class="primary-color-2 ml-1">*</span></label>
                                        <div class="form-group">
                                            <textarea class="message-control form-control" name="message" placeholder="Write message"></textarea>
                                            <span class="la la-pencil input-icon"></span>
                                        </div>
                                    </div>
                                </div><!-- end col-lg-12 -->
                                <div class="col-lg-12">
                                    <button class="theme-btn" type="submit">Send Message</button>
                                </div><!-- end col-md-12 -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end contact-form-action -->
                </div><!-- end col-md-7 -->
            </div><!-- end row -->
        </div>
    </div><!-- end container -->
</section><!-- end contact-area -->
