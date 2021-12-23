<div class="page-wrapper">
                <div class="page-title">
                
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Existing RFID Application</span>
                                    </div>
                                </div>
                                
                            </div>
                          
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                                <ul class="nav nav-pills nav-pills-danger">
                                    
                                        
                                        
                                </ul>
                                <div class="tab-content">
                                            
                                        <div class="tab-pane active" id="retailerreg">    
                                            <div class="panel panel-default">
                                                <div class="panel-head">
                                                    <div class="panel-title">
                                                        <div  id="resultalert" class="alert alert-dark">
                                                            Existing RFID Application
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    
                                                    <form id="retailerform" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div>
                                                                    <input type="hidden" id="token" name="token" value="<?php echo $this->token;?>">
                                                                    <label for="rin">RIN</label>
                                                                    <input type="text" class="form-control form-control-sm" id="rin" name="rin" placeholder="RIN">
                                                                    <span  class="form-text">Enter RIN Number</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="cusname">Retailer Name</label>
                                                                    <input type="text" class="form-control form-control-sm" id="cusname" disabled placeholder="Retailer Name">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="mobile">Retailer Mobile</label>
                                                                    <input type="text" class="form-control form-control-sm" id="mobile" disabled placeholder="Retailer Mobile">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="refrin">Ref. RIN</label>
                                                                    <input type="text" class="form-control form-control-sm" id="refrin" name="refrin" placeholder="Ref. RIN">
                                                                    <span  class="form-text">Ref. RIN is important for generation commission.</span>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-4">
                                                                <div>
                                                                <label for="group">Group</label>
                                                                    <select class="form-control form-control-sm" id="group" name="group">
                                                                        <option></option>
                                                                                                                           
                                                                    </select>
                                                                    <span  class="form-text">Gender is mandetory</span>
                                                                </div>
                                                            </div> -->
                                                            
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="refrin">ARC CODE</label>
                                                                    <input type="text" class="form-control form-control-sm" id="arccode" name="arccode" placeholder="ARC CODE">
                                                                    <span  class="form-text">ARC CODE.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="refrin">Txn. No</label>
                                                                    <input type="text" class="form-control form-control-sm" id="txnno" name="txnno" placeholder="Txn. No">
                                                                    <span  class="form-text">Txn. No from confirmation code sms.</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="refrin">OTP. No</label>
                                                                    <input type="text" class="form-control form-control-sm" id="otpno" name="otpno" placeholder="OTP. No">
                                                                    <span  class="form-text">OTP. No from confirmation code sms.</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="refrin">Photo</label>
                                                                    <input type="file" name="photofile" id="photofile" accept=".jpg">
                                                                    <span  class="form-text">Photo of the customer</span>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    <div class="panel-footer text-right">
                                                        <button type="submit" id="registerretailer" class="btn btn-success mr-2">Register</button>
                                                        <button type="reset" id="btnclear" class="btn btn-outline btn-secondary btn-outline-1x">Clear</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>    
</div>