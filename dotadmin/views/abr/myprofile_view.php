<div class="page-wrapper">
                <div class="page-title">
                
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">My Profile</span>
                                    </div>
                                </div>
                                
                            </div>
                          
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                <table class="table table-bordered table-striped">                                        
                                        <tbody>
                                            <?php if(count($this->myprofile)>0){ ?>
                                                    <tr><td><strong>Name</strong></td><td colspan="3"><?php echo $this->myprofile[0]['name'] ?></td></tr>
                                                    <tr><td><strong>Address</strong></td><td colspan="3"><?php echo $this->myprofile[0]['address'] ?></td></tr>
                                                    <tr><td><strong>Email</strong></td><td colspan="3"><?php echo $this->myprofile[0]['email'] ?></td></tr>
                                                    <tr><td><strong>Mobile</strong></td><td colspan="3"><?php echo $this->myprofile[0]['mobile'] ?></td></tr>
                                                    
                                                <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                    <div class="row">
                                    <div class="col">
                                        <div class="bg-primary text-white mb-1 mt-1" id="passchangeresult">Change Password</div>
                                        <form id="frmprofilepass">
                                        <div class="row">
                                                <div class="col">
                                                <input type="password" class="form-control form-control-sm" name="currentpass" id="currentpass" placeholder="Current Password">
                                                </div>
                                                <div class="col">
                                                <input type="password" class="form-control form-control-sm" name="newpass" id="newpass" placeholder="New Password">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                <input type="password" class="form-control form-control-sm" name="confirmpass" id="confirmpass" placeholder="Confirm Password">
                                                </div>
                                                <div class="col">
                                                
                                                </div>
                                            </div>
                                            <div class="col-md-6"><button class="btn btn-primary btn-sm btn-pill" id="btnchangepass">Change Password</button></div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>    
</div>