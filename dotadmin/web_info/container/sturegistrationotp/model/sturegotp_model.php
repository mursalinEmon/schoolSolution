<?php
class Sturegotp_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('notice',$data, $onduplicate);
    }
    public function getnotice($conditions){
        
        $fields = array("*", "(select user_name from userbase where login_name=edustudent.xrefno COLLATE utf8_general_ci) as user_name", "DATE_FORMAT(ztime, '%d-%m-%Y %H:%i:%s %p') as xdate");
		//print_r($this->db->select("pabuziness", $fields));die;
		return $this->db->select("edustudent", $fields, $conditions." order by xstudent desc");
    }
	public function getsinglenotice($notice){
        $noticedt = $this->db->select("notice", array('*',"(select xbatchname from batch where bizid=notice.bizid and xbatch=notice.xbatch) as xbatchname", "(select xdesc from seitem where bizid=notice.bizid and xitemcode=notice.xitemcode) as xitemdesc"), " bizid = ".Session::get('sbizid')." and xsl='$notice'");
        return $noticedt;
    }

    public function getCourse(){
		$fields = array("*");
		$where = " bizid = ".Session::get('sbizid')." and xcat = 'Training Courses'";
		return $this->db->select("seitem", $fields, $where);
	}

    public function getSelectBatch($course){
        $trainerdt = $this->db->select("ecomsalesdet", array("xbatch","(select xbatchname from batch where bizid=ecomsalesdet.bizid and xbatch=ecomsalesdet.xbatch) as xbatchname"), " bizid = ".Session::get('sbizid')." and xcus = '".Session::get('suser')."' and xitemcode='".$course."' and xbatch != 'Pending'");
        return $trainerdt;
    }

    public function getTempData($tempsl, $txnid=""){
        $txn = "";
        if($txnid != ""){
            $txn = "and xtxnnum = '".$txnid."'";
        }
        $fields = array("*","(select xpricepur from seitem where bizid=ecomsales_temp.bizid and xitemcode=ecomsales_temp.xitemcode) as xcost","(select xpoint from seitem where bizid=ecomsales_temp.bizid and xitemcode=ecomsales_temp.xitemcode) as xpoint");
		//print_r($this->db->select("pabuziness", $fields));die;
		return $this->db->select("ecomsales_temp", $fields, " bizid = ".Session::get('sbizid')." and xtemsl = '".$tempsl."' ".$txn." and xstatus = 'Created'");
    }

    function getsingleuser($user){
		return $this->db->select("userbase", array(), " login_name='".$user."'");
	}
	
    function getStNo(){
		return $this->db->getStatementNo();
	}

    public function create_sales($data){
		//$this->log->modellog( serialize($data));die;
		$result = $this->db->insert("ecomsalesmst", $data);
				
		return $result;
	}

    public function create_salesdt($dtcols,$dtvals){
		//$this->log->modellog( serialize($data));die;
		
		$result = $this->db->insertmultiple("ecomsalesdet", $dtcols,$dtvals);
				
		return $result;
	}

    public function sponsorcom($adddata){
		
		$result = $this->db->insert("mlmtotrep", $adddata);
		
		return $result;
	}

    public function saveEcomsalesTempLog($tempsl){
		$intocols = "`xtemsl`, `ztime`, `xdate`, `bizid`, `xstudent`, `xstudentmobile`, `xitemcode`, `xprice`, `xqty`, `xref`, `xstatus`, `xdocnum`, `xtxnmobile`, `xtxnnum`, `xoperator`";

		$frmcols = "`xtemsl`, `ztime`, `xdate`, `bizid`, `xstudent`, `xstudentmobile`, `xitemcode`, `xprice`, `xqty`, `xref`, `xstatus`, `xdocnum`, `xtxnmobile`, `xtxnnum`, `xoperator`";

		$where = " where bizid = ". Session::get('sbizid') ." and xtemsl = '". $tempsl ."'";

		return $this->db->insertAsFromSingleTable("ecomsales_temp_deleted", $intocols, $frmcols, "ecomsales_temp", $where);
	}

    public function updateTemp($fields, $where){
			
		return $this->db->dbupdate("ecomsales_temp", $fields, $where);
	}

    public function deleteTemp($tempsl){
        $where = "where bizid = ".Session::get('sbizid')." and xtemsl = '". $tempsl ."'";
		//$this->log->modellog( serialize($data));die;
		return $this->db->dbdelete("ecomsales_temp", $where);
	}

	public function getTempDetails($tempsl){
        
        $fields = array("*", "(select xdesc from seitem where bizid=ecomsales_temp.bizid and xitemcode=ecomsales_temp.xitemcode) as xitemdesc", "(select xstuname from edustudent where bizid=ecomsales_temp.bizid and xstudent=ecomsales_temp.xstudent) as xstuname");
		//print_r($this->db->select("pabuziness", $fields));die;
		return $this->db->select("ecomsales_temp", $fields, " xtemsl = '".$tempsl."'");
    }
}
