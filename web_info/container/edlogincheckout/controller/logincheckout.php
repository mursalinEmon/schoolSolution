<?php 
class Logincheckout extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->script = "";
        Session::init();
			$logged = Session::get('loggedIn');
			if($logged){
				
				header('location: '.URL.'checkout');
				exit;
			}
    }
 
    function init($result="Login to Enroll Course"){
       // $this->view->business = $this->model->getbusiness();
       // $this->view->category = $this->model->getcategories();
        $this->view->result = $result;
        $this->view->render("studentlogin","dotschoolview/logincheckout_view");
    } 

    function login(){
       // Logdebug::appendlog($_POST["username"]);
        $this->model->checklogin();
    }

    function script(){
        return "";
    }
}