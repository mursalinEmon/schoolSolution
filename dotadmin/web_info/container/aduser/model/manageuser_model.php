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
        $userdt = $this->db->select("pausers", array('zemail,zuserfullname as username,zusermobile,zaltemail,xbranch,zrole,zuseradd,zactive'), "bizid = ".Session::get('sbizid')." and zemail='$user'");
        return $userdt;
    }
    public function getuser($conditions){
        return $this->db->select('pausers',array('*'),$conditions);
    }
    public function executest($st){
		return $this->db->executecrud($st);
	}

}

?>