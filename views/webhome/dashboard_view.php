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
                                    <li><a href="/dashboard">Home</a></li>
                                    <li>Dashboard</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page Body -->
                <div class="page-body">
                     <h2 style="color:green" class="text-center">Your Recent Updates</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="panel panel-default">
                                <div class="row widget-separator-1">
                                    <div class="col-md-12">
                                        <div class="widget-1">
                                            <div class="content">
                                                <div class="row align-items-center">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="font-weight-bold" scope="col">#Invoice</th>
                      <th class="font-weight-bold" scope="col">Date</th>
                      <th class="font-weight-bold" scope="col">Total Amount</th>
                      <th class="font-weight-bold" scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php if(count($this->curcourses)>0){ 
                      foreach($this->curcourses as $key => $val) {
                      ?>
                    <tr>
                      <td>#<?php echo $val['xecomsl'] ?></td>
                      <td><?php echo $val['xdate'] ?></td>
                      <td><?php echo $val['xrate'] ?>/-</td>
                      <td><a class="btn btn-success" style="border-radius:60px; font-size: 12px; padding: 5px 5px" data-toggle="modal" data-target="#myModal" id="testtt" onClick="modalopen('<?php echo $val['xecomsl'] ?>')">See Details</a></td>
                    </tr>
                    <?php   
                     }
                     }
                    ?>
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
                </div>
            </div>
            
            
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="ntitle">Enroll Course Detais</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="invno"></div>
            <table class="table table-hover">
                 <thead>
                    <tr>
                      <th class="font-weight-bold" scope="col">Course ID</th>
                      <th class="font-weight-bold" scope="col">Course Name</th>
                      <th class="font-weight-bold" scope="col">Amount</th>
                      <th class="font-weight-bold" scope="col">Batch</th>
                    </tr>
                </thead>
                <tbody id="ndescription">
                </tbody>
            </table>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>