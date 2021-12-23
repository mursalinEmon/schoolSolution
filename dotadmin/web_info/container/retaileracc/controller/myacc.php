<?php

class Myacc extends Controller{
    
    function __construct(){
        parent::__construct();
        Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }

        $this->view->script=$this->script();
    }

    function init(){
        $this->view->render("templateadmin","abr/comledger_view");
    }

    function loadbinlist(){
        $this->model->binlist();
    }

    function showledger(){
        $stfrom = $_POST['stfrom'];
        $stto = $_POST['stto'];
        $searchstr = $_POST['searchstr'];
        
        if(!is_numeric($stfrom) && $stfrom==""){
            return json_encode(array("result"=>"error"));
            exit;
        }
        if(!is_numeric($stto) && $stto==""){
            return json_encode(array("result"=>"error"));
            exit;
        }

        if(!is_numeric($searchstr)){
            if($searchstr!='ALL'){
                return json_encode(array("result"=>"error"));
                exit;
            }
        }
        //Logdebug::appendlog($stfrom.' '.$stto.' '.$searchstr);
        $this->model->myledger($stfrom, $stto, $searchstr);
    }

    function script(){
        return "
            <script>
                function loadbinlist(){
                    $.ajax({
                        
                        url:\"".URL."comledger/loadbinlist\", 
                        type : \"GET\", 
                        dataType: \"json\",                                 				
                        //data : {}, // post data || get data                    
                        beforeSend:function(){	
                            loaderon();   
                        },
                        success : function(result) {
                            //console.log(result)
                            loaderoff();
                            //const resultobj = JSON.parse(result);
                            $.each(result, function(key,val){
                                $('#binlist').append('<option>'+val['bin']+'</option>')
                            })
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })
                }

                $('#searchtxn').on('click',function(){
                    $.ajax({
                        
                        url:\"".URL."comledger/showledger\", 
                        type : \"POST\",
                        dataType: 'json',                                  				
                        data : {stfrom:$('#stfrom').val(),stto:$('#stto').val(), searchstr:$('#binlist').val()}, // post data || get data                    
                        beforeSend:function(){	
                            loaderon();   
                            $('#txntable tbody').html('');
                            $('#totalamt').html('0')
                        },
                        success : function(result) {
                           //console.log(result)
                            loaderoff();
                            if(result!=null && result!=undefined){
                            
                            var totalmt = 0;
                            $.each(result, function(key,val){
                                totalmt+=parseFloat(val['com']);
                                $('#txntable tbody').append(`<tr><td>`+val['txndate']+`</td><td>`+val['stno']+`</td><td>`+val['bin']+`</td><td>`+val['comtype']+`</td><td>`+val['com']+`</td></tr>`);
                            })
                            $('#totalamt').html(totalmt.toFixed(2))
                        }
                            
                        },error: function(xhr, resp, text) {
                            loaderoff();
                            
                        }
                    })
                })

                $(document).ready(function(){  
                    loadbinlist()
                })
            </script>
        ";
    }

}