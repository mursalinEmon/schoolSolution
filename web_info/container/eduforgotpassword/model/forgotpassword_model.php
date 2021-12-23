<?php 
class Forgotpassword_model extends Model{
    function __construct(){
        parent::__construct();
    }

    

    public function verifymobile($mobile){
        // $this->log->modellog($mobile);

		return $this->db->select("edustudent", array("*"), "xmobile = '$mobile' and bizid = ".BIZID." and xverified = 1");
		
	}

	function updateverify($data, $where){
        return $this->db->dbupdate("edustudent",$data,$where);
    }

	public function getstudentbymobile($mobile){
        $conditions =" bizid = ".BIZID." and xmobile = '".$mobile."'";
        return $this->db->select("edustudent", array("xstudent,xstuname,xstuemail,xmobile,xaddress,xotp,xotptime,xdob,xrefno,xverified,bizid"),$conditions);
    }
}