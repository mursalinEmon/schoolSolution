
    <div class="page-body">
        <div class="row">
            <div class="col-12">
                 <?php  if($this->status=='Success'){?>
                    <div class="portlet portlet-primary">       
                <?php }else{?>
                    <div class="portlet portlet-danger">
                <?php }?>
                
                    <div class="portlet-head">
                        <div class="portlet-title">                       
                            
                            <span class="portlet-title-text">Amarbazar Limited</span>
                        </div>
                    </div>
                    <div class="portlet-wrapper">
                        <div class="portlet-body">
                        <?php  if($this->status=='Success'){?>
                            <p><h1>Your Invoice No <a class="text-success" href="#"><?php echo $this->invoice?> Click to view Invoice</a></h1></p>
                            <p>Payment was Successfull!</p>
                            <p>Thank you for your purchase.</p>
                            
                        <?php }else{?>
                            <p class="text-danger"><h1>Payment was not Successfull!</h1></p>
                            <p>Merchant not accepted your payment! Reason: <span class="text-danger"><?php echo $this->status;?></span></p>
                        <?php }?>
                        <a href="<?php echo $this->callback; ?>" class="btn btn-primary btn-pill">Go Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
