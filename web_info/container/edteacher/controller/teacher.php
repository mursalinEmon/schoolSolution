<?php

class Teacher extends Controller{
	private $formfield=array();
	
	function __construct(){
		parent::__construct();

		
		$this->view->script = $this->script();

		$this->formfield = array(
            
            "teachername"=>array("required"=>"*","label"=>"Item Code","ctrlfield"=>"xteachername", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1","url"=>URL."popuppage/itempopup/itemcode"),			
            "email"=>array("required"=>"*","label"=>"Short Description","ctrlfield"=>"xemailaddr", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1"),		           
            "mobile"=>array("required"=>"","label"=>"Category","ctrlfield"=>"xmobile", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Category","rowindex"=>"2"),
			"address"=>array("required"=>"","label"=>"Brand","ctrlfield"=>"xaddress", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Brand","rowindex"=>"2"),
            "password"=>array( "ctrlvalue"=>"", "ctrltype"=>"hidden", "ctrlfield"=>"xpassword", "rowindex"=>"4", "ctrlvalid"=>array()),
		);
	}
	
	function init(){
		
		$this->view->business = $this->model->getbusiness();
		$this->view->category = $this->model->getcategories();
		$this->view->render("webtemplate","teacher/init");
		
	}

	function viewprofile($id=""){
		
		$this->view->business = $this->model->getbusiness();
		$this->view->category = $this->model->getcategories();
			//$this->view->menuitem=Menu::getmenu();
		
		$this->view->teacherdetail = $this->model->getteacherbyid($id);
		
		
		$this->view->render("webtemplate","dotschoolview/teacherdetail_view");
		
	}

	function allteachers(){
		
		$this->view->business = $this->model->getbusiness();
		$this->view->category = $this->model->getcategories();
			//$this->view->menuitem=Menu::getmenu();
		
		$this->view->teachers = $this->model->getallteacher();
		
		
		$this->view->render("webtemplate","dotschoolview/teacherlist_view");
		
	}

	function verifyreg($mobile=""){
		
		$this->view->business = $this->model->getbusiness();
		$this->view->category = $this->model->getcategories();
		
		$this->view->mobileno = $mobile;
		$this->view->render("webtemplate","teacher/confirmteacher");
		
	}

	function confirmreg(){
		$otp = $_POST['otp'];
		$inputs = new Form();
		try{

			if($otp==""){
				throw new Exception(serialize(array('field'=>'Verification Code', 'response'=>"Please provide verification code!")));
			}
			// if(!is_integer($otp)){
			// 	throw new Exception(serialize(array('field'=>'Verification Code', 'response'=>"Wrong verification code!")));
			// }
			if(intval($otp)>999999 && intval($otp)<100000){
				throw new Exception(serialize(array('field'=>'Verification Code', 'response'=>"Only six digit verification code!")));
			}

		$inputs ->post("mobile")
		->val('minlength', 11)
		->val('maxlength', 13);
		
		$inputs	->submit();       
		}catch(Exception $e){
		 $res = unserialize($e->getMessage());              
		 //Logdebug::appendlog($res['response']);
		 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
		exit;
		}
		$inpdata = $inputs->fetch(); //Logdebug::appendlog(serialize($inpdata));
		$data = Apptools::form_field_to_data($inpdata, $this->formfield); //Logdebug::appendlog(serialize($data));
		$teacher = $this->model->getteacherbymobile($data['xmobile']);
		//Logdebug::appendlog(serialize($student));
		if ($teacher[0]['xotp']!=$otp){
			echo json_encode(array('message'=>'Verification code mismatch!','result'=>'error','keycode'=>$data['xmobile']));
			exit;
		}
		$where = array("xmobile"=>$data["xmobile"]);
		$udata = array("xverified"=>'1');
		$success = $this->model->updateverify($udata, $where);

		if($success>0){
			Session::init();
			Session::set('teacherlogin', true);
			Session::set('fuser', $teacher[0]['xteacher']);
			Session::set('fmobile', $teacher[0]["xmobile"]);
			Session::set('fusername', $teacher[0]["xteachername"]);
			Session::set('faddr', $teacher[0]["xemailaddr"]);
			

			echo json_encode(array('message'=>'Registration confirmed!','result'=>'success','keycode'=>$data['xmobile']));
			exit;
		}
		
	}
		
	function registerteacher(){

		//Logdebug::appendlog(print_r($_POST, true));
		
		$inputs = new Form();
			

			$pass = Hash::create('sha256',$_POST["password"],HASH_KEY);

			$otp = random_int(100000,999999);

			try{
				$inputs ->post("teachername")
				->val('minlength', 2)
				
				->post("email")
				->val('minlength', 2)
				
				->post("mobile")
				->val('minlength', 11)
			
				->post("address")
				->val('minlength', 2);

			
			$inputs	->submit();       
			}catch(Exception $e){
			 $res = unserialize($e->getMessage());              
			 //Logdebug::appendlog($res['field'].$res['response']);
			 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
			 exit;
			}

			$onduplicate = '';
			
            $inpdata = $inputs->fetch(); //Logdebug::appendlog(serialize($inpdata));
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
			
			$teacherdt = $this->model->getteacherbymobile($data["xmobile"]);
			if(count($teacherdt)>0){
				echo json_encode(array('message'=>"Mobile already exist!",'result'=>'error','keycode'=>""));
				exit;
			}
			
			$data['bizid']=100; //add business id to array for inserting
				
			$data['xotp']=$otp;	
			$data['xpassword']=$pass;	
			$data['xotptime']=date('Y-m-d H:i:s');
			
			//$data['zemail']='rajib';
			//Logdebug::appendlog(print_r($data, true));
            //unset($data['itemid']);  //remove autoincrement id from inserting      
            $success = $this->model->save($data, $onduplicate);
			
			
            if($success > 0){					
				$teacherdt = $this->model->getteacherbymobile($data["xmobile"]);
				$sendsms = new Sendsms();
				$result = $sendsms->send_sms("Your Verificatin Code ".$teacherdt[0]["xotp"], $teacherdt[0]["xmobile"]);
				
				//Logdebug::appendlog($result);
				echo json_encode(array('message'=>'Facilitator registered successfully','result'=>'success','keycode'=>$data['xmobile']));
			}else{
                echo json_encode(array('message'=>'Failed to registere Facilitator','result'=>'error','keycode'=>''));
			}
		
		
		//Logdebug::appendlog(serialize($adddata));
		
		
	}

	private function script(){
		return "
			<script>

			$(\"#regform\").validate({
                rules: {
					teachername: {
                        required:true, 
                        minlength:2,
                        maxlength:100
                    },
					email:{
                        required:true, 
                        email:true
                    },
                    mobile:{
                        required:true, 
                        minlength:11,
                        maxlength:15
                    },
					address:{
						required:true,
					},
					password: {
                        required:true, 
                        minlength:6,
                        maxlength:15
                    },
					confirmpassword: {
                        required:true, 
                        minlength:6,
                        equalTo: '#password'
                    }

                },
                messages: {
                    
                    mobile:{
                        required: 'Required Field', 
                        minlength: 'Minimum of 11 characters',
                        maxlength: 'Maximum of 15 characters'
                    },
					password:{
                        required: 'Required Field', 
                        minlength: 'Minimum of 6 characters',
                        maxlength: 'Maximum of 15 characters'
                    },
					confirmpassword:{
                        required: 'Required Field', 
                        minlength: 'Minimum of 6 characters',
                        equalTo: 'Password & Confirm Password did not match'
                    }
                    
                },errorElement: 'em',
                errorPlacement: function ( error, element ) {                    
                    error.addClass( 'input-group help-block text-danger' );
                    if ( element.prop( 'type' ) === 'checkbox' ) {
                        error.insertAfter( element.parent( 'label' ) );
                    } else {
                        error.insertAfter( element );
                    }
                },

            })

			




			$(document).ready(function(){
			$('#reg').on('click', function(e){   
				e.preventDefault();
				var url = '".URL."teacher/registerteacher';  
				           
				var formid = 'regform';
					
						$.ajax({
							url:url, 
							type : 'POST',
							dataType : 'json', 						
							data : $('#'+formid).serialize(), 
							beforeSend:function(){
								
								loaderon(); 
							},
							success : function(result) {
								
								loaderoff();
								console.log(result) 
								   
								if(result.result=='success'){
									
									
									window.location.href = '".URL."teacher/verifyreg/'+result.keycode;                             
								}
	
								if(result.result=='error'){
									                               
								}
										
							},
							error: function(xhr, resp, text) {
								loaderoff();
								console.log(xhr, resp, text);
							}
						});
					return false;
				})

				$('#stuconfirm').on('click', function(e){   
					e.preventDefault();
					var url = '".URL."teacher/confirmreg';  
							   
					var formid = 'confirmform';
						
							$.ajax({
								url:url, 
								type : 'POST',
								dataType : 'json', 						
								data : $('#'+formid).serialize(), 
								beforeSend:function(){
									
									loaderon(); 
								},
								success : function(result) {
									
									loaderoff();
									//console.log(result) 
									   
									if(result.result=='success'){
										window.location.href = '".URL."facdashboard';    
										                            
									}
		
									if(result.result=='error'){
										$('#result').html(result.message);	  				   
									}
											
								},
								error: function(xhr, resp, text) {
									loaderoff();
									console.log(xhr, resp, text);
								}
							});
						return false;
					})
			});
			</script>";
		
	}
	
	
} 