
<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->

<!-- account-delete-modal -->
<div class="modal-form text-center">
    <div class="modal fade account-delete-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content p-4">
                <div class="modal-top border-0 mb-4 p-0">
                    <div class="alert-content">
                        <span class="la la-exclamation-circle warning-icon"></span>
                        <h4 class="widget-title font-size-20 mt-2 mb-1">Your account will be deleted permanently!</h4>
                        <p class="modal-sub">Are you sure to proceed.</p>
                    </div>
                </div>
                <div class="btn-box">
                    <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="theme-btn bg-color-6 border-0 text-white" >Delete</button>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->
<div id="snackbar"></div>
<!-- template js files -->
<script src="<?php echo URL;?>assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo URL;?>assets/js/popper.min.js"></script>
<script src="<?php echo URL;?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo URL;?>assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo URL;?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo URL;?>assets/js/magnific-popup.min.js"></script>
<script src="<?php echo URL;?>assets/js/isotope.js"></script>
<script src="<?php echo URL;?>assets/js/jquery.counterup.min.js"></script>
<script src="<?php echo URL;?>assets/js/fancybox.js"></script>
<script src="<?php echo URL;?>assets/js/wow.js"></script>
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="<?php echo URL;?>assets/js/tooltipster.bundle.min.js"></script>
<script src="<?php echo URL;?>assets/js/smooth-scrolling.js"></script>
<script src="<?php echo URL;?>assets/js/jquery.filer.min.js"></script>
<!-- <script src="<?php echo URL;?>assets/js/chart.js"></script> -->
<!-- <script src="<?php echo URL;?>assets/js/doughnut-chart.js"></script> -->
<!-- <script src="<?php echo URL;?>assets/js/bar-chart.js"></script>
<script src="<?php echo URL;?>assets/js/line-chart.js"></script> -->


<!--
<script src="<?php echo URL;?>assets/js/jquery.vmap.js"></script>
<script src="<?php echo URL;?>assets/js/jquery.vmap.world.js"></script>
<script src="<?php echo URL;?>assets/js/jquery.vmap.sampledata.js"></script> -->
<!-- <script src="<?php echo URL;?>assets/js/jquery.vmap-script.js"></script> -->
<!-- <script src="<?php echo URL;?>assets/js/progress-bar.js"></script>
<script src="<?php echo URL;?>assets/js/date-time-picker.js"></script>
<script src="<?php echo URL;?>assets/js/emojionearea.min.js"></script>
<script src="<?php echo URL;?>assets/js/animated-skills.js"></script> -->
<script src="<?php echo URL;?>assets/js/main.js"></script>
<script>
    function cartmessage(message) {
            var x = document.getElementById("snackbar");
            
            x.className = "show";
            $('#snackbar').html(message)
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
</script>
<?php echo $this->script;?>
</body>
</html>