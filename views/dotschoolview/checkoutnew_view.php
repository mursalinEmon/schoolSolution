
<!-- ================================
    START CHECKOUT AREA
================================= -->
<section class="checkout-area padding-top-120px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card-box-shared">
                    <div class="card-box-shared-title">
                        <h3 class="widget-title font-size-18">Billing Details</h3>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="user-form">
                            <div class="contact-form-action">
                                <form id="sturegform">
                                    <input type="hidden" id="token" value="<?php echo $this->token;?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Name<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Name">
                                                    <span class="la la-user input-icon"></span>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        
                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <label class="label-text">Your Email<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="email" name="email" placeholder="Email address">
                                                    <span class="la la-envelope input-icon"></span>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <label class="label-text">Mobile Number<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="mobile" name="mobile" placeholder="11 degit (01XXXXXXXXX)">
                                                    <span class="la la-phone input-icon"></span>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <label class="label-text">Address<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="address" name="address" placeholder="Address">
                                                    <span class="la la-map input-icon"></span>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        
                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <label class="label-text">Country<span class="primary-color-2 ml-1">*</span></label>
                                                <div class="form-group">
                                                    <div class="sort-ordering user-form-short">
                                                        <select class="sort-ordering-select" id="country" name="country">
                                                           <option selected value="Bangladesh">Bangladesh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">District<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <div class="sort-ordering user-form-short">
                                                    <select class="sort-ordering-select" id="city" name="city">
                                                        <option selected>Select District</option>
                                                       
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                        <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Password<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                                                <span class="la la-map-marker input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="input-box">
                                            <label class="label-text">Confirm Password<span class="primary-color-2 ml-1">*</span></label>
                                            <div class="form-group">
                                                <input class="form-control" type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                                                <span class="la la-map-marker input-icon"></span>
                                            </div>
                                        </div>
                                    </div><!-- end col-lg-6 -->
                                        
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <div class="form-group">
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="chb1">
                                                        <label for="chb1">I agree to the <a href="#" class="primary-color-2">Terms of Service</a> and <a href="#" class="primary-color-2">Privacy Policy</a></label>
                                                    </div>
                                                </div>
                                                <!-- <div class="btn-box pb-3">
                                                    <button class="theme-btn theme-btn-light line-height-40">Create billing</button>
                                                </div> -->
                                                <div class="secure-connection">
                                                    <p class="d-flex align-items-center">
                                                        <i class="fa fa-lock font-size-30"></i>
                                                        <span class="ml-2">Secure Connection</span>
                                                    </p>
                                                    <p class="font-size-14">Your information is safe with us!</p>
                                                </div>
                                            </div>
                                        </div><!-- end col-lg-12 -->
                                    </div>
                                </form><!-- end row -->
                            </div>
                        </div>
                    </div><!-- end card-box-shared-body -->
                </div><!-- end card-box-shared -->
                <div class="order-details pt-5 pb-5">
                    <h3 class="widget-title font-size-18">Order Details</h3>
                    <div id="checkoutitems">
                        
                    </div>
                </div>
            </div><!-- end col-lg-7 -->
            <div class="col-lg-5">
                <div class="card-box-shared">
                    <div class="card-box-shared-title">
                        <h3 class="widget-title font-size-18">Order Summary</h3>
                    </div>
                    <div class="card-box-shared-body">
                        <div class="shopping-cart-content">
                            <ul class="list-items">
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Original price:</span>
                                    <span class="primary-color-3" id="stotal">0</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Coupon discounts:</span>
                                    <span class="primary-color-3">BDT -0</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-size-18 font-weight-bold">
                                    <span class="primary-color">Total:</span>
                                    <span class="primary-color-3" id="total">0</span>
                                </li>
                            </ul>
                            <div class="btn-box mt-2">
                                <!-- <p class="font-size-14 mb-2 line-height-22">Aduca is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions.</p>
                                <p class="font-size-14 line-height-22 mb-2">By completing your purchase you agree to these <a href="#" class="primary-color-2">Terms of Service.</a></p> -->
                                <a href="javascript:void(0)" id="checkout" class="theme-btn d-block text-center">Pay Online</a>
                            </div>
                        </div>
                    </div><!-- end card-box-shared-body -->
                </div><!-- end card-box-shared -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end checkout-area -->
<!-- ================================
    END CHECKOUT AREA
================================= -->
