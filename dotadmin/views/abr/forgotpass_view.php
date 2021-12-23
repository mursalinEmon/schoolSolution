
    <div class="page-body">
        <div class="row">
        <div class="col-3">
        </div>
            <div class="col-6">
                 
                    
                    <div class="portlet portlet-primary">
              
                
                    <div class="portlet-head">
                        <div class="portlet-title">                      
                            
                            <span class="portlet-title-text"><strong>Password Recovery</strong></span>
                        </div>
                    </div>
                    <div class="portlet-wrapper">
                        <div class="portlet-body">
                            <div class="alert alert-light" id="result">
                                Recover your password by sms!
                            </div>
                            <form id="sendpassform">
                    
                    <div>
                        <label class="float-label" style="color:red">Username*</label>
                        <input type="text" name="user" id="user" class="form-control form-control-sm" placeholder="Login User" autocomplete="on" required>
                        <span class="form-highlight"></span>
                        <span class="form-bar"></span>
                    </div>
                    <div>
                        <label class="float-label" style="color:red">Loin Code (3 Digit)*</label>
                        <input type="text" name="bizid" id="bizid" class="form-control form-control-sm" placeholder="XXX" autocomplete="on" required>
                        <span class="form-highlight"></span>
                        <span class="form-bar"></span>
                    </div>
                    <div>
                    <label class="float-label" style="color:red">Login Type*</label>
                        <select name="logintype" id="logintype" class="form-control form-control-sm" required>
                            <option value="">--Select--</option>
                            <option value="Admin">Admin</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-success btn-pill" type="submit" id="btnsendpass"><strong><i class="far fa-arrow-alt-circle-left"></i>&nbsp;Send Password</strong></button>
                    </div>
                    </form>
                    </div>
                    </div>
                    <div class="portlet-body">    
                    <a href="<?php echo URL;?>" class="btn btn-primary btn-pill"><strong><i class="far fa-arrow-alt-circle-left"></i>&nbsp;Go Back</strong></a>
                    </div>
                </div>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
