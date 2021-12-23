<section class="login-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-title text-center">
                        <div class="alaert alert-success">
                        <h3 class="widget-title font-size-25">
                        <?php echo $this->result?></h3></div>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form method="post" action="<?php echo URL?>logincheckout/login">
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <div class="input-box">
                                            <label class="label-text">Mobile No<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="username" placeholder="Mobile No">
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
                                        <div class="btn-box">
                                            <button class="theme-btn" type="submit">login account</button>
                                        </div>
                                    </div><!-- end col-md-12 -->
                                    <div class="col-lg-12">
                                        <p class="mt-4">Don't have an account? <h3><a href="<?php echo URL; ?>student" class="primary-color-2">Please Register</a></h3></p>
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
