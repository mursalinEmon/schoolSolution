<?php
class Stunotice_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('notice',$data, $onduplicate);
    }
    public function getnotice($itemcode,$batchid){
        
        $fields = array("*", "SUBSTRING(xdescription,1,100) as xdescription", "(select xdesc from seitem where bizid=notice.bizid and xitemcode=notice.xitemcode) as xitemdesc", "(select xbatchname from batch where bizid=notice.bizid and xbatch=notice.xbatch) as xbatchname");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ".Session::get('sbizid')." and xitemcode = '".$itemcode."' and xbatch = '". $batchid ."'";	
		return $this->db->select("notice", $fields, $where);
    }
	public function getsinglenotice($notice){
        $noticedt = $this->db->select("notice", array('*',"(select xclass from batch where bizid=notice.bizid and xclass=notice.xclass and xsubcode=notice.xitemcode and xsection=notice.xsection and xsession=notice.xsession and xshift=notice.xshift) as xclass", "(select xsubname from edusubject where bizid=notice.bizid and xsubcode=notice.xitemcode and xsection=notice.xsection and xsession=notice.xsession and xshift=notice.xshift) as xitemcode"), " xsl='$notice'");
        return $noticedt;
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
    public function findnotice($subject,$student){
        $classes = $this->db->select("notice", array("*"), " bizid = ".Session::get('sbizid')." and xversion = '".$student['xversion']."' and xshift = '".$student['xshift']."' and xsection = '".$student['xsection']."' and xsession = '".$student['xsession']."' and xclass = '".$student['xclass']."' and xitemcode = $subject");
        return $classes;
    }
    
    public function fetchStudent($studentid){
        $Student = $this->db->select("eduenroll", array("xversion, xshift, xsection, xsession, xclass, xroll"), " bizid = ".Session::get('sbizid')." and xstudentid = '".$studentid."' and xflag='Live' and zactive = '1'");
        return $Student;
    }
}
