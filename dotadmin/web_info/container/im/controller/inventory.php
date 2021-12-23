<?php 
class Inventory extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function init(){
		echo "Inventory initiated...";
	}
			
	
	
	
	function imstock($token){
		$roldet = $this->model->getroledt($token);
		if(count($roldet)===0){
			echo json_encode(array('result'=>'error','response'=>'Token Mismatch!','message'=>''));
			exit;
		}
				
		
		$this->model->getimstock($roldet[0]["bizid"]);
	}
	
	
}