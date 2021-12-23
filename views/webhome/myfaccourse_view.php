
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
                <div class="col-lg-12">
                    <div class="profile-detail pb-5">
                        <ul class="list-items">
                        <li>
                            <span class="profile-name"></span>
                           
                            <span class="profile-name">Date</span>
                            <span class="profile-name">Corse ID</span>
                            <span class="profile-name">Corse Title</span>
                            <span class="profile-name">Description</span>
                            <span class="profile-name">Price</span></li>
                            <?php if(count($this->curcourses)>0){ foreach($this->curcourses as $key=>$value){?>
                            <li>
                            <span class="profile-name d-block"><img height="60" width="80" src="<?php echo URL;?>assets/images/courses/<?php echo $value["xcourse"];?>.jpg" alt="product image"></span>
                            <span class="profile-name"><?php echo $value["ztime"]; ?></span>
                            <span class="profile-name"><?php echo $value["xcourse"]; ?></span>
                            <span class="profile-name"><?php echo $value["xcoursetitle"]; ?></span>
                            <span class="profile-name"><?php echo $value["xcoursedesc"]; ?></span>
                            <span class="profile-name"><?php echo $value["xprice"]; ?></span>
                            <?php } }?>
                        </ul>
                    </div>
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
    