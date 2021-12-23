<?php 
	class Role_Model extends Model{

    function __construct(){
        parent::__construct();
    }
    function save($data){
        //$this->log->modellog( serialize($data));
        return $this->db->insert('paroles',$data);
    }

    function rolelist(){        
        return $this->db->select('paroles',array('zrole as rolename'),' bizid=100 order by xroleid desc');
    }
    function roledetail($rollname){
        
        return $this->db->select('paroles',array('xkeymenu')," bizid=100 and zrole='".$rollname."'");
    }
    function getrolename($role){        
        return $this->db->select('paroles',array('zrole as rolename')," bizid=100 and zrole='".$role."'");
    }
    public function deleterole($role){
        return $this->db->executecrud("delete from paroles where bizid=100 and zrole='".$role."'");
    }

    public function updaterole($data){
        return $this->db->executecrud("update paroles set xkeymenu='".$data['xkeymenu']."' where bizid=100 and zrole='".$data['zrole']."'");
    }

}

?>