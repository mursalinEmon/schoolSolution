<?php
class Cusactivate_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	public function activatecustomer($table,$data, $where){
		//$this->log->modellog( serialize($data));die;
		return $this->db->dbupdate($table, $data, $where);
	}

	public function save($table, $data){
		//$this->log->modellog( serialize($data));die;
		return $this->db->insert($table, $data);
	}

	function getcindt($cin){
		//$this->log->modellog( serialize($cin));
		$conditions[]= "xcus = ?";
		$params[]= $cin;
		return $this->db->dbselectbyparam('secus','xorg as refname, xrdin as refrin, xmobile as mobile',$conditions,$params);
	}

	function ismycard($card){
		//$this->log->modellog( serialize($cin));
		$conditions[]= "cardnumber = ?";
		$conditions[]= "xrdin = ?";
		$conditions[]= "xsign = ?";
		$params[]= $card;
		$params[]= Session::get('suser');
		$params[]= 1;

		return $this->db->dbselectbyparam('cashbacktxn','*',$conditions,$params);
	}

	function activation(){
        echo json_encode($this->db->select("cashbackcardused m, secus c",array("m.xcard as cardno,m.xcus as cin,
        c.xorg as cusname,c.xadd1 as cusadd,c.xmobile as mobile, xcardrefrin as refrin")," m.xusedby='".Session::get('suser')."' and m.xcus = c.xcus order by m.xcard"));
    }

	function getrindt($rin){
		//$this->log->modellog( serialize($cin));
		$conditions[]= "xrdin = ?";
		$params[]= $rin;
		return $this->db->dbselectbyparam('mlminfo','*',$conditions,$params);
	}

	function mycardlist(){
		$conditions[]= "xrdin = ?";
		$conditions[]= "xsign = ?";
		$params[]= Session::get('suser');
		$params[]= 1;
		return $this->db->dbselectbyparam('cashbacktxn','cardnumber as cardno',$conditions,$params);
	}

	function getSatementNo(){
		return $this->db->getStatementNo();
	}
	
}
