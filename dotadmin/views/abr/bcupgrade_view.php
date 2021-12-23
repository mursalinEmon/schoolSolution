<div class="page-wrapper">
                <div class="page-title">
                
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Business Center Upgrade</span>
                                        
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
                                            BC Upgrade
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    
                                    <form id="customerform">
                                        <div class="row">
                                        <div class="col-4">
                                                <div>
                                                    <label for="bintstatus">Search by status</label>
                                                    <select class="form-control form-control-sm" id="bintstatus" name="bintype">
                                                    <option value="WelcomeRetailer"></option>
                                                    <option value="WelcomeRetailer">WelcomeRetailer</option>
                                                    <option value="ExpressRetailer">ExpressRetailer</option>
                                                    <option value="PreRetailer">PreRetailer</option>
                                                        <option value="Primary">Primary</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                <input type="hidden" id="token" name="token" value="<?php echo $this->token; ?>">
                                                    <label for="fullname">BIN</label>
                                                    <select class="form-control form-control-sm" id="bin" name="bin">
                                                    </select>
                                                    <span id="binpoint" class="form-text">0</span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-4">
                                                <div>
                                                    <label for="bv">Upgrade To</label>
                                                    <select class="form-control form-control-sm" id="bintype" name="bintype">
                                                        <option value="Primary">Primary</option>
                                                        <option value="Regular">Regular</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div>
                                                    <label id="balance">Balance BV</label>
                                                    <span id="balancebv" class="form-text">0</span>
                                                </div>
                                            </div>                                            
                                        </div>
                                        
                                    </form>
                                    <div class="panel-footer text-right">
                                        <button type="upload" id="upload" class="btn btn-success mr-2">Upload</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
</div>