<section class="admission-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h5 class="section__meta">Confirm Facilitator</h5>
                    <h2 class="section__title">Verification code sent you by SMS</h2>
                    <span class="section-divider"></span>
                </div>
            </div>
        </div>
        <div class="row margin-top-30px">
            <div class="col-lg-10 mx-auto">
                <div class="card-box-shared">
                    <div class="card-box-shared-body">
                        <div class="contact-form-action">
                            <form id="confirmform">
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Mobile Number<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" value="<?php echo $this->mobileno; ?>" id="mobile" name="mobile" placeholder="Phone number">
                                                <span class="la la-phone input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Verification Code<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="otp" placeholder="Verification Code">
                                                <span class="la la-map input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    
                                    <div class="col-lg-12">
                                        <div class="btn-box">
                                            <button id="stuconfirm" class="theme-btn">Confirm Registration</button>
                                            <button id="resend" class="btn btn-lg btn-danger">Resend Verification Code</button>
                                            <span class="alert alert-danger" id="confresult" role="alert">
                                                Registration Result! 
                                            </span>
                                        </div>
                                    </div><!-- end col-lg-12 -->
                                </div><!-- end row -->
                            </form>
                        </div><!-- end contact-form-action -->
                    </div>
                </div><!-- end card-box-shared -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end admission-area -->
