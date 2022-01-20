<?php
class Studentjoinclass_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('classdet',$data, $onduplicate);
    }

	public function getbatch($itemcode,$batchid){
        $fields = array("*", "TIME_FORMAT(xstarttime, '%h:%i %p') as xstarttime", "DATE_FORMAT(xstartdate, '%d-%m-%Y') as xstartdate", "(select xdesc from seitem where bizid=classdet.bizid and xitemcode=classdet.xitemcode) as xitemdesc", "(select xbatchname from batch where bizid=classdet.bizid and xbatch=classdet.xbatch) as xbatchname", "(select xdesc from lesson where bizid=classdet.bizid and xlesson=classdet.xlesson) as xlessonname");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ".Session::get('sbizid')." and xitemcode = '".$itemcode."' and xbatch = '". $batchid ."'";
		return $this->db->select("classdet", $fields, $where);
    }
	public function getsingleclass($class){
        $classdt = $this->db->select("classdet", array('*',"(select xbatchname from batch where bizid=classdet.bizid and xbatch=classdet.xbatch) as xbatchname", "(select xdesc from seitem where bizid=classdet.bizid and xitemcode=classdet.xitemcode) as xitemdesc", "(select xdesc from lesson where bizid=classdet.bizid and xlesson=classdet.xlesson) as xlessonname"), " xclass='$class'");
        return $classdt;
    }

	public function getSelectLesson($course){
        $trainerdt = $this->db->select("lesson", array('*'), " xitemcode='".$course."'");
        return $trainerdt;
    }

    public function deleteBatch($data){
		$fields = array(
            "xemail"=>$data['xemail'], 
            "zutime"=>$data['zutime'],
            "zactive"=>'0'
        );
		$where = " xbatch = '".$data['batchsl']."'";	
		return $this->db->dbupdate("batch", $fields, $where);
	}

    public function getTeacher(){
		$fields = array("xteacher", "xteachername");
		$where = " zactive = '1'";	
		return $this->db->select("eduteacher", $fields, $where);
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
    public function fetchStudent($studentid){
        $Student = $this->db->select("eduenroll", array("xversion, xshift, xsection, xsession, xclass, xroll"), " bizid = ".Session::get('sbizid')." and xstudentid = '".$studentid."' and xflag='Live' and zactive = '1'");
        return $Student;
    }
    public function fetchSubjects($student){
        $subjects = $this->db->select("batch", array("xsubname,xsubcode"), " bizid = ".Session::get('sbizid')." and xversion = '".$student['xversion']."' and xshift = '".$student['xshift']."' and xsection = '".$student['xsection']."' and xsession = '".$student['xsession']."' and xclass = '".$student['xclass']."'  and zactive = '1'");
        return $subjects;
    }
    public function getClasses($subject,$student){
        $classes = $this->db->select("classdet", array("*"), " bizid = ".Session::get('sbizid')." and xversion = '".$student['xversion']."' and xshift = '".$student['xshift']."' and xsection = '".$student['xsection']."' and xsession = '".$student['xsession']."' and xclass = '".$student['xclass']."' and xitemcode = $subject");
        return $classes;
    }
		
}
