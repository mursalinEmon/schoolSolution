<?php 
class Teacherlogin extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->script = "";
    }
 
    function init(){
        $this->view->business = $this->model->getbusiness();
		$this->view->category = $this->model->getcategories();
        $this->view->render("webtemplate","dotschoolview/teacherlogin_view");
    } 

    function login(){
        //Logdebug::appendlog($_POST["username"]);
        $this->model->checklogin();
    }

    function script(){
        return "";
    }
}