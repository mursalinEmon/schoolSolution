<?php 
class Purchase_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function create_international_po($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		$result = $this->db->insert("pomst", $data, $onduplicate);
				
		return $result;
	}
	public function create_international_podt($dtcols,$dtvals, $onduplicatedt){
		//$this->log->modellog( serialize($data));die;
		
		$result = $this->db->insertmultiple("podet", $dtcols,$dtvals, $onduplicatedt);
				
		return $result;
	}
	
	function getrow($bizid,$pono){
		return $this->db->rowincrement($bizid,"podet","xponum",$pono,"xrow");
	}
	function deleteitem($st){
		return $this->db->executecrud($st);
	}
	function getpono($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getpoautolist($searchstr, $bizid){
		echo json_encode($this->db->select("pomst", array("CONCAT(xponum,'|',xsup,'|',xdate) as searchData"), " lower(xsup) like lower('%".$searchstr."%') or lower(xponum) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getpoallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("pomst", array("xponum as 'PO No',xsup as 'Supplier Code',xdate as 'PO Date'"), " lower(xponum) like lower('%".$searchstr."%') or lower(xsup) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getpo($pono, $bizid){
		echo json_encode($this->db->select("vpodet", array(),
		"xponum='".$pono."' and bizid=".$bizid.""));
	}
}