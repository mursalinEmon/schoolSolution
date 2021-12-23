
<div class="page-wrapper">
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h2 class="page-title-text">Homework Submit</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="<?php echo URL; ?>hwsubmit">Home</a></li>
                                    <li>Homework Submit</li> <!-- change it by module name -->  
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


<!-- Button trigger modal -->

<!-- Modal for HW Submit -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">HW Submit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
            <form role="form" id="frmhwsubmit" class="registration-form">
               <fieldset style="display: block;">
                  <div class="form-top">
                     <div class="form-top-left">
                        <h3>Step 1 / 2</h3>
                        <p>Fillup Your HW Information : </p>
                     </div>
                  </div>
                  <div class="form-bottom">
                     <div class="form-group">
                        <label class="sr-only" for="form-about-yourself">HW Description</label>
                        <input type="hidden" value="" name="sl" id="sl">
                        <input type="hidden" value="" name="qid" id="qid">
                        <textarea name="hwdescription" id="hwdescription" placeholder="Write here homework description.." class="form-about-yourself form-control input-error" required></textarea>
                     </div>
                  </div>
               </fieldset>
               
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" id="btnhwsubmit" class="btn btn-success btn-next" disabled>Save & Next</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">PDF Upload</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
            <div class="form-top">
               <div class="form-top-left">
                  <h3>Step 2 / 2</h3>
                  <p>Upload Your HW PDF</p>
               </div>
            </div>
            <form action="<?php echo URL ?>hwsubmit/uploadimage" class="dropzone dz-clickable" id="userdropzone">
               <div class="dz-default dz-message"><span><i class="icon-plus">
                  </i>Drop files here or click here to upload. <br> Only PDF Allowed</span>
               </div>
            </form>
				<div class="row mt-1 ml-1 mr-1 border" id="imglist">No pdf found!</div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-info btn-prev">Prev</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Button trigger modal -->

