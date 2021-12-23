<!-- Page Footer -->
            

    
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/jquery/jquery-3.3.1.min.js"></script>
    
    
    
    <!-- Include js files -->
    <!-- Vendor Plugin -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/vendor.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/datatable/datatables.min.js"></script>
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
    
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/daterangepicker/daterangepicker.js"></script>
    <!-- Summernote Plugin -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Custom Script Plugin -->
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/dist/js/custom.js"></script>
    <!-- Custom demo Script for Dashbaord -->
    
    <script type="text/javascript" src="<?php echo URL; ?>asset_admin/dist/js/demo/date-time-picker.js"></script>

    
 <!-- Mask Plugin -->
<script type="text/javascript" src="<?php echo URL; ?>asset_admin/assets/plugin/mask/jquery.mask.min.js"></script>



 
    <script>
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

    // function popupCenter(url, title, w, h) {
    //     var left = (screen.width/2)-(w/2);
    //     var top = (screen.height/2)-(h/2);
    //     return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    //    }
    
       function post_value(xval, kval){ 
			var kv = kval;
			if (window.opener != null && !window.opener.closed) {
				var oval = xval;
				window.opener.document.getElementById(kv).value=oval;
				window.opener.document.getElementById(kv).focus();
				
			}
		window.close();
		}   
    </script>

    <?php 
        echo $this->script;
    ?>
</body>
</html>