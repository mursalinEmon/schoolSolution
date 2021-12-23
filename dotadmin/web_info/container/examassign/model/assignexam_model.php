<?php
class Assignexam_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('eduexammst',$data, $onduplicate);
    }
    public function getnotice($conditions){
        return $this->db->select("notice", array("*","SUBSTRING(xdescription,1,100) as xdescription", "(select xdesc from seitem where bizid=notice.bizid and xitemcode=notice.xitemcode) as xitemdesc", "(select xbatchname from batch where bizid=notice.bizid and xbatch=notice.xbatch) as xbatchname"),$conditions);
    }
	public function getsinglenotice($notice){
        $noticedt = $this->db->select("notice", array('*',"(select xbatchname from batch where bizid=notice.bizid and xbatch=notice.xbatch) as xbatchname", "(select xdesc from seitem where bizid=notice.bizid and xitemcode=notice.xitemcode) as xitemdesc"), " bizid = ".Session::get('sbizid')." and xsl='$notice'");
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

    public function getLesson($course){
        $lessons = $this->db->select("lesson", array('*'), "bizid = ".Session::get('sbizid')." and xitemcode='".$course."'");
        return $lessons;
    }

    public function getexam($data){
		return $this->db->select("eduexammst", array("*"), "xitemcode='".$data["itemcode"]."' and xlessonno = '".$data["lesson"]."' and xset = '".$data["questionset"]."' and xbatch ='".$data["batch"]."' and bizid = ".$data["bizid"]." and zactive = 1");
	}
    public function getexams($data){
		return $this->db->select("eduexamassign", array("*"), "xitemcode='".$data["itemcode"]."' and xlessonno = '".$data["lesson"]."' and bizid = ".BIZID." and xbatch = (SELECT xbatch from ecomsalesdet where xitemcode='".$data["itemcode"]."' and xcus = '".Session::get('suser')."' and bizid = ".BIZID.")");
	}

    function assign($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('eduexamassign',$data, $onduplicate);
    }
	
}
