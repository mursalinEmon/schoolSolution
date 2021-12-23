<?php

class Student extends Controller{
	private $formfield=array();
	
	function __construct(){
		parent::__construct();

		
		$this->view->script = $this->script();

		$this->formfield = array(
            
            "studentname"=>array("required"=>"*","label"=>"Item Code","ctrlfield"=>"xstuname", "ctrlvalue"=>"", "ctrltype"=>"group", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1","url"=>URL."popuppage/itempopup/itemcode"),			
            "email"=>array("required"=>"*","label"=>"Short Description","ctrlfield"=>"xstuemail", "ctrlvalue"=>"", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2"),"rowindex"=>"1"),		           
            "mobile"=>array("required"=>"","label"=>"Category","ctrlfield"=>"xmobile", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Category","rowindex"=>"2"),
			"address"=>array("required"=>"","label"=>"Brand","ctrlfield"=>"xaddress", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Brand","rowindex"=>"2"),
            "guardian"=>array("required"=>"*","label"=>"Price","ctrlfield"=>"xguardian", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2", "number"=>"true"),"rowindex"=>"2"),						
            "gurdianmobile"=>array("required"=>"","label"=>"Category","ctrlfield"=>"xgurdianmobile", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Category","rowindex"=>"2"),							
            "xfname"=>array("required"=>"*","label"=>"Price","ctrlfield"=>"xfname", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2", "number"=>"true"),"rowindex"=>"2"),						
            "xfmobile"=>array("required"=>"","label"=>"Category","ctrlfield"=>"xfmobile", "ctrlvalue"=>array(), "ctrlvalid"=>array(), "ctrltype"=>"select","ctrlselected"=>"", "codetype"=>"Item Category","rowindex"=>"2"),
            "xrefno"=>array("required"=>"*","label"=>"Price","ctrlfield"=>"xrefno", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2", "number"=>"true"),"rowindex"=>"2"),
            "xnid"=>array("required"=>"*","label"=>"Price","ctrlfield"=>"xnid", "ctrlvalue"=>"0", "ctrltype"=>"text", "ctrlvalid"=>array("required"=>"true","minlength"=>"2", "number"=>"true"),"rowindex"=>"2"),
			"country"=>array( "ctrlvalue"=>"", "ctrltype"=>"hidden", "ctrlfield"=>"xcountry", "rowindex"=>"4", "ctrlvalid"=>array()),
			"city"=>array( "ctrlvalue"=>"", "ctrltype"=>"hidden", "ctrlfield"=>"xcity", "rowindex"=>"4", "ctrlvalid"=>array()),
			"password"=>array( "ctrlvalue"=>"", "ctrltype"=>"hidden", "ctrlfield"=>"xpassword", "rowindex"=>"4", "ctrlvalid"=>array()),
		);
	}
	
	function init(){
		
		//$this->view->business = $this->model->getbusiness();
		//$this->view->category = $this->model->getcategories();
			//$this->view->menuitem=Menu::getmenu();
	    	
		
		
		$this->view->render("studentlogin","student/init");
		
	}
	
	function verifyref(){
		$refno = $_POST['refno'];
		// Logdebug::appendlog($refno);
		$getref = $this->model->getrefno($refno);
		// Logdebug::appendlog(print_r($ref_name,true));
		if($getref){
		$ref_name = $getref[0]['user_name'];
			echo json_encode(array('message'=>'Reference found: ','result'=>'success','keycode'=>$ref_name));
			
		}else{
			echo json_encode(array('message'=>'Reference not found!','result'=>'error','keycode'=>''));
		}
		


	}

	function verifyreg($studentmobile=""){
		
		//$this->view->business = $this->model->getbusiness();
		//$this->view->category = $this->model->getcategories();
		
		$this->view->mobileno = $studentmobile;
		$this->view->render("studentlogin","student/confirmreg");
		
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
		$student = $this->model->uncofirmedstudent($data['xmobile']);
		// Logdebug::appendlog(serialize($student));
		if ($student[0]['xotp']!=$otp){
			echo json_encode(array('message'=>'Verification code mismatch!','result'=>'error','keycode'=>$data['xmobile']));
			exit;
		}
		$where = array("xmobile"=>$data["xmobile"]);
		$udata = array("xverified"=>'1');
		$success = $this->model->updateverify($udata, $where);
		
		if($success>0){
			Session::init();			
			Session::set('suser', $student[0]["xstudent"]);
			Session::set('sbizid', BIZID);
			Session::set('refno', $student[0]["xrefno"]);
			Session::set('susername', $student[0]['xstuname']);
			Session::set('smobile', $student[0]['xmobile']);		
            Session::set('sadd', $student[0]['xaddress']);            
			Session::set('loggedIn', true);
			
			echo json_encode(array('message'=>'Registration confirmed!','result'=>'success','keycode'=>''));
			
		}else{
			echo json_encode(array('message'=>'Registration failed!','result'=>'error','keycode'=>''));
		}
		
	}
		
	function registerstudent(){
				
		$inputs = new Form();
			$d = $_POST["birthday"];
			$m = $_POST["birthmonth"];			
			$y = $_POST["birthyear"];

			$pass = Hash::create('sha256',$_POST["password"],HASH_KEY);

			$otp = random_int(100000,999999);

			$dob = $y."-".$m."-".$d;
			
            try{
				$inputs ->post("studentname")
				->val('minlength', 2)
				
				->post("email")
				->val('minlength', 2)
				
				->post("mobile")
				->val('minlength', 11)
			
				->post("address")
				->val('minlength', 2)
				->post("xfname")
				->post("xrefno")
				->post("xnid")

				

				->post("xfmobile")

				->post("guardian")

				

				->post("gurdianmobile")
				
				->post("country")
			
				->post("city");
			
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
			
			$studentdt = $this->model->getstudentbymobile($data["xmobile"]);
			// Logdebug::appendlog(print_r($studentdt,true));
			if(count($studentdt)>0 && $studentdt[0]["xverified"] == 1 && $studentdt[0]["bizid"] == BIZID ){
				
				echo json_encode(array('message'=>"Mobile already exist!",'result'=>'error','keycode'=>""));
				exit;
			}
			elseif(count($studentdt)>0 && $studentdt[0]["xverified"] == 0 && $studentdt[0]["bizid"] == BIZID ){
				echo json_encode(array('message'=>'Student registered successfully','result'=>'success','keycode'=>$data['xmobile']));
				exit;
			}
			
			
			$data['bizid']=BIZID; //add business id to array for inserting
			$data['xdob']=$dob;		
			$data['xotp']=$otp;	
			$data['xpassword']=$pass;	
			$data['xotptime']=date('Y-m-d H:i:s');
			
			//$data['zemail']='rajib';
			
            //unset($data['itemid']);  //remove autoincrement id from inserting      
            $success = $this->model->save($data, $onduplicate);
			// Logdebug::appendlog(print_r($success,true));
			
            if($success > 0){					
				$studentdt = $this->model->getstudentbymobile($data["xmobile"]);
				$sendsms = new Sendsms();
				$result = $sendsms->send_sms("Your Verification Code ".$studentdt[0]["xotp"], $studentdt[0]["xmobile"]);
				
				//Logdebug::appendlog($result);
				echo json_encode(array('message'=>'Student registered successfully','result'=>'success','keycode'=>$data['xmobile']));
			}else{
                echo json_encode(array('message'=>'Failed to registere student','result'=>'error','keycode'=>''));
			}
		
		
		//Logdebug::appendlog(serialize($adddata));
		
		
	}

	function resendsms($mobile=""){
		$mobile=filter_var($mobile, FILTER_SANITIZE_STRING);
				// Logdebug::appendlog(serialize($mobile));
		$studentdt = $this->model->uncofirmedstudent($mobile);
		//::appendlog(serialize($studentdt));
		if(count($studentdt)==0){
			echo json_encode(array('message'=>'Student is not registered!','result'=>'error','keycode'=>''));
			exit;
		}

		$sendsms = new Sendsms();
		$result = $sendsms->send_sms("Your Verification Code ".$studentdt[0]["xotp"], $studentdt[0]["xmobile"]);
		echo json_encode(array('message'=>'Verification code sent!','result'=>'success','keycode'=>''));
	}

	private function script(){
		return "
			<script>
            $(\"#xrefno\").focusout(function(){
				var refno = $(this).val();
				console.log(refno);
				var url = '".URL."student/verifyref';

				$.ajax({
					url:url, 
					type : 'POST',	
					dataType : 'json',					
					data : {refno:refno}, 
					
					success : function(result) {
						
						console.log(result);
						   
						if(result.result=='success'){
							$('#namespan').html(result.keycode);             
							$('#messagespan').html(result.message);
							$('#messagespan').removeClass('text-danger');
						}else{
							$('#messagespan').html(result.message);
							$('#messagespan').addClass('text-danger');
							
						}
								
					},
					error: function(xhr, resp, text) {
						console.log(xhr, resp, text);
					}
				});

			  });
			  $(\"#xrefno\").on('change',function(){
				$('#namespan').html('');             
				$('#messagespan').html(''); 
			});
			$(\"#sturegform\").validate({
				
                rules: {
					studentname: {
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
                    },
					birthday: {
                        required:true,
                    },
					birthmonth: {
                        required:true,
                    },
					birthyear: {
                        required:true,
                    },
					xfname: {
                        required:true,
                    },
					xfmobile: {
                        required:true,
                    },
                    xrefno:{
                        required:true,
                        
                    },
                    xnid:{
                        required:true,
						minlength:10,
                        maxlength:25
                        
                    },
					guardian: {
                        required:true,
                    },
					gurdianmobile: {
                        required:true,
                    },
					city: {
                        required:true,
                    },
					country: {
                        required:true,
                    },
					

                },
                messages: {
                    
                    mobile:{
                        required: 'Required Field', 
                        minlength: 'Minimum of 11 characters',
                        maxlength: 'Maximum of 15 characters'
                    },
                    email:{
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
                    },
					studentname:{
                        required: 'Required Field',
                    },
					city:{
                        required: 'Required Field', 
                    },
					country:{
                        required: 'Required Field', 
                        
                    },
					xfname:{
                        required: 'Required Field', 
                        
                    },
					xfmobile:{
                        required: 'Required Field', 
                        
                    },
					guardian:{
                        required: 'Required Field', 
                        
                    },
                    xrefno:{
                        required: 'Required Field', 
                        
                    },
                    xnid:{
                        required: 'Required Field',
						minlength: 'Minimum of 10 characters',
                        maxlength: 'Maximum of 25 characters' 
                        
                    },
					gurdianmobile:{
                        required: 'Required Field', 
                        
                    },
					birthday:{
                        required: 'Required Field', 
                        
                    },
					birthmonth:{
                        required: 'Required Field', 
                        
                    },
					birthyear:{
                        required: 'Required Field', 
                        
                    },
					address:{
                        required: 'Required Field', 
                        
                    },
                    
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
						

			$('#stureg').on('click', function(e){   
				e.preventDefault();
				console.log('clicked');

				var url = '".URL."student/registerstudent';  
				 if(!$('#sturegform').valid()){
					return false;
				 }          
				var formid = 'sturegform';
				console.log(formid);
				
						$.ajax({
							url:url, 
							type : 'POST',
							dataType : 'json', 						
							data : $('#'+formid).serialize(), 
							// beforeSend:function(){
								
							// 	loaderon(); 
							// },
							success : function(result) {
								
								// loaderoff();
								console.log(result) 
								   
								if(result.result=='success'){
									window.location.href = '".URL."student/verifyreg/'+result.keycode;                             
								}else{
									$('.toast').toast('show');
									
									$('.toast-body-p').html(result.message);
									$('#messagespan').addClass('text-danger');
									$('#messagespan').html(result.message);	                       
								}
										
							},
							error: function(xhr, resp, text) {
								// loaderoff();
								console.log(xhr, resp, text);
							}
						});
					return false;
				})

				$('#resend').on('click',function(e){
					e.preventDefault();
					var mobile = $('#mobile').val();
					var url = '".URL."student/resendsms/'+mobile;  
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
					var url = '".URL."student/confirmreg';  
							   
					var formid = 'stuconfirmform';
						
							$.ajax({
								url:url, 
								type : 'POST',
								dataType : 'json', 						
								data : $('#'+formid).serialize(), 
								beforeSend:function(){
									
								},
								success : function(result) {
									
									//console.log(result) 
									   
									if(result.result=='success'){
										
										window.location.href = '".URL."dashboard';                          
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
					})
			});

			$('#sturegform').validate({
				submitHandler: function(form) {
				  form.submit();
				}
			   });

			   
			
						
		  

			   var districts = ['Barishal','Bhola','Chattogram','Khagrachari','Brahmanbaria','Chandpur',
                'Comilla','Cox&apos;s Bazar','Feni','Lakshmipur','Noakhali','Rangamati', 'Dhaka', 'Faridpur',
                'Gazipur', 'Gopalganj','Kishoreganj','Madaripur','Manikganj', 'Munshiganj',
                'Narayangonj','Narsingdi','Rajbari','Shariatpur','Tangail', 'Bagerhat','Chuadanga',
                'Jashore','Jhenaidah','Khulna','Kushtia','Magura','Narail','Satkhira', 'Jamalpur',
                'Mymensingh', 'Netrakona', 'Sherpur','Bogura','Chapai Nawabganj', 'Joypurhat','Naogaon',
                'Natore','Pabna', 'Rajshahi','Sirajganj','Dinajpur','Gaibandha','Kurigram','Lalmonirhat',
                'Nilphamari','Panchagarh', 'Rangpur','Thakurgaon', 'Habiganj','Moulvibazar','Sunamganj',
                'Sylhet',
        ];

		districts.sort(function (a, b) {
            if (b > a) {
                return -1;
            }
            if (a > b) {
                return 1;
            }
            return 0;
        });
        
        
		$.each(districts,function(key,val){
			//  console.log(val);
			 $('#district').append('<option>'+val.toUpperCase()+'</option>');			
        });

		
						
			</script>";
		
	}
	
	
} 