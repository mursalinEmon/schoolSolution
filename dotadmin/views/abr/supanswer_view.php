
<div class="page-wrapper">
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Support Answer</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="<?php echo URL; ?>supanswer">Home</a></li>
                                    <li>Support Answer</li> <!-- change it by module name -->  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                        
        <?php echo $this->courseform; ?>          
              
</div>				


  <!-- The Modal -->
  <div class="modal fade" id="viewModal">
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Support Answer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
       <div class="card">
           <div class="card-body">
               <div id="slbatch"  style="display: block;">
                <form action="" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Answer</label>
                            <input type="hidden" value="" id="tempsl">
                            <textarea class="form-control" name="txnid" id="txnid" placeholder="Enter Answer" required></textarea>
                            
                        </div>
                    </form>
               </div>
           </div>
       </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="btnbatch"  class="btn btn-primary">Save </button>
        </div>
        </div>
    </div>
    </div>
</div>

<style>
    #example_wrapper{
        width:95%!important;
    }
</style>

