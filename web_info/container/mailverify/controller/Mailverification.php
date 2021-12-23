<?php
class Mailverification extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	//function init(){echo 'working';}
	public function verify($email, $token){
		if(count($this->model->getdata($email, $token))>0){
			$where = "zemail='".$email."'";
			if($this->model->updateuser($where)){
				echo "Email verification done! Thanks!";
			}else{
				echo "Sorry! invalid token!";
			}
		}
	}
}