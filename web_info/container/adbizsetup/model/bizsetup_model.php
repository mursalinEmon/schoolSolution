<?php 
class Bizsetup_Model extends Model{
	function __construct(){
		parent::__construct();
	}

	public function items($item){
		return $this->db->select("glchart", array("xacc as 'Account Code', xdesc as 'Description', xacctype as 'Account Type'
		,xaccsource as 'Account Source',xaccusage as 'Account Usage', 100 as 'Amount', 22 as 'Discount'"), " lower(xdesc) like lower('%".$item."%') and bizid=100");
	}

	public function acclist($acc){
		return $this->db->select("glchart", array("xacc as data, xdesc as value"), " lower(xdesc) like lower('%".$acc."%') and bizid=100");
	}
}