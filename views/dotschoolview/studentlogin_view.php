<section class="login-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto" style="border-radius:7px;">
                <div class="card-box-shared">
                    <div class="card-box-shared-title text-center" style="background-color:#fd8e18!important;border-radius:10px;">
                        <h3 class="widget-title font-size-30" style="color:#ffffff;">Student Login</h3>
                    </div>
                    <div class="card-box-shared-body" style="2px solid #ffffff;border-radius:10px;">
                        <div class="contact-form-action">
                            <form method="post" action="<?php echo URL?>studentlogin/login">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Student ID<span style="color: #fd8e18 !important;" class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="username" placeholder="Student ID">
                                                <span class="la la-envelope input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Password<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password" placeholder="Password">
                                                <span class="la la-lock input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <!-- <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="custom-checkbox d-flex justify-content-between">
                                                <input type="checkbox" id="chb1">
                                                <label for="chb1">Remember Me</label>
                                                <a href="recover.html" class="primary-color-2"> Forgot my password?</a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- end col-md-12 -->
                                    <div class="col-lg-12 ">
                                        <div class="btn-box d-flex justify-content-center" style="align-item:center;">
                                            <button style="background-color:#fd8e18!important;color:#fff;z-index: 0!important;border:#41bccd!important;" class="theme-btn" type="submit">login account</button>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12" style="align-item:center;">
                                        <!-- <p class="mt-4 font-size-20" style="text-align:center;">Don't have an account? <a href="<?php echo URL; ?>student" class="primary-color-2">Admission</a></p> -->
                                        <!-- <p class="mt-4 font-size-17" style="text-align:center;">Forgot Password? <a href="<?php echo URL; ?>forgotpassword" class="primary-color-2" style="color:#fd8e18 !important;">Click Here</a></p> -->
                                    </div><!-- end col-md-12 -->
                                </div><!-- end row -->
                            </form>
                        </div><!-- end contact-form -->
                    </div>
                </div>
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end login-area -->
