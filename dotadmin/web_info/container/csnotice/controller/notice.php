<?php

class Notice extends Controller{
	
	function __construct(){
		parent::__construct();
		$this->view->script = "";
	}
	function init(){
		$this->view->curnotice = $this->model->newnoticelist();
		$this->view->render("templateadmin","abr/notice_view");
		
	}
	
	
} 