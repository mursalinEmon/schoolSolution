<div class="page-wrapper">
                <div class="page-title">
                
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">BV Upload</span>
                                        
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
                                            BV Upload
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    
                                    <form id="customerform">
                                        <div class="row">
                                            
                                            <div class="col-4">
                                                <div>
                                                <input type="hidden" id="token" name="token" value="<?php echo $this->token; ?>">
                                                    <label for="fullname">BIN</label>
                                                    <select class="form-control form-control-sm" id="bin" name="bin">
                                                    </select>
                                                    <span id="fullnameHelp" class="form-text">My BIN List</span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-4">
                                                <div>
                                                    <label for="bv">BV to upload</label>
                                                    <select class="form-control form-control-sm" id="bv" name="bv">
                                                    </select>
                                                    <span id="bvHelp" class="form-text">Enter BV to upload</span>
                                                   
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