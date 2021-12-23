<div class="page-wrapper">
                <div class="page-title">
                
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Customer Registration</span>
                                        
                                    </div>
                                </div>
                                
                            </div>
                          
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <div id="resultalert" class="alert alert-dark">
                                            Customer Registration
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    
                                    <form id="customerform">
                                        <div class="row">
                                            
                                            <div class="col-4">
                                                <div>
                                                <input type="hidden" id="token" name="token" value="<?php echo $this->token; ?>">
                                                    <label for="fullname">Customer Name</label>
                                                    <input type="text" class="form-control form-control-sm" id="fullname" name="fullname" placeholder="Customer Name">
                                                    <span id="fullnameHelp" class="form-text">Customer full name, not more than 250 caharacters</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <label for="mobile">Customer Mobile</label>
                                                    <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Customer Mobile">
                                                    <span id="mobileHelp" class="form-text">Customer mobile, not less than 11 and not more than 13 digits</span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                    <label for="refrin">Ref. RIN</label>
                                                    <input type="text" class="form-control form-control-sm" id="refrin" name="refrin" placeholder="Ref. RIN">
                                                    <span id="refrinHelp" class="form-text">Ref. RIN is important for generation commission.</span>
                                                    <label id="refrinName">Ref. Name:</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div>
                                                    <label for="refrin">Email</label>
                                                    <input type="text" class="form-control form-control-sm" id="cusemail" name="cusemail" placeholder="Email">
                                                    <span id="emailHelp" class="form-text">Enter your email address</span>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control form-control" id="address" name="address" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="panel-footer text-right">
                                        <button type="reset" id="cusreg" class="btn btn-success mr-2">Register</button>
                                        <button type="reset" id="clear" class="btn btn-outline btn-secondary btn-outline-1x">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
</div>