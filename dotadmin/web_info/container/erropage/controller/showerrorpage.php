<?php

class Showerrorpage extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	public function showerror(){ 
		$this->view->render("templatedir","showerrorpage/init404",true);
	}
}