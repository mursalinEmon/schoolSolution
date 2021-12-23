<?php 
class Commonop extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function init(){
		echo 'common api';
	}
	
	function codesbytype($type){		
		$this->model->getcodes($type);
	}
	
	
}
