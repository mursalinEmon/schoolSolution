<div class="login">
            <div class="layer-stretch">
                <div class="layer-wrapper">
                    <div class="row pt-4">                       
                        <div class="col-md-4">
                        <h3 class="text-primary">Sign In</h3>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" type="email" id="email">
                                <label class="mdl-textfield__label" for="email">Mobile No</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" type="password" id="password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" type="number" id="boat">
                                <label class="mdl-textfield__label" for="boat">What is 2+3?</label>
                            </div>
                            <div class="pt-4 text-center">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent button button-dark">Sign In</button>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="sub-ttl"><div class="sub-ttl-text">Don't have an account?</div></div>
                            
                            <p class="text-light p-4">Please create your account. It's very simple, easy and quick. <span class="text-danger">All the input fields are required.</span></p>
                            <p class="text-light p-4"><span class="text-primary">If you do not receive any varification code. Please send verification code after 2 minuites<br>
                            আপনি যদি ভেরিফিকেশন কোড আপনার মোবাইলে না পান তবে আবার দুই মিনিট পরে সেন্ড করুন ।</span></p>
                            
                        </div>
                        <div class="col-md-4">
                        <div>
                        <h3 class="text-primary">>> &nbsp;&nbsp;Create Your Account</h3>
                        <?php if ($this->result!==""){ ?>
                        <h4 class="text-danger">&nbsp;&nbsp;<?php echo $this->result;?></h4>
                        <?php } ?>
                        </div>
                        <div >
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored button button-primary">Send Verification Code To</button>
                            </div>
                            <form method="post" action="<?php echo URL;?>customerlogin/createaccount">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" pattern="[0-9]*" required="true"  type="text" name="mobile" id="mobile">
                                <label class="mdl-textfield__label" for="name">Mobile No 11 Digit (01XXXXXXXXX)</label>
                                
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" pattern="[0-9]*" required="true" type="text" name="vcode" id="name">
                                <label class="mdl-textfield__label" for="name">Verification Code</label>
                                
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" required="true"  type="text" name="fullname" id="fullname">
                                <label class="mdl-textfield__label" for="name">Full Name</label>
                                
                            </div>
                            <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label form-input">
                                <select class="mdl-selectfield__select" required="true" id="gender" name="gender">
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>                                
                                </select>
                                <label class="mdl-selectfield__label" for="gender">Gender</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" type="email" required="true" name="email" id="email">
                                <label class="mdl-textfield__label" for="email">Email Address</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" type="password" required="true" name="password" id="password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                            </div>
                            <div class="pt-4 text-center">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent button button-dark">Create Account</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End of Login Section -->