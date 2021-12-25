<?php
class Homeworksubmit_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($cols, $vals, $onduplicateupdt){
        //$this->log->modellog( serialize($data));
        return $this->db->insertmultiple('homework_submit',$cols, $vals, $onduplicateupdt);
    }
    public function getnotice($conditions,$params){
        return $this->db->dbselectbyparam("homework_questions","*, DATE_FORMAT(xdate, '%d/%m/%Y') as xdate, DATE_FORMAT(xduedate, '%d/%m/%Y') as xduedate, SUBSTRING(xdescription,1,100) as xdescription, (select xdesc from seitem where bizid=homework_questions.bizid and xitemcode=homework_questions.xitemcode) as xitemdesc, (select xbatchname from batch where bizid=homework_questions.bizid and xbatch=homework_questions.xbatch) as xbatchname",$conditions,$params);
    }
	public function getsinglenotice($notice){
        $noticedt = $this->db->select("homework_questions", array('*',"DATE_FORMAT(xdate, '%m/%d/%Y') as xdate" ,"DATE_FORMAT(xduedate, '%m/%d/%Y') as xduedate","(select xbatchname from batch where bizid=homework_questions.bizid and xbatch=homework_questions.xbatch) as xbatchname", "(select xdesc from seitem where bizid=homework_questions.bizid and xitemcode=homework_questions.xitemcode) as xitemdesc"), " xquesid='$notice'");
        return $noticedt;
    }

    public function getsinglesubmithw($quesid){
        $hwsubmit = $this->db->select("homework_submit", array('*'), " bizid = ".Session::get('sbizid')." and xquesid='$quesid'");
        return $hwsubmit;
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
    public function findhomework($subject,$student){
        $homework = $this->db->select("homework_questions", array("*"), " bizid = ".Session::get('sbizid')." and xversion = '".$student['xversion']."' and xshift = '".$student['xshift']."' and xsection = '".$student['xsection']."' and xsession = '".$student['xsession']."' and xclass = '".$student['xclass']."' and xitemcode = $subject");
        return $homework;
    }
    
    public function fetchStudent($studentid){
        $Student = $this->db->select("eduenroll", array("xversion, xshift, xsection, xsession, xclass, xroll"), " bizid = ".Session::get('sbizid')." and xstudentid = '".$studentid."' and xflag='Live' and zactive = '1'");
        return $Student;
    }
	public function gethmdetails($notice){
        $hhomework = $this->db->select("homework_questions", array('*',"(select xclass from batch where bizid=homework_questions.bizid and xclass=homework_questions.xclass and xsubcode=homework_questions.xitemcode and xsection=homework_questions.xsection and xsession=homework_questions.xsession and xshift=homework_questions.xshift) as xclass", "(select xsubname from edusubject where bizid=homework_questions.bizid and xsubcode=homework_questions.xitemcode and xsection=homework_questions.xsection and xsession=homework_questions.xsession and xshift=homework_questions.xshift) as xitemcode"), " xquesid='$notice'");
        return $hhomework;
    }
}
