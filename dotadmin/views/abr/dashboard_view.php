<div class="page-wrapper">
                <!-- Page Title -->
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Hello, <?php echo Session::get('susername')?>!</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Dashboard</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (Session::get('slogintype') == "Admin"){ ?>
                <!-- Page Body -->
                <div class="page-body">
                     
                    <div class="row">
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="row widget-separator-1">
                                    
                                    <div class="col-md-4">
                                        <div class="widget-1">
                                        <h1 class="title">Total Active Courses</h1>
                                        <button class="btn btn-primary btn-sm btn-pill" id="btnreload"><i class="ti-reload"></i><span>&nbsp;Reload</button>
                                            <div class="content">
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="widget-1">
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title"> Amarbazar Training</h5>
                                                        
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-danger" id="gen4">0</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title"> English Training</h5>
                                                        
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-warning" id="gen5">0</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="row widget-separator-1">
                                    
                                    <div class="col-md-4">
                                        <div class="widget-1">
                                        <h1 class="title">Training wise sales</h1>
                                        <button class="btn btn-primary btn-sm btn-pill" id="btnreload"><i class="ti-reload"></i><span>&nbsp;Reload</button>
                                            <div class="content">
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="widget-1">
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title"> Course - 1</h5>
                                                        
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-danger" id="gen4">17</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title"> Course - 2</h5>
                                                        
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-warning" id="gen5">250</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <?php } ?>
            </div>