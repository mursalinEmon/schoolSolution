<?php
class Crmwp_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	
	//LEAD MANGEMENT/////////////////////
	
	public function executedb($data, $where){
		//$this->log->modellog( serialize($data));die;
		return $this->db->dbupdate("crmlead", $data, $where);
	}
	
	function getcode($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	
	function getquotbycode($code, $bizid){
		echo json_encode($this->db->select("soquot s", array("xquotnum,xcus,(select xorg from secus where s.xcus=secus.xcus and s.bizid=secus.bizid) as xorg"), " xquotnum='".$code."' and bizid=".$bizid.""));
	}
	
	function getprogresslist($quotnum,$bizid){
		echo json_encode($this->db->select("crmworkprogress", array("*, DATE_FORMAT(xdate,'%d-%m-%Y') as xdate"), " xquotnum='".$quotnum."' and bizid=".$bizid." order by xwsl desc"));
	}
	
	/////////////////END////////////////
	////INTERACTION MANAGEMENT///////////
	
	public function createwp($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("crmworkprogress", $data, $onduplicate);
	}
	
	////////////END///////////////
	
}
