<?php
class Trainermaster_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('eduteacher',$data, $onduplicate);
    }

	public function gettrainer($conditions){
        return $this->db->select('eduteacher',array('*'),$conditions);
    }
	public function getsingletrainer($trainer){
        $trainerdt = $this->db->select("eduteacher", array('*'), "bizid = ".Session::get('sbizid')." and xteacher='$trainer'");
        return $trainerdt;
    }
		
}
