<?php
class Homeworkquestion_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('homework_questions',$data, $onduplicate);
    }
    public function getnotice($conditions){
        return $this->db->select("homework_questions",array("*", "DATE_FORMAT(xdate, '%d/%m/%Y') as xdate", "DATE_FORMAT(xduedate, '%d/%m/%Y') as xduedate", "SUBSTRING(xdescription,1,100) as xdescription", "(select xdesc from seitem where bizid=homework_questions.bizid and xitemcode=homework_questions.xitemcode) as xitemdesc", "(select xbatchname from batch where bizid=homework_questions.bizid and xbatch=homework_questions.xbatch) as xbatchname"),$conditions);
    }
	public function getsinglenotice($notice){
        $noticedt = $this->db->select("homework_questions", array('*',"DATE_FORMAT(xdate, '%m/%d/%Y') as xdate" ,"DATE_FORMAT(xduedate, '%m/%d/%Y') as xduedate","(select xbatchname from batch where bizid=homework_questions.bizid and xbatch=homework_questions.xbatch) as xbatchname", "(select xdesc from seitem where bizid=homework_questions.bizid and xitemcode=homework_questions.xitemcode) as xitemdesc"), " bizid = ".Session::get('sbizid')." and xquesid='$notice'");
        return $noticedt;
    }

    public function getCourse(){
		$fields = array("xitemcode", "xdesc");
		$where = "bizid = ".Session::get('sbizid')." and zactive = '1' and xcat='Training Courses'";	
		return $this->db->select("seitem", $fields, $where);
	}

    public function getSelectBatch($course){
        $trainerdt = $this->db->select("batch", array('*'), "bizid = ".Session::get('sbizid')." and xitemcode='".$course."'");
        return $trainerdt;
    }
	
    public function getClass($teacher){
        $classes = $this->db->select("batch", array('*'), "bizid = ".Session::get('sbizid')." and xteacher='".$teacher."'");
        return $classes;
    }
}
