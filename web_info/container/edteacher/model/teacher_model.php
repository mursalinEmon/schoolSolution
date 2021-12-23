<?php
class Teacher_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('eduteacher',$data, $onduplicate);
    }
    //$data is array
    //$where is array
    function updateverify($data, $where){
        return $this->db->dbupdatebyparam("eduteacher",$data,$where);
    }

	public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid=100");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat"), " bizid=100 and zactive=1");
    }

    public function getteacherbymobile($mobile){
        $conditions[]="xmobile = ?";
        $conditions[]="xstatus = ?";
        $params[]=$mobile;
        $params[]='Approved';
        return $this->db->dbselectbyparam("eduteacher", "xteachername,xemailaddr,xmobile,xaddress,xotp,xotptime",$conditions,$params);
    }

    public function getteacherbyid($id){
        $conditions[]="xteachername = ?";
         $conditions[]="xstatus = ?";
        $params[]=$id;
        $params[]='Approved';
        return $this->db->dbselectbyparam("eduteacher", "xteacher,xteachername,xeducation,xmobile,xemailaddr,xexpartarea,xowndesc,xexperience",$conditions,$params);
    }

    public function getallteacher(){
        // $conditions[]="zactive = ?";
        // $params[]=1;
        return $this->db->select("eduteacher", array()," zactive=1 and xstatus='Approved' order by xsortindex");
    }
}

