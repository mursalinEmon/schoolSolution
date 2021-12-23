<?php
class Crmopper_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	
	//LEAD MANGEMENT/////////////////////
	public function createoppertunity($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("crmoppertunity", $data, $onduplicate);
	}
	public function createcustomer($data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("secus", $data);
	}
	
	public function getlead($lead, $bizid){
		return $this->db->select("crmlead", array(), 
		" xlead='".$lead."' and bizid=".$bizid."");
	}
	
	public function dbexecute($st){
		//$this->log->modellog( serialize($data));die;
		return $this->db->executecrud($st);
	}
	function getcode($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getopperbymobile($mobile, $bizid){
		return $this->db->select("vcrmoppertunity", array(), 
		" xmobile='".$mobile."' and bizid=".$bizid."");
	}
	function getopperbycode($code, $bizid){
		echo json_encode($this->db->select("vcrmoppertunity", array(), " xoppersl='".$code."' and bizid=".$bizid.""));
	}
	function getleadbycode($code, $bizid){
		echo json_encode($this->db->select("crmlead", array(), " xlead='".$code."' and bizid=".$bizid.""));
	}
	function getopperautolist($searchstr, $bizid){
		echo json_encode($this->db->select("vcrmoppertunity", array("CONCAT(xoppersl,'|',xlead,'|',xorg,'|',COALESCE(xadd,''),'|',COALESCE(xmobile,'')) as searchData"), " xstatus='Open' and lower(xorg) like lower('%".$searchstr."%') or lower(xlead) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getopperallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("vcrmoppertunity", array("xoppersl as 'Oppertunity No',xlead as 'Lead Code',xorg as 'Lead Name',xadd as Address,xmobile as Mobile"), " xstatus='Open' and lower(xorg) like lower('%".$searchstr."%') or lower(xorg) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getopperlist($bizid){
		echo json_encode($this->db->select("vcrmoppertunity", array(), " xstatus='Open'"));
	}
	
}
