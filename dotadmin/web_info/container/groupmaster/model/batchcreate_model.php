<?php
class Batchcreate_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        $this->log->modellog( serialize($data));
        return $this->db->insert('batch',$data, $onduplicate);
    }

	public function getbatch($conditions){
        return $this->db->select("batch", array("*","(select xteachername from eduteacher where bizid=batch.bizid and xteacher=batch.xteacher) as xteachername", "(select xdesc from seitem where bizid=batch.bizid and xitemcode=batch.xitemcode) as xitemdesc"),$conditions);
    }
	public function getsinglebatch($trainer){
        $trainerdt = $this->db->select("batch", array('*',"(select xteachername from eduteacher where bizid=batch.bizid and xteacher=batch.xteacher) as xteachername","(select xdesc from seitem where bizid=batch.bizid and xitemcode=batch.xitemcode) as xitemdesc"), " bizid = ".Session::get('sbizid')." and xbatch='$trainer'");
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

	public function getSubject($xclass,$xversion,$xsession){
		$subject = $this->db->select("edusubject", array('*'), "bizid = ".Session::get('sbizid')." and xclass='".$xclass."' and xversion='".$xversion."' and xsession='".$xsession."'");
        return $subject;
	}
		
}
