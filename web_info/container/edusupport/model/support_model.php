<?php
class Venumaster_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	public function create($table,$data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert($table, $data);
	}
	
	function disburseupdate($table,$data, $where){
    
        return $this->db->dbupdate($table,$data, $where);
	}
	
	function getcusdt($cus){
		$conditions[]= "xcus = ?";
		$params[]= $cus;
		return $this->db->dbselectbyparam('secus','xcus as cus,xrdin as rin, xorg as cusname, xadd1 as address, xmobile as mobile',$conditions,$params);
	}

	
	function pointbal($cus){
		return $this->db->select('mlmbv',array("coalesce(sum(point*xsign), 0) as pointbal")," xcus = '".$cus."'");
	}

	
}
