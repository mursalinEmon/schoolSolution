<div class="page-wrapper">
                <div class="page-title">
                
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Order Cashback Card</span>
                                        
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
                                            Cashback Card Order
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    
                                    <form id="customerform">
                                        <div class="row">
                                             <div class="col-4">
                                                <div>
                                                    <label for="confcodetype">Select Bundle</label>
                                                    <select class="form-control form-control-sm" id="bundle" name="bundle">
                                                    <?php for ($i=1; $i<= 20; $i++){?>
                                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                    <?php } ?>
                                                    </select>
                                                    <p id="amtHelp" class="form-text text-success">1 Bundle = 25 card. 25 X 200</p>
                                                    <p id="amtHelp" class="form-text text-success">Required Amount: <span id="reqamt">5000</span></p>
                                                   
                                                </div>
                                            </div>

                                            
                                            <div class="col-4">
                                                <div>
                                                    <label id="rin">RIN</label>
                                                    <input type="text" class="form-control form-control-sm" id="mrin" name="mrin" placeholder="RIN">
                                                    <p class="form-text text-danger">Name: <span  id="rinname"></span></p>
                                                </div>
                                            </div>  
                                                        
                                            <div class="col-4">
                                                <div>
                                                    <label id="rin">Delivery Address</label>
                                                    <input type="text" class="form-control form-control-sm" id="deladd" name="deladd" placeholder="Delivery Address">
                                                    
                                                </div>
                                            </div>  
                                            <div class="col-4">
                                                <div>
                                                    <label id="rin">Delivery Mobile</label>
                                                    <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" placeholder="Delivery Mobile">
                                                    
                                                </div>
                                            </div>                                       
                                        </div>
                                        
                                    </form>
                                    <div class="panel-footer text-right">
                                    <button class="btn btn-primary mr-2" id="checkout">Order</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
</div>