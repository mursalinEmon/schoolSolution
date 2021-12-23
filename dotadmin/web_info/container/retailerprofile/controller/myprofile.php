<?php

class Myprofile extends Controller{
	private $formfield=array();
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
		$this->view->myprofile = array();
		if(Session::get('slogintype') == "Admin"){
			$this->view->myprofile = $this->model->getmyadminprofile(); 
		}elseif(Session::get('slogintype') == "Teacher"){
			$this->view->myprofile = $this->model->getmyteacherprofile();
		}
		    
		$this->view->render("templateadmin","abr/myprofile_view");
		
	}
	
	function changepassword(){
		
		
		try{
			
			
			if($_POST['currentpass']==""){
				
					throw new Exception(serialize(array('field'=>'Current Password', 'response'=>' can not be empty!')));
				
			}
			
			$currentpass = Hash::create('sha256',$_POST['currentpass'],HASH_KEY);
			if(Session::get('slogintype') == "Admin"){
				$checkpassword = $this->model->checkAdmonPassword($currentpass);
			}elseif(Session::get('slogintype') == "Teacher"){
				$checkpassword = $this->model->checkTeacherPassword($currentpass);
			}else{
				throw new Exception(serialize(array('result'=>'error','field'=>'User', 'response'=>' not found!')));
				exit;
			}
			
			if(!$checkpassword){
				throw new Exception(serialize(array('result'=>'error','field'=>'Current password', 'response'=>' did not match!')));
			}
			
			
			$newpass = Hash::create('sha256',$_POST['newpass'],HASH_KEY);
			if(Session::get('slogintype') == "Admin"){
				$success = $this->model->changeAdminpass($newpass, $currentpass);
			}elseif(Session::get('slogintype') == "Teacher"){
				$success = $this->model->changeTeacherpass($newpass, $currentpass);
			}
			

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
                        
						url:\"".URL."retailerprofile/changepassword\", 
						type : \"POST\", 
						dataType: \"json\",                                 				
						data : {currentpass: $('#currentpass').val(),newpass: $('#newpass').val()},             
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