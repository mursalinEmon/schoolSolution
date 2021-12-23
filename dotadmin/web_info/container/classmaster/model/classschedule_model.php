<?php
class Classschedule_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('classdet',$data, $onduplicate);
    }

	public function getbatch($conditions){
        return $this->db->select("classdet",array("*", "DATE_FORMAT(ztime, '%d-%m-%Y %h:%i %p') as ztime", "TIME_FORMAT(xstarttime, '%h:%i %p') as xstarttime", "DATE_FORMAT(xstartdate, '%d-%m-%Y') as xstartdate", "(select xdesc from seitem where bizid=classdet.bizid and xitemcode=classdet.xitemcode) as xitemdesc", "(select xbatchname from batch where bizid=classdet.bizid and xbatch=classdet.xbatch) as xbatchname", "(select xdesc from lesson where bizid=classdet.bizid and xlesson=classdet.xlesson) as xlessonname"),$conditions);
    }
	public function getsingleclass($class){
        $classdt = $this->db->select("classdet", array('*',"(select xbatchname from batch where bizid=classdet.bizid and xbatch=classdet.xbatch) as xbatchname", "(select xdesc from seitem where bizid=classdet.bizid and xitemcode=classdet.xitemcode) as xitemdesc", "(select xdesc from lesson where bizid=classdet.bizid and xlesson=classdet.xlesson) as xlessonname"), "bizid = ".Session::get('sbizid')." and xclass='$class'");
        return $classdt;
    }

	public function getSelectLesson($course){
        $trainerdt = $this->db->select("lesson", array('*'), "bizid = ".Session::get('sbizid')." and xitemcode='".$course."'");
        return $trainerdt;
    }

    public function deleteBatch($data){
		$fields = array(
            "xemail"=>$data['xemail'], 
            "zutime"=>$data['zutime'],
            "zactive"=>'0'
        );
		$where = "bizid = ".Session::get('sbizid')." and xbatch = '".$data['batchsl']."'";	
		return $this->db->dbupdate("batch", $fields, $where);
	}

    public function getTeacher(){
		$fields = array("xteacher", "xteachername");
		$where = "bizid = ".Session::get('sbizid')." and zactive = '1'";	
		return $this->db->select("eduteacher", $fields, $where);
	}

    public function getCourse(){
		$fields = array("xitemcode", "xdesc");
		$where = "bizid = ".Session::get('sbizid')." and zactive = '1' and xcat='Training Courses'";	
		return $this->db->select("seitem", $fields, $where);
	}

    public function getSelectBatch($course){
        $fields = array("xbatch", "xbatchname");
		$where = "bizid = ".Session::get('sbizid')." and zactive = '1' and xitemcode='".$course."'";	
		return $this->db->select("batch", $fields, $where);
    }
	
    public function getClass($teacher){
        $classes = $this->db->select("batch", array('*'), "bizid = ".Session::get('sbizid')." and xteacher='".$teacher."'");
        return $classes;
    }
}
