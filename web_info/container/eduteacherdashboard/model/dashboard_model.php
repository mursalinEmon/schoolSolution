<?php
class Dashboard_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('edustudent',$data, $onduplicate);
    }
    //$data is array
    //$where is array
    function updateverify($data, $where){
        return $this->db->dbupdatebyparam("edustudent",$data,$where);
    }

	public function getBusiness(){
        return $this->db->select("pabuziness", array(), " bizid=100");
    }
    public function getcategories(){
        return $this->db->select("educat", array("xcat,xsubcat"), " bizid=100 and zactive=1");
    }

    public function getstudentbymobile($mobile){
        $conditions[]="xmobile = ?";
        $params[]=$mobile;
        return $this->db->dbselectbyparam("edustudent", "xstuname,xstuemail,xmobile,xaddress,xotp,xotptime,xdob",$conditions,$params);
    }
}
