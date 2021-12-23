<?php
class Customer_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	public function create($data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("secus", $data);
	}
	public function update($data, $where){
		//$this->log->modellog( serialize($data));die;
		return $this->db->dbupdate("secus", $data, $where);
	}
	public function dbdelete($st){
		//$this->log->modellog( serialize($data));die;
		return $this->db->executecrud($st);
	}
	function getcustomercode($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getcustomerbymobile($mobile, $bizid){
		return $this->db->select("secus", array(), " xmobile='".$mobile."' and bizid=".$bizid."");
	}
	function getcustomerbycode($code, $bizid){
		echo json_encode($this->db->select("secus", array(), " xcus='".$code."' and bizid=".$bizid.""));
	}
	function getcusautolist($searchstr, $bizid){
		echo json_encode($this->db->select("secus", array("CONCAT(xcus,'|',xorg,'|',xadd) as searchData"), " lower(xorg) like lower('%".$searchstr."%') or lower(xcus) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getcusallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("secus", array("xcus as 'Customer Code',xorg as 'Customer Name',xadd as Address,xmobile as Mobile"), " lower(xorg) like lower('%".$searchstr."%') or lower(xcus) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getcustomerlist($bizid){
		echo json_encode($this->db->select("secus", array(), " bizid=".$bizid." order by xcussl desc"));
	}
}
