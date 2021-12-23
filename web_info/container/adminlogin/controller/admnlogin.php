<?php 
	class Admnlogin extends controller{

		function __construct(){
	        parent::__construct();
	       
	    }

	    function init($biz=""){
			if ($this->model->getBizness($biz)==""){
				header ('location: '.URL);
								
			}else{
				$this->view->bizness = $this->model->getBizness($biz);				
				$this->view->render("templatelogin","adminlogin/init");
			}
	    	
		}
		
		function login(){
			
			$this->model->checklogin();
		}

		

	}

?>