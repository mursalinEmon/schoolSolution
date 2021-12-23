<!-- Main Page Wrapper -->
            <div class="page-wrapper">
                <!-- Page Title -->
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Welcome, BD Vendor!</h2>
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
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="dashboard-stat color-success">
                                <div class="content"><h4>523</h4> <span>Users</span></div>
                                <div class="icon"><i class="icon-people"></i></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dashboard-stat color-warning">
                                <div class="content"><h4>111</h4> <span>Projects</span></div>
                                <div class="icon"><i class="icon-layers"></i></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dashboard-stat color-primary">
                                <div class="content"><h4>$12K</h4> <span>Income</span></div>
                                <div class="icon"><i class="icon-docs"></i></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="dashboard-stat color-danger">
                                <div class="content"><h4>$523</h4> <span>Expenses</span></div>
                                <div class="icon"><i class="icon-credit-card"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="box-title p-3">Income/Expense</div> 
                                <div class="panel-wrapper">
                                    <ul class="chart-tag">
                                        <li><span style="background: #3483FF"></span> Income</li>
                                        <li><span style="background: #ffc107"></span> Expense</li>
                                    </ul>
                                    <div class="chart-container">
                                        <div id="morris-area-chart2" style="height: 321px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="box-title p-3">Invoice By Status</div> 
                                <div class="panel-body">
                                    <ul class="chart-tag">
                                        <li><span style="background: #98aafb"></span> Paid</li>
                                        <li><span style="background: #ccc5a8"></span> Unpaid</li>
                                        <li><span style="background: #52bacc"></span> Other</li>
                                    </ul>
                                    <div id="morris-donut-invoice-by-status" style="height: 289px;"></div>
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
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title">Total Revenue</h5>
                                                        <span class="descr">Awerage Weekly Profit</span>
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-primary">+$12900</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title">Total Tax</h5>
                                                        <span class="descr">Awerage Weekly Profit</span>
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-danger">+$2900</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-2">
                                            <div class="box-title pb-3 pt-3">Order Statatics</div>
                                            <div class="row content align-items-end">
                                                <div class="col">
                                                    <div class="number">$12000</div>
                                                    <div class="count text-primary">(490 Sales)</div>
                                                    <div class="month">April</div>
                                                </div>
                                                <div class="col">
                                                    <div id="sparkline-bar1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row p-3">
                                            <div class="col-12 box-title pb-3 pt-3">Expenses</div>
                                            <div class="col-md-5">
                                                <div class="widget-10 d-inline-block">
                                                    <div class="bullet"><span class="bg-primary"></span></div> 
                                                    <div class="value">Health</div> 
                                                </div>
                                                <div class="widget-10 d-inline-block">
                                                    <div class="bullet"><span class="bg-warning"></span></div> 
                                                    <div class="value">Automobiles</div> 
                                                </div>
                                                <div class="widget-10 d-inline-block">
                                                    <div class="bullet"><span class="bg-danger"></span></div> 
                                                    <div class="value">Internet</div> 
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div id="morris-donutchart-2" style="height: 150px;"></div>
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
                                <div class="row widget-separator-1 m-0">
                                    <div class="col-md-4">
                                        <div class="widget-1">
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title">Total Sales</h5>
                                                        <span class="descr">Monthly</span>
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-success">+$22900</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title">Delivery Charges</h5>
                                                        <span class="descr">Monthly</span>
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-warning">+$2900</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-1">
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title">Orders</h5>
                                                        <span class="descr">Weekly Orders</span>
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-secondary">+1,450</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title">Support Tickets</h5>
                                                        <span class="descr">Average per User</span>
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-danger">+90</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="widget-1">
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title">Expenses</h5>
                                                        <span class="descr">Monthly Expenses</span>
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-success">+$12900</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="title">Logistics</h5>
                                                        <span class="descr">Overall</span>
                                                    </div>
                                                    <div class="col text-right">
                                                        <div class="number text-warning">-10%</div>
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
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <div class="panel-title-text">Invoices</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Office Manager</td>
                                                    <td>$ 400.00</td>
                                                    <td><span class="badge badge-success badge-sm badge-pill">Paid</span></td>
                                                    <td><i class="far fa-clock mr-2 text-muted"></i> 24 March 2018</td>
                                                    <td>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Edit"><i class="icon-pencil mr-2 text-info"></i></a>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Delete"><i class="icon-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Apez Template</td>
                                                    <td>$ 1400.00</td>
                                                    <td><span class="badge badge-warning badge-sm badge-pill">Unpaid</span></td>
                                                    <td><i class="far fa-clock mr-2 text-muted"></i> 23 March 2018</td>
                                                    <td>
                                                        <a href="#"  class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Edit"><i class="icon-pencil mr-2 text-info"></i></a>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Delete"><i class="icon-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Web Development</td>
                                                    <td>$ 12400.00</td>
                                                    <td><span class="badge badge-danger badge-sm badge-pill">Unknown</span></td>
                                                    <td><i class="far fa-clock mr-2 text-muted"></i> 22 March 2018</td>
                                                    <td>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Edit"><i class="icon-pencil mr-2 text-info"></i></a>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Delete"><i class="icon-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Web Design</td>
                                                    <td>$ 1900.00</td>
                                                    <td><span class="badge badge-primary badge-sm badge-pill">In Process</span></td>
                                                    <td><i class="far fa-clock mr-2 text-muted"></i> 16 March 2018</td>
                                                    <td>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Edit"><i class="icon-pencil mr-2 text-info"></i></a>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Delete"><i class="icon-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Klinikal Theme</td>
                                                    <td>$ 2100.00</td>
                                                    <td><span class="badge badge-dark badge-sm badge-pill">Pending</span></td>
                                                    <td><i class="far fa-clock mr-2 text-muted"></i> 11 March 2018</td>
                                                    <td>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Edit"><i class="icon-pencil mr-2 text-info"></i></a>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Delete"><i class="icon-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Klinik Template</td>
                                                    <td>$ 400.00</td>
                                                    <td><span class="badge badge-info badge-sm badge-pill">Paid</span></td>
                                                    <td><i class="far fa-clock mr-2 text-muted"></i> 10 March 2018</td>
                                                    <td>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Edit"><i class="icon-pencil mr-2 text-info"></i></a>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Delete"><i class="icon-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Logo Design</td>
                                                    <td>$ 600.00</td>
                                                    <td><span class="badge badge-warning badge-sm badge-pill">Partillay Paid</span></td>
                                                    <td><i class="far fa-clock mr-2 text-muted"></i> 10 March 2018</td>
                                                    <td>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Edit"><i class="icon-pencil mr-2 text-info"></i></a>
                                                        <a href="#" class="tippy d-inline-block" data-tippy-animation="perspective" data-tippy-arrow="true" title="Delete"><i class="icon-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <div class="panel-title-text">Recent Activity</div>
                                    </div>
                                </div>
                                <div class="panel-wrapper">
                                    <div class="recent-list">
                                        <ul>
                                            <li>
                                                <div class="main-icon"><i class="icon-star"></i></div>
                                                <div class="content">
                                                    <p><strong>Steve Jordon</strong> left a review <span class="badge badge-success badge-pill">5.0</span> on iPhone</p>
                                                    <div class="row action align-items-center">
                                                        <div class="col-sm-8">
                                                            <a href="#"><i class="icon-pencil"></i></a>
                                                            <a href="#"><i class="icon-note"></i></a>
                                                            <a href="#"><i class="icon-trash"></i></a>
                                                        </div>
                                                        <div class="col-sm-4 text-right">
                                                            <span class="date">14 Mar 2018</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="main-icon"><i class="main-icon icon-people"></i></div>
                                                <div class="content">
                                                    <p><strong>Mellisa bates</strong> commented on Rakesh Moria's article</p>
                                                    <div class="row action align-items-center">
                                                        <div class="col-sm-8">
                                                            <a href="#"><i class="icon-pencil"></i></a>
                                                            <a href="#"><i class="icon-note"></i></a>
                                                            <a href="#"><i class="icon-trash"></i></a>
                                                        </div>
                                                        <div class="col-sm-4 text-right">
                                                            <span class="date">12 Mar 2018</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="main-icon"><i class="main-icon icon-star"></i></div>
                                                <div class="content">
                                                    <p><strong>Cheri Arya</strong> left a review  <span class="badge badge-danger badge-pill">2.0</span> on themeforest item.</p>
                                                    <div class="row action align-items-center">
                                                        <div class="col-sm-8">
                                                            <a href="#"><i class="icon-pencil"></i></a>
                                                            <a href="#"><i class="icon-note"></i></a>
                                                            <a href="#"><i class="icon-trash"></i></a>
                                                        </div>
                                                        <div class="col-sm-4 text-right">
                                                            <span class="date">11 Mar 2018</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="main-icon"><i class="main-icon icon-user"></i></div>
                                                <div class="content">
                                                    <p><strong>Jenet Collins</strong> has created account on client portal.</p>
                                                    <div class="row action align-items-center">
                                                        <div class="col-sm-8">
                                                            <a href="#"><i class="icon-pencil"></i></a>
                                                            <a href="#"><i class="icon-note"></i></a>
                                                            <a href="#"><i class="icon-trash"></i></a>
                                                        </div>
                                                        <div class="col-sm-4 text-right">
                                                            <span class="date">27 Feb 2018</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="main-icon"><i class="main-icon icon-star"></i></div>
                                                <div class="content">
                                                    <p><strong>John Doe</strong> left a review <span class="badge badge-warning badge-pill">3.8</span> on Ticket.</p>
                                                    <div class="row action align-items-center">
                                                        <div class="col-sm-8">
                                                            <a href="#"><i class="icon-pencil"></i></a>
                                                            <a href="#"><i class="icon-note"></i></a>
                                                            <a href="#"><i class="icon-trash"></i></a>
                                                        </div>
                                                        <div class="col-sm-4 text-right">
                                                            <span class="date">31 Jan 2018</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="main-icon"><i class="main-icon fa fa-ticket"></i></div>
                                                <div class="content">
                                                    <p><strong>Emily Rasberry</strong> created support ticket for customization.</p>
                                                    <div class="row action align-items-center">
                                                        <div class="col-sm-8">
                                                            <a href="#"><i class="icon-pencil"></i></a>
                                                            <a href="#"><i class="icon-note"></i></a>
                                                            <a href="#"><i class="icon-trash"></i></a>
                                                        </div>
                                                        <div class="col-sm-4 text-right">
                                                            <span class="date">26 Jan 2018</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-head">
                                    <div class="panel-title">
                                        <div class="panel-title-text">Support Ticket</div>
                                    </div>
                                </div>
                                <div class="panel-body"> 
                                    <div class="ticket-list">
                                        <div class="list">
                                            <div class="tbl-cell icon"><i class="bg-success">A</i></div>
                                            <div class="tbl-cell content">
                                                <h4>Arya Stark <span class="status text-success">Replied</span></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            </div>
                                            <div class="tbl-cell date">4 Days ago</div>
                                        </div>
                                        <div class="list">
                                            <div class="tbl-cell icon"><i class="bg-warning">J</i></div>
                                            <div class="tbl-cell content">
                                                <h4>John Snow <span class="status text-warning">Waiting for Reply</span></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            </div>
                                            <div class="tbl-cell date">4 Days ago</div>
                                        </div>
                                        <div class="list">
                                            <div class="tbl-cell icon "><i class="bg-dark">R</i></div>
                                            <div class="tbl-cell content">
                                                <h4>Robert Baratheon <span class="status text-dark">Closed</span></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            </div>
                                            <div class="tbl-cell date">4 Days ago</div>
                                        </div>
                                        <div class="list">
                                            <div class="tbl-cell icon "><i class="bg-secondary">H</i></div>
                                            <div class="tbl-cell content">
                                                <h4>House Tally <span class="status text-secondary">Unknown</span></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            </div>
                                            <div class="tbl-cell date">4 Days ago</div>
                                        </div>
                                        <div class="list">
                                            <div class="tbl-cell icon "><i class="bg-info">K</i></div>
                                            <div class="tbl-cell content">
                                                <h4>Khal Drogo <span class="status text-info">Replied</span></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                            </div>
                                            <div class="tbl-cell date">4 Days ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>