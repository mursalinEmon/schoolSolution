<?php

class Bintransfer_model extends Model{

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
        $params[] = 'BIN Transfer';
		
		return $this->db->dbselectbyparam('crmcharge','*',$conditions,$params);
    }

    function getbininfo($bin){
        
        $conditions[]= "bin = ?";
		$params[]= $bin;
        $result = $this->db->dbselectbyparam('mlmtree','distrisl',$conditions,$params);
		$cond[]= "distrisl = ?";
		$par[]= $result[0]['distrisl'];
		echo json_encode($this->db->dbselectbyparam('mlminfo','xorg as binname',$cond,$par));
	}
    
    function getrindt($rin){
		$conditions[]= "xrdin = ?";
		$params[]= $rin;
		
		return $this->db->dbselectbyparam('mlminfo','xorg as org,distrisl, xmobile as mobile,xrdin',$conditions,$params);
	}
    function getbindt($bin){
		$conditions[]= "bin = ?";
		$params[]= $bin;
		
		return $this->db->dbselectbyparam('mlmtree','leftbin,rightbin,upbin,side',$conditions,$params);
	}

}