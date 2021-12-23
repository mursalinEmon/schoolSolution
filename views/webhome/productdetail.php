<div class="shop">
            <div class="layer-stretch">
                <div class="layer-wrapper pb-20">
                    <div class="row pt-4">
                        <div class="col-md-5">
                            <div class="flexslider thumbnail-slider">
                                <ul class="slides">
                                    <li data-thumb="<?php echo URL;?>/public/images/uploads/products/<?php echo $this->product[0]['xitemcode']; ?>.jpg">
                                        <img src="<?php echo URL;?>/public/images/uploads/products/<?php echo $this->product[0]['xitemcode']; ?>.jpg" alt="" />
                                    </li>
                                    <li data-thumb="<?php echo URL;?>/public/images/uploads/products/<?php echo $this->product[0]['xitemcode']; ?>.jpg">
                                        <img src="<?php echo URL;?>/public/images/uploads/products/<?php echo $this->product[0]['xitemcode']; ?>.jpg" alt="" />
                                    </li>
                                    <!-- <li data-thumb="uploads/shop-12.jpg">
                                        <img src="uploads/shop-12.jpg" alt="" />
                                    </li>
                                    <li data-thumb="uploads/shop-13.jpg">
                                        <img src="uploads/shop-13.jpg" alt="" />
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="shopp-details">
                                <h2><?php echo $this->product[0]['xdesc']?></h2>
                                <div class="price">BDT <?php echo $this->product[0]['xstdprice']?></div>
                                <p class="description"><?php echo $this->product[0]['xdesc']?><?php echo " ".$this->product[0]['xlongdesc']?></p>
                                <!-- <ul class="list">
                                    <li><strong>SKU: </strong>9540</li>
                                    <li><strong>COLORS: </strong>Black</li>
                                    <li><strong>SIZES: </strong>XS,S,M,L,XL</li>
                                    <li><strong>CONDITION: </strong>New</li>
                                </ul> -->
                                <!-- <div class="row m-0">
                                    <div class="col-md-4">
                                        <div class="meta">
                                            <span>Size</span>
                                            <span>
                                                <select class="form-control">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                    <option>XL</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="meta">
                                            <span>Quantity</span>
                                            <span>
                                                <input type="number" class="form-control" placeholder="Quantity">
                                            </span>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="cart-button">
                                    <a href="<?php echo URL;?>products/cartdetail" class="btn btn-dark"><i class="far fa-check-circle"></i> Checkout</a>
                                    <a href="javascript:void(0)" onClick="addtocart('<?php echo $this->product[0]['xitemcode']?>','<?php echo $this->product[0]['xdesc']?>','<?php echo $this->product[0]['xstdprice']?>');" class="btn btn-outline btn-primary btn-outline-2x"><i class="fa fa-shopping-cart mr-2"></i>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div><!-- End Page Section -->