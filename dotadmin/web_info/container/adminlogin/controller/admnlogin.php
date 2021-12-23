<?php 
	class Admnlogin extends controller{

		function __construct(){
	        parent::__construct();
	       Session::init();
	    }

	    function init(){
			
			if(Session::get('logedin')){
				
				header('location: '. URL .'mainmenu');
				exit;
			}else{
				//$this->view->bizness = $this->model->getBizness();				
				$this->view->render("templatelogin","adminlogin/init");
			}
				
			
		}
		
		function login(){
			$bizid = $_POST['bizid'];
			$type =  $_POST['logintype'];
			$this->model->checklogin($bizid, $type);
		}

		

	}

?>