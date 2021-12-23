<?php 
class Salesorder_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function create_sales($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		$result = $this->db->insert("somst", $data, $onduplicate);
				
		return $result;
	}
	public function create_salesdt($dtcols,$dtvals, $onduplicatedt){
		//$this->log->modellog( serialize($data));die;
		
		$result = $this->db->insertmultiple("sodet", $dtcols,$dtvals, $onduplicatedt);
				
		return $result;
	}
	public function executest($st){
		//$this->log->modellog( serialize($data));die;
		return $this->db->executecrud($st);
	}
	
	function getrow($bizid,$sono){
		return $this->db->rowincrement($bizid,"sodet","xsonum",$sono,"xrow");
	}
	function deleteitem($st){
		return $this->db->executecrud($st);
	}
	function getsono($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getsalesautolist($searchstr, $bizid){
		echo json_encode($this->db->select("somst", array("CONCAT(xsonum,'|',xcus,'|',xdate) as searchData"), " lower(xcus) like lower('%".$searchstr."%') or lower(xsonum) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getsalesallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("somst", array("xsonum as 'Order No',xcus as 'Customer Code',xdate as 'Order Date'"), " lower(xsonum) like lower('%".$searchstr."%') or lower(xcus) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getsales($sono, $bizid){
		return $this->db->select("somst", array("*,(select xorg from secus where somst.xcus=secus.xcus
		and somst.bizid=secus.bizid) as xorg,(select xadd from secus where somst.xcus=secus.xcus
		and somst.bizid=secus.bizid) as xadd,(select xmobile from secus where somst.xcus=secus.xcus
		and somst.bizid=secus.bizid) as xmobile"),
		"xsonum='".$sono."' and bizid=".$bizid."");
	}
	function getallsales($status, $bizid){
		echo json_encode($this->db->select("somst", array("*,(select xorg from secus where somst.xcus=secus.xcus
		and somst.bizid=secus.bizid) as xorg,(select xadd from secus where somst.xcus=secus.xcus
		and somst.bizid=secus.bizid) as xadd,(select xmobile from secus where somst.xcus=secus.xcus
		and somst.bizid=secus.bizid) as xmobile"),
		"xstatus='".$status."' and bizid=".$bizid.""));
	}
	function getsalesdet($sono, $bizid){
		return $this->db->select("sodet", array("*,(select xdesc from seitem where sodet.xitemcode=seitem.xitemcode
		and sodet.bizid=seitem.bizid) as xitemdesc"),
		"xsonum='".$sono."' and bizid=".$bizid."");
	}
	function getitemmaster($bizid,$itemcode){
		$where = " xitemcode='".$itemcode."' and bizid=".$bizid;
		return $this->db->select("seitem",array(),$where);
	}
	function getitemcost($bizid,$itemcode){
		$where = " xitemcode='".$itemcode."' and bizid=".$bizid." LIMIT 1";
		return $this->db->select("vitemcost",array("COALESCE(avgcost,0) as xcost"),$where);
	}
}