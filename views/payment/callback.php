
    <div class="container">
        <div class="row">
            <div class="col-12">
                 <?php  if($this->status=='Success'){?>
                    <div class="bg-primary">       
                <?php }else{?>
                    <div class="bg-danger">
                <?php }?>
                
                    <div class="alert alert-primary">
                        <div class="portlet-title">                       
                            
                            <span class="portlet-title-text">ABCL IT</span>
                        </div>
                    </div>
                    <div class="alert-info">
                        <div class="portlet-body">
                        <?php  if($this->status=='Success'){?>
                            
                            <p>Your order was recieved successfully!</p>
                            <p>Wait for confirmation.</p>
                            
                        <?php }else{?>
                            <p class="text-danger"><h1>Payment was not Successfull!</h1></p>
                            <p>Merchant not accepted your payment!</p>
                        <?php }?>
                        <a href="<?php echo URL; ?>" class="btn btn-primary btn-pill">Go Home</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
