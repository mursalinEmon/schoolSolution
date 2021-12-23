<?php

class Disburseupd extends Controller{

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
        $bank = filter_var($_POST['bank'], FILTER_SANITIZE_STRING);
        $acc = filter_var($_POST['acc'], FILTER_SANITIZE_STRING);
        $txnno = filter_var($_POST['txnid'], FILTER_SANITIZE_STRING);
        $confno = filter_var($_POST['confno'], FILTER_SANITIZE_STRING);
        
        $gettxn = $this->model->gettxn($txnno, $confno);
        //Logdebug::appendlog($txnno.','.$confno);
        if(count($gettxn)==""){
            echo json_encode(array('message'=>'Wrong OTP!','result'=>'error'));
            exit;
        }
        $rindt = $this->model->getrindt($gettxn[0]['xrdin']);
        
        if(count($rindt)==""){
            echo json_encode(array('message'=>'No data found!','result'=>'error'));
            exit;
        }
        
        $where = " xrdin = '".$rindt[0]['xrdin']."'"; 

        
            $data=array(
                'xbank' => $bank,
                'xacc' => $acc, 
                
            );

            $chargedata=array(
                'zactive' => '1' 
                
            );
            $chgwhere=" xsl = $txnno";
        
        $success = $this->model->disburseupdate('mlminfo',$data, $where);

        $success = $this->model->disburseupdate('crmcharge',$chargedata, $chgwhere);

        if($success>0){
          
            echo json_encode(array('message'=>'Information Updated Successfully!','result'=>'error'));
            
        }else{
            echo json_encode(array('message'=>'Failed!','result'=>'error'));
            
        }

    }   
    

    function init(){
        
		$this->view->render("templateadmin","abr/disbursementupdate_view");
    }

    function script(){
        return "<script>
        $('#checkout').on('click', function(){
            var valid = 0;
            var message = '' 
            
            if(valid==0){
            
            $.ajax({
                
                url:\"".URL."disbursementupdate/save/\",  
                type : \"POST\",                                  				
                data : {bank:$('#bank').val(), acc: $('#accno').val(), txnid:$('#txnno').val(), confno:$('#confno').val()}, 
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
                        $('#resultalert').removeClass('alert-success');
                        $('#resultalert').addClass('alert-danger');
                        $('#resultalert').html(result['message'])
                    }
                    if(result['result']=='success'){
                        $('#resultalert').removeClass('alert-dark');
                        $('#resultalert').removeClass('alert-danger');
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