<?php
class Interaction_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	
	
	public function createinteraction($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("crminteraction", $data, $onduplicate);
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
	function getinteractionbyopper($code, $bizid){
		echo json_encode($this->db->select("crmlead", array(), " xlead='".$code."' and bizid=".$bizid.""));
	}
	function getinteractionbysl($sl, $bizid){
		echo json_encode($this->db->select("crminteraction", array(), " xintsl=".$sl." and bizid=".$bizid));
	}
	
	function getinteractionlist($sl, $bizid){
		echo json_encode($this->db->select("crminteraction", array(), " xoppersl=".$sl." and bizid=".$bizid." order by xintsl desc"));
	}
	
	function getinteraction($sl, $bizid){
		echo json_encode($this->db->select("crminteraction c", array("*,
		(select xorg from crmlead where c.xlead=crmlead.xlead and c.bizid=crmlead.bizid) as xorg,
		(select xmobile from crmlead where c.xlead=crmlead.xlead and c.bizid=crmlead.bizid) as xmobile"), " xintsl=".$sl." and bizid=".$bizid));
	}
	
}
