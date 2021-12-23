
    <div class="container">
        <div class="row">
            <div class="col-12">
                 
                    
                <div>
              
                
                    <div class="alert alert-primary">
                        <div class="portlet-title">                      
                            
                            <span class="portlet-title-text"><strong>ABCL IT Checkout Payment</strong></span>
                        </div>
                    </div>
                    <div class="alert">
                        <div>
                            <p>Choose your payment method</p>                            
                            <!-- <a href="<?php //echo URL;?>paynow/cod/<?php //echo $this->token;?>" class="btn btn-primary btn-outline btn-outline-2x"><i class="far fa-money-bill-alt"></i>&nbsp;Cash on delivery</a>
                            <a href="<?php echo URL;?>ablpay/initializepay/<?php echo $this->token;?>" class="btn btn-primary btn-outline btn-outline-2x"><img height="20" width="20" src="<?php echo URL;?>public/images/theme/abl.png">&nbsp;ABL Purchase Account</a> -->
                             <!-- <a href="<?php echo URL;?>nagadpay/paybynagad/<?php echo $this->token;?>" class="btn btn-info btn-outline btn-outline-2x"><img height="20" width="40" src="<?php echo URL;?>public/images/theme/nagad.svg"></a>                             -->
                             <a href="<?php echo URL;?>confirmpay/makepayment/<?php echo $this->token;?>" class="btn btn-info btn-outline btn-outline-2x"><img height="20" width="40" src="https://sandbox.sslcommerz.com/gwprocess/v4/image/gw/bkash.png"></a>                            
                            <!-- <a href="<?php //echo URL;?>bkashpay/makepayment/<?php //echo $this->token;?>" class="btn btn-primary btn-outline btn-outline-2x"><img height="20" width="20" src="https://sandbox.sslcommerz.com/gwprocess/v4/image/gw/bkash.png">&nbsp;Bkash</a> -->
                            <!-- <a href="<?php //echo URL;?>rocketpay/makepayment/<?php //echo $this->token;?>" class="btn btn-warning btn-outline btn-outline-2x"><img height="20" width="40" src="<?php echo URL;?>public/images/theme/rocket.png"></a> -->
                            <a href="<?php echo URL;?>sslpay/makepayment/<?php echo $this->token;?>" class="btn btn-primary btn-outline btn-outline-2x"><i class="fa fa-credit-card"></i>&nbsp;Credit Card</a>
                        </div>
                    </div>
                    <div>
                    <div class="alert">    
                    <a href="<?php echo $this->callbackurl;?>" class="btn btn-primary btn-pill"><strong><i class="far fa-arrow-alt-circle-left"></i>&nbsp;Go Back</strong></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
