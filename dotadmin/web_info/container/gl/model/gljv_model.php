<?php 
class Gljv_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function create_voucher($data, $onduplicate){
		//$this->log->modellog( serialize($data));die;
		$result = $this->db->insert("glheader", $data, $onduplicate);
				
		return $result;
	}
	public function create_voucherdt($dtcols,$dtvals, $onduplicatedt){
		//$this->log->modellog( serialize($data));die;
		
		$result = $this->db->insertmultiple("gldetail", $dtcols,$dtvals, $onduplicatedt);
				
		return $result;
	}
	
	function getrow($bizid,$voucherno){
		return $this->db->rowincrement($bizid,"gldetail","xvoucher",$voucherno,"xrow");
	}
	function deleteitem($st){
		return $this->db->executecrud($st);
	}
	function getvoucherno($bizid,$table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($bizid,$table,$keyfield,$prefix,$num);
	}
	function getroledt($token){
		//$this->log->modellog(serialize($this->db->getroledtfromdb($token)));die;
		return $this->db->getroledtfromdb($token);
	}
	function getjvautolist($searchstr, $bizid){
		echo json_encode($this->db->select("glheader", array("CONCAT(xvoucher,'|',xnarration,'|',xdate) as searchData"), " lower(xnarration) like lower('%".$searchstr."%') or lower(xvoucher) like lower('%".$searchstr."%') and bizid=".$bizid." LIMIT 10"));
	}
	function getjvallautolist($searchstr, $bizid){
		echo json_encode($this->db->select("glheader", array("xvoucher as 'Voucher No',xnarration as 'Narration',xdate as 'Voucher Date'"), " lower(xvoucher) like lower('%".$searchstr."%') or lower(xnarration) like lower('%".$searchstr."%') and bizid=".$bizid.""));
	}
	function accdt($acc, $bizid){
		echo json_encode($this->db->select("glchart", array(),
		"xacc='".$acc."' and bizid=".$bizid.""));
	}
	function getglheader($vno, $bizid){
		return $this->db->select("gldetailview", array(),
		"xvoucher='".$vno."' and bizid=".$bizid." LIMIT 1");
	}
	function getallquot($status, $bizid){
		echo json_encode($this->db->select("soquot", array("*,(select xorg from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xorg,(select xadd from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xadd,(select xmobile from secus where soquot.xcus=secus.xcus
		and soquot.bizid=secus.bizid) as xmobile"),
		"xstatus='".$status."' and bizid=".$bizid.""));
	}
	function getgldetail($vno, $bizid){
		return $this->db->select("gldetailview", array(),
		"xvoucher='".$vno."' and bizid=".$bizid."");
	}
	function getaccdetail($bizid,$acc){
		$where = " xacc='".$acc."' and bizid=".$bizid;
		return $this->db->select("glchart",array(),$where);
	}
}