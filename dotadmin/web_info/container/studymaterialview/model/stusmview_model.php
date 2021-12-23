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
