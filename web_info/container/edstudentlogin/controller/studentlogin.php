<?php 
class Studentlogin extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->script = "";
        Session::init();
			$logged = Session::get('loggedIn');
			if($logged){
				
				header('location: '.URL.'dashboard');
				exit;
			}
    }
 
    function init(){
        //$this->view->business = $this->model->getbusiness();
		//$this->view->category = $this->model->getcategories();
        $this->view->render("studentlogin","dotschoolview/studentlogin_view");
    } 

    function login(){
        //Logdebug::appendlog($_POST["username"]);
        $this->model->checklogin();
    }

    function script(){
        return "";
    }
}