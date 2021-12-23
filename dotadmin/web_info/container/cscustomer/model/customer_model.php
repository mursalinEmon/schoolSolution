<?php
class Customer_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	public function createcustomer($data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert("secus", $data);
	}

	function getrindt($rin){
		$conditions[]= "xrdin = ?";
		$params[]= $rin;
		return $this->db->dbselectbyparam('mlminfo','xorg as refname',$conditions,$params);
	}

	function getmybin(){
		return $this->db->select('mlmtree',array("coalesce(min(bin),0) as bin")," distrisl = (select distrisl from mlminfo where xrdin='".Session::get('suser')."')");
	}

	function getcin($cinprefix){
		
		$cinlast = $this->db->select('secus',array("coalesce(count(xcus),0)+1 as cinlast")," zemail='".Session::get('suser')."'");

		return $cinprefix."-".str_pad((string)$cinlast[0]['cinlast'],5,"0",STR_PAD_LEFT);
	}
	
}
