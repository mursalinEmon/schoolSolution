<?php
class Coursemaster_Model extends Model{
	
	function __construct(){
		parent::__construct();
	}
	function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('educourse',$data, $onduplicate);
    }
	public function getcourse($conditions,$params){
        return $this->db->dbselectbyparam('educourse','*',$conditions,$params);
    }
	public function getsinglecourse($course){
        $coursedt = $this->db->select("educourse", array('*'), " xcourse='$course'");
        return $coursedt;
    }
	
}
