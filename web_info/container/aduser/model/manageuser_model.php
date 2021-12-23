<?php
class Manageuser_model extends Model{

    function __construct(){
        parent::__construct();
    }

    function save($data, $onduplicate){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('pausers',$data, $onduplicate);
    }

    public function getsingleuser($user){
        $userdt = $this->db->select("pausers", array('zemail,zuserfullname as username,zusermobile,zaltemail,zrole,zuseradd,zactive'), " zemail='$user'");
        return $userdt;
    }
    public function getuser($conditions,$params){
        return $this->db->dbselectbyparam('pausers','*',$conditions,$params);
    }
    public function executest($st){
		return $this->db->executecrud($st);
	}

}

?>