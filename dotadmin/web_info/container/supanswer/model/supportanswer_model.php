<?php
class Supportanswer_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
    function save($data, $onduplicate){
        // $this->log->modellog( serialize($data));
        return $this->db->insert('support_answer',$data, $onduplicate);
    }
    public function getnotice($data){
        // $this->log->modellog( serialize($data));
        $questions = $this->db->select("support_question",array("xsubname","xtitle","xdescription","xdate","xstudentid","xquesid","(select xstuname from edustudent where bizid=support_question.bizid and xstudentid=support_question.xstudentid) as xstuname", "(select xanswer from support_answer where bizid=support_question.bizid and xquesid=support_question.xquesid) as xanswer"),"xsession='".$data['xsession']."' and xclass='".$data['xclass']."' and xsection='".$data['xsection']."' and xshift='".$data['xshift']."' and xversion='".$data['xversion']."' and xsubname='".$data['xsubname']."'");
        return $questions;
        // return $this->db->select("support_question",array("*", "DATE_FORMAT(xdate, '%d/%m/%Y') as xdate", "(select xstuname from edustudent where bizid=support_question.bizid and xstudentid=support_question.xstudentid) as xstuname", "(select xdesc from seitem where bizid=support_question.bizid and xitemcode=support_question.xsubname) as xitemdesc", "(select xanswer from support_answer where bizid=support_question.bizid and xquesid=support_question.xquesid) as xanswer"),$conditions);
        
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

    public function updateTemp($fields, $where){
			
		return $this->db->dbupdate("homework_submit", $fields, $where);
	}
    // public function getclass($teacherid){
    //     $teacher = $this->db->select("batch", array("*"), "bizid = ".Session::get('sbizid')." and xteacher='".$teacherid."'");
    //     return $teacher;
    // }
	public function getClass($teacher){
        $classes = $this->db->select("batch", array('*'), "bizid = ".Session::get('sbizid')." and xteacher='".$teacher."'");
        return $classes;
    }
}
