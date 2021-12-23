<div class="page-wrapper">
            <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">User Role Management</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>User Role Management</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    <div class="page-body">                
        <div class="row">
                        
            <div class="col-lg-4">
                            <div class="panel panel-default">
                            <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Role List</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                
                                    <div class="user-details text-center pt-3">
                                        
                                        <ul class="mailbox-menu text-left pt-0">                                            
                                            <li>
                                                <table id="rolelist"></table>
                                            </li>                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Create Role</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form id="roleform">
                                        <div>
                                            <label for="exampleInputEmail1"><strong>User Role</strong></label>
                                            <input type="text" class="form-control form-control-sm" id="userrole" name="userrole"  placeholder="User Role">                                            
                                        </div>
                                     
                                        
                                        </form>  
                                        <div class="text-right">
                                            <button  id="save" class="btn btn-info btn-sm"><i class="far fa-save mr-1"></i>Save Role</button>                                            
                                        </div>
                                        <div class="alert alert-light mt-2">
                                            <strong>Select Menu From List</strong>
                                        </div>    
                                    
                                    
                                        <?php foreach($this->content as $key=>$value){ ?>
                                            <ul style="list-style-type: none">
                                                <li id="<?php echo $key;?>"><h3><strong><?php echo $key;?></strong></h3>
                                                    <ul style="list-style-type: none">
                                                    <?php foreach($value as $ky=>$vl){ ?>
                                                    <li id="<?php echo $ky;?>"><h5><strong><?php echo $ky;?></strong></h5>
                                                        <ul style="list-style-type: none">
                                                        <?php foreach($vl as $k=>$val){ ?>
                                                        <li class="custom-control custom-checkbox custom-checkbox-1">
                                                            <div class="row">                        
                                                                <input type="checkbox" value="<?php echo $val["module"]; ?>" class="custom-control-input" id="<?php echo $val["id"]; ?>">
                                                                <label class="custom-control-label" for="<?php echo $val["id"]; ?>"><?php echo $val["module"]; ?></label>
                                                                <input type="hidden" class="pageurl" value="<?php echo $val["url"]; ?>">
                                                        <div>
                                                        </li>
                                                    <?php }?> 
                                                            </ul>
                                                        </li>
                                                        <?php }?>
                                                    </ul>
                                                </li>
                                            </ul>
                                                        <?php }?>
                                        
                                </div>
                            </div>
                        </div>
        </div>
    </div>
</div>