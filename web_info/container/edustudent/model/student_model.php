<?php
class Student_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        // $this->log->modellog( serialize($data));
        return $this->db->insert('edustudent',$data, $onduplicate);
    }
    //$data is array
    //$where is array
    function updateverify($data, $where){
        return $this->db->dbupdatebyparam("edustudent",$data,$where);
    }
    function getrefno($refno){
        // $this->log->modellog($refno);
        return $this->db->select("userbase", array("user_name"), "login_name = '$refno'");
    }

	public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid=101");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat"), " bizid=101 and zactive=1");
    }

    public function getstudentbymobile($mobile){
        $conditions =" bizid = ".BIZID." and xmobile = '".$mobile."'";
        return $this->db->select("edustudent", array("xstudent,xstuname,xstuemail,xmobile,xaddress,xotp,xotptime,xdob,xrefno,xverified,bizid"),$conditions);
    }
    public function uncofirmedstudent($mobile){
        // $this->log->modellog($mobile);
        $conditions =" bizid = ".BIZID." and xmobile = '".$mobile."' and xverified = 0";
        // $conditions[]="xmobile = ?";
        // $conditions[]="xverified = ?";
        // $params[]=$mobile;
        // $params[]=0;
        // return $this->db->dbselectbyparam("edustudent", "xstudent,xstuname,xstuemail,xmobile,xaddress,xotp,xotptime,xdob,xrefno",$conditions,$params);
        return $this->db->select("edustudent", array("xstudent,xstuname,xstuemail,xmobile,xaddress,xotp,xotptime,xdob,xrefno"),$conditions);
    }
    public function getconfstudent($mobile){
        $conditions[]="xmobile = ?";
        $conditions[]="xverified = ?";
        $params[]=$mobile;
        $params[]=1;
        return $this->db->dbselectbyparam("edustudent", "xstudent,xstuname,xstuemail,xmobile,xaddress,xotp,xotptime,xdob,xrefno",$conditions,$params);
    }
}
