<?php 
	class Adminhome extends controller{

		function __construct(){
	        parent::__construct();
	       
	    }

	    function init(){
	    	$bizness = $this->model->bizlist();
			$this->view->bizness=$bizness;
	    	$this->view->render("templatedir","manageadmin/init");
	    }

	}

?>