<div class="page-wrapper">
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Company Report</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="<?php echo URL; ?>manageadmin">Home</a></li>
                                    <li>Company Report</li> <!-- change it by module name -->  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
						<div class="row">
						<div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Date wise search</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                
                                    <div class="row">
									<div class="col-4">
									        <div class="input-group">
                                                <input type="text" name="datesearch" id="datesearch" class="form-control form-control-sm daterange-singledate">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="icon-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <label style="color:red"><small>month/day/year</small></label>
                                    </div>
									<div class='col-4'>
                                    <div class="input-group">
                                    <select class="form-control form-control-sm custom-select" id="role" name="role">
											<option>Generation Data</option>
											<option>Offer Data</option>											
										</select>  
                                       
                                    </div>   
                                    <label style="color:red"><small>Select Rport to view</small></label>                     	
                                    </div>
                                    <div>
                                    <button  type="submit" id="search"  class="btn btn-sm btn-primary btn-pill"><i class="fa fa-search mr-1"></i>Search</button>
                                    </div>
									</div>
									
                               
                                    
                                </div>
                            </div>
                        </div>
						</div>
						<div class="row">
						<div class="col-md-12">
						<div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span id="tbltitle" class="panel-title-text"></span>
                                    </div>
                                </div>
                                <div class="panel-body">
								<div id="divreporttable">
						<table id="reporttable"  cellspacing="0" width="100%"></table>
						</div>
						<div id="divreporttableoffer">
						<table id="reporttableoffer"  cellspacing="0" width="100%"></table>
						</div>
	</div>
	</div>
								
						</div>
				</div>
</div>				