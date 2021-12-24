<?php

class Myprofile extends Controller{
	private $formfield=array();
	function __construct(){
		parent::__construct();
		
		$this->view->script=$this->script();
		Session::init();
        if(!Session::get('loggedIn')){
            header('location: '. URL .'studentlogin');
            exit;
        }
	}
	function init(){
	    
		$this->view->myprofile = $this->model->getmyprofile(); 
		
		$this->view->render("dashboard","abr/myprofile_view");
		
	}
	
	function changepassword(){
		$success = 0;
		
		try{
			
			
			if($_POST['currentpass']==""){
				
					throw new Exception(serialize(array('field'=>'Current Password', 'response'=>' can not be empty!')));
				
			}
			
			$currentpass = Hash::create('sha256',$_POST['currentpass'],HASH_KEY);
			
			$checkpassword = $this->model->checkPassword($currentpass);
			
			if(!$checkpassword){
				throw new Exception(serialize(array('result'=>'error','field'=>'Current password', 'response'=>' did not match!')));
			}
			
			if($_POST['newpass'] != $_POST['confirmpass']){
				throw new Exception(serialize(array('result'=>'error','field'=>'New password and confirm password', 'response'=>' did not match!')));
			}
			
			$newpass = Hash::create('sha256',$_POST['newpass'],HASH_KEY);
			
			$success = $this->model->changepass($newpass, $currentpass);

			if($success>0){				
				
				echo json_encode(array('result'=>'success','message'=>' Password successfully changed!'));
			}
			else{	
				echo json_encode(array('result'=>'error','message'=>'Unable to change password!'));
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

				$('#btnchangepass').on('click', function(e){
					e.preventDefault();
					$.ajax({
                        
						url:\"".URL."studentprofile/changepassword\", 
						type : \"POST\", 
						dataType: \"json\",                                 				
						data : {currentpass: $('#currentpass').val(),newpass: $('#newpass').val(),confirmpass: $('#confirmpass').val()},             
						beforeSend:function(){	
							loaderon();   
							
						},
						success : function(result) {
							//console.log(result)
							loaderoff();
							if(result.result=='success'){
								toastr.success(result.message);						
							}

							if(result.result=='error'){
								toastr.error(result.message);                               
							}

							if(result.result=='fielderror'){
								toastr.error(result.message);                               
							}

						},error: function(xhr, resp, text) {
							loaderoff();
							
						}
					})
				})
	
				
				$('#frmprofilepass').validate({
					rules: {
						currentpass: {
							required: true
						},
						newpass: {
							required: true,
							minlength: 6	
						},
						confirmpass: {
							required: true,
							minlength: 6,
							equalTo: '#newpass'	
						}
					},
					messages: { 
						currentpass:{
							required: 'Please enter current password'							
						},
						newpass:{
							required: 'Please enter new password',
							minlength: 'Please enter minimum 6 character'
						},
						confirmpass:{
							required: 'Please enter confirm password',
							minlength: 'Please enter minimum 6 character',
							equalTo: 'New password and confirm password did not match'	
						}
					},
					errorElement: 'em',
					errorPlacement: function ( error, element ) {
                    
						error.addClass( 'input-group help-block text-danger' );
	
						if ( element.prop( 'type' ) === 'checkbox' ) {
							error.insertAfter( element.parent( 'label' ) );
						} else {
							error.insertAfter( element );
						}
					},
				})
					
			})
		</script>
		";
	}
} 