<?php

class Placement extends Controller{
	
	function __construct(){
		parent::__construct();
		
		$this->view->script = $this->script();

		Session::init();
        if(!Session::get('logedin')){
            header('location: '. URL .'adminlogin');
            exit;
        }
		
	}


	function init(){
	    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
		echo 'placement';
	}

	
}
?>

