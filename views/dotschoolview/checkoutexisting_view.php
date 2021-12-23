
<!-- ================================
    START CHECKOUT AREA
================================= -->
<section class="checkout-area padding-top-120px padding-bottom-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card-box-shared">
                    
                    <div class="card-box-shared-body">
                        <div class="user-form">
                            <div class="contact-form-action">
                                <form method="post">
                                    <div class="row">                                       
                                        
                                        <div class="col-lg-12">
                                        <div class="card-box-shared-body">
                        <div class="shopping-cart-content">
                            <ul class="list-items">
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Name: <span id="fullname"><?php echo $this->info[0]["xstuname"];?></span></span>
                                    <span class="primary-color-3"></span>
                                    <input type="hidden" id="token" value="<?php echo $this->token;?>">
                                    <input type="hidden" id="city" value="<?php echo $this->info[0]["xcity"];?>">
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Address: <span id="address"><?php echo $this->info[0]["xaddress"];?></span></span>
                                    <span class="primary-color-3"></span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-size-18 font-weight-bold">
                                    <span class="primary-color">Mobile: <span id="mobile"><?php echo $this->info[0]["xmobile"];?></span></span>
                                    <span class="primary-color-3"></span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-size-18 font-weight-bold">
                                    <span class="primary-color">Email: <span id="email"><?php echo $this->info[0]["xstuemail"];?></span></span>
                                    <span class="primary-color-3"></span>
                                </li>
                            </ul>
                            
                        </div>
                    </div><!-- end card-box-shared-body -->
                                            <div class="input-box">
                                                <!-- <div class="form-group">
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="chb1">
                                                        <label for="chb1">I agree to the <a href="#" class="primary-color-2">Terms of Service</a> and <a href="#" class="primary-color-2">Privacy Policy</a></label>
                                                    </div>
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
                            <div>
                                <p class="primary-color">Pay By</p>
                                <select name="operator" id="operator" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="bkash">Bkash</option>
                                    <option value="nagad">Nagad</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group" id="pay-bkash" style="display:none;">
                                <label for="pay-bkash">Bkash Payment Number</label>
                                <input class="form-control" name="pay-bkash" type="text"  value="+8801958536733" readonly>
                            </div>
                            
                            <div class="form-group" id="pay-nagad" style="display:none;">
                                <label for="pay-nagad">Nagad Payment Number</label>
                                <input class="form-control" name="pay-nagad" type="text" value="+8801618200626" readonly>
                            </div>
                            <div class="form-group" id="pay-input" style="display:none;">
                                <i class="la la-pencil input-icon"></i>
                                <input class="form-control" type="text" name="txnid" id="txnid" placeholder="Enter Transaction ID" required>
                            </div>
                            
                            
                            <div class="form-group" id="pay-input1" style="display:none;">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <input class="form-control" type="text" name="txnno" id="txnno" placeholder="Enter Transaction Mobile Number" required>
                            </div>
                           
                            <div class="btn-box mt-2">
                                <a href="javascript:void(0)" id="checkout" class="theme-btn d-block text-center">Confirm Order</a>
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
