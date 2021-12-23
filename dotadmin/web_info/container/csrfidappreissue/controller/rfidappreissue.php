<?php

class Rfidappreissue extends Controller{
	private $formfield=array();
	function __construct(){
		parent::__construct();
		$this->intializeform();
		$this->view->script=$this->script();
		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
	}
	function init(){
		
		Session::set('retailertoken',uniqid());
        $this->view->token=Session::get('retailertoken');       
		$this->view->render("templateadmin","abr/rfidreissue_view");
		
	}

	

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(      	
			"rin"=>array("ctrlfield"=>"xcus"),
			"arccode"=>array("ctrlfield"=>"xarc"),
			
		);
	}

	

	function showretailer(){
		
		$inputs = new Form();
	try{
		if(Session::get('retailertoken')!=$_POST['token']){
			throw new Exception(serialize(array('field'=>'Token', 'response'=>$_POST['token'].' mismatch! Please refresh!')));
		}
		
		$inputs ->post("rin")
				->val('minlength', 11)
				->val('maxlength', 20);
				
		$inputs	->submit(); 		

		$inpdata = $inputs->fetch();
		
		$data = Apptools::form_field_to_data($inpdata, $this->formfield);//Logdebug::appendlog(serialize($inpdata));
		//print_r($data); exit;
		//echo json_encode($this->model->getrindt($data['xcus'])); exit;

		echo json_encode(array('message'=>$this->model->getrindt($data['xcus']),'result'=>'success'));

	}catch(Exception $e){
		$res = unserialize($e->getMessage()); 
		
		echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
		
	}
}
	
	function createretailer(){
		
		$date = date('Y-m-d');
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 

		$txnno = filter_var($_POST['txnno'], FILTER_SANITIZE_STRING);
        $confno = filter_var($_POST['otpno'], FILTER_SANITIZE_STRING);
        if(!is_numeric($txnno) && !is_numeric($confno)){
            
                echo json_encode(array('message'=>'Wrong Information!','result'=>'error'));
                exit;
            
        }
        $gettxn = $this->model->gettxn($txnno, $confno);
        
        if(count($gettxn)==0){
            echo json_encode(array('message'=>'Wrong OTP!','result'=>'error'));
            exit;
        }

		//$pin = rand(100000,999999);

		try{
			
			if(Session::get('retailertoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}
			if($_POST['rin']==""){
				
					throw new Exception(serialize(array('field'=>'RIN', 'response'=>' can not be empty!')));
				
			}
			$rin = $_POST['rin'];
			$arccode = $_POST['arccode'];
			$rindt = $this->model->getrindt($rin);
			if(count($rindt)==0){
				echo json_encode(array('message'=>'Not a valid RIN!','result'=>'error'));
				exit;
			}
			//Logdebug::appendlog($sendsms->randPass(8));
			
			//$password = Hash::create('sha256',$rawpass,HASH_KEY); 

			$st = "update mlminfo set xcreditterms=2, xarc='".$arccode."' where xrdin='".$rin."'";
			//Logdebug::appendlog($st);
			$success = $this->model->createretailer($st);
			
			//$success = 1;
			if($success>0){

				$chargedata=array(
					'zactive' => '1' 
					
				);
				$chgwhere=" xsl = $txnno";
			
			
	
				$success = $this->model->disburseupdate('crmcharge',$chargedata, $chgwhere);
				
				if ($_FILES["photofile"]["name"]){
					$imgupload = new ImageUpload();
					$imgupload->store_uploaded_image('public/images/bizimages/retailer/','photofile', 80, 60, $rin);
					
				}
				$sendsms = new Sendsms();
				
				$sendsms->send_single_sms('আমারবাজার এর বানিজ্যিক ভূবনে আপনাকে স্বাগতম। আপনার এক্সপ্রেস কার্ড এপ্লিকেশন সম্পন্ন হয়েছে।', $rindt[0]['mobile']);

				echo json_encode(array('result'=>'success','message'=>'Express card application done!'));
			}
			else{	
				echo json_encode(array('result'=>'error','message'=>'Unable to Apply!'));
			}

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
			
		}
		
	}
	
	
	

	function script(){
		return "
		<script>
		
		$(document).ready(function(e){

			$('#retailerform').on('submit',(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
		
				$.ajax({
					type:'POST',
					url:\"".URL."rfidappreissue/createretailer\", 
					data:formData,
					cache:false,
					contentType: false,
					processData: false,
					success:function(result){
						console.log(result)
						loaderoff();
						const resultobj = JSON.parse(result);
						console.log(result)
						if(resultobj['result']=='success'){
							$('#resultalert').removeClass('alert-dark')
							$('#resultalert').removeClass('alert-danger')
							
							$('#resultalert').html(resultobj['message'])
							$('#resultalert').addClass('alert-success')
						}else{
							$('#resultalert').removeClass('alert-dark')
							
							$('#resultalert').removeClass('alert-success')
							$('#resultalert').html(resultobj['message'])
							$('#resultalert').addClass('alert-danger')
						}
					},
					error: function(data){
						
						console.log(data);
					}
				});
			}));

			$('#btnclear').on('click', function(){
				$('#retailerform').trigger('reset');
			})

			
			

			$('#rin').on('blur', function(){
				$('#cusname').val('')
				$('#mobile').val('')
				
				$('#refrin').val('')
				$.ajax({
					
					url:\"".URL."rfidappreissue/showretailer\", 
					type : \"POST\",                                  				
					data : {rin: $('#rin').val(), token: $('#token').val() },                   
					beforeSend:function(){	
						loaderon();   
					},
					success : function(result) {
						
						loaderoff();
						const resultobj = JSON.parse(result);
						
						if(resultobj['result']=='success'){
							if(resultobj['message'].length!=0){
							$('#cusname').val(resultobj['message'][0]['cusname'])
							$('#mobile').val(resultobj['message'][0]['mobile'])							
							$('#refrin').val(resultobj['message'][0]['refrin'])
								$('#resultalert').addClass('alert-dark')								
								$('#resultalert').removeClass('alert-success')
								$('#resultalert').html('Retailer Registration')
								$('#resultalert').removeClass('alert-danger')
							}else{
								$('#resultalert').removeClass('alert-dark')
								
								$('#resultalert').removeClass('alert-success')
								$('#resultalert').html('CIN not found!')
								$('#resultalert').addClass('alert-danger')
							}
						}else{
								$('#resultalert').removeClass('alert-dark')
								
								$('#resultalert').removeClass('alert-success')
								$('#resultalert').html(resultobj['message'])
								$('#resultalert').addClass('alert-danger')
						}

					},error: function(xhr, resp, text) {
						loaderoff();
						
						
					}
				})
			})

			
		
		 		})
		</script>
		";
	}
} 