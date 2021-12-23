<?php
class Homeworkevaluate_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
    public function getnotice($conditions){
        return $this->db->select("homework_submit",array("*", "DATE_FORMAT(xdate, '%d/%m/%Y') as xdate", "SUBSTRING(xdescription,1,100) as xdescription", "(select xstuname from edustudent where bizid=homework_submit.bizid and xstudent=homework_submit.xstudent) as xstuname"),$conditions);
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
	
}
