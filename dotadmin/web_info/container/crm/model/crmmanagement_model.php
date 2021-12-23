<?php
class Crmmanagement_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	
	//LEAD MANGEMENT/////////////////////
	public function create($data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("crmlead", $data);
	}
	public function update($data, $where){
		//$this->log->modellog( serialize($data));die;
		return $this->db->dbupdate("crmlead", $data, $where);
	}
	public function dbdelete($st){
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
	function getleadbymobile($mobile, $bizid){
		return $this->db->select("crmlead", array(), " xmobile='".$mobile."' and bizid=".$bizid."");
	}
	function getleadbycode($code, $bizid){
		echo json_encode($this->db->select("crmlead", array(), " xlead='".$code."' and bizid=".$bizid.""));
	}
	function getleadautolist($searchstr, $bizid){
		echo json_encode($this->db->select("crmlead", array("CONCAT(xlead,'|',xorg,'|',xadd,'|',xmobile) as searchData"), " lower(xorg) like lower('%".$searchstr."%') or lower(xlead) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getleadallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("crmlead", array("xlead as 'Lead Code',xorg as 'Lead Name',xadd as Address,xmobile as Mobile"), " lower(xorg) like lower('%".$searchstr."%') or lower(xlead) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getleadlist($bizid){
		echo json_encode($this->db->select("crmlead", array(), " bizid=".$bizid." order by xleadsl desc"));
	}
	
	/////////////////END////////////////
	////INTERACTION MANAGEMENT///////////
	
	public function createinteraction($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("crminteraction", $data, $onduplicate);
	}
	
	////////////END///////////////
	
}
