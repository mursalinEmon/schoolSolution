<section class="cart-area padding-top-120px padding-bottom-60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping-cart-wrap table-responsive">
                    <table class="table table-bordered ">
                        <thead class="cart-head">
                            <tr>
                                <td class="cart__title">Image</td>
                                <td class="cart__title">Product details</td>
                                <td class="cart__title">Price</td>
                                <td class="cart__title">Quantity</td>
                                <td class="cart__title">Total</td>
                                <td class="cart__title">remove</td>
                            </tr>
                        </thead>
                        <tbody id="carttable" class="cart-body">
                        
                        
                        </tbody>
                        
                    </table>
                </div><!-- end shopping-cart-wrap -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="cart-detail-wrap mt-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="shopping-cart-detail-item">
                        <h3 class="widget-title font-size-20">Coupon Code</h3>
                        <div class="shopping-cart-content pt-2">
                            <p class="line-height-26">
                                To get discount apply coupon code.
                            </p>
                            <div class="contact-form-action pt-3">
                                <form method="post">
                                    <div class="form-group">
                                        <i class="la la-pencil input-icon"></i>
                                        <input class="form-control" type="text" name="text" placeholder="Enter Coupon code">
                                    </div><!-- end form-group -->
                                    <button type="submit" class="theme-btn theme-btn-light">Apply code</button>
                                </form>
                            </div><!-- end contact-form-action -->
                        </div><!-- end shopping-cart-content -->
                    </div><!-- end shopping-cart-detail-item -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-4 ml-auto">
                    <div class="shopping-cart-detail-item">
                        <h3 class="widget-title font-size-20">Cart Totals</h3>
                        <div class="shopping-cart-content pt-2">
                            <ul class="list-items">
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Subtotal:</span>
                                    <span id="stotal" class="primary-color-3">BDT 0</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Discount:</span>
                                    <span id="stotal" class="primary-color-3">BDT 0</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="primary-color">Total:</span>
                                    <span id="total" class="primary-color-3">BDT 0</span>
                                </li>
                            </ul>
                            <div class="btn-box mt-4">
                                <a href="<?php echo URL?>logincheckout" class="theme-btn">Next</a>
                            </div>
                        </div><!-- end shopping-cart-content -->
                    </div><!-- end shopping-cart-detail-item -->
                
            </div><!-- end row -->
        </div>
    </div><!-- end container -->
</section><!-- end cart-area -->
<!-- ================================
    END CART AREA
================================= -->