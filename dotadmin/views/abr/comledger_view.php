<div class="page-wrapper">
                    
                    <div class="page-title">
                          <input type="hidden" value="<?php echo $this->token; ?>" id="token">      
                          <h1>My Ledger</h1>
                    </div>                         
                                            <div class="panel">
                                
                                                <div class="panel-body">
                                                
                                                <div class="row no-gutters">
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input type="text" id="stfrom" class="form-control form-control-sm" placeholder="From Statement">
                                                        <input type="text" id="stto" class="form-control form-control-sm" placeholder="To Statement">                                                
                                                    </div>
                                                                            
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group">
                                                        <select class="form-control form-control-sm" id="binlist">
                                                            <option>ALL</option>  
                                                            
                                                        </select>
                                                    </div> 
                                                                                            
                                                </div>
                                                <div class="col-3 ml">
                                                        <button  id="searchtxn"  class="btn btn-sm btn-primary btn-pill ml-1"><i class="fa fa-search mr-1"></i>Search</button>
                                                 </div>
                                             
                                            <div class="col-12 mt-4">
                                            <div  style="overflow-y:scroll; height:600px;">
                                                <div class="table-responsive">
                                                <table class="table table-sm" id="txntable">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>                                                            
                                                            <th>St No</th>
                                                            <th>BIN</th>
                                                            <th>Pay Type</th>
                                                            <th>Amount : <span id="totalamt">0</span></th>
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