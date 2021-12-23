<section class="login-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto" style="border-radius:7px;">
                <div class="card-box-shared">
                    <div class="card-box-shared-title text-center" style="background:-webkit-linear-gradient(40deg, #04a754, #226274)!important;border-radius:10px;">
                        <h3 class="widget-title font-size-30" style="color:#ffffff;">Password Update</h3>
                    </div>
                    <div class="card-box-shared-body" style="border:2px solid #408512;border-radius:10px;">
                        <div class="contact-form-action">
                            <form method="" action="" id="passwordupdate">
                                <div class="row">
                                <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Mobile Number<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" readonly value="<?php echo $this->student[0]["xmobile"]; ?>" id="mobile" name="mobile" placeholder="Phone number">
                                                <span class="la la-phone input-icon"></span>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Password<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password" id="newpassword" placeholder="Password">
                                                <span class="la la-lock input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Confirm Password<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" id="newconfpassword" name="confirmpassword" placeholder="Confirm Password">
                                                <span class="la la-lock input-icon"></span>
                                                <small class="text-success" id="messagespan"></small>
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
                                            <button style="background:-webkit-linear-gradient(40deg, #04a754, #226274)!important;color:#fff;z-index: 0!important;" class="theme-btn" type="submit">Update Password</button>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12" style="align-item:center;">
                                        <p class="mt-4 font-size-20" style="text-align:center;">Don't have an account? <a href="<?php echo URL; ?>student" class="primary-color-2">Admission</a></p>
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
