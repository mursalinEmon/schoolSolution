<?php 
class Forgotpassword extends Controller{
	private $formfield=array();

    function __construct(){
        parent::__construct();
        $this->view->script = $this->script();

		$this->formfield = array(
            		           
            "mobile"=>array("required"=>"","label"=>"Category","ctrlfield"=>"xmobile", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Category","rowindex"=>"2"),
		);
        
    }
 
    function init(){
        //$this->view->business = $this->model->getbusiness();
		//$this->view->category = $this->model->getcategories();
        $this->view->render("studentlogin","dotschoolview/forgotpassword_view");
    } 

    function verifystudentmobile(){
				
		$mobile = $_POST['mobile'];
		// Logdebug::appendlog($mobile);
		$getuser = $this->model->verifymobile($mobile);
		// Logdebug::appendlog(print_r($getuser[0]["xmobile"],true));
		if($getuser){
		$otp = random_int(100000,999999);
		$data['xotp']=$otp;
		// Logdebug::appendlog($data['xotp']);
		$where = "xmobile = ".$getuser[0]["xmobile"]." and xverified=1 and bizid=".BIZID."";
		$udata = array("xotp"=>$data['xotp']);
		$success = $this->model->updateverify($udata, $where);
		// Logdebug::appendlog(print_r($success,true));
		if($success > 0){					
			$studentdt = $this->model->getstudentbymobile($getuser[0]["xmobile"]);
			$sendsms = new Sendsms();
			// Logdebug::appendlog(print_r($studentdt,true));
			$result = $sendsms->send_sms("Your Verification Code ".$studentdt[0]["xotp"], $studentdt[0]["xmobile"]);
			
			// Logdebug::appendlog($result);
			
		}
		$mobile = $getuser[0]['xmobile'];
			echo json_encode(array('message'=>'User found: ','result'=>'success','keycode'=>$mobile));
			
		}else{
			echo json_encode(array('message'=>'User not found!','result'=>'error','keycode'=>''));
		}

		
	
		
		
	}

	function verifyreg($studentmobile=""){
		
		//$this->view->business = $this->model->getbusiness();
		//$this->view->category = $this->model->getcategories();
		
		$this->view->mobileno = $studentmobile;
		$this->view->render("studentlogin","dotschoolview/confirmreg");
		
	}


	function confirmreg(){
		$otp = $_POST['otp'];
		$mobile = $_POST['mobile'];

			if($otp==""){
				throw new Exception(serialize(array('field'=>'Verification Code', 'response'=>"Please provide verification code!")));
			}
			// if(!is_integer($otp)){
			// 	throw new Exception(serialize(array('field'=>'Verification Code', 'response'=>"Wrong verification code!")));
			// }
			if(intval($otp)>999999 && intval($otp)<100000){
				throw new Exception(serialize(array('field'=>'Verification Code', 'response'=>"Only six digit verification code!")));
			}
			
		
		$student = $this->model->getstudentbymobile($mobile);
			// Logdebug::appendlog(print_r($student[0]['xotp'],true));
		if ($student[0]['xotp']!=$otp){
			echo json_encode(array('message'=>'Verification code mismatch!','result'=>'error','keycode'=>$mobile));
			exit;
		}else{
			echo json_encode(array('message'=>'Verification code matched!','result'=>'success','keycode'=>$mobile));
		}
		
		
	}

	function updatepassword($studentmobile=""){

		$student = $this->model->getstudentbymobile($studentmobile);

		$this->view->student = $student;

		$this->view->render("studentlogin","dotschoolview/passwordupdate_view");
	}

	function updatenewpassword(){
		$password = $_POST['newconfpassword'];
		$mobile = $_POST['mobile'];

		$pass = Hash::create('sha256',$_POST["newconfpassword"],HASH_KEY);
		// Logdebug::appendlog($pass);
		

		$student = $this->model->verifymobile($mobile);
		// Logdebug::appendlog(print_r($student,true));
		if($student){

		$where = "xmobile = ".$student[0]["xmobile"]." and xverified=1 and bizid=".BIZID."";
		$udata = array("xpassword"=>$pass);
		$success = $this->model->updateverify($udata, $where);
		// Logdebug::appendlog(print_r($success,true));

			if($success>0){
				Session::init();			
				Session::set('suser', $student[0]["xstudent"]);
				Session::set('sbizid', BIZID);
				Session::set('refno', $student[0]["xrefno"]);
				Session::set('susername', $student[0]['xstuname']);
				Session::set('smobile', $student[0]['xmobile']);		
				Session::set('sadd', $student[0]['xaddress']);            
				Session::set('loggedIn', true);
				
				echo json_encode(array('message'=>'Password Upadated!','result'=>'success','keycode'=>''));
				
			}else{
				echo json_encode(array('message'=>'Password Upadate failed!','result'=>'error','keycode'=>''));
			}

		}else{
			echo json_encode(array('message'=>'Could not find student!','result'=>'error','keycode'=>''));
		}
		

	}


	function resendsms($mobile=""){
		$mobile=filter_var($mobile, FILTER_SANITIZE_STRING);
				// Logdebug::appendlog(serialize($mobile));
		$studentdt = $this->model->getstudentbymobile($mobile);
		//::appendlog(serialize($studentdt));
		if(count($studentdt)==0){
			echo json_encode(array('message'=>'Student is not registered!','result'=>'error','keycode'=>''));
			exit;
		}

		$sendsms = new Sendsms();
		$result = $sendsms->send_sms("Your Verification Code ".$studentdt[0]["xotp"], $studentdt[0]["xmobile"]);
		echo json_encode(array('message'=>'Verification code sent!','result'=>'success','keycode'=>''));
	}

    function script(){
        return "
		<script>
		$(function(){
			$('#regform').submit(function(e){
				e.preventDefault();  
				var mobile = $('#mobile').val()
				console.log(mobile);

				var url = '".URL."forgotpassword/verifystudentmobile';


				$.ajax({
					url:url, 
					type : 'POST',	
					dataType : 'json',					
					data : {mobile:mobile}, 
					
					success : function(result) {
						
						console.log(result);
						   
						if(result.result=='success'){
							window.location.href = '".URL."forgotpassword/verifyreg/'+result.keycode;
						}else{
							
							
							
						}
								
					},
					error: function(xhr, resp, text) {
						console.log(xhr, resp, text);
					}
				});

			});

			$('#resend').on('click',function(e){
				e.preventDefault();
				var mobile = $('#mobile').val();
				var url = '".URL."forgotpassword/resendsms/'+mobile;  
				$.ajax({
					url:url, 
					type : 'GET',
					dataType : 'json', 						
					//data : $('#'+formid).serialize(), 
					beforeSend:function(){
						
					},
					success : function(result) {
						$('#result').html(result.message);	  
					},
					error: function(xhr, resp, text) {
						
						console.log(xhr, resp, text);
					}
				});
			})

			$('#stuconfirm').on('click', function(e){   
				e.preventDefault();
				var mobile = $('#mobile').val()
				var otp = $('#otp').val()
				// console.log(mobile);
				// console.log(mobile);
				var url = '".URL."forgotpassword/confirmreg';  
				
				$.ajax({
					url:url, 
					type : 'POST',
					dataType : 'json', 						
					data : {mobile:mobile, otp:otp},


					success : function(result) {
						
						//console.log(result) 
						   
						if(result.result=='success'){
							
							window.location.href = '".URL."forgotpassword/updatepassword/'+result.keycode;                          
						}else{
							$('#result').html(result.message);	                           
						}

						
								
					},
					error: function(xhr, resp, text) {
						// loaderoff();
						console.log(xhr, resp, text);
					}
				});
						
					return false;
			});

			$(\"#newconfpassword\").focusout(function(){
				var newconfpassword = $('#newconfpassword').val();
				var newpassword = $('#newpassword').val();
				var mobile = $('#mobile').val();
				

				if(newconfpassword == newpassword){            
					$('#messagespan').html('Password matched.');
					$('#messagespan').removeClass('text-danger');
					console.log('matched');
				}else{
					$('#messagespan').html('Password did not matched!!');
					$('#messagespan').addClass('text-danger');
					console.log('did not matched');

					
				}

			  });

			  $('#passwordupdate').submit(function(e){   
				e.preventDefault();
				var newconfpassword = $('#newconfpassword').val();
				var newpassword = $('#newpassword').val();
				var mobile = $('#mobile').val();
				// console.log(mobile);
				var url = '".URL."forgotpassword/updatenewpassword'; 
				
				if(newconfpassword == newpassword){
					$.ajax({
						url:url, 
						type : 'POST',
						dataType : 'json', 						
						data : {mobile:mobile, newconfpassword:newconfpassword},
	
	
						success : function(result) {
							
							// console.log(result) 
							
							if(result.result=='success'){
							
								window.location.href = '".URL."dashboard';                          
                         
							}else{
								// $('#result').html(result.message);	                           
							}
							   
							
									
						},
						error: function(xhr, resp, text) {
							// loaderoff();
							console.log(xhr, resp, text);
						}
					});

					return false;

				}else{

				}
						
			});

			  $(\"#xrefno\").on('change',function(){
				$('#namespan').html('');             
				$('#messagespan').html(''); 
			});
		});
			

			
		</script>
        ";
    }
}