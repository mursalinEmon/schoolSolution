<?php
class Stusmview_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
    function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('support_answer',$data, $onduplicate);
    }
    public function getnotice($conditions){
        return $this->db->select("studymaterial",array("*", "DATE_FORMAT(xdate, '%d-%m-%Y') as xdate"),$conditions." order by xsl desc");
    }

    public function updateTemp($fields, $where){
			
		return $this->db->dbupdate("homework_submit", $fields, $where);
	}
	
	public function getCourse(){
		$fields = array("xitemcode", "(select xdesc from seitem where bizid=ecomsalesdet.bizid and xitemcode=ecomsalesdet.xitemcode) as xdesc");
		$where = " bizid = ".Session::get('sbizid')." and xcus = '".Session::get('suser')."'";	
		return $this->db->select("ecomsalesdet", $fields, $where);
	}

    public function getSelectBatch($course){
        $trainerdt = $this->db->select("ecomsalesdet", array("xbatch","(select xbatchname from batch where bizid=ecomsalesdet.bizid and xbatch=ecomsalesdet.xbatch) as xbatchname"), " bizid = ".Session::get('sbizid')." and xcus = '".Session::get('suser')."' and xitemcode='".$course."' and xbatch != 'Pending'");
        return $trainerdt;
    }

    public function fetchSubjects($student){
        $subjects = $this->db->select("batch", array("xsubname,xsubcode"), " bizid = ".Session::get('sbizid')." and xversion = '".$student['xversion']."' and xshift = '".$student['xshift']."' and xsection = '".$student['xsection']."' and xsession = '".$student['xsession']."' and xclass = '".$student['xclass']."'  and zactive = '1'");
        return $subjects;
    }
    public function fetchStudent($studentid){
        $Student = $this->db->select("eduenroll", array("xversion, xshift, xsection, xsession, xclass, xroll"), " bizid = ".Session::get('sbizid')." and xstudentid = '".$studentid."' and xflag='Live' and zactive = '1'");
        return $Student;
    }
    public function findstudymaterial($subject,$student){
        $classes = $this->db->select("studymaterial", array("*"), " bizid = ".Session::get('sbizid')." and xversion = '".$student['xversion']."' and xshift = '".$student['xshift']."' and xsection = '".$student['xsection']."' and xsession = '".$student['xsession']."' and xclass = '".$student['xclass']."' and xitemcode = $subject");
        return $classes;
    }
	
}
