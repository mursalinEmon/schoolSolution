<?php 
class Inventory_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	function getimstock($bizid){
		echo json_encode($this->db->select("vimstock", array(), " bizid=".$bizid.""));
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
}