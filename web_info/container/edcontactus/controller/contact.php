<?php 
class Contact extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->script = "";
    }

    function init(){
        $this->view->business = $this->model->getbusiness();
		$this->view->category = $this->model->getcategories();
        $this->view->render("webtemplate","dotschoolview/contact");
    }
}