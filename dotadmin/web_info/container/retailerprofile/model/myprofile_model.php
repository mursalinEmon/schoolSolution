<?php
class Myprofile_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	public function changeAdminpass($pass, $currentpasss){
		//$this->log->modellog( serialize($data));die;
		$data['zpassword']=$pass;
		return $this->db->dbupdate("pausers", $data, " bizid = ".Session::get('sbizid')." and zemail ='".Session::get('suser')."' and zpassword='".$currentpasss."'");
	}

	public function changeTeacherpass($pass, $currentpasss){
		//$this->log->modellog( serialize($data));die;
		$data['xpassword']=$pass;
		return $this->db->dbupdate("eduteacher", $data, " bizid = ".Session::get('sbizid')." and xteacher ='".Session::get('suser')."' and xpassword='".$currentpasss."'");
	}

	function getmyadminprofile(){
		$conditions = "bizid = ".Session::get('sbizid')." and zemail ='".Session::get('suser')."'";
		
		return $this->db->select('pausers',array("zuserfullname as name", "zuseradd as address", "zusermobile as mobile", "zemail as email"),$conditions);
	}

	function getmyteacherprofile(){
		$conditions = "bizid = ".Session::get('sbizid')." and xteacher ='".Session::get('suser')."'";
		
		return $this->db->select('eduteacher',array("xteachername as name", "xaddress as address", "xmobile as mobile", "xemailaddr as email"),$conditions);
	}

	function checkAdmonPassword($pass){
		$conditions = "bizid = ".Session::get('sbizid')." and zemail = '".Session::get('suser')."' and zpassword = '".$pass."'";

		$data = $this->db->select('pausers',array("zuserfullname", "zusermobile", "zuseradd"),$conditions);

		if(count($data)>0){
			return true;
		}else{
			return false;
		}
	}

	function checkTeacherPassword($pass){
		$conditions = "bizid = ".Session::get('sbizid')." and xteacher = '".Session::get('suser')."' and xpassword = '".$pass."'";

		$data = $this->db->select('eduteacher',array("xteachername", "xmobile", "xaddress"),$conditions);

		if(count($data)>0){
			return true;
		}else{
			return false;
		}
	}
	
}
