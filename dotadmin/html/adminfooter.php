<!-- Page Footer -->
            <!-- <div class="page-ftr">
                <div>© DOTADEMY</div>
            </div> -->
        </div>
               
    </div>
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/jquery/jquery-3.3.1.min.js"></script>
    <?php 
        if(isset($this->js)){
            foreach($this->js as $js){
                echo '<script src="'.URL.$js.'"></script>';
            }
        }
    ?>
    
    <!-- Include js files -->
    <!-- Vendor Plugin -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/vendor.min.js"></script>
    <!-- Raphael Plugin -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/raphael/raphael-min.js"></script>
    <!-- Morris Plugin -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/morris/morris.min.js"></script>
    <!-- Sparkline Plugin -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/sparkline/jquery.sparkline.min.js"></script>
    <!-- Datepicker -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/pickadate/legacy.js"></script>
    <!-- Moment Plugin -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/moment/moment.min.js"></script>
    <!-- Daterangpicker Plugin -->
    
<script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/datatable/datatables.min.js"></script>
    
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/daterangepicker/daterangepicker.js"></script>
    <!-- Summernote Plugin -->
    <!-- <script type="text/javascript" src="<?php //echo URL; ?>asset_admin/assets/plugin/summernote/summernote-bs4.min.js"></script> -->
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    
    <!-- Custom demo Script for Dashbaord -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/dist/js/demo/dashboard.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/dist/js/demo/date-time-picker.js"></script>


    
    
 <!-- Mask Plugin -->
<script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/mask/jquery.mask.min.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/dropzone/dropzone.min.js"></script>

<!-- <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.mockjax.js"></script> -->

<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.autocomplete.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>public/js/customselect.js"></script>


<script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/sweetalert/sweetalert.js"></script>
<!-- <script type="text/javascript" src="<?php echo URL; ?>public/js/demo.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>public/js/countries.js"></script> -->

<script type="text/javascript" src="<?php echo URL; ?>public/js/pagination.min.js"></script>


    <!-- Custom Script Plugin -->

<!-- Custom Script Plugin -->
<script type="text/javascript" src="<?php echo URL; ?>asset_admin/dist/js/custom.js"></script>
 
 <script>
 
    // ClassicEditor
    //         .create( document.querySelector( '#skilllevel' ) )
    //         .catch( error => {
    //             console.error( error );
    //         } );

        
</script>   
    <script>

        //daterange-singledate


                // let today = new Date();
                // let dd = today.getDate();

                // let mm = today.getMonth()+1; 
                // const yyyy = today.getFullYear();

                // $('input[name=\"birthday\"]').daterangepicker({
                //     singleDatePicker: true,
                //     showDropdowns: true,
                //     startDate: dd+'-'+mm+'-'+yyyy,
                //     locale: {
                //         format: 'DD-MM-YYYY'
                //       }
                //   });


        //Form Masking
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        
        $('.ip_address').mask('099.099.099.099');
        $('.percent').mask('##0,00%', {reverse: true});
        $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
        $('.fallback').mask("00r00r0000", {
            translation: {
              'r': {
                pattern: /[\/]/,
                fallback: '/' },
                placeholder: "__/__/____" 
            }
        });
        $('.numeric').mask('000000000000000', {'translation': {0: {pattern: /[0-9.]/}}});
        $('.digit').mask('000000000000000', {'translation': {0: {pattern: /[0-9]/}}});
        $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

        $('.cep_with_callback').mask('00000-000', {onComplete: function(cep) {
            console.log('Mask is done!:', cep);
        },onKeyPress: function(cep, event, currentField, options){
            console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
        },onInvalid: function(val, e, field, invalid, options){
            var error = invalid[0];
            console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e); }
        });

        
        
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    function popupCenter(url, title, w, h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
       }

       
       $(document).on("focusin", '.custom-select', function(e) {       
        loadselect($(this));

       })    


       function loadselect(__this){
        var _this = __this   
    var type = _this.parent().prev().val();
    _this.html('<option value=""></option>')
    $.ajax({
        url:'<?php echo URL;?>commonapi/codesbytype/'+type, 
        type : 'GET',
        dataType : 'json', 	                    
        beforeSend:function(){    
            // $('#userrole').find('option')
            //         .remove()
            //         .end();  
                                     
            //         _this.html('<option>Loading...</option>')
        },
        success : function(result) {                        
            
            var _index = 0;
           result.forEach(function(res){
                _index += 1;
                if(_index == 1)
                    _this.append('<option value="'+res.code+'" selected>'+res.code+'</option>');
                else
                    _this.append('<option value="'+res.code+'">'+res.code+'</option>');
           });
                    
        },
        error: function(xhr, resp, text) {
            _this.html('<option></option>')
           
            console.log(xhr, resp, text);
        }
    });
    
       }  
       
// $('.custom-select').on('click', function(e){ 
    
// });
       
       $(document).ready(function(){
           //loadstno()
        $('.sub-menu li a').on('click', function(){
            var _thismenu = $(this).closest('.has-sub');
            var _this = $(this).closest('li');
            localStorage.setItem('activemenu', _thismenu.attr('id'));
            localStorage.setItem('activesubmenu', _this.attr('id'));
            
            $('.has-sub').removeClass('active');
            $('.sub-menu').removeClass('subactive');
        })
        var activeMenu = localStorage.getItem('activemenu');
        var activeSubmenu = localStorage.getItem('activesubmenu');
        
        if(activeMenu){
           $('#'+activeMenu).addClass('active');
           $('#'+activeSubmenu+' a').css({"color":"white"});
           $('#'+activeSubmenu+' a').css({"font-weight":"bold"});
        }
        
    });
    //for loader
                    function loaderon() {
                        document.getElementById("overlay").style.display = "block";
                      }
                      
                      function loaderoff() {
                        document.getElementById("overlay").style.display = "none";
                      }
                      
                      
    </script>

    <?php 
        
        echo $this->script;
    ?>
    
<div id="overlay">
  <div id="text"><div>Wait Processing . . .</div><div id="loader"></div></div>
</div>
</body>
</html>