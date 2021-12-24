<?php
class Myprofile_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	public function changepass($pass, $currentpasss){
		//$this->log->modellog( serialize($data));die;
		$data['xpassword']=$pass;
		return $this->db->dbupdate("edustudent", $data, " bizid = ".Session::get('sbizid')." and xstudent ='".Session::get('suser')."' and xpassword='".$currentpasss."'");
	}

	function getmyprofile(){
		$conditions = "bizid = ".Session::get('sbizid')." and xstudent ='".Session::get('suser')."'";
		
		return $this->db->select('edustudent',array("xstuname as name", "xaddress as address", "xmobile as mobile", "xstuemail as email"),$conditions);
	}

	function checkPassword($pass){
		$conditions = "bizid = ".Session::get('sbizid')." and xstudent = '".Session::get('suser')."' and xpassword = '".$pass."'";

		$data = $this->db->select('edustudent',array("xstuname", "xmobile", "xaddress"),$conditions);

		if(count($data)>0){
			return true;
		}else{
			return false;
		}
	}
	
}
