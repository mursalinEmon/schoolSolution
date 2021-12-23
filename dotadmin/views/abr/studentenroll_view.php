
<div class="page-wrapper">
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Enroll Student</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="<?php echo URL; ?>examcreate">Home</a></li>
                                    <li>Enroll Student</li> <!-- change it by module name -->  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

             
        <?php echo $this->courseform; ?>
        <div class="panel-body" >

          <label for="stuname" class="col-12">Student Name</label>
          <input type="text" class="form-control" name="stuname" id="stuname" placeholder="Enter Name">
        </div>
              
</div>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="ntitle"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="ndescription"></div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


  <div class="modal" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Find Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="stuname">Enter Student Names</label><br>
        <input type="text" value="" id="stuname" name="stuname" placeholder="Name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Find</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" id="search-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Find Student</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
        <label data-error="wrong" data-success="right" for="stuname">Student Name</label>
          <input type="text" id="stunameid" name="stuname" class="form-control validate">
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
      <button type="button" class="btn btn-primary" id="find-button">Find</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


