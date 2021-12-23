<?php
class Pointupload_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	public function uploadmybv($data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("mlmbv", $data);
	}

	function updatetree($st){
		return $this->db->executecrud($st);
	}

	function getrindt($rin){
		$conditions[]= "xrdin = ?";
		$params[]= $rin;
		return $this->db->dbselectbyparam('mlminfo','xorg as refname',$conditions,$params);
	}

	function getbinlist(){
		return $this->db->select('mlmtree',array("bin")," distrisl = '".Session::get('sdistrisl')."'");
	}

	function pointbal(){
		return $this->db->select('mlmbv',array("coalesce(sum(point*xsign), 0) as pointbal")," xcus = '".Session::get('scin')."'");
	}

	function getmybin($bin){
		return $this->db->select('mlminfo',array("xrdin,xcus")," distrisl = (select distrisl from mlmtree where bin=".$bin." and distrisl='".Session::get('sdistrisl')."')");
	}

	function bininfo($bin){
		return $this->db->select('mlmtree',array("binpoint,centerpoint"), " distrisl=".Session::get('sdistrisl')." and bin=".$bin);
	}
	function checkupload($bin){
		return $this->db->select('mlmbv',array("bin"), " stno='".$this->getSatementNo()."' and bin='".$bin."'");
	}
	function getcin($cinprefix){
		
		$cinlast = $this->db->select('secus',array("coalesce(count(xcus),0) as cinlast")," zemail='".Session::get('suser')."'");

		return $cinprefix."-".str_pad((string)$cinlast[0]['cinlast'],5,"0",STR_PAD_LEFT);
	}
	function getSatementNo(){
		return $this->db->getStatementNo();
	}
}
