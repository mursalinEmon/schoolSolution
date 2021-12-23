<?php

class Disburseupd_model extends Model{

    function __construct(){
        parent::__construct();
        
    }

    function disburseupdate($table,$data, $where){
        //$this->log->modellog( serialize($data));
        return $this->db->dbupdate($table,$data, $where);
	}
    
    function gettxn($sl, $otp){
        $conditions[]= "xsl = ?";
        $conditions[]= "xotp = ?";
        $conditions[]= "zactive = ?";
        $conditions[]= "xdoctype = ?";
        $params[]= $sl;
        $params[]= $otp;
        $params[] = '0';
        $params[] = 'Disbursement Account Update';
		
		return $this->db->dbselectbyparam('crmcharge','*',$conditions,$params);
    }
    
    function getrindt($rin){
		$conditions[]= "xrdin = ?";
		$params[]= $rin;
		
		return $this->db->dbselectbyparam('mlminfo','xorg as org, xmobile as mobile,xrdin',$conditions,$params);
	}

}