<?php

class Bintransfer extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script=$this->script();
		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
    }

    function save(){
        $bin = filter_var($_POST['bin'], FILTER_SANITIZE_STRING);
        // $rin = filter_var($_POST['torin'], FILTER_SANITIZE_STRING);
        $txnno = filter_var($_POST['txnid'], FILTER_SANITIZE_STRING);
        $confno = filter_var($_POST['confno'], FILTER_SANITIZE_STRING);
        if(!is_numeric($txnno) && !is_numeric($confno) && !is_numeric($bin)){
            
                echo json_encode(array('message'=>'Wrong Information!','result'=>'error'));
                exit;
            
        }
        $gettxn = $this->model->gettxn($txnno, $confno);
        //Logdebug::appendlog($txnno.','.$confno);
        if(count($gettxn)==0){
            echo json_encode(array('message'=>'Wrong OTP!','result'=>'error'));
            exit;
        }
        $rindt = $this->model->getrindt($gettxn[0]['xrdin']);
        $bindt = $this->model->getbindt($bin);
        if(count($bindt)==0){
            echo json_encode(array('message'=>'No BIN data found!','result'=>'error'));
            exit;
        }
        if(count($rindt)==0){
            echo json_encode(array('message'=>'No data found!','result'=>'error'));
            exit;
        }
        
        $where = " bin = $bin"; 
        $data=array(
            'distrisl' => $rindt[0]['distrisl'],                
            
        );
        $success = $this->model->disburseupdate('mlmtree',$data, $where);
        //Logdebug::appendlog($bindt[0]["side"]);
        if($bindt[0]["side"]=="A"){
            $uwhere = " bin = ".$bindt[0]["upbin"]; 
            $udata=array(
                'leftdistrisl' => $rindt[0]['distrisl'],                                
            );
            $success = $this->model->disburseupdate('mlmtree',$udata, $uwhere);
        }
        if($bindt[0]["side"]=="B"){
            $uwhere = " bin = ".$bindt[0]["upbin"]; 
            $udata=array(
                'rightdistrisl' => $rindt[0]['distrisl'],                                
            );
            $success = $this->model->disburseupdate('mlmtree',$udata, $uwhere);
        }
        $udata=array(
            'updistrisl' => $rindt[0]['distrisl'],                                
        );
        if($bindt[0]["leftbin"]!=0){
            $uuwhere = " bin = ".$bindt[0]["leftbin"];            
            
            $success = $this->model->disburseupdate('mlmtree',$udata, $uuwhere);
        }
        if($bindt[0]["leftbin"]!=0){
            $uuwhere = " bin = ".$bindt[0]["rightbin"]; 
            
            $success = $this->model->disburseupdate('mlmtree',$udata, $uuwhere);
        }

            $chargedata=array(
                'zactive' => '1' 
                
            );
            $chgwhere=" xsl = $txnno";
        
        

        $success = $this->model->disburseupdate('crmcharge',$chargedata, $chgwhere);

        if($success>0){
          
            echo json_encode(array('message'=>'BIN Transfered Successfully!','result'=>'error'));
            
        }else{
            echo json_encode(array('message'=>'Failed!','result'=>'error'));
            
        }

    }   
    function bininfo($bin){
        $bin = filter_var($bin, FILTER_SANITIZE_STRING);
        
        if(!is_numeric($bin)){
            echo json_encode(array(0=>array('binname'=>'Not a valid bin!')));
            exit;
        }
        $this->model->getbininfo($bin);
    }

    function init(){
        
		$this->view->render("templateadmin","abr/bintransfer_view");
    }

    function script(){
        return "<script>

        $('#torin').on('blur', function(){
            var rin = $('#torin').val();
            $('#rinname').html('')
            $.ajax({
                
                url:\"".URL."pos/getrefrin/\"+rin, 
                type : \"GET\",                                  				
                //data : {}, 
                dataType: 'json',
                beforeSend:function(){	
                    
                    loaderon();   
                    
                },
                success : function(result) {
                    loaderoff();
                    if(result!=null){
                        $('#rinname').html(result['message'])
                    }
                },error: function(xhr, resp, text) {
                    loaderoff();
                    
                }
            })
        })

        $('#bin').on('blur', function(){
            var bin = $('#bin').val();
            $('#binname').html('')
            $.ajax({
                
                url:\"".URL."bintransfer/bininfo/\"+bin, 
                type : \"GET\",                                  				
                //data : {}, 
                dataType: 'json',
                beforeSend:function(){	
                    loaderon();   
                    
                },
                success : function(result) {
                    
                    loaderoff();
                   $('#binname').html(result[0]['binname'])
                },error: function(xhr, resp, text) {
                    loaderoff();
                    
                }
            })
        })

        $('#checkout').on('click', function(){
            var valid = 0;
            var message = '' 
            
            if(valid==0){
            
            $.ajax({
                
                url:\"".URL."bintransfer/save/\",  
                type : \"POST\",                                  				
                data : {bin:$('#bin').val(), rin: $('#rin').val(), txnid:$('#txnno').val(), confno:$('#confno').val()}, 
                dataType: 'json',
                beforeSend:function(){	
                    loaderon();   
                    $('#resultalert').removeClass('alert-danger');
                    $('#resultalert').removeClass('alert-success');
                    $('#resultalert').addClass('alert-dark');
                },
                success : function(result) {
                    loaderoff();
                    if(result['result']=='error'){
                        $('#resultalert').removeClass('alert-dark');
                        $('#resultalert').addClass('alert-danger');
                        $('#resultalert').html(result['message'])
                    }
                    if(result['result']=='success'){
                        $('#resultalert').removeClass('alert-dark');
                        $('#resultalert').addClass('alert-success');
                        $('#resultalert').html(result['message'])
                    }
                    
                },error: function(xhr, resp, text) {
                    loaderoff();
                    
                }
            })
            
        }else{
            $('#resultalert').removeClass('bg-info');
            $('#resultalert').addClass('bg-danger');
            $('#resultalert').html('<strong>'+message+'</strong>')
        }
    })

        </script>";
    }

}