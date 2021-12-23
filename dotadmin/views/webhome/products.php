<div class="shop">
            <div class="layer-stretch">
                <div class="layer-wrapper pb-20">
                    <div class="pt-4">
                        <div class="row align-items-center shop-filter">
                            <div class="col-sm-4">
                                <select class="custom-select">
                                    <option>Default sorting</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average ratings</option>
                                    <option>Sort by newness</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                            </div>
                            <div class="col-sm-8 text-right">
                                <p class="m-0">Showing 1–10 of 55 results</p>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($this->productlist as $key=>$value){?>
                            <div class="col-md-6 col-lg-4">
                                <div class="product-card">
                                    <div class="product-img">
                                        <div class="owl-carousel owl-theme theme-owlslider dots-overlay text-center">
                                            <div class="theme-owlslider-container">
                                                <a href="#"><img class="img-responsive" height="200px" width="220px" src="<?php echo URL;?>/public/images/uploads/products/<?php echo $value['xitemcode']; ?>.jpg" alt=""></a>
                                            </div>                                           
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <h5 class="title"><a href="#"><?php echo $value['xdesc']; ?></a></h5>
                                        <div class="price">
                                            BDT <?php echo $value['xstdprice']; ?>
                                        </div>
                                        <div class="rating">BV <?php echo $value['xdp']; ?></div>
                                        <!-- <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div> -->
                                        <div>
                                            <a href="javascript:void(0)" onClick="addtocart('<?php echo $value['xitemcode']?>','<?php echo $value['xdesc']?>','<?php echo $value['xstdprice']?>');" class="btn btn-outline btn-dark btn-outline-1x btn-sm m-1">Add to Cart</a>
                                            <a href="<?php echo URL;?>products/productdetail/<?php echo $value['xitemcode']; ?>" class="btn btn-outline btn-dark btn-outline-1x btn-sm m-1">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Section -->