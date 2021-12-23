<?php
class Mailverification_Model extends Model{
	function __construct(){
		parent::__construct();
	}
	
	public function getdata($email, $token){
		return $this->db->select('pausers', array(), " zemail='".$email."' 
							and zcomments='".$token."' and zactive=0");
	}
	
	public function updateuser($where){
		return $this->db->dbupdate('pausers',array("zactive"=>"1"),$where);
	}
}