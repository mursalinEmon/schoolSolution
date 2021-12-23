<div class="page-wrapper">
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Upload csv File Data</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="<?php echo URL; ?>manageadmin">Home</a></li>
                                    <li>Upload csv File Data</li> <!-- change it by module name -->  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Upload Generation Data</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                <form   name="uploadForm" id="uploadForm"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        
                                            <input type="file" name="filea"
                                            id="file" accept=".csv">
                                        
                                        <br />
                                        <br />
                                    </div>
                                    <button id="minutedatasubmit" type="submit" id="submit" name="import" class="btn btn-primary btn-pill">Upload Data</button>
                                    <p id="genresult" style="color:red">Click to upload csv data</p><input id="gendate" type="hidden">
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <span class="panel-title-text">Upload Offer Data</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                <form  name="offerForm" id="offerForm"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        
                                            <input type="file" name="fileoffer"
                                            id="fileoffer" accept=".csv">
                                        
                                        <br />
                                        <br />
                                    </div>
                                    <button id="offersubmit" type="submit" id="submit" name="offerimport" class="btn btn-primary btn-pill">Upload Data</button>
                                    <p id="offerresult" style="color:red">Click to upload csv data</p><input id="offerdate" type="hidden">
                                </form>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
</div>
</div>				