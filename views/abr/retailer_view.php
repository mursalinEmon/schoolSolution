<div class="page-wrapper">
                <div class="page-title">
                
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Retailer Registration</span>
                                    </div>
                                </div>
                                
                            </div>
                          
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                                <ul class="nav nav-pills nav-pills-danger">
                                    <li class="nav-item">
                                            <a class="nav-link active" href="#customerlist" data-toggle="tab" id="tabcustomerlist"><i class="fa fa-search mr-2"></i>Search Customer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#retailerreg" data-toggle="tab" id="tabretailerreg"><i class="far fa-file-alt mr-2"></i>Retailer Registration</a>
                                        </li>
                                        
                                </ul>
                                <div class="tab-content">
                                <div class="tab-pane active" id="customerlist">
                                            <div class="panel">
                                
                                                <div class="panel-body">
                                                
                                                <div class="row no-gutters">
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input type="text" id="searchtext" class="form-control form-control-sm" placeholder="Search Customer">                                                
                                                    </div>                                            
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group">
                                                        <select class="form-control form-control-sm" id="searchbytype">    
                                                            <option>by Name</option>
                                                            <option>by Mobile</option> 
                                                            <option>by CIN</option>                                                       
                                                        </select>
                                                    </div>                                            
                                                </div>
                                                <div class="col-3 ml">
                                                        <button  id="searchcus"  class="btn btn-sm btn-primary btn-pill ml-1"><i class="fa fa-search mr-1"></i>Search</button>
                                                 </div>
                                             
                                            <div class="col-12 mt-4">
                                            <div  style="overflow-y:scroll; height:600px;">
                                                <div class="table-responsive">
                                                <table class="table table-sm" id="customertable">
                                                    <thead>
                                                        <tr>
                                                            <th>CIN</th>                                                            
                                                            <th>Name</th>
                                                            <th>Mobile</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                                </div>
                                            </div>
                                        </div>                                             
                                        <div class="tab-pane" id="retailerreg">    
                                            <div class="panel panel-default">
                                                <div class="panel-head">
                                                    <div class="panel-title">
                                                        <div  id="resultalert" class="alert alert-dark">
                                                            Reatiler Registration
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    
                                                    <form id="retailerform">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div>
                                                                    <input type="hidden" id="token" name="token" value="<?php echo $this->token;?>">
                                                                    <label for="cin">CIN</label>
                                                                    <input type="text" class="form-control form-control-sm" id="cin" name="cin" placeholder="CIN">
                                                                    <span id="emailHelp" class="form-text">Enter CIN Number</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="cusname">Retailer Name</label>
                                                                    <input type="text" class="form-control form-control-sm" id="cusname" disabled placeholder="Customer Name">
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="mobile">Retailer Mobile</label>
                                                                    <input type="text" class="form-control form-control-sm" id="mobile" disabled placeholder="Customer Mobile">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="nid">NID</label>
                                                                    <input type="text" class="form-control form-control-sm" id="nid" name="nid" placeholder="NID">
                                                                    <span id="emailHelp" class="form-text">Please provide correct NID</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="fname">Father Name</label>
                                                                    <input type="text" class="form-control form-control-sm" id="fname" name="fname" placeholder="Fother Name">
                                                                    <span id="emailHelp" class="form-text">Father name is mandetory</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="mname">Mother Name</label>
                                                                    <input type="text" class="form-control form-control-sm" id="mname" name="mname" placeholder="Mother Name">
                                                                    <span id="emailHelp" class="form-text">Mother name is mandetory</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="nomineename">Nominee Name</label>
                                                                    <input type="text" class="form-control form-control-sm" id="nomineename" name="nomineename" placeholder="Nominee Name">
                                                                    <span id="emailHelp" class="form-text">Mandetory Field</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="nomineenid">Nominee NID</label>
                                                                    <input type="text" class="form-control form-control-sm" id="nomineenid" name="nomineenid" placeholder="Nominee NID">
                                                                    <span id="emailHelp" class="form-text">Please provide correct NID</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                <label for="relationship">Relationship</label>
                                                                    <select class="form-control form-control-sm" id="relationship" name="relationship">
                                                                        <option>Mother</option>
                                                                        <option>Father</option>
                                                                        <option>Brother</option>
                                                                        <option>Sister</option>
                                                                        <option>Wife</option>
                                                                        <option>Son</option>
                                                                        <option>Daughter</option>
                                                                    </select>
                                                                    <span id="emailHelp" class="form-text">Relationship is mandetory</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-4">
                                                                <div>
                                                                <label for="district">District</label>
                                                                    <select class="form-control form-control-sm" id="district" name="district">
                                                                        
                                                                    </select>
                                                                    <span id="emailHelp" class="form-text">District is mandetory</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                <label for="thana">Upazilla/Thana</label>
                                                                    <select class="form-control form-control-sm" id="thana" name="thana">                                                        
                                                                    </select>
                                                                    <span id="emailHelp" class="form-text">Upazilla/Thana is mandetory</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="postal">Postal</label>
                                                                    <input type="text" class="form-control form-control-sm" id="postal" name="postal" placeholder="Postal Code">
                                                                    <span id="postallHelp" class="form-text">Postal is important for generation commission.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-4">
                                                                <div>
                                                                    <label for="bank">Bank</label>
                                                                    <!-- <input type="text" class="form-control form-control-sm" id="bank" name="bank" placeholder="Bank"> -->
                                                                    <select class="form-control form-control-sm" id="bank" name="bank">
                                                                        <option>Nagad</option>
                                                                        <option>Bkash</option>
                                                                        <option>APACC</option>                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="bankbr">Bank Branch</label>
                                                                    <input type="text" class="form-control form-control-sm" id="bankbr" name="bankbr" placeholder="Bank Branch">
                                                                
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="bankacc">Bank Account</label>
                                                                    <input type="text" class="form-control form-control-sm" id="bankacc" name="bankacc" placeholder="Bank Account">
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div>
                                                                    <label for="refrin">Ref. RIN</label>
                                                                    <input type="text" class="form-control form-control-sm" id="refrin" name="refrin" placeholder="Ref. RIN">
                                                                    <span id="emailHelp" class="form-text">Ref. RIN is important for generation commission.</span>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-4">
                                                                <div>
                                                                <label for="group">Group</label>
                                                                    <select class="form-control form-control-sm" id="group" name="group">
                                                                        <option></option>
                                                                                                                           
                                                                    </select>
                                                                    <span id="emailHelp" class="form-text">Gender is mandetory</span>
                                                                </div>
                                                            </div> -->
                                                            <div class="col-4">
                                                                <div>
                                                                <label for="district">Gender</label>
                                                                    <select class="form-control form-control-sm" id="gender" name="gender">
                                                                        <option>Male</option>
                                                                        <option>Female</option>
                                                                        <option>Other</option>                                                        
                                                                    </select>
                                                                    <span id="emailHelp" class="form-text">Gender is mandetory</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="address">Address</label>
                                                                    <textarea class="form-control form-control" id="address" name="address" rows="3"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="panel-footer text-right">
                                                        <button type="reset" id="registerretailer" class="btn btn-success mr-2">Register</button>
                                                        <button type="reset" id="btnclear" class="btn btn-outline btn-secondary btn-outline-1x">Clear</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>    
</div>