<?php
class Studentassign_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('batch',$data, $onduplicate);
    }

	public function getCoursePurchase($conditions){
        return $this->db->select("ecomsalesdet", array("*", "(select xdesc from seitem where bizid=ecomsalesdet.bizid and xitemcode=ecomsalesdet.xitemcode) as xitemdesc", "(select xstuname from edustudent where bizid=ecomsalesdet.bizid and xstudent=ecomsalesdet.xcus) as xstuname", "(select xmobile from edustudent where bizid=ecomsalesdet.bizid and xstudent=ecomsalesdet.xcus) as xmobile"), $conditions);
    }
	public function getsinglebatch($trainer){
        $trainerdt = $this->db->select("batch", array('*',"(select xteachername from eduteacher where bizid=batch.bizid and xteacher=batch.xteacher) as xteachername","(select xdesc from seitem where bizid=batch.bizid and xitemcode=batch.xitemcode) as xitemdesc"), "bizid = ".Session::get('sbizid')." and xbatch='$trainer'");
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

	public function saveAssignStudent($fields, $where){
			
		return $this->db->dbupdate("ecomsalesdet", $fields, $where);
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

	public function getBatch($course){
		$fields = array("xbatch", "xbatchname");
		$where = "bizid = ".Session::get('sbizid')." and zactive = '1' and xitemcode='".$course."'";	
		return $this->db->select("batch", $fields, $where);
	}
		
}
