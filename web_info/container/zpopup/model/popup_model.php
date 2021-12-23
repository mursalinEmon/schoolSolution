<?php 
class Popup_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function acclist($keyid){
		return $this->db->select("tbl_pin_statement", array("pkg_id, pin as ".$keyid ));
	}

	public function userlist($table, $selectfields, $where){
		$userlist = $this->db->select($table, array($selectfields), $where);
		return $userlist;
	}

	
}    
?>