<?php 
class Ecomorder_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function create_sales($data){
		//$this->log->modellog( serialize($data));die;
		$result = $this->db->insert("ecomsalesmst", $data);
				
		return $result;
	}
	public function create_salesdt($dtcols,$dtvals){
		//$this->log->modellog( serialize($data));die;
		
		$result = $this->db->insertmultiple("ecomsalesdet", $dtcols,$dtvals);
				
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
	function getallsales($bizid, $user){
		echo json_encode($this->db->select("ecomsalesmst", array("xecomsl,xdate,(select COALESCE(sum(xqty*xrate),0) from ecomsalesdet where ecomsalesmst.xecomsl=ecomsalesdet.xecomsl
		) as xtotalamt,(select COALESCE(sum(xqty),0) from ecomsalesdet where ecomsalesmst.xecomsl=ecomsalesdet.xecomsl
		) as xtotalqty"),
		" bizid=".$bizid." and zemail='".$user."' order by ztime desc"));
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
	
	function getPwalletbalance($xrdin){
		return $this->db->getPwalletBal($xrdin);
	}
	function comBal($xrdin){
		echo json_encode($this->db->getCommissionBal($xrdin));
	}
	function getStNo(){
		return $this->db->getStatementNo();
	}
}