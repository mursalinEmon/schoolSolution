<?php 
class Grn_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function create_grn($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		$result = $this->db->insert("pogrnmst", $data, $onduplicate);
				
		return $result;
	}
	public function create_grndt($dtcols,$dtvals, $onduplicatedt){
		
		$result = $this->db->insertmultiple("pogrndet", $dtcols,$dtvals, $onduplicatedt);
				
		return $result;
	}
	
	function getrow($bizid,$grnno){
		return $this->db->rowincrement($bizid,"pogrndet","xgrnnum",$grnno,"xrow");
	}
	function deleteitem($st){
		return $this->db->executecrud($st);
	}
	public function executest($st){
		//$this->log->modellog( serialize($data));die;
		return $this->db->executecrud($st);
	}
	function getgrnno($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getgrnautolist($searchstr, $bizid){
		echo json_encode($this->db->select("pogrnmst", array("CONCAT(xgrnnum,'|',xsup,'|',xdate) as searchData"), " lower(xsup) like lower('%".$searchstr."%') or lower(xgrnnum) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getgrnallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("pogrnmst", array("xgrnnum as 'GRN No',xsup as 'Supplier Code',xdate as 'GRN Date'"), " lower(xgrnnum) like lower('%".$searchstr."%') or lower(xsup) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getgrn($grnno, $bizid){
		return $this->db->select("pogrnmst", array("*,(select xorg from sesup where pogrnmst.xsup=sesup.xsup
		and pogrnmst.bizid=sesup.bizid) as xorg,(select xadd1 from sesup where pogrnmst.xsup=sesup.xsup
		and pogrnmst.bizid=sesup.bizid) as xadd,(select xmobile from sesup where pogrnmst.xsup=sesup.xsup
		and pogrnmst.bizid=sesup.bizid) as xmobile"),
		"xgrnnum='".$grnno."' and bizid=".$bizid."");
	}
	function getallgrn($status, $bizid){
		echo json_encode($this->db->select("pogrnmst", array("*,(select xorg from sesup where pogrnmst.xsup=sesup.xsup
		and pogrnmst.bizid=sesup.bizid) as xorg,(select xadd from sesup where pogrnmst.xsup=sesup.xsup
		and pogrnmst.bizid=sesup.bizid) as xadd,(select xmobile from sesup where pogrnmst.xsup=sesup.xsup
		and pogrnmst.bizid=sesup.bizid) as xmobile"),
		"xstatus='".$status."' and bizid=".$bizid.""));
	}
	function getgrndet($grnno, $bizid){
		return $this->db->select("pogrndet", array("*,(select xdesc from seitem where pogrndet.xitemcode=seitem.xitemcode
		and pogrndet.bizid=seitem.bizid) as xitemdesc"),
		"xgrnnum='".$grnno."' and bizid=".$bizid."");
	}
	function getitemmaster($bizid,$itemcode){
		$where = " xitemcode='".$itemcode."' and bizid=".$bizid;
		return $this->db->select("seitem",array(),$where);
	}
}