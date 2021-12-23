<?php
class Supplier_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	public function create($data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("sesup", $data);
	}
	public function update($data, $where){
		//$this->log->modellog( serialize($data));die;
		return $this->db->dbupdate("sesup", $data, $where);
	}
	public function dbdelete($st){
		//$this->log->modellog( serialize($data));die;
		return $this->db->executecrud($st);
	}
	function getsuppliercode($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getsupplierbycode($code, $bizid){
		echo json_encode($this->db->select("sesup", array(), " xsup='".$code."' and bizid=".$bizid.""));
	}
	function getsupautolist($searchstr, $bizid){
		echo json_encode($this->db->select("sesup", array("CONCAT(xsup,'|',xorg,'|',xadd1) as searchData"), " lower(xorg) like lower('%".$searchstr."%') or lower(xsup) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getsupallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("sesup", array("xsup as 'Supplier Code',xorg as 'Supplier Name',xadd1 as Address,xmobile as Mobile"), " lower(xorg) like lower('%".$searchstr."%') or lower(xsup) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getsupplierlist($bizid){
		echo json_encode($this->db->select("sesup", array(), " bizid=".$bizid." order by xsupsl desc"));
	}
}
