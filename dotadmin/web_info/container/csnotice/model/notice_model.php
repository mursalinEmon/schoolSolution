<?php
class Notice_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	

	function newnoticelist(){
		$conditions[]= "xvaliddate >= ?";
		$params[]= date('Y-m-d');
		
		return $this->db->dbselectbyparam('notice','xsl,xgroup,xtitle, xdate, xvaliddate',$conditions,$params);
	}

	function noticelist(){

	}
	
}
