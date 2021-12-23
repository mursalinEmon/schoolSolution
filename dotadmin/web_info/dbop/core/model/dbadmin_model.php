<?php

class Dbadmin_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    public function dbselect($statement){
        //$this->log->modellog(serialize($this->db->dbaselect($statement)));
        //$this->log->modellog("testing");       
        return $this->db->dbselect($statement);
        
    }
    public function executecrud($statement){
        //$this->log->modellog(serialize($this->db->dbaselect($statement)));
        //$this->log->modellog($this->db->executecrud($statement));       
        return $this->db->executecrud($statement);
        
    }
    
}