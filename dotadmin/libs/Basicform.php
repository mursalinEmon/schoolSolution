<?php

class Basicform{


//crate only tab with content              
function createtab($tabsettings){

    $form = '<div class="col-12">
                        <div class="panel panel-default">                                
                            <div class="panel-body" id="tab">
                                    <ul class="nav nav-tabs">';
                                foreach($tabsettings as $key=>$value) {   
                                $form .='<li class="nav-item">
                                            <a class="nav-link '.$value["isactive"].'" href="#'.$value["tabid"].'" data-toggle="tab"><i class="'.$value["icon"].' mr-2"></i>'.$value["tabdesc"].'</a>
                                        </li>';
                                }                                        
                            $form .='</ul>
                                    <div class="tab-content">';
                                foreach($tabsettings as $key=>$value) { 
                                    $form .='<div class="tab-pane '.$value["isactive"].'" id="'.$value["tabid"].'">                                            
                                            '.$value["tabcontent"].'
                                            </div>';
                                }                                        
                           $form .='</div>
                            </div>
                        </div>
                </div>';

    return $form;   

}               

//onclick="saveform(\''.$formsettings["formdetail"]["id"].'\',\''.$val["btnurl"].'\')"
//create basic form
function createform($formsettings,$formfield, $showinpanel=true){
    
    $form = '';
    if ($showinpanel){
    $form .= '
        <div class="col-12">
        <div class="panel">
        
            <div class="panel-body">';
    }    
            $form .= '<div class="panel-header text-right mr-3">
            <div class="dropdown d-inline-block m-1">';
                                if(count($formsettings["actionbtn"])>0){
                                    $form .='<button class="btn btn-sm btn-outline btn-outline-2x btn-pill btn-secondary dropdown-toggle" data-toggle="dropdown"><strong>Action</strong></button>';
                                        
                                            $form .='<ul class="dropdown-menu" aria-labelledby="dropdown-button-3">';
                                            
                                                foreach($formsettings["actionbtn"] as $key=>$val){
                                                    $form .='<li><a id="'.$val["btnid"].'" href="'.$val["btnurl"].'">'.$val["btntext"].'</a></li>';
                                                }
                                            
                                            $form .='</ul>';
                                        }    
                                
                                        $form .='</div>';
            if(count($formsettings["mainbtn"])>0){   
                foreach($formsettings["mainbtn"] as $key=>$val){                       
                    $form .='<button id="'.$val["btnid"].'" value="'.$val["btnurl"].'" class="btn btn-sm '.$val["btncolor"].' btn-pill mr-1"><strong>'.$val["icon"].$val["btntext"].'</strong></button>';
                }
            }
            $form .='</div>';
            $form .='<form id="'.$formsettings["formdetail"]["id"].'">';
                // start controls rendering
                $maxrow = max(array_column($formfield, 'rowindex'));
                
                $form .= '<div class="container">';

                for($i = 0; $i <= $maxrow; $i++ ){
                    $form .= '<div class="row mb-2 no-gutters" id="row-'.$i.'">';
                    
                foreach($formfield as $fkey=>$fval){
                        if($fval["rowindex"]==$i){
                            $form .= '<div class="col ml-1">';                   
                    
                        if($fval["ctrltype"]==="text" || $fval["ctrltype"]==="email" || $fval["ctrltype"]==="password" 
                        || $fval["ctrltype"]==="number"){
                            $rdonly = "";
                            if(array_key_exists("readonly", $fval)){
                                $rdonly = $fval["readonly"];
                            }
                            
                        $form .= '<div class="row">                                
                                    <label class="col-12">'.$fval["label"].'<span style="color:red">'.$fval["required"].'</span></label>
                                    <div class="input-group col-12">
                                        <input type="'.$fval["ctrltype"].'" name="'.$fkey.'" id="'.$fkey.'" class="form-control form-control-sm" placeholder="'.$fval["label"].'" value="'.$fval["ctrlvalue"].'" '.$rdonly.'>
                                    </div>                                  
                                  </div>';
                        }
                        if($fval["ctrltype"]==="textarea"){
                        $form .= '<div class="row">
                                
                                <label class="col-12">'.$fval["label"].'<span style="color:red">'.$fval["required"].'</span></label>
                                <div class="input-group col-12">                                    
                                    <textarea name="'.$fkey.'" id="'.$fkey.'" class="form-control" rows="'.$fval["arearows"].'"></textarea>
                                    </div>                                  
                            </div>';
                        }
                        if($fval["ctrltype"]==="section"){
                            $form .= '<div class="'.$fval["color"].'" id="'.$fkey.'   ">
                                    <h5><strong>'.$fval["label"].'</strong></h5>
                                </div>';
                       }

                        if($fval["ctrltype"]==="hidden"){
                            $form .= '
                                       
                                           <input type="hidden" value="'.$fval["ctrlvalue"].'" name="'.$fkey.'" id="'.$fkey.'" >
                                       
                                       
                                       ';
                       }

                        if($fval["ctrltype"]==="group"){
                            $form .= '<div class="input-group"> 
                                            <label class="col-12">'.$fval["label"].'<span style="color:red">'.$fval["required"].'</span></label>
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-info btn-sm" id="'.$fkey.'_btn" onClick="popupCenter(\''.$fval["url"].'\', \'Item List\', 750, 450);" type="button">List</button>
                                                </div>
                                                    
                                                <input type="text" name="'.$fkey.'" id="'.$fkey.'" class="form-control form-control-sm" placeholder="'.$fval["label"].'" value="'.$fval["ctrlvalue"].'">
                                                    
                                      </div>';
                        }
                        if($fval["ctrltype"]==="datepicker"){
                           $form .= '<div class="row">
                                            <label class="col-12">'.$fval["label"].'</label>
                                            <div class="input-group col-12">
                                                <input type="text" name="'.$fkey.'" id="'.$fkey.'" class="form-control form-control-sm daterange-singledate">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="icon-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                        }

                        if($fval["ctrltype"]==="timepicker"){
                            $form .= '<div class="row">
                                             <label class="col-12">'.$fval["label"].'</label>
                                             <div class="input-group col-12">
                                                 <input type="time" name="'.$fkey.'" id="'.$fkey.'" class="form-control form-control-sm pickatime">
                                                 
                                             </div>
                                         </div>';
                         }

                        if($fval["ctrltype"]==="pdffile"){
                        $form .= '<div class="row">
                                            <label class="col-12">'.$fval["label"].'</label>
                                            <div class="input-group col-12">
                                                <input type="file" name="'.$fkey.'" id="'.$fkey.'" class="form-control form-control-sm" accept=".pdf">
                                                
                                            </div>
                                        </div>';
                        }

                        if($fval["ctrltype"]==="checkbox"){
                             $form .= '
                                        <div class="custom-control custom-checkbox custom-checkbox-1 d-inline-block">
                                            <input type="checkbox" name="'.$fkey.'" id="'.$fkey.'" class="custom-control-input">
                                            <label class="custom-control-label" for="subscriptioncheck1">'.$fval["label"].'</label>
                                        </div>
                                        ';
                        }
                        if($fval["ctrltype"]==="radio"){
                            $form .= '<fieldset id="'.$fkey.'" class="ml-3"><div class="row">';
                                    foreach($fval["ctrlvalue"] as $vk=>$vv){
                                        if($vk==$fval["ctrlselected"]){                                        
                                            $form .= '<div class="custom-control custom-radio custom-radio-1 mb-3">
                                                <input type="radio" name="'.$fkey.'"  class="custom-control-input" checked value="'.$vv.'" id="'.$vk.'">
                                                <label class="custom-control-label" for="'.$vk.'">'.$vk.'</label>
                                            </div> ';   
                                        }else{
                                            $form .= '<div class="custom-control custom-radio custom-radio-1 mb-3">
                                                <input type="radio" name="'.$fkey.'"  class="custom-control-input" value="'.$vv.'" id="'.$vk.'">
                                                <label class="custom-control-label" for="'.$vk.'">'.$vk.'</label>
                                            </div> ';
                                        }
                                    }
                            $form .= '</div></fieldset>';
                       }
                        if($fval["ctrltype"]==="datemask"){
                            $form .= ' <label for="date">'.$fval["label"].'</label>
                                           <input type="col-form-label" name="'.$fkey.'" id="'.$fkey.'" class="form-control form-control-sm date" maxlength="10" autocomplete="off">
                                           <span class="form-text">Example - 12/12/2012</span>
                                       ';
                       }
                        if($fval["ctrltype"]==="select"){
                            $form .= '<div class="row">                            
                                    <label class="col-12">'.$fval["label"].' <small>(Click to load...)</small></label>
                                    <input type="hidden" value="'.$fval["codetype"].'">
                                    <div class="input-group col-12">
                                    <select class="form-control form-control-sm custom-select" id="'.$fkey.'" name="'.$fkey.'">';
                                    
                                        foreach($fval["ctrlvalue"] as $vk=>$vv){
                                            if($vk==$fval["ctrlselected"])
                                                $form .= '<option value="'.$vv.'" selected>'.$vk.'</option>';
                                            else
                                                $form .= '<option value="'.$vv.'">'.$vk.'</option>';  
                                        }                                        
                                        $form .= '</select>
                                                              
                                    </div>
                                </div>';
                        }
                        
                        if($fval["ctrltype"]==="select2"){
                            $form .= '<div class="row">                            
                                    <label class="col-12">'.$fval["label"].' <small>(Click to load...)</small></label>
                                    <input type="hidden" value="'.$fval["codetype"].'">
                                    <div class="input-group col-12">
                                    <select class="form-control form-control-sm" id="'.$fkey.'" name="'.$fkey.'">';
                                    
                                        foreach($fval["ctrlvalue"] as $vk=>$vv){
                                            if($vk==$fval["ctrlselected"])
                                                $form .= '<option value="'.$vv.'" selected>'.$vk.'</option>';
                                            else
                                                $form .= '<option value="'.$vv.'">'.$vk.'</option>';  
                                        }                                        
                                        $form .= '</select>
                                                              
                                    </div>
                                </div>';
                        }

                        if($fval["ctrltype"]==="editor"){
                            $form .= '
                            <div class="row">
                            <div class="col-12">
                                <div class="panel panel-default">
                                    <div class="panel-head">
                                        <div class="panel-title">
                                            <span class="panel-title-text">'.$fval["label"].'</span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <textarea name="'.$fkey.'" id="'.$fkey.'" class="editor"></textarea>
                                    </div>
                                </div>
                            </div>
                            </div> 
                            ';
                        }
                    //}
                    $form .= '</div>';
                  }
                }
                $form .= '</div>';
            }    
            $form .= '</div>';
                // start controls rendering
        $form .='</form>';
        if ($showinpanel){
        $form .=' </div>  
                     
        </div>
        
        </div>';
        }
        return $form;

    }


    public function validateform($formfields,$formid){
        
        $returnelem = "$('#".$formid."').validate({
            rules: { ";
        foreach($formfields as $fkey=>$fval){
            if(count($fval["ctrlvalid"])>0){
                $returnelem .= $fkey.":{";
                foreach($fval["ctrlvalid"] as $key=>$value){
                    $returnelem .= $key.": ".$value.",";        
                }
                $returnelem .= "},";
            }
        }
        $returnelem .= "},";
        $returnelem .= "messages: { ";
            foreach($formfields as $fkey=>$fval){
                if(count($fval["ctrlvalid"])>0){
                    $returnelem .= $fkey.":{";
                    foreach($fval["ctrlvalid"] as $key=>$value){
                        switch ($key) {
                            case "required":
                                $returnelem .= $key.": 'Please enter ".$fval["label"]."',";
                            break;
                            case "minlength":
                                $returnelem .= $key.": 'Your ".$fval["label"]." must consist of at least ".$value." characters',";
                            break;
                            case "maxlength":
                                $returnelem .= $key.": 'Your ".$fval["label"]." can have maximum ".$value." characters',";
                            break;
                            case "number":
                                $returnelem .= $key.": '".$fval["label"].", only number allowed',";
                            break;
                            case "digits":
                                $returnelem .= $key.": '".$fval["label"].", only digits allowed',";
                            break;
                            case "email":
                                $returnelem .= $key.": 'Your ".$fval["label"].", is not a valid email',";        
                            break;
                            default:
                                break;
                        }      
                    }
                    $returnelem .= "},";
                }
            }
        $returnelem .= "},";
        $returnelem .= "errorElement: 'em',
                errorPlacement: function ( error, element ) {
                    
                    error.addClass( 'input-group help-block text-danger' );

                    if ( element.prop( 'type' ) === 'checkbox' ) {
                        error.insertAfter( element.parent( 'label' ) );
                    } else {
                        error.insertAfter( element );
                    }
                },";
        $returnelem .= "});";
        return $returnelem;
    }

    public function returnajax($formsettings, $keynumfield=""){ 
        $script = "";
        $actionarrA = ["save","createnew","update","cancel","confirm","delete"];
        $actionarrB = ["search"];
        if(count($formsettings["mainbtn"])>0){
            foreach($formsettings["mainbtn"] as $mainbtn){
                if(in_array($mainbtn["btnmethod"], $actionarrA)){
                    $script .= $this->returncreateajax($mainbtn["btnid"],$mainbtn["btnurl"],$formsettings["formdetail"]["id"],$keynumfield);
                }
                if(in_array($mainbtn["btnmethod"], $actionarrB)){
                    $script .= $this->returnsimpleajax($mainbtn["btnid"],$mainbtn["btnurl"],$formsettings["formdetail"]["id"]);
                }
                if($mainbtn["btnmethod"]==="clear"){    
                    $script .= "$('#".$mainbtn["btnid"]."').on('click',function(){
                        $('#".$formsettings["formdetail"]["id"]."').trigger('reset');
                        
                    });";
                }
            }
        }
        if(count($formsettings["actionbtn"])>0){
            foreach($formsettings["actionbtn"] as $mainbtn){
                if(in_array($mainbtn["btnmethod"], $actionarrA)){
                    $script .= $this->returncreateajax($mainbtn["btnid"],$mainbtn["btnurl"],$formsettings["formdetail"]["id"],$keynumfield);
                }
                if(in_array($mainbtn["btnmethod"], $actionarrB)){
                    $script .= $this->returnsimpleajax($mainbtn["btnid"],$mainbtn["btnurl"],$formsettings["formdetail"]["id"]);
                }                
            }
        }

        return  $script;

    }

    private function returncreateajax($btnid,$btnurl,$formid, $keynumfield){

        $script = "$('#".$btnid."').on('click', function(){ 
            
            var url = '".$btnurl."';            
            var formid = '".$formid."';
                if($('#'+formid).valid()){
                   
                    $.ajax({
                        url:url, 
                        type : 'POST',
                        dataType : 'json', 						
                        data : $('#'+formid).serialize(), 
                        beforeSend:function(){
                            $(this).addClass('disabled');
                            loaderon(); 
                        },
                        success : function(result) {
                            
                            loaderoff();
                            
                           $(this).removeClass('disabled');
                               
                            if(result.result=='fielderror'){
                                toastr.error(result.message);
                                $('#'+result.keycode).focus();
                            }

                            if(result.result=='success'){
                                toastr.success(result.message);
                                $('#".$keynumfield."').val(result.keycode);
                                                           
                            }

                            if(result.result=='error'){
                                toastr.error(result.message);                               
                            }
                                    
                        },
                        error: function(xhr, resp, text) {
                            loaderoff();
                            $(this).removeClass('disabled');
                           
                            console.log(xhr, resp, text);
                        }
                    });
                }
                return false;
        });";

        return $script;

    }


    private function returnsimpleajax($btnid,$btnurl,$formid){

        $script = "$('#".$btnid."').on('click', function(){
            
            var url = '".$btnurl."';
            var formid = '".$formid."';
                
                    $.ajax({
                        url:url, 
                        type : 'POST',
                        dataType : 'json', 						
                        data : $('#'+formid).serialize(), 
                        beforeSend:function(){
                            $(this).addClass('disabled');
                            loaderon(); 
                        },
                        success : function(result) {
                            
                            loaderoff();
                            
                           $(this).removeClass('disabled');
                           
                            if(result.result=='success'){
                                toastr.success(result.message);
                          //      $('#usersl').val(result.keycode);
                            }
                                    
                        },
                        error: function(xhr, resp, text) {
                            loaderoff();
                            $(this).removeClass('disabled');
                           
                            console.log(xhr, resp, text);
                        }
                    });
                    return false;
        });";

        return $script;

    }

    public function dropzone($dropzoneid, $filenameinput, $acceptedfiles='.jpg', $filesize=1){
        return "
                Dropzone.autoDiscover = false;
                $('#".$dropzoneid."').dropzone ({			
                    addRemoveLinks: true, 
                    acceptedFiles: '".$acceptedfiles."',
                    sending: function(file, xhr, formData){
                        formData.append('dzuserid', $('#".$filenameinput."').val());
                    },                          
                    maxFilesize:".$filesize.",
                    dictDefaultMessage: 'Drop files here or click here to upload. <br /> Only Images Allowed',
                    success: function (file, response) {
                        
                        const myObjStr = JSON.parse(response);
                        //console.log(myObjStr)
                        if(myObjStr.length==0){
                            toastr.error('File upload failed!');                        
                           }else{
                            toastr.success('File uploaded successfully!');        
                           }
                        //$('#imglist').html('');
                        myObjStr.forEach(function(resp){   
                                                    
                            $('#imglist').html('<div class=\"col-1\"><div class=\"row\"><img src=\"'+resp+'\" height=\"50\" width=\"60\"></div><div class=\"row\"><a href=\"javascript:void(0)\" onclick=\"imgdrop(\''+resp+'\')\">Remove</a></div></div>');	
                        });
                        this.removeAllFiles(true); 
                    },                    
                    removedfile: function(file) {
                        //toastr.warning('Files Removed successfully!');
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    }
                });
        ";
    }

    public function dropzonepdf($dropzoneid, $filenameinput, $acceptedfiles='.jpg', $filesize=1){
        return "
                Dropzone.autoDiscover = false;
                $('#".$dropzoneid."').dropzone ({			
                    addRemoveLinks: true, 
                    acceptedFiles: '".$acceptedfiles."',
                    sending: function(file, xhr, formData){
                        formData.append('dzuserid', $('#".$filenameinput."').val());
                    },                          
                    maxFilesize:".$filesize.",
                    dictDefaultMessage: 'Drop files here or click here to upload. <br /> Only Pdf Allowed',
                    success: function (file, response) {
                        
                        const myObjStr = JSON.parse(response);
                        //console.log(myObjStr)
                        if(myObjStr.length==0){
                            toastr.error('File upload failed!');                        
                           }else{
                            toastr.success('File uploaded successfully!');        
                           }
                        //$('#imglist').html('');
                        myObjStr.forEach(function(resp){   
                                                    
                            $('#imglist').html('<div class=\"col-1\"><div class=\"row\"><a href=\"'+resp+'\" target=\"_blank\"><img src=".URL."public/homework/pdf.png alt=\"View PDF\" width=\"60\" height=\"50\">View PDF</a><a style=\"color: red\" href=\"javascript:void(0)\" onclick=\"imgdrop(\''+resp+'\')\">Remove</a></div></div>');	
                        });
                        this.removeAllFiles(true); 
                    },                    
                    removedfile: function(file) {
                        //toastr.warning('Files Removed successfully!');
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    }
                });
        ";
    }


}
?>