<?php  //print_r($this->info);?>
<div class="login">
            <div class="layer-stretch">
                <div class="layer-wrapper">
                    <div class="row pt-4">                       
                        <div class="col-md-4">
                        <h3 class="text-primary">Parsonal Information</h3>
                        
                        <form method="post" action="<?php echo URL;?>customerlogin/confirmdelivery">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" pattern="[0-9]*" required="true" value="<?php echo $this->customer[0]['xcus']?>" type="text" name="mobile" id="mobile">
                                <label class="mdl-textfield__label" for="name">Mobile No 11 Digit (01XXXXXXXXX)</label>                                
                            </div>
                           
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" required="true"  type="text" value="<?php echo $this->customer[0]['xorg']?>" name="fullname" id="fullname">
                                <label class="mdl-textfield__label" for="name">Full Name</label>                                
                            </div>
                            <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label form-input">
                                <select class="mdl-selectfield__select" value="<?php echo $this->customer[0]['xgender']?>" required="true" id="gender" name="gender">
                                <option value=""></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>                                
                                </select>
                                <label class="mdl-selectfield__label" for="gender">Gender</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <input class="mdl-textfield__input" type="email" required="true" value="<?php echo $this->customer[0]['xcusemail']?>" name="email" id="email">
                                <label class="mdl-textfield__label" for="email">Email Address</label>
                            </div>                            
                            
                        </div>
                        <div class="col-md-4">
                        <h3 class="text-primary">Delivery Information</h3>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                                <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
                                <label class="mdl-textfield__label" for="name">Address</label>
                                
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
                                <label class="mdl-textfield__label" for="name">Delivery Address</label>
                                
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="sample5" ></textarea>
                                <label class="mdl-textfield__label" for="name">Delivery Note</label>
                                
                            </div>
                            <div class="pt-4 text-center">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent button button-dark">Confirm Order</button>
                            </div>
                            </form>
                        </div>
                       
                        <div class="col-md-4">
                            <div>
                                <h3 class="text-danger">>> &nbsp;&nbsp;Payment Method</h3>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End of Login Section -->