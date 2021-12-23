<div class="page-wrapper">
                <div class="page-title">
                
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Activate Cashback Card</span>
                                        
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
                                            Cashback Card Activation
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    
                                    <form id="customerform">
                                        <div class="row">
                                            
                                           
                                            <div class="col-4">
                                                <div>
                                                <input type="hidden" id="token" name="token" value="<?php echo $this->token; ?>">
                                                    <label for="refrin">CIN</label>
                                                    <input type="text" class="form-control form-control-sm" id="cin" name="cin" placeholder="CIN">
                                                    <span id="cinHelp" class="form-text">CIN is required.</span>
                                                    <label id="cinName">Name:</label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                <input type="hidden" id="token" name="token" value="<?php echo $this->token; ?>">
                                                    <label for="refrin">Ref. RIN</label>
                                                    <input type="text" class="form-control form-control-sm" id="refrin" name="refrin" placeholder="Ref. RIN">
                                                    <span id="cinHelp" class="form-text">Ref. RIN is required.</span>
                                                    <label id="refname">Ref. Name:</label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div>
                                                <label for="relationship">Card List</label>
                                                    <select class="form-control form-control-sm" id="cardlist" name="cardlist">
                                                        <option></option>
                                                        
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    <div class="panel-footer text-right">
                                        <button id="cusreg" class="btn btn-success mr-2">Activate</button>
                                        <button type="reset" id="clear" class="btn btn-outline btn-secondary btn-outline-1x">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    

                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">My Activation List</span>
                                    </div>
                                     
                                </div>
                                <div class="panel-wrapper">
                                    <table id="activetable"  cellspacing="0" width="100%">
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>          
</div>