<?php

class Dbportal extends controller{
    
    private $form="";

    function __construct(){
        parent::__construct();
        $this->view->js = array('views/dbportal/js/tableedit.js','views/dbportal/js/autocomplete.js');
    }
	
    public function portalin(){
		echo "Portal page...";
        //$this->view->render("templatepagelist","dbportal/init");
    }
	public function mypost(){
		//$data = json_decode(file_get_contents("php://input"));
		//Logdebug::appendlog($data->app_name);
		//echo json_encode(array('error'=>'No Error', 'success'=> 'Post success'));
	}
	
}