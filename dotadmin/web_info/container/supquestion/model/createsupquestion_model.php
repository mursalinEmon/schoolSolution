<?php
class Createsupquestion_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('support_question',$data, $onduplicate);
    }
    public function getSingleBatch($course){
        $trainerdt = $this->db->select("ecomsalesdet", array('*'), "bizid = ".Session::get('sbizid')." and xcus = '".Session::get('suser')."' and xitemcode='".$course."'");
        return $trainerdt;
    }
    public function getnotice($conditions){
        return $this->db->select("notice", array("*","SUBSTRING(xdescription,1,100) as xdescription", "(select xdesc from seitem where bizid=notice.bizid and xitemcode=notice.xitemcode) as xitemdesc", "(select xbatchname from batch where bizid=notice.bizid and xbatch=notice.xbatch) as xbatchname"),$conditions);
    }
	public function getsinglenotice($notice){
        $noticedt = $this->db->select("notice", array('*',"(select xbatchname from batch where bizid=notice.bizid and xbatch=notice.xbatch) as xbatchname", "(select xdesc from seitem where bizid=notice.bizid and xitemcode=notice.xitemcode) as xitemdesc"), " bizid = ".Session::get('sbizid')." and xsl='$notice'");
        return $noticedt;
    }

    public function getCourse(){
		$fields = array("xitemcode", "(select xdesc from seitem where bizid=ecomsalesdet.bizid and xitemcode=ecomsalesdet.xitemcode) as xdesc");
		$where = " bizid = ".Session::get('sbizid')." and xcus = '".Session::get('suser')."'";	
		return $this->db->select("ecomsalesdet", $fields, $where);
	}
	
}
