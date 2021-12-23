<section class="admission-area section--padding" style="padding-top:70px;">
    
    <div class="container register" style="margin-left: 40px;">
        <div class="row" >
     
    
        <div class="col-md-3 register-left" style="margin-top:10rem!important;">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3 style="color:#fff;">Welcome</h3>
                        <p>Fill up the form to join with us.</p>
                        <!-- <input style="margin-top:170px!important;" type="submit" name="" value="Login"/> -->
                        <a  type="submit" href="<?php echo URL?>studentlogin">Login</a><br/>
        </div>
        <div class="col-md-9 register-right" >
               
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Employee</h3>
                            <form action="" id="sturegform">

                                <div class="row register-form" style="width:700px!important;margin-left:5rem!important;paddind:50px!important;margin-bottom:2rem;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label class="label-text">Name<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="text" class="form-control" required name="studentname" placeholder="Name" value="" />
                                            

                                        </div>
                                        <div class="form-group">
                                            <label class="label-text">Address<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="text" class="form-control" name="address" placeholder="Address" value="" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="label-text">Father's Name<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="text" class="form-control" name="xfname" placeholder="Father's Name" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label-text">Guardian Name<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="text" class="form-control" name="guardian" placeholder="Gaurdian's Name" value="" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="label-text">District<span class="primary-color-2 ml-1">*</span></label>
                                             <select class="sort-ordering-select form-control" id="district" name="city">
                                                        <option selected>Select District</option>
                                                            
                                                        
                                                </select>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-text">Email Address<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="email" class="form-control" name="email" placeholder="Email address" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label-text">Phone Number<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="text" minlength="11" maxlength="13" name="mobile" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label-text">Father's Contact No<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="text" class="form-control" name="xfmobile" placeholder="Father's Mobile" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label-text">Guardian Contact No<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="text" class="form-control" name="gurdianmobile" placeholder="Gaurdian's Mobile" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label-text">Country<span class="primary-color-2 ml-1">*</span></label>
                                            <select class="sort-ordering-select form-control" name="country">
                                                        
                                                        <option selected value="Bangladesh">Bangladesh</option>
                                                        
                                                    </select>
                                        </div>
                                        
                                       
                                        <!-- <input type="submit" class="btnRegister"  value="Register"/> -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="label-text">Birthday<span class="primary-color-2 ml-1">*</span></label>
                                                    <select class="sort-ordering-select form-control" name="birthday">
                                                                    
                                                    <option value="0" selected="">Day</option>
                                                                <?php for($i = 1; $i <= 31; $i++){?>
                                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                               <?php } ?>
                                                                    
                                                                </select>
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="label-text"><span class="primary-color-2 ml-1"></span></label>
                                                    <select class="sort-ordering-select form-control" name="birthmonth">
                                                                    
                                                                <option value="0" selected="">Month</option>
                                                                <option value="01">January</option>
                                                                <option value="02">Febuary</option>
                                                                <option value="03">March</option>
                                                                <option value="04">April</option>
                                                                <option value="05">May</option>
                                                                <option value="06">Jun</option>
                                                                <option value="07">July</option>
                                                                <option value="08">August</option>
                                                                <option value="09">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                                    
                                                                </select>
                                                     </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                <label class="label-text"><span class="primary-color-2 ml-1"></span></label>
                                                    <select class="sort-ordering-select form-control" name="birthyear">
                                                                    
                                                            <option value="0" selected="">Year</option>
                                                               <?php for($i = 2016; $i > 1950; $i--){?>
                                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                               <?php } ?>
                                                                    
                                                                </select>
                                                     </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-text">Password<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="password" class="form-control"  id="password" name="password" placeholder="Password" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label class="label-text">Confirm Password<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"  placeholder="Confirm Password *" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label-text">Reference No.<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="text" class="form-control" name="xrefno" id="xrefno" placeholder="Reference No." value="" />
                                            <small class="text-success" id="messagespan"></small>
                                            <small class="text-success" id="namespan"></small>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-text">National ID No.<span class="primary-color-2 ml-1">*</span></label>
                                            <input type="number" class="form-control" name="xnid" id="xnid" placeholder="National ID No." value="" />
                                            
                                        </div>
                                        
                                        <button type="submit" id="stureg" class="btnRegister">Register</button>
                                    </div>
                                </div>
                                </form>
                            </div>

                            
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Apply as a Hirer</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div><!-- end container -->
</section><!-- end admission-area -->
