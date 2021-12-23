<?php 
class Quotation_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function create_quotation($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		$result = $this->db->insert("soquot", $data, $onduplicate);
				
		return $result;
	}
	public function create_quotationdt($dtcols,$dtvals, $onduplicatedt){
		//$this->log->modellog( serialize($data));die;
		
		$result = $this->db->insertmultiple("soquotdet", $dtcols,$dtvals, $onduplicatedt);
				
		return $result;
	}
	
	function getrow($bizid,$quotno){
		return $this->db->rowincrement($bizid,"soquotdet","xquotnum",$quotno,"xrow");
	}
	function deleteitem($st){
		return $this->db->executecrud($st);
	}
	function getquotno($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getquotautolist($searchstr, $bizid){
		echo json_encode($this->db->select("soquot", array("CONCAT(xquotnum,'|',xcus,'|',xdate) as searchData"), " lower(xcus) like lower('%".$searchstr."%') or lower(xquotnum) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getquotallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("soquot", array("xquotnum as 'PO No',xcus as 'Customer Code',xdate as 'PO Date'"), " lower(xquotnum) like lower('%".$searchstr."%') or lower(xcus) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function getquot($quotno, $bizid){
		return $this->db->select("soquot", array("*,(select xorg from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xorg,(select xadd from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xadd,(select xmobile from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xmobile"),
		"xquotnum='".$quotno."' and bizid=".$bizid."");
	}
	function getallquot($status, $bizid){
		echo json_encode($this->db->select("soquot", array("*,(select xorg from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xorg,(select xadd from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xadd,(select xmobile from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xmobile"),
		"xstatus='".$status."' and bizid=".$bizid.""));
	}
	function getquotdet($quotno, $bizid){
		return $this->db->select("soquotdet", array("*,(select xdesc from seitem where soquotdet.xitemcode=seitem.xitemcode
		and soquotdet.bizid=seitem.bizid) as xitemdesc"),
		"xquotnum='".$quotno."' and bizid=".$bizid."");
	}
	function getitemmaster($bizid,$itemcode){
		$where = " xitemcode='".$itemcode."' and bizid=".$bizid;
		return $this->db->select("seitem",array(),$where);
	}
}