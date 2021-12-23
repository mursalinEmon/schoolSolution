
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-block"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="widget-title">My Profile</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8">
                        
                    <div class="profile-detail pb-5">
                        <ul class="list-items">
                        <form id="photoupload" enctype="multipart/form-data">
                            <li>
                            
                                <input type="file" name="photofile" id="photofile" accept=".jpg">
                               
                            </li>
                            <li><span class="profile-name">Student ID:</span><span class="profile-desc"><?php echo $this->studentid;?></span></li>
                            <li><span class="profile-name">Registration Date:</span><span class="profile-desc"><?php echo $this->regtime;?></span></li>
                            <li><span class="profile-name">Full Name:</span><span class="profile-desc"><input class="form-control" type="text" value="<?php echo $this->studentname; ?>" id="fullname" name="fullname" placeholder="Full Name"></span></li>
                            
                            
                            <li><span class="profile-name">Email:</span><span class="profile-desc"><input class="form-control" type="text" value="<?php echo $this->mail; ?>" id="email" name="email" placeholder="Email"></span></li>
                            <li><span class="profile-name">Mobile Number:</span><span class="profile-desc"><input class="form-control" type="text" value="<?php echo $this->mobile; ?>" id="mobile" name="mobile" placeholder="Mobile"></span></li>
                            <li><span class="profile-name">Address:</span><span class="profile-desc"><input class="form-control" type="text" value="<?php echo $this->address; ?>" id="address" name="address" placeholder="Address"></span></li>
                            <li><span class="profile-name">Sex:</span><span class="profile-desc"><select class="sort-ordering-select" id="ssex" name="ssex"><option value="<?php echo $this->sex;?>"><?php echo $this->sex;?></option><option value="Male">Male</option><option value="Female">Female</option></select></span></li>
                            <li><span class="profile-name"><button id="stureg" class="theme-btn">Update Profile</button></span><span class="profile-desc"></span></li>
                            </form>
                        </ul>
                    </div>
                </div><!-- end col-lg-8 -->
            </div><!-- end row -->
    