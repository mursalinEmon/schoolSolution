<?php
class Getcode extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->script=$this->script();
		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
    }

    function init(){
        
		$this->view->render("templateadmin","abr/getotp_view");
    }

    function sendotp(){
        $type = filter_var($_POST['confcodetype'], FILTER_SANITIZE_STRING);
        
        $rin = filter_var($_POST['rin'], FILTER_SANITIZE_STRING);
        $trxid = filter_var($_POST['trxid'], FILTER_SANITIZE_STRING);
        
        
        $rindt = $this->model->getrindt($rin); 
        $otp = rand(10000, 100000);
        if(count($rin)==0){
            echo json_encode(array('message'=>'No RIN found!','result'=>'error'));
            exit;
        }
        $data=array();

        $messege = "আপনার ডিসবার্সমেন্ট একাউন্ট  নং পরিবর্তনের  অনুরোধ এসেছে , পরিবর্তন করতে চাইলে কনফার্মেশন কোড ".$otp." এবং টি এক্স এন নং  ব্যবহার করুন । আমারবাজার লিমিটেড ।";

        
        if($type=='Disbursement Account Update'){
            $data=array(
                'xrdin' => $rin,
                'xmobile' => $rindt[0]['mobile'], 
                'xotp'=>$otp,
                'xdate'=> date('Y-m-d'),
                'zemail'=>Session::get('suser'),
                'xtxnno'=>$trxid,
                'xbank'=>'Nagad',
                'xdoctype'=>$type
            );
        }
        //Logdebug::appendlog(print_r($data, true));
        $success = $this->model->create('crmcharge', $data);

        $message = "আপনার ডিসবার্সমেন্ট একাউন্ট  নং পরিবর্তনের  অনুরোধ এসেছে , পরিবর্তন করতে চাইলে কনফার্মেশন কোড ".$otp." এবং টি এক্স এন নং ".$success." ব্যবহার করুন ।";
        
        if($success>0){
            $sendsms = new Sendsms();
            $res = $sendsms->send_single_sms($message, "88".$rindt[0]['mobile']);
            //Logdebug::appendlog($res);
            echo json_encode(array('message'=>'Confirmation Code sent!','result'=>'error'));
            
        }else{
            echo json_encode(array('message'=>'Failed!','result'=>'error'));
            
        }

    }   
    function script(){
        return "<script>
        $('#confcodetype').on('change', function(){
            var amt = 25;
            if($('#confcodetype').val()=='Disbursement Account Update'){
                amt = 25;
            }
            if($('#confcodetype').val()=='Core Information Update'){
                amt = 25;
            }
            if($('#confcodetype').val()=='CIN BV Transfer'){
                amt = 25;
            }
            if($('#confcodetype').val()=='BC Transfer'){
                amt = 25;
            }
            if($('#confcodetype').val()=='Photo Upload'){
                amt = 10;
            }
            $('#reqamt').html(amt)
        })
        $('#idtype').hide()
        $('#mrin').on('blur', function(){
            var rin = $('#mrin').val();
            
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
                   $('#rinname').html(result['message'])
                },error: function(xhr, resp, text) {
                    loaderoff();
                    
                }
            })
        })

        $('#checkout').on('click', function(){
            var valid = 0;
            var message = '' 
            if($('#mrin').val()==''){
                valid = 1;
                var message = 'RIN not  found'
            }
            
            if(valid==0){
            
            $.ajax({
                
                url:\"".PAYGATE_URL."cscall\",  
                type : \"POST\",                                  				
                data : {customer:$('#mrin').val(),refrin:\"".Session::get('suser')."\",company:'',outlet:'',doc:'99',doctype:'CS',odcid:'',cusname:'Disbursement Account Update',add1:'ডিসবার্সমেন্ট একাউন্ট  নং',add2:'ডিসবার্সমেন্ট একাউন্ট  নং',city:'Dhaka',district: 'Dhaka',postal:1209,callbackurl:\"".URL."buygetotp\",mobile:$('#mobile').val(),customertype:\"Retailer\",apikey:\"36cfce7372fc99723569236e883dc4db39669cdf116a57d6d126e05fdea7be3c\",itemdt:[{itemcode:'ABL-CS-0001',itemdesc:'NA',rate:'25',qty:'1',bv:'0'}]}, 
                dataType: 'json',
                beforeSend:function(){	
                    
                },
                success : function(result) {
                    const resultobj = result;  
                            if(resultobj['result']=='success')
                                location.href=\"".PAYGATE_URL."paygateway/\"+resultobj['message'];
                    
                },error: function(xhr, resp, text) {
                   
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


// {\"customer\":$('#mrin').val()\"\",\"refrin\":\"".Session::get('suser')."\",\"company\":\"\",\"outlet\":\"\",
//     \"doc\":\"0\",\"doctype\":\"CS\",\"odcid\":\"\",\"cusname\":\"XXXX\",
//     \"add1\":\"XXXXX\",\"add2\":\"\",\"city\":\"Dhaka\",\"district\": \"Dhaka\",\"postal\":\"1212\",
//     \"callbackurl\":\"".URL."getcode\",\"mobile\":\"019191\",\"customertype\":\"Retailer\",
//     \"apikey\":\"36cfce7372fc99723569236e883dc4db39669cdf116a57d6d126e05fdea7be3c\",
//     \"itemdt\":[{\"itemcode\":\"CS SUPPORT\",\"itemdesc\":\"CSSUPPORT\",\"rate\":\"0\",\"qty\":\"0\",\"bv\":\"0\"}]}