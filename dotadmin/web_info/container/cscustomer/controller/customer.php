<?php

class Customer extends Controller{

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
		
		
		Session::set('custoken',uniqid());
        $this->view->token=Session::get('custoken');       
		$this->view->render("templateadmin","abr/customer_view");
		
	}

	private function intializeform(){

        //Main user form initialize here
        $this->formfield = array(      	
            "fullname"=>array("ctrlfield"=>"xorg"),						
            "mobile"=>array("ctrlfield"=>"xmobile"),
            "refrin"=>array("ctrlfield"=>"xrdin"),		
			"address"=>array("ctrlfield"=>"xadd1"),
			"cusemail"=>array("ctrlfield"=>"xcusemail")
		);
	}

	function showcustomer(){
			
			$inputs = new Form();
		try{
			if(Session::get('custoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}

			$inputs ->post("refrin")
					->val('minlength', 1)
					->val('maxlength', 20);
					
			$inputs	->submit(); 		

			$inpdata = $inputs->fetch();

			$data = Apptools::form_field_to_data($inpdata, $this->formfield);//Logdebug::appendlog($data['xrdin']);
			echo json_encode($this->model->getrindt($data['xrdin']));

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror','keycode'=>$res['field']));
			
		}
	}
	
	function createcustomer(){

		$date = date('Y-m-d');
		$year = date('Y',strtotime($date));
		$month = date('m',strtotime($date)); 
		
		
		try{
			
			if(Session::get('custoken')!=$_POST['token']){
				throw new Exception(serialize(array('field'=>'Token', 'response'=>' mismatch! Please refresh!')));
			}
			$mybin=$this->model->getmybin();
			$retailer = $this->model->getrindt($_POST['refrin']); 
			
			$inputs = new Form();

			
			
			if($mybin[0]['bin']==0){
				throw new Exception(serialize(array('result'=>'error','field'=>Session::get('susername'), 'response'=>' not a retailer!')));
			}

			$cinprefix = 'ABC'."-".$mybin[0]['bin'];

			$cin = $this->model->getcin($cinprefix);
			
			if(count($retailer)==0){
				throw new Exception(serialize(array('result'=>'error','field'=>'Ref. RIN', 'response'=>' not found!')));
			}


			$inputs ->post("fullname")
					->val('minlength', 2)
					->val('maxlength', 250)
                    
                    ->post("mobile")
                    ->val('minlength', 2)
                    
                    ->post("refrin")
					->val('minlength', 1)
					
					->post("cusemail")
                    ->val('minlength', 1)

                    ->post("address");
					
			$inputs	->submit(); 		

			$inpdata = $inputs->fetch();

			$data = Apptools::form_field_to_data($inpdata, $this->formfield);

			$data['bizid']=100;
			$data['xcus']=$cin;
			$data['zemail']=Session::get('suser'); //Logdebug::appendlog(serialize($data));

			$success = $this->model->createcustomer($data);
			if($success>0){				
				echo json_encode(array('result'=>'success','message'=>$cin.' created successfully!!'));
			}
			else{
				echo json_encode(array('result'=>'error','message'=>'Unable to create cin!'));
			}

		}catch(Exception $e){
			$res = unserialize($e->getMessage()); 
			
			echo json_encode(array('message'=>$res['field']." ".$res['response'],'result'=>'fielderror'));
			
		}

		
	}
	
	

	function script(){
		return "
			<script>
			$(document).ready(function(){
				
				$('#cusreg').on('click', function(){

					$.ajax({
                        
						url:\"".URL."customer/createcustomer\", 
						type : \"POST\",                                  				
						data : $('#customerform').serialize(),                 
						beforeSend:function(){	
							loaderon();   
						},
						success : function(result) {
							console.log(result)
							loaderoff();
							const resultobj = JSON.parse(result);
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
						},error: function(xhr, resp, text) {
							loaderoff();
							
							
						}
					})
					
				})
				$('#refrin').on('blur', function(){
					$.ajax({
                        
						url:\"".URL."customer/showcustomer\", 
						type : \"POST\",                                  				
						data : {refrin: $('#refrin').val(), token: $('#token').val() },                   
						beforeSend:function(){	
							loaderon();   
						},
						success : function(result) {
							
							loaderoff();
							const resultobj = JSON.parse(result);
							console.log(result)
							$('#refrinName').text('Ref. Name : '+resultobj[0]['refname'])
	
						},error: function(xhr, resp, text) {
							loaderoff();
							
							
						}
					})
				})

				$('#clear').on('click', function(){
					$('#customerform').trigger('reset');
				})
			})
		
			</script>
		";
	}
} 