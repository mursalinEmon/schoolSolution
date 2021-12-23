<?php 
class Commonop_Model extends Model{
	function __construct(){
		parent::__construct();
	}

	public function getcodes($type){
		echo json_encode($this->db->select("vsecodes", array("xcode as code"), " xcodetype='$type'"));
	}
	
}
