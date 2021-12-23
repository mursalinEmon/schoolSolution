<?php
class Passdelivery_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('eduteacher',$data, $onduplicate);
    }

	public function gettrainer($conditions,$params){
        return $this->db->dbselectbyparam('eduteacher','*',$conditions,$params);
    }
	public function getsingletrainer($trainer){
        $trainerdt = $this->db->select("eduteacher", array('*'), " xteacher='$trainer'");
        return $trainerdt;
    }
		
}
