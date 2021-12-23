
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-block"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="widget-title">My Courses</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="profile-detail pb-5">
                        <ul class="list-items">
                        <li>
                            <span class="profile-name"></span>
                            <span class="profile-name">Txn. No</span>
                            <span class="profile-name">Date</span>
                            <span class="profile-name">Corse Title</span>
                            <span class="profile-name">Coupon</span>
                            </li>
                            
                            <?php if(count($this->curcourses)>0){ foreach($this->curcourses as $key=>$value){?>
                            <li>
                            <span class="profile-name d-block"><img height="60" width="80" src="<?php echo URL;?>assets/images/courses/<?php echo $value["xcourse"];?>.jpg" alt="product image"></span>
                            <span class="profile-name"><?php echo $value["xsalesnum"]; ?></span>
                            <span class="profile-name"><?php echo $value["xdate"]; ?></span>
                            <span class="profile-name"><?php echo $value["coursetitle"]; ?></span>
                            <span class="profile-name"><?php echo $value["xcoupon"]; ?></span>
                            </li>
                            
                            <?php } }?>
                        </ul>
                    </div>
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
    