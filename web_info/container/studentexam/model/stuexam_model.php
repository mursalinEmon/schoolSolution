<?php
class Stuexam_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function getquestions($course){
		return $this->db->select("eduexamdet", array("xexamdetsl as examdetsl,xques,xoption,xans,(SELECT xexammstsl from eduexamassign WHERE bizid='101' AND xitemcode='".$course."' AND xbatch='1') as exammstsl"), "xexammstsl = (SELECT xexammstsl from eduexamassign WHERE bizid='101' AND xitemcode='".$course."' AND xbatch='1')");

		// "SELECT xexamdetsl as examdetsl,xques,xoption,xans,(SELECT xexammstsl from eduexamassign WHERE bizid='101' AND xitemcode='ITM000051' AND xbatch='1') as exammstsl FROM eduexamdet WHERE xexammstsl = (SELECT xexammstsl from eduexamassign WHERE bizid='101' AND xitemcode='ITM000051' AND xbatch='1')"
	}
	public function getenrolledcourses(){
        // $date = date('Y-m-d');
		return $this->db->select("ecomsalesdet", array("xitemcode,(SELECT xdesc from seitem WHERE bizid=ecomsalesdet.bizid AND xitemcode=ecomsalesdet.xitemcode) as xdesc"), "bizid = ".BIZID." and xcus = '".Session::get('suser')."'");

        //return $this->db->any("SELECT xitemcode, (SELECT xdesc from seitem WHERE bizid=ecomsalesdet.bizid AND xitemcode=ecomsalesdet.xitemcode) AS xdesc from ecomsalesdet WHERE bizid = ".Session::get('sbizid')." and xcus = '".Session::get('suser')."'");
    }

	public function getexams($subject,$student){
		return $this->db->select("eduexamassign", array("*"), "xitemcode='".$subject."' and xversion = '".$student['xversion']."' and xshift = '".$student['xshift']."' and xsection = '".$student['xsection']."' and xsession = '".$student['xsession']."' and xclass = '".$student['xclass']."'  and zactive = '1' and bizid = ".BIZID."");
	}

	public function getlessons($course){
		return $this->db->select("lesson", array("xlesson,xdesc"), "xitemcode='".$course."' and bizid = ".BIZID."");
	}

	public function fetchStudent($studentid){
        $Student = $this->db->select("eduenroll", array("xversion, xshift, xsection, xsession, xclass, xroll"), " bizid = ".Session::get('sbizid')." and xstudentid = '".$studentid."' and xflag='Live' and zactive = '1'");
        return $Student;
    }
    public function fetchSubjects($student){
        $subjects = $this->db->select("batch", array("xsubname,xsubcode"), " bizid = ".Session::get('sbizid')." and xversion = '".$student['xversion']."' and xshift = '".$student['xshift']."' and xsection = '".$student['xsection']."' and xsession = '".$student['xsession']."' and xclass = '".$student['xclass']."'  and zactive = '1'");
        return $subjects;
    }
}
