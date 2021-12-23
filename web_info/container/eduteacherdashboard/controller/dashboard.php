<?php

class Dashboard extends Controller{
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
			"sex"=>array("required"=>"","label"=>"Long Description","ctrlfield"=>"xsex", "ctrlvalue"=>"", "ctrltype"=>"editor", "ctrlvalid"=>array(),"rowindex"=>"3"),		
			"country"=>array( "ctrlvalue"=>"", "ctrltype"=>"hidden", "ctrlfield"=>"xcountry", "rowindex"=>"4", "ctrlvalid"=>array()),
            "city"=>array( "ctrlvalue"=>"", "ctrltype"=>"hidden", "ctrlfield"=>"xcity", "rowindex"=>"4", "ctrlvalid"=>array()),
		);
	}
	
	function init(){
		
		$this->view->business = $this->model->getbusiness();
		$this->view->category = $this->model->getcategories();
			//$this->view->menuitem=Menu::getmenu();
	    	
		
		
		$this->view->render("teachertemplate","teacherarea/dashboard");
		
	}

	function verifyreg($studentmobile=""){
		
		$this->view->business = $this->model->getbusiness();
		$this->view->category = $this->model->getcategories();
		
		$this->view->mobileno = $studentmobile;
		$this->view->render("webtemplate","student/confirmreg");
		
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
		$student = $this->model->getstudentbymobile($data['xmobile']);
		//Logdebug::appendlog(serialize($student));
		if ($student[0]['xotp']!=$otp){
			echo json_encode(array('message'=>'Verification code mismatch!','result'=>'error','keycode'=>$data['xmobile']));
			exit;
		}
		$where = array("xmobile"=>$data["xmobile"]);
		$udata = array("xverified"=>'1');
		$success = $this->model->updateverify($udata, $where);

		if($success>0){
			Session::init();
			Session::set('ecomlogin', true);
			Session::set('ecomuser', $student[0]["xmobile"]);
			Session::set('ecomusername', $student[0]["xstuname"]);
			Session::set('ecomuseremail', $student[0]["xstuemail"]);

			echo json_encode(array('message'=>'Registration confirmed!','result'=>'success','keycode'=>$data['xmobile']));
			exit;
		}
		
	}
		
	function registerstudent(){
		
		$inputs = new Form();
			$d = $_POST["birthday"];
			$m = $_POST["birthmonth"];			
			$y = $_POST["birthyear"];

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

				->post("guardian")

				->post("sex")
				
				->post("country")
			
				->post("city");
			
			$inputs	->submit();       
			}catch(Exception $e){
			 $res = unserialize($e->getMessage());              
			 //Logdebug::appendlog($res['response']);
			 echo json_encode(array('message'=>$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
			exit;
			}
			
			$onduplicate = '';
			
            $inpdata = $inputs->fetch(); //Logdebug::appendlog(serialize($inpdata));
            $data = Apptools::form_field_to_data($inpdata, $this->formfield);
			$data['bizid']=100; //add business id to array for inserting
			$data['xdob']=$dob;		
			$data['xotp']=$otp;	
			$data['xotptime']=date('Y-m-d H:i:s');
			//$data['zemail']='rajib';
			//Logdebug::appendlog(serialize($data));
            //unset($data['itemid']);  //remove autoincrement id from inserting      
            $success = $this->model->save($data, $onduplicate);
			
			//Logdebug::appendlog($success);
            if($success > 0)				
				echo json_encode(array('message'=>'Student registered successfully','result'=>'success','keycode'=>$data['xmobile']));
             else
                echo json_encode(array('message'=>'Failed to registere student','result'=>'error','keycode'=>''));
		
		
		
		//Logdebug::appendlog(serialize($adddata));
		
		
	}

	private function script(){
		return "
			<script>
			$(document).ready(function(){
			$('#stureg').on('click', function(e){   
				e.preventDefault();
				var url = '".URL."student/registerstudent';  
				           
				var formid = 'sturegform';
					
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
									
									
									window.location.href = '".URL."student/verifyreg/'+result.keycode;                             
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
					var url = '".URL."student/confirmreg';  
							   
					var formid = 'stuconfirmform';
						
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
			});
			</script>";
		
	}
	
	
} 