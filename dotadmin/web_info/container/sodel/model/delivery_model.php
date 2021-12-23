<?php 
class Delivery_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function create_delivery($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		$result = $this->db->insert("imreqdelmst", $data, $onduplicate);
				
		return $result;
	}
	public function create_deliverydt($dtcols,$dtvals, $onduplicatedt){
		//$this->log->modellog( serialize($data));die;
		
		$result = $this->db->insertmultiple("imreqdeldet", $dtcols,$dtvals, $onduplicatedt);
				
		return $result;
	}
	public function executest($st){
		//$this->log->modellog( serialize($data));die;
		return $this->db->executecrud($st);
	}
	
	function getrow($bizid,$sono){
		return $this->db->rowincrement($bizid,"imreqdeldet","xreqdelnum",$sono,"xrow");
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
	function getdeliveryautolist($searchstr, $bizid){
		echo json_encode($this->db->select("imreqdelmst", array("CONCAT(xreqdelnum,'|',xcus,'|',xdate) as searchData"), " lower(xcus) like lower('%".$searchstr."%') or lower(xreqdelnum) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getdeliveryallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("imreqdelmst", array("xreqdelnum as 'Order No',xcus as 'Customer Code',xdate as 'Order Date'"), " lower(xreqdelnum) like lower('%".$searchstr."%') or lower(xcus) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getdelivery($sono, $bizid){
		return $this->db->select("imreqdelmst", array("*,(select xorg from secus where imreqdelmst.xcus=secus.xcus
		and imreqdelmst.bizid=secus.bizid) as xorg,(select xadd from secus where imreqdelmst.xcus=secus.xcus
		and imreqdelmst.bizid=secus.bizid) as xadd,(select xmobile from secus where imreqdelmst.xcus=secus.xcus
		and imreqdelmst.bizid=secus.bizid) as xmobile"),
		"xreqdelnum='".$sono."' and bizid=".$bizid."");
	}
	function getalldelivery($status, $bizid){
		echo json_encode($this->db->select("imreqdelmst", array("*,(select xorg from secus where imreqdelmst.xcus=secus.xcus
		and imreqdelmst.bizid=secus.bizid) as xorg,(select xadd from secus where imreqdelmst.xcus=secus.xcus
		and imreqdelmst.bizid=secus.bizid) as xadd,(select xmobile from secus where imreqdelmst.xcus=secus.xcus
		and imreqdelmst.bizid=secus.bizid) as xmobile"),
		"xstatus='".$status."' and bizid=".$bizid.""));
	}
	function getdeliverydet($sono, $bizid){
		return $this->db->select("imreqdeldet", array("*,(select xdesc from seitem where imreqdeldet.xitemcode=seitem.xitemcode
		and imreqdeldet.bizid=seitem.bizid) as xitemdesc"),
		"xreqdelnum='".$sono."' and bizid=".$bizid."");
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