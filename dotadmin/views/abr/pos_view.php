<div class="page-wrapper">
                        <div class="page-title">
                              <input type="hidden" value="<?php echo $this->token; ?>" id="token">      
                        </div>
                            <div class="col-12">
                                <ul class="nav nav-pills nav-pills-danger">
                                    <li class="nav-item">
                                            <a class="nav-link active" href="#posenrty" data-toggle="tab"><i class="fa fa-cart-plus mr-2"></i>POS Entry</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#invoicelist" data-toggle="tab"><i class="far fa-file-alt mr-2"></i>My Invoice List</a>
                                        </li>
                                        
                                        
                                    </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="posenrty">
                                                <div class="panel">
                                                    
                                                    <div class="panel-body">
                                                        <div class="row">
                                                        <div class="col">
                                                        <ul class="nav nav-pills nav-pills-primary">
                                                        <li class="nav-item">
                                                                <a class="nav-link active" href="#customerlist" data-toggle="tab"><i class="far fa-user mr-2"></i>Customer list</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="#productlist" data-toggle="tab"><i class="fab fa-product-hunt mr-2"></i>Product List</a>
                                                            </li>
                                                            
                                                            
                                                        </ul>
                                                        <hr>
                                                        <div class="tab-content">
                                                            <div class="tab-pane" id="productlist">
                                                                <div class="row no-gutters mb-1">
                                                                    <div class="col">
                                                                        <div class="input-group">
                                                                            <input type="text" name="searchitem" id="searchitem" class="form-control form-control-sm" placeholder="Search by Description">                                                
                                                                        </div>                                            
                                                                    </div>
                                                                    
                                                                    <div class="col ml-2">
                                                                        <button  id="btnitemsearch"  class="btn btn-sm btn-primary btn-pill"><i class="fa fa-search mr-1"></i>Search</button>
                                                                    </div>
                                                                </div>
                                                                <div  style="overflow-y:scroll; height:400px;">
                                                                    <table class="table table-striped" id="tblitemsearch">
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>Itemcode</th>
                                                                                <th>Description</th>
                                                                                <th>Current Stock</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <!-- <tr><td><img src="<?php //echo URL;?>public/images/theme/noimages.png" height="60" width="60" alt=""></td><td class="align-middle">V5675-01</td><td class="align-middle"> Visiosn 1.5 AC</td><td class="align-middle">6</td><td class="align-middle"><i class="fa fa-cart-plus"></i></td></tr> -->
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane active" id="customerlist">

                                                                <div class="row no-gutters">
                                                                    <div class="col-6">
                                                                        <div class="input-group">
                                                                            <input type="text" name="searchtext" id="searchtext" class="form-control form-control-sm" placeholder="Search/Add">                                                
                                                                            
                                                                        </div>   
                                                                        <span id="mobileHelp" class="form-text">Input atleast 4 charaters to search!</span>                                         
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <div class="input-group">
                                                                            <select class="form-control form-control-sm" id="searchtype" name="searchtype">
                                                                                <option>by CIN</option>
                                        <option>by RIN</option>                 <option>by Name</option>
                                                                                <option>by Mobile</option>                                                        
                                                                            </select>
                                                                        </div>                                            
                                                                    </div>
                                                                    <div class="col-3 ml">
                                                                            <button  id="searchcus"  class="btn btn-sm btn-primary btn-pill ml-1"><i class="fa fa-search mr-1"></i></button>
                                                                    </div>
                                                                    <div class="mt-1 mb-1">
                                                                        <button  id="btnadd"  class="btn btn-sm btn-primary btn-pill font-weight-bold ml-1">Add</button>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div  style="overflow-y:scroll; height:400px;">
                                                                    <table class="table table-striped" id="customertable">
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
                                                    <div class="col mt-2">
                                                    <div class="font-weight-bold text-center align-middle mb-4"><span>Invoice Detail</span></div>  
                                                    <hr>      
                                                        <div>
                                                        <div class="row ml-1 mt-2"> 
                                                                <input type="text" class="form-control form-control-sm" id="refrin" placeholder="Ref. RIN">
                                                                <label>Name: <span id="refname"></span></label>
                                                            </div>
                                                            <hr>
                                                            <div class="row"> 
                                                                <div class="col font-weight-bold">Invoice :</div> <div class="col font-weight-bold text-left" id="invoiceno"></div>
                                                                <div class="col font-weight-bold">Date: </div><div class="col font-weight-bold text-left" id="entrydate"></div>
                                                            </div>
                                                            <div class="row mt-2"> 
                                                                <div class="col font-weight-bold">CIN :</div> <div class="col font-weight-bold text-left" id="cin"></div>
                                                                <div class="col font-weight-bold">Customer: </div><div class="col font-weight-bold text-left" id="cinname"></div>
                                                            </div>
                                                            
                                                            <div class="bg-info"><span class="text-white"><strong>Cart Items</strong></span></div>        
                                                            <table class="table" id="carttable">
                                                            <thead class="bg-primary text-white">
                                                                
                                                                <tr>                                               
                                                                    <th>Item Code & Description</th>
                                                                    <th>Qty</th>
                                                                    <th>Rate</th>
                                                                    <th>Total</th>
                                                                    <th>Total BV</th>
                                                                    <th></th>
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                            
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td></td><td></td><td><strong>Total</strong></td><td id="carttotal">0</td><td id="totalbv">0</td><td></td>
                                                                </tr>
                                                            </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="panel-footer text-right">
                                                        <button class="btn btn-info mr-2" id="confirmsales">Confirm</button>
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="tab-pane" id="invoicelist">
                                            <div class="panel">
                                
                                                <div class="panel-body">
                                                
                                                <div class="row no-gutters">
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <input type="text" id="searchbystr" class="form-control form-control-sm" placeholder="Search Invoice">                                                
                                                    </div>                                            
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group">
                                                        <select class="form-control form-control-sm" id="searchbytype">
                                                            <option>by Invoice</option>
                                                            <option>by CIN</option>
                                                            <option>by Customer Name</option>
                                                            <option>by Customer Mobile</option>                                                        
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
                                                            <th>Invoice No</th>
                                                            <th>CIN</th>
                                                            <th>Customer Name</th>
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
                            </div>
                                
                            <div class="modal fade" id="modalinvoicedt">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Invoice Item Detail</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                
                                                    <div class="col-12">									        
                                                        <table class="table" id="txndttable">
                                                            <thead class="bg-primary text-white">
                                                                
                                                                <tr>                                               
                                                                    <th>Item Code & Description</th>
                                                                    <th>Qty</th>
                                                                    <th>Rate</th>
                                                                    <th>Total</th>
                                                                    <th>Total BV</th>
                                                                    
                                                                </tr>
                                                                
                                                            </thead>
                                                            <tbody>
                                                            
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td></td><td></td><td><strong>Total</strong></td><td id="invtotal">0</td><td id="invbv">0</td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    
                                                        
                                                
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                                            
                                        </div>
                                    </div>
                                </div>
			                </div>          
                                
                        </div>
                        
</div>